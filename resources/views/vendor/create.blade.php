@extends('layout')



@section('content')
<div class="row">
<form role="form" action="{{{ route('vendor.store') }}}" method="POST" >
<div class="col-md-4">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Vendors List</h3> - <a href="{{ route('vendor.index') }}">Go back</a>
    </div><!-- /.box-header -->
    <!-- form start -->
   
        <div class="box-body">
            
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            

            <div class="form-group">
                <label for="vendor_name">Vendor Name:</label> <span class="text-red">{{ $errors->first('vendor_name') }}</span>
                <input type="input" name="vendor_name" class="form-control" id="name" placeholder="Enter Vendor Name" value="{{ old('vendor_name') }}">
            </div>


             <div class="form-group">
                <label for="exampleInputEmail1">Description:</label> <span class="text-red">{{ $errors->first('description') }}</span>
                <input type="input" name="vendor_desc" class="form-control" id="description" placeholder="Enter Description" value="{{ old('vendor_desc') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Zip:</label> <span class="text-red">{{ $errors->first('zip') }}</span>
                <input type="input" name="zip" class="form-control" id="zip" placeholder="Enter Zip" value="{{ old('zip') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Barangay:</label> <span class="text-red">{{ $errors->first('barangay') }}</span>
                <input type="input" name="barangay" class="form-control" id="barangay" placeholder="Enter Barangay" value="{{ old('barangay') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Address1:</label> <span class="text-red">{{ $errors->first('address1') }}</span>
                <input type="input" name="address1" class="form-control" id="address1" placeholder="Enter Address1" value="{{ old('address1') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Address2:</label> <span class="text-red">{{ $errors->first('address2') }}</span>
                <input type="input" name="address2" class="form-control" id="address2" placeholder="Enter Address2" value="{{ old('address2') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone:</label> <span class="text-red">{{ $errors->first('phone') }}</span>
                <input type="input" name="phone" class="form-control" id="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone2:</label> <span class="text-red">{{ $errors->first('phone2') }}</span>
                <input type="input" name="phone2" class="form-control" id="description" placeholder="Enter Phone2" value="{{ old('phone2') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Mobile:</label> <span class="text-red">{{ $errors->first('mobile') }}</span>
                <input type="input" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile" value="{{ old('mobile') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Mobile2:</label> <span class="text-red">{{ $errors->first('mobile2') }}</span>
                <input type="input" name="mobile2" class="form-control" id="mobile2" placeholder="Enter Mobile2" value="{{ old('mobile2') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email:</label> <span class="text-red">{{ $errors->first('email') }}</span>
                <input type="input" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Website:</label> <span class="text-red">{{ $errors->first('website') }}</span>
                <input type="input" name="website" class="form-control" id="website" placeholder="Enter Website" value="{{ old('website') }}">
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