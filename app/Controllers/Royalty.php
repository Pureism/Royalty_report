<?php

namespace App\Controllers;

use App\Models\RoyaltyModel;
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
        $data = [
            'title' => 'Kelompok 3 | Report Royalty',
            'royalty' => $this->RoyaltyModel->getRoyalty()
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
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('royalty/create')->withInput()->with('validation', $validation);
        }

        $timestamp = Time::now();
        $slug = url_title(Time::parse($timestamp)->toLocalizedString('yyyyMMddHHmmss'), '-', true);
        $this->RoyaltyModel->save([
            'deskripsi' => $this->request->getVar('deskripsi'),
            'total' => $this->request->getVar('total'),
            'lampiran' => $this->request->getVar('lampiran'),
            'slug' => $slug
        ]);
        session()->setFlashdata('pesantambah', 'Data Berhasil Ditambahkan');
        return redirect()->to('/Royalty');
    }

    public function delete($id)
    {
        $this->RoyaltyModel->delete($id);
        session()->setFlashdata('pesanhapus', 'Data Berhasil Dihapus');
        return redirect()->to('/royalty');
    }
}
