<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ActivateController extends Controller
{

    // private static $activationView = 'auth.activation';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function activate($token)
    {
        // return view($this->getActivationView())->with($data);
    }

    public function verify($token)
    {
        $user = User::where('token', $token)
        ->firstOrFail()
        ->update(['token' => null]);

        return redirect('home')->with('success', 'Account verified');
    }

}
