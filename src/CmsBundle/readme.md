# Trinity

[TOC]

## Features

* Page management
* Version management
* User management
* Image with filters
* Settings

## Custom error pages

From Trinity 1.2.0 and higher custom error pages are available. The following steps need to be followed:

1. Delete or rename the `app/Resources/TwigBundle` folder.
2. Clear cache forced `rm -rf var/cache/prod/* var/cache/dev/*`

Right now, if you go to an non-existing page, the 404 page will show with no content. The layout is now based on the homepage.

To have a custom layout or another layout from a sub page or so, create a page in trinity called `error` and give this page the desired template, this will overrule the default homepage template for the error page.

To manage the texts, to to the Configuration and to 'Error pages', here you have the freedom to add every text you want.

The following error types are available:

- **Page not found**
  The page does not exist (like adding random garbage in the URL).
- **No access**
  When a user has no access to something, like a blocked page.
- **System error**
  The 500 error page.

## User permissions

**Bitwise, 32 bit - max 32 permissions.**

| **OPERATOR** | KEY            | PERMISSION            |
| ------------ | --------------------- | --------------------- |
| 1            | ALLOW_PAGE       | Page management       |
| 2            | ALLOW_NAVIGATION | Navigation management |
| 4            | ALLOW_MEDIA      | Media management      |
| 8           | ALLOW_ANALYTICS              | Analytics             |
| 16           | ALLOW_USERS                  | Users                 |
| 32           | ALLOW_CONFIGURATION          | Configuration         |
| 64          | ALLOW_BUNDLES     | Bundle management     |
| 128         | ALLOW_PROFILE        | Change profile        |
| 256         | ALLOW_REDIRECTS        | Redirects beheren        |
| 512         | ALLOW_SITE_SWITCHING        | Multi-site wisselen       |
| 1024         | ALLOW_DASHBOARD        | Dashboard       |

## E-commerce permissions

**Bitwise, 32 bit - max 32 permissions.**

| **OPERATOR** | KEY            | PERMISSION            |
| ------------ | --------------------- | --------------------- |
| 1 | ECOMM_DASHBOARD | Dashboard statistieken |
| 2 | ECOMM_SALES | Bestellingen kunnen inzien |
| 4 | ECOMM_PRODUCTS | Producten kunnen beheren |
| 8 | ECOMM_CATEGORIES | Categorieën kunnen beheren |
| 16 | ECOMM_CUSTOMERS | Klanten kunnen inzien en beheren |
| 32 | ECOMM_CARTS | Winkelwagens beheren |
| 64 | ECOMM_PROMOTIONS | Korting codes en acties beheren |
| 128 | ECOMM_REVIEWS | Reviews modereren en inzien |
| 256 | ECOMM_REPORTS | Rapportages kunnen draaien |
| 512 | ECOMM_CONFIG | Globale configuratie |
| 1024 | ECOMM_SYSTEM | Systeem acties |

### Generate bitwise permission value

Sum all wanted permissions, for example: `ALLOW_PAGE` + `ALLOW_CONFIGURATION` + `ALLOW_BUNDLES` + `ALLOW_PROFILE`:
The total bitwise sum would be: `4418` (`2` + `64` + `256` + `4096`)

### Bitwise matching example

```php
if((1928 & 64) > 0){
    // Has 'ALLOW_CONFIGURATION' access
}
```


