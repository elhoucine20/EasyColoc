<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Créer une catégorie — ColoSpace</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="{{asset('css/createInvitation.css')}}">

</head>

<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="#" class="navbar-logo">
        <i class="fas fa-home"></i>
        <span>ColoSpace</span>
      </a>

      <a href="{{route('colocation.show',$idColocation)}}" class="navbar-back">
        <i class="fas fa-arrow-left"></i>
        <span>Retour</span>
      </a>
    </div>
  </nav>

  <div class="brand">ColoSpace</div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon-wrap">🗂️</div>
      <h1 class="card-title">ajouter une invitation</h1>
      <p class="card-subtitle">Organisez vos colcoation en ajoutant des invitations personnalisées pour votre colocation.</p>
    </div>

    <form class="form" action="{{route('invitation.store')}}" method="POST">

      @csrf
      <input hidden name="colocation_id" value="{{ $idColocation }}">

      <div class="field">
        <label for="email">Email <span class="label-hint">requis</span></label>
        <input type="email" id="email" name="email" placeholder="exemple@email.com" required />
      </div>

      <div class="btn-group">
        <a href="{{ route('colocation.show', $idColocation) }}">
          <button type="button" class="btn btn-cancel">Annuler</button>
        </a>
        <button type="submit" class="btn btn-primary">Envoyer l'invitation</button>
      </div>
    </form>