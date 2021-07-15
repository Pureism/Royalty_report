<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kelompok 3 | Sistem Informasi Divisi Editor'
        ];
        echo view('layout\header', $data);
        echo view('pages\home');
        echo view('layout\footer');
    }

    public function daftarEditor()
    {
        $data = [
            'title' => 'Kelompok 3 | Editor'
        ];
        echo view('layout\header', $data);
        echo view('pages\editor');
        echo view('layout\footer');
    }

    public function daftarPenulis()
    {
        $data = [
            'title' => 'Kelompok 3 | Penulis'
        ];
        echo view('layout\header', $data);
        echo view('pages\penulis');
        echo view('layout\footer');
    }

    public function reportRoyalty()
    {
        $data = [
            'title' => 'Kelompok 3 | Report Royalty'
        ];
        echo view('layout\header', $data);
        echo view('pages\royalty');
        echo view('layout\footer');
    }

    public function reportOrder()
    {
        $data = [
            'title' => 'Kelompok 3 | Report Order'
        ];
        echo view('layout\header', $data);
        echo view('pages\order');
        echo view('layout\footer');
    }

    public function reportProgress()
    {
        $data = [
            'title' => 'Kelompok 3 | Report Progress'
        ];
        echo view('layout\header', $data);
        echo view('pages\progress');
        echo view('layout\footer');
    }

    public function about()
    {
        $data = [
            'title' => 'Kelompok 3 | About'
        ];
        echo view('layout\header', $data);
        echo view('pages\about');
        echo view('layout\footer');
    }
}
