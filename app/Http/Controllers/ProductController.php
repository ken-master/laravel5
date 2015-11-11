<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


//requests
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;


//service
use App\Services\ProductService;
use App\Services\VendorService;

class ProductController extends Controller
{


    protected $product;
    protected $vendor;


    public function __construct(ProductService $product, VendorService $vendor){
        $this->product = $product;
        $this->vendor = $vendor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->product->get();
        //dd($data);
        return view('product.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $vendors = $this->vendor->getAll();
        $v = [];
        if( isset($vendors) && !empty($vendors) ){
            foreach($vendors as $vendor){
                $v[$vendor->id] = $vendor->vendor_name;
            }

            $data['vendors'] = $v;
        }
        
        

        return  view('product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {

        //dd( $request->all() );
        $this->product->save( $request->all() );
        return redirect( '/product' )->with('message', 'Sucessfully Created');
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
        //for dropdown
        $vendors = $this->vendor->getAll();
        $v = [];
        if( isset($vendors) && !empty($vendors) ){
            foreach($vendors as $vendor){
                $v[$vendor->id] = $vendor->vendor_name;
            }

            $data['vendors'] = $v;
        }
    
        $data['product'] = $this->product->get($id);        
        $data['selectedVendors'] = $data['product']->vendor->lists('id')->toArray() ;

        return  view('product.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id, ProductUpdateRequest $request)
    {
        $data = array_add( $request->all(), 'id', $id );

        if( $this->product->save( $data ) ){
             return redirect( '/product/'.$id.'/edit' )->with('message', 'Sucessfully Updated');
        }
        return redirect( '/product/'.$id.'/edit' )->with('message', 'Something Wrong with the Update!');
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
