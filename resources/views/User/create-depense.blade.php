<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Dépense - ColocApp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/createDepense.css')}}">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-logo">
                <i class="fas fa-home"></i>
                <span>ColocApp</span>
            </a>

            <div class="navbar-links">
                <a href="{{route('colocation.show',$idColocation)}}" class="navbar-back">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour</span>
                </a>
                <a href="{{route('colocation.show',$idColocation)}}" class="nav-link">
                    <i class="fas fa-user-circle"></i>
                    <span>Profile</span>
                </a>
                <a href="{{route('logout')}}" class="nav-link logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
        <div class="form-card">

            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <span class="success-text">Dépense ajoutée avec succès !</span>
            </div>

            <!-- Form Header -->
            <div class="form-header">
                <div class="form-icon">
                    <i class="fas fa-receipt"></i>
                </div>
                <h1 class="form-title">Créer une nouvelle dépense</h1>
                <p class="form-subtitle">Ajoutez une dépense partagée pour votre colocation</p>
            </div>

            <!-- Form -->
            <form action="{{route('depense.store',$idColocation)}}" method="post" class="expense-form" id="expenseForm">
                @csrf
                @method('POST')
                <!-- Title -->
                <input type="text" hidden name="colocation_id" value="{{$idColocation}}">
                <div class="form-group full-width">
                    <label class="form-label" for="title">
                        <i class="fas fa-tag"></i>
                        Titre de la dépense
                        <span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        id="expenseTitle"
                        name="title"
                        class="form-input"
                        placeholder="Ex: Courses de la semaine"
                        required
                        maxlength="100">
                    <span class="error-message" id="titleError">Veuillez entrer un titre</span>
                </div>

                <!-- Amount and Date Row -->
                <div class="form-row">
                    <!-- Amount -->
                    <div class="form-group">
                        <label class="form-label" for="montant">
                            <i class="fas fa-dollar-sign"></i>
                            Montant
                            <span class="required">*</span>
                        </label>
                        <div class="input-group">
                            <input
                                type="number"
                                id="expenseAmount"
                                name="montant"
                                class="form-input"
                                placeholder="0.00"
                                required
                                min="0"
                                step="0.01">
                        </div>
                        <span class="error-message" id="amountError">Veuillez entrer un montant</span>
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <label class="form-label" for="date">
                            <i class="fas fa-calendar-alt"></i>
                            Date
                            <span class="required">*</span>
                        </label>
                        <input
                            type="date"
                            id="expenseDate"
                            name="date"
                            class="form-input"
                            required>
                        <span class="error-message" id="dateError">Veuillez sélectionner une date</span>
                    </div>
                </div>

                <!-- Category and Payer Row -->
                <div class="form-row">
                    <!-- Category -->
                    <div class="form-group">
                        <label class="form-label" for="categorie_id">
                            <i class="fas fa-list"></i>
                            Catégorie
                            <span class="required">*</span>
                        </label>
                        <select
                            id="expenseCategory"
                            name="categorie_id"
                            class="form-select"
                            required>
                            <option value="">Sélectionner une catégorie</option>
                            @if($categories)
                            @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                            @endforeach


                            @endif

                        </select>
                        <span class="error-message" id="categoryError">Veuillez sélectionner une catégorie</span>
                    </div>

                    <!-- Payer -->
                    <div class="form-group">
                        <label class="form-label" for="payer_id">
                            <i class="fas fa-user"></i>
                            Payeur
                            <span class="required">*</span>
                        </label>
                        <select
                            id="expensePayer"
                            name="payer_id"
                            class="form-select"
                            required>
                            <option value="">Qui a payé ?</option>
                            @if($users)
                            @foreach($users as $user)
                            <option value="{{$user->user->id}}">{{$user->user->name}}</option>
                            @endforeach
                            @endif

                        </select>
                        <span class="error-message" id="payerError">Veuillez sélectionner un payeur</span>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{route('colocation.show',$idColocation)}}">
                        <button type="button" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            <span>Annuler</span>
                        </button>
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        <span>Ajouter la dépense</span>
                    </button>
                </div>

            </form>

            <!-- Info Box -->
            <div class="info-box">
                <div class="info-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="info-content">
                    <div class="info-title">Information</div>
                    <div class="info-text">
                        Cette dépense sera automatiquement répartie entre tous les membres de la colocation. Vous pourrez modifier la répartition ultérieurement si nécessaire.
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>