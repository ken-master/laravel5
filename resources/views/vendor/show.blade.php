@extends('layout')



@section('content')

<div class="row">

    {!! Form::open(
        array(
            'route' => array('vendor.update', $vendor->id),
            'method' => 'PUT'
        )
    ) !!}

   
    <div class="">
        <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Vendor - {{ $vendor->vendor_name }}</h3> - <a href="{{ route('vendor.index') }}">Go back</a>
        </div><!-- /.box-header -->
        <!-- form start -->
           
            <div class="box-body">
            <h2>Vendor Associated products</h2>
               <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#id</th>
                      <th>Product</th>
                      <th>SKU</th>
                     
                    
                      <th class="pull-right">Actions</th>
                    </tr>
                    @if( !empty($productsBelongsToVendor) && !is_null($productsBelongsToVendor) )
                      @foreach($productsBelongsToVendor as $productAssociated)
                      <tr>
                        <td>{{ $productAssociated->id  }}.</td>
                        <td>{{ $productAssociated->name  }}</td>
                        <td>{{ $productAssociated->sku  }}</td>


                        <td>
                            <div class="btn-group pull-right">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu">
                            <li><a href="{{ route('vendor.show', $vendor->id) }}">Show</a></li>
                            <li><a href="{{ route('vendor.edit', $vendor->id) }}">Edit</a></li>
                            <li class="divider"></li>

                            <li>
                              {!! Form::open(array('route' => array('product.destroy', $productAssociated->id), 'method' => 'delete')) !!}
                              <a href="javascript:void(0);" onclick="$(this).closest('form').submit();">Remove</a>
                              {!! Form::close() !!}
                            </li>

                          </ul>
                        </div>
                       </td>
                      </tr>
                        @endforeach
                   @endif


                  </table>



                <h2>Products not Associated product</h2>

                <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#id</th>
                      <th>Product</th>
                      <th>SKU</th>
                     
                    
                      <th class="pull-right">Actions</th>
                    </tr>
                    @if( !empty($productNotBelongsToVendor) && !is_null($productNotBelongsToVendor) )
                      @foreach($productNotBelongsToVendor as $productNotAssociated)
                      <tr>
                        <td>{{ $productNotAssociated->id  }}.</td>
                        <td>{{ $productNotAssociated->name  }}</td>
                        <td>{{ $productNotAssociated->sku  }}</td>


                        <td>
                            <div class="btn-group pull-right">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu">
                            <li><a href="{{ route('product.show', $productNotAssociated->id) }}">Show</a></li>
                            <li><a href="{{ route('product.edit', $productNotAssociated->id) }}">Edit</a></li>
                            <li class="divider"></li>

                            <li>
                              {!! Form::open(array('route' => array('product.destroy', $productNotAssociated->id), 'method' => 'delete')) !!}
                              <a href="javascript:void(0);" onclick="$(this).closest('form').submit();">Remove</a>
                              {!! Form::close() !!}
                            </li>

                          </ul>
                        </div>
                       </td>
                      </tr>
                        @endforeach
                   @endif


                </table>




            </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

        
        </div>
    </div>


    {!! Form::close() !!}

    </div>




@endsection