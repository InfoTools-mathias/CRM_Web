# CRW_Web
Documentation du CRW_Web !

## Contexte
Ce CRM a été développé pour pouvoir parvenir à traiter les données contenue dans la base de données/API.

# Base de Données :

|     Users     |            |
|:-------------:|:----------:|
|    **id**     | `string`   |
|   **name**    | `string`   |
| **surname**   | `string`   |
|   **mail**    | `string`   |
|   **type**    | `int`      |
| **password**  | `string`   |
| **meetings**  | Meeting[]  |
| **factures**  | Facture[]  |

`/users` **GET**, **POST**

`/users/{ID}` **GET**, **DELETE**, **PUT**

|   Products    |            |
|:-------------:|:----------:|
|    **id**     | `string`   |
|   **name**    | `string`   |
|   **price**   | `decimal`  |
| **quantity**  | `int`      |
|**description**| `string`   |
|**categories** | Categorie[]|

`/products` **GET**, **POST**

`/products/{ID}` **GET**, **DELETE**, **PUT**

|   Categorie   |            |
|:-------------:|:----------:|
|    **id**     | `string`   |
|   **name**    | `string`   |
| **products**  | Product[]  |

`/categories` **GET**, **POST**

`/categories/{ID}` **GET**, **DELETE**, **PUT**

|    Meeting    |            |
|:-------------:|:----------:|
|     **id**    | `string`   |
|    **date**   | `datetime` |
|    **zip**    | `decimal`  |
|   **adress**  | `string`   |
|   **users**   | Users[]    |

`/meetings` **GET**, **POST**

`/meetings/{ID}` **GET**, **DELETE**, **PUT**

|    Facture    |              |
|:-------------:|:------------:|
|     **id**    | `string`     |
|    **date**   | `datetime`   |
|   **lignes**  |LigneFacture[]|
|   **client**  | User[]       |
|  **clientId** | `string`     |

Une facture est composée de lignes (liste). Une ligne est un objet contenant les information de l'article acheté, sa quantité et le prix unitaire.

Il est important de créer la facture avant puis d'ajouter/créer des lignes après.

`/factures` **GET**, **POST**

`/factures/{ID}` **GET**, **DELETE**, **PUT**

`/factures/{ID}/lignes` **POST** *créer une ligne (:warning: créer la facture avant !)*

`/factures/{ID}/lignes/{LIGNE_ID}` **DELETE** (**PUT** actuellement non dev)

| LigneFacture  |            |
|:-------------:|:----------:|
|     **id**    | `string`   |
|  **product**  | `string`   |
|  **quantity** | `string`   |
|   **price**   | `decimal`  |
|  **facture**  | Facture[]  |

### Oauth

`/oauth/password` **POST** Permet de créer un token si l'email + MDP sont OK

🔒`/oauth/@me` **GET** Récupères les informations du compte auquel le token appartient

## Connexion
Pour accéder au site, une connexion est requise. Un système d'authentification avec token à durée temporaire est obligatoire lors de la connexion.
Après validation une redirection est effectué à la page centrale avec apercu sur les rendez-vous à venir.

## Fonctionnement
Après connexion, une deconnexion direct du site est possible.

Plusieurs pages sont à disposition :

- Une page permettant l'ajout, la modification et la suppression des produits dans l'API.
- Une page permettant la visualisation des clients et de leurs dernière(s) facture(s).
- Une page permettant la gestion des rendez-vous avec les clients.
