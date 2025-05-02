<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        $mutasis = Mutasi::with(['user', 'barang'])->latest()->get();
        return view('mutasi.index', compact('mutasis'));
    }
}
