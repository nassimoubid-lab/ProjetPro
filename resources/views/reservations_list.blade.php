@extends('layouts.app')

@section('title', 'Dashboard Admin - Réservations')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">Dashboard Admin – Réservations</h2>



    <!-- Messages flash -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bouton Export CSV -->
    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('reservation.export') }}" class="btn btn-success">Exporter CSV</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="btn btn-secondary">Déconnexion</button>
        </form>
    </div>


    <!-- Table des réservations -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Personnes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->nom }}</td>
                    <td>{{ $reservation->email }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->heure }}</td>
                    <td>{{ $reservation->nb_personnes }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.reservation.destroy', $reservation->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Aucune réservation pour l’instant.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
