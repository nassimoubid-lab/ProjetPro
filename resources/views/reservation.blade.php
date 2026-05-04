@extends('layouts.app')

@section('title', 'Réserver une table')

@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Réserver une table</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('mail_preview'))
    <div class="card mt-3">
        <div class="card-header">Aperçu du mail envoyé :</div>
        <div class="card-body">
            {!! session('mail_preview') !!}
        </div>
    </div>
    @endif

    <form method="POST" action="{{ route('reservation.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label>Date</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="col">
                <label>Heure</label>
                <input type="time" name="heure" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label>Nombre de personnes</label>
            <input type="number" name="nb_personnes" class="form-control">
        </div>
        <button class="btn btn-primary">Réserver</button>
    </form>
</div>
@endsection
