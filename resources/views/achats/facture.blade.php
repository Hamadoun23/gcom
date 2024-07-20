<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture d'Achat</title>
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
            color: black; /* Assurez-vous que le texte est en noir */
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
        <h1><i class="fas fa-file-invoice"></i> Facture d'Achat</h1>
    </div>

    <div class="invoice-details">
        <p><strong><i class="fas fa-hashtag icon"></i>Achat ID:</strong> {{ $achat->id_act }}</p>
        <p><strong><i class="fas fa-user icon"></i>Fournisseur:</strong> {{ $achat->fournisseur->prenom_frs }} {{ $achat->fournisseur->nom_frs }}</p>
        <p><strong><i class="fas fa-calendar-alt icon"></i>Date d'Achat:</strong> {{ $achat->date_achat }}</p>
        <p><strong><i class="fas fa-user icon"></i>Utilisateur:</strong> {{ $achat->user->prenom_users }} {{ $achat->user->nom_users }}</p>
        <p><strong><i class="fas fa-store icon"></i>Boutique:</strong> {{ $achat->boutique->nom_bout }} - {{ $achat->boutique->adresse_bout }}</p>
    </div>

    <table class="table table-striped invoice-table">
        <thead class="table-dark">
            <tr>
                <th><i class="fas fa-cube icon"></i> Produit</th>
                <th><i class="fas fa-shopping-cart icon"></i> Quantité</th>
                <th><i class="fas fa-money-bill-wave icon"></i> Montant</th>
            </tr>
        </thead>
        <tbody>
            @foreach($achat->entrees as $entree)
                <tr>
                    <td>{{ $entree->libelle_entree }}</td>
                    <td>{{ $entree->qte_entree }}</td>
                    <td>{{ number_format($entree->montant_entree, 2, ',', ' ') }} FCFA</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-amount">
        <h4><strong>Montant Total: </strong>{{ number_format($achat->calculerMontantTotal(), 2, ',', ' ') }} FCFA</h4>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
