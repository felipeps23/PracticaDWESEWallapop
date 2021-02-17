@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('backend.contact.create') }}" class="btn btn-primary">Create contact</a>
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
            Contact created successfully 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}

<table class="table table-hover">
    <thead>
        <tr>
            <th>#Id</th>
            <th>#UserId1</th>
            <th>#UserId2</th>
            <th>#IdProducto</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->iduser1 }}</td>
            <td>{{ $contact->iduser2 }}</td>
            <td>{{ $contact->idproduct }}</td>
            <td><a href="{{ url('backend/contact/' . $contact->id) }}">Show</a></td>
            <td><a href="{{ url('backend/contact/' . $contact->id . '/edit') }}">Edit</a></td>
            <td><a href="#" data-id="{{ $contact->id }}" class="enlaceBorrar" >Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('backend/contact') }}" method="post">
    @method('delete')
    @csrf
</form>
@endsection