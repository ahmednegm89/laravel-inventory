@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">purchases </h4>
                </div>
            </div>
        </div>
                    <!-- end page title -->            
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('purchase.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light mb-2">Add purchase</a>
                        <h4 class="card-title">purchase All Data </h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>purchase_num</th> 
                                <th>date</th> 
                                <th>supplier</th> 
                                <th>category</th> 
                                <th>QTY</th> 
                                <th>product name</th>
                                <th>status</th>
                                <th>Action</th>
                                
                            </thead>
                            <tbody>    
                                @foreach($purchases as $key => $purchase)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $purchase->purchase_num }} </td> 
                                <td> {{ $purchase->date }} </td> 
                                <td> {{ $purchase->supplier }} </td> 
                                <td> {{ $purchase->category }} </td> 
                                <td> {{ $purchase->QTY }} </td> 
                                <td> {{ $purchase->productname }} </td> 
                                <td> {{ $purchase->status }} </td> 
                                <td>
                                    <a href="{{route('purchase.delete',$purchase->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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