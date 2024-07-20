<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Modifier une catégorie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mettre_a_jour_categorie', $categorie->id_cat) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom_cat" class="form-label">Nom de la catégorie</label>
            <input type="text" class="form-control" id="nom_cat" name="nom_cat" value="{{ $categorie->nom_cat }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Modifier la catégorie</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
