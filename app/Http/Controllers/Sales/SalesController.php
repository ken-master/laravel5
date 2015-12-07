<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


//HTTP Requests



//Services
use App\Services\VendorService;


class SalesController extends Controller{



	public function __construct()
	{

	}

	

	public function index()
	{
		return "THIS IS SALES";
	}

}