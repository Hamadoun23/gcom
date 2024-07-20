<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Vente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
        }
        .form-wrapper {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            font-size: 2rem;
            font-weight: bold;
            color: #28a745; /* Green color */
            margin-bottom: 20px;
            text-align: center;
        }
        .form-image {
            text-align: center;
            margin-top: 30px;
        }
        .form-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            color: #28a745; /* Green color */
        }
        .form-control {
            border-color: #28a745; /* Green color */
        }
        .btn-primary {
            background-color: #28a745 !important; /* Green color */
            border-color: #28a745 !important; /* Green color */
        }
        .btn-primary:hover {
            background-color: #218838 !important; /* Darker shade of green */
            border-color: #1e7e34 !important; /* Darker shade of green */
        }
        @media (max-width: 768px) {
            .form-wrapper {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="form-title">Ajouter une Vente</h1>

                    <form action="{{ route('ventes.enregistrer') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="tel_client">Numéro de téléphone du client</label>
                            <input type="text" name="tel_client" id="tel_client" class="form-control" value="{{ old('tel_client') }}" required>
                            @if($errors->has('tel_client'))
                                <span class="text-danger">{{ $errors->first('tel_client') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Vérifier le client</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="form-image">
                        <img src="{{ asset('asset/12983846_5114855.jpg') }}" alt="Image associée à la vente">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
