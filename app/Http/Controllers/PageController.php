<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }
    public function update_profile(Request $request, $id)
    {
        $user = User::find($id);
        if($request->hasFile('image')){
            $temp = $request->image;
            $name =  time() . $temp->getClientOriginalName();
            unlink(public_path(auth()->user()->picture));
        //    File::delete();
            print_r(public_path().auth()->user());
            $temp->move('users/images/',$name);
            $user->picture = 'users/images/'.$name;
        }
        $user->save();
        $message = "Profile Picture Updated";
        return redirect('/')->with('message',$message);
    }
}
