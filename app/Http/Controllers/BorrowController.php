<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function index()
    {
      $data_borrow = \App\Models\Borrow::all();
      return view('staff.borrow-list',['data_borrow' => $data_borrow]);
    }
    public function indexMyReq()
    {
      $myid = auth()->user()->id;
      $data_borrow = \App\Models\Borrow::where('user_id', $myid)->get();
      return view('member.myRequest',['data_borrow' => $data_borrow]);
    }
    public function createRequest(Request $request,$id)
    {
      $today = Carbon::now();
      $returnd = $today->addDays(10);
      $myid = auth()->user()->id;
      $borrowRequest = new \App\Models\Borrow;
      $borrowRequest->book_id = $id;
      $borrowRequest->user_id = $myid;
      $borrowRequest->staff_id = '1';
      $borrowRequest->borrowDate = $today;
      $borrowRequest->estimatedReturnDate = $returnd;
      $borrowRequest->status = 'waiting';
      $borrowRequest->save();
      return redirect('/books')->with('success','Borrow request has successfully sent!');
    }
    public function deleteRequest($id)
    {
      $myRequest = \App\Models\Borrow::find($id);
      $myRequest->delete();
      return redirect('/borrow/request');
    }
    public function waitingAcc()
    {
      $data_borrow = \App\Models\Borrow::where('status','waiting')->get();
      return view('staff.borrow-waiting',['data_borrow' => $data_borrow]);
    }
    public function accBorrow($id)
    {
      $borrow = \App\Models\Borrow::find($id);
      $borrow->update(array('status' => 'accepted'));
      return redirect('/borrow/request');
    }
}
