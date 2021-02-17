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
                <a href="{{ url('backend/product') }}" class="btn btn-primary">Products</a>
                <a href="#" data-id="{{ $product->id }}" data-name="{{ $product->name }}" class="btn btn-danger" id="enlaceBorrar">Delete product</a>
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
            <td>Id del producto</td>
            <td>{{$product->id}}</td>
        </tr>
        <tr>
            <td>Nombre del usuario</td>
            <td>{{$product->user->name}}</td>
        </tr>
        <tr>
            <td>Nombre de la categoría</td>
            <td>{{$product->category->category}}</td>
        </tr>
        <tr>
            <td>Nombre del producto</td>
            <td>{{$product->name}}</td>
        </tr>
        <tr>
            <td>Descripcion del producto</td>
            <td>{{$product->description}}</td>
        </tr>
        <tr>
            <td>Uso del producto</td>
            <td>{{$product->use}}</td>
        </tr>
        <tr>
            <td>Precio del producto</td>
            <td>{{$product->price}}</td>
        </tr>
        <tr>
            <td>Fecha de subida</td>
            <td>{{$product->date}}</td>
        </tr>
        <tr>
            <td>Estado del producto</td>
            <td>{{$product->state}}</td>
        </tr>
        <tr>
            <td>Foto del producto</td>
            <td><img src="data:image/png;base64,{{ $product->photo }}" style="width:100px;"></td>
        </tr>
    </tbody>
</table>

@endsection