# Projet 2021 Labo de chimie
**Aly, développement du site Web avec Symfony 4.4**
## Expression du besoin
Les professeurs de Physique-Chimie du lycée utilisent la même salle de classe et le même labo de chimie. Dans ce labo, les produits chimiques qui servent aux expériences sont stockés dans une armoire.
Il faut développer un système permettant de gérer les accès à l’armoire et de surveiller les paramètres physiques dans l’armoire, dans le labo et dans la salle de cours. Le projet consiste aussi à créer un site web permettant la gestion des produits et la visualisation graphique des données physiques.
L’objectif est donc de mettre en place un système avec les caractéristiques suivantes :
### Pour l’armoire de chimie :
- On mesure la Température, l’Hygrométrie, le Taux de CO², le niveau d’éclairement
- Il faut visualiser ces données en temps réel et par courbes historisées.historisées.historisées.
- Export des données en fichier csv, pour une période donnée
- Envoyer ces données à la base de données ainsi qu’au Raspberry Pi
### Pour la salle de cours :
- Il est intéressant de prendre aussi certaines mesures, peuvent influer sur les capacités d’apprentissage des élèves ainsi que sur la santé liée par exemple à la Covid 19
- On mesure la Température, l’Hygrométrie, le taux de Co², le taux de COV
- Il faut visualiser ces données sur un ordinateur à l’aide d’une interface homme-machine
- Envoyer ces données à la base de données ainsi qu’au Raspberry Pi
- L'enseignant présente sa carte sur un lecteur NFC, relié à l’armoire, et sécurisé par une gâche électrique :
  - La saisie des identifiants des enseignants se fait dans la base de données.
  - L’écriture des nouveaux enseignants autorisés
  - Ouverture de la gâche quand l’enseignant est autorisé.
### Gestion des produits
- Saisie des produits avec caractéristiques et quantités
- Mise à jour des quantités par import Excel
- Listing et exportations des produits à commander par format Excel
## Ma Mission
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
