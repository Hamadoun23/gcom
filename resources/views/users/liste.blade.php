<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
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
        }
        h1 {
            color: #00796b; /* Vert foncé pour le titre */
            font-size: 24px; /* Taille de police améliorée */
            margin-bottom: 20px;
        }
        .table thead {
            background-color: #66bb6a; /* Vert vif pour l'entête de la table */
            color: black; /* Texte clair pour la lisibilité */
        }
        .table thead th i {
            margin-right: 8px; /* Espacement de l'icône */
        }
        .table tbody tr:hover {
            background-color: #e9ecef; /* Arrière-plan gris clair lors du survol de la ligne */
        }
        .btn-danger {
            background-color: #d32f2f; /* Rouge vif pour le bouton de suppression */
            border-color: #d32f2f; /* Rouge vif pour le contour du bouton */
        }
        .btn-primary:disabled {
            background-color: #00796b;
            opacity: 0.6;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1><i class="fas fa-users"></i> Liste des utilisateurs</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('ajout_users') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Ajouter Utilisateur</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th><i class="fas fa-id-badge"></i>ID</th>
                <th><i class="fas fa-user"></i>Prénom</th>
                <th><i class="fas fa-user"></i>Nom</th>
                <th><i class="fas fa-phone"></i>Téléphone</th>
                <th><i class="fas fa-id-card"></i>Roles</th>
                <th><i class="fas fa-store"></i>Boutique</th>
                <th><i class="fas fa-cogs"></i>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id_users }}</td>
                    <td>{{ $user->prenom_users }}</td>
                    <td>{{ $user->nom_users }}</td>
                    <td>{{ $user->tel_users }}</td>
                    <td>{{ $user->roles }}</td>
                    <td>{{ $user->boutiques->nom_bout }}</td> <!-- Affichage du nom de la boutique -->
                    <td>
                        <a href="{{ route('modif_users', ['id_users' => $user->id_users]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Modifier</a>
                        <form action="{{ route('supp_users', ['id_users' => $user->id_users]) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
