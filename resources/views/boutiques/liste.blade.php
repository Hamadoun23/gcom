<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des boutiques</title>
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
        h1 {
            color: #00796b;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .table thead {
            background-color: #66bb6a; /* Couleur verte claire */
            color: black;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-danger {
            background-color: #d32f2f;
            border-color: #d32f2f;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1><i class="fas fa-store"></i> Liste des boutiques</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('ajout_boutiques') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Ajouter Boutique</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th><i class="fas fa-id-badge"></i> ID</th>
                <th><i class="fas fa-store"></i> Nom de la boutique</th>
                <th><i class="fas fa-map-marker-alt"></i> Adresse</th>
                <th><i class="fas fa-cogs"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boutiques as $boutique)
                <tr>
                    <td>{{ $boutique->id_bout }}</td>
                    <td>{{ $boutique->nom_bout }}</td>
                    <td>{{ $boutique->adresse_bout }}</td>
                    <td>
                        <a href="{{ route('modif_boutiques', ['id_bout' => $boutique->id_bout]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Modifier</a>
                        <a href="{{ route('details_boutique', ['id' => $boutique->id_bout]) }}" class="btn btn-info"><i class="fas fa-info-circle"></i> Détails</a>
                        <form action="{{ route('supp_boutiques', ['id_bout' => $boutique->id_bout]) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette boutique ?');">
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
