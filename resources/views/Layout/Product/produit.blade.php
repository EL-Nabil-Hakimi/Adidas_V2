@extends('index')
@section('content')

<section>
  

    <div class="container py-5">
   
    @if($msg == 'Add')
      <div class="alert alert-primary" role="alert">
        Le produit a été ajouté avec succès
        </div>
    @endif 
    @if($msg == 'Modify')
        <div class="alert alert-success" role="alert">
          Le produit a été Modifier avec succès
          </div>
    @endif
    @if($msg == 'Delete')
        <div class="alert alert-danger" role="alert">
          Le produit a été Supprimer avec succès
          </div>
    @endif
     
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
      </div>
      @endforeach      
      
      <a href="/addProduitpage"  class="btn btn-primary btn-sm" type="button" id="btnAdd" >Ajouter Produit</a>
      
    </div>
    <!-- Pagination Links -->
    <div class="pagination justify-content-center">
      {{ $products->links('pagination::bootstrap-5') }}
    </div>

  </section>

@endsection


@section('nav')
<div class="list-group list-group-flush mx-3 mt-4">
          
  <a href="/Client" class="list-group-item list-group-item-action py-2 ripple ">
    <i class="fas fa-chart-area fa-fw me-3"></i><span>Clients</span>
  </a>
  <a href="/addClientpage" class="list-group-item list-group-item-action py-2 ripple">
    <i class="fas fa-chart-area fa-fw me-3"></i><span>Ajouter Client</span>
  </a>
  <a href="/Product" class="list-group-item list-group-item-action py-2 ripple active" >
    <i class="fas fa-chart-area fa-fw me-3"></i><span>Produits</span>
  </a>
  <a href="/addProduitpage" class="list-group-item list-group-item-action py-2 ripple">
    <i class="fas fa-chart-area fa-fw me-3"></i><span>Ajouter Produit</span>
  </a>
  <a href="/Categorie" class="list-group-item list-group-item-action py-2 ripple "
    ><i class="fas fa-lock fa-fw me-3"></i><span>Categories</span></a
  >
  <a href="/addCategoriepage" class="list-group-item list-group-item-action py-2 ripple "
    ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Categorie</span></a
  >
  <a href="/Roles" class="list-group-item list-group-item-action py-2 ripple "
  ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Categorie</span></a
  >
  <a href="/AddRolespage" class="list-group-item list-group-item-action py-2 ripple "
    ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Categorie</span></a
  >
</div>

  <!-- Inclure SweetAlert depuis une CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  var Delete = function(e) {
      Swal.fire({
          title: 'Êtes-vous sûr?',
          text: 'Vous-voulez vraiment Supprimer ce Produit ?',
          icon: 'error',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Oui',
          cancelButtonText: 'Non'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = '/DeleteProduit?id=' + e;
          }
      });
  }

  var showImage = function(image) {
    Swal.fire({
        imageUrl: 'assets/images/' + image,
        imageWidth: 500,
        imageHeight: 480,
        imageAlt: 'Custom Image',
        showCancelButton: true,
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Close',
        showConfirmButton: false, 
        customClass: {
            popup: 'custom-popup-class' 
        }
    });
}


  var Details = function ( id , name , description , image , prix){
    Swal.fire({
        imageUrl: 'assets/images/' + image,
        html : `<h3 style = 'color : black'>` + name + `</h3>` + `<br>`
               + `<p style = "text-align : justify">` 
             + description + `</p>` + `<br>` +`<h5 style = 'color : green ;  margin-top:10px'> Prix = `+ prix +  ` DH </h5>` ,
        imageWidth: 200,
        imageHeight: 180,
        imageAlt: 'Custom Image',
        showCancelButton: true,
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Close',
        showConfirmButton: false, 
        customClass: {
            popup: 'custom-popup-class' 
        }
    });

  }
    
</script>


  
@endsection