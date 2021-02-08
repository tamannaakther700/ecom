@extends('backend.master')
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('dashboard') }}"> Starlight </a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-12">
                <h6 class="card-body-title text-center pb-5">Add Category</h6>   
            </div>
            <div class="col-xl-10 m-auto mg-t-25  mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                   
                    <form action="{{ url('admin/category-post') }}" method="POST">
                        @csrf
                    <div class="row">
                        <label class="col-sm-4 form-control-label">Category Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control @error('category_name')  is-validate @enderror" value="{{ old('category_name') }}" placeholder="Enter Category Name" name="category_name">
                        @error('category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div><!-- row -->
                    <div class="form-layout-footer mg-t-30 text-center">
                        <button type="submit" class="btn btn-info mg-r-5">Add Category</button>
                    </div><!-- form-layout-footer -->
                </form>
                </div><!-- card -->
            </div>
            
        </div>


    </div><!-- sl-pagebody -->
    
@endsection