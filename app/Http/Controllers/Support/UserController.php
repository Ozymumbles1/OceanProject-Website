<?php

namespace App\Http\Controllers\Support;

use DB;
use Validator;
use Input;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilities\xat;

class UserController extends Controller {

	public function showUsers() {

		$users = DB::table('users')->paginate(25);

		return view('support.users')
			->withUsers($users);

	}

	public function showEditUser(User $user) {
		
		return view('support.showedituser')
			->with('user', $user);

	}

	public function editUser(Request $request, User $user) {

		$data = $request->all();

		$rules = [
			'email'   => 'email|max:100|unique:users',
			'xatid'   => 'integer|unique:users',
			'regname' => 'max:50|unique:users',
		];

		$validator = Validator::make(
			Input::only('email', 'xatid', 'regname'),
			$rules
		);

		$validator->after(function($validator) use ($data, $user) {

			if (!empty($data['xatid'])) {
				if (!xat::isValidXatID($data['xatid'])) {
					$validator->errors()->add('xatid', 'The xatid is not valid!');
				} elseif (!xat::isXatIDExist($data['xatid'])) {
					$validator->errors()->add('xatid', 'The xatid does not exist!');
				}
			}

			if (!empty($data['regname'])) {
				if (!xat::isValidRegname($data['regname'])) {
					$validator->errors()->add('regname', 'The regname is not valid!');
				} elseif (!xat::isRegnameExist($data['regname'])) {
					$validator->errors()->add('regname', 'The regname does not exist!');
				}
			}

		});

		if ($validator->fails()) {
			return redirect()
				->route('panel.support.edituser', $user->id)
				->withErrors($validator)
				->withInput();
		}

		if (!empty($data['regname'])) {
			$user->regname = $data['regname'];
		}

		if (!empty($data['xatid'])) {
			$user->xatid = $data['xatid'];
		}

		if (!empty($data['email'])) {
			$user->email = $data['email'];
		}

		$user->save();

		return redirect()
				->route('panel.support.edituser', $user->id)
				->with('success', 'Information updated!');

	}

}

?>