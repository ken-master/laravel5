<?php 
namespace App\Http\Controllers\Vendor;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


//HTTP Requests
use App\Http\Requests\Vendor\VendorCreateRequest;
use App\Http\Requests\Vendor\VendorUpdateRequest;


//Services
use App\Services\VendorService;


class VendorController extends Controller
{
    protected $vendorService;

    public function __construct(VendorService $vendorService)
    {
        $this->vendorService = $vendorService;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $data = $this->vendorService->get();
		return view('vendor.index')->with('data', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('vendor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(VendorCreateRequest $request)
    {
        $this->vendorService->save( $request->all() );
        return redirect( '/vendor' )->with('message', 'Successfully Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

//dd($this->vendorService->getProductsByVendorId($id));

		$data['vendor'] = $this->vendorService->get($id);
		$data['productsBelongsToVendor'] = $this->vendorService->getProductsByVendorId($id);
		//$data['productNotBelongsToVendor'] = $this->vendorService->getAllProductNotVendor($id)->product;
		//dd( $data['productsBelongsToVendor']);
		//dd( $data['productNotBelongsToVendor']);
		return view('vendor.show',$data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$data['vendor'] = $this->vendorService->get($id);

		return view('vendor.edit',$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, VendorUpdateRequest $request)
	{	
		$data = array_add( $request->all(), 'id', $id );
		$s = $this->vendorService->save( $data );
        return redirect( '/vendor/'.$id.'/edit' )->with('message', 'Sucessfully Updated Vendor');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}

	

	public function removeProducts(Request $request,$vendorId)
	{
		dd($vendorId);
		$this->vendor->removeProductsToVendor($request->all());
		return redirect( '/vendor/'.$vendorId.'/remove-products' )->with('message', 'Sucessfully Remove Products');
	}


	public function assignProducts(Request $request)
	{	
		$data['vendor'] = $this->vendorService->get($request->vendorId);
		$data['productNotBelongsToVendor'] = $this->vendorService->getAllProductNotVendor($request->vendorId);
		//dd($data['productNotBelongsToVendor']);
		return view("vendor.assign-products", $data);
	}


	public function assignProductsUpdate(Request $request,$vendorId)
	{
		dd($vendorId);
		
		$this->vendor->assignProductsToVendor( $request->all() );
		return redirect( '/vendor/'.$vendorId.'/assign-products' )->with('message', 'Sucessfully Assign Products');
	}


}
