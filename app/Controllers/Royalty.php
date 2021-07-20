<?php

namespace App\Controllers;

use App\Models\RoyaltyModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\I18n\Time;

class Royalty extends BaseController
{
    protected $RoyaltyModel;

    public function __construct()
    {
        $this->RoyaltyModel =  new RoyaltyModel();
    }

    public function index()
    {
        // Mencari current page
        $currentPage = $this->request->getVar('page_royalty') ? $this->request->getVar('page_royalty') : 1;

        /**
         **** MENAMPILKAN HALAMAN ****
         * Jika keyword ada pada tabel maka tampilkan keyword
         * Jika tidak tampilkan semua.
         */
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $royalty = $this->RoyaltyModel->search($keyword);
        } else {
            $royalty = $this->RoyaltyModel;
        }

        // data
        $data = [
            'title' => 'Kelompok 3 | Report Royalty',
            'royalty' => $royalty->paginate(6, 'royalty'),
            'pager' => $this->RoyaltyModel->pager,
            'currentPage' => $currentPage
        ];
        return view('royalty\index', $data);
    }

    public function details($slug)
    {
        // data
        $royalty = $this->RoyaltyModel->getRoyalty($slug);
        $data = [
            'title' => 'Kelompok 3 | Detail Royalty',
            'royalty' => $this->RoyaltyModel->getRoyalty($slug),
            'diubah' => Time::parse($royalty['diubah'], 'Asia/Jakarta')->humanize()
        ];
        return view('royalty\details', $data);
    }

    public function create()
    {
        // data
        $data = [
            'title' => 'Kelompok 3 | Tambah Royalty',
            'validation' => \config\Services::validation()
        ];
        return view('royalty\create', $data);
    }

    public function save()
    {
        /**
         ***** RULE SAVE ******
         * Buku = required, min_length[5]
         * Penulis = required, min_length[3]
         * Cetak = required
         * Harga = required
         * Deskripsi = required, min_length[5]
         * Total = required
         * Lampiran = max_size[1 Mb], ext[pdf, docx, doc, jpg, jpeg, png]
         */
        if (!$this->validate([
            'buku' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Judul buku tidak boleh kosong',
                    'min_length' => 'Judul buku terlalu sedikit'
                ]
            ],
            'penulis' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama penulis tidak boleh kosong',
                    'min_length' => 'Nama penulis terlalu sedikit'
                ]
            ],
            'cetak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Cetak tidak boleh kosong'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong',
                    'min_length' => '{field} terlalu sedikit'
                ]
            ],
            'lampiran' => [
                'rules' => 'max_size[lampiran,1024]|ext_in[lampiran,pdf,doc,docx,png,jpg,jpeg]',
                'errors' => [
                    'max_size' => 'File terlalu besar (Maks 1Mb)',
                    'ext_in' => 'File tidak sesuai (jpg, png, docx, pdf)'
                ]
            ]
        ])) {
            return redirect()->to('royalty/create')->withInput();
        }

        // Memindahkan file + Set nama file
        $file_lampiran = $this->request->getFile('lampiran');
        $nama_lampiran = $file_lampiran->getRandomName();
        $file_lampiran->move('image', $nama_lampiran);

        // Hitung Royalty
        $hargaBuku = $this->request->getVar('harga');
        $jumlahCetak = $this->request->getVar('cetak');
        $totalRoyalty = $hargaBuku * $jumlahCetak / 100 * 10;

        // data
        $timestamp = Time::now();
        $slug = Time::parse($timestamp)->toLocalizedString('yyyyMMddHHmmss');
        $this->RoyaltyModel->save([
            'buku' => $this->request->getVar('buku'),
            'penulis' => $this->request->getVar('penulis'),
            'cetak' => $this->request->getVar('cetak'),
            'cetak' => $this->request->getVar('cetak'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'total' => $totalRoyalty,
            'lampiran' => $this->request->getVar('lampiran'),
            'slug' => $slug,
            'lampiran' => $nama_lampiran

        ]);
        session()->setFlashdata('pesantambah', 'Data Berhasil Ditambahkan');
        return redirect()->to('/Royalty');
    }

    public function delete($id)
    {
        // Menghapus file pada sistem
        $lampiran = $this->RoyaltyModel->find($id);
        unlink('image/' . $lampiran['lampiran']);

        $this->RoyaltyModel->delete($id);
        session()->setFlashdata('pesanhapus', 'Data Berhasil Dihapus');
        return redirect()->to('/royalty');
    }

    public function edit($slug)
    {
        // data
        $data = [
            'title' => 'Kelompok 3 | Edit Royalty',
            'validation' => \config\Services::validation(),
            'royalty' => $this->RoyaltyModel->getRoyalty($slug)
        ];
        return view('royalty\edit', $data);
    }

    public function update($id)
    {
        /**
         ***** RULE VALIDASI ******
         * Buku = required, min_length[5]
         * Penulis = required, min_length[3]
         * Cetak = required
         * Harga = required
         * Deskripsi = required, min_length[5]
         * Total = required
         * Lampiran = max_size[1 Mb], ext[pdf, docx, doc, jpg, jpeg, png]
         */
        if (!$this->validate([
            'buku' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Judul buku tidak boleh kosong',
                    'min_length' => 'Judul buku terlalu sedikit'
                ]
            ],
            'penulis' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama penulis tidak boleh kosong',
                    'min_length' => 'Nama penulis terlalu sedikit'
                ]
            ],
            'cetak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Cetak tidak boleh kosong'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong',
                    'min_length' => '{field} terlalu sedikit'
                ]
            ],
            'lampiran' => [
                'rules' => 'max_size[lampiran,1024]|ext_in[lampiran,pdf,doc,docx,png,jpg,jpeg]',
                'errors' => [
                    'max_size' => 'File terlalu besar (Maks 1Mb)',
                    'ext_in' => 'File tidak sesuai (jpg, png, docx, pdf)'
                ]
            ]
        ])) {
            return redirect()->to('royalty/edit/' . $this->request->getVar('slug'))->withInput();
        }

        // Sistem update file upload
        $file_lampiran = $this->request->getFile('lampiran');
        if ($file_lampiran->getError() == 4) {
            $nama_lampiran = $this->request->getVar('lampiranLama');
        } else {
            $nama_lampiran = $file_lampiran->getRandomName();
            $file_lampiran->move('image', $nama_lampiran);
            unlink('image/' . $this->request->getVar('lampiranLama'));
        }

        // Hitung Royalty
        $hargaBuku = $this->request->getVar('harga');
        $jumlahCetak = $this->request->getVar('cetak');
        $totalRoyalty = $hargaBuku * $jumlahCetak / 100 * 10;

        // data
        $timestamp = Time::now();
        $this->RoyaltyModel->save([
            'id_royalty' => $id,
            'buku' => $this->request->getVar('buku'),
            'penulis' => $this->request->getVar('penulis'),
            'cetak' => $this->request->getVar('cetak'),
            'cetak' => $this->request->getVar('cetak'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'total' => $totalRoyalty,
            'diubah' => $timestamp,
            'lampiran' => $nama_lampiran
        ]);
        session()->setFlashdata('pesantambah', 'Data Berhasil Diubah');
        return redirect()->to('/Royalty');
    }
}
