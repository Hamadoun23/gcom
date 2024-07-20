<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Liste des produits</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('produits.ajout') }}" class="btn btn-primary mb-3">Ajouter Produit</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Description</th>
                <th>Prix d'achat</th>
                <th>Prix de vente</th>
                <th>Stock actuel</th>
                <th>Stock minimum</th>
                <th>Stock maximum</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                <tr>
                    <td>{{ $produit->id_prod }}</td>
                    <td>{{ $produit->libelle }}</td>
                    <td>{{ $produit->description }}</td>
                    <td>{{ $produit->prix_achat }}</td>
                    <td>{{ $produit->prix_vente }}</td>
                    <td>{{ $produit->stock_actuel }}</td>
                    <td>{{ $produit->stock_min }}</td>
                    <td>{{ $produit->stock_max }}</td>
                    <td>{{ $produit->categorie->nom_cat }}</td>
                    <td>
                        <a href="{{ route('produits.modifier', $produit->id_prod) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('produits.supp', $produit->id_prod) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
