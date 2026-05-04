<h2>Bonjour {{ $reservation['nom'] }},</h2>
<p>Merci pour votre réservation au restaurant.</p>
<h4>Récapitulatif :</h4>
<ul>
    <li>Date : {{ $reservation['date'] }}</li>
    <li>Heure : {{ $reservation['heure'] }}</li>
    <li>Nombre de personnes : {{ $reservation['nb_personnes'] }}</li>
</ul>
<p>Nous avons hâte de vous accueillir !</p>
