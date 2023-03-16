<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('profile.index', [
            'user' => $user
        ]);
    }

    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(User $user)
    {
        $attr = request()->validate([
            'username' => ['required', 'max:255', Rule::unique('users', 'username')->ignore($user->id)], // unique rule
            'image' => 'image',
            'description' => 'max:50'
        ]);

        // dd($attr);

        // if the user upload or change profile image
        if(request()->file('image')) {
            $image = uniqid() . request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('/public/profile-images', $image);

            // save name into database
            $attr['image'] = $image;
        }

        $user->update($attr);


        return redirect()->route('profile.index', auth()->user()->username)->with('success', 'Profile has been updated');
    }
}
