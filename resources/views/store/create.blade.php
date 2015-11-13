@extends('layout')



@section('content')
<div class="row">
<form role="form" action="{{{ route('store.store') }}}" method="POST" >
<div class="col-md-4">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Store List</h3> - <a href="{{ route('store.index') }}">Go back</a>
    </div><!-- /.box-header -->
    <!-- form start -->
   
        <div class="box-body">
            
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            

            <div class="form-group">
                <label for="name">Name:</label> <span class="text-red">{{ $errors->first('name') }}</span>
                <input type="input" name="name" class="form-control" id="name" placeholder="Enter Store Name" value="{{ old('name') }}">
            </div>


             <div class="form-group">
                <label for="exampleInputEmail1">Description:</label> <span class="text-red">{{ $errors->first('description') }}</span>
                <input type="input" name="description" class="form-control" id="description" placeholder="Enter Description" value="{{ old('description') }}">
            </div>


            <button class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#modalProducts">Select Products</button>

            <div class="modal" id="modalProducts">
                <div class="modal-dialog" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Product List</h4>
                        </div>
                        <div class="modal-body"  >

                            <div class="form-group" style="max-height:250px;overflow-y:scroll">
                                <label>Products:</label>
                                @foreach( $products as $key => $value )
                                <div>{!! Form::checkbox( 'products[]', $key ,null, array( 'data-value'=> $value, 'class' => 'product-checkbox' ) ) !!} {{$value}}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">

                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Assign Products</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

<!--             <div class="form-group">
                <label for="full_name">Is Active:</label>
                {!! Form::checkbox('is_active', '1') !!}
            </div> -->



        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
       
    
    </div>
</div>




</form>
</div>
@endsection