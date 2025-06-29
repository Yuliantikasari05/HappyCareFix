<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Halaman About
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Halaman Hospital (opsional jika kamu punya view langsung)
     */
    public function hospital()
    {
        return view('hospital');
    }

    /**
     * Halaman Contact
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Halaman FAQ (kalau dibutuhkan)
     */
    public function faq()
    {
        return view('faq');
    }

    /**
     * Halaman Services (kalau ada)
     */
    public function services()
    {
        return view('services');
    }
}
