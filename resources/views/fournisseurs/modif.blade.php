<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un fournisseur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Modifier un fournisseur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fournisseurs.mettreAJour', $fournisseur->id_frs) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="prenom_frs" class="form-label">Prénom du fournisseur</label>
            <input type="text" class="form-control" id="prenom_frs" name="prenom_frs" value="{{ old('prenom_frs', $fournisseur->prenom_frs) }}" required>
        </div>

        <div class="mb-3">
            <label for="nom_frs" class="form-label">Nom du fournisseur</label>
            <input type="text" class="form-control" id="nom_frs" name="nom_frs" value="{{ old('nom_frs', $fournisseur->nom_frs) }}" required>
        </div>

        <div class="mb-3">
            <label for="adresse_frs" class="form-label">Adresse du fournisseur</label>
            <input type="text" class="form-control" id="adresse_frs" name="adresse_frs" value="{{ old('adresse_frs', $fournisseur->adresse_frs) }}">
        </div>

        <div class="mb-3">
            <label for="tel_frs" class="form-label">Numéro de téléphone du fournisseur</label>
            <input type="text" class="form-control" id="tel_frs" name="tel_frs" value="{{ old('tel_frs', $fournisseur->tel_frs) }}">
        </div>

        <button type="submit" class="btn btn-primary">Modifier le fournisseur</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
