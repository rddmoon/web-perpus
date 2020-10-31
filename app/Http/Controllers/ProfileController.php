<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function staffIndex($id)
    {
      $data_staff = \App\Models\User::find($id);
      return view('staff.profile',['data_staff' => $data_staff]);
    }
    public function memberIndex($id)
    {
      $data_member = \App\Models\User::find($id);
      return view('member.profile',['data_member' => $data_member]);
    }
    public function adminIndex($id)
    {
      $data_admin = \App\Models\User::find($id);
      return view('admins.profile',['data_admin' => $data_admin]);
    }
}
