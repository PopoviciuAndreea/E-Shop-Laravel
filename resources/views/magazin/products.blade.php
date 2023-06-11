@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{ $product->image }}" alt="">
                <div class="caption">
                    <h4>{{ $product->name }}</h4>
                    <p> {{ $product->description }} </p>
                    <p><strong> Price: </strong> {{ $product->price }}$</p>
                    <p class="btn-holder">
                        <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> 
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection