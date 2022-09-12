@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">edit customer page</h4><br><br>
                        @if(count($errors))
                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                            @endforeach
                        @endif
                        <form method="post" action="{{route('customer.update',$customer->id)}}" enctype="multipart/form-data" >
                            @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{url("upload/customer/$customer->customer_img") }}" alt="Card image cap">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" value="{{$customer->name}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">phone number</label>
                            <div class="col-sm-10">
                            <input name="phone_number" class="form-control" type="text" value="{{$customer->phone_number}}" >
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">email</label>
                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="email" value="{{$customer->email}}" >
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input name="address" class="form-control" type="text" value="{{$customer->address}}" >
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image(leave blank if you won't update)</label>
                            <div class="col-sm-10">
                            <input name="customer_img" class="form-control" type="file"  id="image">
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
@endsection 
