@extends('layout')



@section('content')

<div class="row">
  <div class="col-md-12 col-xs-12">
              <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>Create Sale</h3>
        <p><a href="{{ route('sales.index') }}">Go back</a></p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>

      </a>
    </div>
  </div>
</div>

<?php /*
<div class="row">

    {!! Form::open(
        array(
            'route' => array('sales.store'),
            'method' => 'POST'
        )
    ) !!}
    <div class="col-md-8 col-xs-8">
        <div class="box box-primary">
        <div class="box-header  with-border">

        </div><!-- /.box-header -->
        <!-- form start -->

            <div class="box-body">

                <div class="form-group">
                    <label for="full_name">Invoce Code:</label> <span class="text-red"></span>
                    <input type="input" name="sales_code" class="form-control" id="sales_code" disabled="disabled"  value="XXX1234">
                </div>

                <div class="form-group">
                    <label for="full_name">Vendor Name:</label> <span class="text-red">{{ $errors->first('name') }}</span>
                    <input type="input" name="vendor" class="form-control" id="name" placeholder="Enter Product Name" value="{{ old('name') }}">
                </div>

            </div><!-- /.box-body -->



        </div>
    </div>
</div>
*/ ?>



<div class="row">
<div class="col-md-8 col-xs-8">
  <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Products</h3>
                     <div class="box-tools">

                    </div>
                  </div><!-- /.box-header -->



                  <div class="box-body">


                  <h4 class="box-title">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelProduct">Select Product</button>

                  </h4>



                    <table class="table table-bordered" id="products_added">
                      <tr>
                        <th style="width: 10px">#id</th>
                        <th>Product Name</th>
                        <th>Sku</th>
                        <th>Brand</th>
                        <th>Quantity</th>

                        <th><span class="pull-right">Actions</span></th>
                      </tr>
                      <tr></tr>


                    </table>
                  </div><!-- /.box-body -->

  </div><!-- /.box -->
</div>
</div>


<div class="row">
<div class="col-md-8 col-xs-8">
  <div class="box">
  <div class="box-header with-border">
  </div><!-- /.box-header -->

      <div class="box-body">


        <dl class="dl-horizontal pull-right">
          <dt>Sub Total:</dt>
          <dd id="sub_total">00.00</dd>

          <dt>Tax:</dt>
          <dd id="tax">00.00</dd>

          <dt>Discount:</dt>
          <dd id="discount">00.00</dd>

          <hr />
          <dt>Total:</dt>
          <dd id="total">00.00</dd>
        </dl>


      </div>

      {!! Form::open(
          array(
              'route' => array('sales.store'),
              'method' => 'POST'
          )
      ) !!}

      {!! Form::hidden("items", "", ['id' => 'items']) !!}

      <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right">Save</button>
      </div>
      {!! Form::close() !!}

  </div>
</div>



</div>

{!! Form::close() !!}



</div>


<!-- MODAL -->
<div class="modal" id="modelProduct">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Products Search</h4>
      </div>
      <div class="modal-body"  >

         <div class="form-group">

            <label>Search Product:</label>

            <select class="form-control select2"  style="width: 100%;">
            </select>

            <hr />

            <!-- product info -->
           <div class="with-border">
              <div class="box box-solid">
                <div class="box-header with-border">

                  <h3 class="box-title">Product Info</h3>
                </div><!-- /.box-header -->
                <div class="box-body">


                  <dl id="product_info">
                  </dl>


                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

        </div>
      </div>
      <div class="modal-footer">

        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
        <button type="button" id="add_product" class="btn btn-primary" data-dismiss="modal">Add Product</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- END MODAL -->

@endsection


@section('footer_scripts')

