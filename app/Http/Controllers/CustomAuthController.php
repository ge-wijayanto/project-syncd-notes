<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Project;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index() {
        return view('login');
    }

    public function registration() {
        return view('register');
    }

    public function customLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->remember;
        $projects = Project::all();
        if (Auth::attempt($credentials, $remember)) {
            Auth::logoutOtherDevices($request->password);
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('invalid', 'Your email and password don\'t match')->withInput();
    }

    public function customRegistration(Request $request) {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|min:5',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $this->create($data);

        return redirect()->route('login')->with('success', 'Account created successfully');
    }

    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password'])
        ]);
    }    
    
    public function dashboard() {
        if(Auth::check()){
            $projects = Project::where('user_id', Auth::id())->get();
            $participant = Participant::where('user_id', Auth::id())->get();
            
            
            foreach ($participant as $p) {
                $projects->push($p->project);
            }

            return view('dashboard',[
                'projects' => $projects,
            ]);


        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}