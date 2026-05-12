<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Table d'Or — Restaurant</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --cream: #F5EFE0;
            --cream-dark: #EDE3CC;
            --beige: #D9C9A8;
            --brown-light: #A8845A;
            --brown: #7A5C3A;
            --brown-dark: #4A3420;
            --gold: #C9A84C;
            --gold-light: #E8CА7A;
            --text: #2E1F0F;
            --text-muted: #7A6248;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--cream);
            color: var(--text);
            font-family: 'Jost', sans-serif;
            font-weight: 300;
            overflow-x: hidden;
        }

        /* ── NAV ── */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 60px;
            background: transparent;
            transition: background 0.4s, padding 0.4s;
        }
        nav.scrolled {
            background: rgba(245, 239, 224, 0.96);
            backdrop-filter: blur(8px);
            padding: 16px 60px;
            border-bottom: 1px solid var(--beige);
        }
        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 0.08em;
            color: var(--brown-dark);
            text-decoration: none;
        }
        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }
        .nav-links a {
            font-size: 13px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--brown);
            text-decoration: none;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: var(--gold); }
        .nav-cta {
            font-size: 12px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            padding: 10px 28px;
            border: 1px solid var(--brown);
            color: var(--brown-dark);
            text-decoration: none;
            transition: all 0.3s;
            background: transparent;
        }
        .nav-cta:hover {
            background: var(--brown-dark);
            color: var(--cream);
            border-color: var(--brown-dark);
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            position: relative;
        }
        .hero-left {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 140px 60px 80px;
            position: relative;
            z-index: 2;
        }
        .hero-tag {
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 32px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .hero-tag::before {
            content: '';
            display: block;
            width: 40px;
            height: 1px;
            background: var(--gold);
        }
        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(52px, 6vw, 80px);
            font-weight: 300;
            line-height: 1.08;
            color: var(--brown-dark);
            margin-bottom: 32px;
        }
        .hero-title em {
            font-style: italic;
            color: var(--brown);
        }
        .hero-desc {
            font-size: 15px;
            line-height: 1.8;
            color: var(--text-muted);
            max-width: 380px;
            margin-bottom: 52px;
        }
        .hero-actions {
            display: flex;
            align-items: center;
            gap: 32px;
        }
        .btn-primary {
            display: inline-block;
            padding: 16px 48px;
            background: var(--brown-dark);
            color: var(--cream);
            font-size: 12px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gold);
            transform: translateX(-101%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-primary:hover::after { transform: translateX(0); }
        .btn-primary span { position: relative; z-index: 1; }
        .btn-secondary {
            font-size: 13px;
            color: var(--brown);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: gap 0.2s;
        }
        .btn-secondary:hover { gap: 14px; }
        .btn-secondary::after { content: '→'; }

        .hero-right {
            position: relative;
            overflow: hidden;
        }
        .hero-img-wrap {
            position: absolute;
            inset: 0;
            background: var(--brown-light);
        }
        .hero-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.85;
            mix-blend-mode: multiply;
        }
        /* Fallback si pas d'image */
        .hero-img-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--brown-light) 0%, var(--brown-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-img-placeholder svg {
            opacity: 0.15;
            width: 200px;
        }
        .hero-overlay-text {
            position: absolute;
            bottom: 60px;
            left: -30px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 120px;
            font-weight: 300;
            color: rgba(255,255,255,0.07);
            line-height: 1;
            pointer-events: none;
            white-space: nowrap;
        }
        .hero-badge {
            position: absolute;
            top: 60%;
            right: 40px;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--cream);
            animation: spin 20s linear infinite;
        }
        .hero-badge-inner {
            position: absolute;
            top: 60%;
            right: 40px;
            width: 110px;
            height: 110px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--cream);
        }
        .hero-badge-inner .num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            font-weight: 300;
            line-height: 1;
        }
        .hero-badge-inner .label {
            font-size: 10px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            opacity: 0.7;
        }

        /* ── INFOS BAR ── */
        .infos-bar {
            background: var(--brown-dark);
            color: var(--cream);
            display: flex;
            justify-content: center;
            gap: 80px;
            padding: 40px 60px;
        }
        .info-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            text-align: center;
        }
        .info-label {
            font-size: 10px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
        }
        .info-value {
            font-family: 'Cormorant Garamond', serif;
            font-size: 18px;
            font-weight: 300;
        }
        .info-sep {
            width: 1px;
            background: rgba(255,255,255,0.15);
            align-self: stretch;
        }

        /* ── RÉSERVATION ── */
        .reservation {
            padding: 120px 60px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        .section-tag {
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .section-tag::before {
            content: '';
            display: block;
            width: 30px;
            height: 1px;
            background: var(--gold);
        }
        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(36px, 4vw, 52px);
            font-weight: 300;
            line-height: 1.15;
            color: var(--brown-dark);
            margin-bottom: 20px;
        }
        .section-desc {
            font-size: 15px;
            line-height: 1.8;
            color: var(--text-muted);
            margin-bottom: 40px;
        }
        .form-card {
            background: white;
            padding: 48px;
            border: 1px solid var(--cream-dark);
            position: relative;
        }
        .form-card::before {
            content: '';
            position: absolute;
            top: -8px; left: -8px;
            right: 8px; bottom: 8px;
            border: 1px solid var(--beige);
            z-index: -1;
        }
        .form-group {
            margin-bottom: 24px;
        }
        .form-group label {
            display: block;
            font-size: 11px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 10px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--cream-dark);
            background: var(--cream);
            font-family: 'Jost', sans-serif;
            font-size: 14px;
            font-weight: 300;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s;
            appearance: none;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--brown-light);
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .form-submit {
            width: 100%;
            padding: 18px;
            background: var(--brown-dark);
            color: var(--cream);
            border: none;
            font-family: 'Jost', sans-serif;
            font-size: 12px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 8px;
        }
        .form-submit:hover { background: var(--gold); color: var(--brown-dark); }

        /* ── MENU APERÇU ── */
        .menu-section {
            background: var(--brown-dark);
            padding: 100px 60px;
            text-align: center;
        }
        .menu-section .section-tag { justify-content: center; color: var(--gold); }
        .menu-section .section-tag::before { display: none; }
        .menu-section .section-title { color: var(--cream); margin-bottom: 60px; }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
            max-width: 900px;
            margin: 0 auto 60px;
        }
        .menu-item {
            background: rgba(255,255,255,0.04);
            padding: 40px 30px;
            border: 1px solid rgba(255,255,255,0.06);
            transition: background 0.3s;
        }
        .menu-item:hover { background: rgba(255,255,255,0.08); }
        .menu-item-icon {
            font-size: 28px;
            margin-bottom: 16px;
        }
        .menu-item-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 300;
            color: var(--cream);
            margin-bottom: 10px;
        }
        .menu-item-desc {
            font-size: 13px;
            color: rgba(245,239,224,0.5);
            line-height: 1.6;
        }
        .menu-item-price {
            margin-top: 16px;
            font-size: 13px;
            color: var(--gold);
            letter-spacing: 0.1em;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--brown-dark);
            border-top: 1px solid rgba(255,255,255,0.08);
            padding: 60px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 60px;
        }
        .footer-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 300;
            color: var(--cream);
            margin-bottom: 16px;
        }
        .footer-desc {
            font-size: 13px;
            color: rgba(245,239,224,0.45);
            line-height: 1.8;
            max-width: 280px;
        }
        .footer-heading {
            font-size: 11px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 20px;
        }
        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .footer-links a {
            font-size: 13px;
            color: rgba(245,239,224,0.55);
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--cream); }
        .footer-bottom {
            background: var(--brown-dark);
            border-top: 1px solid rgba(255,255,255,0.06);
            padding: 20px 60px;
            text-align: center;
            font-size: 12px;
            color: rgba(245,239,224,0.3);
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .hero-tag { animation: fadeUp 0.7s ease both; }
        .hero-title { animation: fadeUp 0.7s 0.15s ease both; }
        .hero-desc { animation: fadeUp 0.7s 0.28s ease both; }
        .hero-actions { animation: fadeUp 0.7s 0.4s ease both; }
    </style>
</head>
<body>

<!-- NAV -->
<nav id="navbar">
    <a href="/" class="nav-logo">La Table d'Or</a>
    <ul class="nav-links">
        <li><a href="#reservation">Réserver</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#contact">Contact</a></li>
        @auth
            <li><a href="{{ route('dashboard') }}">Mon compte</a></li>
        @endauth
    </ul>
    <a href="#reservation" class="nav-cta">Réserver une table</a>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-left">
        <p class="hero-tag">Depuis 1987 · Paris</p>
        <h1 class="hero-title">
            Une cuisine<br>
            <em>sincère</em> et<br>
            généreuse
        </h1>
        <p class="hero-desc">
            Des produits de saison, des recettes de terroir revisitées avec élégance.
            Une table où chaque repas devient un souvenir.
        </p>
        <div class="hero-actions">
            <a href="#reservation" class="btn-primary"><span>Réserver une table</span></a>
            <a href="#menu" class="btn-secondary">Découvrir le menu</a>
        </div>
    </div>
    <div class="hero-right">
        <div class="hero-img-wrap">
            <img src="{{ asset('images/restaurant.jpg') }}" alt="Restaurant">
            {{-- Remplace par :  --}}
        </div>
        <div class="hero-overlay-text">Table</div>
        <div class="hero-badge-inner">
            <span class="num">15</span>
            <span class="label">ans d'excellence</span>
        </div>
    </div>
</section>

<!-- INFOS BAR -->
<div class="infos-bar">
    <div class="info-item">
        <span class="info-label">Déjeuner</span>
        <span class="info-value">12h00 – 14h30</span>
    </div>
    <div class="info-sep"></div>
    <div class="info-item">
        <span class="info-label">Dîner</span>
        <span class="info-value">19h00 – 22h30</span>
    </div>
    <div class="info-sep"></div>
    <div class="info-item">
        <span class="info-label">Adresse</span>
        <span class="info-value">12 rue du Marché, Paris</span>
    </div>
    <div class="info-sep"></div>
    <div class="info-item">
        <span class="info-label">Téléphone</span>
        <span class="info-value">01 23 45 67 89</span>
    </div>
</div>

<!-- RÉSERVATION -->
<section class="reservation" id="reservation">
    <div>
        <p class="section-tag">Réservation</p>
        <h2 class="section-title">Réservez<br>votre table</h2>
        <p class="section-desc">
            Réservez en ligne en quelques secondes. Nous confirmons votre table dans les plus brefs délais.
        </p>
        <p style="font-size:13px; color:var(--text-muted); line-height:1.8;">
            Pour les groupes de plus de 8 personnes ou les événements privés,
            contactez-nous directement au <strong style="color:var(--brown)">01 23 45 67 89</strong>.
        </p>
    </div>

    <div class="form-card">
        <form action="{{ route('reservation.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" name="prenom" placeholder="Jean" required>
                </div>
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="nom" placeholder="Dupont" required>
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="jean@exemple.fr" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" required>
                </div>
                <div class="form-group">
                    <label>Heure</label>
                    <select name="heure" required>
                        <option value="">Choisir</option>
                        <optgroup label="Déjeuner">
                            <option>12:00</option>
                            <option>12:30</option>
                            <option>13:00</option>
                            <option>13:30</option>
                        </optgroup>
                        <optgroup label="Dîner">
                            <option>19:00</option>
                            <option>19:30</option>
                            <option>20:00</option>
                            <option>20:30</option>
                            <option>21:00</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Nombre de couverts</label>
                <select name="couverts" required>
                    <option value="">Sélectionner</option>
                    @for($i = 1; $i <= 8; $i++)
                        <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'personne' : 'personnes' }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="form-submit">Confirmer la réservation</button>
        </form>
    </div>
