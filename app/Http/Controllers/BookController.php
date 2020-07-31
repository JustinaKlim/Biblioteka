<?php

namespace App\Http\Controllers;
use App\Author;
use Validator;
use App\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors = Author::all();
        $selectId = 0;
        $sort = '';

        if ($request->author_id) {

            if ($request->sort) {
                if ($request->sort == 'title') {
                    $books = Book::where('author_id', $request->author_id)->orderBy('title')->get();
                    $sort = 'title';
                }
                elseif ($request->sort == 'pages') {
                    $books = Book::where('author_id', $request->author_id)->orderBy('pages')->get();
                    $sort = 'pages';
                }
                else {
                    $books = Book::all();
                }

            }
            else {
                $books = Book::where('author_id', $request->author_id)->get();
            }

            
            $selectId = $request->author_id;
        }

        else {
            
            if ($request->sort) {
                if ($request->sort == 'title') {
                    $books = Book::orderBy('title')->get();
                    $sort = 'title';
                }
                elseif ($request->sort == 'pages') {
                    $books = Book::orderBy('pages')->get();
                    $sort = 'pages';
                }
                else {
                    $books = Book::all();
                }

            }
            else {
                $books = Book::all();
            }
        }

        


        return view('book.index', compact('books','authors', 'selectId', 'sort'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]);
 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        $validator = Validator::make($request->all(),
        [
            'book_title' => ['required', 'min:3', 'max:64'],
        ],
        [
        'book_title.min' => 'Knygos pavadinimas per trumpas'
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sekmingai įrašytas.');

    
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
       return view('book.edit', ['book' => $book, 'authors' => $authors]);

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
        $validator = Validator::make($request->all(),
        [
            'book_title' => ['required', 'min:3', 'max:64'],
        ],
        [
        'book_title.min' => 'mano zinute'
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);

        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai pakeistas.');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
