<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{



    public function auth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'tele' => 'required',
            'ville' => 'required',
        ]);


        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('car.index');
        } else {
            return redirect()->route('login')->with('error', 'email ou mot de passe est incorrect');
        }
    }

    public function show()
    {
        // $user = User::findOrFail($id);
        $user = Auth::user();
        // $user->reservations()->whereDate('dateR', '<=', now())->delete();
        $reservations = $user->reservations()->paginate(4);
        return view('users.show', compact('user','reservations'));
    }

    public function profile()
    {
        // $user = User::findOrFail($id);
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }



    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Delete the old profile photo from the 'public' disk
            Storage::disk('abdo')->delete($user->path);

            // Store the new profile photo on the 'abdo' disk
            $image = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('users', $image, 'abdo');
            $data['path'] = $path;
        }

        $data['password'] = $user->password;
        if ($request->filled('password')) {
            if ($request->input('password') !== $user->password) {
                $data['password'] = Hash::make($request->input('password'));
            }
        }

        $user->update($data);

        return redirect()->route('user.profile', $user->id);
    }


}


