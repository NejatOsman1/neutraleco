## Versie 2.1.2

<span style="color:#aaa">**Release:** 30 Maart 2020</span>

- Reactie overzicht, ga beter om met missende sessies (kan geen datum getoond worden)

## Versie 2.1.1

<span style="color:#aaa">**Release:** 6 Maart 2020</span>

# Algemeen

- Gebruik twig raw filter, zodat "," gebruikt wordt ipv "&comma;" in velden.
- Multisite gebruiker restricties.

## Versie 2.1.0

<span style="color:#aaa">**Release:** 13 Feb 2020</span>

- Admin vertalingen

## Versie 2.0.1

<span style="color:#aaa">**Release:** 19 Dec 2019</span>

- delete knop en breadcrumb fixes.

## Versie 2.0.0

- Trinity v2 design

## Versie 1.7.0

- Multisite support
- Dynamische metadata support
- Formulieren kunnen niet verwijderd worden als die gekoppeld zijn.
- Optie voor interne mail om replyto veld in te vullen.
- Optie om klant naam in interne mail afzendernaam te gebruiken ipv systeem ingestelde naam.

## Versie 1.5.0

- IP-adressen worden bijgehouden.
- Upload map wordt dynamisch bepaald.
- Diverse bugs opgelost.
- Geen verplichting op verborgen velden.
- Wanneer een formulier wordt verstuurd, scrollen naar het formulier indien deze onderaan een pagina staat.
- Antwoorden worden in een aparte tab getoond zodra het formulier wordt bewerkt.

## Versie 1.2.3

- Standaard verberg de formulier clear knop
- Voeg canvas element toe
- Laat het ```| email``` in select boxen niet meer zien op de website (ivm ruimte), dit is alleen een zichtbaarheids verandering.
- Als selectiebox "werkplaats" in het geselecteerde antwoord heeft wordt de LEF leadtype op ```aftersales``` gezet (kreijne only).

## Versie 1.2.2

- Ondersteuning voor het kunnen verwijderen van reacties.

## Versie 1.2.1

- Vergelijk alle woorden uit de vestigings string, met de lef locatie string. Let op dat woorden die je niet wilt matchen niet in de Formulier opties terug komen.

## Versie 1.2.0

- Verbetered LEF support, ondersteunt nu meerdere locaties.
- Newsletter support

## Versie 1.1.0

- Formulieren bundel herontwerp uit de ontwikkelbranch gemerged

## Versie 1.0.2 (voorheen 1.0.1)

- Verstuur mails via "force" zodat deze altijd verstuurd worden.
- Checkbox validatie. Zodat niet alle checkboxen aangezet moeten worden om het formulier te versturen.

# LEF

- Gebaseerd op wensen van Renses. Formulier wordt manueel vertaalt op Vraag titel naar LEF velden.
- Als de ExtensionsBundle is geinstalleerd kan de FormsBundle de gegevens doorzetten naar LEF. LEF moet wel globaal aangezet zijn en LEF support in het formulier moet bij het linken aangezet zijn.
- Doorgeven van checkboxen aan LEF volgens het volgende formaat: "Opties: OptieA; OptieB geselecteerd".

# Recaptcha

- Don't supply text to getGoogleRecaptchaWidget(), allow CmsBundle global to dictate if it is needed or not.

## Versie 1.0.0

- Late initial release version based on `oldstable`, next version is back based on `master`

