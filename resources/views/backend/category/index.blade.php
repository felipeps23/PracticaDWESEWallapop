@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('backend.category.create') }}" class="btn btn-primary">Create category</a>
            </div>
        </div>
    </div>
</div>

<!--
op -> store, update, destroy
r -> negativo, 0, positivo (acierto)
id -> id del elemento afectado
-->

@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif

{{--
@if(Session::get('op') !== null)
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Category created successfully 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}

<table class="table table-hover">
    <thead>
        <tr>
            <th>#Id</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->category }}</td>
            
            <td><a href="{{ url('backend/category/' . $category->id . '/edit') }}">Edit</a></td>
            <td><a href="#" data-id="{{ $category->id }}" class="enlaceBorrar" >Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('backend/category') }}" method="post">
    @method('delete')
    @csrf
</form>
@endsection