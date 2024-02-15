@extends('index')
@section('content')
    
<div class="container">
    <div class=" text-center mt-5 ">

        <h1 >Modifier Role</h1>
            
        
    </div>

<div class="row ">
  <div class="col-lg-7 mx-auto">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light ">
          @if(session('delete'))
          <div class="alert alert-danger">
              {{ session('delete') }}
          </div>
@endif
   
        <div class = "container">
       <form id="contact-form"  action="modifyRole" method="POST">

        @csrf

        <div class="controls">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="hidden" name="id" value="">
                        <label for="form_name">Nom De Role *</label>
                        <input type="hidden" value="{{$role_name->id}}" name="id">
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" value="{{$role_name->name}}" required="required" data-error="Firstname is required.">
                        <div id="listPerAll">
                          @foreach ($permissions as $per)
                            <div id="listPer">
                              @if($per->role_id != NULL)
                                  <input type="checkbox" id="check_{{$per->id}}" name="check[]" value="{{$per->id}}" checked>
                                  <label for="check_{{$per->id}}">{{$per->name}}</label>
                              @else
                                  <input type="checkbox" id="check_{{$per->id}}" name="check[]" value="{{$per->id}}">
                                  <label for="check_{{$per->id}}">{{$per->name}}</label>
                              @endif
                              
                            </div>
                            @endforeach
                          </div>
                    
                      </div>
                </div>
               
            </div>
            <br>
            <br>
                <div class="col-md-12">
                    
                    <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                        " value="Modifier">
                
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