<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ColoSpace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/dashbordAdmin.css')}}">

</head>

<body>


    <!-- Main -->

    <!-- Content -->
    <main class="dashboard-content">
        <div class="main-wrapper">
            <div class="sidebar-footer">
                <a href="{{ route('logout') }}" class="nav-item logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>

            <!-- Welcome -->
            <div class="welcome-card">
                <div class="welcome-content">
                    <h1>Admin Panel 🛡️</h1>
                    <p>Bienvenue {{ auth()->user()->name }} — gère la plateforme EasyColoc.</p>
                </div>
                <div class="welcome-illustration">
                    <i class="fas fa-shield-halved"></i>
                </div>
            </div>

            <!-- Stats -->
            <div class="stats-grid">

                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-details">
                        <span class="stat-label">Total Utilisateurs</span>
                        <h2 class="stat-value">{{ $totalUsers }}</h2>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon teal">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="stat-details">
                        <span class="stat-label">Total Colocations</span>
                        <h2 class="stat-value">{{ $totalColocations }}</h2>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="stat-details">
                        <span class="stat-label">Total Dépenses</span>
                        <h2 class="stat-value">{{ number_format($totalDepenses, 2) }} MAD</h2>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon red">
                        <i class="fas fa-ban"></i>
                    </div>
                    <div class="stat-details">
                        <span class="stat-label">Utilisateurs Bannis</span>
                        <h2 class="stat-value">{{ $totalBanned }}</h2>
                    </div>
                </div>

            </div>

            <!-- Users Table -->
            <div class="content-card">
                <div class="card-header">
                    <h3>👥 Gestion des Utilisateurs</h3>
                </div>

                @if(session('success'))
                <p style="color:#14B8A6; margin-bottom:1rem;">{{ session('success') }}</p>
                @endif

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Utilisateur</th>
                            <th>Rôle</th>
                            <th>Réputation</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <div class="user-td">
                                    <div class="avatar {{ $user->role == 'admin' ? 'admin-av' : '' }}">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="td-name">{{ $user->name }}</div>
                                        <div class="td-email">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($user->role == 'admin')
                                <span class="badge badge-admin"><i class="fas fa-crown"></i> Admin</span>
                                @else
                                <span class="badge badge-active"><i class="fas fa-user"></i> User</span>
                                @endif
                            </td>
                            <td style="color:#FBBF24; font-weight:600;">
                                ★ {{ $user->evaluation ?? 0 }}
                            </td>
                            <td>
                                @if($user->statu == 'banned')
                                <span class="badge badge-banned"><i class="fas fa-ban"></i> {{$user->statu}}</span>
                                @else
                                <span class="badge badge-active"><i class="fas fa-check"></i> Actif</span>
                                @endif
                            </td>
                            <td>
                                @if($user->id != auth()->id())
                                @if($user->statu == 'banned')
                                {{-- Débannir --}}
                                <form method="POST" action="{{ route('admin.unban', $user->id) }}" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-unban">
                                        <i class="fas fa-unlock"></i> Débannir
                                    </button>
                                </form>
                                @else
                                {{-- Bannir --}}
                                <form method="POST" action="{{ route('admin.ban', $user->id) }}" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-ban">
                                        <i class="fas fa-ban"></i> Bannir
                                    </button>
                                </form>
                                @endif
                                @else
                                <span style="color:#64748B; font-size:0.8rem;">Admin </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </main>
    </div>

</body>

</html>