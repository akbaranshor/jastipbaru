<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Socialite;
use DB;

class UserController extends Controller
{
    public function getSignIn()
    {
    	return view('customer.signin');
    }

 	public function getSignUp()
    {
    	return view('customer.signup');
    }

    public function signUp(Request $request)
    {
		$user = User::create([
    		'password' => bcrypt($request->input('password')),
    		'email' => $request->input('email'),
    		'nama' => $request->input('nama'),
    		'alamat' => $request->input('alamat'),
    		'nohp' => $request->input('nohp')]);
		Auth::login($user);
    	return redirect('/');
    }

    public function logout()
    {
    	auth()->logout();
    	return redirect('/');
    }

    public function signIn(Request $request)
    {
    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('/');
        } else {
            return redirect('/signin')->with('status', 'Login Denied');
        }
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $facebook = Socialite::driver('facebook')->stateless()->user();

        $user = User::where('email', '=', $facebook->getEmail())->first();

        /*if (Auth::attempt(['email' => $facebook->getEmail()])) {
            return redirect('/');
        } else  {
            }*/

        if ($user === null) {
            $user = User::create([
                'id' =>  $facebook->getId(),
                'email' => $facebook->getEmail(),
                'nama' => $facebook->getName(),
                'password' => '',
            ]);
            
            Auth::login($user);
        } else {
            Auth::login($user);
        }
        return redirect('/');
    }
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update([
            'alamat' => $request->input('alamat'),
            'nohp' => $request->input('nohp')]);
        return redirect()->route('checkout.index');
    }

    public function profile()
    {
        $a = User::find(Auth::user()->id);    
        return view('customer.profile', compact('a'));
    }
}
