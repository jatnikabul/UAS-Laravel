@extends('layouts.app')

@section('content')
<div class="container col-md-8">
	<div class="row justify-content-center">
		<div class="col">
			<br>
			<h2>Detail Produk</h2>
			<br />
			<div class="table-responsive">
				<table class="table table-hover h5">
					<tr>
						<td>No</td>
						<td>:</td>
						<td>{{ $products['id'] }}</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td>{{ $products['name'] }}</td>
					</tr>
					<tr>
						<td>Price</td>
						<td>:</td>
						<td>{{ $products['price'] }}</td>
					</tr>
					<tr>
						<td>Description</td>
						<td>:</td>
						<td>{!! $products ['description'] !!}</td>
					</tr>
					<tr>
						<td>Created_At</td>
						<td>:</td>
						<td>{{ $products['created_at'] }}</td>
					</tr>
					<tr>
						<td>Images</td>	
						<td>:</td>
						@if(!$products->images()->get()->isEmpty())
						<td>
							 @foreach($products->images()->get() as $image)
                            <image src="{{ asset('/images/'.$image->image_src) }}" class="img-thumbnail img-fluid" alt="{{ $image->image_desc }}" style="width:200px;height:200px;"></image>
                        @endforeach
						</td>
                        @endif
					</tr>					
				</table>
				<div>
					<a href="{{ route('admin.products.index') }}" class="btn btn-primary"><i class="fas fa-undo"></i> Back</a>
				</div>			
			</div>		
		</div>
	</div>
</div>
@endsection