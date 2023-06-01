<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use App\Helper\UpdateUserHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\DetailUserUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $detailUser = DetailUser::where('id', auth()->user()->id)->first();

        $nameParts = explode(' ', auth()->user()->name);

        return view('profile.index', [
            'title' => 'My Profile',
            'detailUser' => $detailUser,
            'name' => $nameParts,
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        $detailUser = DetailUser::where('user_id', auth()->user()->id)->first();
        $nameParts = explode(' ',auth()->user()->name);

        return view('profile.edit', [
            'title' => 'Profile',
            'name' => $nameParts,
            'data' => $detailUser,
        ]);
    }

    public function detailUserUpdate(DetailUserUpdateRequest $request)
    {
        $validated = $request->validated();
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validate
        $validator = $request->validated();

        // Merge for first and last name
        $validator['name'] = implode(' ',[$validator['firstName'], $validator['lastName']]);

        // drop for index first and last name
        array_splice($validator, 0,2);

        // Add +62 in first text
        $validator['no_handphone'] = '+62' . $validator['no_handphone'];    

        // Update
        UpdateUserHelper::update($validator);

        return Redirect::route('profile.edit')->with('success', 'Berhasil Mengubah Profil!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
