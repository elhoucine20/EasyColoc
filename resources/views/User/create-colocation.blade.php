<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Colocation - ColoSpace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/createColocation.css')}}">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-logo">
                <i class="fas fa-home"></i>
                <span>ColoSpace</span>
            </a>

            <a href="{{route('colocation.index')}}" class="navbar-back">
                <i class="fas fa-arrow-left"></i>
                <span>Retour</span>
            </a>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
        <div class="form-card">

            <!-- Success Message (Hidden by default) -->
            <div class="success-message" id="successMessage">
                <span class="success-text">Colocation créée avec succès !</span>
                <!-- <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div> -->
            </div>

            <!-- Form Header -->
            <div class="form-header">
                <div class="form-icon">
                    <i class="fas fa-home-lg-alt"></i>
                </div>
                <h1 class="form-title">Créer une Colocation</h1>
                <p class="form-subtitle">Créez votre espace de colocation et commencez à gérer vos dépenses partagées facilement</p>
            </div>

            <!-- Form -->
            <form action="{{route('colocation.store')}}" method="post" class="colocation-form" id="colocationForm">

                @csrf
                @method('POST')
                <!-- Nom de la colocation -->
                <div class="form-group">
                    <label class="form-label" for="colocationName">
                        <i class="fas fa-building"></i>
                        Nom de la colocation
                        <span class="required">*</span>
                    </label>
                    <input
                        value="{{old('colocationName')}}"
                        type="text"
                        id="colocationName"
                        name="colocationName"
                        class="form-input"
                        placeholder="Ex: Appartement Centre Ville"
                        required
                        maxlength="50">
                    @error('colocationName')
                    <div style="color: #e74c3c;">{{$message}}
                    </div>
                    @enderror
                    @if(session('error'))
                    <div style="color: #e74c3c;">{{session('error')}}
                    </div>
                    @endif
                    <span class="error-message" id="nameError">Veuillez entrer un nom de colocation</span>
                    <span class="form-hint">Choisissez un nom unique et mémorable pour votre colocation</span>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{route('colocation.index')}}">
                        <button type="button" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            <span>Annuler</span>
                        </button>
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i>
                        <span>Créer la colocation</span>
                    </button>
                </div>

            </form>

        </div>
    </div>
</body>

</html>