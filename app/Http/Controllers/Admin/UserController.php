<?php

namespace App\Http\Controllers\Admin;

use DB;
use Input;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Role;

class UserController extends Controller {

	public function showEditUserRole(User $user) {

		$roles = Role::lists('name', 'id')->toArray();

		$userRoles = $user->roles->map(function($item, $key){

			return $item->id;

		});

		return view('admin.edituserrole')
			->with('user', $user)
			->with('userRoles', $userRoles)
			->with('roles', $roles);

	}

	public function editUserRole(Request $request, User $user) {

		$data = $request->all();

		$user->detachAllRoles();
		
		if(!empty($data['roles'])) {
			for($i = 0; $i < sizeof($data['roles']); $i++) {
				$user->attachRole($data['roles'][$i]);
			}
		}

		return redirect()
				->route('panel.admin.edituserrole', $user->id)
				->with('success', 'Roles updated!');

	}

}

?>