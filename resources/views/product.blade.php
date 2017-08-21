@extends('layouts/app')

@section('content')
<!-- 自動map到yield -->

<h1>All My Product</h1>

<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<table  class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody id="tbody">
				@foreach($product as $productone )
				<tr>
					<td>{{$productone->id}}</td>
					<td>{{$productone->name}}</td>
					<td>{{$productone->price}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection