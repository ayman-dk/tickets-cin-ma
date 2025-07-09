@component('mail::message')
# Bienvenue {{ $user->name }}

Nous sommes ravis de vous accueillir sur **CinéNova** 🎬 .

Vous pouvez dès maintenant :
- Explorer notre catalogue de films 
- Réserver vos tickets en quelques clics 

@component('mail::button', ['url' => url('/')])
Accéder au site
@endcomponent

Merci,<br>
L'équipe CinéNova
@endcomponent
