@extends('index')
@section('content')   
<div class="container mt-3">
    <a href="/addCategoriepage" class="btn btn-primary btn-sm mb-3">Ajouter Categorie</a>

    <h2>Categorie</h2>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Number</th>
                <th>Categorie Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $number = 0;
            @endphp
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{++$number}}</td>
                    <td>{{$categorie->name}}</td>
                    <td>
                        <a onclick="Delete(e={{$categorie->id}})" class="text-danger" style="cursor: pointer;">Supprimer</a>
                        <span class="text-secondary">/</span>
                        <a href="/modifyCategoriepage?id={{$categorie->id}}" class="text-primary" style="cursor: pointer;">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


  @section('nav')
  <div class="list-group list-group-flush mx-3 mt-4">
            
    <a href="/User" class="list-group-item list-group-item-action py-2 ripple ">
      <i class="fas fa-chart-area fa-fw me-3"></i><span>Users</span>
    </a>
  
    <a href="/Product" class="list-group-item list-group-item-action py-2 ripple " >
      <i class="fas fa-chart-area fa-fw me-3"></i><span>Produits</span>
    </a>
    <a href="/addProduitpage" class="list-group-item list-group-item-action py-2 ripple">
      <i class="fas fa-chart-area fa-fw me-3"></i><span>Ajouter Produit</span>
    </a>
    <a href="/Categorie" class="list-group-item list-group-item-action py-2 ripple active"
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
                  window.location.href = '/DeleteCategorie?id=' + e;
              }
          });
      }
    </script>
  @endsection