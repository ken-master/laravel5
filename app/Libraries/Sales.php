<?php
namespace App\Libraries;


/**
 *
 */
class Sales
{


  /**
   * Calculate Products items
   * @param  array  $data products with qty appended
   */
  public static function calculate($data = array() )
  {
    //get ids and qty
    //each product price * qty
    //summarize total of product and qty
    //apply tax if available
    //apply discount if available
    if (!empty($data)) {
      $res = Array();
      foreach ($data as $key => $value) {
        $res[] = [
            'product_id'  => $value['id'],
            'item_price'  => $value['price'],
            'discount'    => 0,
            'total_item_price' => $value['price'] *  $value['qty'],
            'item' => $value,
        ];
      }

      //construct data
      $response = [];
      $response['sub_total'] = money_format('%i', array_sum( array_pluck($res,'total_item_price') ) );
      $response['tax'] = money_format('%i',0);
      $response['discount'] = money_format('%i',0);
      $total = $response['sub_total'] + $response['tax'] + $response['discount'];
      $response['total'] =  money_format('%i',$total);
      $response['products'] = $res;

    }else{
      $response['sub_total']  = "00.00";
      $response['tax']        = "00.00";
      $response['discount']   = "00.00";
      $response['total']      = "00.00";
      $response['products']   = [];
    }




    return $response;
  }

}
