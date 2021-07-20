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
        $currentPage = $this->request->getVar('page_royalty') ? $this->request->getVar('page_royalty') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $royalty = $this->RoyaltyModel->search($keyword);
        } else {
            $royalty = $this->RoyaltyModel;
        }

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
        $data = [
            'title' => 'Kelompok 3 | Tambah Royalty',
            'validation' => \config\Services::validation()
        ];
        return view('royalty\create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'deskripsi' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong',
                    'min_length' => '{field} terlalu sedikit'
                ]
            ],
            'total' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Total Royalty tidak boleh kosong'
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

        $file_lampiran = $this->request->getFile('lampiran');
        $nama_lampiran = $file_lampiran->getRandomName();
        $file_lampiran->move('image', $nama_lampiran);

        $timestamp = Time::now();
        $slug = Time::parse($timestamp)->toLocalizedString('yyyyMMddHHmmss');
        $this->RoyaltyModel->save([
            'deskripsi' => $this->request->getVar('deskripsi'),
            'total' => $this->request->getVar('total'),
            'lampiran' => $this->request->getVar('lampiran'),
            'slug' => $slug,
            'lampiran' => $nama_lampiran

        ]);
        session()->setFlashdata('pesantambah', 'Data Berhasil Ditambahkan');
        return redirect()->to('/Royalty');
    }

    public function delete($id)
    {
        $lampiran = $this->RoyaltyModel->find($id);
        unlink('image/' . $lampiran['lampiran']);

        $this->RoyaltyModel->delete($id);
        session()->setFlashdata('pesanhapus', 'Data Berhasil Dihapus');
        return redirect()->to('/royalty');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Kelompok 3 | Edit Royalty',
            'validation' => \config\Services::validation(),
            'royalty' => $this->RoyaltyModel->getRoyalty($slug)
        ];
        return view('royalty\edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'deskripsi' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong',
                    'min_length' => '{field} terlalu sedikit'
                ]
            ],
            'total' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Total Royalty tidak boleh kosong'
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

        $file_lampiran = $this->request->getFile('lampiran');
        if ($file_lampiran->getError() == 4) {
            $nama_lampiran = $this->request->getVar('lampiranLama');
        } else {
            $nama_lampiran = $file_lampiran->getRandomName();
            $file_lampiran->move('image', $nama_lampiran);
            unlink('image/' . $this->request->getVar('lampiranLama'));
        }

        $timestamp = Time::now();
        $this->RoyaltyModel->save([
            'id_royalty' => $id,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'total' => $this->request->getVar('total'),
            'lampiran' => $this->request->getVar('lampiran'),
            'diubah' => $timestamp,
            'lampiran' => $nama_lampiran
        ]);
        session()->setFlashdata('pesantambah', 'Data Berhasil Diubah');
        return redirect()->to('/Royalty');
    }
}
