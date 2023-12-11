<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de profil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>

    <style>
        
        .custom-container {
        max-width: 1200px;
         margin: 0 auto;
    }
    .custom-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .custom-btn-primary {
        background: linear-gradient(108deg, #EC5FC5 0%, #F87273 27%, #FF4800 63%, #FF0E00 100%);
        color: #fff;
}

.container .custom-btn-primary:hover {
    background: linear-gradient(108deg, #EC5FC5 0%, #F87273 27%, #FF4800 63%, #FF0E00 100%);
}

.custom-btn-secondary {
    background: linear-gradient(108deg, #ff0000, #df8806);
    color: #fff;
}

.list-group-item.active {
    background: linear-gradient(108deg, #EC5FC5 0%, #F87273 27%, #FF4800 63%, #FF0E00 100%);
    color: #fff;
}

    </style>

        <script>
            $(document).ready(function () {
                $('#profileForm').submit(function (event) {
                    var mobileValue = $('input[name="mobile"]').val();
                    $('#mobileError').text('').removeClass('text-danger');
                    if (!/^\d+$/.test(mobileValue)) {
                        event.preventDefault();
                        $('#mobileError').text('Le champ "Mobile" doit contenir uniquement des chiffres.').addClass('text-danger');
                    }
                });
            });
        </script>


</head>

<body class="mt-5">
        <div class="custom-container light-style flex-grow-1 container-p-y mb-4">
        <img src="" alt="">
            <div class="card custom-card  ">
                <div class="row no-gutters  row-bordered row-border-light">
                <div class="col-md-3 pt-0 ">
                    <div class="list-group list-group-flush account-settings-links ">
                        <a class="list-group-item list-group-item-action active mb-5" data-toggle="list"href="#">
                            Profile Info</a>
                    </div>
                    <div class="list-group-item border-0">
                        <img src="{{ asset('images/noprofil.png') }}" alt="Profile Image" class="img-fluid" width="100" height="100">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <form id="profileForm" action="{{ route('profiles.mettre-a-jour', ['id' => $utilisateur->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="upload mb-3">
                                    @if ($utilisateur->photo)
                                        <img id="profileImage" src="{{ asset('images/noprofil.png') }}" width="100" height="100" alt="Profile Photo" class="rounded-circle">
                                    @else
                                        <img id="profileImage" src="{{ asset('images/noprofil.png') }}" width="100" height="100" alt="Default Photo" class="rounded-circle">
                                    @endif
                                    <div class="round">
                                        <input type="file" name="photo" id="photoInput" class="d-none">
                                        <label for="photoInput" class="btn custom-btn-primary"><i class="fas fa-camera"></i> Change Photo</label>
                                    </div>
                                </div>
                                <div class="form row">
                                    <div class="form-group col-6  ">
                                        <label class="form-label">Nom</label>
                                        <input type="text" class="form-control" value="{{ $utilisateur->nom ?? '' }}"
                                            name="nom" required>
                                    </div>
                                    <div class="form-group col-6  ">
                                        <label class="form-label">Prenom</label>
                                        <input type="text" class="form-control"
                                            value="{{ $utilisateur->prenom ?? '' }}" name="prenom" required>
                                    </div>

                                    <div class="form-group col-6 ">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control"
                                            value="{{ $utilisateur->username ?? '' }}" name="username" required>
                                    </div>

                                    <div class="form-group col-6  ">
                                        <label class="form-label">Bio</label>
                                        <input type="text" class="form-control"
                                        value="{{ optional($utilisateur->profile)->bio }}" name="bio" required>
                                    </div>

                                    <div class="form-group col-6  ">
                                        <label class="form-label">Date de Naissance</label>
                                        <input type="date" class="form-control"
                                            value="{{ $utilisateur->date_de_naissance ?? ''}}" name="date_de_naissance" required>
                                    </div>

                                    <div class="form-group col-6  ">
                                        <label class="form-label">Genre:</label>
                                        <select class="form-control" name="genre">
                                            <option value="homme" {{ ($utilisateur->genre == 'homme') ? 'selected' : '' }}>Homme</option>
                                            <option value="femme" {{ ($utilisateur->genre == 'femme') ? 'selected' : '' }}>Femme</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6  ">
                                        <label class="form-label">Adresse</label>
                                        <input type="text" class="form-control"
                                            value="{{ $utilisateur->adresse ?? '' }}" name="adresse" required>
                                    </div>

                                    <div class="form-group col-6   ">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control"
                                            value="{{ $utilisateur->mobile ?? '' }}" name="mobile" required>
                                            <span id="mobileError" class="error-message text-danger"></span>                                    </div>
                                </div>
                                <div class="text-right mb-3">
                                    <button type="submit" class="btn custom-btn-primary">Modifier le profil</button>
                                    <button type="reset" class="btn custom-btn-secondary">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/image.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
</body>

</html>
