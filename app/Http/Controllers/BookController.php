<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('find'))
         {
          $data_book = \App\Models\Book::where('title', 'LIKE','%' .$request->find. '%')->get();
        }
        else
        {
            $data_book = \App\Models\Book::all();
        }
        return view('book.index',['data_book' => $data_book]);
    }
    public function viewOnly(Request $request)
    {
      if($request->has('find'))
       {
        $data_book = \App\Models\Book::where('title','LIKE','%' .$request->find. '%')->get();
      }
      else
      {
          $data_book = \App\Models\Book::all();
      }
      return view('our-collections',['data_book' => $data_book]);
    }
    public function viewList(Request $request)
    {
      if($request->has('find'))
       {
        $data_book = \App\Models\Book::where('title','LIKE','%' .$request->find. '%')->get();
      }
      else
      {
          $data_book = \App\Models\Book::all();
      }
      return view('book.list',['data_book' => $data_book]);
    }
    public function create(Request $request)
    {
      \App\Models\Book::create($request->all());
      return redirect('/book')->with('success','New book has successfully added!');
    }
    public function edit($id)
    {
      $book = \App\Models\Book::find($id);
      return view('book/edit', ['book' => $book]);
    }
    public function update(Request $request, $id)
    {
      $book = \App\Models\Book::find($id);
      $book->update($request->all());
      return redirect('/book')->with('success','Book details has successfully updated!');
    }
    public function delete($id)
    {
      $book = \App\Models\Book::find($id);
      $book->delete();
      return redirect('/book')->with('success','Book details has successfully deleted!');
    }

}
