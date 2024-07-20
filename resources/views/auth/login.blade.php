<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Se connecter</h2>
   
        @csrf

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

        <a href="/">Se connecter</a>

        {{-- <button type="submit" class="btn btn-primary">Se connecter</button> --}}
   
</div>
</body>
</html>
