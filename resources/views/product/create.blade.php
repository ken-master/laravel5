@extends('layout')



@section('content')
<div class="row">

    {!! Form::open(
        array(
            'route' => array('product.store'),
            'method' => 'POST'
        )
    ) !!}
<div class="">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Product List</h3> - <a href="{{ route('product.index') }}">Go back</a>
    </div><!-- /.box-header -->
    <!-- form start -->
   
        <div class="box-body">
            

            <button class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#modelVendor">Select Vendors</button>

            <div class="modal" id="modelVendor">
              <div class="modal-dialog" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Vendor List</h4>
                  </div>
                  <div class="modal-body"  >
                     <div class="form-group" style="max-height:250px;overflow-y:scroll">
                        <label>Vendor:</label> <span class="text-red">{{ $errors->first('vendor_id') }}</span>
                        @foreach( $vendors as $key => $value )
                         <div>{!! Form::checkbox( 'vendors[]', $key ,null, array( 'data-value'=> $value, 'class' => 'vendor-checkbox' ) ) !!} {{$value}}</div>
                         @endforeach
                    </div>
                  </div>
                  <div class="modal-footer">
                    
                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Assign Vendor</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>


            <div class="form-group">
                <label for="full_name">Product Name:</label> <span class="text-red">{{ $errors->first('name') }}</span>
                <input type="input" name="name" class="form-control" id="name" placeholder="Enter Product Name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="full_name">SKU:</label> <span class="text-red">{{ $errors->first('sku') }}</span>
                <input type="input" name="sku" class="form-control" id="sku" placeholder="Enter SKU" value="{{ old('sku') }}">
            </div>


            <div class="form-group">
                <label for="full_name">Brand Name:</label> <span class="text-red">{{ $errors->first('brand') }}</span>
                <input type="input" name="brand" class="form-control" id="brand" placeholder="Enter Brand Name" value="{{ old('brand') }}">
            </div>


            <div class="form-group">
                <label for="full_name">Manufacturer SKU:</label> <span class="text-red">{{ $errors->first('manufacturer_sku') }}</span>
                <input type="input" name="manufacturer_sku" class="form-control" id="manufacturer_sku" placeholder="Enter Manufacturer SKU" value="{{ old('manufacturer_sku') }}">
            </div>

             <div class="form-group">
                <label for="full_name">Bar Code:</label> <span class="text-red">{{ $errors->first('barcode') }}</span>
                <input type="input" name="barcode" class="form-control" id="barcode" placeholder="Enter Bar Code" value="{{ old('barcode') }}">
            </div>

            <div class="form-group">
                <label for="full_name">Price:</label> <span class="text-red">{{ $errors->first('price') }}</span>
                <input type="input" name="price" class="form-control" id="price" placeholder="Enter Price" value="{{ old('price') }}">
            </div>

             <div class="form-group">
                <label for="full_name">Price1:</label> <span class="text-red">{{ $errors->first('price1') }}</span>
                <input type="input" name="price1" class="form-control" id="price1" placeholder="Enter Price1" value="{{ old('price1') }}">
            </div>

            <div class="form-group">
                <label for="full_name">Price2:</label> <span class="text-red">{{ $errors->first('price2') }}</span>
                <input type="input" name="price2" class="form-control" id="price2" placeholder="Enter Price2" value="{{ old('price2') }}">
            </div>

            <div class="form-group">
                <label for="full_name">Lower Limit:</label> <span class="text-red">{{ $errors->first('lower_limit') }}</span>
                <input type="input" name="lower_limit" class="form-control" id="lower_limit" placeholder="Enter Lower Limit" value="{{ old('lower_limit') }}">
            </div>


            <div class="form-group">
                <label for="full_name">Higher Limit:</label> <span class="text-red">{{ $errors->first('higher_limit') }}</span>
                <input type="input" name="higher_limit" class="form-control" id="higher_limit" placeholder="Enter Higher Limit" value="{{ old('higher_limit') }}">
            </div>

            <?php /*
            <div class="form-group">
                <label for="full_name">Minimum Qty:</label> <span class="text-red">{{ $errors->first('min_qty') }}</span>
                <input type="input" name="min_qty" class="form-control" id="min_qty" placeholder="Enter Minimum Qty" value="{{ old('min_qty') }}">
            </div>

             <div class="form-group">
                <label for="full_name">Maximum Qty:</label> <span class="text-red">{{ $errors->first('max_qty') }}</span>
                <input type="input" name="max_qty" class="form-control" id="max_qty" placeholder="Enter Maximum Qty" value="{{ old('max_qty') }}">
            </div>
            */
            ?>
            <div class="form-group">
              <label>Description</label>
              <textarea name="description" class="form-control" id="description" rows="3" placeholder="Description ...">{{ old('description') }}</textarea>
            </div>

        

        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
       
    
    </div>
</div>




{!! Form::close() !!}
</div>
@endsection


@section('footer_scripts')
 
  <script type="text/javascript">
  $(document).ready(function(){

    //clear vendor checboxes
    $('.clear-data').click(function(){
        $('.vendor-checkbox').removeAttr('checked');
    });

  });

  </script>


@endsection