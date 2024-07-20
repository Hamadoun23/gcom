<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #e0f7fa 0%, #ffffff 100%); /* Dégradé de bleu ciel à blanc */
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column; /* Passage en colonne pour mobile/tablette */
            gap: 20px; /* Espacement entre les groupes de champs */
        }
        h1 {
            color: #00796b; /* Vert foncé pour le titre */
            font-size: 24px; /* Taille de police améliorée */
            margin-bottom: 20px;
            text-align: center; /* Alignement du titre */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #00796b; /* Bleu foncé pour le bouton */
            border-color: #00796b; /* Bleu foncé pour le contour du bouton */
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1><i class="fas fa-edit"></i> Modifier un utilisateur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update_users', ['id_users' => $user->id_users]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12 col-md-6"> <!-- Partie gauche pour mobile/tablette -->
                <div class="form-group">
                    <label for="prenom_users" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom_users" name="prenom_users" value="{{ $user->prenom_users }}" required>
                </div>
                <div class="form-group">
                    <label for="nom_users" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom_users" name="nom_users" value="{{ $user->nom_users }}" required>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe" class="form-label">Mot de passe (laissez vide pour ne pas changer)</label>
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
                </div>
            </div>
            <div class="col-12 col-md-6"> <!-- Partie droite pour mobile/tablette -->
                <div class="form-group">
                    <label for="tel_users" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="tel_users" name="tel_users" value="{{ $user->tel_users }}" required>
                </div>
                <div class="form-group">
                    <label for="roles" class="form-label">Roles</label>
                    <select class="form-control" id="roles" name="roles" required>
                        <option value="Caissier" {{ $user->roles == 'Caissier' ? 'selected' : '' }}>Caissier</option>
                        <option value="Gerant" {{ $user->roles == 'Gerant' ? 'selected' : '' }}>Gerant</option>
                        <option value="Admin" {{ $user->roles == 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_boutique" class="form-label">Boutique</label>
                    <select class="form-control" id="id_boutique" name="id_boutique" required>
                        @foreach($boutiques as $boutique)
                            <option value="{{ $boutique->id_bout }}" {{ $user->id_boutique == $boutique->id_bout ? 'selected' : '' }}>{{ $boutique->nom_bout }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Modifier l'utilisateur</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
