<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - ColoSpace</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/dashbord-user.css">
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-home-lg-alt"></i>
                <span>ColoSpace</span>
            </div>
        </div>


        <nav class="sidebar-nav">
            <a href="#" class="nav-item active">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
            @if(session('error'))
            <p style="color: red;">{{session('error')}}</p>
            @endif
            <a href="{{route('colocation.index')}}" class="nav-item">
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

    <!-- Main Content -->
    <div class="main-wrapper">

        <!-- Top Navbar -->
        <header class="top-navbar">
            <div class="navbar-left">
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
            </div>

            <div class="navbar-right">
                <button class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>

                <div class="user-profile">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=3B82F6&color=fff" alt="User">
                    <div class="user-info">
                        <span class="user-name">{{auth()->user()->name}}</span>
                        <span class="user-role">Premium Member</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="dashboard-content">

            <!-- Welcome Card -->
            <div class="welcome-card">
                <div class="welcome-content">
                    <h1>Welcome back, {{auth()->user()->name}} 👋</h1>
                    <p>Here's what's happening with your colocations today.</p>
                </div>
                <div class="welcome-illustration">
                    <i class="fas fa-rocket"></i>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-grid">

                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="stat-details">
                        <span class="stat-label">Total Colocations</span>
                        <h2 class="stat-value">8</h2>
                        <span class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 12% this month
                        </span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon teal">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="stat-details">
                        <span class="stat-label">Total Expenses</span>
                        <h2 class="stat-value">4,850 MAD</h2>
                        <span class="stat-change negative">
                            <i class="fas fa-arrow-down"></i> 8% from last month
                        </span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="stat-details">
                        <span class="stat-label">My Balance</span>
                        <h2 class="stat-value">12,340 MAD</h2>
                        <span class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 23% increase
                        </span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-details">
                        <span class="stat-label">Reputation Score</span>
                        <h2 class="stat-value">4.8/5</h2>
                        <span class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> Excellent rating
                        </span>
                    </div>
                </div>

            </div>

            <!-- Additional Content Sections -->
            <div class="content-grid">

                <!-- Recent Activity -->
                <div class="content-card">
                    <div class="card-header">
                        <h3>Recent Activity</h3>
                        <a href="#" class="view-all">View All</a>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon blue">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="activity-details">
                                <p class="activity-title">Payment received</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                            <span class="activity-amount positive">+850 MAD</span>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon teal">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="activity-details">
                                <p class="activity-title">New expense added</p>
                                <span class="activity-time">5 hours ago</span>
                            </div>
                            <span class="activity-amount negative">-320 MAD</span>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon purple">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-details">
                                <p class="activity-title">New colocation member</p>
                                <span class="activity-time">1 day ago</span>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon orange">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="activity-details">
                                <p class="activity-title">Received 5-star review</p>
                                <span class="activity-time">2 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="content-card">
                    <div class="card-header">
                        <h3>Quick Actions</h3>
                    </div>
                    <div class="quick-actions">
                        <button class="action-btn blue">
                            <i class="fas fa-plus"></i>
                            <span>Add Colocation</span>
                        </button>
                        <button class="action-btn teal">
                            <i class="fas fa-receipt"></i>
                            <span>Add Expense</span>
                        </button>
                        <button class="action-btn purple">
                            <i class="fas fa-paper-plane"></i>
                            <span>Send Payment</span>
                        </button>
                        <button class="action-btn orange">
                            <i class="fas fa-download"></i>
                            <span>Export Report</span>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>