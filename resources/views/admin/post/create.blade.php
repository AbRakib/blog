@extends('admin.dashboard')
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post Module</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">New Post Add</h6>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{route('admin.post.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="required">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTitle4">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputTitle4" value="{{ old('title') }}" placeholder="Post Title" required>
                            @error('title')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCategory">Category</label>
                            <select id="inputCategory" name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                <option selected>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <div>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" cols="10" rows="5">{{ old('excerpt') }}</textarea>
                        </div>
                        @error('excerpt')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Description</label>
                        <div>
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" cols="10" rows="5">{{ old('body') }}</textarea>
                        </div>
                        @error('body')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
                        @error('image')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
@endsection