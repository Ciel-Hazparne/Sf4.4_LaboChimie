# Projet 2021 Labo de chimie
**Aly, développement du site Web avec Symfony 4.4**
## Mission
Dans ce projet, je dois :
- concevoir une base de données qui permettra d'héberger l’ensemble des données physiques (température, co2, cov) et des produits du laboratoire de chimie;
- mettre en place un site web qui permettra de voir graphiquement les données physiques récupérées, de gérer les produits chimiques et qui permettra aussi de gérer le droit d'accès au labo et au site web.
## Base de données
Ma base de données “ labo_chimie ” est composée de 3 tables :
- la table « measures » contient les libellés des mesures récupérées par les capteurs leurs valeurs et l’heure à laquelle elles ont été envoyées.
- La table « user » contient l’e-mail, le nom, les mots de passes, leur autorisation d’accès des professeurs et la date de la dernière fois qu’ils se sont connectés.
- La table « produits chimiques » contient les informations relatives aux produits chimiques tels que le nom la formule chimique la masse molaire la concentration molaire et massique la masse le volume la quantité disponible sa durée de conservation sa date de commande ainsi que le fournisseur.
## Le site web
Il comprend deux parties : une partie pour les professeurs et une partie pour l’administrateur.
### Page des mesures
- Cette page permet aux professeurs de voir les données physiques de l’armoire chimique et de la salle de cours.
### Page des produits
#### Côté utilisateurs
- Les professeurs ont la possibilité de voir les produits présents dans l’armoire chimique, leur quantité et les détails de chacun d’eux depuis cette interface.

#### Côté administrateur
##### Panier et export commande

- L’administrateur pourra ajouter dans le panier les produits qu'il voudrait commander pour ensuite l’exporter au format Excel

##### Mise à jour de la quantité des produits

- Après la commande de produits l'administrateur devra mettre à jour la base de données en important un fichier Excel avec le format indiqué sur la page
### Gestion des utilisateurs
- L’administrateur peut supprimer les utilisateurs et voir la date et l'heure d'accès au l’armoire.
