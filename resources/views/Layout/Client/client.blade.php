@extends('index')
@section('content')   
<div class="container mt-3">
    <h2>Users</h2>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Compte Créé à</th>
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
                      @if($client->role_name == "Admin")
                         <td class="text-success">{{$client->role_name}}</td>
                      @elseif($client->role_name == "Guest")
                          <td class="text-warning">{{$client->role_name}}</td>
                      @else
                            <td class="text-primary">{{$client->role_name}}</td>
                       @endif
                
                    <td>
                        <a onclick="Delete(e={{$client->id}})" class="text-danger" style="cursor: pointer;">Supprimer</a>
                        <span class="text-secondary">/</span>
                        <a href="/modifyClientpage?id={{$client->id}}" class="text-primary" style="cursor: pointer;">Modifier Le Role</a>
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