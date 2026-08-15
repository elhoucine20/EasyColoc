<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ColoSpace — Colocation Details</title>

<link rel="stylesheet" href="{{asset('css/colocationEntree.css')}}">
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
              <button class="btn btn-primary">Créer une categorie</button>
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
          <span style="color:#F43F5E;" class="settlement-amount">{{ number_format($paiment->amount,2) }} MAD</span>
          {{-- C'est moi qui dois payer --}}
          <form method="POST" action="{{ route('paiment.paid', $paiment->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-teal">Mark as payed </button>
          </form>
          @else
          <span style="color: var(--teal);" class="settlement-amount">{{ number_format($paiment->amount,2) }} MAD</span>

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