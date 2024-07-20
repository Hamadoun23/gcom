<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Sortie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" />
    <style>
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            background-color: #0dcaf0; /* Couleur info de Bootstrap */
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
        .btn-info {
            background-color: #0dcaf0; /* Couleur info de Bootstrap */
            border-color: #0dcaf0;
            width: 100%;
        }
        .btn-info:hover {
            background-color: #0bb8e0;
            border-color: #0bb8e0;
        }
        .btn-secondary {
            background-color: #6c757d; /* Couleur gris de Bootstrap */
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #545b62;
            border-color: #4e555b;
        }
        .form-check-input:checked + .form-check-label:before {
            content: "\f14a"; /* Icône check */
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            margin-left: -1.25rem;
            margin-right: 0.25rem;
        }
        .quantite-input {
            display: none;
        }
        .product-image img {
            max-width: 100%;
            height: auto;
            max-height: 400px; /* Augmenter la hauteur maximale */
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .text-right {
            text-align: right;
        }
        .hidden {
            display: none;
        }
        .visible {
            display: block;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card mx-auto animate__animated animate__fadeIn" style="max-width: 900px;">
        <div class="card-header">
            <h2><i class="fas fa-plus-circle"></i> Ajouter une Sortie</h2>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <form id="sortie-form" action="{{ route('sortis.enregistrerSortis') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_vente" value="{{ $id_vente }}">

                        <div class="form-group">
                            <label for="produit"><i class="fas fa-pills"></i> Produits</label>
                            @foreach($produits as $produit)
                                <div class="form-check">
                                    <input class="form-check-input produit-checkbox" type="checkbox" name="produit[]" value="{{ $produit->id_prod }}">
                                    <label class="form-check-label">{{ $produit->libelle }}</label>
                                    <input type="number" name="quantite[]" class="form-control quantite-input" min="1" placeholder="Quantité pour {{ $produit->libelle }}">
                                </div>
                            @endforeach
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-info mt-3"><i class="fas fa-save"></i> Enregistrer la sortie</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="product-image">
                        <img src="{{ asset('asset/Fifa.jpeg') }}" alt="Image du produit">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.produit-checkbox').change(function() {
            var index = $('.produit-checkbox').index(this);
            var quantiteInput = $('.quantite-input').eq(index);

            if ($(this).is(':checked')) {
                quantiteInput.show().prop('disabled', false).addClass('animate__animated animate__fadeIn');
            } else {
                quantiteInput.hide().prop('disabled', true).val('').removeClass('animate__animated animate__fadeIn');
            }
        });

        $('#sortie-form').submit(function(event) {
            if ($('.produit-checkbox:checked').length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Veuillez sélectionner au moins un produit.',
                });
                event.preventDefault(); // Empêche l'envoi du formulaire
            }
        });
    });
</script>

</body>
</html>
