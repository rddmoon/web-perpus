<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(Request $request)
    {
      if($request->has('find'))
      {
          $data_staff = \App\Models\Staff::where('name','LIKE','%' .$request->find. '%')->get();
      }
      else
      {
          $data_staff = \App\Models\Staff::all();
      }
      return view('staff.index',['data_staff' => $data_staff]);
    }
    public function create(Request $request)
    {
      \App\Models\Staff::create($request->all());
      return redirect('/staff')->with('success','New staff has successfully added!');
    }
    public function edit($id)
    {
      $staff = \App\Models\Staff::find($id);
      return view('staff/edit', ['staff' => $staff]);
    }
    public function update(Request $request, $id)
    {
      $staff = \App\Models\Staff::find($id);
      $staff->update($request->all());
      return redirect('/staff')->with('success','Staff details has successfully updated!');
    }
    public function delete($id)
    {
      $staff = \App\Models\Staff::find($id);
      $staff->delete();
      return redirect('/staff')->with('success','Staff details has successfully deleted!');
    }

}
