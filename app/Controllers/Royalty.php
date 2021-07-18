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
            'royalty' => $royalty,
            'diubah' => Time::parse($royalty['diubah'], 'Asia/Jakarta')->humanize()
        ];
        return view('royalty\details', $data);
    }

    public function save()
    {
        $this->RoyaltyModel->save([
            'deskripsi' => $this->request->getVar('deskripsi'),
            'total' => $this->request->getVar('total'),
            'lampiran' => $this->request->getVar('lampiran')
        ]);
        return redirect()->to('/Royalty');
    }
}
