@foreach ($products as $product)
                  <div class="col-12 col-sm-8 col-md-6 col-lg-4" onclick=" Details( {{$product->id}} , '{{$product->name}}' , `{{$product->description}}` ,'{{$product->image}}' ,'{{$product->prix}}' )">
                  <div class="card">
                        <img class="card-img" src="assets/images/{{$product->image}}" alt="Vans">
                      
                        <div class="card-body">
                           <h4 class="card-title"><b>{{ $product->name }}</b></h4>
                           <p class="card-text" title="{{ $product->description }}">
                              {{ Str::limit($product->description, 100, '...') }}
                           </p>

                           <div class="buy d-flex justify-content-between align-items-center">
                              <div class="price text-success"><h5 class="price text-success mt-4"><b>DH {{ $product->prix }}</b></h5></div>
                              <a class="btn mt-3" style="background-color: #8c5d20; color: white; width: 50%" onclick="addToCart(this)">Add to Cart</a>
                           </div>
            </div>
        </div>
    </div>
@endforeach