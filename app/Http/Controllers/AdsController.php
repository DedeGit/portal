<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ad::orderBy('created_at', 'desc')->get();
        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable',
            'position' => 'required|string',

            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

          $now = \Carbon\Carbon::now()->toDateString();
    $start = $validated['start_date'] ?? null;
    $end = $validated['end_date'] ?? null;

    // Tentukan is_active
    if ($start && $end && $now >= $start && $now <= $end) {
        $validated['is_active'] = 1;
    } else {
        $validated['is_active'] = 0;
    }

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/ads'), $imageName);
        }

        Ad::create(array_merge($validated, ['image' => $imageName]));

        return redirect()->route('Ads')->with('success', 'Iklan berhasil ditambahkan!');
    }

    public function show(Ad $ad)
    {
        //
    }

    public function edit(string $id)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, $id)
{
    $ad = Ad::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'url' => 'nullable', // nullable dan valid url
        'position' => 'required|string',

        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
    ]);

     $now = \Carbon\Carbon::now()->toDateString();
    $start = $validated['start_date'] ?? null;
    $end = $validated['end_date'] ?? null;

    // Tentukan is_active
    $isActive = 0;
    if ($start && $end && $now >= $start && $now <= $end) {
        $isActive = 1;
    }

    // Update data tanpa gambar dulu
    $ad->update([
        'title' => $request->title,
        'url' => $request->url,
        'position' => $request->position,
        'is_active' => $isActive,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);

    // Jika ada gambar baru, proses upload
    if ($request->hasFile('image')) {
        // Hapus file lama jika ada
        if ($ad->image && file_exists(public_path('uploads/ads/' . $ad->image))) {
            unlink(public_path('uploads/ads/' . $ad->image));
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/ads'), $imageName);

        $ad->image = $imageName;
        $ad->save(); // simpan perubahan gambar
    }

   return redirect()->back()->with('success', 'Update Iklan successfully!');
}


public function destroy($id)
{
    $ad = Ad::findOrFail($id);

    // Hapus file gambar lama jika ada
    if ($ad->image && file_exists(public_path('uploads/ads/' . $ad->image))) {
        unlink(public_path('uploads/ads/' . $ad->image));
    }

    $ad->delete();

return redirect()->back()->with('success', 'Delete Iklan successfully!');
}

}
