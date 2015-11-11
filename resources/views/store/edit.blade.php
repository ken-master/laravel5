@extends('layout')



@section('content')

<div class="row">

    {!! Form::open(
        array(
            'route' => array('store.update', $store->id),
            'method' => 'PUT'
        )
    ) !!}


    <div class="">
        <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edit Store</h3> - <a href="{{ route('store.index') }}">Go back</a>
        </div><!-- /.box-header -->
        <!-- form start -->

            <div class="box-body">

               <div class="form-group">
                <label for="store_name">Store Name:</label> <span class="text-red">{{ $errors->first('name') }}</span>
                <input type="input" name="name" class="form-control" id="name" placeholder="Enter Store Name" value="{{ old('name', $store->name ) }}">
                </div>


                 <div class="form-group">
                    <label for="exampleInputEmail1">Description:</label> <span class="text-red">{{ $errors->first('description') }}</span>
                    <input type="input" name="description" class="form-control" id="description" placeholder="Enter Description" value="{{ old('description', $store->description) }}">
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