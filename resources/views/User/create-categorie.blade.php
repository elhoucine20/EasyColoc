<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Créer une catégorie — ColoSpace</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="{{asset('css/createCategorie.css')}}">

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
      <h1 class="card-title">Créer une catégorie</h1>
      <p class="card-subtitle">Organisez vos dépenses en créant des catégories personnalisées pour votre colocation.</p>
    </div>

    <form class="form" action="{{route('categorie.store')}}" method="POST">

      @csrf
      @method('POST')
      <div class="field">
        <input hidden type="text" name="colocation_id" value="{{$idColocation}}">

        <label for="cat-name">
          Nom de la catégorie
          <span class="label-hint">requis</span>
        </label>
        <input
          type="text"
          id="cat-name"
          name="name"
          placeholder="Ex: Courses, Loyer, Électricité…"
          autocomplete="off"
          required />
      </div>

      <div class="btn-group">
        <a href="{{route('colocation.index')}}"><button type="button" class="btn btn-cancel">Annuler</button></a>

        <button type="submit" class="btn btn-primary"> Créer la catégorie</button>
      </div>

    </form>
  </div>

  <p class="footer-note">
    Retour au <a href="#">tableau de bord</a>
  </p>


</body>

</html>