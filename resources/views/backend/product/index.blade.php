@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('backend.product.create') }}" class="btn btn-primary">Create product</a>
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
            Product created successfully 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">
            #Id
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 0])}}">↓</a>
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 0])}}">↑</a>
        </th>
        <th scope="col">
            User
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 1])}}">↓</a>
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 1])}}">↑</a>
        </th>
        <th scope="col">
            Category
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 2])}}">↓</a>
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 2])}}">↑</a>
        </th>
        <th scope="col">
            Name
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 3])}}">↓</a>
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 3])}}">↑</a>
        </th>
        <th scope="col">
            Use
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 4])}}">↓</a>
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 4])}}">↑</a>
        </th>
        <th scope="col">
            Price
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 5])}}">↓</a>
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 5])}}">↑</a>
        </th>
        <th scope="col">
            Date
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 6])}}">↓</a>
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 6])}}">↑</a>
        </th>
        <th scope="col">
            State
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 7])}}">↓</a>
            <a href="{{route(
                        'backend.product.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 7])}}">↑</a>
        </th scope="col">
        <th scope="col">Image</th>
        <th scope="col">show</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->user->name }}</td>
            <td>{{ $product->category->category }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->use }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->date }}</td>
            <td>{{ $product->state }}</td>
            <td>
                <img src="data:image/png;base64,{{ $product->photo }}" style="width:100px;">
            </td>
            
            <td><a href="{{ url('backend/product/' . $product->id) }}">Show</a></td>
            <td><a href="{{ url('backend/product/' . $product->id . '/edit') }}">Edit</a></td>
            <td><a href="#" data-id="{{ $product->id }}" class="enlaceBorrar" >Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
   <div class="col-lg-6">
        {{ $products->links() }}
    </div>
</div>
<form id="formDelete" action="{{ url('backend/product') }}" method="post">
    @method('delete')
    @csrf
</form>
@endsection