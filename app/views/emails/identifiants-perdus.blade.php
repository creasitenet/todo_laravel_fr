Bonjour {{ $username }},<br /><br />

Il semblerait que vous ayez demandé un nouveau mot de passe.<br />
Vous devez suivre le lien suivant pour l'activer : <br />
<strong>{{ link_to( $link ) }}</strong><br />
Votre nouveau mot de passe sera: <strong>{{ $nouveau_mot_de_passe }}</strong><br /><br />
 
Si vous n'avez pas demandé un nouveau mot de passe, ignorez simplement cet email, votre mot de passe restera inchangé.
<br /><br />

A bientôt,<br />