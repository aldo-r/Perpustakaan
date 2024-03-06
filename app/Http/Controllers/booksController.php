<?php

namespace App\Http\Controllers;

use App\Models\authors;
use App\Models\books;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class booksController extends Controller
{

    public function index(Request $request)
    {
        $book = books::query(); 

        if ($request->filled('search')) { 
            $book->where('title', 'like', '%' . $request->search . '%'); 
        }
        return view('books.index', [
            'book' => $book->latest()->get(),
            'author' => authors::all(),
            'publisher' => publisher::all(),
        ]);
    }


    public function create()
    {
        return view('books.create', [
            'author' => authors::get(),
            'publisher' => publisher::get(),
        ]);
    }


    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|string|max:255',
                'year' => 'required|date',
                'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'title.required' => 'isi kolom ini',
                'year.required' => 'isi kolom ini',
                'cover.required' => 'isi kolom ini',
            ]
        );

        $book = new books();
        $cover = null;
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('/covers');
        }

        $book->title = $request->title;
        $book->year = $request->year;
        $book->author_id = $request->author_id;
        $book->publisher_id = $request->publisher_id;
        $book->cover = $cover;

        $book->save();

        return redirect()->route('books')->with('success', 'Data Berhasil Disimpan!');
    }


    public function show(string $id)
    {
        $book = books::findOrFail($id);

        return view('books.show', compact('book'));
    }


    public function edit(string $id)
    {
        $book = books::find($id);
        return view('books.edit', [
            'books' => $book,
            'author' => authors::get(),
            'publisher' => publisher::get(),
        ]);
    }


    public function update(Request $request, string $id)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|string|max:255',
                'year' => 'required|date',
                'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'title.required' => 'isi kolom ini',
                'year.required' => 'isi kolom ini',
                'cover.required' => 'isi kolom ini',
            ]
        );

        $book = books::findOrFail($id);

        $cover = $book->cover;

        if ($request->hasFile('cover')) {
            if ($book->cover !== null && Storage::exists($book->cover)) {
                Storage::delete($book->cover);
            }

            $cover = $request->file('cover')->store('/covers');
        }

        $book->title = $request->title;
        $book->year = $request->year;
        $book->author_id = $request->author_id;
        $book->publisher_id = $request->publisher_id;
        $book->cover = $cover;

        $book->save();

        return redirect()->route('books')->with('success', 'Data Berhasil Disimpan!');
    }

    public function destroy(string $id)
    {
        $book = books::find($id);
        $book->delete();
        return redirect()->route('books')->with('hapus', 'Data Berhasil Dihapus!');
    }
}
