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
        echo view('pages\editor', $data);
    }

    public function daftarPenulis()
    {
        $data = [
            'title' => 'Kelompok 3 | Penulis'
        ];
        echo view('pages\penulis', $data);
    }

    public function reportRoyalty()
    {
        $data = [
            'title' => 'Kelompok 3 | Report Royalty'
        ];
        echo view('pages\royalty', $data);
    }

    public function reportOrder()
    {
        $data = [
            'title' => 'Kelompok 3 | Report Order'
        ];
        echo view('pages\order', $data);
    }

    public function reportProgress()
    {
        $data = [
            'title' => 'Kelompok 3 | Report Progress'
        ];
        echo view('pages\progress', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Kelompok 3 | About'
        ];
        echo view('pages\about', $data);
    }
}
