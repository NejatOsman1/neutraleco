<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('sr_Cyrl', array (
  'validators' => 
  array (
    'This value should be false.' => 'Вредност треба да буде нетачна.',
    'This value should be true.' => 'Вредност треба да буде тачна.',
    'This value should be of type {{ type }}.' => 'Вредност треба да буде типа {{ type }}.',
    'This value should be blank.' => 'Вредност треба да буде празна.',
    'The value you selected is not a valid choice.' => 'Вредност треба да буде једна од понуђених.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Изаберите бар {{ limit }} могућност.|Изаберите бар {{ limit }} могућности.|Изаберите бар {{ limit }} могућности.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Изаберите највише {{ limit }} могућност.|Изаберите највише {{ limit }} могућности.|Изаберите највише {{ limit }} могућности.',
    'One or more of the given values is invalid.' => 'Једна или више вредности је невалидна.',
    'This field was not expected.' => 'Ово поље није било очекивано.',
    'This field is missing.' => 'Ово поље недостаје.',
    'This value is not a valid date.' => 'Вредност није валидан датум.',
    'This value is not a valid datetime.' => 'Вредност није валидан датум-време.',
    'This value is not a valid email address.' => 'Вредност није валидна адреса електронске поште.',
    'The file could not be found.' => 'Датотека не може бити пронађена.',
    'The file is not readable.' => 'Датотека није читљива.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Датотека је превелика ({{ size }} {{ suffix }}). Највећа дозвољена величина је {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Миме тип датотеке није валидан ({{ type }}). Дозвољени миме типови су {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Вредност треба да буде {{ limit }} или мање.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Вредност је предугачка. Треба да има {{ limit }} карактер или мање.|Вредност је предугачка. Треба да има {{ limit }} карактера или мање.|Вредност је предугачка. Треба да има {{ limit }} карактера или мање.',
    'This value should be {{ limit }} or more.' => 'Вредност треба да буде {{ limit }} или више.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Вредност је прекратка. Треба да има {{ limit }} карактер или више.|Вредност је прекратка. Треба да има {{ limit }} карактера или више.|Вредност је прекратка. Треба да има {{ limit }} карактера или више.',
    'This value should not be blank.' => 'Вредност не треба да буде празна.',
    'This value should not be null.' => 'Вредност не треба да буде null.',
    'This value should be null.' => 'Вредност треба да буде null.',
    'This value is not valid.' => 'Вредност није валидна.',
    'This value is not a valid time.' => 'Вредност није валидно време.',
    'This value is not a valid URL.' => 'Вредност није валидан URL.',
    'The two values should be equal.' => 'Обе вредности треба да буду једнаке.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Датотека је превелика. Највећа дозвољена величина је {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Датотека је превелика.',
    'The file could not be uploaded.' => 'Датотека не може бити отпремљена.',
    'This value should be a valid number.' => 'Вредност треба да буде валидан број.',
    'This file is not a valid image.' => 'Ова датотека није валидна слика.',
    'This is not a valid IP address.' => 'Ово није валидна ИП адреса.',
    'This value is not a valid language.' => 'Вредност није валидан језик.',
    'This value is not a valid locale.' => 'Вредност није валидан локал.',
    'This value is not a valid country.' => 'Вредност није валидна земља.',
    'This value is already used.' => 'Вредност је већ искоришћена.',
    'The size of the image could not be detected.' => 'Величина слике не може бити одређена.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'Ширина слике је превелика ({{ width }}px). Најећа дозвољена ширина је {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'Ширина слике је премала ({{ width }}px). Најмања дозвољена ширина је {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'Висина слике је превелика ({{ height }}px). Најећа дозвољена висина је {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'Висина слике је премала ({{ height }}px). Најмања дозвољена висина је {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Вредност треба да буде тренутна корисничка лозинка.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Вредност треба да има тачно {{ limit }} карактер.|Вредност треба да има тачно {{ limit }} карактера.|Вредност треба да има тачно {{ limit }} карактера.',
    'The file was only partially uploaded.' => 'Датотека је само парцијално отпремљена.',
    'No file was uploaded.' => 'Датотека није отпремљена.',
    'No temporary folder was configured in php.ini.' => 'Привремени директоријум није конфигурисан у php.ini.',
    'Cannot write temporary file to disk.' => 'Немогуће писање привремене датотеке на диск.',
    'A PHP extension caused the upload to fail.' => 'PHP екстензија је проузроковала неуспех отпремања датотеке.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Ова колекција треба да садржи {{ limit }} или више елемената.|Ова колекција треба да садржи {{ limit }} или више елемената.|Ова колекција треба да садржи {{ limit }} или више елемената.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Ова колекција треба да садржи {{ limit }} или мање елемената.|Ова колекција треба да садржи {{ limit }} или мање елемената.|Ова колекција треба да садржи {{ limit }} или мање елемената.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Ова колекција треба да садржи тачно {{ limit }} елемент.|Ова колекција треба да садржи тачно {{ limit }} елемента.|Ова колекција треба да садржи тачно {{ limit }} елемената.',
    'Invalid card number.' => 'Невалидан број картице.',
    'Unsupported card type or invalid card number.' => 'Невалидан број картице или тип картице није подржан.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Ово није валидан међународни број банковног рачуна (IBAN).',
    'This value is not a valid ISBN-10.' => 'Ово није валидан ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Ово није валидан ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Ово није валидан ISBN-10 или ISBN-13.',
    'This value is not a valid ISSN.' => 'Ово није валидан ISSN.',
    'This value is not a valid currency.' => 'Ово није валидна валута.',
    'This value should be equal to {{ compared_value }}.' => 'Ова вредност треба да буде {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Ова вредност треба да буде већа од {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Ова вредност треба да буде већа или једнака {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Ова вредност треба да буде идентична са {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Ова вредност треба да буде мања од {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Ова вредност треба да буде мања или једнака {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Ова вредност не треба да буде једнака {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Ова вредност не треба да буде идентична са {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Размера ове слике је превелика ({{ ratio }}). Максимална дозвољена размера је {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Размера ове слике је премала ({{ ratio }}). Минимална очекивана размера је {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'Слика је квадратна ({{ width }}x{{ height }}px). Квадратне слике нису дозвољене.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'Слика је оријентације пејзажа ({{ width }}x{{ height }}px). Пејзажна оријентација слика није дозвољена.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'Слика је оријантације портрета ({{ width }}x{{ height }}px). Портретна оријентација слика није дозвољена.',
    'An empty file is not allowed.' => 'Празна датотека није дозвољена.',
    'The host could not be resolved.' => 'Име хоста не може бити разрешено.',
    'This value does not match the expected {{ charset }} charset.' => 'Вредност се не поклапа са очекиваним {{ charset }} сетом карактера.',
    'This is not a valid Business Identifier Code (BIC).' => 'Ово није валидан међународни идентификацијски код банке (BIC).',
    'Error' => 'Грешка',
    'This is not a valid UUID.' => 'Ово није валидан универзални уникатни идентификатор (UUID).',
    'This value should be a multiple of {{ compared_value }}.' => 'Ова вредност би требало да буде дељива са {{ compared_value }}.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'BIC код није повезан са IBAN {{ iban }}.',
    'This value should be valid JSON.' => 'Ова вредност би требало да буде валидан JSON.',
    'This collection should contain only unique elements.' => 'Ова колекција би требала да садржи само јединствене елементе.',
    'This value should be positive.' => 'Ова вредност би требала бити позитивна.',
    'This value should be either positive or zero.' => 'Ова вредност би требала бити позитивна или нула.',
    'This value should be negative.' => 'Ова вредност би требала бити негативна.',
    'This value should be either negative or zero.' => 'Ова вредност би требала бити позитивна или нула.',
    'This value is not a valid timezone.' => 'Ова вредност није валидна временска зона.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'Ова лозинка је компромитована приликом претходних напада, немојте је користити. Користите другу лозинку.',
    'This value should be between {{ min }} and {{ max }}.' => 'Ова вредност треба да буде између {{ min }} и {{ max }}.',
    'This value is not a valid hostname.' => 'Ова вредност није исправно име хоста.',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'Број елемената у овој колекцији би требало да буде дељив са {{ compared_value }}.',
    'This value should satisfy at least one of the following constraints:' => 'Ова вредност би требало да задовољава најмање једно од наредних ограничења:',
    'Each element of this collection should satisfy its own set of constraints.' => 'Сваки елемент ове колекције би требало да задовољи сопствени скуп ограничења.',
    'This value is not a valid International Securities Identification Number (ISIN).' => 'Ова вредност није исправна међународна идентификациона ознака хартија од вредности (ISIN).',
    'This value should be a valid expression.' => 'Ова вредност треба да буде валидан израз.',
    'This value is not a valid CSS color.' => 'Ова вредност није исправна CSS боја.',
    'This value is not a valid CIDR notation.' => 'Ова вредност није исправна CIDR нотација.',
    'The value of the netmask should be between {{ min }} and {{ max }}.' => 'Вредност мрежне маске треба бити између {{ min }} и {{ max }}.',
    'This form should not contain extra fields.' => 'Овај формулар не треба да садржи додатна поља.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Отпремљена датотека је била превелика. Молим покушајте отпремање мање датотеке.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'CSRF вредност није исправна. Покушајте поново.',
    'This value is not a valid HTML5 color.' => 'Ова вредност није исправна HTML5 боја.',
    'Please enter a valid birthdate.' => 'Молим упишите исправан датум рођења.',
    'The selected choice is invalid.' => 'Одабрани избор није исправан.',
    'The collection is invalid.' => 'Ова колекција није исправна.',
    'Please select a valid color.' => 'Молим изаберите исправну боју.',
    'Please select a valid country.' => 'Молим изаберите исправну државу.',
    'Please select a valid currency.' => 'Молим изаберите исправну валуту.',
    'Please choose a valid date interval.' => 'Молим изаберите исправан датумски интервал.',
    'Please enter a valid date and time.' => 'Молим упишите исправан датум и време.',
    'Please enter a valid date.' => 'Молим упишите исправан датум.',
    'Please select a valid file.' => 'Молим изаберите исправну датотеку.',
    'The hidden field is invalid.' => 'Скривено поље није исправно.',
    'Please enter an integer.' => 'Молим упишите цео број (integer).',
    'Please select a valid language.' => 'Молим изаберите исправан језик.',
    'Please select a valid locale.' => 'Молим изаберите исправну локализацију.',
    'Please enter a valid money amount.' => 'Молим упишите исправну количину новца.',
    'Please enter a number.' => 'Молим упишите број.',
    'The password is invalid.' => 'Ова лозинка није исправна.',
    'Please enter a percentage value.' => 'Молим упишите процентуалну вредност.',
    'The values do not match.' => 'Дате вредности се не поклапају.',
    'Please enter a valid time.' => 'Молим упишите исправно време.',
    'Please select a valid timezone.' => 'Молим изаберите исправну временску зону.',
    'Please enter a valid URL.' => 'Молим упишите исправан URL.',
    'Please enter a valid search term.' => 'Молим упишите исправан термин за претрагу.',
    'Please provide a valid phone number.' => 'Молим наведите исправан број телефона.',
    'The checkbox has an invalid value.' => 'Поље за потврду садржи неисправну вредност.',
    'Please enter a valid email address.' => 'Молим упишите исправну email адресу.',
    'Please select a valid option.' => 'Молим изаберите исправну опцију.',
    'Please select a valid range.' => 'Молим изаберите исправан опсег.',
    'Please enter a valid week.' => 'Молим упишите исправну седмицу.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Изузетак при аутентификацији.',
    'Authentication credentials could not be found.' => 'Аутентификациони подаци нису пронађени.',
    'Authentication request could not be processed due to a system problem.' => 'Захтев за аутентификацију не може бити обрађен због системских проблема.',
    'Invalid credentials.' => 'Невалидни подаци за аутентификацију.',
    'Cookie has already been used by someone else.' => 'Колачић је већ искоришћен од стране неког другог.',
    'Not privileged to request the resource.' => 'Немате права приступа овом ресурсу.',
    'Invalid CSRF token.' => 'Невалидан CSRF токен.',
    'No authentication provider found to support the authentication token.' => 'Аутентификациони провајдер за подршку токена није пронађен.',
    'No session available, it either timed out or cookies are not enabled.' => 'Сесија није доступна, истекла је или су колачићи искључени.',
    'No token could be found.' => 'Токен не може бити пронађен.',
    'Username could not be found.' => 'Корисничко име не може бити пронађено.',
    'Account has expired.' => 'Налог је истекао.',
    'Credentials have expired.' => 'Подаци за аутентификацију су истекли.',
    'Account is disabled.' => 'Налог је онемогућен.',
    'Account is locked.' => 'Налог је закључан.',
    'Too many failed login attempts, please try again later.' => 'Превише неуспешних покушаја пријављивања, молим покушајте поново касније.',
    'Invalid or expired login link.' => 'Линк за пријављивање је истекао или је неисправан.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Превише неуспешних покушаја пријављивања, молим покушајте поново за %minutes% минут.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Превише неуспешних покушаја пријављивања, молим покушајте поново за %minutes% минута.',
  ),
));

$catalogueSr = new MessageCatalogue('sr', array (
));
$catalogue->addFallbackCatalogue($catalogueSr);
$catalogueNl = new MessageCatalogue('nl', array (
  'validators' => 
  array (
    'This value should be false.' => 'Deze waarde moet onwaar zijn.',
    'This value should be true.' => 'Deze waarde moet waar zijn.',
    'This value should be of type {{ type }}.' => 'Deze waarde moet van het type {{ type }} zijn.',
    'This value should be blank.' => 'Deze waarde moet leeg zijn.',
    'The value you selected is not a valid choice.' => 'De geselecteerde waarde is geen geldige optie.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Selecteer ten minste {{ limit }} optie.|Selecteer ten minste {{ limit }} opties.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Selecteer maximaal {{ limit }} optie.|Selecteer maximaal {{ limit }} opties.',
    'One or more of the given values is invalid.' => 'Eén of meer van de ingegeven waarden zijn ongeldig.',
    'This field was not expected.' => 'Dit veld werd niet verwacht.',
    'This field is missing.' => 'Dit veld ontbreekt.',
    'This value is not a valid date.' => 'Deze waarde is geen geldige datum.',
    'This value is not a valid datetime.' => 'Deze waarde is geen geldige datum en tijd.',
    'This value is not a valid email address.' => 'Deze waarde is geen geldig e-mailadres.',
    'The file could not be found.' => 'Het bestand kon niet gevonden worden.',
    'The file is not readable.' => 'Het bestand is niet leesbaar.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Het bestand is te groot ({{ size }} {{ suffix }}). Toegestane maximum grootte is {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Het mime type van het bestand is ongeldig ({{ type }}). Toegestane mime types zijn {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Deze waarde moet {{ limit }} of minder zijn.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Deze waarde is te lang. Hij mag maximaal {{ limit }} teken bevatten.|Deze waarde is te lang. Hij mag maximaal {{ limit }} tekens bevatten.',
    'This value should be {{ limit }} or more.' => 'Deze waarde moet {{ limit }} of meer zijn.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Deze waarde is te kort. Hij moet tenminste {{ limit }} teken bevatten.|Deze waarde is te kort. Hij moet tenminste {{ limit }} tekens bevatten.',
    'This value should not be blank.' => 'Deze waarde mag niet leeg zijn.',
    'This value should not be null.' => 'Deze waarde mag niet null zijn.',
    'This value should be null.' => 'Deze waarde moet null zijn.',
    'This value is not valid.' => 'Deze waarde is niet geldig.',
    'This value is not a valid time.' => 'Deze waarde is geen geldige tijd.',
    'This value is not a valid URL.' => 'Deze waarde is geen geldige URL.',
    'The two values should be equal.' => 'De twee waarden moeten gelijk zijn.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Het bestand is te groot. Toegestane maximum grootte is {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Het bestand is te groot.',
    'The file could not be uploaded.' => 'Het bestand kon niet worden geüpload.',
    'This value should be a valid number.' => 'Deze waarde moet een geldig getal zijn.',
    'This file is not a valid image.' => 'Dit bestand is geen geldige afbeelding.',
    'This is not a valid IP address.' => 'Dit is geen geldig IP-adres.',
    'This value is not a valid language.' => 'Deze waarde is geen geldige taal.',
    'This value is not a valid locale.' => 'Deze waarde is geen geldige locale.',
    'This value is not a valid country.' => 'Deze waarde is geen geldig land.',
    'This value is already used.' => 'Deze waarde wordt al gebruikt.',
    'The size of the image could not be detected.' => 'De grootte van de afbeelding kon niet bepaald worden.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'De afbeelding is te breed ({{ width }}px). De maximaal toegestane breedte is {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'De afbeelding is niet breed genoeg ({{ width }}px). De minimaal verwachte breedte is {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'De afbeelding is te hoog ({{ height }}px). De maximaal toegestane hoogte is {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'De afbeelding is niet hoog genoeg ({{ height }}px). De minimaal verwachte hoogte is {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Deze waarde moet het huidige wachtwoord van de gebruiker zijn.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Deze waarde moet exact {{ limit }} teken lang zijn.|Deze waarde moet exact {{ limit }} tekens lang zijn.',
    'The file was only partially uploaded.' => 'Het bestand is slechts gedeeltelijk geüpload.',
    'No file was uploaded.' => 'Er is geen bestand geüpload.',
    'No temporary folder was configured in php.ini.' => 'Er is geen tijdelijke map geconfigureerd in php.ini, of de gespecificeerde map bestaat niet.',
    'Cannot write temporary file to disk.' => 'Kan het tijdelijke bestand niet wegschrijven op disk.',
    'A PHP extension caused the upload to fail.' => 'De upload is mislukt vanwege een PHP-extensie.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Deze collectie moet {{ limit }} element of meer bevatten.|Deze collectie moet {{ limit }} elementen of meer bevatten.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Deze collectie moet {{ limit }} element of minder bevatten.|Deze collectie moet {{ limit }} elementen of minder bevatten.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Deze collectie moet exact {{ limit }} element bevatten.|Deze collectie moet exact {{ limit }} elementen bevatten.',
    'Invalid card number.' => 'Ongeldig creditcardnummer.',
    'Unsupported card type or invalid card number.' => 'Niet-ondersteund type creditcard of ongeldig nummer.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Dit is geen geldig internationaal bankrekeningnummer (IBAN).',
    'This value is not a valid ISBN-10.' => 'Deze waarde is geen geldige ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Deze waarde is geen geldige ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Deze waarde is geen geldige ISBN-10 of ISBN-13 waarde.',
    'This value is not a valid ISSN.' => 'Deze waarde is geen geldige ISSN waarde.',
    'This value is not a valid currency.' => 'Deze waarde is geen geldige valuta.',
    'This value should be equal to {{ compared_value }}.' => 'Deze waarde moet gelijk zijn aan {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Deze waarde moet groter zijn dan {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Deze waarde moet groter dan of gelijk aan {{ compared_value }} zijn.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Deze waarde moet identiek zijn aan {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Deze waarde moet minder zijn dan {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Deze waarde moet minder dan of gelijk aan {{ compared_value }} zijn.',
    'This value should not be equal to {{ compared_value }}.' => 'Deze waarde mag niet gelijk zijn aan {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Deze waarde mag niet identiek zijn aan {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'De afbeeldingsverhouding is te groot ({{ ratio }}). Maximale verhouding is {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'De afbeeldingsverhouding is te klein ({{ ratio }}). Minimale verhouding is {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'De afbeelding is vierkant ({{ width }}x{{ height }}px). Vierkante afbeeldingen zijn niet toegestaan.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'De afbeelding is liggend ({{ width }}x{{ height }}px). Liggende afbeeldingen zijn niet toegestaan.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'De afbeelding is staand ({{ width }}x{{ height }}px). Staande afbeeldingen zijn niet toegestaan.',
    'An empty file is not allowed.' => 'Lege bestanden zijn niet toegestaan.',
    'The host could not be resolved.' => 'De hostnaam kon niet worden bepaald.',
    'This value does not match the expected {{ charset }} charset.' => 'Deze waarde is niet in de verwachte tekencodering {{ charset }}.',
    'This is not a valid Business Identifier Code (BIC).' => 'Dit is geen geldige bedrijfsidentificatiecode (BIC/SWIFT).',
    'Error' => 'Fout',
    'This is not a valid UUID.' => 'Dit is geen geldige UUID.',
    'This value should be a multiple of {{ compared_value }}.' => 'Deze waarde zou een meervoud van {{ compared_value }} moeten zijn.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'Deze bedrijfsidentificatiecode (BIC) is niet gekoppeld aan IBAN {{ iban }}.',
    'This value should be valid JSON.' => 'Deze waarde moet geldige JSON zijn.',
    'This collection should contain only unique elements.' => 'Deze collectie moet alleen unieke elementen bevatten.',
    'This value should be positive.' => 'Deze waarde moet positief zijn.',
    'This value should be either positive or zero.' => 'Deze waarde moet positief of gelijk aan nul zijn.',
    'This value should be negative.' => 'Deze waarde moet negatief zijn.',
    'This value should be either negative or zero.' => 'Deze waarde moet negatief of gelijk aan nul zijn.',
    'This value is not a valid timezone.' => 'Deze waarde is geen geldige tijdzone.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'Dit wachtwoord is gelekt vanwege een data-inbreuk, het moet niet worden gebruikt. Kies een ander wachtwoord.',
    'This value should be between {{ min }} and {{ max }}.' => 'Deze waarde moet zich tussen {{ min }} en {{ max }} bevinden.',
    'This value is not a valid hostname.' => 'Deze waarde is geen geldige hostnaam.',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'Het aantal elementen van deze collectie moet een veelvoud zijn van {{ compared_value }}.',
    'This value should satisfy at least one of the following constraints:' => 'Deze waarde moet voldoen aan tenminste een van de volgende voorwaarden:',
    'Each element of this collection should satisfy its own set of constraints.' => 'Elk element van deze collectie moet voldoen aan zijn eigen set voorwaarden.',
    'This value is not a valid International Securities Identification Number (ISIN).' => 'Deze waarde is geen geldig International Securities Identification Number (ISIN).',
    'This value should be a valid expression.' => 'Deze waarde moet een geldige expressie zijn.',
    'This value is not a valid CSS color.' => 'Deze waarde is geen geldige CSS kleur.',
    'This value is not a valid CIDR notation.' => 'Deze waarde is geen geldige CIDR notatie.',
    'The value of the netmask should be between {{ min }} and {{ max }}.' => 'De waarde van de netmask moet zich tussen {{ min }} en {{ max }} bevinden.',
    'This form should not contain extra fields.' => 'Dit formulier mag geen extra velden bevatten.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Het geüploade bestand is te groot. Probeer een kleiner bestand te uploaden.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'De CSRF-token is ongeldig. Probeer het formulier opnieuw te versturen.',
    'This value is not a valid HTML5 color.' => 'Dit is geen geldige HTML5 kleur.',
    'Please enter a valid birthdate.' => 'Vul een geldige geboortedatum in.',
    'The selected choice is invalid.' => 'Deze keuze is ongeldig.',
    'The collection is invalid.' => 'Deze collectie is ongeldig.',
    'Please select a valid color.' => 'Kies een geldige kleur.',
    'Please select a valid country.' => 'Kies een geldige landnaam.',
    'Please select a valid currency.' => 'Kies een geldige valuta.',
    'Please choose a valid date interval.' => 'Kies een geldig tijdinterval.',
    'Please enter a valid date and time.' => 'Vul een geldige datum en tijd in.',
    'Please enter a valid date.' => 'Vul een geldige datum in.',
    'Please select a valid file.' => 'Kies een geldig bestand.',
    'The hidden field is invalid.' => 'Het verborgen veld is incorrect.',
    'Please enter an integer.' => 'Vul een geldig getal in.',
    'Please select a valid language.' => 'Kies een geldige taal.',
    'Please select a valid locale.' => 'Kies een geldige locale.',
    'Please enter a valid money amount.' => 'Vul een geldig bedrag in.',
    'Please enter a number.' => 'Vul een geldig getal in.',
    'The password is invalid.' => 'Het wachtwoord is incorrect.',
    'Please enter a percentage value.' => 'Vul een geldig percentage in.',
    'The values do not match.' => 'De waardes komen niet overeen.',
    'Please enter a valid time.' => 'Vul een geldige tijd in.',
    'Please select a valid timezone.' => 'Vul een geldige tijdzone in.',
    'Please enter a valid URL.' => 'Vul een geldige URL in.',
    'Please enter a valid search term.' => 'Vul een geldige zoekterm in.',
    'Please provide a valid phone number.' => 'Vul een geldig telefoonnummer in.',
    'The checkbox has an invalid value.' => 'De checkbox heeft een incorrecte waarde.',
    'Please enter a valid email address.' => 'Vul een geldig e-mailadres in.',
    'Please select a valid option.' => 'Kies een geldige optie.',
    'Please select a valid range.' => 'Kies een geldig bereik.',
    'Please enter a valid week.' => 'Vul een geldige week in.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Er heeft zich een authenticatieprobleem voorgedaan.',
    'Authentication credentials could not be found.' => 'Authenticatiegegevens konden niet worden gevonden.',
    'Authentication request could not be processed due to a system problem.' => 'Authenticatieaanvraag kon niet worden verwerkt door een technisch probleem.',
    'Invalid credentials.' => 'Ongeldige inloggegevens.',
    'Cookie has already been used by someone else.' => 'Cookie is al door een ander persoon gebruikt.',
    'Not privileged to request the resource.' => 'Onvoldoende rechten om de aanvraag te verwerken.',
    'Invalid CSRF token.' => 'CSRF-code is ongeldig.',
    'No authentication provider found to support the authentication token.' => 'Geen authenticatieprovider gevonden die de authenticatietoken ondersteunt.',
    'No session available, it either timed out or cookies are not enabled.' => 'Geen sessie beschikbaar, mogelijk is deze verlopen of cookies zijn uitgeschakeld.',
    'No token could be found.' => 'Er kon geen authenticatietoken worden gevonden.',
    'Username could not be found.' => 'Gebruikersnaam kon niet worden gevonden.',
    'Account has expired.' => 'Account is verlopen.',
    'Credentials have expired.' => 'Authenticatiegegevens zijn verlopen.',
    'Account is disabled.' => 'Account is gedeactiveerd.',
    'Account is locked.' => 'Account is geblokkeerd.',
    'Too many failed login attempts, please try again later.' => 'Te veel onjuiste inlogpogingen, probeer het later nogmaals.',
    'Invalid or expired login link.' => 'Ongeldige of verlopen inloglink.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Te veel onjuiste inlogpogingen, probeer het opnieuw over %minutes% minuut.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Te veel onjuiste inlogpogingen, probeer het opnieuw over %minutes% minuten.',
  ),
  'FOSOAuthServerBundle' => 
  array (
    'authorize.accept' => 'Toestaan',
    'authorize.reject' => 'Weigeren',
  ),
  'SchebTwoFactorBundle' => 
  array (
    'auth_code' => 'Authenticatiecode',
    'choose_provider' => 'Kies een andere authenticatiemethode',
    'login' => 'Login',
    'code_invalid' => 'De verificatiecode is niet geldig.',
    'trusted' => 'Ik gebruik een vertrouwde computer',
    'cancel' => 'Annuleren',
  ),
));
$catalogueSr->addFallbackCatalogue($catalogueNl);

return $catalogue;
