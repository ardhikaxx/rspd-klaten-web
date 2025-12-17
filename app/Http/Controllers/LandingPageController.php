<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Siaran;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(6)->get();
        $programs = Siaran::orderByTime()->take(5)->get();
        $jadwals = Jadwal::orderByTime()->get();
        $kategories = Berita::distinct()->pluck('kategori')->toArray();
        
        return view('index', compact('beritas', 'programs', 'jadwals', 'kategories'));
    }
}