<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçu de Vente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .invoice-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details p {
            margin: 5px 0;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .invoice-table th {
            color: black; /* Couleur du texte des <th> */
        }
        .total-amount {
            text-align: right;
            margin-top: 20px;
        }
        .icon {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="invoice-title">
        <h1><i class="fas fa-file-invoice"></i> Reçu de Vente</h1>
    </div>

    <div class="invoice-details">
        <p><strong><i class="fas fa-hashtag icon"></i>Vente ID:</strong> {{ $vente->id_vente }}</p>
        <p><strong><i class="fas fa-user icon"></i>Client:</strong> {{ $vente->client ? $vente->client->prenom_clt . ' ' . $vente->client->nom_clt : 'Non renseigné' }}</p>
        <p><strong><i class="fas fa-calendar-alt icon"></i>Date de Vente:</strong> {{ $vente->date_vente }}</p>
        <p><strong><i class="fas fa-user icon"></i>Utilisateur:</strong> {{ $vente->user ? $vente->user->prenom_users . ' ' . $vente->user->nom_users : 'Utilisateur non trouvé' }}</p>
        <p><strong><i class="fas fa-store icon"></i>Boutique:</strong> {{ $vente->boutique ? $vente->boutique->nom_bout . ' - ' . $vente->boutique->adresse_bout : 'Boutique non trouvée' }}</p>
    </div>

    <table class="table table-striped invoice-table">
        <thead class="table-dark">
            <tr>
                <th class="text-dark">Produit</th>
                <th class="text-dark">Quantité</th>
                <th class="text-dark">Montant</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vente->sortis as $sorti)
                <tr>
                    <td>{{ $sorti->libelle_sortis }}</td>
                    <td>{{ $sorti->qte_sortis }}</td>
                    <td>{{ number_format($sorti->montant_sortis, 2, ',', ' ') }} FCFA</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-amount">
        <h4><strong>Montant Total: </strong>{{ number_format($vente->montant_vente, 2, ',', ' ') }} FCFA</h4>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
