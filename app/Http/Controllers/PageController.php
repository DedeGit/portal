<?php

namespace App\Http\Controllers;
use App\Models\Ad;
class PageController extends Controller
{
    public function tentangKami() {
        $ads = Ad::where('is_active', 1)
          ->orderBy('created_at', 'desc')
          ->get();

    // Ambil iklan aktif posisi left
    $adsLeft = Ad::where('is_active', 1)
                 ->where('position', 'left')
                 ->orderBy('created_at', 'desc')
                 ->get();

    // Ambil iklan aktif posisi right
    $adsRight = Ad::where('is_active', 1)
                  ->where('position', 'right')
                  ->orderBy('created_at', 'desc')
                  ->get();

   $headerAds = Ad::where('is_active', 1)
                   ->where('position', 'header')
                   ->orderBy('created_at', 'desc')
                   ->first(); // Ambil satu data terbaru
        return view('pages.tentang_kami', compact('ads', 'adsLeft', 'adsRight', 'headerAds'));
    }

    public function redaksi() {
        $ads = Ad::where('is_active', 1)
          ->orderBy('created_at', 'desc')
          ->get();

    // Ambil iklan aktif posisi left
    $adsLeft = Ad::where('is_active', 1)
                 ->where('position', 'left')
                 ->orderBy('created_at', 'desc')
                 ->get();

    // Ambil iklan aktif posisi right
    $adsRight = Ad::where('is_active', 1)
                  ->where('position', 'right')
                  ->orderBy('created_at', 'desc')
                  ->get();

   $headerAds = Ad::where('is_active', 1)
                   ->where('position', 'header')
                   ->orderBy('created_at', 'desc')
                   ->first(); // Ambil satu data terbaru
        return view('pages.redaksi', compact('ads', 'adsLeft', 'adsRight', 'headerAds'));
    }

    public function infoIklan() {
        $ads = Ad::where('is_active', 1)
          ->orderBy('created_at', 'desc')
          ->get();

    // Ambil iklan aktif posisi left
    $adsLeft = Ad::where('is_active', 1)
                 ->where('position', 'left')
                 ->orderBy('created_at', 'desc')
                 ->get();

    // Ambil iklan aktif posisi right
    $adsRight = Ad::where('is_active', 1)
                  ->where('position', 'right')
                  ->orderBy('created_at', 'desc')
                  ->get();

   $headerAds = Ad::where('is_active', 1)
                   ->where('position', 'header')
                   ->orderBy('created_at', 'desc')
                   ->first(); // Ambil satu data terbaru
        return view('pages.info_iklan', compact('ads', 'adsLeft', 'adsRight', 'headerAds'));
    }

    public function pedomanMediaSiber() {
        $ads = Ad::where('is_active', 1)
          ->orderBy('created_at', 'desc')
          ->get();

    // Ambil iklan aktif posisi left
    $adsLeft = Ad::where('is_active', 1)
                 ->where('position', 'left')
                 ->orderBy('created_at', 'desc')
                 ->get();

    // Ambil iklan aktif posisi right
    $adsRight = Ad::where('is_active', 1)
                  ->where('position', 'right')
                  ->orderBy('created_at', 'desc')
                  ->get();

   $headerAds = Ad::where('is_active', 1)
                   ->where('position', 'header')
                   ->orderBy('created_at', 'desc')
                   ->first(); // Ambil satu data terbaru
        return view('pages.pedoman_media_siber', compact('ads', 'adsLeft', 'adsRight', 'headerAds'));
    }

    public function disclaimer() {
        $ads = Ad::where('is_active', 1)
          ->orderBy('created_at', 'desc')
          ->get();

    // Ambil iklan aktif posisi left
    $adsLeft = Ad::where('is_active', 1)
                 ->where('position', 'left')
                 ->orderBy('created_at', 'desc')
                 ->get();

    // Ambil iklan aktif posisi right
    $adsRight = Ad::where('is_active', 1)
                  ->where('position', 'right')
                  ->orderBy('created_at', 'desc')
                  ->get();

   $headerAds = Ad::where('is_active', 1)
                   ->where('position', 'header')
                   ->orderBy('created_at', 'desc')
                   ->first(); // Ambil satu data terbaru
        return view('pages.disclaimer', compact('ads', 'adsLeft', 'adsRight', 'headerAds'));
    }

    public function kontakKami() {
        $ads = Ad::where('is_active', 1)
          ->orderBy('created_at', 'desc')
          ->get();

    // Ambil iklan aktif posisi left
    $adsLeft = Ad::where('is_active', 1)
                 ->where('position', 'left')
                 ->orderBy('created_at', 'desc')
                 ->get();

    // Ambil iklan aktif posisi right
    $adsRight = Ad::where('is_active', 1)
                  ->where('position', 'right')
                  ->orderBy('created_at', 'desc')
                  ->get();

   $headerAds = Ad::where('is_active', 1)
                   ->where('position', 'header')
                   ->orderBy('created_at', 'desc')
                   ->first(); // Ambil satu data terbaru
        return view('pages.kontak_kami', compact('ads', 'adsLeft', 'adsRight', 'headerAds'));
    }
}
