<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    //
    public function showReview($userId)
    {


        return view('index', compact('review'));
    }
}
