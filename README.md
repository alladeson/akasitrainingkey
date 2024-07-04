<p align="center"><img src="https://akasilearningkey.com/front/img/customized/logo/alek-logo.png"></p>

# Akasi Training Key

AkasiTrainingKey est une solution d'apprentissage sur mesure dédiée aux professionnels de la TECH du monde entier. Ce projet vise à offrir une plateforme aux apprenants pour s'inscrire, visualiser et imprimer le catalogue des cours et aussi pouvoir reserver des places pour les séances de formations. Il intègre aussi le paiement en ligne.

**Pour accéder à la plateforme en ligne : [Akasi Learning Key - Accueil](https://akasilearningkey.com/)**

## Configuration Requise

Avant de commencer, assurez-vous d'avoir installé les éléments suivants sur votre machine :

- [PHP](https://www.php.net/) (version recommandée : 8.1+) En utilisant [WampServer](https://sourceforge.net/projects/wampserver/) ou [XAMPP](https://www.apachefriends.org/fr/download.html) directement c'est mieux
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/) (version recommandée : 10)
- [Git](https://git-scm.com/)

## Procédure d'Installation

1. Clonez ce repo sur votre machine :
   ```
   git clone https://github.com/alladeson/akasitrainingkey.git
   ```

2. Accédez au répertoire du projet :
   ```
   cd akasitrainingkey
   ```

3. Installez les dépendances avec Composer :
   ```
   composer install
   ```

4. Copiez le fichier .env.example et renommez-le en .env :
   ```
       cp .env.example .env
   ```
   

5. Générez une clé d'application Laravel :
    ```
       php artisan key:generate
    ```

6. Configurez votre base de données dans le fichier .env.

7. Effectuez les migrations de base de données :
   ```
   php artisan migrate
   ```

8. Lancez le serveur de développement :
    ```
    php artisan serve
    ```
    
9. Votre application sera accessible à l'adresse http://localhost:8000.

## Licence

Ce projet est sous licence [MIT](LICENSE).

**Pour accéder à la plateforme en ligne : [Akasi Learning Key - Accueil](https://akasilearningkey.com/)**
