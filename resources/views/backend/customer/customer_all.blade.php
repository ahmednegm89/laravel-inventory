@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Customers </h4>
                </div>
            </div>
        </div>
                    <!-- end page title -->            
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('customer.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light mb-2">Add customer</a>
                        <h4 class="card-title">customer All Data </h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th> 
                                <th>img</th> 
                                <th>phone</th> 
                                <th>email</th> 
                                <th>address</th> 
                                <th>status</th> 
                                <th>Action</th>
                                
                            </thead>
                            <tbody>    
                                @foreach($customers as $key => $customer)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $customer->name }} </td> 
                                        <td> <img src="{{asset("upload/customer/$customer->customer_img")}}" alt="" srcset="" style="width: 60px; height:50px"> </td>
                                        <td> {{ $customer->phone_number }} </td> 
                                        <td> {{ $customer->email }} </td> 
                                        <td> {{ $customer->address }} </td> 
                                        <td> {{ $customer->status }} </td> 
                                        <td>
                                            <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                            <a href="{{route('customer.delete',$customer->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->             
    </div> <!-- container-fluid -->
</div>


@endsection