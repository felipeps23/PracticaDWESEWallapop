@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/contact/' . $contact->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/contact') }}" class="btn btn-primary">Contacts</a>
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

<form role="form" action="{{ url('backend/contact/' . $contact->id) }}" method="post" id="editContactForm" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="iduser1">From user</label>
        <select name="iduser1" id="iduser1" required class="form-control">
            <option value="" disabled>Select user</option>
            @foreach($users as $user)
            
            @if($user->id == old('iduser', $contact->iduser1))
            
            <option selected value="{{ $user->id }}">{{ $user->name }}</option>
            @else
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endif
            
            @endforeach
        </select>
        
    </div>
    
    <div class="form-group">
        <label for="iduser2">To user</label>
        <select name="iduser2" id="iduser2" required class="form-control">
            <option value="" disabled>Select user</option>
            @foreach($users as $user)
            
            @if($user->id == old('iduser', $contact->iduser2))
            
            <option selected value="{{ $user->id }}">{{ $user->name }}</option>
            @else
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endif
            
            @endforeach
        </select>
        
    </div>
    
    <div class="form-group">
        <label for="idproduct">Product</label>
        <select name="idproduct" id="idproduct" required class="form-control">
            <option value="" disabled>Select product</option>
            @foreach($products as $product)
            
            @if($product->id == old('idproduct', $contact->idproduct))
            
            <option selected value="{{ $product->id }}">{{ $product->name }}</option>
            @else
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endif
            
            @endforeach
        </select>
        
    </div>
    
    <div class="form-group">
        <label for="contacttext">Contact Text</label>
        <textarea minlength="10" class="form-control" name="contacttext" id="contacttext" placeholder="Contact Text">{{ old('contacttext', $contact->contacttext) }}</textarea>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@endsection