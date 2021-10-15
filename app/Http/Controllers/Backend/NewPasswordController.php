<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class NewPasswordController extends Controller
{
    public function change_password(Request $request, User $user){
        $request->validate([
            'password' =>['required', 'string','confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('message', 'User Password Changed Successfully');
    }
}