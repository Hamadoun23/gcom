<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DymoStock - Ajouter un Achat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #e9ecef;
            padding-top: 20px;
        }
        .card {
            max-width: 800px;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-header {
            background-color: #0d6efd; /* Bleu Info */
            color: white;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
        }
        .card-body {
            padding: 2rem;
            background-color: #f7f7f7;
        }
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-group input, .form-group select {
            padding-left: 2.5rem;
        }
        .form-group .fa {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #0d6efd; /* Bleu Info */
        }
        .btn-primary {
            background-color: #0d6efd; /* Bleu Info */
            border-color: #0d6efd; /* Bleu Info */
            border-radius: .25rem;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0b5ed7; /* Bleu Info plus foncé */
            border-color: #0a58ca; /* Bleu Info plus foncé */
        }
        .product-image {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .product-image img {
            max-width: 100%;
            height: auto;
            max-height: 300px;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fas fa-cart-plus"></i> Ajouter un Achat</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form id="achatForm" action="{{ route('achats.enregistrer') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="fournisseur" class="form-label">Fournisseur</label>
                                        <select name="fournisseur" id="fournisseur" class="form-control" required>
                                            @foreach($fournisseurs as $fournisseur)
                                                <option value="{{ $fournisseur->id_frs }}">{{ $fournisseur->prenom_frs }} {{ $fournisseur->nom_frs }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date d'Achat</label>
                                        <input type="date" name="date" id="date" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="user" class="form-label">Utilisateur</label>
                                        <select name="user" id="user" class="form-control" required>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id_users }}">{{ $user->prenom_users }} {{ $user->nom_users }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="boutique" class="form-label">Boutique</label>
                                        <select name="boutique" id="boutique" class="form-control" required>
                                            @foreach($boutiques as $boutique)
                                                <option value="{{ $boutique->id_bout }}">{{ $boutique->nom_bout }} - {{ $boutique->adresse_bout }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="product-image">
                                    <img src="{{ asset('asset/12083344_Wavy_Bus-17_Single-06.jpg') }}" alt="Image du produit" id="productImg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Récupère la date actuelle au format "YYYY-MM-DD"
            var today = new Date().toISOString().slice(0, 10);

            // Affecte la date actuelle au champ de date
            $('#date').val(today);
        });
    </script>
</body>
</html>
