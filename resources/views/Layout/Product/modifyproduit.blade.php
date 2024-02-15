@extends('index')
@section('content')
    
<div class="container">
    <div class=" text-center mt-5 ">

        <h1 >Ajouter Produit</h1>
            
        
    </div>


<div class="row ">
  <div class="col-lg-7 mx-auto">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light">
   
        <div class = "container">
        <form id="contact-form" role="form" enctype="multipart/form-data" action="ModifyPdouit" method="post">
        @csrf
        

        <div class="controls">

            <input type="hidden" value="{{$product->id}}" name="id">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_name">Image *</label>
                        <input id="form_name" type="file" name="image" class="form-control" placeholder="Please enter your firstname *"  value="{{$product->image}}" data-error="Firstname is required.">
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_lastname">Nom Du Produit *</label>
                        <input id="form_lastname" type="text" name="name" class="form-control" placeholder="Please enter your lastname *" value="{{$product->name}}" required="required" data-error="Lastname is required.">
                                                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_lastname">Description *</label>
                        <textarea id="form_lastname" type="text" name="description" class="form-control" placeholder="Please enter your lastname *" value="{{$product->description}}" required="required" data-error="Lastname is required.">{{$product->description}}</textarea>
                                                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_email">Prix *</label>
                        <input id="form_email" type="number" name="prix" class="form-control" placeholder="Please enter your email *" value="{{$product->prix}}" required="required" data-error="Valid email is required.">
                        
                    </div>

                    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="form_email">Categorie *</label>
                      <select id="form_email" name="categorie" class="form-control" required="required" data-error="Valid email is required.">
                       <option value="" >Choisir une Categorie</option>
                            @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}" 
                              @php
                                  if($categorie->id == $product->categorie_id){
                                     echo "selected";
                                  }    
                              @endphp
                              
                              >{{$categorie->name}}</option>
                            @endforeach
                       </select>
                      
                  </div>
             
                
                </div>
            </div>
            <br>
            <br>
                <div class="col-md-12">
                    
                    <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                        " value="Modifier" >
                
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
    <i class="fas fa-chart-area fa-fw me-3"></i><span>Users</span>
  </a>

  <a href="/Product" class="list-group-item list-group-item-action py-2 ripple " >
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
  <a href="/roles" class="list-group-item list-group-item-action py-2 ripple "
  ><i class="fas fa-chart-line fa-fw me-3"></i><span>Roles</span></a
  >
  <a href="/addrolepage" class="list-group-item list-group-item-action py-2 ripple "
    ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Role</span></a
  >
</div>
@endsection