<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des fournisseurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Liste des fournisseurs</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('fournisseurs.ajout') }}" class="btn btn-primary mb-3">Ajouter Fournisseur</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->id_frs }}</td>
                    <td>{{ $fournisseur->prenom_frs }}</td>
                    <td>{{ $fournisseur->nom_frs }}</td>
                    <td>{{ $fournisseur->adresse_frs }}</td>
                    <td>{{ $fournisseur->tel_frs }}</td>
                    <td>
                        <a href="{{ route('fournisseurs.modif', $fournisseur->id_frs) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('fournisseurs.supp', $fournisseur->id_frs) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?');">Supprimer</button>
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
