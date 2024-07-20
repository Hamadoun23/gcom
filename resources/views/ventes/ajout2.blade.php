<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Vente - Étape 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            background-color: #28a745; /* Vert */
            color: white;
            text-align: center;
            padding: 1.5rem;
        }
        .card-body {
            padding: 2rem;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #28a745; /* Vert */
            border-color: #28a745;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
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

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 900px;">
        <div class="card-header">
            <h2>Ajouter une Vente - Étape 2</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('ventes.enregistrer2') }}" method="POST">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ $client_id }}">

                        <div class="mb-3">
                            <label for="user" class="form-label">Utilisateur</label>
                            <select name="user" id="user" class="form-control" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id_users }}">{{ $user->prenom_users }} {{ $user->nom_users }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Date de vente</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="boutique" class="form-label">Boutique</label>
                            <select name="boutique" id="boutique" class="form-control" required>
                                @foreach($boutiques as $boutique)
                                    <option value="{{ $boutique->id_bout }}">{{ $boutique->nom_bout }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer la vente</button>
                    </form>
                </div>
                <div class="col-md-6 product-image">
                    <img src="{{ asset('asset/vente.jpg') }}" alt="Image du produit">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
