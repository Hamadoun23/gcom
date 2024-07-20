<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Modifier un client</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.mettre_a_jour', $client->id_clt) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="prenom_clt" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom_clt" name="prenom_clt" value="{{ $client->prenom_clt }}" required>
        </div>
        
        <div class="mb-3">
            <label for="nom_clt" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom_clt" name="nom_clt" value="{{ $client->nom_clt }}" required>
        </div>
        
        <div class="mb-3">
            <label for="adresse_clt" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse_clt" name="adresse_clt" value="{{ $client->adresse_clt }}">
        </div>
        
        <div class="mb-3">
            <label for="tel_clt" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="tel_clt" name="tel_clt" value="{{ $client->tel_clt }}">
        </div>

        <button type="submit" class="btn btn-primary">Modifier le client</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
