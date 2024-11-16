# Acceuil

## POST TYPE
### home

## MODÈLE
### home.php

## COMPOSANTES
### PARTIAL

#### service.php
##### CUSTOM FIELDS
- Title: text
- Description: text
- Card title: text (pour language)
- Card description: text (pour language)
- Text(button info): label


#### abonnement.php
##### CUSTOM FIELDS
- Title:text
- Subscription:email
- Text(button subscribe): label


#### membre.php
##### CUSTOM FIELDS
- Image
- Title:text
- Membre description: text
- Text(button membre): label


## AUTRES CUSTOM FIELDS
### Hero
- Hero description: text
- Slogan: text
- Span: text
- Swiper: gallery
- Text(button join): label
- Text(button info): label

### Recherche
- Description: text
- Search field: text area

### A propos
- Title: text
- Description: text
- Text(button about): label

### Actu
- Swiper: gallery

### Temoignage
- Title: text
- Undertitle: text
- Description: text
- Image

---------------

# 404

## POST TYPE
### errorPage

## MODÈLE
### 404.php

## COMPOSANTES
### PARTIAL
- Aucun

## AUTRES CUSTOM FIELDS
### Description: text
### Text(button): label

---------------

# Contact

## POST TYPE
### contact-us

## MODÈLE
### contact-us.php

## COMPOSANTES
### PARTIAL
#### abonnement.php
- Même chose que dans accueil
#### membre.php
- Même chose que dans accueil

## AUTRES CUSTOM FIELDS
- Title: text
- Undertitle(send message): text
- Undertitle(info): text
- Text area(name): label
- Contact email:label
- Text area(message): label
- Text(button contact):label

---------------

# À propos

## POST TYPE
### about

## MODÈLE
### about.php

## COMPOSANTES
### PARTIAL
#### heroBase.php
- Base hero title: text
- Base hero link: link

## AUTRES CUSTOM FIELDS
- Union: Title
- Union description: text
- Union span: text
- Group: title
- Statistic: text
- Group Description: text
- Mission: title
- Mission undertitle: text
- Mission description: text
---------------

# Article nouvelle
## POST TYPE
### news-article

## MODÈLE
### news-article.php

## COMPOSANTES
### PARTIAL
- heroBase.php

## AUTRES CUSTOM FIELDS
- Text(article Type): label
- Date
- Article undertitle: text
- Article: text
- Citation: text
- Link before: link
- Link after: link

---------------

# Liste nouvelles
## POST TYPE
### news-hub

## MODÈLE
### news-hub.php

## COMPOSANTE DE LA PAGES
### PARTIAL
#### heroBase.php

---------------

# Service
## POST TYPE
### service

## MODÈLE
### services.php

## COMPOSANTE DE LA PAGES
### PARTIAL
- heroBase.php
- service.php

## AUTRES CUSTOM FIELDS
- Service undertitle:text
- Service description:text
- Image

---------------

# Liste services
## POST TYPE
### services-hub

## MODÈLE
### services-hub.php

## COMPOSANTE DE LA PAGES
### PARTIAL
- heroBase.php
- abonnement.php
- membre.php


## AUTRES CUSTOM FIELDS
- Services undertitle: text
- Services description: text
- Swiper: gallery
- Link more rights: link

---------------

# Équipe
## POST TYPE
### team

## MODÈLE
### team.php

## COMPOSANTE DE LA PAGES
### PARTIAL
#### heroBase.php

## AUTRES CUSTOM FIELDS
### Modale
- Name: text
- Position: text
- Description: text
- Image
