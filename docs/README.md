# Les bons comptes font les bons services

Vous êtes en charge du développement d'un site de e-commerce qui vend des figurines de collection. Toutes les transactions du site se font en euros (€). Mais comme les collectionneurs sont plus habitués au prix en dollars ($) ou en yens (¥), le site doit présenter ses prix dans ces deux devises en prenant en compte leur cours le plus actuel.

Seul le prix des produits en euros est saisi en base de données il faudra donc le convertir au moment d'afficher les prix sur la page de détails d'un produit.

## Contraintes
Pour réaliser votre conversion, vous utiliserez l'API suivante : <a href="https://www.exchangerate-api.com/" target="_blank">Exchange Rate API</a>

*Vous devrez vous enregistrer sur le site pour obtenir une clé d'API*

## Préparez votre catalogue

Commencez par cloner ce dépôt et lancer l'ensemble des commandes nécessaires pour démarrer le projet (yarn, composer, BDD, etc.).  
Des fixtures sont déjà en place pour préparer votre catalogue, pensez donc bien à les charger également.

## Convertir les différentes devises dans la vue de détail d'un produit

Créer un Service, qui contiendra une fonction `convertEurToDollar(float $euroPrice): float`. 
Cette fonction prendra en paramètre un prix en `euros` et renverra un prix en `dollar`, en utilisant l'API de conversion. <a href="https://www.exchangerate-api.com/docs/pair-conversion-requests" target="_blank">Documentation</a>.

>Rappel : afin de faire appel à cette API vous disposez de l'outil <a href="https://symfony.com/doc/current/http_client.html" target=_blank>HttpClient</a>. 
La bonne nouvelle est que HttpClient est un service déjà présent dans le service container de Symfony, tu peux le réclamer par injection en utilisant la technique présente dans ton cours 🤓.

Faire ensuite une fonction similaire pour convertir en yen.

## Afficher les informations

Une fois le service créé, appelez-le dans le contrôleur `ProducController` pour obtenir les deux prix convertis et transmettez le tout à la vue twig dans les deux paramètres prévus à cet effet.
