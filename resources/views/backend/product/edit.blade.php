@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/product/' . $product->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/product') }}" class="btn btn-primary">Productos</a>
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

<form role="form" action="{{ url('backend/product/' . $product->id) }}" method="post" id="editProductForm" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group">
            <label for="iduser">User</label>
            <select name="iduser" id="iduser" required class="form-control">
                <option value="" disabled>Select user</option>
                @foreach($users as $user)
                
                @if($user->id == old('iduser', $user->iduser))
                
                <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                @else
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                
                @endforeach
            </select>
            
        </div>
        
        <div class="form-group">
            <label for="idcategory">Category</label>
            <select name="idcategory" id="idcategory" required class="form-control">
                <option value="" disabled>Select category</option>
                @foreach($categories as $category)
                
                @if($category->id == old('idcategory', $category->idcategory))
                
                <option selected value="{{ $category->id }}">{{ $category->category }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endif
                
                @endforeach
            </select>
            
        </div>
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" maxlength="60" minlength="2" required class="form-control" id="name" placeholder="Product name" name="name" value="{{ old('name', $product->name) }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea minlength="10" class="form-control" name="description" id="description" placeholder="Description">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="use">Use</label>
            <input type="text" maxlength="60" minlength="2" required class="form-control" id="use" placeholder="Enter use for the product" name="use" value="{{ old('use', $product->use) }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" min="0.10" max="9999.99" step="0.01" required class="form-control" id="price" placeholder="Price" name="price" value="{{ old('price', $product->price) }}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" required class="form-control" id="date" name="date" value="{{ old('date', $product->date) }}">
        </div>
        
        <div class="form-group">
            <label for="state">State</label>
            <select name="state" id="state" required class="form-control">
                <option value="" disabled>Select state</option>
                
                @if($product->state == old('state', $product->state))
                
                <option selected value="{{ $product->state }}">{{ $product->state }}</option>
                    <option value="Sale">Sale</option>
                    <option value="Sold">Sold</option>
                    <option value="Removed">Removed</option>
                    <option value="Censured">Censured</option>
                    <option value="Other">Other</option>
                @else
                    <option value="{{ $product->state }}">{{ $product->state }}</option>
                @endif
                
            </select>
            
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@endsection