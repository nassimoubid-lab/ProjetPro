<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin — La Table d'Or</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
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
            --text: #2E1F0F;
            --text-muted: #7A6248;
            --danger: #C0392B;
            --danger-light: #FADBD8;
            --success: #1D6A4A;
            --success-light: #D5F0E3;
        }

        body {
            background: var(--cream);
            color: var(--text);
            font-family: 'Jost', sans-serif;
            font-weight: 300;
            min-height: 100vh;
        }

        /* ── SIDEBAR ── */
        .layout {
            display: grid;
            grid-template-columns: 240px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            background: var(--brown-dark);
            padding: 40px 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: 240px;
        }

        .sidebar-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 20px;
            font-weight: 300;
            color: var(--cream);
            padding: 0 28px 40px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            letter-spacing: 0.05em;
        }

        .sidebar-logo span {
            display: block;
            font-size: 11px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 6px;
            font-family: 'Jost', sans-serif;
        }

        .sidebar-nav {
            padding: 28px 0;
            flex: 1;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 28px;
            color: rgba(245,239,224,0.55);
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 0.05em;
            transition: all 0.2s;
            border-left: 2px solid transparent;
        }

        .sidebar-item:hover,
        .sidebar-item.active {
            color: var(--cream);
            background: rgba(255,255,255,0.05);
            border-left-color: var(--gold);
        }

        .sidebar-item svg {
            width: 16px;
            height: 16px;
            opacity: 0.7;
            flex-shrink: 0;
        }

        .sidebar-item.active svg { opacity: 1; }

        .sidebar-bottom {
            padding: 20px 28px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .logout-btn {
            width: 100%;
            padding: 10px 16px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: rgba(245,239,224,0.6);
            font-family: 'Jost', sans-serif;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.1);
            color: var(--cream);
        }

        /* ── MAIN ── */
        .main {
            margin-left: 240px;
            padding: 48px;
            min-height: 100vh;
        }

        /* ── HEADER ── */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .page-tag {
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-tag::before {
            content: '';
            display: block;
            width: 24px;
            height: 1px;
            background: var(--gold);
        }

        .page-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 300;
            color: var(--brown-dark);
        }

        .export-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background: var(--brown-dark);
            color: var(--cream);
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            transition: background 0.3s;
        }

        .export-btn:hover { background: var(--gold); color: var(--brown-dark); }

        .export-btn svg { width: 14px; height: 14px; }

        /* ── STATS ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--cream-dark);
            padding: 28px;
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 3px;
            height: 100%;
            background: var(--gold);
        }

        .stat-label {
            font-size: 11px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 12px;
        }

        .stat-value {
            font-family: 'Cormorant Garamond', serif;
            font-size: 42px;
            font-weight: 300;
            color: var(--brown-dark);
            line-height: 1;
        }

        /* ── FLASH ── */
        .flash {
            padding: 14px 20px;
            margin-bottom: 28px;
            font-size: 13px;
            border-left: 3px solid;
        }

        .flash-success {
            background: var(--success-light);
            color: var(--success);
            border-color: var(--success);
        }

        /* ── TABLE ── */
        .table-card {
            background: white;
            border: 1px solid var(--cream-dark);
        }

        .table-header {
            padding: 20px 28px;
            border-bottom: 1px solid var(--cream-dark);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-title {
            font-size: 13px;
            font-weight: 500;
            color: var(--brown-dark);
            letter-spacing: 0.05em;
        }

        .table-count {
            font-size: 12px;
            color: var(--text-muted);
            background: var(--cream);
            padding: 4px 12px;
            border-radius: 99px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            padding: 14px 20px;
            text-align: left;
            font-size: 10px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--text-muted);
            background: var(--cream);
            font-weight: 400;
            border-bottom: 1px solid var(--cream-dark);
        }

        tbody tr {
            border-bottom: 1px solid var(--cream-dark);
            transition: background 0.15s;
        }

        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #FDFAF4; }

        tbody td {
            padding: 16px 20px;
            font-size: 13px;
            color: var(--text);
            vertical-align: middle;
        }

        .td-name {
            font-weight: 500;
            color: var(--brown-dark);
        }

        .td-email { color: var(--text-muted); }

        .td-date {
            font-family: 'Cormorant Garamond', serif;
            font-size: 15px;
        }

        .td-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 12px;
            background: var(--cream);
            color: var(--brown);
        }

        .delete-btn {
            padding: 7px 16px;
            background: transparent;
            border: 1px solid var(--cream-dark);
            color: var(--text-muted);
            font-family: 'Jost', sans-serif;
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.2s;
        }

        .delete-btn:hover {
            background: var(--danger-light);
            border-color: var(--danger);
            color: var(--danger);
        }

        .empty-state {
            padding: 80px 20px;
            text-align: center;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 16px;
            opacity: 0.3;
        }

        .empty-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 300;
            color: var(--brown-dark);
            margin-bottom: 8px;
        }

        .empty-desc {
            font-size: 13px;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <span>Administration</span>
            La Table d'Or
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Réservations
            </a>
            <a href="{{ route('reservation.export') }}" class="sidebar-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 16V4m0 12l-4-4m4 4l4-4M4 20h16"/>
                </svg>
                Exporter CSV
            </a>
            <a href="/" class="sidebar-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Voir le site
            </a>
        </nav>
        <div class="sidebar-bottom">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="logout-btn">Déconnexion</button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <div class="page-header">
            <div>
                <p class="page-tag">Administration</p>
                <h1 class="page-title">Réservations</h1>
            </div>
            <a href="{{ route('reservation.export') }}" class="export-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 16V4m0 12l-4-4m4 4l4-4M4 20h16"/>
                </svg>
                Exporter CSV
            </a>
        </div>

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <p class="stat-label">Total réservations</p>
                <p class="stat-value">{{ $reservations->count() }}</p>
            </div>
            <div class="stat-card">
                <p class="stat-label">Aujourd'hui</p>
                <p class="stat-value">{{ $reservations->where('date', today()->toDateString())->count() }}</p>
            </div>
            <div class="stat-card">
                <p class="stat-label">Couverts total</p>
                <p class="stat-value">{{ $reservations->sum('nb_personnes') }}</p>
            </div>
        </div>

        <!-- FLASH -->
        @if(session('success'))
            <div class="flash flash-success">{{ session('success') }}</div>
        @endif

        <!-- TABLE -->
        <div class="table-card">
            <div class="table-header">
                <span class="table-title">Liste des réservations</span>
                <span class="table-count">{{ $reservations->count() }} au total</span>
            </div>

            @if($reservations->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">🍽️</div>
                    <p class="empty-title">Aucune réservation pour l'instant</p>
                    <p class="empty-desc">Les nouvelles réservations apparaîtront ici automatiquement.</p>
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Couverts</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                        <tr>
                            <td class="td-name">{{ $reservation->nom }}</td>
                            <td class="td-email">{{ $reservation->email }}</td>
                            <td class="td-date">{{ \Carbon\Carbon::parse($reservation->date)->format('d M Y') }}</td>
                            <td>
                                <span class="td-badge">🕐 {{ $reservation->heure }}</span>
                            </td>
                            <td>
                                <span class="td-badge">👤 {{ $reservation->nb_personnes }}</span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.reservation.destroy', $reservation->id) }}"
                                      onsubmit="return confirm('Supprimer cette réservation ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </main>
</div>

</body>
</html>