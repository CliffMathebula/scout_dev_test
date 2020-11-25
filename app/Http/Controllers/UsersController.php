<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function show_listed_users()
    {
            $users = DB::table('users')->get();
            return view('welcome', ['users' => $users]);
    }

    //select logged in user to update records
    public function select(Request $request)
    {
        //request user id from the uri
        $id = $request['id'];

        //checks if the user is currently logged in and redirect the user to login is user is not logged in 
        if (Auth::user()) {
            $user_details = User::where('id', $id)->orderBy('id', 'desc')->get();
            return view('view_details', ['user_details' => $user_details]);
        }
        return redirect('login');
    }

    //method to update user details
    public function update(Request $request)
    {
        // validate form inputs
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'surname' => ['required', 'string', 'max:30'],
            'username' => ['required', 'string', 'max:30'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'job_title' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        

        // Request user inputs from the form
        $id = $request->input('id');

        //performs update of user details
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->mobile = $request->input('mobile');
        $user->job_title = $request->input('job_title');
        $user->bio = $request->input('bio');
        //$user->email = $request->input('email');
        //$user->password =  Hash::make($request->input('password'));
        $user->save();

        return ('<script type="text/javascript">
                alert("User Details Updated Successfully!");
                window.location.href = "home";
                </script>');
    }
}
