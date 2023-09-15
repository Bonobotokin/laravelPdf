# laravelPdf

Extration text pdf with laravel 10

#1
Lancer le "php artisan migrate",
Lancer le "php artisan db:seed" pour creer le utilisateur par defaut,

#2
-lancer php artisan queue:listen
-Pour gerer les fil d'attent en mode de developpement.
-Donner l'acces a MailHog_linux_amd64 chmod +x si vous utiliser linux
-En suite lancer le par "./MailHog_linux"
-Acceder aux MailHog par le lien "Localhost::8025"
-Pour teste le notification par email.
#3
Lancer le serveur : php artisan serve

#Merci,
