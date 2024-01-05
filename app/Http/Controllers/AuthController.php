<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class AuthController extends Controller
{

    public function index()
    {
        $users = User::all();
        $rayon = Rayon::all();
        return view('pages.user', compact('users', 'rayon'));
    }

    public function create(){
        return view('pages.userCreate');
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect('/user')->with('success', 'Register Success');
    }
    

    public function edit(User $user, $id)
    {
        $user = User::find($id); 
        return view('pages.userEdit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect('/user')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'Data Berhasil Dihapus');
    }

    public function login()
    {
        return view('login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if(Auth::attempt($user)) {
            $user = Auth::user();
            if ($user->role == 'user') {
                return redirect('/dashboard/User')->with('success', 'Login Success');
            } elseif ($user->role == 'admin') {
                return redirect('/dashboard')->with('success', 'Login Success');
            }

        } else {
            return back()->with('error', 'Email or Password Invalid');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout Success');
    }

}