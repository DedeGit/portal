<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
public function index()
{
    // Ambil postingan populer atau hot news
    $trendingPosts = Posts::whereIn('post_status', ['populer'])
                         ->orderBy('created_at', 'desc')
                         ->take(5)
                         ->get();
    // Ambil khusus post hot news untuk bagian right-side
$hotNewsPosts = Posts::whereDate('created_at', Carbon::today())
    ->orderBy('created_at', 'desc')
    ->get();

    $posts = Posts::all();

    $now = Carbon::now()->toDateString();
$todayAds = Ad::whereDate('created_at', Carbon::today())->get();
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

    return view('home', compact('trendingPosts','hotNewsPosts', 'posts', 'ads', 'adsLeft', 'adsRight', 'headerAds', 'todayAds'));
}
public function filter(Request $request)
{
    $query = Posts::query();

    // ✅ FILTER TANGGAL SPESIFIK
    if ($request->filled('filter_date')) {
        $query->whereDate('created_at', $request->filter_date);
    }

    // ✅ FILTER URUTAN
    if ($request->sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
    } else {
        $query->orderBy('created_at', 'desc');
    }

    $posts = $query->get();
 // Ambil postingan populer atau hot news
    $trendingPosts = Posts::whereIn('post_status', ['populer'])
                         ->orderBy('created_at', 'desc')
                         ->take(5)
                         ->get();
    // Ambil khusus post hot news untuk bagian right-side
$hotNewsPosts = Posts::whereDate('created_at', Carbon::today())
    ->orderBy('created_at', 'desc')
    ->get();
    $now = Carbon::now()->toDateString();
$todayAds = Ad::whereDate('created_at', Carbon::today())->get();
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

    return view('filter-result', compact('posts', 'trendingPosts','hotNewsPosts', 'ads', 'adsLeft', 'adsRight', 'headerAds', 'todayAds'));
}

}