<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::all();

        foreach ($reviews as $review) :
            $review['rating'] = ($review->kualitasProduk + $review->layananJasa) * 0.5;
        endforeach;

        return view('home', compact('reviews'));
    }
}
