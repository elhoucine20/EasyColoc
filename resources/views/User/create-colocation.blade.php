<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Colocation - ColoSpace</title>
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
            max-width: 600px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        /* Header Section */
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
        .colocation-form {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
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
        .form-textarea {
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

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #64748B;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-color: #3B82F6;
            background: rgba(15, 23, 42, 0.8);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .form-textarea {
            min-height: 150px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-hint {
            color: #64748B;
            font-size: 0.875rem;
            margin-top: -0.5rem;
        }

        /* Character Count */
        .character-count {
            text-align: right;
            color: #64748B;
            font-size: 0.85rem;
            margin-top: -0.5rem;
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

        /* Success Message (Hidden by default) */
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

        /* Additional Info Card */
        .info-card {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .info-title {
            color: #3B82F6;
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .info-list li {
            color: #94A3B8;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .info-list li i {
            color: #14B8A6;
            font-size: 0.85rem;
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

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
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

        /* Input validation states */
        .form-input.error,
        .form-textarea.error {
            border-color: #EF4444;
        }

        .form-input.success,
        .form-textarea.success {
            border-color: #22C55E;
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
    </style>
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
                        maxlength="50"
                    >
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