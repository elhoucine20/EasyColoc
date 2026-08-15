<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Colocations - ColocApp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/colocations.css">

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
                    <!-- <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button> -->

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
                        @if($colocations->isNotEmpty())
                        <h1 class="page-title">Mes Colocations</h1>
                        <p class="page-subtitle">Gérez toutes vos colocations en un seul endroit</p>
                        @else
                        <h1 class="page-title">Aucun Colocation</h1>
                        @endif
                    </div>
                    <a href="{{route('colocation.create')}}">
                        <button class="btn-create">
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
                            @if($colocations->where('owner_id', Auth::id())->isNotEmpty())
                            <form action="{{route('colocation.update',$colocation->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-details">
                                    Annuleer
                                </button>
                            </form>
                            @endif

                            <form action="{{ route('colocation.leave', $colocation->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-details">Quitter</button>
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