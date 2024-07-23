<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::orderByDesc('id')->get();

        foreach ($reviews as $review) :
            $review['rating'] = ($review->kualitasProduk + $review->layananJasa) * 0.5;
        endforeach;

        return view('review', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // tampilan input data review

        return view('review');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
            Disini method buat nambahin data sama validasinya,
            nanti tinggal di kasih alert (pemberitahuan) di view kalo validasinya ngga terpenuhi
        */
        $request->validate([
            'kualitasProduk' => 'required|numeric|between:1,5',
            'layananJasa' => 'required|numeric|between:1,5',
            'nama' => 'required',
            'pesan' => 'required'
        ]);

        // $ulasan = new Review();
        // $ulasan->kualitasProduk = $request->kualitasProduk;
        // $ulasan->layananJasa = $request->layananJasa;
        // $ulasan->nama = $request->nama;
        // $ulasan->pesan = $request->pesan;
        // $ulasan->save();
        Review::create($request->all());

        // disini bakal redirect ke view 'review' nnti bebas mau di tambah flashdata juga boleh,
        // redirect ke view lain juga bisa
        return redirect()->back()->with('message', 'Berhasil Menambahkan Review');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
