<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.user-profile', [
            'user' => $request->user(),
            'profile' => get_user_profile(),
            'wishlists' => get_wishlist(),
            'enrolled_courses' => get_enrolled_course(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $id = $user->id;
        $profile = get_user_profile();
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,'.$id,
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        ]);

        $input = $request->all();
        $input['name'] = $request->first_name . ' ' . $request->last_name;
        // dd($input);

        $user->update($input);

        $profile->update($input);

        if(Auth::user()->hasRole('Instructor'))
            return Redirect::route('instructors.edit', ['id'=>Auth::user()->id])->with('success','Profile updated successfully');

        return Redirect::route('profile.edit')->with('success','User updated successfully');
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
        $profile = get_user_profile();

        try {
            $profile->delete();
            Auth::logout();
            $user->delete();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        } catch (Exception $exception) {
            return redirect()->route('profile.edit')
                ->with('error', 'an error occurred while deleting your account, it is probably already associated with other data.');
        }
    }

    /**
     * Display the user's profile form.
     */
    public function editInstructor(Request $request): View
    {
        // dd(get_user_profile());
        return view('back.pages.instructors.edit', [
            'user' => $request->user(),
            'profile' => get_user_profile(),
            'page_title' => "Instructor",
            'page_code' => ["", "", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Instructor', 'route' => ''],
            ],
        ]);
    }

}