</section>

<!-- MENU APERÇU -->
<section class="menu-section" id="menu">
    <p class="section-tag">Notre carte</p>
    <h2 class="section-title">Quelques suggestions</h2>
    <div class="menu-grid">
        <div class="menu-item">
            <div class="menu-item-icon">🥗</div>
            <p class="menu-item-name">Entrées du marché</p>
            <p class="menu-item-desc">Sélection de saison, produits locaux et bio</p>
            <p class="menu-item-price">À partir de 14€</p>
        </div>
        <div class="menu-item">
            <div class="menu-item-icon">🥩</div>
            <p class="menu-item-name">Plats signatures</p>
            <p class="menu-item-desc">Viandes et poissons travaillés avec soin</p>
            <p class="menu-item-price">À partir de 28€</p>
        </div>
        <div class="menu-item">
            <div class="menu-item-icon">🍮</div>
            <p class="menu-item-name">Desserts maison</p>
            <p class="menu-item-desc">Créations du chef pâtissier, tout fait maison</p>
            <p class="menu-item-price">À partir de 10€</p>
        </div>
    </div>
    <a href="#reservation" class="btn-primary" style="display:inline-block"><span>Réserver maintenant</span></a>
</section>

<!-- FOOTER -->
<footer id="contact">
    <div>
        <p class="footer-brand">La Table d'Or</p>
        <p class="footer-desc">Un restaurant de cuisine française traditionnelle au cœur de Paris, ouvert depuis 1987.</p>
    </div>
    <div>
        <p class="footer-heading">Navigation</p>
        <ul class="footer-links">
            <li><a href="#reservation">Réserver</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#contact">Contact</a></li>
            @guest
                <li><a href="{{ route('admin.login') }}">Connexion</a></li>
            @endguest
        </ul>
    </div>
    <div>
        <p class="footer-heading">Contact</p>
        <ul class="footer-links">
            <li><a href="tel:0123456789">01 23 45 67 89</a></li>
            <li><a href="mailto:contact@latabledOr.fr">contact@latabledOr.fr</a></li>
            <li><a href="#">12 rue du Marché, Paris</a></li>
        </ul>
    </div>
</footer>
<div class="footer-bottom">
    © {{ date('Y') }} La Table d'Or — Tous droits réservés
</div>

<script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 40);
    });
</script>

</body>
</html>
