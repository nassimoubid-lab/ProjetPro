<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    // Afficher le formulaire
    public function create()
    {
        return view('reservation');
    }

    // Enregistrer une réservation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'heure' => 'required',
            'nb_personnes' => 'required|integer|min:1',
        ]);

        Reservation::create($validated);

        return back()->with([
            'success' => 'Réservation enregistrée avec succès !',
            'reservation_nom' => $validated['nom'],
            'reservation_date' => $validated['date'],
            'reservation_heure' => $validated['heure'],
            'reservation_nb' => $validated['nb_personnes'],
        ]);
    }

    // Liste toutes les réservations (dashboard admin)
public function index()
{
    $reservations = Reservation::all();
    return view('reservations_list', compact('reservations'));
}

// Supprimer une réservation
public function destroy($id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->delete();

    return back()->with('success', 'Réservation supprimée.');
}

// Export CSV
public function export()
{
    $reservations = Reservation::all();
    $csvData = "Nom,Email,Date,Heure,Nombre de personnes\n";

    foreach ($reservations as $r) {
        $csvData .= "{$r->nom},{$r->email},{$r->date},{$r->heure},{$r->nb_personnes}\n";
    }

    $fileName = 'reservations.csv';

    return response($csvData)
        ->header('Content-Type', 'text/csv')
        ->header('Content-Disposition', "attachment; filename={$fileName}");
}


    public function home()
{
    return view('welcome');
}

}
