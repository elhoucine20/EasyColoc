<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - ColoSpace</title>
    <link rel="stylesheet" href="styles.css">
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

.nav-item {
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

.nav-item i {
    font-size: 1.25rem;
    width: 24px;
    text-align: center;
}

.nav-item:hover {
    background: rgba(59, 130, 246, 0.1);
    color: #3B82F6;
    transform: translateX(5px);
}

.nav-item.active {
    background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
    color: #ffffff;
    /* box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3); */
}

.sidebar-footer {
    padding: 1.5rem 0;
    border-top: 1px solid rgba(59, 130, 246, 0.1);
}

.nav-item.logout {
    color: #EF4444;
}

.nav-item.logout:hover {
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

/* Top Navbar */
.top-navbar {
    background: rgba(15, 23, 42, 0.8);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(59, 130, 246, 0.1);
    padding: 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 100;
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
}

.search-bar {
    display: flex;
    align-items: center;
    background: rgba(30, 41, 59, 0.6);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 12px;
    padding: 0.75rem 1.25rem;
    gap: 0.75rem;
    width: 350px;
    transition: all 0.3s ease;
}

.search-bar:focus-within {
    border-color: #3B82F6;
    /* box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); */
}

.search-bar i {
    color: #94A3B8;
}

.search-bar input {
    background: none;
    border: none;
    outline: none;
    color: #ffffff;
    flex: 1;
    font-size: 0.95rem;
}

.search-bar input::placeholder {
    color: #64748B;
}

.navbar-right {
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

/* Dashboard Content */
.dashboard-content {
    flex: 1;
    padding: 2rem;
}

/* Welcome Card */
.welcome-card {
    background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
    border-radius: 20px;
    padding: 2.5rem;
    margin-bottom: 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3); */
}

.welcome-content h1 {
    color: #ffffff;
    font-size: 2rem;
    margin-bottom: 0.5rem;
    font-weight: 700;
}

.welcome-content p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.1rem;
}

.welcome-illustration i {
    font-size: 5rem;
    color: rgba(255, 255, 255, 0.2);
}

/* Statistics Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
    gap: 1.25rem;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    /* box-shadow: 0 10px 30px rgba(59, 130, 246, 0.2); */
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
    display: flex;
    flex-direction: column;
    justify-content: center;
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
    margin-bottom: 0.5rem;
}

.stat-change {
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.stat-change.positive {
    color: #10B981;
}

.stat-change.negative {
    color: #EF4444;
}

/* Content Grid */
.content-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 1.5rem;
}

.content-card {
    background: rgba(30, 41, 59, 0.6);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(59, 130, 246, 0.1);
    border-radius: 20px;
    padding: 1.75rem;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.card-header h3 {
    color: #ffffff;
    font-size: 1.25rem;
    font-weight: 600;
}

.view-all {
    color: #3B82F6;
    text-decoration: none;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.view-all:hover {
    color: #60A5FA;
}

/* Activity List */
.activity-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(15, 23, 42, 0.4);
    border-radius: 12px;
    border: 1px solid rgba(59, 130, 246, 0.1);
    transition: all 0.3s ease;
}

.activity-item:hover {
    background: rgba(59, 130, 246, 0.05);
    border-color: rgba(59, 130, 246, 0.2);
}

.activity-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.activity-details {
    flex: 1;
}

.activity-title {
    color: #ffffff;
    font-weight: 500;
    margin-bottom: 0.25rem;
}

.activity-time {
    color: #64748B;
    font-size: 0.8rem;
}

.activity-amount {
    font-weight: 600;
    font-size: 0.95rem;
}

.activity-amount.positive {
    color: #10B981;
}

.activity-amount.negative {
    color: #EF4444;
}

/* Quick Actions */
.quick-actions {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.action-btn {
    background: rgba(15, 23, 42, 0.4);
    border: 1px solid rgba(59, 130, 246, 0.1);
    color: #ffffff;
    padding: 1.25rem;
    border-radius: 12px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
}

.action-btn i {
    font-size: 1.5rem;
}

.action-btn.blue {
    border-color: rgba(59, 130, 246, 0.3);
}

.action-btn.blue:hover {
    background: rgba(59, 130, 246, 0.1);
    border-color: #3B82F6;
    transform: translateY(-3px);
    /* box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3); */
}

.action-btn.teal {
    border-color: rgba(20, 184, 166, 0.3);
}

.action-btn.teal:hover {
    background: rgba(20, 184, 166, 0.1);
    border-color: #14B8A6;
    transform: translateY(-3px);
    /* box-shadow: 0 8px 20px rgba(20, 184, 166, 0.3); */
}

.action-btn.purple {
    border-color: rgba(139, 92, 246, 0.3);
}

.action-btn.purple:hover {
    background: rgba(139, 92, 246, 0.1);
    border-color: #8B5CF6;
    transform: translateY(-3px);
    /* box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3); */
}

.action-btn.orange {
    border-color: rgba(251, 146, 60, 0.3);
}

.action-btn.orange:hover {
    background: rgba(251, 146, 60, 0.1);
    border-color: #FB923C;
    transform: translateY(-3px);
    /* box-shadow: 0 8px 20px rgba(251, 146, 60, 0.3); */
}

/* Responsive Design */
@media (max-width: 1024px) {
    .content-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
    }
    
    .main-wrapper {
        margin-left: 0;
    }
    
    .menu-toggle {
        display: block;
    }
    
    .search-bar {
        width: 200px;
    }
    
    .user-info {
        display: none;
    }
    
    .dashboard-content {
        padding: 1.5rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .welcome-illustration {
        display: none;
    }
    
    .quick-actions {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .navbar-left {
        flex: 1;
    }
    
    .search-bar {
        flex: 1;
        width: auto;
    }
    
    .dashboard-content {
        padding: 1rem;
    }
    
    .welcome-card {
        padding: 1.5rem;
    }
    
    .welcome-content h1 {
        font-size: 1.5rem;
    }
}
    </style>
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