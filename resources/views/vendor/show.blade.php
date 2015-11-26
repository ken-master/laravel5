@extends('layout')



@section('content')


<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product Associated to {{ $vendor->vendor_name }}</h3>
                   <a class="btn btn-primary pull-right" href="/vendor/{{$vendor->id}}/assign-products">Assign Other Products</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open( array('route' => array('vendor.remove-products', $vendor->id), 'method' => 'POST') ) !!}
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
                                <div class="pull-left">
                                    <a class="" href="#" data-toggle="modal" data-target="#modelVendor" data-productid="{{ $productAssociated->id }}">set attributes</a>
                                </div>
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





                <div class="modal" id="modelVendor">
                      
                      <div class="modal-dialog" >
                        <div class="modal-content">
                          <div class="box">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Product NAME Attributes:</h4>
                          </div>

                            <div class="modal-body"  >

                            <div class="callout callout-success" style="display:none">
                                <h4>Update Successfully!</h4>
                            </div>

                            {!! Form::open( array('id'=> 'modalForm', 'method' => 'post' ) ) !!}
                                {!! Form::hidden('vendor_id') !!}
                                {!! Form::hidden('product_id') !!}
                             <div class="form-group" style="max-height:250px;overflow-y:scroll">

                                 <div class="form-group">
                                    <label>Priority</label> 
                                    {!! Form::text('priority') !!}
                                </div>

                                <div class="form-group">
                                    <label>Min Qty</label> 
                                    {!! Form::text('min_qty') !!}
                                </div>

                                <div class="form-group">
                                    <label>Max Qty</label> 
                                    {!! Form::text('max_qty') !!}
                                </div>
                               
                                </div>
                              </div>
                              <div class="modal-footer">
                                
                                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                <button type="button" class="btn btn-primary update" id="updateAttribute" >Update</button>
                              </div>

                           {!! Form::close() !!}

                            <div class="overlay" style="display:none">
                              <i class="fa fa-refresh fa-spin"></i>
                            </div>

                           </div><!-- /.box -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->

                     

                </div>





            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->    

@endsection



@section('footer_scripts')

<script type="text/javascript">
    

$(document).ready(function(){

    var vid = '{{$vendor->id}}';
    //onclick modal
   $('.modal').on('shown.bs.modal',function(e){

        //clear the form first
        /**
         * NOTE: _token should not be null for form
         */

        $('input[name=product_id]').val('');
        $('input[name=priority]').val('');
        $('input[name=min_qty]').val('');
        $('input[name=max_qty]').val('');


        //get product ID
        var pid = $(e.relatedTarget).attr('data-productid');

        //populate form from ajax
        $.ajax({
            url: '/ajax-vendor-product/'+ vid +'/'+ pid ,
            dataType: 'json',
            success:function(data){
                $('input[name=vendor_id]').val(data.vendor_id);
                $('input[name=product_id]').val(data.product_id);

                $('input[name=priority]').val(data.priority);
                $('input[name=min_qty]').val(data.min_qty);
                $('input[name=max_qty]').val(data.max_qty);
               // console.log(data.min_qty);



            },
        });
   });


   //onupdate
   $("#updateAttribute").click(function(){
        
        $(".overlay").show();
        var dataform = $("#modalForm").serialize();
      
        
        $.ajax({
            url: "/ajax-vendor-product-update/",
            method: 'post',
            data: dataform,
            dataType: 'json',
            success: function(data){
                
                $(".overlay").hide();
                $(".callout").show();
                $(".callout").fadeOut(5000); 
            }
        });

   });
   


});

</script>


@endsection
