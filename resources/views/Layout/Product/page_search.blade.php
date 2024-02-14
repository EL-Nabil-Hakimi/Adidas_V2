 @foreach ($products as $product)
          
      <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-xl-10">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                  <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <img onclick="showImage('{{$product->image}}')" style="cursor:pointer" src="assets/images/{{$product->image}}"
                      class="w-100" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                  <h5>{{$product->name}}</h5>
                  <div class="d-flex flex-row">
                    <div class="text-danger mb-1 me-2">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                 
                
                  <p class="mb-4 mb-md-6">
                    {{$product->description}}
                  </p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">{{$product->prix}}.00 DH</h4>
                    <span class="text-danger"><s>{{$product->prix*1.4}}</s></span>
                  </div>
                  <h6 class="text-success">Free shipping</h6>
                 
                  <div class="d-flex flex-column mt-4">
                    <a class="btn btn-primary btn-sm" type="button" onclick=" Details( {{$product->id}} , '{{$product->name}}' , `{{$product->description}}` ,'{{$product->image}}' ,'{{$product->prix}}' )" >Details</a>
       
                    <a href="/modifyProduitpage?id={{$product->id}}" class="btn btn-outline-success btn-sm mt-2" type="button">
                      Modifier
                    </a>
                    <a onclick="Delete({{$product->id}})" class="btn btn-outline-danger btn-sm mt-2" type="button">
                      Supprimer
                    </a>
                  
                    
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <a href="/addProduitpage"  class="btn btn-primary btn-sm" type="button" id="btnAdd" >Ajouter Produit</a>
        
      </div>
      <!-- Pagination Links -->
      <div class="pagination justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
      </div>
      
    </section>
  </div>
  
@endforeach