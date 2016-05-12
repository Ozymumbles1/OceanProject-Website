<?php

namespace App\Http\Controllers\SeniorHelper;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller {

	public function showUsers() {

		$users = DB::table('users')->paginate(25);

		return view('seniorhelper.users')
			->withUsers($users);

	}

}

?>