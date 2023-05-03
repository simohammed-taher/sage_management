# Système de gestion SAGE

Le système de gestion SAGE est une application web conçue pour gérer différents aspects des opérations quotidiennes d'une entreprise. Le système comprend divers modules tels que la gestion des employés, la gestion des congés, la gestion des salaires, la gestion des clients, la gestion des projets, la gestion des tâches, la planification et les feuilles de temps.

## Fonctionnalités

- [x]  Authentification : Système de connexion et d'inscription des utilisateurs.
- [x] Gestion des employés : Ajouter, modifier, supprimer et afficher les détails des employés.
- [x] Gestion des congés : Gérer les demandes et les approbations de congés des employés.
- [x] Gestion des salaires : Suivre et gérer les salaires des employés.
- [x] Gestion des clients : Gérer les informations et les contacts des clients.
- [x] Gestion de projets : Organiser et gérer les projets au sein de l'entreprise.
- [x] Gestion des tâches : Assigner et suivre les tâches pour les employés.
- [x] Planifications : Créer et gérer la planification hebdomadaire des employés.
- [x] Feuilles de temps : Suivre la présence des employés et le temps passé sur les tâches.

## Installation

1. Clonez le dépôt ou téléchargez le code source.

git clone https://github.com/votre_nom_utilisateur/sage-management.git


2. Accédez au dossier du projet et installez les dépendances requises à l'aide de Composer.

cd sage-management
composer install
3. Copiez le fichier .env.example et créez un nouveau fichier .env.

cp .env.example .env


4. Générez une nouvelle clé d'application.

php artisan key:generate


5. Créez une nouvelle base de données et mettez à jour le fichier .env avec les informations d'identification de la base de données (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

6. Exécutez les migrations et remplissez la base de données.

php artisan migrate --seed


7. Démarrez le serveur de développement local.

php artisan serve


8. Visitez l'application dans votre navigateur web à l'adresse http://127.0.0.1:8000.

## Contribuer

1. Bifurquez le dépôt sur GitHub.
2. Clonez votre dépôt bifurqué sur votre machine locale.
3. Créez une nouvelle branche pour votre fonctionnalité ou correction de bug.
4. Effectuez vos modifications et validez-les dans votre branche.
5. Envoyez votre branche sur GitHub.
6. Créez une nouvelle demande d'extraction sur GitHub pour soumettre vos modifications.

## Licence

Ce projet est sous licence MIT.
