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
                <a href="{{ url('backend/contact') }}" class="btn btn-primary">Contacts</a>
                <a href="#" data-id="{{ $contact->id }}" data-name="{{ $contact->id }}" class="btn btn-danger" id="enlaceBorrar">Delete contact</a>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>#Id</td>
            <td>{{$contact->id}}</td>
        </tr>
        <tr>
            <td>From user</td>
            <td>{{$contact->iduser1}}</td>
        </tr>
        <tr>
            <td>To user</td>
            <td>{{$contact->iduser2}}</td>
        </tr>
        <tr>
            <td>#IdProduct</td>
            <td>{{$contact->idproduct}}</td>
        </tr>
        <tr>
            <td>Contact Text</td>
            <td>{{$contact->contacttext}}</td>
        </tr>
    </tbody>
</table>


@endsection