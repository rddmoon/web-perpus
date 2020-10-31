<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('find'))
         {
          $data_member = \App\Models\Member::where('name','LIKE','%' .$request->find. '%')->get();
        }
        else
        {
            $data_member = \App\Models\Member::all();
        }
        return view('member.index',['data_member' => $data_member]);
    }
    public function create(Request $request)
    {
      $user = new \App\Models\User;
      $user->role = 'member';
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->remember_token = str::random(60);
      $user->save();
      $request->request->add(['user_id' => $user->id]);
      $member = \App\Models\Member::create($request->all());
      return redirect('/member')->with('success','New member has successfully added!');
    }
    public function edit($id)
    {
      $member = \App\Models\Member::find($id);
      return view('member/edit', ['member' => $member]);
    }
    public function update(Request $request, $id)
    {
      $member = \App\Models\Member::find($id);
      $member->update($request->all());
      return redirect('/member')->with('success','Member details has successfully updated!');
    }
    public function delete($id)
    {
      $member = \App\Models\Member::find($id);
      $member->delete();
      return redirect('/member')->with('success','Member details has successfully deleted!');
    }
    public function postRegister(Request $request)
    {
      $user = new \App\Models\User;
      $user->role = 'member';
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->remember_token = str::random(60);
      $user->save();
      $request->request->add(['user_id' => $user->id]);
      $request->request->add(['address' => '-']);
      $request->request->add(['phone' => '-']);
      $request->request->add(['birth' => date('Y-m-d')]);
      $request->request->add(['idNumber' => '-']);
      $member = \App\Models\Member::create($request->all());
      return redirect('/member-profile/'.$user->id)->with('success','Hey new member, Welcome!');
    }
}
