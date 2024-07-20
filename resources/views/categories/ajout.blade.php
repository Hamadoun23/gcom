<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajoutez ici votre propre CSS personnalisé si nécessaire */
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h1 class="card-title">Ajouter une catégorie</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('enregistrer_categorie') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom_cat" class="form-label">Nom de la catégorie</label>
                    <input type="text" class="form-control" id="nom_cat" name="nom_cat" required>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter la catégorie</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
