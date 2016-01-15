<?php
namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Services
use App\Services\ProductService;
use App\Services\SaleService;

/**
 *  Ajax For Sales Modules
 */
class AjaxSalesController extends Controller
{

  protected $product;
  protected $sales;


  function __construct(ProductService $product, SaleService $sales)
  {
    $this->sales = $sales;
  }

  public function calculateNewSale(Request $request)
  {
    $data = $request->all();
    //print_r($request->all());exit;
    //return $this->sales->calculateSale('[{"id":2,"qty":"4"},{"id":1,"qty":"3"}]');
    $response = $this->sales->calculateSale($data['data']);
    echo json_encode($response);exit;
  }

}
