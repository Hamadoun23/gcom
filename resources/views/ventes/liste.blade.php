<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des ventes</title>
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
            background-color: #17a2b8; /* Couleur bleue info */
            color: #fff;
        }
        .details-vente {
            display: none;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
        }
        .details-vente ul {
            list-style-type: none;
            padding: 0;
        }
        .details-vente ul li {
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
    <h1 class="text-center mb-4">Liste des ventes</h1>

    <a href="{{ route('ventes.ajout') }}" class="btn btn-success mb-3">Réaliser une vente</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($ventes->reverse() as $vente) {{-- Inversion de l'ordre des ventes --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Vente ID: {{ $vente->id_vente }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Utilisateur: {{ $vente->user ? $vente->user->prenom_users . ' ' . $vente->user->nom_users : 'Utilisateur non trouvé' }}</h5>
                        <p class="card-text">Date de vente: {{ $vente->date_vente }}</p>
                        <p class="card-text">Boutique: {{ $vente->boutique ? $vente->boutique->nom_bout : 'Boutique non trouvée' }}</p>
                        <p class="card-text">Client: {{ $vente->client ? $vente->client->prenom_clt . ' ' . $vente->client->nom_clt : 'Non renseigné' }}</p>
                        <p class="card-text"><strong> Montant des ventes: {{ $vente->montant_vente }}</strong></p>
                        <a href="{{ route('ventes.recu', ['id' => $vente->id_vente]) }}" class="btn btn-primary">Imprimer reçu</a>
                        <button class="btn btn-vert-fonce voir-details" data-vente="{{ $vente->id_vente }}">Voir détails</button>
                    </div>
                    <div class="details-vente" id="details-vente-{{ $vente->id_vente }}">
                        <ul>
                            <li><strong>Produits achetés :</strong></li>
                            @if ($vente->sortis && $vente->sortis->count() > 0)
                                @foreach ($vente->sortis as $sorti)
                                    <li>{{ $sorti->libelle_sortis }} - Quantité : {{ $sorti->qte_sortis }}</li>
                                @endforeach
                            @else
                                <li>Aucun produit vendu pour cette vente.</li>
                            @endif
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
        const boutonsDetails = document.querySelectorAll('.voir-details');
        boutonsDetails.forEach(bouton => {
            bouton.addEventListener('click', function() {
                const venteId = this.getAttribute('data-vente');
                const detailsVente = document.getElementById(`details-vente-${venteId}`);
                detailsVente.style.display = detailsVente.style.display === 'block' ? 'none' : 'block';
            });
        });
    });
</script>
</body>
</html>
