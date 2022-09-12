@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">edit product page</h4><br><br>
                        @if(count($errors))
                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                            @endforeach
                        @endif
                        <form method="post" action="{{route('product.update',$product->id)}}" >
                            @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Supplier</label>
                            <div class="col-sm-10">
                                <select name="supplier_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach ($supplier as $sup)
                                    @if ($product->supplier->name == $sup->name )
                                    <option selected value="{{$sup->id}}">{{$sup->name}}</option>
                                    @else
                                    <option value="{{$sup->id}}">{{$sup->name}}</option>
                                    @endif
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">unit</label>
                            <div class="col-sm-10">
                                <select name="unit_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach ($unit as $un)
                                    @if ($product->unit->name == $un->name )
                                    <option selected value="{{$un->id}}">{{$un->name}}</option>
                                    @else
                                    <option value="{{$un->id}}">{{$un->name}}</option>
                                    @endif
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">category</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach ($category as $cat)
                                    @if ($product->category->name == $cat->name )
                                    <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                                    @else
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                    @endforeach
                                    </select>
                            </div>
                        </div>
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
