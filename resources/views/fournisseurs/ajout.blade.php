<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un fournisseur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            background-color: #dc3545; /* Rouge */
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
            background-color: #dc3545; /* Rouge */
            border-color: #dc3545;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .product-image img {
            max-width: 100%;
            height: auto;
            max-height: 300px;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .swal2-confirm.btn {
            background-color: #dc3545 !important; /* Rouge */
            color: white !important;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="card mx-auto" style="max-width: 900px;">
        <div class="card-header">
            <h2>Ajouter un fournisseur</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('fournisseurs.enregistrer') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="prenom_frs" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom_frs" name="prenom_frs" value="{{ old('prenom_frs') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom_frs" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom_frs" name="nom_frs" value="{{ old('nom_frs') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="adresse_frs" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse_frs" name="adresse_frs" value="{{ old('adresse_frs') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tel_frs" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="tel_frs" name="tel_frs" value="{{ old('tel_frs') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter le fournisseur</button>
                    </form>
                </div>
                <div class="col-md-6 product-image">
                    <img src="{{ asset('asset/fourni.jpg') }}" alt="Image du fournisseur">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
