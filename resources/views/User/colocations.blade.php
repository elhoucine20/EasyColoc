<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Colocations - ColocApp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>


    /* *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; } */

    :root {

      --teal:         #14B8A6;

    }
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
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(59, 130, 246, 0.1);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
        }

        .logo i {
            color: #3B82F6;
            font-size: 1.75rem;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1.5rem 0;
            overflow-y: auto;
        }

        .sidebar .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.875rem 1.5rem;
            color: #94A3B8;
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 0.25rem 1rem;
            border-radius: 12px;
            font-weight: 500;
        }

        .sidebar .nav-item i {
            font-size: 1.25rem;
            width: 24px;
            text-align: center;
        }

        .sidebar .nav-item:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
            transform: translateX(5px);
        }

        .sidebar .nav-item.active {
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .sidebar-footer {
            padding: 1.5rem 0;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
        }

        .sidebar .nav-item.logout {
            color: #EF4444;
        }

        .sidebar .nav-item.logout:hover {
            background: rgba(239, 68, 68, 0.1);
            color: #EF4444;
        }

        /* Main Wrapper */
        .main-wrapper {
            flex: 1;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.25rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .menu-toggle {
            background: none;
            border: none;
            color: #94A3B8;
            font-size: 1.5rem;
            cursor: pointer;
            display: none;
            padding: 0.5rem;
        }

        .menu-toggle:hover {
            color: #3B82F6;
        }

        .page-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #94A3B8;
            font-size: 0.95rem;
        }

        .page-breadcrumb i {
            font-size: 0.8rem;
        }

        .page-breadcrumb span {
            color: #ffffff;
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
            flex: 1;
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

        .btn-create {
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
            color: #ffffff;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-create:active {
            transform: translateY(0);
        }

        .btn-create i {
            font-size: 1.1rem;
        }

        /* Colocations Grid */
        .colocations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.75rem;
        }

        /* Colocation Card */
        .colocation-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .colocation-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .card-header {
            padding: 1.5rem 1.5rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .card-icon {
            width: 55px;
            height: 55px;
            background: rgba(59, 130, 246, 0.15);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3B82F6;
            font-size: 1.5rem;
        }

        .owner-badge {
            background: linear-gradient(135deg, #14B8A6 0%, #0D9488 100%);
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            box-shadow: 0 4px 10px rgba(20, 184, 166, 0.3);
        }

        .owner-badge i {
            font-size: 0.85rem;
        }

        .card-body {
            padding: 0 1.5rem 1.5rem;
        }

        .colocation-name {
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .colocation-info {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #94A3B8;
            font-size: 0.95rem;
        }

        .info-item i {
            color: #3B82F6;
            width: 20px;
            text-align: center;
        }

        .members-count {
            font-weight: 500;
        }

        .location {
            font-weight: 400;
        }

        .card-footer {
            padding: 1.25rem 1.5rem;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
            background: rgba(15, 23, 42, 0.4);
        }

        .btn-details {
            width: 100%;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: #3B82F6;
            padding: 0.875rem 1.25rem;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
        }

        .btn-details:hover {
            background: rgba(59, 130, 246, 0.2);
            border-color: #3B82F6;
            transform: translateX(5px);
        }

        .btn-details i {
            font-size: 0.9rem;
            transition: transform 0.3s ease;
        }

        .btn-details:hover i {
            transform: translateX(5px);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .colocations-grid {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

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

            .page-title {
                font-size: 2rem;
            }

            .btn-create {
                width: 100%;
                justify-content: center;
            }

            .colocations-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .user-info {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 1.75rem;
            }

            .page-subtitle {
                font-size: 1rem;
            }

            .colocation-name {
                font-size: 1.25rem;
            }

            .card-header {
                padding: 1.25rem 1.25rem 0.75rem;
            }

            .card-body {
                padding: 0 1.25rem 1.25rem;
            }

            .card-footer {
                padding: 1rem 1.25rem;
            }

            .page-breadcrumb {
                font-size: 0.85rem;
            }
        }

            .badge {
      display: inline-flex; align-items: center; gap: 6px;
      padding: 5px 14px;
      border-radius: 999px;
      font-size: .78rem;
      font-weight: 500;
    }
            .badge-active {
      background: rgba(20,184,166,.15);
      color: var(--teal);
      border: 1px solid rgba(20,184,166,.25);
    }
        .badge-active::before {
      content: '';
      width: 6px; height: 6px;
      border-radius: 50%;
      background: var(--teal);
      animation: pulse 1.8s infinite;
    }
    .badge-cancelled {
      background: rgba(244,63,94,.1);
      color: #F43F5E;
      border: 1px solid rgba(244,63,94,.2);
    }

    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-home"></i>
                <span>ColoSpace</span>
            </div>
        </div>
        
        <nav class="sidebar-nav">
            <a href="{{route('dashbord-user')}}" class="nav-item">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="nav-item active">
                <i class="fas fa-building"></i>
                <span>My Colocations</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-receipt"></i>
                <span>Expenses</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-wallet"></i>
                <span>Balance</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-user-circle"></i>
                <span>Profile</span>
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <a href="{{route('logout')}}" class="nav-item logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        
        <!-- Top Navbar -->
        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-left">
                    <button class="menu-toggle" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="page-breadcrumb">
                        <i class="fas fa-home"></i>
                        <i class="fas fa-chevron-right"></i>
                        <span>Mes Colocations</span>
                    </div>
                </div>
                
                <div class="navbar-links">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
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
                        <h1 class="page-title">Mes Colocations</h1>
                        <p class="page-subtitle">Gérez toutes vos colocations en un seul endroit</p>
                    </div>
                    <a href="{{route('colocation.create')}}"><button class="btn-create">
                        <i class="fas fa-plus"></i>
                        <span>Créer une colocation</span>
                        </button>
                   </a>
                   
                </div>

                <!-- Colocations Grid -->
                <div class="colocations-grid">
                    
                    <!-- Colocation Card 1 - Owner -->
                     @if($colocations)
                     @foreach($colocations as $colocation)
                    <div class="colocation-card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            @if($colocation->statu == "active")
                             <span class="badge badge-active">{{$colocation->statu}}</span>
                             @else
                             <span class="badge badge-cancelled">{{$colocation->statu}}</span>
                             @endif
                            <span class="owner-badge">
                                <i class="fas fa-crown"></i>
                                Propriétaire
                            </span>
                        </div>
                        
                        <div class="card-body">
                            <h3 class="colocation-name">{{$colocation->name}}</h3>
                            <div class="colocation-info">
                                <div class="info-item">
                                    <i class="fas fa-users"></i>
                                    <span class="members-count">4 membres</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span class="location">Casablanca</span>
                                </div>
                            </div>
                        </div>
                        
                        <div style="display: flex; justify-content:space-around" class="card-footer">
                                <form action="{{route('colocation.update',$colocation->id)}}" method="POST" >
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-details">
                                        Annuleer 
                                    </button>
                                </form>

                          <a href="{{route('colocation.show',$colocation)}}">
                            <button class="btn-details">
                                <span>Entrée </span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                          </a>

                        </div>
                    </div>
                    @endforeach
                    @endif

 

                </div>

            </div>
        </main>

    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>

</body>
</html>