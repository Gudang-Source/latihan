<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'title'	=> 'Home | Web Programming Unpas'
		];
		echo view('layout/header', $data);
		echo view('pages/home');
		echo view('layout/footer');
	}

	//--------------------------------------------------------------------

	public function about()
	{
		$data = [
			'title'	=> 'About | Web Programming Unpas'
		];
		echo view('layout/header', $data);
		echo view('pages/about');
		echo view('layout/footer');
	}
}
