<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Validator;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    //
    public function changePassword(Request $request)
    {
        if (!Hash::check($request->get('old_password'), Auth::user()->password)) {
            return redirect()->back()
                ->withErrors(['old_password' => 'The password must be the same of current password.']);
        }
        Validator::make($request->all(), [
            'old_password' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ])->validate();

        $this->user->changePassword(Auth::user(), $request->get('password'));

        return redirect()->back();
    }
}
