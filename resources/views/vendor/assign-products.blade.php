@extends('layout')



@section('content')


<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product <span class="text-red">NOT</span> Associated to {{ $vendor->vendor_name }} </h3>
                  <a class="btn btn-primary pull-right" href="/vendor/{{$vendor->id}}">Go Back</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                    {!! Form::open( array('route' => array('vendor.assign-products.update', $vendor->id), 'method' => 'POST') ) !!}
                        <table class="table table-bordered">
                            <tr>
                              <th style="width: 10px">#id</th>
                              <th>Product</th>
                              <th>SKU</th>
                             
                            
                              <th class="pull-right">Associate</th>
                            </tr>
                            @if( !empty($productNotBelongsToVendor) && !is_null($productNotBelongsToVendor) )
                              @foreach($productNotBelongsToVendor as $assignProduct)
                              <tr>
                                <td>{{ $assignProduct->id  }}.</td>
                                <td>{{ $assignProduct->name  }}</td>
                                <td>{{ $assignProduct->sku  }}</td>

                                <td>
                                    <div class="btn-group pull-right">  
                                          {!! Form::checkbox('assignProducts[]', $assignProduct->id ) !!}
                                    </div>
                               </td>
                              </tr>
                                @endforeach
                           @endif


                        </table>
                        <div class="pull-left">
                          {!! $productNotBelongsToVendor->render() !!}
                            <!-- <ul class="pagination pagination-sm no-margin pull-right">
                              <li><a href="{{$productNotBelongsToVendor->url(1)}}">&laquo;</a></li>
                              <li><a href="{{ $productNotBelongsToVendor->previousPageUrl() }}">Prev</a></li>
                              @for ( $i = 1; $i <= $productNotBelongsToVendor->lastPage(); $i++ )
                                <li><a href="{{ $productNotBelongsToVendor->url($i) }}">{{$i}}</a></li>
                              @endfor
                              <li><a href="{{ $productNotBelongsToVendor->nextPageUrl() }}">Next</a></li>
                              <li><a href="{{$productNotBelongsToVendor->url( $productNotBelongsToVendor->lastPage() )}}">&raquo;</a></li>
                            </ul> -->
                          
                          </div>
                        <div class="btn-group  pull-right">
                            <button type="submit" class="btn btn-primary">Assign To Vendor</button>
                        </div>
                    {!! Form::close() !!}

                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->    




  




@endsection