<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('Auth/login');
	}

	public function register()
	{
		return view('Auth/register');
	}

	public function user()
	{
		return view('user/index');
	}
}
