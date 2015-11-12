@extends('layout')



@section('content')


<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product Associated to {{ $vendor->vendor_name }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open( array('route' => array('vendor.update', $vendor->vendor_id), 'method' => 'PUT') ) !!}
                   <table class="table table-bordered">
                        <tr>
                          <th style="width: 10px">#id</th>
                          <th>Product</th>
                          <th>SKU</th>
                         
                        
                          <th class="pull-right">Remove</th>
                        </tr>
                        @if( !empty($productsBelongsToVendor) && !is_null($productsBelongsToVendor) )
                          @foreach($productsBelongsToVendor as $productAssociated)
                          <tr>
                            <td>{{ $productAssociated->id  }}.</td>
                            <td>{{ $productAssociated->name  }}</td>
                            <td>{{ $productAssociated->sku  }}</td>


                            <td>
                                <div class="btn-group pull-right">
                                    {!! Form::checkbox('productAssociated[]', $productAssociated->id ) !!}
                                </div>
                           
                           </td>
                          </tr>
                            @endforeach
                       @endif


                    </table>
                    <div class="btn-group pull-right">
                        <button type="submit" class="btn btn-primary">Remove from Vendor</button>
                    </div>
                    {!! Form::close() !!}
                 </div><!-- /.box-body -->
              </div><!-- /.box -->







              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product <span class="text-red">NOT</span> Associated to {{ $vendor->vendor_name }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open( array('route' => array('vendor.update', $vendor->vendor_id), 'method' => 'PUT') ) !!}
                        <table class="table table-bordered">
                            <tr>
                              <th style="width: 10px">#id</th>
                              <th>Product</th>
                              <th>SKU</th>
                             
                            
                              <th class="pull-right">Associate</th>
                            </tr>
                            @if( !empty($productNotBelongsToVendor) && !is_null($productNotBelongsToVendor) )
                              @foreach($productNotBelongsToVendor as $productNotAssociated)
                              <tr>
                                <td>{{ $productNotAssociated->id  }}.</td>
                                <td>{{ $productNotAssociated->name  }}</td>
                                <td>{{ $productNotAssociated->sku  }}</td>

                                <td>
                                    <div class="btn-group pull-right">  
                                          {!! Form::checkbox('productNotAssociated[]', $productNotAssociated->id ) !!}
                                    </div>
                               </td>
                              </tr>
                                @endforeach
                           @endif


                        </table>

                        <div class="btn-group  pull-right">
                            <button type="submit" class="btn btn-primary">Add To Vendor</button>
                        </div>
                    {!! Form::close() !!}

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->    




  




@endsection