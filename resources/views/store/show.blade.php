@extends('layout')



@section('content')


<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product Associated to {{ $store->name }}</h3>
                   <a class="btn btn-primary pull-right" href="/store/{{$store->id}}/assign-products">Assign Other Products</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open( array('route' => array('store.remove-products', $store->id), 'method' => 'PUT') ) !!}
                   <table class="table table-bordered">
                        <tr>
                          <th style="width: 10px">#id</th>
                          <th>Product</th>
                          <th>SKU</th>
                         
                        
                          <th class="pull-right">Remove</th>
                        </tr>
                        @if( !empty($productsBelongsToStore) && !is_null($productsBelongsToStore) )
                          @foreach($productsBelongsToStore as $productAssociated)
                          <tr>
                            <td>{{ $productAssociated->id  }}.</td>
                            <td>{{ $productAssociated->name  }}</td>
                            <td>{{ $productAssociated->sku  }}</td>


                            <td>
                                <div class="pull-left">
                                    <a class="" href="#" data-toggle="modal" data-target="#modelStore" data-productid="{{ $productAssociated->id }}">set attributes</a>
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
                    {!! $productsBelongsToStore->render() !!}
                      <!-- <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="{{$productsBelongsToStore->url(1)}}">&laquo;</a></li>
                        <li><a href="{{ $productsBelongsToStore->previousPageUrl() }}">Prev</a></li>
                        @for ( $i = 1; $i <= $productsBelongsToStore->lastPage(); $i++ )
                          <li><a href="{{ $productsBelongsToStore->url($i) }}">{{$i}}</a></li>
                        @endfor
                        <li><a href="{{ $productsBelongsToStore->nextPageUrl() }}">Next</a></li>
                        <li><a href="{{$productsBelongsToStore->url( $productsBelongsToStore->lastPage() )}}">&raquo;</a></li>
                      </ul> -->

                    </div>
                    <div class="btn-group pull-right">
                        <button type="submit" class="btn btn-primary">Remove from Store</button>
                    </div>
                    {!! Form::close() !!}


                    </div><!-- /.box-body -->
                </div><!-- /.box -->





                <div class="modal" id="modelStore">
                      
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
                                {!! Form::hidden('store_id') !!}
                                {!! Form::hidden('product_id') !!}
                             <div class="form-group" style="max-height:250px;overflow-y:scroll">

                                 <div class="form-group">
                                    <label>Reorder Level</label>
                                    {!! Form::text('lower_limit') !!}
                                </div>

                                <div class="form-group">
                                    <label>Reorder Limit</label>
                                    {!! Form::text('higher_limit') !!}
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

    var vid = '{{$store->id}}';
    //onclick modal
   $('.modal').on('shown.bs.modal',function(e){

        //clear the form first
        /**
         * NOTE: _token should not be null for form
         */

        $('input[name=product_id]').val('');
        $('input[name=lower_limit]').val('');
        $('input[name=higher_limit]').val('');


        //get product ID
        var pid = $(e.relatedTarget).attr('data-productid');

        //populate form from ajax
        $.ajax({
            url: '/ajax-store-product/'+ vid +'/'+ pid ,
            dataType: 'json',
            success:function(data){
                $('input[name=store_id]').val(data.store_id);
                $('input[name=product_id]').val(data.product_id);

                $('input[name=lower_limit]').val(data.lower_limit);
                $('input[name=higher_limit]').val(data.higher_limit);

            }
        });
   });


   //onupdate
   $("#updateAttribute").click(function(){
        
        $(".overlay").show();
        var dataform = $("#modalForm").serialize();
      
        
        $.ajax({
            url: "/ajax-store-product-update/",
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
