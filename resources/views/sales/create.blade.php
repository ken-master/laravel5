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



                    <table class="table table-bordered">
                      <tr>
                        <th style="width: 10px">#id</th>
                        <th>Product Name</th>
                        <th>Sku</th>
                        <th>Brand</th>
                        <th>Quantity</th>

                        <th class="pull-right">Actions</th>
                      </tr>

                        <tr>
                          <td> 123 </td>
                          <td> product name </td>
                          <td> product sku  </td>
                          <td> product brand  </td>
                          <td>10</td>

                          <td>
                            <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu">

                              <li><a href="">Edit</a></li>
                              <li class="divider"></li>

                              <li>

                                <a href="javascript:void(0);" onclick="">Remove</a>

                              </li>

                            </ul>
                          </div>
                         </td>
                        </tr>



                    </table>
                  </div><!-- /.box-body -->
                  <div class="box-footer clearfix">
                    <?php //  {!! $data->render() !!} ?>


                  </div>
  </div><!-- /.box -->
</div>
</div>


<div class="row">
<div class="col-md-8 col-xs-8">
  <div class="box">
  <div class="box-header with-border">
  </div><!-- /.box-header -->

      <div class="box-body">
        <div class="form-group">
            <label for="full_name">Sub Total:</label> <span class="text-red">{{ $errors->first('name') }}</span>
            <input type="input" name="sub_total" class="form-control" id="name" placeholder="Enter Product Name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="full_name">Tax:</label> <span class="text-red">{{ $errors->first('name') }}</span>
            <input type="input" name="tax" class="form-control" id="name" placeholder="Enter Product Name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="full_name">Discount:</label> <span class="text-red">{{ $errors->first('name') }}</span>
            <input type="input" name="discount" class="form-control" id="name" placeholder="Enter Product Name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="full_name">Total:</label> <span class="text-red">{{ $errors->first('name') }}</span>
            <input type="input" name="total" class="form-control" id="name" placeholder="Enter Product Name" value="{{ old('name') }}">
        </div>


      </div>

      <div class="box-footer">
          <button type="submit" class="btn btn-primary">Save</button>
      </div>


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
           
           <div class="input-group">
           <form>
             
           </form>
              <input type="text" name="product_search" id="product_search" class="form-control input-sm pull-left" style="width: 150px;" placeholder="Enter Product Name"/>
              <div class="input-group-btn pull-left">
                <button class="btn btn-sm btn-default" id="btn_productname"><i class="fa fa-search"></i></button>
              </div>
            </div>

            <hr />

            <!-- product info -->
           <div class="with-border">
              <div class="box box-solid">
                <div class="box-header with-border">
                  
                  <h3 class="box-title">Product Description</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  
                  <dl>
                      <dt>Product Name</dt>
                      <dd>Logitech G600 MMO gaming mouse.</dd>
                      
                      <dt>Euismod</dt>
                      <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                      <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                      

                      <dt>Image</dt>
                      <dt><img src=""></dt>

                  </dl>


                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

        </div>
      </div>
      <div class="modal-footer">

        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" data-dismiss="modal">Add Product</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- END MODAL -->

@endsection


@section('footer_scripts')

<script type="text/javascript">

$(document).ready(function(){

  $("#btn_productname").click(function(){
    $.ajax({
      url: '/ajax-get-name-product',
      method:'get',
      data: "q="+$('#product_search').val(),
      success: function(data){
        console.log(data);
      }
    });

  });
  

});

</script>


@endsection
