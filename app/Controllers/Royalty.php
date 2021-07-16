<?php

namespace App\Controllers;

use App\Models\RoyaltyModel;

class Royalty extends BaseController
{
    protected $RoyaltyModel;

    public function __construct()
    {
        $this->RoyaltyModel =  new RoyaltyModel();
    }

    public function index()
    {
        $royalty = $this->RoyaltyModel->findAll();
        $data = [
            'title' => 'Kelompok 3 | Report Royalty',
            'royalty' => $royalty
        ];
        return view('pages\royalty', $data);
    }

    public function save()
    {
        $this->RoyaltyModel->save([
            'deskripsi' => $this->request->getVar('deskripsi'),
            'total' => $this->request->getVar('total'),
            'lampiran' => $this->request->getVar('lampiran')
        ]);
        return redirect()->to('/royalty');
    }
}
