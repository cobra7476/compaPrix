# Cahier des Charges - CompaPrix

## 1. Description du Projet
CompaPrix est une application web (conçue en PHP/Symfony) destinée à faciliter les courses et à comparer le prix des produits selon les magasins. 

## 2. Objectif de la Version 1 (MVP - "Mode Scannette")
Le premier objectif fonctionnel est de transformer le smartphone en "scannette" de supermarché. 
Pendant les courses, l'utilisateur scanne les produits qu'il met dans son caddie. L'application enregistre les informations et calcule le total du panier en temps réel (en euros).

## 3. Fonctionnalités Clés (V1)
* **Scan de code-barres :** Utilisation de l'appareil photo du smartphone via le navigateur (JavaScript) pour lire les codes-barres (EAN) des produits.
* **Saisie des informations produit :** * *Obligatoire :* Code-barres, Prix, Magasin.
    * *Facultatif :* Nom, Marque, Type (riz, sel, etc.).
* **Gestion des magasins :** Possibilité de créer/sélectionner un magasin avant de commencer ses courses.
* **Panier en cours (Le Caddie) :** Affichage d'une liste récapitulative des produits scannés lors de la session de courses en cours.
* **Calculatrice intégrée :** Affichage en temps réel du coût total du caddie.

## 4. Contraintes Techniques
* **Technologies :** Backend en PHP avec le framework Symfony, base de données relationnelle (MySQL/MariaDB).
* **Frontend :** Interface web "Mobile First" (pensée d'abord pour un affichage sur smartphone). JS pour la lecture du flux vidéo.
* **Hors ligne (Évolution future) :** L'application devra à terme évoluer vers une PWA (Progressive Web App) pour permettre le scan et l'enregistrement dans la mémoire locale du téléphone lors des pertes de réseau dans les magasins, puis se synchroniser avec le serveur une fois la connexion retrouvée.


//la suite est l'ancien cahier des charges, qui servira pour la suite
https://gemini.google.com/share/00b33cedb3c1

C'est une vision très complète pour une V1.0 ! On sent que tu as déjà bien réfléchi à l'expérience utilisateur (UX). En intégrant la gestion des listes de courses dès le début, tu transformes l'outil d'un simple "annuaire de prix" en un véritable compagnon de quotidien.

Voici la mise à jour du cahier des charges structuré pour ta V1.0, en intégrant tes nouvelles idées :

1. Identité & Design
Nom : CourseCheck (on garde celui-là ou un de ton choix).

Style : Épuré, Mobile First.

Palette : Vert Émeraude (action, prix bas) / Blanc Pur (clarté) / Gris léger (bordures et éléments secondaires).

Navigation :

Un Menu "Burger" ou une Barre de navigation basse (plus pratique sur mobile avec le pouce) contenant : Listes, Magasins, Produits.

Utilisation d'icônes larges et explicites sur l'accueil.

2. Structure des Pages (Sitemap V1.0)
A. Espace Listes de Courses
Index des Listes : Liste des listes actives + Bouton "Historique" (archives).

Vue Liste (Le cœur de l'app) :

Affichage des articles avec checkbox.

Comportement : Une fois coché, l'article passe en bas de liste, barré.

Boutons "Futur" (avec bulle info) : "Ajouter photo", "Scan Ticket".

Interaction : Cliquer sur un article permet de voir son prix actuel dans le magasin sélectionné.

B. Espace Magasins
Liste des Magasins : Vue par cartes des enseignes autour de soi.

Fiche Magasin : Liste des produits connus dans ce magasin avec leurs prix.

Gestion : Création / Modification / Bouton discret "Ce magasin n'existe plus".

C. Espace Produits
Catalogue : Trié par catégories.

Fiche Produit : Comparatif multi-enseignes (tableau de prix avec dates de mise à jour).

Action : Bouton rapide "Ajouter à ma liste en cours".

3. Les "Modes" d'Utilisation
C'est ton idée la plus forte. Techniquement, cela se traduira par des vues différentes sur Symfony :

Mode Préparation (À la maison) : * Priorité à la recherche du prix le plus bas.

L'app suggère : "Pour cette liste, le magasin le moins cher est X".

Mode Course (En magasin) : * Interface simplifiée.

Focus sur : Cocher les articles + Mettre à jour le prix si on constate un changement (Bouton "Le prix est toujours correct" pour rafraîchir l'horodatage sans changer la valeur).

4. Modèle de Données (Back-End)
Pour que Symfony puisse gérer tout cela, voici les relations qu'il faudra créer :

User (Même si tu es seul, c'est mieux pour l'avenir).

Product (Nom, Marque, Catégorie).

Store (Enseigne, Ville, Coordonnées GPS).

Price (Valeur, Date, lié à 1 Produit et 1 Magasin).

ShoppingList (Nom, Date de création, État : active/archivée).

ListItem (Le lien entre une Liste et un Produit, avec une case à cocher is_bought).

5. Résumé des fonctionnalités "Prochainement" (Placeholders)
Pour rendre l'app "vivante", on affichera ces boutons grisés avec une petite info-bulle :

OCR (Scan ticket) : "Bientôt : Ajoutez vos prix en prenant une photo".

GPS : "Bientôt : Détection automatique du magasin".

Stats : "Bientôt : Courbes d'évolution des prix".

Analyse de ton projet :
Le défi majeur pour toi en tant qu'ultra débutant sera la gestion des Listes de courses (ajouter dynamiquement des produits à une liste). C'est un excellent exercice pour apprendre à manipuler les relations entre tables dans Symfony.

Est-ce que ce découpage en pages te semble complet pour lancer la V1.0 ? Si oui, on peut s'attaquer à la rédaction de la toute première étape technique : Le schéma de la base de données détaillé.