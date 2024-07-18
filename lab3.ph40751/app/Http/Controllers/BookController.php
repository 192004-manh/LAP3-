<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        $books = DB::table('books')
        ->join('categories', 'category_id', '=', 'categories.id')
        ->select('books.*', 'name')
        ->orderByDesc('id')
        ->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('book.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'thumbnail' => $request->input('thumbnail'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'publication' => $request->input('publication'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quanlity'),
            'category_id' => $request->input('category_id'),
        ];

        DB::table('books')->insert($data);
        return redirect()->route('book.index');
    }
    public function destroy($id){
        DB::table('books')->delete($id);
        return redirect()->route('book.index');
    }
    public function edit($id) {
        $book = DB::table('books')->where('id', $id)->first();
        if (!$book) {
            return redirect()->route('book.index')->with('error', 'Book not found.');
        }
        $categories = DB::table('categories')->get();
        return view('books.edit', compact('book', 'categories'));
    }
    public function update(Request $request, $id) {
        $data = [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'publication' => $request->input('publication'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'category_id' => $request->input('category_id'),
        ];
        if ($request->has('thumbnail')) {
            $data['thumbnail'] = $request->input('thumbnail');
        }
        DB::table('books')->where('id', $id)->update($data);
        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

}
