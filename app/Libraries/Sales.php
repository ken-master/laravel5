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
      foreach ($data as $key => $value) {
        $res['per_item_total_price'][] = $value['price'] *  $value['qty'];
        $res['per_item_total_id'][$value['id']] = $value['price'] *  $value['qty'];
      }
    }
    //construct data
    $data = [];
    $data['sub_total'] = money_format('%i', array_sum($res['per_item_total_price']) );
    $data['tax'] = money_format('%i',0);
    $data['discount'] = money_format('%i',0);

    $total = $data['sub_total'] + $data['tax'] + $data['discount'];
    $data['total'] =  money_format('%i',$total);

    //dd($data);
    return $data;
  }

}