<script type="text/javascript" src="/plugins/select2/select2.full.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

  $(".select2").select2({
    placeholder: "Enter Product Name",
    allowClear: true,
    ajax: {
      url: '/ajax-get-name-product',
      dataType: 'json',
      delay: 250, // delay 1.8 seconds before firing the ajax
      data: function (params) {
        return {
         q: params.term, // search term
         page: params.page
        };
      },
      processResults: function (data, params) {
          // parse the results into the format expected by Select2
          // since we are using custom formatting functions we do not need to
          // alter the remote JSON data, except to indicate that infinite
          // scrolling can be used
          params.page = params.page || 1;
          //console.log(data.name);
          return {
            results: data,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        },
        cache: true
      },

      escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
      minimumInputLength: 3,
      templateResult: formatProduct,
      templateSelection: formatProductSelection
  });

  //FILL the product INfo Box
  $(".select2").on('select2:select', function(evt){

      //clear info
      $("#product_info").html("");

          //get the selectted data
        var args = JSON.stringify(evt.params, function (key, value) {

          if (value && value.nodeName) return "[DOM node]";
          if (value instanceof $.Event) return "[$.Event]";

          var productData = value.data;

          var productFormatHtml = "<dt>Product Name:</dt><dd data-productid='"+productData.id+"'>"+productData.name+"</dd>";
              productFormatHtml += "<dt>Description</dt>";
              productFormatHtml += "<dd>"+productData.description+"</dd>";

          $("#product_info").html(productFormatHtml);


          //ADD to the listed product
          $("#add_product").on('click',function(){

                var tableProductList = "";

                  tableProductList += "<tr>";
                  tableProductList += "<td>"+productData.id+"</td>";
                  tableProductList += "<td>"+productData.name+"</td>";
                  tableProductList += "<td>"+productData.sku+"</td>";
                  tableProductList += "<td>"+productData.brand+"</td>";
                  tableProductList += "<td><input class='product_item' type='text' value='1' data-productid='"+productData.id+"' /></td>";
                  tableProductList += "<td><a href='javascript:void(0)'  class='pull-right remove'>Remove</a></td>";
                  tableProductList += "</tr>";

              $("#products_added").append(tableProductList);


              var products = []; //prep object
              $(".product_item").each(function(index, value){
                products.push( {"id":$(this).data('productid'),"qty":$(this).val()} );
              });
              var json_product = JSON.stringify(products);
              $("#items").val(json_product);
            //calculate
              calculateAjaxSales(json_product);

              $(this).unbind( "click" ); //unbind the current click to reinitialize always at the end
          });




        });
  }); //end select2

  //on change
  $("#products_added").on('keyup','.product_item',function(){
    var products = []; //prep object
    $(".product_item").each(function(index, value){
      products.push( {"id":$(this).data('productid'),"qty":$(this).val()} );
    });
    var json_product = JSON.stringify(products);
    calculateAjaxSales(json_product);
  });

  //on remove
  $("#products_added").on('click','.remove',function(){

    $(this).parent().parent().remove();
    var products = []; //prep object
    $(".product_item").each(function(index, value){
      products.push( {"id":$(this).data('productid'),"qty":$(this).val()} );
    });
    var json_product = JSON.stringify(products);

    calculateAjaxSales(json_product);
  });


  function calculateAjaxSales(data)
  {
    $.ajax({
      url: '/ajax-sales-calculate',
      dataType: 'json',
      data: "data="+data,
      method: 'post',
      beforeSend: function (xhr) {
          //send token first
          var _token = "<?= csrf_token() ?>";
          if(_token){
            return xhr.setRequestHeader('X-CSRF-TOKEN', _token);
          }
      },
      success: function(data){
        $('#sub_total').html(data.sub_total);
        $('#tax').html(data.tax);
        $('#discount').html(data.discount);
        $('#total').html(data.total);

      }
    });
  }

  //used in select2 to format the dropdown
  function formatProduct(product) {

    if (product.loading) return product.text;
    var markup = "<div>"+product.name+"</div>";
    if (product.description) {
      markup += "<div>" + product.description + "</div>";
    }
    return markup;
  }
   //used in select2 to format the dropdown
  function formatProductSelection(product) {
    return product.name || product.text;
  }



}); //end document ready

</script>


@endsection
