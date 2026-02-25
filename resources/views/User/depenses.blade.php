<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Dépenses - ColoSpace</title>
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
        }

        /* Navbar Styles */
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
        }

        .navbar-logo i {
            color: #3B82F6;
            font-size: 1.75rem;
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .notification-btn {
            position: relative;
            background: rgba(30, 41, 59, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #94A3B8;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .notification-btn:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
            border-color: #3B82F6;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #EF4444;
            color: #ffffff;
            font-size: 0.7rem;
            padding: 0.15rem 0.4rem;
            border-radius: 50%;
            font-weight: 600;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background: rgba(59, 130, 246, 0.1);
        }

        .user-profile img {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            border: 2px solid #3B82F6;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .user-role {
            color: #14B8A6;
            font-size: 0.8rem;
        }

        /* Main Content */
        .main-content {
            padding: 3rem 2rem;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .header-left {
            flex: 1;
        }

        .page-title {
            color: #ffffff;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .page-subtitle {
            color: #94A3B8;
            font-size: 1.1rem;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-filter {
            background: rgba(30, 41, 59, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #94A3B8;
            padding: 0.875rem 1.5rem;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
        }

        .btn-filter:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
            border-color: #3B82F6;
        }

        .btn-add {
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
            color: #ffffff;
            border: none;
            padding: 0.875rem 1.75rem;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        }

        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 20px;
            padding: 1.75rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            flex-shrink: 0;
        }

        .stat-icon.blue {
            background: rgba(59, 130, 246, 0.2);
            color: #3B82F6;
        }

        .stat-icon.teal {
            background: rgba(20, 184, 166, 0.2);
            color: #14B8A6;
        }

        .stat-icon.purple {
            background: rgba(139, 92, 246, 0.2);
            color: #8B5CF6;
        }

        .stat-icon.orange {
            background: rgba(251, 146, 60, 0.2);
            color: #FB923C;
        }

        .stat-details {
            flex: 1;
        }

        .stat-label {
            color: #94A3B8;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            color: #ffffff;
            font-size: 1.75rem;
            font-weight: 700;
        }

        /* Table Container */
        .table-container {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .table-header {
            padding: 1.75rem 2rem;
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .table-title i {
            color: #3B82F6;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 10px;
            padding: 0.625rem 1rem;
            gap: 0.75rem;
            transition: all 0.3s ease;
        }

        .search-box:focus-within {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .search-box i {
            color: #94A3B8;
        }

        .search-box input {
            background: none;
            border: none;
            outline: none;
            color: #ffffff;
            font-size: 0.9rem;
            width: 200px;
        }

        .search-box input::placeholder {
            color: #64748B;
        }

        /* Table */
        .expenses-table {
            width: 100%;
            border-collapse: collapse;
        }

        .expenses-table thead {
            background: rgba(15, 23, 42, 0.4);
        }

        .expenses-table th {
            padding: 1.25rem 1.5rem;
            text-align: left;
            color: #94A3B8;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .expenses-table tbody tr {
            border-bottom: 1px solid rgba(59, 130, 246, 0.05);
            transition: all 0.3s ease;
        }

        .expenses-table tbody tr:hover {
            background: rgba(59, 130, 246, 0.05);
        }

        .expenses-table tbody tr:last-child {
            border-bottom: none;
        }

        .expenses-table td {
            padding: 1.25rem 1.5rem;
            color: #ffffff;
        }

        .expense-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
        }

        .expense-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .expense-icon.alimentation {
            background: rgba(34, 197, 94, 0.2);
            color: #22C55E;
        }

        .expense-icon.services {
            background: rgba(59, 130, 246, 0.2);
            color: #3B82F6;
        }

        .expense-icon.transport {
            background: rgba(251, 146, 60, 0.2);
            color: #FB923C;
        }

        .expense-icon.logement {
            background: rgba(139, 92, 246, 0.2);
            color: #8B5CF6;
        }

        .expense-icon.loisirs {
            background: rgba(236, 72, 153, 0.2);
            color: #EC4899;
        }

        .amount {
            font-weight: 600;
            font-size: 1.05rem;
            color: #ffffff;
        }

        .category-badge {
            display: inline-block;
            padding: 0.375rem 0.875rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .category-badge.alimentation {
            background: rgba(34, 197, 94, 0.15);
            color: #22C55E;
        }

        .category-badge.services {
            background: rgba(59, 130, 246, 0.15);
            color: #3B82F6;
        }

        .category-badge.transport {
            background: rgba(251, 146, 60, 0.15);
            color: #FB923C;
        }

        .category-badge.logement {
            background: rgba(139, 92, 246, 0.15);
            color: #8B5CF6;
        }

        .category-badge.loisirs {
            background: rgba(236, 72, 153, 0.15);
            color: #EC4899;
        }

        .payer-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .payer-avatar {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            border: 2px solid #3B82F6;
        }

        .date-cell {
            color: #94A3B8;
            font-size: 0.95rem;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-badge.paid {
            background: rgba(34, 197, 94, 0.15);
            color: #22C55E;
        }

        .status-badge.pending {
            background: rgba(251, 146, 60, 0.15);
            color: #FB923C;
        }

        .status-badge.overdue {
            background: rgba(239, 68, 68, 0.15);
            color: #EF4444;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .status-badge.paid .status-dot {
            background: #22C55E;
        }

        .status-badge.pending .status-dot {
            background: #FB923C;
        }

        .status-badge.overdue .status-dot {
            background: #EF4444;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-edit {
            background: rgba(59, 130, 246, 0.15);
            color: #3B82F6;
        }

        .btn-edit:hover {
            background: rgba(59, 130, 246, 0.3);
            transform: scale(1.1);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.15);
            color: #EF4444;
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.3);
            transform: scale(1.1);
        }

        /* Pagination */
        .pagination {
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
        }

        .pagination-info {
            color: #94A3B8;
            font-size: 0.9rem;
        }

        .pagination-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .pagination-btn {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #94A3B8;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .pagination-btn:hover:not(:disabled) {
            background: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
            border-color: #3B82F6;
        }

        .pagination-btn.active {
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
            color: #ffffff;
            border-color: transparent;
        }

        .pagination-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 2rem 1.5rem;
            }

            .navbar-container {
                padding: 1rem 1.5rem;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-actions {
                width: 100%;
            }

            .btn-filter,
            .btn-add {
                flex: 1;
            }

            .page-title {
                font-size: 2rem;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }

            .user-info {
                display: none;
            }

            .search-box {
                display: none;
            }

            .table-container {
                overflow-x: auto;
            }

            .expenses-table {
                min-width: 800px;
            }

            .pagination {
                flex-direction: column;
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 1.75rem;
            }

            .navbar-logo {
                font-size: 1.25rem;
            }

            .expenses-table th,
            .expenses-table td {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                <i class="fas fa-home"></i>
                <span>ColoSpace</span>
            </div>
            
            <div class="navbar-links">
                <button class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">5</span>
                </button>
                
                <div class="user-profile">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=3B82F6&color=fff" alt="User">
                    <div class="user-info">
                        <span class="user-name">John Doe</span>
                        <span class="user-role">Premium Member</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            
            <!-- Page Header -->
            <div class="page-header">
                <div class="header-left">
                    <h1 class="page-title">Liste des Dépenses</h1>
                    <p class="page-subtitle">Gérez et suivez toutes vos dépenses mensuelles</p>
                </div>
                <div class="header-actions">
                    <button class="btn-filter">
                        <i class="fas fa-filter"></i>
                        <span>Filtrer</span>
                    </button>
                    <button class="btn-add">
                        <i class="fas fa-plus"></i>
                        <span>Ajouter une dépense</span>
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-label">Total Dépenses</div>
                        <div class="stat-value">2,450 DH</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon teal">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-label">Dépenses Payées</div>
                        <div class="stat-value">1,850 DH</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-label">En Attente</div>
                        <div class="stat-value">600 DH</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-label">Ce Mois</div>
                        <div class="stat-value">12 Dépenses</div>
                    </div>
                </div>
            </div>

            <!-- Expenses Table -->
            <div class="table-container">
                <div class="table-header">
                    <h2 class="table-title">
                        <i class="fas fa-receipt"></i>
                        Toutes les Dépenses
                    </h2>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher...">
                    </div>
                </div>

                <table class="expenses-table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Montant</th>
                            <th>Catégorie</th>
                            <th>Payeur</th>
                            <th>Date</th>
                            <th>Status Paiement</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="expense-title">
                                    <div class="expense-icon alimentation">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <span>Courses</span>
                                </div>
                            </td>
                            <td><span class="amount">200 DH</span></td>
                            <td><span class="category-badge alimentation">Alimentation</span></td>
                            <td>
                                <div class="payer-info">
                                    <img class="payer-avatar" src="https://ui-avatars.com/api/?name=Ahmed&background=3B82F6&color=fff" alt="Ahmed">
                                    <span>Ahmed</span>
                                </div>
                            </td>
                            <td><span class="date-cell">12/02/2024</span></td>
                            <td>
                                <span class="status-badge paid">
                                    <span class="status-dot"></span>
                                    Payé
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="expense-title">
                                    <div class="expense-icon services">
                                        <i class="fas fa-wifi"></i>
                                    </div>
                                    <span>Internet</span>
                                </div>
                            </td>
                            <td><span class="amount">300 DH</span></td>
                            <td><span class="category-badge services">Services</span></td>
                            <td>
                                <div class="payer-info">
                                    <img class="payer-avatar" src="https://ui-avatars.com/api/?name=Yassine&background=14B8A6&color=fff" alt="Yassine">
                                    <span>Yassine</span>
                                </div>
                            </td>
                            <td><span class="date-cell">10/02/2024</span></td>
                            <td>
                                <span class="status-badge pending">
                                    <span class="status-dot"></span>
                                    En attente
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="expense-title">
                                    <div class="expense-icon transport">
                                        <i class="fas fa-car"></i>
                                    </div>
                                    <span>Transport</span>
                                </div>
                            </td>
                            <td><span class="amount">150 DH</span></td>
                            <td><span class="category-badge transport">Transport</span></td>
                            <td>
                                <div class="payer-info">
                                    <img class="payer-avatar" src="https://ui-avatars.com/api/?name=Omar&background=8B5CF6&color=fff" alt="Omar">
                                    <span>Omar</span>
                                </div>
                            </td>
                            <td><span class="date-cell">09/02/2024</span></td>
                            <td>
                                <span class="status-badge paid">
                                    <span class="status-dot"></span>
                                    Payé
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="expense-title">
                                    <div class="expense-icon services">
                                        <i class="fas fa-bolt"></i>
                                    </div>
                                    <span>Électricité</span>
                                </div>
                            </td>
                            <td><span class="amount">450 DH</span></td>
                            <td><span class="category-badge services">Services</span></td>
                            <td>
                                <div class="payer-info">
                                    <img class="payer-avatar" src="https://ui-avatars.com/api/?name=Sarah&background=EC4899&color=fff" alt="Sarah">
                                    <span>Sarah</span>
                                </div>
                            </td>
                            <td><span class="date-cell">08/02/2024</span></td>
                            <td>
                                <span class="status-badge paid">
                                    <span class="status-dot"></span>
                                    Payé
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="expense-title">
                                    <div class="expense-icon logement">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <span>Loyer</span>
                                </div>
                            </td>
                            <td><span class="amount">800 DH</span></td>
                            <td><span class="category-badge logement">Logement</span></td>
                            <td>
                                <div class="payer-info">
                                    <img class="payer-avatar" src="https://ui-avatars.com/api/?name=Ahmed&background=3B82F6&color=fff" alt="Ahmed">
                                    <span>Ahmed</span>
                                </div>
                            </td>
                            <td><span class="date-cell">05/02/2024</span></td>
                            <td>
                                <span class="status-badge pending">
                                    <span class="status-dot"></span>
                                    En attente
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="expense-title">
                                    <div class="expense-icon alimentation">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                                    <span>Restaurant</span>
                                </div>
                            </td>
                            <td><span class="amount">180 DH</span></td>
                            <td><span class="category-badge alimentation">Alimentation</span></td>
                            <td>
                                <div class="payer-info">
                                    <img class="payer-avatar" src="https://ui-avatars.com/api/?name=Yassine&background=14B8A6&color=fff" alt="Yassine">
                                    <span>Yassine</span>
                                </div>
                            </td>
                            <td><span class="date-cell">04/02/2024</span></td>
                            <td>
                                <span class="status-badge paid">
                                    <span class="status-dot"></span>
                                    Payé
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="expense-title">
                                    <div class="expense-icon loisirs">
                                        <i class="fas fa-film"></i>
                                    </div>
                                    <span>Cinéma</span>
                                </div>
                            </td>
                            <td><span class="amount">120 DH</span></td>
                            <td><span class="category-badge loisirs">Loisirs</span></td>
                            <td>
                                <div class="payer-info">
                                    <img class="payer-avatar" src="https://ui-avatars.com/api/?name=Omar&background=8B5CF6&color=fff" alt="Omar">
                                    <span>Omar</span>
                                </div>
                            </td>
                            <td><span class="date-cell">02/02/2024</span></td>
                            <td>
                                <span class="status-badge paid">
                                    <span class="status-dot"></span>
                                    Payé
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="expense-title">
                                    <div class="expense-icon services">
                                        <i class="fas fa-tint"></i>
                                    </div>
                                    <span>Eau</span>
                                </div>
                            </td>
                            <td><span class="amount">250 DH</span></td>
                            <td><span class="category-badge services">Services</span></td>
                            <td>
                                <div class="payer-info">
                                    <img class="payer-avatar" src="https://ui-avatars.com/api/?name=Sarah&background=EC4899&color=fff" alt="Sarah">
                                    <span>Sarah</span>
                                </div>
                            </td>
                            <td><span class="date-cell">01/02/2024</span></td>
                            <td>
                                <span class="status-badge overdue">
                                    <span class="status-dot"></span>
                                    En retard
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="pagination">
                    <div class="pagination-info">
                        Affichage 1-8 sur 12 dépenses
                    </div>
                    <div class="pagination-buttons">
                        <button class="pagination-btn" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="pagination-btn active">1</button>
                        <button class="pagination-btn">2</button>
                        <button class="pagination-btn">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>