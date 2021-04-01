<h5>Notification d'accréditation :</h5>
<hr>
<p><b>Type média:</b> {{$type}}</p>
<p><b>Nom du média:</b> {{$name}}</p>
<p><b>Email du média:</b> {{$email}}</p>
<p><b>Téléphone du média:</b> {{$phone_number}}</p>
<p><b>Journée:</b> {{$journee}}</p>
<p><b>Ville:</b> {{$ville}}</p>
<p><b>Stade:</b> {{$stade}}</p>
<p><b>Date du Match:</b> {{$date_match}}</p>
<p><b>Match:</b> {{$match}}</p>
<p><b>Nombre total de places dans le stade:</b> {{$quota }}</p>
<p><b>Nombre de place(s) restant(s) dans le stade:</b> {{$left_place }}</p>

<br><br>
<h5>Résumé :</h5>
<p>Une nouvelle demande d'accréditation a été enrigistré pour le média {{$name}} 
    pour le compte de la journée {{$journee}} au stade {{$stade}} pour le match {{$match}} ce {{$date_match}} à {{$ville}}.
</p>
<p>
    Il reste {{$left_place }} place(s) sur les {{$quota }}.
</p>