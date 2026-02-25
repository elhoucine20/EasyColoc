<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Créer une catégorie — ColoSpace</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --bg-deep:     #0F172A;
      --bg-card:     #1E293B;
      --bg-input:    #162032;
      --blue:        #3B82F6;
      --blue-dark:   #2563EB;
      --blue-glow:   rgba(59, 130, 246, 0.25);
      --teal:        #14B8A6;
      --teal-bg:     rgba(20, 184, 166, 0.12);
      --teal-border: rgba(20, 184, 166, 0.30);
      --gray:        #94A3B8;
      --white:       #F1F5F9;
      --border:      rgba(148, 163, 184, 0.10);
      --border-focus:rgba(59, 130, 246, 0.50);
      --shadow:      0 24px 64px rgba(0, 0, 0, 0.50);
      --radius:      14px;
    }

    html, body {
      min-height: 100vh;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      color: var(--gray);
    }

    /* ── BRAND ──────────────────────────────────── */
    .brand {
      font-family: 'Syne', sans-serif;
      font-weight: 800;
      font-size: 1.2rem;
      color: var(--blue);
      letter-spacing: -0.02em;
      margin-bottom: 32px;
    }

    /* ── CARD ───────────────────────────────────── */
    .card {
      width: 100%;
      max-width: 520px;
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 40px 36px;
      animation: slideUp 0.45s ease both;
    }

    @keyframes slideUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── HEADER ─────────────────────────────────── */
    .card-header {
      margin-bottom: 32px;
    }

    .card-icon-wrap {
      width: 48px;
      height: 48px;
      background: rgba(59, 130, 246, 0.12);
      border: 1px solid rgba(59, 130, 246, 0.20);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      margin-bottom: 18px;
    }

    .card-title {
      font-family: 'Syne', sans-serif;
      font-size: 1.55rem;
      font-weight: 800;
      color: var(--white);
      letter-spacing: -0.03em;
      margin-bottom: 6px;
    }

    .card-subtitle {
      font-size: 0.875rem;
      color: var(--gray);
      line-height: 1.5;
    }

    /* ── FORM ───────────────────────────────────── */
    .form {
      display: flex;
      flex-direction: column;
      gap: 22px;
    }

    .field {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    label {
      font-size: 0.82rem;
      font-weight: 500;
      color: var(--white);
      letter-spacing: 0.04em;
      text-transform: uppercase;
    }

    .label-hint {
      font-size: 0.75rem;
      color: var(--gray);
      text-transform: none;
      font-weight: 400;
      letter-spacing: 0;
      margin-left: 6px;
    }

    input[type="text"],
    textarea {
      width: 100%;
      background: var(--bg-input);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 13px 16px;
      color: var(--white);
      font-family: 'DM Sans', sans-serif;
      font-size: 0.9rem;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
      resize: none;
    }

    input[type="text"]::placeholder,
    textarea::placeholder {
      color: rgba(148, 163, 184, 0.45);
    }

    input[type="text"]:focus,
    textarea:focus {
      border-color: var(--border-focus);
      box-shadow: 0 0 0 4px var(--blue-glow);
    }

    textarea {
      height: 110px;
    }

    /* ── COLOR PICKER ───────────────────────────── */
    .color-field {
      display: flex;
      align-items: center;
      gap: 14px;
      background: var(--bg-input);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 11px 16px;
      cursor: pointer;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    .color-field:focus-within {
      border-color: var(--border-focus);
      box-shadow: 0 0 0 4px var(--blue-glow);
    }

    input[type="color"] {
      -webkit-appearance: none;
      width: 32px;
      height: 32px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      padding: 0;
      background: none;
      outline: none;
    }

    input[type="color"]::-webkit-color-swatch-wrapper {
      padding: 0;
    }

    input[type="color"]::-webkit-color-swatch {
      border: none;
      border-radius: 7px;
    }

    .color-label-text {
      font-size: 0.87rem;
      color: var(--gray);
      flex: 1;
    }

    .color-hex {
      font-family: 'DM Sans', sans-serif;
      font-size: 0.78rem;
      color: var(--blue);
      font-weight: 500;
      letter-spacing: 0.05em;
      background: rgba(59,130,246,0.10);
      padding: 3px 10px;
      border-radius: 6px;
    }

    /* ── DIVIDER ────────────────────────────────── */
    .divider {
      height: 1px;
      background: var(--border);
      margin: 4px 0;
    }

    /* ── BUTTONS ────────────────────────────────── */
    .btn-group {
      display: flex;
      gap: 12px;
      margin-top: 4px;
    }

    .btn {
      flex: 1;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 13px 20px;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.9rem;
      font-weight: 500;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    }

    .btn-primary {
      background: var(--blue);
      color: #fff;
    }

    .btn-primary:hover {
      background: var(--blue-dark);
      transform: translateY(-1px);
      box-shadow: 0 8px 24px rgba(59, 130, 246, 0.35);
    }

    .btn-primary:active {
      transform: translateY(0);
      box-shadow: none;
    }

    .btn-cancel {
      background: var(--teal-bg);
      color: var(--teal);
      border: 1px solid var(--teal-border);
    }

    .btn-cancel:hover {
      background: rgba(20, 184, 166, 0.20);
      transform: translateY(-1px);
    }

    .btn-cancel:active {
      transform: translateY(0);
    }

    /* ── FOOTER NOTE ────────────────────────────── */
    .footer-note {
      margin-top: 24px;
      font-size: 0.78rem;
      color: rgba(148, 163, 184, 0.5);
      text-align: center;
    }

    .footer-note a {
      color: var(--blue);
      text-decoration: none;
      transition: opacity 0.2s;
    }

    .footer-note a:hover {
      opacity: 0.75;
    }

    /* ── RESPONSIVE ─────────────────────────────── */
    @media (max-width: 560px) {
      .card {
        padding: 28px 22px;
      }

      .btn-group {
        flex-direction: column-reverse;
      }

      .card-title {
        font-size: 1.3rem;
      }
    }
            /* Navbar */
        .navbar {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100vw;
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.25rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
        }

        .navbar-logo i {
            color: #3B82F6;
            font-size: 1.75rem;
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
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-logo">
                <i class="fas fa-home"></i>
                <span>ColoSpace</span>
            </a>
            
            <a href="{{route('colocation.index')}}" class="navbar-back">
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
          required
        />
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