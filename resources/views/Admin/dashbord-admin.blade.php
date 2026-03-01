<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ColoSpace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
            color: #94A3B8;
            min-height: 100vh;
            display: flex;
        }
          .nav-item.logout { color: #EF4444; }
        .nav-item.logout:hover { background: rgba(239, 68, 68, 0.1); color: #EF4444; }

        
        .sidebar-footer {
            padding: 1.5rem 0;
            border-top: 1px solid rgba(239, 68, 68, 0.15);
        }

        /* Main */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Content */
        .dashboard-content { flex: 1; padding: 2rem; }

        /* Welcome */
        .welcome-card {
            background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-content h1 { color: #fff; font-size: 2rem; margin-bottom: 0.5rem; font-weight: 700; }
        .welcome-content p { color: rgba(255,255,255,0.9); font-size: 1.1rem; }
        .welcome-illustration i { font-size: 5rem; color: rgba(255,255,255,0.2); }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(239, 68, 68, 0.1);
            border-radius: 20px;
            padding: 1.75rem;
            display: flex;
            gap: 1.25rem;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(239, 68, 68, 0.3);
        }

        .stat-icon {
            width: 60px; height: 60px;
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.75rem;
            flex-shrink: 0;
        }

        .stat-icon.red    { background: rgba(239, 68, 68, 0.2);   color: #EF4444; }
        .stat-icon.blue   { background: rgba(59, 130, 246, 0.2);  color: #3B82F6; }
        .stat-icon.teal   { background: rgba(20, 184, 166, 0.2);  color: #14B8A6; }
        .stat-icon.orange { background: rgba(251, 146, 60, 0.2);  color: #FB923C; }

        .stat-details { display: flex; flex-direction: column; justify-content: center; flex: 1; }
        .stat-label { color: #94A3B8; font-size: 0.875rem; margin-bottom: 0.5rem; }
        .stat-value { color: #fff; font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem; }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .content-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(239, 68, 68, 0.1);
            border-radius: 20px;
            padding: 1.75rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-header h3 { color: #fff; font-size: 1.25rem; font-weight: 600; }

        /* Table */
        table { width: 100%; border-collapse: collapse; }

        thead tr {
            background: rgba(239, 68, 68, 0.08);
            border-bottom: 1px solid rgba(239, 68, 68, 0.15);
        }

        th {
            padding: 1rem 1.25rem;
            text-align: left;
            color: #94A3B8;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            font-weight: 600;
        }

        tbody tr {
            border-bottom: 1px solid rgba(59, 130, 246, 0.05);
            transition: all 0.2s ease;
        }

        tbody tr:hover { background: rgba(239, 68, 68, 0.04); }

        td {
            padding: 1rem 1.25rem;
            color: #94A3B8;
            font-size: 0.9rem;
        }

        .user-td {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .avatar {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #3B82F6, #14B8A6);
            display: flex; align-items: center; justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            color: #fff;
            flex-shrink: 0;
        }

        .avatar.admin-av { background: linear-gradient(135deg, #EF4444, #FB923C); }

        .td-name { color: #fff; font-weight: 500; font-size: 0.9rem; }
        .td-email { color: #64748B; font-size: 0.78rem; }

        /* Badges */
        .badge {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-active   { background: rgba(20,184,166,.15); color: #14B8A6; border: 1px solid rgba(20,184,166,.25); }
        .badge-banned   { background: rgba(239,68,68,.15);  color: #EF4444; border: 1px solid rgba(239,68,68,.25); }
        .badge-admin    { background: rgba(251,146,60,.15); color: #FB923C; border: 1px solid rgba(251,146,60,.25); }

        /* Buttons */
        .btn {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 0.82rem;
            font-weight: 500;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-ban {
            background: rgba(239, 68, 68, 0.15);
            color: #EF4444;
            border: 1px solid rgba(239, 68, 68, 0.25);
        }

        .btn-ban:hover { background: rgba(239, 68, 68, 0.3); transform: translateY(-1px); }

        .btn-unban {
            background: rgba(20, 184, 166, 0.15);
            color: #14B8A6;
            border: 1px solid rgba(20, 184, 166, 0.25);
        }

        .btn-unban:hover { background: rgba(20, 184, 166, 0.3); transform: translateY(-1px); }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .main-wrapper { margin-left: 0; }
            .stats-grid { grid-template-columns: 1fr; }
            .welcome-illustration { display: none; }
            .search-bar { width: 200px; }
        }
    </style>
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
