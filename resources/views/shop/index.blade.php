@extends('layouts.master')

@section('title')
	Laravel Shopping Cart
@endsection

@section('content')
	@foreach($products->chunk(3) as $productsChunks)
	<div class="row">
		@foreach($productsChunks as $product)
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img class="image-responsive" src="{{ $product->imagePath }}" alt="...">
		      <div class="caption">
		        <h3>{{ $product->title }}</h3>
		        <p class="description">{{ $product->description }}</p>
		        <div class="clearfix">
		        	<div class="pull-left price">${{ $product->price }}</div>
		        	<a href="#" class="btn btn-success pull-right" role="button">Add to cart</a></div>
		      </div>
		    </div>
		  </div>
		 @endforeach 	
	</div>
	@endforeach
	
@endsection