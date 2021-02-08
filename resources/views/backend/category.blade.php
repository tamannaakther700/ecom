@extends('backend.master')
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('dashboard') }}"> Starlight </a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">

        
        <div class="row row-sm">
    
            <div class="col-10 m-auto">
                <h6 class="card-body-title text-center pb-1">Category ({{ $cat_count }})</h6>
                <div class="d-block text-right">
                    <a href="{{ url('admin/add_category') }}" class="text-right d-inline-block btn"> <i class="fa fa-plus"></i> Add Category</a>

                    @if (session('success'))
                    <div class="text-left alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{session('success')}}</span>
                        <button style="cursor: pointer" type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                      @if (session('delete'))
                      <div class="text-left alert alert-danger alert-dismissible fade show" role="alert">
                          <span>{{session('delete')}}</span>
                          <button style="cursor: pointer" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                      
                </div>
   
            </div>
            
            <div class="col-xl-10 m-auto">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                
                <div class="table-responsive">
                    <table class="table mg-b-0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        @foreach ($data as $key=> $da)      
                        <tr>
                            <td>{{ $data->firstItem() +$key }}</td>
                            <td>{{ $da->category_name }}</td>
                            <td>{{ $da->created_at != null ? $da->created_at->diffForHumans() : 'N/A'}}</td>
                            <td>
                                <a class="btn btn-outline-info" href="{{ url('admin/category-edit')}}/{{ $da->id }}">Edit</a>
                                <a class="btn btn-outline-danger" href="{{ url('admin/category-delete')}}/{{ $da->id }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                    </div>
                </div><!-- card -->
            </div>


           
        </div>


    </div><!-- sl-pagebody -->
    
@endsection