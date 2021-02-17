@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/product') }}" class="btn btn-primary">Products</a>
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

<!-- Mostrar todos los errores juntos -->
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form role="form" action="{{ url('backend/product') }}" method="post" id="createProductForm" enctype="multipart/form-data">
    @csrf
     <div class="card-body">
        
        <div class="form-group">
            <label for="iduser">User</label>

            @if(isset($users))
            <select name="iduser" id="iduser" required class="form-control">
                <option value="" disabled selected>Select user</option>
                @foreach($users as $user)

                <option value="{{ $user->id }}">{{ $user->name }}</option>

                @endforeach
            </select>
            @else
                <input type="text" value="{{ $user->name }}" readonly class="form-control">
                <input type="hidden" id="iduser" name="iduser" value="{{ $user->id }}">
            @endif

        </div>
        
        <div class="form-group">
            <label for="idcategory">Category</label>
            
            @if(isset($categories))
            <select name="idcategory" id="idcategory" required class="form-control">
                <option value="" disabled selected>Select category</option>
                @foreach($categories as $category)
                
                <option value="{{ $category->id }}">{{ $category->category }}</option>
                
                @endforeach
            </select>
            @else
                <input type="text" value="{{ $category->category }}" readonly class="form-control">
                <input type="hidden" id="idcategory" name="idcategory" value="{{ $category->id }}">
            @endif
            
        </div>
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" maxlength="60" minlength="2" required class="form-control" id="name" placeholder="Product name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea minlength="10" class="form-control" name="description" id="description" placeholder="Description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="use">Use</label>
            <input type="text" maxlength="60" minlength="2" required class="form-control" id="use" placeholder="Enter use for the product" name="use" value="{{ old('use') }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" min="0.10" max="9999.99" step="0.01" required class="form-control" id="price" placeholder="Price" name="price" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" required class="form-control" id="date" name="date" value="{{ old('date') }}">
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <select name="state" id="state" required class="form-control">
                <option value="" disabled selected>Select state</option>
                <option value="Sale">Sale</option>
                <option value="Sold">Sold</option>
                <option value="Removed">Removed</option>
                <option value="Censured">Censured</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="photo">Foto</label>
            <input type="file" class="form-control" id="photo" name="photo">
       </div>
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection