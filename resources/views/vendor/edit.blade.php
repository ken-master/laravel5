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
            <h3 class="box-title">Edit Vendor</h3> - <a href="{{ route('vendor.index') }}">Go back</a>
        </div><!-- /.box-header -->
        <!-- form start -->
           
            <div class="box-body">

               <div class="form-group">
                <label for="vendor_name">Vendor Name:</label> <span class="text-red">{{ $errors->first('vendor_name') }}</span>
                <input type="input" name="vendor_name" class="form-control" id="name" placeholder="Enter Vendor Name" value="{{ old('vendor_name', $vendor->vendor_name ) }}">
                </div>


                 <div class="form-group">
                    <label for="exampleInputEmail1">Description:</label> <span class="text-red">{{ $errors->first('vendor_desc') }}</span>
                    <input type="input" name="vendor_desc" class="form-control" id="description" placeholder="Enter Description" value="{{ old('vendor_desc', $vendor->vendor_desc) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Zip:</label> <span class="text-red">{{ $errors->first('zipcode') }}</span>
                    <input type="input" name="zipcode" class="form-control" id="zipcode" placeholder="Enter Zip" value="{{ old('zipcode', $vendor->address->zipcode) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Barangay:</label> <span class="text-red">{{ $errors->first('barangay') }}</span>
                    <input type="input" name="barangay" class="form-control" id="barangay" placeholder="Enter Barangay" value="{{ old('barangay', $vendor->address->barangay) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Address1:</label> <span class="text-red">{{ $errors->first('address1') }}</span>
                    <input type="input" name="address1" class="form-control" id="address1" placeholder="Enter Address1" value="{{ old('address1', $vendor->address->address1) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Address2:</label> <span class="text-red">{{ $errors->first('address2') }}</span>
                    <input type="input" name="address2" class="form-control" id="address2" placeholder="Enter Address2" value="{{ old('address2', $vendor->address->address2) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Phone:</label> <span class="text-red">{{ $errors->first('phone') }}</span>
                    <input type="input" name="phone" class="form-control" id="phone" placeholder="Enter Phone" value="{{ old('phone', $vendor->phone) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Phone2:</label> <span class="text-red">{{ $errors->first('phone2') }}</span>
                    <input type="input" name="phone2" class="form-control" id="description" placeholder="Enter Phone2" value="{{ old('phone2', $vendor->phone2) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Mobile:</label> <span class="text-red">{{ $errors->first('mobile') }}</span>
                    <input type="input" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile" value="{{ old('mobile', $vendor->mobile) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Mobile2:</label> <span class="text-red">{{ $errors->first('mobile2') }}</span>
                    <input type="input" name="mobile2" class="form-control" id="mobile2" placeholder="Enter Mobile2" value="{{ old('mobile2', $vendor->mobile2) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label> <span class="text-red">{{ $errors->first('email') }}</span>
                    <input type="input" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ old('email', $vendor->email) }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Website:</label> <span class="text-red">{{ $errors->first('website') }}</span>
                    <input type="input" name="website" class="form-control" id="website" placeholder="Enter Website" value="{{ old('website', $vendor->website) }}">
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