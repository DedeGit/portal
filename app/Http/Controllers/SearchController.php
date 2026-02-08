<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Ad;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;

    $artikels = Posts::where('post_title', 'LIKE', "%{$q}%")
            ->orWhere('post_content', 'LIKE', "%{$q}%")
            ->latest()
            ->paginate(10);

    // Ambil postingan populer atau hot news
    $trendingPosts = Posts::whereIn('post_status', ['populer'])
                         ->orderBy('created_at', 'desc')
                         ->take(5)
                         ->get();
    // Ambil khusus post hot news untuk bagian right-side
$hotNewsPosts = Posts::whereDate('created_at', Carbon::today())
    ->orderBy('created_at', 'desc')
    ->get();
$todayAds = Ad::whereDate('created_at', Carbon::today())->get();
    $posts = Posts::all();

    $now = Carbon::now()->toDateString();

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

        return view('search', compact('artikels', 'q', 'trendingPosts','hotNewsPosts', 'posts', 'ads', 'adsLeft', 'adsRight', 'headerAds', 'todayAds'));
    }
}
