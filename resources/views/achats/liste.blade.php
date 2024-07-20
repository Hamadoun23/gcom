<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Achats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .card {
            margin-bottom: 20px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #0dcaf0; /* Couleur bleue Bootstrap info */
            color: #212529; /* Couleur texte foncée */
        }
        .details-achat {
            display: none;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
        }
        .details-achat ul {
            list-style-type: none;
            padding: 0;
        }
        .details-achat ul li {
            margin-bottom: 5px;
        }
        .btn-vert-fonce {
            background-color: #28a745; /* Vert foncé */
            border-color: #28a745; /* Couleur de bordure */
            color: #fff; /* Couleur du texte */
        }
        .btn-bleu-transparent {
            color: #007bff; /* Couleur bleue */
            border-color: #007bff; /* Couleur de bordure bleue */
        }
        .btn-bleu-transparent:hover {
            background-color: #007bff; /* Couleur de fond bleue au survol */
            color: #fff; /* Couleur du texte en survol */
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center mb-4">Liste des Achats</h1>

    <div class="mb-3">
        <a href="{{ route('achats.ajout') }}" class="btn btn-vert-fonce">Faire un Achat</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 g-4" id="achats-container">
        @foreach($achats as $achat)
            <div class="col" data-id="{{ $achat->id_act }}">
                <div class="card">
                    <div class="card-header">
                        Achat ID: {{ $achat->id_act }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Fournisseur: {{ $achat->fournisseur->prenom_frs }} {{ $achat->fournisseur->nom_frs }}</h5>
                        <p class="card-text">Date d'achat: {{ $achat->date_achat }}</p>
                        <p class="card-text">Utilisateur: {{ $achat->user->prenom_users }} {{ $achat->user->nom_users }}</p>
                        <p class="card-text">Boutique: {{ $achat->boutique->nom_bout }} - {{ $achat->boutique->adresse_bout }}</p>
                        <p class="card-text"><strong>Montant Total: {{ number_format($achat->calculerMontantTotal(), 2, ',', ' ') }} FCFA</strong></p>
                        <button class="btn btn-vert-fonce voir-details" data-achat="{{ $achat->id_act }}">Voir détails</button>
                        <a href="{{ route('achats.facture', ['id' => $achat->id_act]) }}" class="btn btn-primary">Imprimer la facture</a>
                    </div>
                    <div class="details-achat" id="details-achat-{{ $achat->id_act }}">
                        <ul>
                            <li><strong>Produits achetés :</strong></li>
                            @foreach($achat->entrees as $entree)
                                <li>{{ $entree->libelle_entree }} - Quantité : {{ $entree->qte_entree }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const achatsContainer = document.getElementById('achats-container');
        const cards = Array.from(achatsContainer.getElementsByClassName('col'));

        // Trier les cartes par ID d'achat (data-id) en ordre décroissant
        cards.sort((a, b) => {
            return b.getAttribute('data-id') - a.getAttribute('data-id');
        });

        // Réorganiser le DOM
        cards.forEach(card => {
            achatsContainer.appendChild(card);
        });

        // Gestion des boutons de détails
        const boutonsDetails = document.querySelectorAll('.voir-details');
        boutonsDetails.forEach(bouton => {
            bouton.addEventListener('click', function() {
                const achatId = this.getAttribute('data-achat');
                const detailsAchat = document.getElementById(`details-achat-${achatId}`);
                detailsAchat.style.display = detailsAchat.style.display === 'block' ? 'none' : 'block';
            });
        });
    });
</script>
</body>
</html>
