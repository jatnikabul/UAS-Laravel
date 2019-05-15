@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4 offset-md-8">
                <div class="form-group">
                    <select id="order_field" class="form-control">
                        <option value="" hidden>Urutkan</option>
                        <option value="best_seller">Best Seller</option>
                        <option value="terbaik">Terbaik</option>
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                        <option value="terbaru">Terbaru</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

<div class="container">
	@if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	
	@foreach($products as $idx => $product)
		@if($idx == 0 || $idx % 4 == 0)
		<div class="row mt-4">
		@endif

		<div class="col">
			<div class="card">
				
						 <?php
						 	$p = App\Models\Product::find($product->id);
						 ?>
                    	<image src="{{ asset('/images/'.$p->images()->get()[0]->image_src) }}" class="card-img-top" alt="" height="175" width="125"></image>
                  
				<div class="card-body">
					<center>
						<h5 class="card-title">
							<a href="{{ url('show',$product->id) }}">
								{{ $product->name }}
							</a>
						</h5>
						<p class="card-text">
							Rp. {{ $product->price }}
						</p>
						@if(Auth::check())
							<a class="btn btn-primary" href="{{ route('carts.add',$product->id) }}"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
						@endif
					</center>
				</div>
			</div>
		</div>

		@if($idx > 0 && $idx % 4 == 3)
		</div>
		@endif
	@endforeach
</div>
@endsection

<!-- j-query -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#order_field').change(function(){
            window.location.href ='/?order_by=' + $(this).val();
        });
    });    
</script>