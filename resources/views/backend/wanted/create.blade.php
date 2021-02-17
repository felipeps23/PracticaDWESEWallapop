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
                <a href="{{ url('backend/wanted') }}" class="btn btn-primary">Wanteds</a>
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

<form role="form" action="{{ url('backend/wanted') }}" method="post" id="createWantedForm">
    @csrf
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
        <label for="idproduct">Product</label>

        @if(isset($products))
        <select name="idproduct" id="idproduct" required class="form-control">
            <option value="" disabled selected>Select product</option>
            @foreach($products as $product)

            <option value="{{ $product->id }}">{{ $product->name }}</option>

            @endforeach
        </select>
        @else
            <input type="text" value="{{ $product->name }}" readonly class="form-control">
            <input type="hidden" id="idproduct" name="idproduct" value="{{ $product->id }}">
        @endif

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection