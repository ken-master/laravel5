<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//HTTP Requests
use App\Http\Requests\Store\StoreCreateRequest;
use App\Http\Requests\Store\StoreUpdateRequest;


//Services
use App\Services\StoreService,
    App\Services\ProductService;

class StoreController extends Controller
{
    protected $storeService;
    protected $productService;

    public function __construct(StoreService $storeService, ProductService $productService)
    {
        $this->storeService = $storeService;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = $this->storeService->get();

        return view('store.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->productService->getAll();
        $v = [];
        if( isset($products) && !empty($products) ){
            foreach($products as $product){
                $v[$product->id] = $product->name;
            }

            $data['products'] = $v;
        }

        //
        return view('store.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreateRequest $request)
    {
        $this->storeService->save( $request->all() );
        return redirect( '/store' )->with('message', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['store'] = $this->storeService->get($id);
        $data['productsBelongsToStore'] = $this->storeService->getProductsByStoreId($id);

        return view('store.show',$data);
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
        $data['store'] = $this->storeService->get($id);

        //for dropdown
        $products = $this->productService->getAll();
        $v = [];
        if( isset($products) && !empty($products) ){
            foreach($products as $product){
                $v[$product->id] = $product->name;
            }

            $data['products'] = $v;
        }

        $data['selectedProducts'] = $data['store']->products->lists('id')->toArray() ;

//dd($data);
        return view('store.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreUpdateRequest $request)
    {
        $data = array_add( $request->all(), 'id', $id );

        if( $this->storeService->save( $data ) ){
            return redirect( '/store/'.$id.'/edit' )->with('message', 'Sucessfully Updated');
        }
        return redirect( '/store/'.$id.'/edit' )->with('message', 'Something Wrong with the Update!');


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
        $s = $this->storeService->delete( $id );
        return redirect( '/store' )->with('message', 'Successfully Deleted');
    }

    public function assignProducts(Request $request)
    {
        $data['store'] = $this->storeService->get($request->storeId);
        $data['productNotBelongsToStore'] = $this->storeService->getAllProductNotStore($request->storeId);
        //dd($data['productNotBelongsToStore']);

        return view("store.assign-products", $data);
    }

    public function assignProductsUpdate(Request $request,$storeId)
    {
        $data = array_add($request->except("_token"), 'storeId',$storeId);

        $this->storeService->assignProductsToStore( $data );
        return redirect( '/store/'.$storeId.'/assign-products' )->with('message', 'Successfully Assigned Products');
    }

}
