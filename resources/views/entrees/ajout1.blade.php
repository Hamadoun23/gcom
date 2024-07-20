<!-- resources/views/entrees/ajout1.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DymoStock - Ajouter une Entrée</title>
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
                        <h2><i class="fas fa-plus"></i> Ajouter une Entrée</h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="entree-form" action="{{ route('entrees.enregistrer') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_act" value="{{ $id_act }}">

                            <div class="row">
                                <div class="col-md-6">
                                    @foreach($produits as $produit)
                                        <div class="form-group row">
                                            <div class="col-md-1">
                                                <input type="checkbox" class="produit-checkbox" name="produit[]" value="{{ $produit->id_prod }}">
                                            </div>
                                            <div class="col-md-5">
                                                <label>{{ $produit->libelle }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control quantite-input" name="quantite[]" min="1" placeholder="Quantité" style="display:none;" disabled>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <div class="product-image">
                                        <img src="{{ asset('asset/entree.jpg') }}" alt="Image du produit">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.produit-checkbox').change(function() {
                const quantiteInput = $(this).closest('.form-group').find('.quantite-input');
                if ($(this).is(':checked')) {
                    quantiteInput.show().prop('disabled', false);
                } else {
                    quantiteInput.hide().prop('disabled', true);
                }
            });

            $('#entree-form').submit(function() {
                let valid = false;
                $('.quantite-input').each(function() {
                    if ($(this).val() > 0) {
                        valid = true;
                    }
                });

                if (!valid) {
                    alert('Veuillez sélectionner au moins un produit avec une quantité supérieure à zéro.');
                    return false;
                }
            });
        });
    </script>
</body>
</html>
