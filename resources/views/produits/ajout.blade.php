<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1 class="mb-4">Ajouter un produit</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('produits.enregistrer') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="libelle" class="form-label"><i class="fas fa-tag"></i> Libellé</label>
                            <input type="text" class="form-control" id="libelle" name="libelle" required>
                            @error('libelle')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label"><i class="fas fa-info-circle"></i> Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prix_achat" class="form-label"><i class="fas fa-money-bill-wave"></i> Prix d'achat</label>
                                    <input type="number" class="form-control" id="prix_achat" name="prix_achat" step="0.01" required>
                                    @error('prix_achat')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prix_vente" class="form-label"><i class="fas fa-money-bill-wave"></i> Prix de vente</label>
                                    <input type="number" class="form-control" id="prix_vente" name="prix_vente" step="0.01" required>
                                    @error('prix_vente')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="stock_min" class="form-label"><i class="fas fa-box-open"></i> Stock minimum</label>
                            <input type="number" class="form-control" id="stock_min" name="stock_min" required>
                            @error('stock_min')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stock_max" class="form-label"><i class="fas fa-boxes"></i> Stock maximum</label>
                            <input type="number" class="form-control" id="stock_max" name="stock_max" required>
                            @error('stock_max')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_categorie" class="form-label"><i class="fas fa-list-alt"></i> Catégorie</label>
                            <select class="form-select" id="id_categorie" name="id_categorie" required>
                                <option value="">Sélectionner une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id_cat }}">{{ $categorie->nom_cat }}</option>
                                @endforeach
                            </select>
                            @error('id_categorie')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_boutique" class="form-label"><i class="fas fa-store"></i> Boutique</label>
                            <select class="form-select" id="id_boutique" name="id_boutique" required>
                                <option value="">Sélectionner une boutique</option>
                                @foreach($boutiques as $boutique)
                                    <option value="{{ $boutique->id_bout }}">{{ $boutique->nom_bout }}</option>
                                @endforeach
                            </select>
                            @error('id_boutique')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter le produit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
