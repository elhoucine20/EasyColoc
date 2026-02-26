<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Dépense - ColocApp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
            color: #94A3B8;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.25rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
        }

        .navbar-logo i {
            color: #3B82F6;
            font-size: 1.75rem;
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1.25rem;
            color: #94A3B8;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link i {
            font-size: 1.1rem;
        }

        .nav-link:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
        }

        .nav-link.logout {
            color: #EF4444;
        }

        .nav-link.logout:hover {
            background: rgba(239, 68, 68, 0.1);
            color: #EF4444;
        }

        /* Main Container */
        .main-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
        }

        /* Form Card */
        .form-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        /* Header */
        .form-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .form-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        }

        .form-icon i {
            font-size: 2.5rem;
            color: #ffffff;
        }

        .form-title {
            color: #ffffff;
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            letter-spacing: -0.5px;
        }

        .form-subtitle {
            color: #94A3B8;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* Form */
        .expense-form {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label i {
            color: #3B82F6;
            font-size: 1.1rem;
        }

        .required {
            color: #EF4444;
        }

        .form-input,
        .form-select {
            background: rgba(15, 23, 42, 0.6);
            border: 2px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            color: #ffffff;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input::placeholder {
            color: #64748B;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #3B82F6;
            background: rgba(15, 23, 42, 0.8);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .form-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2394A3B8' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1.25rem center;
            padding-right: 3rem;
        }

        .form-select option {
            background: #1E293B;
            color: #ffffff;
            padding: 0.75rem;
        }

        .form-hint {
            color: #64748B;
            font-size: 0.875rem;
            margin-top: -0.5rem;
        }

        /* Currency Input Group */
        .input-group {
            position: relative;
        }

        .input-group .currency-symbol {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #14B8A6;
            font-weight: 600;
            font-size: 1.1rem;
            pointer-events: none;
        }

        .input-group .form-input {
            padding-right: 3.5rem;
        }

        /* Buttons */
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn {
            padding: 1.125rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            flex: 1;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #14B8A6 0%, #0D9488 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(20, 184, 166, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: rgba(15, 23, 42, 0.6);
            border: 2px solid rgba(59, 130, 246, 0.2);
            color: #94A3B8;
        }

        .btn-secondary:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: #3B82F6;
            color: #3B82F6;
        }

        /* Info Box */
        .info-box {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            margin-top: 2rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background: rgba(59, 130, 246, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3B82F6;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .info-content {
            flex: 1;
        }

        .info-title {
            color: #3B82F6;
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        .info-text {
            color: #94A3B8;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        /* Success Message */
        .success-message {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            border-radius: 12px;
            padding: 1.25rem;
            display: none;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .success-message.show {
            display: flex;
        }

        .success-icon {
            width: 40px;
            height: 40px;
            background: rgba(34, 197, 94, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #22C55E;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .success-text {
            color: #22C55E;
            font-weight: 500;
        }

        /* Error State */
        .form-input.error,
        .form-select.error {
            border-color: #EF4444;
        }

        .error-message {
            color: #EF4444;
            font-size: 0.85rem;
            display: none;
            margin-top: -0.5rem;
        }

        .error-message.show {
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                padding: 2rem 1.5rem;
            }

            .form-card {
                padding: 2rem 1.5rem;
            }

            .navbar-container {
                padding: 1rem 1.5rem;
            }

            .form-title {
                font-size: 1.875rem;
            }

            .form-subtitle {
                font-size: 1rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .navbar-links {
                gap: 0.25rem;
            }

            .nav-link span {
                display: none;
            }

            .nav-link {
                padding: 0.625rem;
            }
        }

        @media (max-width: 480px) {
            .form-title {
                font-size: 1.625rem;
            }

            .form-icon {
                width: 70px;
                height: 70px;
            }

            .form-icon i {
                font-size: 2rem;
            }

            .navbar-logo {
                font-size: 1.25rem;
            }

            .navbar-logo i {
                font-size: 1.5rem;
            }
        }

        /* Loading State */
        .btn.loading {
            opacity: 0.7;
            cursor: not-allowed;
            pointer-events: none;
        }

        .btn.loading::after {
            content: "";
            width: 16px;
            height: 16px;
            border: 2px solid #ffffff;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

                    .navbar-back {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1.25rem;
            color: #94A3B8;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .navbar-back:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
        }
    </style>
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
                        maxlength="100"
                    >
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
                                step="0.01"
                            >
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
                            required
                        >
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
                            required
                        >
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
                            required
                        >
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

    <!-- <script>
        // Set today's date as default
        const dateInput = document.getElementById('expenseDate');
        const today = new Date().toISOString().split('T')[0];
        dateInput.value = today;

        // Form validation
        const form = document.getElementById('expenseForm');
        const titleInput = document.getElementById('expenseTitle');
        const amountInput = document.getElementById('expenseAmount');
        const dateInputField = document.getElementById('expenseDate');
        const categorySelect = document.getElementById('expenseCategory');
        const payerSelect = document.getElementById('expensePayer');
        const successMessage = document.getElementById('successMessage');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;

            // Validate title
            if (titleInput.value.trim() === '') {
                titleInput.classList.add('error');
                document.getElementById('titleError').classList.add('show');
                isValid = false;
            } else {
                titleInput.classList.remove('error');
                document.getElementById('titleError').classList.remove('show');
            }

            // Validate amount
            if (amountInput.value === '' || parseFloat(amountInput.value) <= 0) {
                amountInput.classList.add('error');
                document.getElementById('amountError').classList.add('show');
                isValid = false;
            } else {
                amountInput.classList.remove('error');
                document.getElementById('amountError').classList.remove('show');
            }

            // Validate date
            if (dateInputField.value === '') {
                dateInputField.classList.add('error');
                document.getElementById('dateError').classList.add('show');
                isValid = false;
            } else {
                dateInputField.classList.remove('error');
                document.getElementById('dateError').classList.remove('show');
            }

            // Validate category
            if (categorySelect.value === '') {
                categorySelect.classList.add('error');
                document.getElementById('categoryError').classList.add('show');
                isValid = false;
            } else {
                categorySelect.classList.remove('error');
                document.getElementById('categoryError').classList.remove('show');
            }

            // Validate payer
            if (payerSelect.value === '') {
                payerSelect.classList.add('error');
                document.getElementById('payerError').classList.add('show');
                isValid = false;
            } else {
                payerSelect.classList.remove('error');
                document.getElementById('payerError').classList.remove('show');
            }

            if (isValid) {
                // Add loading state
                const submitBtn = form.querySelector('.btn-primary');
                submitBtn.classList.add('loading');
                submitBtn.querySelector('span').textContent = 'Ajout en cours...';

                // Simulate form submission
                setTimeout(() => {
                    submitBtn.classList.remove('loading');
                    submitBtn.querySelector('span').textContent = 'Ajouter la dépense';
                    successMessage.classList.add('show');
                    form.reset();
                    dateInput.value = today;
                    
                    // Remove success message after 5 seconds
                    setTimeout(() => {
                        successMessage.classList.remove('show');
                    }, 5000);
                }, 1500);
            }
        });

        // Real-time validation
        titleInput.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.classList.remove('error');
                document.getElementById('titleError').classList.remove('show');
            }
        });

        amountInput.addEventListener('input', function() {
            if (this.value !== '' && parseFloat(this.value) > 0) {
                this.classList.remove('error');
                document.getElementById('amountError').classList.remove('show');
            }
        });

        dateInputField.addEventListener('change', function() {
            if (this.value !== '') {
                this.classList.remove('error');
                document.getElementById('dateError').classList.remove('show');
            }
        });

        categorySelect.addEventListener('change', function() {
            if (this.value !== '') {
                this.classList.remove('error');
                document.getElementById('categoryError').classList.remove('show');
            }
        });

        payerSelect.addEventListener('change', function() {
            if (this.value !== '') {
                this.classList.remove('error');
                document.getElementById('payerError').classList.remove('show');
            }
        });
    </script> -->

</body>
</html>