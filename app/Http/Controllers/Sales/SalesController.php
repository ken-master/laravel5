<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
//use Illuminate\Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\SaleService;

class SalesController extends Controller
{


  protected $sales;

  public function __construct(SaleService $sales)
  {
    $this->sales = $sales;
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //dd($this->sales->get());
      $data = $this->sales->get();
      return view( 'sales.index' )->with('data' , $data);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
      //  \Session::put('testkey', ['key',]);
      //  dd( \Session::get('testkey') );

        return view('sales.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * Expected data items sample
     * '[{"id":2,"qty":"4"},{"id":1,"qty":"3"}]'
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $response = "";
      if (!empty($data['items'])) {
        $response = $this->sales->save($data);
      }
      	return redirect( '/sales' )->with('message', 'Sucessfully Created Sales');
      //return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
