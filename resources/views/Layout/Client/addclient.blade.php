@extends('index')
@section('content')
    
<div class="container">
    <div class=" text-center mt-5 ">

        <h1 >Ajouter Client</h1>
            
        
    </div>


<div class="row ">
  <div class="col-lg-7 mx-auto">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light">
   
        <div class = "container">
      <form id="contact-form" role="form" action="AddClient" method="post">
        @csrf
        

        <div class="controls">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_name">Nom *</label>
                        <input id="form_name" type="text" name="nom" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_lastname">Prenom *</label>
                        <input id="form_lastname" type="text" name="prenom" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_email">Email *</label>
                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_email">Adress *</label>
                        <input id="form_email" type="text" name="adresse" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                        
                    </div>
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
  <a href="/addClientpage" class="list-group-item list-group-item-action py-2 ripple active">
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
  <a href="/addCategoriepage" class="list-group-item list-group-item-action py-2 ripple "
    ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Categorie</span></a
  >
  
</div>
@endsection
