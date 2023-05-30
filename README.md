
# Projet Webinaire Laravel

Ce dépôt contient le code source du projet webinaire réalisé avec Laravel. Ce projet a été créé dans le cadre d'un webinaire pour démontrer les fonctionnalités et les bonnes pratiques de développement avec Laravel.

## Fonctionnalités

- **Authentification** : Ce projet intègre un système d'authentification complet avec des fonctionnalités telles que l'inscription, la connexion, la réinitialisation du mot de passe, etc.

- **Gestion des utilisateurs** : Les utilisateurs peuvent être créés, modifiés et supprimés par les administrateurs du site. Différents rôles d'utilisateur peuvent être attribués pour contrôler l'accès aux fonctionnalités.

- **Gestion des webinaire** : Les utilisateurs authentifiés peuvent créer, éditer et supprimer des articles. Les articles peuvent être organisés en catégories et comportent une fonctionnalité de recherche.

- **Interface d'administration** : Une interface d'administration est disponible pour les administrateurs du site, offrant une gestion conviviale des utilisateurs, des articles et des catégories.

## Prérequis

Avant de pouvoir exécuter ce projet localement, assurez-vous d'avoir les éléments suivants installés :

- PHP 8.2 ou version supérieure
- Composer (pour l'installation des dépendances)
- Laravel CLI

## Installation

1. Clonez ce dépôt sur votre machine locale :

```bash
git clone https://github.com/medab123/projet-pfe.git
```

2. Accédez au répertoire du projet :

```bash
cd projet-pfe
```

3. Installez les dépendances du projet à l'aide de Composer :

```bash
composer install
```

4. Copiez le fichier d'environnement `.env.example` et renommez-le en `.env`. Configurez les paramètres de la base de données et autres paramètres nécessaires dans ce fichier.

5. Générez une clé d'application :

```bash
php artisan key:generate
```

6. Exécutez les migrations pour créer les tables de base de données :

```bash
php artisan migrate
```

7. Lancez le serveur de développement :

```bash
php artisan serve
```

8. Accédez à l'URL suivante dans votre navigateur :

```
http://localhost:8000
```

## Contribution

Les contributions à ce projet sont les bienvenues. Si vous souhaitez apporter des améliorations, veuillez suivre ces étapes :

1. Fork ce dépôt
2. Créez une nouvelle branche pour vos fonctionnalités ou corrections de bugs :
```bash
git checkout -b ameliorations
```
3. Faites les modifications nécessaires et committez vos changements :
```bash
git commit -m "Ajouter des fonctionnalités"
```
4. Poussez votre branche vers votre fork :
```bash
git push origin ameliorations
```
5. Ouvrez une pull request pour proposer vos changements.

Veuillez vous assurer de respecter le code de conduite et les bonnes pratiques de contribution.

## Auteurs

Ce projet a été développé par [medab123](https://github.com/medab123) 

## Licence
Ce projet est sous licence MIT. Vous pouvez consulter le fichier `LICENSE`  pour plus de détails.
