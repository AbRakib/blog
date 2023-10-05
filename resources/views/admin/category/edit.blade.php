@extends('admin.dashboard')
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category Module</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- form for update data Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">New Category Add</h6>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{route('admin.category.update', $category->id)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputTitle4">Category Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputTitle4" value="{{ old('name', $category->title) }}" required>
                                    @error('name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="body">Short Details</label>
                                <div>
                                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" cols="10" rows="5">{{ old('body', $category->body) }}</textarea>
                                </div>
                                @error('body')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="text-right">
                                <button type="submit" id="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
@endsection