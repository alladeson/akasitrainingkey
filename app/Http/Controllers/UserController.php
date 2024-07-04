<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        return view('back.pages.users.index', [
            'roles' => Role::All(),
            'page_title' => "List of Users",
            'page_code' => ["settings", "users", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Users', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {
        $users = get_users_by_filter($request);
        if (!$users) {
            return response()->json(['message' => 'Users not found'], 404);
        }

        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('back.pages.users.create', [
            'roles' => [['name' => 'Commercial'], ['name' => 'Admin']],
            'page_title' => "Create User",
            'page_code' => ["settings", "users", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Users', 'route' => 'users.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        try {
            event(new Registered($user));
        } catch (\Throwable $th) {
            return redirect()->route('users.index')
            ->with('error', 'An error occur while creating the user. The user may not receive the confirmation mail.');
        }
        
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $userRole = $user->roles->first();

        return view('back.pages.users.create', [
            'roles' => [['name' => 'Commercial'], ['name' => 'Admin']],
            'user' => $user,
            'userRole' => $userRole,
            'page_title' => "Edit User",
            'page_code' => ["settings", "users", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Users', 'route' => 'users.index'],
                ['name' => 'Edit', 'route' => ''],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        try {
            if(Auth::user()->id == $id) {
                return redirect()->route('users.index')
                ->with('error', 'an error occurred while deleting the user : You can not delete yourself!');
            }
            User::find($id)->delete();
        } catch (Exception $exception) {
            return redirect()->route('users.index')
                ->with('error', 'an error occurred while deleting the user, it is probably already associated with other data.');
        }
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
