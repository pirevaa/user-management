<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


class AdminUsersController extends Controller
{
    /**
     * Display the admin dashboard view.
     * 
     * @return \Illuminate\View\View
     */

    public function create(Request $request) {

        if($request->input('search')) {
            $users = User::ofName($request->input('search'))->paginate(10);
        } else {
            $users = User::paginate(10);   
        }
        return view('admin.users')
                    ->with('users', $users);
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.users-edit')
                    ->with('user', $user)
                    ->with('roles', Role::with('permissions')->get());
    }

    public function update($id, Request $request) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->job_title = $request->job_title;
        $user->contact_number = $request->contact_number;

        $role = Role::where('name', $request->role)->first();

        $user->syncRoles($role); // Sync the roles so that the user can't have more than one role after being updated.

        $user->save();
        return redirect('admin/users/edit/' . $id)->with('success', 'Successfully updated user ' . $user->name . "!"); // Redirect with a success message
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin/users')->with('success', 'User has been deleted.');
    }
}
