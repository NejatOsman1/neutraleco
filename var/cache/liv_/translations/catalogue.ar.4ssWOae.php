<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('ar', array (
  'validators' => 
  array (
    'This value should be false.' => 'هذه القيمة يجب أن تكون خاطئة.',
    'This value should be true.' => 'هذه القيمة يجب أن تكون حقيقية.',
    'This value should be of type {{ type }}.' => 'هذه القيمة يجب ان تكون من نوع {{ type }}.',
    'This value should be blank.' => 'هذه القيمة يجب ان تكون فارغة.',
    'The value you selected is not a valid choice.' => 'القيمة المختارة ليست خيارا صحيحا.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'يجب ان تختار {{ limit }} اختيار على الاقل.|يجب ان تختار {{ limit }} اختيار على الاقل.|يجب ان تختار {{ limit }} اختيارات على الاقل.|يجب ان تختار {{ limit }} اختيار على الاقل.|يجب ان تختار {{ limit }} اختيار على الاقل.|يجب ان تختار {{ limit }} اختيار على الاقل.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'يجب ان تختار {{ limit }} اختيار على الاكثر.|يجب ان تختار {{ limit }} اختيار على الاكثر.|يجب ان تختار {{ limit }} اختيارات على الاكثر.|يجب ان تختار {{ limit }} اختيار على الاكثر.|يجب ان تختار {{ limit }} اختيار على الاكثر.|يجب ان تختار {{ limit }} اختيار على الاكثر.',
    'One or more of the given values is invalid.' => 'واحد أو أكثر من القيم المعطاه خاطئ.',
    'This field was not expected.' => 'لم يكن من المتوقع هذا المجال.',
    'This field is missing.' => 'هذا المجال مفقود.',
    'This value is not a valid date.' => 'هذه القيمة ليست تاريخا صالحا.',
    'This value is not a valid datetime.' => 'هذه القيمة ليست تاريخا و وقتا صالحا.',
    'This value is not a valid email address.' => 'هذه القيمة ليست عنوان بريد إلكتروني صحيح.',
    'The file could not be found.' => 'لا يمكن العثور على الملف.',
    'The file is not readable.' => 'الملف غير قابل للقراءة.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'الملف كبير جدا ({{ size }} {{ suffix }}).اقصى مساحه مسموح بها ({{ limit }} {{ suffix }}).',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'نوع الملف غير صحيح ({{ type }}). الانواع المسموح بها هى {{ types }}.',
    'This value should be {{ limit }} or less.' => 'هذه القيمة يجب ان تكون {{ limit }} او اقل.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'هذه القيمة طويلة جدا. يجب ان تكون {{ limit }} حرف او اقل.|هذه القيمة طويلة جدا. يجب ان تكون {{ limit }} حرف او اقل.|هذه القيمة طويلة جدا. يجب ان تكون {{ limit }} حروف او اقل.|هذه القيمة طويلة جدا. يجب ان تكون {{ limit }} حرف او اقل.|هذه القيمة طويلة جدا. يجب ان تكون {{ limit }} حرف او اقل.|هذه القيمة طويلة جدا. يجب ان تكون {{ limit }} حرف او اقل.',
    'This value should be {{ limit }} or more.' => 'هذه القيمة يجب ان تكون {{ limit }} او اكثر.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'هذه القيمة قصيرة جدا. يجب ان تكون {{ limit }} حرف او اكثر.|هذه القيمة قصيرة جدا. يجب ان تكون {{ limit }} حرف او اكثر.|هذه القيمة قصيرة جدا. يجب ان تكون {{ limit }} حروف او اكثر.|هذه القيمة قصيرة جدا. يجب ان تكون {{ limit }} حرف او اكثر.|هذه القيمة قصيرة جدا. يجب ان تكون {{ limit }} حرف او اكثر.|هذه القيمة قصيرة جدا. يجب ان تكون {{ limit }} حرف او اكثر.',
    'This value should not be blank.' => 'هذه القيمة يجب الا تكون فارغة.',
    'This value should not be null.' => 'هذه القيمة يجب الا تكون فارغة.',
    'This value should be null.' => 'هذه القيمة يجب ان تكون فارغة.',
    'This value is not valid.' => 'هذه القيمة غير صحيحة.',
    'This value is not a valid time.' => 'هذه القيمة ليست وقت صحيح.',
    'This value is not a valid URL.' => 'هذه القيمة ليست رابط الكترونى صحيح.',
    'The two values should be equal.' => 'القيمتان يجب ان تكونا متساويتان.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'الملف كبير جدا. اقصى مساحه مسموح بها {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'الملف كبير جدا.',
    'The file could not be uploaded.' => 'لم استطع استقبال الملف.',
    'This value should be a valid number.' => 'هذه القيمة يجب ان تكون رقم.',
    'This file is not a valid image.' => 'هذا الملف ليس صورة صحيحة.',
    'This is not a valid IP address.' => 'هذه القيمة ليست عنوان رقمى صحيح.',
    'This value is not a valid language.' => 'هذه القيمة ليست لغة صحيحة.',
    'This value is not a valid locale.' => 'هذه القيمة ليست موقع صحيح.',
    'This value is not a valid country.' => 'هذه القيمة ليست بلدا صالحا.',
    'This value is already used.' => 'هذه القيمة مستخدمة بالفعل.',
    'The size of the image could not be detected.' => 'لم استطع معرفة حجم الصورة.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'عرض الصورة كبير جدا ({{ width }}px). اقصى عرض مسموح به هو{{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'عرض الصورة صغير جدا ({{ width }}px). اقل عرض مسموح به هو{{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'طول الصورة كبير جدا ({{ height }}px). اقصى طول مسموح به هو{{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'طول الصورة صغير جدا ({{ height }}px). اقل طول مسموح به هو{{ min_height }}px.',
    'This value should be the user\'s current password.' => 'هذه القيمة يجب ان تكون كلمة سر المستخدم الحالية.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'هذه القيمة يجب ان تحتوى على {{ limit }} حرف فقط.|هذه القيمة يجب ان تحتوى على {{ limit }} حرف فقط.|هذه القيمة يجب ان تحتوى على {{ limit }} حروف فقط.|هذه القيمة يجب ان تحتوى على {{ limit }} حرف فقط.|هذه القيمة يجب ان تحتوى على {{ limit }} حرف فقط.|هذه القيمة يجب ان تحتوى على {{ limit }} حرف فقط.',
    'The file was only partially uploaded.' => 'تم استقبال جزء من الملف فقط.',
    'No file was uploaded.' => 'لم يتم ارسال اى ملف.',
    'No temporary folder was configured in php.ini.' => 'لم يتم تهيئة حافظة مؤقتة فى ملف php.ini.',
    'Cannot write temporary file to disk.' => 'لم استطع كتابة الملف المؤقت.',
    'A PHP extension caused the upload to fail.' => 'احد اضافات PHP تسببت فى فشل استقبال الملف.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اكثر.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اكثر.|هذه المجموعة يجب ان تحتوى على {{ limit }} عناصر او اكثر.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اكثر.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اكثر.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اكثر.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اقل.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اقل.|هذه المجموعة يجب ان تحتوى على {{ limit }} عناصر او اقل.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اقل.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اقل.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر او اقل.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر فقط.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر فقط.|هذه المجموعة يجب ان تحتوى على {{ limit }} عناصر فقط.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر فقط.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر فقط.|هذه المجموعة يجب ان تحتوى على {{ limit }} عنصر فقط.',
    'Invalid card number.' => 'رقم البطاقه غير صحيح.',
    'Unsupported card type or invalid card number.' => 'نوع البطاقه غير مدعوم او الرقم غير صحيح.',
    'This is not a valid International Bank Account Number (IBAN).' => 'الرقم IBAN (رقم الحساب المصرفي الدولي) الذي تم إدخاله غير صالح.',
    'This value is not a valid ISBN-10.' => 'هذه القيمة ليست ISBN-10 صالحة.',
    'This value is not a valid ISBN-13.' => 'هذه القيمة ليست ISBN-13 صالحة.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'هذه القيمة ليست ISBN-10 صالحة ولا ISBN-13 صالحة.',
    'This value is not a valid ISSN.' => 'هذه القيمة ليست ISSN صالحة.',
    'This value is not a valid currency.' => 'العُملة غير صحيحة.',
    'This value should be equal to {{ compared_value }}.' => 'القيمة يجب ان تساوي {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'القيمة يجب ان تكون اعلي من {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'القيمة يجب ان تكون مساوية او اعلي من {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'القيمة يجب ان تطابق {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'القيمة يجب ان تكون اقل من {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'القيمة يجب ان تساوي او تقل عن {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'القيمة يجب ان لا تساوي {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'القيمة يجب ان لا تطابق {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'نسبة العرض على الارتفاع للصورة كبيرة جدا ({{ ratio }}). الحد الأقصى للنسبة المسموح به هو {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'نسبة العرض على الارتفاع للصورة صغيرة جدا ({{ ratio }}). الحد الأدنى للنسبة المسموح به هو {{ max_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'الصورة مربعة ({{ width }}x{{ height }}px). الصور المربعة غير مسموح بها.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'الصورة في وضع أفقي ({{ width }}x{{ height }}px). الصور في وضع أفقي غير مسموح بها.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'الصورة في وضع عمودي ({{ width }}x{{ height }}px). الصور في وضع عمودي غير مسموح بها.',
    'An empty file is not allowed.' => 'ملف فارغ غير مسموح به.',
    'The host could not be resolved.' => 'يتعذر الإتصال بالنطاق.',
    'This value does not match the expected {{ charset }} charset.' => 'هذه القيمة غير متطابقة مع صيغة التحويل {{ charset }}.',
    'This is not a valid Business Identifier Code (BIC).' => 'هذه القيمة ليست رمز معرّف نشاط تجاري صالح (BIC).',
    'Error' => 'خطأ',
    'This is not a valid UUID.' => 'هذا ليس UUID صالح.',
    'This value should be a multiple of {{ compared_value }}.' => 'هذه القيمة يجب أن تكون مضاعف ل {{ compared_value }}.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'رمز المعرّف نشاط تجاري (BIC) هذا لا يرتبط مع IBAN {{ iban }}.',
    'This value should be valid JSON.' => 'هذه القيمة يجب أن تكون صالحة ل JSON.',
    'This collection should contain only unique elements.' => 'يجب أن تحتوي هذه المجموعة علي عناصر فريدة فقط.',
    'This value should be positive.' => 'يجب أن تكون هذه القيمة موجبة.',
    'This value should be either positive or zero.' => 'يجب أن تكون هذه القيمة إما موجبة او صفر.',
    'This value should be negative.' => 'يجب أن تكون هذه القيمة سالبة.',
    'This value should be either negative or zero.' => 'يجب أن تكون هذه القيمة إما سالبة او صفر.',
    'This value is not a valid timezone.' => 'هذه القيمة ليست منطقة زمنية صحيحة.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'تم تسريب كلمة المرور هذه في خرق للبيانات، ويجب عدم استخدامها. يرجي استخدام كلمة مرور أخري.',
    'This value should be between {{ min }} and {{ max }}.' => 'يجب أن تكون هذه القيمة بين {{ min }} و {{ max }}.',
    'This value is not a valid hostname.' => 'هذه القيمة ليست اسم مضيف صالح.',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'يجب أن يكون عدد العناصر في هذه المجموعة مضاعف {{ compared_value }}.',
    'This value should satisfy at least one of the following constraints:' => 'يجب أن تستوفي هذه القيمة واحدة من القيود التالية:',
    'Each element of this collection should satisfy its own set of constraints.' => 'يجب أن يفي كل عنصر من عناصر هذه المجموعة بمجموعة القيود الخاصة به.',
    'This value is not a valid International Securities Identification Number (ISIN).' => ' صالح (ISIN) هذه القيمة ليست رقم تعريف الأوراق المالية الدولي.',
    'This value should be a valid expression.' => 'يجب أن تكون هذه القيمة تعبيرًا صالحًا.',
    'This value is not a valid CSS color.' => 'هذه القيمة ليست لون CSS صالحًا.',
    'This value is not a valid CIDR notation.' => 'هذه القيمة ليست تدوين CIDR صالحًا.',
    'The value of the netmask should be between {{ min }} and {{ max }}.' => 'يجب أن تكون قيمة netmask بين {{ min }} و {{ max }}.',
    'This form should not contain extra fields.' => 'هذا النموذج يجب الا يحتوى على اى حقول اضافية.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'مساحة الملف المرسل كبيرة. من فضلك حاول ارسال ملف اصغر.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'قيمة رمز الموقع غير صحيحة. من فضلك اعد ارسال النموذج.',
    'This value is not a valid HTML5 color.' => 'هذه القيمة ليست لون HTML5 صالحًا.',
    'Please enter a valid birthdate.' => 'الرجاء ادخال تاريخ ميلاد صالح.',
    'The selected choice is invalid.' => 'الاختيار المحدد غير صالح.',
    'The collection is invalid.' => 'المجموعة غير صالحة.',
    'Please select a valid color.' => 'الرجاء اختيار لون صالح.',
    'Please select a valid country.' => 'الرجاء اختيار بلد صالح.',
    'Please select a valid currency.' => 'الرجاء اختيار عملة صالحة.',
    'Please choose a valid date interval.' => 'الرجاء اختيار فاصل زمني صالح.',
    'Please enter a valid date and time.' => 'الرجاء إدخال تاريخ ووقت صالحين.',
    'Please enter a valid date.' => 'الرجاء إدخال تاريخ صالح.',
    'Please select a valid file.' => 'الرجاء اختيار ملف صالح.',
    'The hidden field is invalid.' => 'الحقل المخفي غير صالح.',
    'Please enter an integer.' => 'الرجاء إدخال عدد صحيح.',
    'Please select a valid language.' => 'الرجاء اختيار لغة صالحة.',
    'Please select a valid locale.' => 'الرجاء اختيار لغة صالحة.',
    'Please enter a valid money amount.' => 'الرجاء إدخال مبلغ مالي صالح.',
    'Please enter a number.' => 'الرجاء إدخال رقم.',
    'The password is invalid.' => 'كلمة المرور غير صحيحة.',
    'Please enter a percentage value.' => 'الرجاء إدخال قيمة النسبة المئوية.',
    'The values do not match.' => 'القيم لا تتطابق.',
    'Please enter a valid time.' => 'الرجاء إدخال وقت صالح.',
    'Please select a valid timezone.' => 'الرجاء تحديد منطقة زمنية صالحة.',
    'Please enter a valid URL.' => 'أدخل عنوان الرابط صحيح من فضلك.',
    'Please enter a valid search term.' => 'الرجاء إدخال مصطلح البحث ساري المفعول.',
    'Please provide a valid phone number.' => 'يرجى تقديم رقم هاتف صالح.',
    'The checkbox has an invalid value.' => 'خانة الاختيار لها قيمة غير صالحة.',
    'Please enter a valid email address.' => 'رجاء قم بإدخال بريد الكتروني صحيح',
    'Please select a valid option.' => 'الرجاء تحديد خيار صالح.',
    'Please select a valid range.' => 'يرجى تحديد نطاق صالح.',
    'Please enter a valid week.' => 'الرجاء إدخال أسبوع صالح.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'حدث خطأ اثناء الدخول.',
    'Authentication credentials could not be found.' => 'لم استطع العثور على معلومات الدخول.',
    'Authentication request could not be processed due to a system problem.' => 'لم يكتمل طلب الدخول نتيجه عطل فى النظام.',
    'Invalid credentials.' => 'معلومات الدخول خاطئة.',
    'Cookie has already been used by someone else.' => 'ملفات تعريف الارتباط(cookies) تم استخدامها من قبل شخص اخر.',
    'Not privileged to request the resource.' => 'ليست لديك الصلاحيات الكافية لهذا الطلب.',
    'Invalid CSRF token.' => 'رمز الموقع غير صحيح.',
    'No authentication provider found to support the authentication token.' => 'لا يوجد معرف للدخول يدعم الرمز المستخدم للدخول.',
    'No session available, it either timed out or cookies are not enabled.' => 'لا يوجد صلة بينك و بين الموقع اما انها انتهت او ان متصفحك لا يدعم خاصية ملفات تعريف الارتباط (cookies).',
    'No token could be found.' => 'لم استطع العثور على الرمز.',
    'Username could not be found.' => 'لم استطع العثور على اسم الدخول.',
    'Account has expired.' => 'انتهت صلاحية الحساب.',
    'Credentials have expired.' => 'انتهت صلاحية معلومات الدخول.',
    'Account is disabled.' => 'الحساب موقوف.',
    'Account is locked.' => 'الحساب مغلق.',
    'Too many failed login attempts, please try again later.' => 'عدد كبير جدا من محاولات الدخول الفاشلة، يرجى المحاولة مرة أخرى في وقت لاحق.',
    'Invalid or expired login link.' => 'رابط تسجيل الدخول غير صالح أو منتهي الصلاحية.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'عدد كبير جدا من محاولات الدخول الفاشلة، يرجى اعادة المحاولة بعد %minutes% دقيقة.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'عدد كبير جدا من محاولات الدخول الفاشلة، يرجى اعادة المحاولة بعد %minutes% دقيقة.',
  ),
));

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
$catalogue->addFallbackCatalogue($catalogueNl);

return $catalogue;
