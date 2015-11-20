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
                    {!! Form::open( array('route' => array('vendor.remove-products', $vendor->id), 'method' => 'PUT') ) !!}
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
                    <div class="pull-left">
                    {!! $productsBelongsToVendor->render() !!}
                      <!-- <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="{{$productsBelongsToVendor->url(1)}}">&laquo;</a></li>
                        <li><a href="{{ $productsBelongsToVendor->previousPageUrl() }}">Prev</a></li>
                        @for ( $i = 1; $i <= $productsBelongsToVendor->lastPage(); $i++ )
                          <li><a href="{{ $productsBelongsToVendor->url($i) }}">{{$i}}</a></li>
                        @endfor
                        <li><a href="{{ $productsBelongsToVendor->nextPageUrl() }}">Next</a></li>
                        <li><a href="{{$productsBelongsToVendor->url( $productsBelongsToVendor->lastPage() )}}">&raquo;</a></li>
                      </ul> -->
                    
                    </div>
                    <div class="btn-group pull-right">
                        <button type="submit" class="btn btn-primary">Remove from Vendor</button>
                    </div>
                    {!! Form::close() !!}
                 </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->    




  




@endsection