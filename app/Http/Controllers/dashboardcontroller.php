<?php

namespace App\Http\Controllers;

use App\Models\authors;
use App\Models\books;
use App\Models\publisher;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = books::count();
        $author = authors::count();
        $publisher = publisher::count();
        return view('dashboard', compact('book', 'author', 'publisher'));
    }
}
