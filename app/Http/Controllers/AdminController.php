<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\User;
use App\Models\Ad;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
   public function dashboard(Request $request)
{
    // ================= AMBIL TANGGAL (OPTIONAL) =================
    $date = $request->get('date');

    // ================= VISITOR =================
    if ($date) {
        $todayVisitors = Visitor::whereDate('visited_at', $date)->count();
    } else {
        $todayVisitors = Visitor::whereDate('visited_at', today())->count();
    }

    $totalVisitors = Visitor::count();

    // ================= VIEW (POSTS) =================
    if ($date) {
        $todayView = Posts::whereDate('updated_at', $date)->sum('views');
    } else {
        $todayView = Posts::whereDate('updated_at', today())->sum('views');
    }

    $totalView = Posts::sum('views');

    // ================= POST =================
    if ($date) {
        $todayPosts = Posts::whereDate('created_at', $date)->count();
    } else {
        $todayPosts = Posts::whereDate('created_at', today())->count();
    }

    $totalPosts = Posts::count();

    // ================= IKLAN =================
    if ($date) {
        $todayAds = Ad::whereDate('created_at', $date)->count();
    } else {
        $todayAds = Ad::whereDate('created_at', today())->count();
    }

    $totalAds = Ad::count();

    // ================= GRAFIK 30 HARI =================
$startDate = Carbon::now()->subDays(30);

// POST
$postChart = Posts::selectRaw('DATE(created_at) as date, COUNT(*) as total')
    ->where('created_at', '>=', $startDate)
    ->groupBy('date')
    ->orderBy('date')
    ->pluck('total', 'date');

// IKLAN
$adsChart = Ad::selectRaw('DATE(created_at) as date, COUNT(*) as total')
    ->where('created_at', '>=', $startDate)
    ->groupBy('date')
    ->orderBy('date')
    ->pluck('total', 'date');

// VISITOR
$visitorChart = Visitor::selectRaw('DATE(visited_at) as date, COUNT(*) as total')
    ->where('visited_at', '>=', $startDate)
    ->groupBy('date')
    ->orderBy('date')
    ->pluck('total', 'date');

// VIEW
$viewChart = Posts::selectRaw('DATE(updated_at) as date, SUM(views) as total')
    ->where('updated_at', '>=', $startDate)
    ->groupBy('date')
    ->orderBy('date')
    ->pluck('total', 'date');

// SATUKAN TANGGAL
$labels = $postChart->keys()
    ->merge($adsChart->keys())
    ->merge($visitorChart->keys())
    ->merge($viewChart->keys())
    ->unique()
    ->sort()
    ->values();

// DATA FINAL
$postData = $labels->map(fn($d) => $postChart[$d] ?? 0);
$adsData = $labels->map(fn($d) => $adsChart[$d] ?? 0);
$visitorData = $labels->map(fn($d) => $visitorChart[$d] ?? 0);
$viewData = $labels->map(fn($d) => $viewChart[$d] ?? 0);

    return view('admin.dashboard', compact(
        'todayVisitors',
        'totalVisitors',
        'todayView',
        'totalView',
        'todayPosts',
        'totalPosts',
        'todayAds',
        'totalAds',
        'labels',
        'postData',
        'adsData',
        'visitorData',
        'viewData',
        'date'
    ));
}

    public function allPosts()
    {
        $posts = Posts::all();
        return view('admin.pages.posts', compact('posts'));
    }

    public function addPosts()
    {
        return view('admin.pages.addposts');
    }
    
    public function editPost($id) 
    {
    $post = Posts::findOrFail($id);
    return view('admin.pages.editpost', compact('post'));
    }

   // ===== Tambahan fungsi Ads =====

    // Tampilkan daftar iklan
    public function ads()
    {
        $ads = Ad::all();
        return view('admin.pages.ads', compact('ads'));  // Buat view ads/index.blade.php
    }

    // Form tambah iklan
    public function addAds()
    {
        return view('admin.pages.addads');  // Buat view ads/create.blade.php
    }

    // Form edit iklan
    public function editAds($id)
    {
        $ad = Ad::findOrFail($id);
        return view('admin.pages.editads', compact('ad'));  // Buat view ads/edit.blade.php
    }
      
    public function users()
    {
        $users = User::all();
        return view('admin.pages.users', compact('users'));
    }
}
