<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }
        .table {
            margin-top: 1rem;
        }
        .btn {
            margin-top: 1rem;
            width: auto;
        }
        .header-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-buttons .btn {
            margin: 0.5rem;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="header-buttons">
        <h1>Détails de la Boutique : {{ $boutique->nom_bout }}</h1>
        <div>
            <a href="{{ route('produits.ajout') }}" class="btn btn-info"><i class="fas fa-plus"></i> Ajouter un Produit</a>
            <a href="{{ route('ajout_categorie') }}" class="btn btn-info"><i class="fas fa-plus"></i> Ajouter une Catégorie</a>
        </div>
    </div>
    <p><strong>Adresse :</strong> {{ $boutique->adresse_bout }}</p>

    <h2>Produits</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-info">
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Description</th>
                <th>Prix Achat</th>
                <th>Prix Vente</th>
                <th>Stock Actuel</th>
                <th>Stock Min</th>
                <th>Stock Max</th>
                <th>Catégorie</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boutique->produits as $produit)
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
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('liste_boutiques') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour à la liste des boutiques</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
