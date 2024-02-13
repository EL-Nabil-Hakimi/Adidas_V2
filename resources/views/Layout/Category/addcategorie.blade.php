@extends('index')
@section('content')
    
<div class="container">
    <div class=" text-center mt-5 ">

        <h1 >Ajouter Categorie</h1>
            
        
    </div>


<div class="row ">
  <div class="col-lg-7 mx-auto">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light">
   
        <div class = "container">
      <form id="contact-form" role="form" action="addcategorie" method="post">

        @csrf

        <div class="controls">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_name">Nom De Categorie *</label>
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                        
                    </div>
                </div>
               
            </div>
            <br>
            <br>
                <div class="col-md-12">
                    
                    <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                        " value="Ajouter" >
                
            </div>
      
            </div>

    </div>
     </form>
    </div>
        </div>


</div>
    <!-- /.8 -->

</div>
<!-- /.row-->

</div>
</div>

@endsection


@section('nav')
<div class="list-group list-group-flush mx-3 mt-4">
          
    <a href="/Client" class="list-group-item list-group-item-action py-2 ripple ">
      <i class="fas fa-chart-area fa-fw me-3"></i><span>Clients</span>
    </a>
    <a href="/addClientpage" class="list-group-item list-group-item-action py-2 ripple">
      <i class="fas fa-chart-area fa-fw me-3"></i><span>Ajouter Client</span>
    </a>
    <a href="/Product" class="list-group-item list-group-item-action py-2 ripple ">
      <i class="fas fa-chart-area fa-fw me-3"></i><span>Produits</span>
    </a>
    <a href="/addProduitpage" class="list-group-item list-group-item-action py-2 ripple">
      <i class="fas fa-chart-area fa-fw me-3"></i><span>Ajouter Produit</span>
    </a>
    <a href="/Categorie" class="list-group-item list-group-item-action py-2 ripple"
      ><i class="fas fa-lock fa-fw me-3"></i><span>Categories</span></a
    >
    <a href="/addCategoriepage" class="list-group-item list-group-item-action py-2 ripple active"
      ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Categorie</span></a
    >
    
    
    
  </div>
@endsection
