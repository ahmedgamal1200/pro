<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function edit(int $id)
    {
        if (User::find($id)) {
            $user = Auth::user();
            $pro = Profile::all();
//            dd($pro);
            return view('user.edit-profile', compact('user', 'pro'));
        } else {
            abort(404);
        }

    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:users,email,' . $id, 'max:255'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'phone_number' => ['required', 'unique:users,phone_number,' . $id, 'string'],
            'bio' => ['required', 'string'],
            'education' => ['required', 'string'],
            'skill' => ['required', 'string'],
            'location' => ['required', 'string'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'bio' => $request->bio,
        ];

        $data2 = [
            'education' => $request->education,
            'skill' => $request->skill,
            'location' => $request->location,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);
        $user->update($data);

        $profile = $user->profile;

        if ($profile) {
            // لو الـ Profile موجود
            $profile->update($data2);
        } else {
            // لو الـ Profile مش موجود، هنعمل create جديد
            $user->profile()->create($data2);
        }

        return redirect()->back()->with('success', 'User Updated Successfully!');
    }

    public function deleteImage(int $id)
    {
        if($id){
            $user = User::find($id);
            if ($user) {
                Storage::disk('public')->delete($user->profile_picture);
                $user->update(['profile_picture' => null]);
                return redirect()->back()->with('success', 'image Deleted Successfully!');
            }
        }
        else {
            return redirect()->back()->with('error', 'cant delete image');
        }
    }

    public function updateImage(Request $request, int $id)
    {


        $request->validate([
            'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if ($request->hasFile('profile_picture')) {

            $image = $request->file('profile_picture');

            $data['profile_picture'] = $image->storeAs('/img', time() . '.' . $image->extension(), 'public');
        }

        $user = User::find($id);
        $user->update($data);
        return redirect()->back()->with('success', 'Image Updated Successfully!');

    }


    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function jobs()
    {
        $user = Auth::user();
        return view('user.jobs', compact('user'));
    }

    public function application()
    {
        $user = Auth::user();
        return view('user.job-profile', compact('user'));
    }

    public function myjobs()
    {
        $user = Auth::user();
        return view('user.myjobs', compact('user'));
    }

    public function showApplications()
    {
        $app = Apply::all();
        return view('application', compact('app'));
    }

    public function show($id)
    {
        $data = Apply::query()->findOrFail($id);
        return view('showJob', compact('data'));
    }

}

