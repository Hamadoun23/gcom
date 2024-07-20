<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>S'inscrire</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="nom_users">Nom</label>
            <input type="text" class="form-control" id="nom_users" name="nom_users" required>
            @error('nom_users')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="prenom_users">Prénom</label>
            <input type="text" class="form-control" id="prenom_users" name="prenom_users" required>
            @error('prenom_users')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tel_users">Téléphone</label>
            <input type="text" class="form-control" id="tel_users" name="tel_users" required>
            @error('tel_users')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
            @error('mot_de_passe')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_boutique">Boutique</label>
            <select class="form-control" id="id_boutique" name="id_boutique" required>
                @foreach ($boutiques as $boutique)
                    <option value="{{ $boutique->id_bout }}">{{ $boutique->nom_boutique }}</option>
                @endforeach
            </select>
            @error('id_boutique')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="roles">Rôle</label>
            <select class="form-control" id="roles" name="roles" required>
                <option value="Caissier">Caissier</option>
                <option value="Gerant">Gérant</option>
                <option value="Admin">Admin</option>
            </select>
            @error('roles')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
</body>
</html>
