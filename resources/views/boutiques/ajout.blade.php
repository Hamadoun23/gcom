<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #e0f7fa 0%, #ffffff 100%);
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .image-container {
            text-align: center; /* Pour centrer l'image verticalement */
        }
        .image-container img {
            max-width: 100%; /* Ajuster la taille maximale de l'image */
            border-radius: 8px; /* Coins arrondis pour l'image */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-4 text-success"><i class="fas fa-store"></i> Ajouter une boutique</h1> 

            @if ($errors->has('nom_bout'))
                <div class="alert alert-danger">
                    {{ $errors->first('nom_bout') }}
                </div>
            @endif

            <form action="{{ route('enregistrer_boutiques') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nom_bout" class="form-label"><i class="fas fa-building"></i> Nom de la boutique</label>
                    <input type="text" class="form-control" id="nom_bout" name="nom_bout" required>
                </div>
                <div class="mb-3">
                    <label for="adresse_bout" class="form-label"><i class="fas fa-map-marker-alt"></i> Adresse de la boutique</label>
                    <input type="text" class="form-control" id="adresse_bout" name="adresse_bout" required>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter la boutique</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="image-container">
                <img src="{{ asset('asset/boutique.jpg') }}" alt="Image de la boutique">
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
