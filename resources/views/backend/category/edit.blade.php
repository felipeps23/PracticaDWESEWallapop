@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/category/' . $category->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/category') }}" class="btn btn-primary">Categories</a>
            </div>
        </div>
    </div>
</div>
@if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form role="form" action="{{ url('backend/category/' . $category->id) }}" method="post" id="editCategoryForm" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group">
            <label for="category">Category</label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="category" maxlength="50" minlength="2" required class="form-control" id="category" placeholder="Category name" name="category" value="{{ old('category', $category->category) }}">
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@endsection