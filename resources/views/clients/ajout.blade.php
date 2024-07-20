<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
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
        .swal2-confirm.btn {
            background-color: #28a745 !important; /* Vert */
            color: white !important;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 900px;">
        <div class="card-header">
            <h2>Ajouter un client</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    @if ($errors->has('tel_client'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Client non trouvé',
                                    text: 'Le numéro de téléphone n\'existe pas, Veuillez l\'ajouter !',
                                    confirmButtonText: 'Ajouter le client',
                                    customClass: {
                                        confirmButton: 'btn btn-primary swal2-confirm'
                                    },
                                    buttonsStyling: false
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "{{ route('clients.ajout') }}";
                                    }
                                });
                            });
                        </script>
                    @endif

                    <form action="{{ route('clients.enregistrer') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="prenom_clt" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom_clt" name="prenom_clt" value="{{ old('prenom_clt') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nom_clt" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom_clt" name="nom_clt" value="{{ old('nom_clt') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="adresse_clt" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse_clt" name="adresse_clt" value="{{ old('adresse_clt') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tel_clt" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="tel_clt" name="tel_clt" value="{{ old('tel_clt') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter le client</button>
                    </form>
                </div>
                <div class="col-md-6 product-image">
                    <img src="{{ asset('asset/Scan to pay-amico.png') }}" alt="Image du produit">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
