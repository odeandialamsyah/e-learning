<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        // Logika Anda untuk halaman daftar
        return view('daftar'); // Contoh: Mengembalikan view 'daftar'
    }
}
