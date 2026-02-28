<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ColoSpace — Colocation Details</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --bg-deep: #0F172A;
      --bg-card: #1E293B;
      --bg-card-alt: #162032;
      --blue: #3B82F6;
      --blue-dark: #2563EB;
      --teal: #14B8A6;
      --teal-dim: rgba(20, 184, 166, .12);
      --gray: #94A3B8;
      --gray-dim: rgba(148, 163, 184, .08);
      --white: #F1F5F9;
      --border: rgba(148, 163, 184, .1);
      --shadow: 0 8px 32px rgba(0, 0, 0, .35);
      --radius: 14px;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: linear-gradient(145deg, var(--bg-deep) 0%, #0e1f38 50%, var(--bg-card) 100%);
      min-height: 100vh;
      color: var(--gray);
      line-height: 1.6;
    }

    /* ── NAVBAR ─────────────────────────────────── */
    nav {
      position: sticky;
      top: 0;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 32px;
      height: 64px;
      background: rgba(15, 23, 42, .82);
      backdrop-filter: blur(18px);
      border-bottom: 1px solid var(--border);
    }

    .nav-brand {
      font-weight: 800;
      font-size: 2.25rem;
      color: var(--blue);
      letter-spacing: -.02em;
    }

    .nav-center {
      font-family: 'Syne', sans-serif;
      font-weight: 600;
      font-size: .95rem;
      color: var(--white);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .nav-center span {
      width: 6px;
      height: 6px;
      background: var(--teal);
      border-radius: 50%;
      display: inline-block;
    }

    .btn-logout {
      padding: 10px 30px;
      border: 1px solid var(--border);
      border-radius: 8px;
      /* background: transparent; */
      /* color: var(--gray); */
      color: var(--white);
      font-family: 'DM Sans', sans-serif;
      font-size: .85rem;
      cursor: pointer;
      transition: all .2s;
      background-color: red;
      opacity: 0.5;
    }

    .btn-logout:hover {
      border-color: var(--blue);
      color: var(--white);
    }

    /* ── LAYOUT ─────────────────────────────────── */
    main {
      max-width: 1080px;
      margin: 0 auto;
      padding: 40px 24px 80px;
      display: grid;
      gap: 24px;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: auto;
    }

    /* ── CARDS ──────────────────────────────────── */
    .card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 28px;
      box-shadow: var(--shadow);
      animation: fadeUp .5s ease both;
    }

    .card:nth-child(1) {
      animation-delay: .05s;
    }

    .card:nth-child(2) {
      animation-delay: .10s;
    }

    .card:nth-child(3) {
      animation-delay: .15s;
    }

    .card:nth-child(4) {
      animation-delay: .20s;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card-full {
      grid-column: 1 / -1;
    }

    .card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 24px;
    }

    .card-icon {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
    }

    .icon-blue {
      background: rgba(59, 130, 246, .15);
      color: var(--blue);
    }

    .icon-teal {
      background: var(--teal-dim);
      color: var(--teal);
    }

    .icon-gold {
      background: rgba(251, 191, 36, .10);
      color: #FBBF24;
    }

    .icon-rose {
      background: rgba(244, 63, 94, .10);
      color: #F43F5E;
    }

    /* ── OVERVIEW CARD ──────────────────────────── */
    .overview-card {
      grid-column: 1 / -1;
    }

    .overview-top {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 16px;
      margin-bottom: 28px;
    }

    .colo-name {
      /* font-family: sans-serif; */
      font-size: 1.75rem;
      font-weight: 800;
      color: var(--white);
      letter-spacing: -.03em;
    }

    .badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 5px 14px;
      border-radius: 999px;
      font-size: .78rem;
      font-weight: 500;
    }

    .badge-active {
      background: rgba(20, 184, 166, .15);
      color: var(--teal);
      border: 1px solid rgba(20, 184, 166, .25);
    }

    .badge-active::before {
      content: '';
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--teal);
      animation: pulse 1.8s infinite;
    }

    .badge-cancelled {
      background: rgba(244, 63, 94, .1);
      color: #F43F5E;
      border: 1px solid rgba(244, 63, 94, .2);
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 1;
      }

      50% {
        opacity: .3;
      }
    }

    .stats-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }

    .stat-box {
      background: var(--bg-card-alt);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 20px;
    }

    .stat-label {
      font-size: .78rem;
      color: var(--gray);
      text-transform: uppercase;
      letter-spacing: .06em;
      margin-bottom: 8px;
    }

    .stat-value {
      font-family: 'Syne', sans-serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--white);
    }

    .stat-value.blue {
      color: var(--blue);
    }

    .stat-value.teal {
      color: var(--teal);
    }

    .stat-sub {
      font-size: .78rem;
      color: var(--gray);
      margin-top: 2px;
    }

    /* ── MEMBERS ────────────────────────────────── */
    .member-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .member-row {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 14px 16px;
      background: var(--gray-dim);
      border: 1px solid var(--border);
      border-radius: 10px;
      transition: border-color .2s;
    }

    .member-row:hover {
      border-color: rgba(59, 130, 246, .3);
    }

    .avatar {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--blue-dark), var(--teal));
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Syne', sans-serif;
      font-weight: 700;
      font-size: .85rem;
      color: #fff;
      flex-shrink: 0;
    }

    .member-info {
      flex: 1;
    }

    .member-name {
      font-weight: 500;
      color: var(--white);
      font-size: .9rem;
    }

    .member-email {
      font-size: .76rem;
      color: var(--gray);
    }

    .role-badge {
      padding: 3px 10px;
      border-radius: 6px;
      font-size: .72rem;
      font-weight: 600;
      letter-spacing: .04em;
      text-transform: uppercase;
    }

    .role-owner {
      background: rgba(59, 130, 246, .15);
      color: var(--blue);
    }

    .role-member {
      background: var(--teal-dim);
      color: var(--teal);
    }

    .rep-score {
      display: flex;
      align-items: center;
      gap: 4px;
      font-size: .8rem;
      color: #FBBF24;
      font-weight: 500;
    }

    /* ── EXPENSES ───────────────────────────────── */
    .expense-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      margin-bottom: 20px;
    }

    .expense-box {
      background: var(--bg-card-alt);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 18px;
    }

    .expense-label {
      font-size: .78rem;
      color: var(--gray);
      margin-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .expense-amount {
      /* font-family: 'Syne', sans-serif; */
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--white);
    }

    /* ── SETTLEMENT ─────────────────────────────── */
    .settlement-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-bottom: 20px;
    }

    .settlement-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 13px 16px;
      background: var(--gray-dim);
      border: 1px solid var(--border);
      border-radius: 10px;
    }

    .settlement-parties {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: .88rem;
      color: var(--white);
    }

    .arrow {
      color: var(--teal);
      font-size: 1rem;
    }

    .owes-name {
      color: var(--gray);
      font-size: .82rem;
    }

    .settlement-amount {
      /* font-family: 'Syne', sans-serif; */
      font-weight: 700;
      font-size: .95rem;
      /* color: #F43F5E; */
    }

    /* ── BUTTONS ────────────────────────────────── */
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 11px 22px;
      border-radius: 9px;
      border: none;
      cursor: pointer;
      font-family: 'DM Sans', sans-serif;
      font-size: .88rem;
      font-weight: 500;
      transition: all .2s;
    }

    .btn-primary {
      background: var(--blue);
      color: #fff;
    }

    .btn-primary:hover {
      background: var(--blue-dark);
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(59, 130, 246, .35);
    }

    .btn-teal {
      background: rgba(20, 184, 166, .15);
      color: var(--teal);
      border: 1px solid rgba(20, 184, 166, .25);
    }

    .btn-teal:hover {
      background: rgba(20, 184, 166, .25);
      transform: translateY(-1px);
    }

    .btn-danger {
      background: rgba(239, 68, 68, 0.15);
      color: #EF4444;
      border: 1px solid rgba(239, 68, 68, 0.25);
    }

    .btn-danger:hover {
      background: rgba(239, 68, 68, 0.25);
      transform: translateY(-1px);
    }

    /* ── RESPONSIVE ──────────────────────────────── */
    @media (max-width: 720px) {
      main {
        grid-template-columns: 1fr;
        padding: 24px 16px 60px;
      }

      .stats-row {
        grid-template-columns: 1fr 1fr;
      }

      .stats-row .stat-box:last-child {
        grid-column: 1 / -1;
      }

      .expense-grid {
        grid-template-columns: 1fr;
      }

      nav {
        padding: 0 16px;
      }

      .nav-center {
        font-size: .82rem;
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

  <!-- NAVBAR -->
  <nav>
    <div class="nav-brand">{{$Colocation->name}}</div>
    @if($Colocation->statu == "active")
    <span class="badge badge-active">{{$Colocation->statu}}</span>
    @else
    <span class="badge badge-cancelled">{{$Colocation->statu}}</span>
    @endif
    <div class="nav-center">
      <span></span>
      Sunset Loft 4B
    </div>
    <div style="display: flex;">

      <a href="{{route('colocation.index')}}" class="navbar-back">
        <i class="fas fa-arrow-left"></i>
        <span>Retour</span>
      </a>
      <a href="{{route('logout')}}"><button class="btn-logout">Logout</button></a>
    </div>
  </nav>

  <!-- MAIN -->
  <main>
    <!-- 1. OVERVIEW -->
    <div class="card overview-card card-full">
      <div class="overview-top">
        <div>
          <div class="colo-name">Les Categories</div>

          <div style="margin-top:8px; color:var(--gray); font-size:.88rem;">📍 12 Rue de la Paix, Casablanca</div>
        </div>
        <div style="display:flex; flex-direction:column; align-items:flex-end; gap:8px;">
          <div>

            <a href="{{route('categorie.show',$Colocation->id)}}">
              <button class="btn btn-primary">Créer une cagtegorie</button>
            </a>

          </div>
          <span style="font-size:.78rem; color:var(--gray);">Since Jan 2025</span>
        </div>
      </div>

      @if($categories->isNotEmpty())
      <h3>Les Categories</h3>
      <div class="stats-row">
        @foreach($categories as $categorie)
        <div class="stat-box">
          <div class="stat-label">Shared Expenses</div>
          <div class="stat-value teal">{{$categorie->name}}</div>
          <div class="stat-sub">{{$categorie->colocation->name}}</div>
          <!-- <button class="btn btn-teal">Modifier</button> -->
          <form method="post" action="{{route('categorie.destroy',$categorie->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">supprimer</button>
          </form>
        </div>
        @endforeach
      </div>
      @else
      <h3>Aucun Categoorie</h3>
      @endif
    </div>

    <!-- 2. MEMBERS -->
    <div class="card">

      <div class="card-header">
        <h2>Members</h2>
        @if(session('succes'))
        <p style="color: green;">{{session('succes')}}</p>
        @endif
        <div class="card-icon icon-blue">
          <a href="{{route('invitation.show',$Colocation->id)}}">
            <button class="btn btn-primary">Inviter👥</button>
          </a>

        </div>
      </div>
      <div class="member-list">
        @if($users)
        @foreach($users as $user)
        <div class="member-row">
          @if($user->type == 'owner')
          <div class="avatar" style="background:linear-gradient(135deg,#F43F5E,#FBBF24)">NM</div>
          @else
          <div class="avatar">YA</div>
          @endif

          <div class="member-info">
            <div class="member-name">{{$user->user->name}}</div>
            <div class="member-email">{{$user->user->email}}</div>
          </div>
          <div style="display:flex; flex-direction:column; align-items:flex-end; gap:5px;">
            @if($user->type == 'owner')
            <span class="role-badge role-owner">{{$user->type}}</span>
            @elseif($user->type == 'member')
            <span class="role-badge role-member">{{$user->type}}</span>
            @endif
            <!-- <span class="rep-score">★ 4.9</span> -->
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>

    <!-- 3. EXPENSES -->
    <div class="card">
      <div class="card-header">
        <h2>Expenses </h2>
        <div class="card-icon icon-gold">💸</div>
      </div>

      <div class="expense-grid">
        @foreach($Colocation->depense as $depense)
        <div class="expense-box">
          <h3>{{$depense->title}}</h3>

          <!-- <div style="gap:20px"> -->
          <span class="role-badge role-owner">{{$depense->user->name}}</span><br>
          <span style="color:var(--blue);" class="expense-amount">{{$depense->montant}} DH</span>


          <div class="expense-label">{{$depense->date}} </div>
          <div style="display: flex;">
            <span class="badge role-member">{{$depense->categorie->name}}</span>
            <form method="post" action="{{route('depense.destroy',$depense->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" style="border-radius: 999px;" class="btn btn-danger">supprimer</button>
          </form>
          </div>
        </div>
        @endforeach
      </div>


      <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
        @if($categories->isNotEmpty())
        <a href="{{route('depense.show',$Colocation->id)}}">
          <button class="btn btn-primary">Add depense</button>
        </a>
        @endif
      </div>
    </div>

    <!-- 4. SETTLEMENT -->
    <div class="card card-full">
      <div class="card-header">
        <h2>Settlement Summary</h2>
        <div class="card-icon icon-rose">⚖️</div>
      </div>

      <div class="settlement-list">
        @if($paiments->isNotEmpty())
        @foreach($paiments as $paiment)
        <div class="settlement-row">
          <div class="settlement-parties">
            <span>{{ $paiment->from->name }}</span>
            <span class="arrow">→</span>
            <span>{{ $paiment->to->name }}</span>
            <span class="owes-name" style="margin-left:4px;">owes</span>
          </div>
          
          @if($paiment->from_id == Auth::id() && $paiment->is_payed == 'inpayed')
          <span style="color:#F43F5E;" class="settlement-amount">{{ $paiment->amount }} MAD</span>
          {{-- C'est moi qui dois payer --}}
          <form method="POST" action="{{ route('paiment.paid', $paiment->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-teal">Mark as payed </button>
          </form>
          @else
          <span style="color: var(--teal);" class="settlement-amount">{{ $paiment->amount }} MAD</span>

          {{-- C'est l'autre qui doit me payer --}}
          @if($paiment->is_payed == 'payed')
          <span class="badge badge-active"> Paid</span>
          @else
          <span class="badge badge-cancelled"> En attente</span>
          @endif
          @endif
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </main>
</body>
</html>