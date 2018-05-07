<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class MapController extends Controller
{
	public function index($id)
	{	
		// kantin jatinagore -6.9331305,107.774236
		// agl -6.9329519,107.7751085
		if ($id == 1) Mapper::map(-6.933131,107.774289, ['zoom' => 21, 'center' => true]);
		else Mapper::map(-6.932955,107.775205, ['zoom' => 21, 'center' => true]);
		return view('map.map');
	}
}
