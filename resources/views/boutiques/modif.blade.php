<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Boutique</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-container {
            flex: 1;
            padding-right: 20px;
        }
        .image-container {
            flex: 1;
            text-align: center;
        }
        .image-container img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="form-container">
        <h1 class="mb-4 text-success"><i class="fas fa-store"></i> Modifier la boutique</h1> 

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('enregistrer_modif_boutiques', $boutique->id_bout) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom_bout" class="form-label"><i class="fas fa-building"></i> Nom de la boutique</label>
                <input type="text" class="form-control" id="nom_bout" name="nom_bout" value="{{ $boutique->nom_bout }}" required>
            </div>
            <div class="mb-3">
                <label for="adresse_bout" class="form-label"><i class="fas fa-map-marker-alt"></i> Adresse de la boutique</label>
                <input type="text" class="form-control" id="adresse_bout" name="adresse_bout" value="{{ $boutique->adresse_bout }}" required>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enregistrer les modifications</button>
        </form>
    </div>

    <div class="image-container">
        <img src="{{ asset('asset/boutique.jpg') }}" alt="Image de boutique" class="img-fluid">
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
