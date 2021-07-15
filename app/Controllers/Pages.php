<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kelompok 3 | Sistem Informasi Divisi Editor'
        ];
        return view('pages\home', $data);
    }

    public function daftarEditor()
    {
        $data = [
            'title' => 'Kelompok 3 | Editor'
        ];
        return view('pages\editor', $data);
    }

    public function daftarPenulis()
    {
        $data = [
            'title' => 'Kelompok 3 | Penulis'
        ];
        return view('pages\penulis', $data);
    }

    public function reportOrder()
    {
        $data = [
            'title' => 'Kelompok 3 | Report Order'
        ];
        return view('pages\order', $data);
    }

    public function reportProgress()
    {
        $data = [
            'title' => 'Kelompok 3 | Report Progress'
        ];
        return view('pages\progress', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Kelompok 3 | About'
        ];
        return view('pages\about', $data);
    }
}
