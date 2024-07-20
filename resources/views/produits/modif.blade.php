<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Modifier un produit</h1>
    <form action="{{ route('produits.mettreAJour', $produit->id_prod) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Formulaire de modification de produit -->
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $produit->libelle }}" required>
            @error('libelle')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $produit->description }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="prix_achat" class="form-label">Prix d'achat</label>
            <input type="number" class="form-control" id="prix_achat" name="prix_achat" step="0.01" value="{{ $produit->prix_achat }}" required>
            @error('prix_achat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="prix_vente" class="form-label">Prix de vente</label>
            <input type="number" class="form-control" id="prix_vente" name="prix_vente" step="0.01" value="{{ $produit->prix_vente }}" required>
            @error('prix_vente')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock_actuel" class="form-label">Stock actuel</label>
            <input type="number" class="form-control" id="stock_actuel" name="stock_actuel" value="{{ $produit->stock_actuel }}" required>
            @error('stock_actuel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock_min" class="form-label">Stock minimum</label>
            <input type="number" class="form-control" id="stock_min" name="stock_min" value="{{ $produit->stock_min }}" required>
            @error('stock_min')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock_max" class="form-label">Stock maximum</label>
            <input type="number" class="form-control" id="stock_max" name="stock_max" value="{{ $produit->stock_max }}" required>
            @error('stock_max')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Champs pour la catégorie et la boutique -->
        <div class="mb-3">
            <label for="id_categorie" class="form-label">Catégorie</label>
            <select class="form-select" id="id_categorie" name="id_categorie" required>
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id_cat }}" @if($produit->id_categorie == $categorie->id_cat) selected @endif>{{ $categorie->nom_cat }}</option>
                @endforeach
            </select>
            @error('id_categorie')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_boutique" class="form-label">Boutique</label>
            <select class="form-select" id="id_boutique" name="id_boutique" required>
                <option value="">Sélectionner une boutique</option>
                @foreach($boutiques as $boutique)
                    <option value="{{ $boutique->id_bout }}" @if($produit->id_boutique == $boutique->id_bout) selected @endif>{{ $boutique->nom_bout }}</option>
                @endforeach
            </select>
            @error('id_boutique')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Modifier le produit</button>

        <!-- Ajoutez d'autres champs pré-rem
