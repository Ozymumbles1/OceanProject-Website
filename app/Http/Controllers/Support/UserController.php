<?php

namespace App\Http\Controllers\Support;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

	public function showUsers() {

		$users = DB::table('users')->paginate(25);

		return view('support.users')
			->withUsers($users);

	}

}

?>