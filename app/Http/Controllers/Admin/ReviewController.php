<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // all reviews
    public function reviews()
    {
        $reviews = Review::with('user')->get();
        return view('dashboard.reviews.reviews',[
            'reviews' => $reviews
        ]);
    }
    // delete review
    public function deleteReview($id)
    {
        $review = Review::find($id)->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }
}
