<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin/books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin/books.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'summary' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'cover' => 'required|unique:books|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'summary' => $request->summary,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'cover' => $request->file('cover')->getClientOriginalName()
        ]);
        $request->cover->move(public_path('images'),$book['cover']);
        $book->save();
        Alert::success('Success', 'Book is added successfully');
        return redirect('admin/book');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin/books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin/books.edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'author' => 'required|string',
            'summary' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->cover != null) {
            $image_path = public_path("/images/$book->cover");
            if(file_exists($image_path)) {
                File::delete($image_path);
            }
            $book['cover'] = $request->file('cover')->getClientOriginalName();
            $request->cover->move(public_path('images'),$book['cover']);
        }
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'summary' => $request->summary,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        Alert::success('Success', 'Book is updated successfully');
        return redirect("admin/book/$book->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $image_path = public_path("/images/$book->cover");
        if(file_exists($image_path)) {
            File::delete($image_path);
        }
        Book::destroy($book->id);
        Alert::success('Success', 'Book is deleted successfully');
        return redirect('admin/book');
    }
}