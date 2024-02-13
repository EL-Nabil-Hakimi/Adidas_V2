@extends('index')
@section('content')   

{{-- <a href="/addClientpage"><button class="btn btn-primary btn-sm" type="button" style="width: 30% ; height:40px; margin:20px" >Ajouter Client</button></a> --}}
<div class="container mt-3" style="margin-bottom: 200px">
    <h2>Clients</h2>
    <table class="table">
      <thead class="table-primary">
        <tr>
          <th>Number</th>
          <th>Name</th>
          <th>Email</th>
          <th>Compte Cree a</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $number = 0;
        @endphp
        @foreach($clients as $client)
          <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->email}}</td>
            <td>{{$client->created_at}}</td>
            <td>{{$client->role_name}}</td>
            <td>
            <div>
                <a onclick="Delete(e={{$client->id}})" class="text-danger" style="text-decoration: none ; cursor :pointer">Supprimer</a>
                <span>/</span>
                <a href="/modifyClientpage?id={{$client->id}}" class="text-primary" style="text-decoration: none">Modifier Le Role</a>
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
          
    <a href="/Client" class="list-group-item list-group-item-action py-2 ripple active">
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
    <a href="/addCategoriepage" class="list-group-item list-group-item-action py-2 ripple "
      ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Categorie</span></a
    >
    
  </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  var Delete = function(e) {
      Swal.fire({
          title: 'Êtes-vous sûr?',
          text: 'Vous-voulez vraiment Supprimer ce Utilisateur ?',
          icon: 'error',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Oui',
          cancelButtonText: 'Non'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = '/DeleteClient?id=' + e;
          }
      });
  }
</script>

  @endsection