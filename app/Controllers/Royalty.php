<?php

namespace App\Controllers;

class Royalty extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kelompok 3 | Report Royalty'
        ];
        return view('pages\royalty', $data);
    }
}
