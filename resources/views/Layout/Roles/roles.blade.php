@extends('index')
@section('content')   

<div class="container mt-3" style="margin-bottom: 200px">
        @if(session('delete'))
                  <div class="alert alert-danger">
                      {{ session('delete') }}
                  </div>
        @endif
  <a href="/addrolepage"><button class="btn btn-primary btn-sm" type="button" style="width: 30% ; height:40px; margin:20px" >Ajouter Role</button></a>

    <h2>Role</h2>
    <table class="table" >
    
      <thead class="table-primary">
        <tr>
          <th>Number</th>
          <th>Role Name</th>
          <th></th>
          <th></th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $number = 0;
        @endphp
        @foreach ($Roles as $Role)
        <tr>
            <td>{{++$number}}</td>
            <td>{{$Role->name}}</td>
            <td></td>
            <td></td>
            <td>
                <div>
                    @if($Role->id == 1 || $Role->id == 2)
                        <a class="text-danger" style="text-decoration: none; cursor:pointer">-</a>
                        <span>/</span>
                        <a class="text-primary" style="text-decoration: none">-</a>
                    @else
                        <a onclick="Delete(e={{$Role->id}})" class="text-danger" style="text-decoration: none; cursor:pointer">Supprimer</a>
                        <span>/</span>
                        <a href="/modifyrolepage?id={{$Role->id}}" class="text-primary" style="text-decoration: none">Modifier</a>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    
      

        
      </tbody>
    </table>
    
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
    <a href="/Categorie" class="list-group-item list-group-item-action py-2 ripple "
      ><i class="fas fa-lock fa-fw me-3"></i><span>Categories</span></a
    >
    <a href="/addCategoriepage" class="list-group-item list-group-item-action py-2 ripple "
      ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Role</span></a
    >
    <a href="/Roles" class="list-group-item list-group-item-action py-2 ripple active"
    ><i class="fas fa-chart-line fa-fw me-3"></i><span>Roles</span></a
    >
    <a href="/AddRolespage" class="list-group-item list-group-item-action py-2 ripple "
      ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Role</span></a
    >
  </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
      var Delete = function(e) {
          Swal.fire({
              title: 'Êtes-vous sûr?',
              text: 'Vous-voulez vraiment Supprimer ce Client ?',
              icon: 'error',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Oui',
              cancelButtonText: 'Non'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = '/DeleteRole?id=' + e;
              }
          });
      }
    </script>
  @endsection