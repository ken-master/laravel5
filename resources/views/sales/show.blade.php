@extends('layout')



@section('content')

<div class="row">
  <div class="col-md-12 col-xs-12">
              <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>View Sale</h3>
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
<div class="col-md-8 col-xs-8">
  <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Products</h3>
                     <div class="box-tools">

                    </div>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                  
                    <table class="table table-bordered" id="products_added">
                      <tr>
                        <th style="width: 10px">#id</th>
                        <th>Product Name</th>
                        <th>Sku</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Item Total</th>
                      </tr>

                      @foreach($products as $item)
                      <tr>
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['sku']}}</td>
                        <td>{{$item['brand']}}</td>
                        <td>{{$item['quantity']}}</td>
                        <td>{{$item['total']}}</td>
                      </tr>
                     @endforeach

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
          <dd id="sub_total">{{ $data->total_subtotal }}</dd>

          <dt>Tax:</dt>
          <dd id="tax">{{ $data->total_tax }}</dd>

          <dt>Discount:</dt>
          <dd id="discount">{{ $data->total_discount }}</dd>

          <hr />
          <dt>Total:</dt>
          <dd id="total">{{ $data->total_total }}</dd>
        </dl>


      </div>



  </div>
</div>

</div>

</div>
@endsection

@section('footer_scripts')

@endsection
