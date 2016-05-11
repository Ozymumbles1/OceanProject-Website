<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Auth;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Utilities\xat;

class AuthController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/panel';

	protected $username = 'name';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware($this->guestMiddleware(), ['except' => [
			'logout',
			'showUpdateForm',
			'update'
			]
		]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name'     => 'required|max:50|unique:users',
			'email'    => 'required|email|max:100|unique:users',
			'xatid'    => 'required|integer|unique:users',
			'regname'  => 'required|max:50|unique:users',
			'password' => 'required|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  Request  $request
	 * @return User
	 */
	protected function create(Request $request)
	{
		$data = $request->all();

		$user = User::create([
			'name'     => $data['name'],
			'email'    => $data['email'],
			'xatid'    => $data['xatid'],
			'regname'  => $data['regname'],
			'password' => bcrypt($data['password']),
			'ip'       => $request->ip(),
		]);

		$user->attachRole(5);

		return $user;
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function register(Request $request)
	{
		$data      = $request->all();
		$validator = $this->validator($data);

		$validator->after(function($validator) use ($data) {

			if(!xat::isValidXatID($data['xatid'])) {
				$validator->errors()->add('xatid', 'The xatid is not valid!');
			} else if(!xat::isXatIDExist($data['xatid'])) {
				$validator->errors()->add('xatid', 'The xatid does not exist!');
			}

			if(!xat::isValidRegname($data['regname'])) {
				$validator->errors()->add('regname', 'The regname is not valid!');
			} else if(!xat::isRegnameExist($data['regname'])) {
				$validator->errors()->add('regname', 'The regname does not exist!');
			}

		});

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}

		Auth::guard($this->getGuard())->login($this->create($request));

		return redirect($this->redirectPath());
	}

	public function update(Request $request) {

		$user = Auth::user();
		$data = $request->all();

		$rules = [
			'email'        => 'email|max:100|unique:users',
			'xatid'        => 'integer|unique:users',
			'regname'      => 'max:50|unique:users',
			'old_password' => 'min:6',
			'new_password' => 'min:6|different:old_password',
		];

		$validator = Validator::make(
			Input::only('email', 'xatid', 'regname', 'old_password', 'new_password'),
			$rules
		);

		$validator->after(function($validator) use ($data, $user) {

			if(!empty($data['old_password'])) {
				if(!Hash::check($old_password, $user->password)){
					$validator->errors()->add('old_password', 'Wrong password!');
				}
			}

			if(!empty($data['xatid'])) {
				if(!xat::isValidXatID($data['xatid'])) {
					$validator->errors()->add('xatid', 'The xatid is not valid!');
				} else if(!xat::isXatIDExist($data['xatid'])) {
					$validator->errors()->add('xatid', 'The xatid does not exist!');
				}
			}

			if(!empty($data['regname'])) {
				if(!xat::isValidRegname($data['regname'])) {
					$validator->errors()->add('regname', 'The regname is not valid!');
				} else if(!xat::isRegnameExist($data['regname'])) {
					$validator->errors()->add('regname', 'The regname does not exist!');
				}
			}

		});

		if ($validator->fails()) {
			return redirect()
				->route('panel.user.profile')
				->withErrors($validator)
				->withInput();
		}

		if(!empty($data['regname'])) {
			$user->regname = $data['regname'];
		}

		if(!empty($data['xatid'])) {
			$user->xatid = $data['xatid'];
		}

		if(!empty($data['email'])) {
			$user->email = $data['email'];
		}

		if(!empty($data['old_password'])) {
			$user->password = Hash::make($data['new_password']);
		}

		$user->save();

		return redirect()
				->route('panel.user.profile')
				->withSuccess('Information updated!');

	}

	public function showUpdateForm() {
		$user = Auth::user();

		return view('auth.profile')->with('user', $user);
	}

}
