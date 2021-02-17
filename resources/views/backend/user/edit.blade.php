@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/user/' . $user->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/user') }}" class="btn btn-primary">Users</a>
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

<form role="form" action="{{ url('backend/user/' . $user->id) }}" method="post" id="editUserForm" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group">
            <label for="user">User nickname</label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="name" maxlength="50" minlength="2" required class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name', $user->name) }}">
        </div>
        
        <div class="form-group">
            <label for="email">User email</label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="email" maxlength="50" minlength="2" required class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
        </div>
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@endsection