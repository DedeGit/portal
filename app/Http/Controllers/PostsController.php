<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  $validated = $request->validate([
        'post_title' => 'required',
        'post_url' => 'required',
        'post_description' => 'required',
        'post_content' => 'required',
        'post_status' => 'nullable',
        'main_categories' => 'nullable',
        'sub_categories' => 'nullable',
        'more' => 'nullable',
        'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imageName = null;
    if ($request->hasFile('post_image')) {
        $image = $request->file('post_image');
        $imageName = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('uploads/posts'), $imageName);
    }

    Posts::create([
        'post_author_id' => auth()->id() ?? 1,
        'post_title' => $request->post_title,
        'post_url' => $request->post_url,
        'post_description' => $request->post_description,
        'post_content' => $request->post_content,
        'post_status' => $request->post_status,
        'main_categories' => $request->main_categories,
        'sub_categories' => $request->sub_categories,
        'more' => $request->more,
        'post_image' => $imageName,
    ]);

    return redirect()->back()->with('success', 'Add Post successfully!');
}

    /**
     * Display the specified resource.
     */
    
    public function allNews()
{
    $posts = Posts::orderBy('created_at', 'desc')->get();

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

    return view('pages.berita_semua', compact('posts', 'ads', 'adsLeft', 'adsRight', 'headerAds'));
}

public function popularNews()
{
$topViewedPosts = Posts::where('views', '>=', 100)
                       ->orderBy('views', 'desc')
                       ->get();

$posts = Posts::whereIn('post_status', ['populer'])
                      ->orderBy('created_at', 'desc')
                      ->get();


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
    return view('pages.berita_popular', compact('posts', 'topViewedPosts', 'ads', 'adsLeft', 'adsRight', 'headerAds'));
}

public function hotNews()
{
    $posts = Posts::whereDate('created_at', Carbon::today())
                    ->orderBy('created_at', 'desc')
                    ->get();

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
    return view('pages.berita_hot', compact('posts', 'ads', 'adsLeft', 'adsRight', 'headerAds'));
}

    
     public function show($post_url)
    {
      // Cari artikel berdasarkan post_url
    $post = Posts::where('post_url', $post_url)->firstOrFail();
      // Tambah view count
    $post->increment('views'); // Ini otomatis +1 pada kolom 'views'
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
    return view('pages.detail', compact('trendingPosts','hotNewsPosts','post', 'ads', 'adsLeft', 'adsRight', 'headerAds', 'todayAds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validasi input tambahan, sesuaikan dengan kebutuhan
    $validated = $request->validate([
        'post_title' => 'required',
        'post_url' => 'required',
        'post_description' => 'required',
        'post_content' => 'required',
        'post_status' => 'nullable',
        'main_categories' => 'nullable',
        'sub_categories' => 'nullable',
        'more' => 'nullable',
        'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

   $post = Posts::findOrFail($id);

    // Update data yang lain
    $post->update([
        'post_title' => $request->post_title,
        'post_url' => $request->post_url,
        'post_description' => $request->post_description,
        'post_content' => $request->post_content,
        'post_status' => $request->post_status,
        'main_categories' => $request->main_categories,
        'sub_categories' => $request->sub_categories,
        'more' => $request->more,
    ]);

    // Jika ada gambar baru, simpan
if ($request->hasFile('post_image')) {
    // Hapus file lama jika ada
    if ($post->post_image && file_exists(public_path('uploads/posts/' . $post->post_image))) {
        unlink(public_path('uploads/posts/' . $post->post_image));
    }

    $image = $request->file('post_image');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('uploads/posts'), $imageName);
    $post->post_image = $imageName;
    $post->save();
}

    return redirect()->back()->with('success', 'Edit Post successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         Posts::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Delete Post successfully!');
    
    }

public function byMainCategory($main)
{
    $main = str_replace('-', ' ', $main);

    $posts = Posts::where('main_categories', $main)
                  ->orderBy('created_at', 'desc')
                  ->get();
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

    return view('pages.kategori', compact('posts', 'main', 'ads', 'adsLeft', 'adsRight', 'headerAds'));
}

public function bySubCategory($main, $sub)
{
    $main = str_replace('-', ' ', $main);
    $sub  = str_replace('-', ' ', $sub);

    $posts = Posts::where('main_categories', $main)
                  ->where('sub_categories', $sub)
                  ->orderBy('created_at', 'desc')
                  ->get();
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

    return view('pages.kategori', compact('posts', 'main', 'sub', 'ads', 'adsLeft', 'adsRight', 'headerAds'));
}

public function byMore($more)
{
    $more = str_replace('-', ' ', $more);

    $posts = Posts::where('more', $more)
                  ->orderBy('created_at', 'desc')
                  ->get();
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

    return view('pages.kategori', compact('posts', 'more', 'ads', 'adsLeft', 'adsRight', 'headerAds'));
}

public function byStatus($status)
{
    $status = str_replace('-', ' ', $status);

    $posts = Posts::where('post_status', $status)
                  ->orderBy('created_at', 'desc')
                  ->get();
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

    return view('pages.kategori', compact('posts', 'status', 'ads', 'adsLeft', 'adsRight', 'headerAds'));
}


}
