<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @Cms/media/index.html.twig */
class __TwigTemplate_950abde5d22e26927cfdc918028dbfb1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'pagetitle' => [$this, 'block_pagetitle'],
            'body' => [$this, 'block_body'],
        ];
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(((( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 1), "query", [], "any", false, false, false, 1), "get", [0 => "CKEditor"], "method", false, false, false, 1)) || ($context["inline"] ?? null))) ? ("@Cms/interface_empty.html.twig") : (((array_key_exists("selector", $context)) ? ("@Cms/interface_empty.html.twig") : ("@Cms/base.html.twig")))), "@Cms/media/index.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms"), "html", null, true);
    }

    // line 35
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 36
        echo "\t";
        $context["multiLang"] = (twig_length_filter($this->env, ($context["languages"] ?? null)) > 0);
        // line 37
        echo "\t";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 38
            echo "\t\t";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 38), "get", [0 => "inlineedit"], "method", false, false, false, 38)) {
                // line 39
                echo "\t\t\t";
                if ((($context["Media"] ?? null) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Media"] ?? null), "id", [], "any", false, false, false, 39)))) {
                    // line 40
                    echo "\t\t\t\t";
                    $context["callbackUrl"] = twig_urlencode_filter($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_edit", ["id" => twig_get_attribute($this->env, $this->source, ($context["Media"] ?? null), "id", [], "any", false, false, false, 40)]));
                    // line 41
                    echo "\t\t\t\t<script>
\t\t\t\tfunction doCompress(){
\t\t\t\t\tvar compressUrl = '";
                    // line 43
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_compress", ["id" => twig_get_attribute($this->env, $this->source, ($context["Media"] ?? null), "id", [], "any", false, false, false, 43), "inlineedit" => 1, "callback" => ($context["callbackUrl"] ?? null), "callbackType" => "modal"]);
                    echo "';
\t\t\t\t\tcpop.large().loadAjax(compressUrl);
\t\t\t\t}
\t\t\t\t</script>
\t\t\t\t<ul class=\"media-edit-tabs\">
\t\t\t\t\t<li><button class=\"active\" type=\"button\"><i class=\"far fa-images\"></i> Media bibliotheek</button></li>
\t\t\t\t\t<li><button onclick=\"editMedia(callerEl)\" type=\"button\"><i class=\"fa fa-magic\"></i> Afbeelding bewerken</button></li>
\t\t\t\t\t";
                    // line 50
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "tinypngApi", [], "any", false, false, false, 50))) {
                        // line 51
                        echo "\t\t\t\t\t\t<li><button onclick=\"doCompress()\" type=\"button\"><i class=\"far fa-file-archive\"></i> Afbeelding comprimeren</button></li>
\t\t\t\t\t";
                    }
                    // line 53
                    echo "\t\t\t\t</ul>
\t\t\t";
                }
                // line 55
                echo "\t\t";
            }
            // line 56
            echo "\t";
        }
        // line 57
        echo "
\t<style>
\ti.cropped {
\t    display: none;
\t}

\t.cropped i.cropped {
\t    display: block;
\t    position: absolute;
\t    top: 10px;
\t    right: 10px;
\t    z-index: 10;
\t    color: white;
\t    text-shadow: 0px 0px 3px rgba(0,0,0,1);
\t}

\t.img_ext {
\t    position: absolute;
\t    top: 0;
\t    right: 0;
\t    z-index: 100;
\t    text-transform: uppercase;
\t    font-weight: bold;
\t    color: white;
\t}

\t.img_ext span {
\t\tbackground-color: #179bde;
\t\tfont-size: 11px;
\t\tpadding: 0 3px;
\t\tborder-radius: 4px;
\t\tline-height: 14px;
\t\theight: 14px;
\t\tdisplay: inline-block;
\t\tmargin: 0 1px;
\t}

\t.img_ext span.webp {
\t\tbackground-color: #ff5656;
\t}
\t</style>
\t";
        // line 98
        if (twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 98), "get", [0 => "inlineedit"], "method", false, false, false, 98))) {
            // line 99
            echo "\t\t<style>
\t\t.image-load.bg-lazy {
\t\t\tbackground-image: none !important;
\t\t\tbackground-color: #2B333E !important;
\t\t}
\t\t</style>
\t";
        }
        // line 106
        echo "
\t<script type=\"text/javascript\">
\tvar activeFolder = 0;

\tvar strings = {
\t\tidle:      '";
        // line 111
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep afbeeldingen naar dit blok om ze toe te voegen.", [], "cms"), "html", null, true);
        echo "',
\t\thover:     '";
        // line 112
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Laat los om de afbeelding toe te voegen.", [], "cms"), "html", null, true);
        echo "',
\t\tuploading: '";
        // line 113
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met uploaden ...", [], "cms"), "html", null, true);
        echo "',
\t\tdone_idle: '";
        // line 114
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Overdracht voltooid.", [], "cms"), "html", null, true);
        echo "',
\t\tfile_type: '";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ongeldig bestandstype.", [], "cms"), "html", null, true);
        echo "',
\t\ttoo_large: '";
        // line 116
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestand is te groot.", [], "cms"), "html", null, true);
        echo "',
\t\ttoo_many:  '";
        // line 117
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Teveel bestanden, maximaal 10.", [], "cms"), "html", null, true);
        echo "',
\t};

\tvar totalUploadSize = 0;
\tvar mediaFileDrop;
\tvar dropped = 0;
\tvar msg_idle = '";
        // line 123
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep hier bestanden naar toe om deze toe te voegen.", [], "cms"), "html", null, true);
        echo "';
\tvar msg_hover = '";
        // line 124
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Laat los om toe te voegen.", [], "cms"), "html", null, true);
        echo "';
\tvar msg_uploading = '";
        // line 125
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met uploaden...", [], "cms"), "html", null, true);
        echo "';
\tvar msg_done_idle = '";
        // line 126
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden voltooid!", [], "cms"), "html", null, true);
        echo "';

    var allowedDocTypes = ['application/csv', 'application/doc', 'application/excel', 'application/ms-doc', 'application/mspowerpoint', 'application/msword', 'application/octet-stream', 'application/pdf', 'application/powerpoint', 'application/rtf', 'application/vnd.apple.keynote', 'application/vnd.apple.numbers', 'application/vnd.apple.pages', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/x-excel', 'application/x-iwork-keynote-sffkey', 'application/x-iwork-numbers-sffnumbers', 'application/x-msexcel', 'application/x-mspowerpoint', 'application/x-rar-compressed', 'application/zip', 'audio/basic', 'audio/mpeg', 'audio/ogg', 'audio/vnd.rn-realaudio', 'audio/vorbis', 'audio/wav', 'audio/x-midi', 'audio/x-pn-realaudio', 'audio/x-wav', 'text/asp', 'text/css', 'text/csv', 'text/html', 'text/pascal', 'text/php', 'text/plain', 'text/richtext', 'text/sgml', 'text/uri-list', 'text/webviewhtml', 'text/x-asm', 'text/x-c', 'text/x-java-source', 'text/x-pascal', 'text/x-script.csh', 'text/x-script.elisp', 'text/x-script.perl', 'text/x-script.perl-module', 'text/x-script.phyton', 'text/x-script.sh', 'text/x-server-parsed-html', 'text/x-setext', 'text/x-sgml', 'text/x-uuencode', 'video/avi', 'video/mp4', 'video/mpeg', 'video/msvideo', 'video/quicktime', 'video/x-msvideo'];
    var allowedMediaTypes = ['image/bmp', 'image/gif', 'image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff'];

    var allowedTypes = \$.merge( \$.merge([], allowedMediaTypes), allowedDocTypes)

\tlet fileSizeWarning = '";
        // line 133
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestand is te groot. Maximaal toegestaan:<br />Media bestanden: %mediafilesize% KB<br />Alle overige bestanden: %filesize% MB", ["%mediafilesize%" => ($context["maxMediaFileSize"] ?? null), "%filesize%" => ($context["maxFileSize"] ?? null)], "cms");
        echo "';

    var didDrag = false;
    var draggingOver = false;

    var dragTimer;
    function checkIfStillDragging(){
    \tclearTimeout(dragTimer);
\t\tdragTimer = setTimeout(function(){
    \t\t\$('#media-dropzone').removeClass('fle-hover');
\t        \$('#media-dropzone-message').hide();
\t        \$('#media-dropzone-message-alt').hide();
    \t}, 700);
    }

\tvar dropzoneConfig = {
\t    fallback_id: 'media_upload_button',   // an identifier of a standard file input element, becomes the target of \"click\" events on the dropzone
\t    url: '";
        // line 150
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media");
        echo "',              // upload handler, handles each file separately, can also be a function taking the file and returning a url
\t    paramname: 'media[]',          // POST parameter name used on serverside to reference file, can also be a function taking the filename and returning the paramname
\t    withCredentials: true,          // make a cross-origin request with cookies
\t    data: {
\t        mediadirid: '";
        // line 154
        echo twig_escape_filter($this->env, ($context["mediaDirId"] ?? null), "html", null, true);
        echo "',           // send POST variables
\t    },
\t    /*headers: {          // Send additional request headers
\t        'header': 'value'
\t    },*/
\t    error: function(err, file) {
\t        switch(err) {
\t            case 'BrowserNotSupported':
\t            \t\$('#upload-overlay').hide();
\t                alert('";
        // line 163
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("browser does not support HTML5 drag and drop", [], "cms"), "html", null, true);
        echo "')
\t                break;
\t            case 'TooManyFiles':
\t            \t\$('#upload-overlay').hide();
\t                cpop.loadHtml(' ";
        // line 167
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("U heeft teveel bestanden geselecteerd. Het maximum aantal bestanden die u gelijktijdig kunt uploaden is 10 bestanden.", [], "cms"), "html", null, true);
        echo " ');

\t\t\t        \$('#media-dropzone').removeClass('fle-hover').removeClass('hover').html(strings.idle)
\t\t\t        \$('#media-dropzone-message').hide();
\t\t\t        \$('#media-dropzone-message-alt').html('";
        // line 171
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep hier media heen om te uploaden", [], "cms"), "html", null, true);
        echo "').show();
\t\t\t        \$('#media-shade,#media-modal').removeClass('show');
\t                break;
\t            case 'FileTooLarge':
\t            \t\$('#upload-overlay').hide();
\t                cpop.loadHtml(fileSizeWarning);
\t\t\t        \$('#media-dropzone').removeClass('fle-hover').removeClass('hover').html(strings.idle)
\t\t\t        \$('#media-dropzone-message').hide();
\t\t\t        \$('#media-dropzone-message-alt').html(' ";
        // line 179
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep hier media heen om te uploaden", [], "cms"), "html", null, true);
        echo "').show();
\t\t\t        \$('#media-shade,#media-modal').removeClass('show');
\t                break;
\t            case 'FileTypeNotAllowed':
\t            \t\$('#upload-overlay').hide();
\t                cpop.loadHtml(\"";
        // line 184
        echo twig_escape_filter($this->env, ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestandstype", [], "cms") . "'"), "html", null, true);
        echo "\" + file.type + \"";
        echo twig_escape_filter($this->env, ("'" . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("is niet toegestaan.<br/><br/><strong>Toegestane bestanden:</strong><ul><li>", [], "cms")), "html", null, true);
        echo "\" + allowedTypes.join('</li><li>') + '</li></ul>');
\t\t\t        \$('#media-dropzone').removeClass('fle-hover').removeClass('hover').html(strings.idle)
\t\t\t        \$('#media-dropzone-message').hide();
\t\t\t        \$('#media-dropzone-message-alt').html(' ";
        // line 187
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep hier media heen om te uploaden", [], "cms"), "html", null, true);
        echo "').show();
\t\t\t        \$('#media-shade,#media-modal').removeClass('show');
\t                break;
\t            case 'FileExtensionNotAllowed':
\t            \t\$('#upload-overlay').hide();
\t                break;
\t            default:
\t                break;
\t        }
\t    },
\t    allowedfiletypes: allowedTypes,   // filetypes allowed by Content-Type.  Empty array means no restrictions
\t    allowedmediafiletypes: allowedMediaTypes,
\t    allowedfileextensions: [], // file extensions allowed. Empty array means no restrictions
\t    maxfiles: 10,
\t    /*";
        // line 201
        if (( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 201), "query", [], "any", false, false, false, 201), "get", [0 => "CKEditor"], "method", false, false, false, 201)) || ($context["inline"] ?? null))) {
            // line 202
            echo "\t    enableClick: false,
\t    ";
        }
        // line 203
        echo "*/
\t    maxfilesize: ";
        // line 204
        echo twig_escape_filter($this->env, ($context["maxFileSize"] ?? null), "html", null, true);
        echo ",    // max file size in MBs
\t    maxmediafilesize: ";
        // line 205
        echo twig_escape_filter($this->env, ($context["maxMediaFileSize"] ?? null), "html", null, true);
        echo ", // max images file size in KB's
\t    dragOver: function(x,y,z) {
\t        \$('#media-dropzone').addClass('hover').html(strings.hover);
\t        didDrag = true;
\t        checkIfStillDragging();
\t    },
\t    dragLeave: function() {
\t    \t\$('#media-dropzone').removeClass('hover').html(strings.idle)
\t    },
\t    docOver: function(x,y,z) {
\t        \$('#media-dropzone').addClass('fle-hover');
\t        \$('#media-dropzone-message').show().html(msg_hover);
\t        \$('#media-dropzone-message-alt').show().html(msg_hover);
\t    },
\t    docLeave: function() {
\t        \$('#media-dropzone').removeClass('fle-hover');
\t        \$('#media-dropzone-message').hide();
\t        \$('#media-dropzone-message-alt').hide();
\t    },
\t    drop: function(x,y,z) {
\t    \tif(didDrag){
\t    \t\tclearTimeout(dragTimer);
\t\t        totalUploadSize = 0;
\t\t        dropped = 0;
\t\t        \$('.cancel-btn').show();
\t\t        didDrag = false;

\t\t        \$('#upload-overlay').show();
\t\t        \$('#upload-overlay .progress-bar').css('width', '0%');
\t\t    }
\t    },
\t    uploadStarted: function(i, file, len){
\t    \t\$('#upload-overlay').show();
\t    },
\t    uploadFinished: function(i, file, response, time) {},
\t    progressUpdated: function(i, file, progress) {},
\t    globalProgressUpdated: function(progress) {
\t        \$('#upload-overlay .progress-bar').css('width', progress + '%');
\t    },
\t    speedUpdated: function(i, file, speed) {},
\t    rename: function(name) {},
\t    beforeEach: function(file) {
\t        dropped++;
\t    },
\t    beforeSend: function(file, i, done) {
\t    \tif(dropped <= 0){
\t    \t\t\$('.totals').hide();
\t    \t}
\t        \$('#media-dropzone').removeClass('hover').html(strings.uploading)
\t        done(); // Start upload
\t        \$('#media-dropzone-message').show().html(msg_uploading);
\t        \$('#media-dropzone-message-alt').show().html(msg_uploading);
\t    },
\t    afterAll: function() {
\t        \$('#media-dropzone').removeClass('hover').html(strings.done_idle)
\t        \$('#media-dropzone-message').hide();
\t        \$('#media-dropzone-message-alt').html('";
        // line 261
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep hier media heen om te uploaden", [], "cms"), "html", null, true);
        echo "').show();

\t        \$('#upload-overlay').hide();
\t        \$('#upload-overlay .progress-bar').css('width', '0%');

\t        ";
        // line 266
        if (($context["inline"] ?? null)) {
            // line 267
            echo "\t        \tcpop.reload();
\t        ";
        } else {
            // line 269
            echo "\t\t        openFolder(null,dropzoneConfig.data.mediadirid);
\t        ";
        }
        // line 271
        echo "\t    }
\t};
\t</script>
\t<div>
\t\t";
        // line 275
        $context["rand"] = twig_random($this->env);
        // line 276
        echo "\t\t";
        if (($context["isModal"] ?? null)) {
            // line 277
            echo "\t\t\t<div class=\"breadcrumbs\">
\t\t\t\t";
            // line 278
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["asset_crumbs"] ?? null));
            foreach ($context['_seq'] as $context["url"] => $context["label"]) {
                // line 279
                echo "\t\t\t\t\t<a class=\"breadcrumb\" href=\"";
                echo twig_escape_filter($this->env, $context["url"], "html", null, true);
                echo "\" itemprop=\"item\">";
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo "</a>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['url'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 281
            echo "\t\t    </div>
\t\t";
        }
        // line 283
        echo "\t\t";
        if (($context["inline"] ?? null)) {
            // line 284
            echo "\t\t\t<h3 class=\"popup-title\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media bibliotheek", [], "cms"), "html", null, true);
            echo "</h3>
\t\t";
        } else {
            // line 286
            echo "\t\t\t<div class=\"btn-bar\">
\t\t\t\t<div class=\"right\">
\t\t\t\t\t<a href=\"#\" onclick=\"\$('#media-dropzone').data('enableClick', '1');\$('#media-dropzone').click();\" class=\"btn\"><i class=\"fa fa-cloud-upload-alt\" style=\"margin-right:10px;font-size:14px;\"></i>";
            // line 288
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestanden uploaden", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 292
        echo "
\t\t<div class=\"row\">
\t\t\t<div class=\"library cards-responsive";
        // line 294
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "\" id=\"cr";
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "\" style=\"";
        echo ((($context["inline"] ?? null)) ? ("box-shadow:none;") : (""));
        echo "\">

\t\t\t\t<form class=\"cpop-keep\" method=\"post\" enctype=\"multipart/form-data\">
\t\t\t\t\t<input type=\"hidden\" id=\"mediadirid\" name=\"mediadirid\" value=\"";
        // line 297
        echo twig_escape_filter($this->env, ($context["mediaDirId"] ?? null), "html", null, true);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" name=\"manual_upload\" value=\"1\" />
\t\t\t\t\t<input type=\"file\" name=\"media[]\" id=\"media_upload_button\" />
\t\t\t\t\t<button type=\"submit\">";
        // line 300
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t\t</form>

\t\t\t    <div class=\"column-wrapper\">
\t\t\t\t\t";
        // line 304
        if (($context["inline"] ?? null)) {
            // line 305
            echo "\t\t\t\t\t";
        } else {
            // line 306
            echo "\t\t  \t\t<div class=\"sidebar\" data-simplebar>
\t\t  \t\t\t";
            // line 307
            if (($context["folders_root"] ?? null)) {
                // line 308
                echo "            <div class=\"tree-children depth-0\" data-depth=\"0\" data-parent=\"null\">
              <div class=\"grid-element folder ";
                // line 309
                echo ((($context["Mediadir"] ?? null)) ? ("") : ("active"));
                echo "\" data-depth=\"0\" data-id=\"0\" id=\"sidebar-folder-0\">
                <span onclick=\"openFolder(this,0)\">
                  <div id=\"root-dir\" title=\"";
                // line 311
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms"), "html", null, true);
                echo "\">
                    <div class=\"card\">
                      <div class=\"card-body\">
                        <h6 class=\"card-title\">
                          ";
                // line 315
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bibliotheek", [], "cms"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["folders_root"] ?? null)), "html", null, true);
                echo ")
                        </h6>
                      </div>
                    </div>
                  </div>
                </span>
                ";
                // line 321
                echo twig_call_macro($macros["_self"], "macro_parse_folders", [($context["folders_root"] ?? null), null, 1, null, ($context["multiLang"] ?? null)], 321, $context, $this->getSourceContext());
                echo "
              </div>
              </div>
\t\t\t\t  \t";
            }
            // line 325
            echo "\t        </div>
\t\t\t\t\t";
        }
        // line 327
        echo "
\t\t\t\t\t";
        // line 329
        echo "\t\t\t\t\t<div class=\"file-container mode-tile\" style=\"width: 100%;position: relative;\">
            <div class=\"file-container-wrapper\">
          \t\t\t<div id=\"media-dropzone\" class=\"dropzone\" style=\"margin-bottom:20px;\">
          \t\t\t\t";
        // line 332
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep afbeeldingen naar dit blok om ze toe te voegen", [], "cms"), "html", null, true);
        echo "
          \t\t\t</div>


\t\t\t\t\t<!-- Modal -->
\t\t\t\t\t<div class=\"modal fade\" id=\"newFolderModal\" tabindex=\"-1\" aria-labelledby=\"newFolderModalLabel\" aria-hidden=\"true\">
\t\t\t\t\t\t<div class=\"modal-dialog\">
\t\t\t\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t\t\t<h5 class=\"modal-title\" id=\"newFolderModalLabel\">Nieuwe map aanmaken</h5>
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t\t\t\t<label for=\"foldername\" class=\"form-label\">Map naam</label>
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"foldername\" class=\"form-control\" id=\"foldername\" placeholder=\"";
        // line 347
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe map", [], "cms"), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"modal-footer\">
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Sluiten</button>
\t\t\t\t\t\t\t\t<button type=\"button\" onclick=\"createFolder(this);\" class=\"btn btn-primary\">Aanmaken</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t            <div class=\"file-container-bar\">
\t  \t\t\t\t\t\t<h3>
\t  \t\t\t\t\t\t\t";
        // line 360
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestanden", [], "cms"), "html", null, true);
        echo " (<span id=\"file-count\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["files"] ?? null)), "html", null, true);
        echo "</span>)
\t  \t\t\t\t\t\t</h3>

\t  \t\t\t\t\t\t<div class=\"display-options\">
\t  \t\t\t\t\t\t\t";
        // line 365
        echo "\t\t\t  \t\t    \t";
        // line 366
        echo "\t  \t\t\t\t\t\t\t";
        // line 370
        echo "\t  \t\t\t\t\t\t\t<div class=\"segment-select\">
\t  \t\t\t\t\t\t\t\t<select id=\"sort\" class=\"browser-default\">
\t  \t\t\t\t\t\t\t\t\t<option value=\"dateAdd_asc\">";
        // line 372
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Datum (oplopend)", [], "cms"), "html", null, true);
        echo "</option>
\t  \t\t\t\t\t\t\t\t\t<option selected value=\"dateAdd_desc\">";
        // line 373
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Datum (aflopend)", [], "cms"), "html", null, true);
        echo "</option>
\t  \t\t\t\t\t\t\t\t\t<option value=\"label_asc\">";
        // line 374
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestandsnaam (oplopend)", [], "cms"), "html", null, true);
        echo "</option>
\t  \t\t\t\t\t\t\t\t\t<option value=\"label_desc\">";
        // line 375
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestandsnaam (aflopend)", [], "cms"), "html", null, true);
        echo "</option>
\t  \t\t\t\t\t\t\t\t\t<option value=\"size_asc\">";
        // line 376
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Grootte (oplopend)", [], "cms"), "html", null, true);
        echo "</option>
\t  \t\t\t\t\t\t\t\t\t<option value=\"size_desc\">";
        // line 377
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Grootte (aflopend)", [], "cms"), "html", null, true);
        echo "</option>
\t  \t\t\t\t\t\t\t\t</select>
\t  \t\t\t\t\t\t\t</div>
\t  \t\t\t\t\t\t</div>

\t  \t\t\t\t\t\t<div class=\"media-breadcrumbs\">";
        // line 382
        echo ($context["crumbs"] ?? null);
        echo "</div>
\t\t\t            </div>
\t\t\t\t\t\t<div class=\"row\" id=\"media-list\">
\t\t\t\t\t\t\t<div class=\"folders\">

\t\t\t\t\t\t\t\t";
        // line 388
        echo "\t\t\t\t\t\t\t\t";
        // line 398
        echo "\t\t\t\t\t\t\t\t";
        if (($context["Mediadir"] ?? null)) {
            // line 399
            echo "\t\t\t\t\t\t\t\t\t<div class =\"grid-element folder folder-up\" data-id=\"100\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card hoverables\" style=\"cursor:pointer;\" onclick=\"openFolder(this,";
            // line 400
            ((twig_get_attribute($this->env, $this->source, ($context["Mediadir"] ?? null), "parent", [], "any", false, false, false, 400)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Mediadir"] ?? null), "parent", [], "any", false, false, false, 400), "id", [], "any", false, false, false, 400), "html", null, true))) : (print ("0")));
            echo ")\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"card-title\" title=\"Paginas\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-arrow-up\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 403
            if (twig_get_attribute($this->env, $this->source, ($context["Mediadir"] ?? null), "parent", [], "any", false, false, false, 403)) {
                // line 404
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Mediadir"] ?? null), "parent", [], "any", false, false, false, 404), "label", [], "any", false, false, false, 404), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 406
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-home\"></i> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bibliotheek", [], "cms"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["folders_root"] ?? null)), "html", null, true);
                echo ")
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 408
            echo "\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"list-options\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 413
        echo "
\t\t\t\t\t\t\t\t";
        // line 414
        if ( !twig_test_empty(($context["folders"] ?? null))) {
            // line 415
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["folders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Folder"]) {
                // line 416
                echo "\t\t\t\t\t\t\t\t\t\t";
                // line 417
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"grid-element folder\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "id", [], "any", false, false, false, 417), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card hoverables\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"card-title\" title=\"";
                // line 419
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "getLabel", [], "any", false, false, false, 419), "html", null, true);
                echo "\" style=\"cursor:pointer;\" onclick=\"openFolder(this,";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "id", [], "any", false, false, false, 419), "html", null, true);
                echo ")\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-folder\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 421
                echo twig_get_attribute($this->env, $this->source, $context["Folder"], "getLabel", [0 => ($context["multiLang"] ?? null)], "method", false, false, false, 421);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"list-options\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Folder'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 428
            echo "\t\t\t\t\t\t\t\t";
        }
        // line 429
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 430
        if ( !twig_test_empty(($context["files"] ?? null))) {
            // line 431
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["files"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Media"]) {
                // line 432
                echo "\t\t\t\t\t\t\t\t\t";
                // line 433
                echo "\t\t\t\t\t\t\t\t\t<div class=\"grid-element file\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "id", [], "any", false, false, false, 433), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card hoverables\">

\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-image ";
                // line 436
                echo (((twig_get_attribute($this->env, $this->source, $context["Media"], "type", [], "any", false, false, false, 436) == "images")) ? ("images") : ("other"));
                echo " ";
                echo ((twig_get_attribute($this->env, $this->source, $context["Media"], "realCropSource", [], "any", false, false, false, 436)) ? ("cropped") : (""));
                echo "\" style=\"cursor:pointer;\" onclick=\"loadMedia('";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "id", [], "any", false, false, false, 436), "html", null, true);
                echo "', '/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getWebPath", [], "any", false, false, false, 436), "html", null, true);
                echo "', '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "label", [], "any", false, false, false, 436), "html", null, true);
                echo "');\" data-url=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getWebPath", [], "any", false, false, false, 436), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 437
                if ((twig_get_attribute($this->env, $this->source, $context["Media"], "type", [], "any", false, false, false, 437) == "images")) {
                    // line 438
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"img_ext\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"";
                    // line 439
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getExtension", [], "method", false, false, false, 439), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getExtension", [], "method", false, false, false, 439), "html", null, true);
                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 440
                    if (twig_get_attribute($this->env, $this->source, $context["Media"], "hasWebp", [], "method", false, false, false, 440)) {
                        // line 441
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"webp\">webp</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 443
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"imagebox image-load bg-lazy\" style=\"background: url(/";
                    // line 444
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getWebPath", [0 => "small"], "method", false, false, false, 444), "html", null, true);
                    echo ") center; background-size: cover;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 445
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/images/transparent_square.gif"), "html", null, true);
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (preg_match("{^video.*\$}", twig_get_attribute($this->env, $this->source,                 // line 447
$context["Media"], "mime", [], "any", false, false, false, 447))) {
                    // line 448
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"imagebox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<video src=\"/";
                    // line 449
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getWebPath", [], "method", false, false, false, 449), "html", null, true);
                    echo "\" loop playsinline autoplay muted style=\"width:100%;position: absolute;top: 50%;transform: translateY(-50%);\"></video>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 450
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/images/transparent_square.gif"), "html", null, true);
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 453
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"imagebox image-load bg-lazy\" style=\"background: url(";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("bundles/cms/images/filetypes/" . twig_get_attribute($this->env, $this->source, $context["Media"], "getFileImage", [], "any", false, false, false, 453))), "html", null, true);
                    echo ") center; background-size: 50%;background-repeat:no-repeat;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 454
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/images/transparent_square.gif"), "html", null, true);
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 457
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if ((($context["inline"] ?? null) == false)) {
                    // line 458
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"vtable\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"valign\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 461
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_view", ["id" => twig_get_attribute($this->env, $this->source, $context["Media"], "id", [], "any", false, false, false, 461)]), "html", null, true);
                    echo "\"><i class=\"fa fa-search\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 463
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 467
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"cropped fa fa-cut\"></i>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<span class=\"card-title\" title=\"";
                // line 471
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getLabel", [], "any", false, false, false, 471), "html", null, true);
                echo "\" style=\"cursor:pointer;\" onclick=\"loadMedia('";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "id", [], "any", false, false, false, 471), "html", null, true);
                echo "', '/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getWebPath", [], "any", false, false, false, 471), "html", null, true);
                echo "', '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "label", [], "any", false, false, false, 471), "html", null, true);
                echo "');\" data-url=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getWebPath", [], "any", false, false, false, 471), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-file\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 473
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getLabel", [], "any", false, false, false, 473), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"list-options\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"url-";
                // line 477
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "id", [], "any", false, false, false, 477), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, ($context["baseurl"] ?? null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getWebPath", [], "any", false, false, false, 477), "html", null, true);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"filesize\">";
                // line 478
                echo twig_escape_filter($this->env, $this->extensions['App\CmsBundle\Twig\Extension\Helpers']->formatBytes(twig_get_attribute($this->env, $this->source, $context["Media"], "size", [], "any", false, false, false, 478)), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 479
                if ((($context["inline"] ?? null) == false)) {
                    // line 480
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<span onclick=\"copyClipboard('url-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "id", [], "any", false, false, false, 480), "html", null, true);
                    echo "');\" style=\"cursor:pointer;\"  class=\"copyurl tooltipped\" data-position=\"top\" data-delay=\"300\" data-tooltip=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Kopieer URL", [], "cms"), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"far fa-clipboard\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 484
                echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Media'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 488
            echo "\t\t\t\t\t\t\t";
        } else {
            // line 489
            echo "\t\t\t\t\t\t\t\t<div class=\"col s12 no-media\">
\t\t\t\t\t\t\t\t\t";
            // line 490
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er is geen media in deze folder aanwezig", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        // line 493
        echo "\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
        // line 495
        if (($context["inline"] ?? null)) {
            // line 496
            echo "\t\t\t\t\t\t";
        } else {
            // line 497
            echo "\t\t\t\t            <div class=\"footer-buttons\">
\t\t\t\t              <button type=\"button\" onclick=\"deleteFolder();\" class=\"del-folder btn red\" style=\"display: none;margin: 0;\"><i class=\"far fa-trash-alt\"></i> ";
            // line 498
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Folder verwijderen", [], "cms"), "html", null, true);
            echo "</button>
\t\t\t\t              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#newFolderModal\" class=\"create-folder popup btn\" style=\"margin: 0;\"><i class=\"fa fa-folder\"></i> ";
            // line 499
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Folder aanmaken", [], "cms"), "html", null, true);
            echo "</button>
\t\t\t\t            </div>
\t\t\t            ";
        }
        // line 502
        echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t    </div>

\t\t\t<script>
\t\t\tfunction runSegment(el){
\t\t\t\tvar seg = \$(el).closest('.segments');
\t\t\t\tseg.find('a').removeClass('active');
\t\t\t\t\$(el).addClass('active');

\t\t\t\tCookies.set('t-media-segment', \$(el).data('mode'));
\t\t\t}
\t\t\t</script>
\t\t</div>

\t\t";
        // line 520
        echo "
\t\t<div class=\"upload-shade\">
\t\t\t<div id=\"media-shade\" class=\"\"></div>
\t\t\t<div id=\"modal\" class=\" bottom-center\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"files\"></div>
\t\t\t\t\t<div class=\"totals\">
\t\t\t\t\t\t<div class=\"file-upload-totals\">
\t\t\t\t\t\t\t<span class=\"label\">";
        // line 528
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Proces", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t\t\t<div class=\"right\">
\t\t\t\t\t\t\t\t<span class=\"size\"></span>
\t\t\t\t\t\t\t\t<span class=\"speed\"></span>
\t\t\t\t\t\t\t\t<span class=\"progress\">0 %</span>
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"delete\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"progress-bar\"><div class=\"progress\" style=\"width:0%;\"></div></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"actions\">
\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-primary\" onclick=\"closeModal();\">";
        // line 539
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t";
        // line 546
        if (($context["inline"] ?? null)) {
            // line 547
            echo "\t\t<div id=\"popup_footer\">
\t\t\t<div class=\"left\">
\t\t\t\t<button type=\"button\" class=\"btn-flat\" onclick=\"cpop.close();\">";
            // line 549
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "cms");
            echo "</button>
\t\t\t</div>
\t\t\t<button type=\"button\" class=\"btn\" onclick=\"\$('#media-dropzone').data('enableClick', '1');\$('#media-dropzone').click();\">";
            // line 551
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestand uploaden", [], "cms"), "html", null, true);
            echo "</button>
\t\t</div>
\t";
        }
        // line 554
        echo "

\t<script type=\"text/javascript\" src=\"";
        // line 556
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/jquery.filedrop.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\">
\tvar moveUrl = '";
        // line 558
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_move");
        echo "';

\t\$().ready(function(){
\t\t";
        // line 561
        if (($context["folders"] ?? null)) {
            // line 562
            echo "\t\t\tinitDrag();
\t\t";
        }
        // line 564
        echo "
\t\t";
        // line 565
        if (($context["mediaDirId"] ?? null)) {
            // line 566
            echo "\t\t\tvar active = \$('[data-id=\"";
            echo twig_escape_filter($this->env, ($context["mediaDirId"] ?? null), "html", null, true);
            echo "\"]');
\t\t\tactive.addClass('active');
\t\t\tvar parent = active.parent();
\t\t\tparent.show();
\t\t\tif(parent.closest('.tree-children').length){
\t\t\t\tparent = parent.parent().closest('.tree-children');
\t\t\t\tparent.show();
\t\t\t\tif(parent.closest('.tree-children').length){
\t\t\t\t\tparent = parent.parent().closest('.tree-children');
\t\t\t\t\tparent.show();
\t\t\t\t\tif(parent.closest('.tree-children').length){
\t\t\t\t\t\tparent = parent.parent().closest('.tree-children');
\t\t\t\t\t\tparent.show();
\t\t\t\t\t\tif(parent.closest('.tree-children').length){
\t\t\t\t\t\t\tparent = parent.parent().closest('.tree-children');
\t\t\t\t\t\t\tparent.show();
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t}
\t\t\t}
\t\t";
        }
        // line 587
        echo "\t});

\tactiveFolder = ";
        // line 589
        ((($context["mediaDirId"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["mediaDirId"] ?? null), "html", null, true))) : (print (0)));
        echo ";

\tfunction deleteFolder(){
\t\tif(confirm('";
        // line 592
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u de huidige map verwijderen?", [], "cms"), "html", null, true);
        echo "')){
\t\t\t\$.ajax('";
        // line 593
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mediadir_delete");
        echo "/' + activeFolder).done(function(r){
\t\t\t\tvar parent = \$('[data-id=\"' + activeFolder + '\"]').parent();
\t\t\t\t\$('[data-id=\"' + activeFolder + '\"]').remove();
\t\t\t\tif(parent.children().length == 0){
\t\t\t\t\tparent.parent().find('.has-children').remove();
\t\t\t\t}
\t\t\t\topenFolder(\$('#root-dir'),0);
\t\t\t});
\t\t}
\t}

\tfunction copyStringToClipboard (str) {
\t\tconsole.log( 'copy:', str );
\t\t// Create new element
\t\tvar el = document.createElement('textarea');
\t\t// Set value (string to be copied)
\t\tel.value = str;
\t\t// Set non-editable to avoid focus and move outside of view
\t\tel.setAttribute('readonly', '');
\t\tel.style = {position: 'absolute', left: '-9999px'};
\t\tdocument.body.appendChild(el);
\t\t// Select text inside element
\t\tel.select();
\t\t// Copy text to clipboard
\t\tdocument.execCommand('copy');
\t\t// Remove temporary element
\t\tdocument.body.removeChild(el);
\t\tToastify({
\t\t\ttext: 'De URL is gekopieerd!',
\t\t\tduration: 2000,
\t\t\tescapeMarkup: false,
\t\t\tclose: false,
\t\t\tgravity: \"bottom\",
\t\t\tposition: \"right\",
\t\t\tstopOnFocus: true,
\t\t\tonClick: function(){}
\t\t}).showToast();
\t}

\tfunction copyClipboard(id) {
\t\tcopyStringToClipboard(\$('#' + id).val());
\t}

\tfunction initDrag(){
\t    \$( \".grid-element.file\" ).draggable({
\t    \trevert: true,
\t    \trevertDuration: 200,
\t    \tcursorAt: {
\t    \t\tleft: 0,
\t    \t\ttop: 0
\t    \t},
\t    \t// snap: true,
\t    \thelper: function(el){
\t\t\t\tvar myNewBlock = \$(el.currentTarget).clone();
\t\t\t\tmyNewBlock.css('transform', 'scale(0.5)');
\t\t\t\tmyNewBlock.css('opacity', 0.8);
\t\t\t\treturn myNewBlock;
\t\t\t},
\t    \t// placeholder: 'sortable-placeholder',
\t    \tstart: function(event, ui){
\t    \t\tconsole.log( ui.helper );
\t    \t\tui.helper.css('opacity', 0.4);
\t    \t\tconsole.log( ui.helper.width(), ui.helper.height() );
\t\t\t\t\$(this).draggable('instance').offset.click = {
\t\t\t\t\tleft: Math.floor(ui.helper.width() / 2),
\t\t\t\t\ttop: Math.floor(ui.helper.height() / 2)
\t\t\t\t};
\t\t\t}
\t    });
\t\t\$( \".grid-element>.card.folder,.grid-element.folder\" ).droppable({
\t\t\t// accept: \".file\",
\t\t\thoverClass: 'ui-state-hover',
\t\t\tactiveClass: 'ui-state-active',
\t\t\tdrop: function( event, ui ) {


\t\t\t\tui.draggable.remove();


\t\t\t\tvar folder_id = \$(this).data('id');
\t\t\t\tvar media_id = ui.draggable.data('id');


\t\t\t\tif(ui.draggable.hasClass('folder')){
\t\t\t\t\tvar url = moveUrl + '/' + media_id + '/' + folder_id + '/folder';
\t\t\t\t}else{
\t\t\t\t\tvar url = moveUrl + '/' + media_id + '/' + folder_id + '/file';
\t\t\t\t}


\t\t\t\t\$.ajax(url);
\t\t\t},
\t\t\tactivate: function( event, ui ) {
\t\t\t\t\$( \".grid-element.file\" ).css('opacity', 0.3);
\t\t\t\tui.helper.css('opacity', 1);
\t\t\t},
\t\t\tdeactivate: function( event, ui ) {
\t\t\t\t\$( \".grid-element.file\" ).css('opacity', 1);
\t\t\t},
\t\t});
\t}

\tfunction createFolder(el){
\t\t
\t\t\$(el).find('.fa-check').addClass('fa-spinner').addClass('fa-spin').removeClass('fa-check');
\t\tvar url = '";
        // line 698
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_addfolder");
        echo "/' + activeFolder;
\t\tvar name = \$('#foldername').val();
\t\t\$.post(url, {label: name}, function(res){
\t\t\t\$('#newFolderModal').modal('hide');
\t\t\taddFolderElement(res.id, res.label);
\t\t\topenFolder(null,res.id);

\t\t\t\$('#foldername').val('');
\t\t\t\$(el).find('.fa-spinner').addClass('fa-check').removeClass('fa-spinner').removeClass('fa-spin');
\t\t});
\t\t
\t}

\tfunction addFolderElement(id, label){
\t\tvar currentFolderEl = \$('#sidebar-folder-' + activeFolder);
\t\tconsole.log( currentFolderEl );
\t\tvar newDepth = (currentFolderEl.data('depth') + 1);
\t\tconsole.log( 'newDepth', newDepth );
\t\tif(currentFolderEl.parent().children('.tree-children').length == 0){
\t\t\tconsole.log( 'has NO tree folder' );
\t\t\ttreeWrapper = \$('<div class=\"tree-children depth-' + newDepth + '\" data-depth=\"' + newDepth + '\" data-parent=\"' + activeFolder + '\" style=\"' + (newDepth > 1 ? '' : '') + '\"></div>');

\t\t\tcurrentFolderEl.find('i').removeClass('no-children').removeClass('fa-folder').addClass('has-children').addClass('fa-minus');

\t\t\tcurrentFolderEl.append(treeWrapper);
\t\t}else{
\t\t\ttreeWrapper = currentFolderEl.parent().children('.tree-children');
\t\t}

\t\tconsole.log( treeWrapper );

\t\ttreeWrapper.append('<div class=\"grid-element folder\" data-id=\"' + id + '\" data-depth=\"' + newDepth + '\" id=\"sidebar-folder-' + id + '\">\\
\t\t\t<div class=\"card hoverables\" style=\"cursor:pointer;position:relative;\">\\
\t\t\t\t<span class=\"card-title\" style=\"width: 90%;display: block;padding-left:' + (newDepth * 15) + 'px;\" title=\"' + label + '\" onclick=\"openFolder(this,' + id + ')\">\\
\t\t\t\t\t<i class=\"fa fa-folder\"></i> ' + label + '\\
\t\t\t\t</span>\\
\t\t\t</div>\\
\t\t</div>');
\t}

\tvar container = \$('#cr";
        // line 738
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "');

\tvar clickedOpenClose = false;
\tfunction showFolderSubs(el, id){
\t\tclickedOpenClose = true;
    \tif(\$(el).hasClass('has-children')){
        \t\$(el).toggleClass('fa-plus').toggleClass('fa-minus');
        \tif(\$(el).hasClass('fa-minus')){
        \t\tif(\$('.tree-children[data-parent=\"' + id + '\"]').length > 0){
\t        \t\t\$('.tree-children[data-parent=\"' + id + '\"]').show();
\t        \t}else{
\t\t\t\t\t// Load subfolders for this folder
\t\t\t\t\tvar folders_url = '";
        // line 750
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_folder");
        echo "/' + id;
\t\t\t\t\t\$('#sidebar-folder-' + id).find('.fa-circle-notch').show();
\t\t\t\t\t\$.ajax(folders_url).done(function(r){
\t\t\t\t\t\tvar childhtml = '<div class=\"tree-children depth-' + r.depth + '\" data-depth=\"' + r.depth + '\" data-parent=\"' + id + '\">';
\t\t\t\t\t\t\$.each(r.childs, function(ind, dir){
\t\t\t\t\t\t\tconsole.log( dir );
\t\t\t\t\t\t\tchildhtml = childhtml + '<div class=\"grid-element\">\\
\t\t\t\t\t\t\t\t<div class=\"folder\" style=\"cursor:pointer;position:relative;\" data-id=\"' + dir.id + '\" data-depth=\"' + r.depth + '\" id=\"sidebar-folder-' + dir.id + '\">\\
\t\t\t\t\t\t\t            ' + (dir.folders > 0 ? '\\
\t\t\t\t\t\t\t\t\t      <span class=\"\" style=\"display: block;padding-left:' + (r.depth * 15) + 'px;\" title=\"' + dir.label + '\" onclick=\"openFolder(this,' + dir.id + ');' + (r.depth >= 3 ? '\$(\\'.create-folder\\').hide();' : '\$(\\'.create-folder\\').show();') + '\">\\
\t\t\t\t\t\t\t            ' : '\\
\t\t\t\t\t\t\t              <span class=\"full-width\" style=\"display: block;padding-left:' + r.depth * 15 + 'px;\" title=\"' + dir.label + '\" onclick=\"openFolder(this,' + dir.id + ');' + (r.depth >= 3 ? '\$(\\'.create-folder\\').hide();' : '\$(\\'.create-folder\\').show();') + '\">\\
\t\t\t\t\t\t\t            ') + '\\
\t\t\t\t\t\t\t            ' + (dir.folders > 0 ? '<i class=\"fa has-children fa-plus\" onclick=\"showFolderSubs(this,' + dir.id + ');\"></i><i class=\"fa fa-circle-notch fa-spin\" style=\"display:none;float: right;margin-top: 4px;\"></i>' : '') + '\\
\t\t\t\t\t\t\t\t\t\t<i class=\"fa no-children fa-folder\"></i>\\
\t\t\t\t\t\t\t\t\t\t' + dir.label + ' <span class=\"dir-file-count\">' + (dir.files > 0 ? dir.files : '') + '</span>\\
\t\t\t\t\t\t\t\t\t</span>\\
\t\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t\t</div>';
\t\t\t\t\t\t});

\t\t\t\t\t\tchildhtml = childhtml + '</div>';

\t\t\t\t\t\t\$('#sidebar-folder-' + id).parent().append(\$(childhtml));
\t\t\t\t\t\t\$('#sidebar-folder-' + id).find('.fa-circle-notch').hide();
\t\t\t\t\t});
\t        \t}
        \t}else{
        \t\t\$('.tree-children[data-parent=\"' + id + '\"]').hide();
        \t}
    \t}
\t}

\t\$('#sort').change(function(){
\t\topenFolder(null, activeFolder, this.value);
\t});

\tvar media_xhr;
\tfunction openFolder(el, id, sort){
\t\tif(typeof sort == 'undefined') sort = \$('#sort').val();
\t\tconsole.log( 'sort', sort );
\t\tif(clickedOpenClose == false){
\t\t\tactiveFolder = id;

\t\t\tdropzoneConfig.data.mediadirid = id;
\t\t\t// console.log( dropzoneConfig );












\t\t\t// Load subfolders for this folder
\t\t\tvar folders_url = '";
        // line 809
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_folder");
        echo "/' + id;
\t\t\t\$('#sidebar-folder-' + id).find('.fa-circle-notch').show();
\t\t\t\$.ajax(folders_url).done(function(r){
\t\t\t\tvar childhtml = '<div class=\"tree-children depth-' + r.depth + '\" data-depth=\"' + r.depth + '\" data-parent=\"' + id + '\">';
\t\t\t\t\$.each(r.childs, function(ind, dir){
\t\t\t\t\tconsole.log( dir );
\t\t\t\t\tchildhtml = childhtml + '<div class=\"grid-element\">\\
\t\t\t\t\t\t<div class=\"folder\" style=\"cursor:pointer;position:relative;\" data-id=\"' + dir.id + '\" data-depth=\"' + r.depth + '\" id=\"sidebar-folder-' + dir.id + '\">\\
\t\t\t\t\t            ' + (dir.folders > 0 ? '\\
\t\t\t\t\t\t\t      <span class=\"\" style=\"display: block;padding-left:' + (r.depth * 15) + 'px;\" title=\"' + dir.label + '\" onclick=\"openFolder(this,' + dir.id + ');' + (r.depth >= 3 ? '\$(\\'.create-folder\\').hide();' : '\$(\\'.create-folder\\').show();') + '\">\\
\t\t\t\t\t            ' : '\\
\t\t\t\t\t              <span class=\"full-width\" style=\"display: block;padding-left:' + r.depth * 15 + 'px;\" title=\"' + dir.label + '\" onclick=\"openFolder(this,' + dir.id + ');' + (r.depth >= 3 ? '\$(\\'.create-folder\\').hide();' : '\$(\\'.create-folder\\').show();') + '\">\\
\t\t\t\t\t            ') + '\\
\t\t\t\t\t            ' + (dir.folders > 0 ? '<i class=\"fa has-children fa-plus\" onclick=\"showFolderSubs(this,' + dir.id + ');\"></i><i class=\"fa fa-circle-notch fa-spin\" style=\"display:none;float: right;margin-top: 4px;\"></i>' : '') + '\\
\t\t\t\t\t\t\t\t<i class=\"fa no-children fa-folder\"></i>\\
\t\t\t\t\t\t\t\t' + dir.label + ' <span class=\"dir-file-count\">' + (dir.files > 0 ? dir.files : '') + '</span>\\
\t\t\t\t\t\t\t</span>\\
\t\t\t\t\t\t</div>\\
\t\t\t\t\t</div>';
\t\t\t\t});

\t\t\t\tchildhtml = childhtml + '</div>';

\t\t\t\t\$('[data-parent=\"' + id + '\"]').remove();

\t\t\t\t\$('#sidebar-folder-' + id).parent().append(\$(childhtml));
\t\t\t\t\$('#sidebar-folder-' + id).find('.fa-circle-notch').hide();
\t\t\t});














\t\t\t\$('.grid-element>.folder,.grid-element.folder').removeClass('active');
\t\t\t\$('#sidebar-folder-' + id).addClass('active');
\t        if(media_xhr && media_xhr.readyState != 4){
\t        \tconsole.log( 'STOP' );
\t            media_xhr.abort();
\t        }

\t        if(id > 0){
\t        \t\$('.del-folder').show();
\t        }else{
\t        \t\$('.del-folder').hide();
\t        }

\t        \$('.grid-element.folder').removeClass('active');
\t        \$('.grid-element.folder[data-id=\"' + id + '\"]').addClass('active');

\t        if(el){
\t        \tif(\$(el).find('i.has-children').length){
\t        \t\tif(\$(el).find('i.has-children').hasClass('fa-plus')){
\t\t\t        \t\$(el).find('i.has-children').toggleClass('fa-plus').toggleClass('fa-minus');
\t\t\t        }
\t\t        \tif(\$(el).find('i.has-children').hasClass('fa-minus')){
\t\t        \t\t\$('.tree-children[data-parent=\"' + id + '\"]').show();
\t\t        \t}/*else{
\t\t        \t\t\$('.tree-children[data-parent=\"' + id + '\"]').hide();
\t\t        \t}*/
\t        \t}
\t        }

\t        \$('#media-list').html('<div class=\"content-loading\"><i class=\"fa fa-circle-notch\"></i> ";
        // line 880
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media wordt geladen..", [], "cms"), "html", null, true);
        echo "</div>');
\t\t\t\$('#file-count').html('..');
\t        // return false;

\t\t\tmedia_xhr = \$.ajax('";
        // line 884
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media");
        echo "' + (typeof id != 'undefined' && id != '' ? '/' + id : '') + '?sort=' + sort + '";
        echo twig_replace_filter(($context["gString"] ?? null), ["?" => "&"]);
        echo "').done(function(r){
\t\t\t\t\$('#file-count').html(r.files.length);

\t\t\t\t\$('.media-breadcrumbs').html(r.crumbs);

\t\t\t\tif(r.depth >= 3){
\t\t\t\t\t\$('.create-folder').hide();
\t\t\t\t}else{
\t\t\t\t\t\$('.create-folder').show();
\t\t\t\t}

\t\t\t\tvar moveUp = '';
\t\t\t\tif(r.parent){
\t\t\t\t\tvar moveUp = '<div class=\"grid-element folder folder-up\" data-id=\"' + r.parent.id + '\">\\
\t\t\t\t\t\t<div class=\"card hoverables\" style=\"cursor:pointer;\" onclick=\"openFolder(this,' + r.parent.id + ')\">\\
\t\t\t\t\t\t\t\\
\t\t\t\t\t\t\t\\
\t\t\t\t\t\t\t<span class=\"card-title\" title=\"' + r.parent.label + '\">\\
\t\t\t\t\t\t\t\t<i class=\"fa fa-arrow-up\"></i>\\
\t\t\t\t\t\t\t\t' + r.parent.label + '\\
\t\t\t\t\t\t\t</span>\\
\t\t\t\t\t\t\t\\
\t\t\t\t\t\t\t<div class=\"list-options\"></div>\\
\t\t\t\t\t\t</div>\\
\t\t\t\t\t</div>';
\t\t\t\t}

\t\t\t\t\$('#media-list').html('<div class=\"folders\">' + moveUp + '</div>');
\t\t\t\tif(r.folders.length){
\t\t\t\t\t\$.each(r.folders, function(ind, f){
\t\t\t\t\t\tvar mediaArea = '';
\t\t\t\t\t\tvar mediaObj = \$('<div class=\"grid-element folder\" data-id=\"' + f.id + '\">\\
\t\t\t\t\t\t\t<div class=\"card hoverables\" style=\"cursor:pointer;\" onclick=\"openFolder(this,' + f.id + ')\">\\
\t\t\t\t\t\t\t\t\\
\t\t\t\t\t\t\t\t\\
\t\t\t\t\t\t\t\t<span class=\"card-title\" title=\"' + f.label + '\">\\
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-folder\"></i>\\
\t\t\t\t\t\t\t\t\t' + f.label + '\\
\t\t\t\t\t\t\t\t</span>\\
\t\t\t\t\t\t\t\t\\
\t\t\t\t\t\t\t\t<div class=\"list-options\"></div>\\
\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t</div>');

\t\t\t\t\t\t\$('#media-list .folders').append(mediaObj);
\t\t\t\t\t});
\t\t\t\t}
\t\t\t\tif(r.files.length){
\t\t\t\t\t\$.each(r.files, function(ind, f){
\t\t\t\t\t\tvar mediaArea = '';
\t\t\t\t\t\tif(f.type == 'images'){
\t\t\t\t\t\t\tmediaArea = f.img_ext + '<div class=\"imagebox\" style=\"background: url(' + f.thumb + ') center; background-size: cover;\">\\
\t\t\t\t\t\t\t\t<img src=\"/bundles/cms/images/transparent_square.gif\" />\\
\t\t\t\t\t\t\t</div>';
\t\t\t\t\t\t}else if(f.type == 'videos'){
\t\t\t\t\t\t\tmediaArea = '<div class=\"imagebox\">\\
\t\t\t\t\t\t\t<video src=\"' + f.path + '\" loop playsinline autoplay muted style=\"width:100%;position: absolute;top: 50%;transform: translateY(-50%);\"></video>\\
\t\t\t\t\t\t\t\t<img src=\"/bundles/cms/images/transparent_square.gif\" />\\
\t\t\t\t\t\t\t</div>';
\t\t\t\t\t\t}else{
\t\t\t\t\t\t\tmediaArea = '<div class=\"imagebox\" style=\"background: url(/bundles/cms/images/filetypes/' + f.file_image + ') center; background-size: 50%;background-repeat:no-repeat;\">\\
\t\t\t\t\t\t\t\t<img src=\"/bundles/cms/images/transparent_square.gif\" />\\
\t\t\t\t\t\t\t</div>';
\t\t\t\t\t\t}

\t\t\t\t\t\tvar mediaObj = \$('<div class=\"grid-element file\" data-id=\"' + f.id + '\">\\
\t\t\t\t\t\t\t<div class=\"card hoverables' + (f.cropped ? ' cropped' : '') + '\" style=\"cursor:pointer;\" onclick=\"loadMedia(\\'' + f.id + '\\', \\'' + f.path + '\\', \\'' + f.label + '\\', \\'' + f.width + '\\');\" data-url=\"' + f.path + '\">\\
\t\t\t\t\t\t\t\t\\
\t\t\t\t\t\t\t\t<div class=\"card-image ' + (f.type == 'images' ? 'images' : 'other') + (f.cropped ? ' cropped' : '') + '\">\\
\t\t\t\t\t\t\t\t\t' + mediaArea + '\\
\t\t\t\t\t\t\t\t\t";
        // line 954
        if ((($context["inline"] ?? null) == false)) {
            echo "<div class=\"card-actions\">\\
\t\t\t\t\t\t\t\t\t\t<div class=\"vtable\">\\
\t\t\t\t\t\t\t\t\t\t\t<div class=\"valign\">\\
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"' + f.url_view + '\"><i class=\"fa fa-search\"></i></a>\\
\t\t\t\t\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t\t\t\t</div>";
        }
        // line 960
        echo "\\
\t\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t\t\t<i class=\"cropped fa fa-cut\"></i>\\
\t\t\t\t\t\t\t\t\\
\t\t\t\t\t\t\t\t<span class=\"card-title\" title=\"' + f.label + '\">\\
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-file\"></i>\\
\t\t\t\t\t\t\t\t\t' + f.label + '\\
\t\t\t\t\t\t\t\t</span>\\
\t\t\t\t\t\t\t\t\\
\t\t\t\t\t\t\t\t<div class=\"list-options\">\\
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"url-' + f.id + '\" value=\"' + f.url + '\" />\\
\t\t\t\t\t\t\t\t\t<span class=\"filesize\">' + f.size_format + '</span>\\
\t\t\t\t\t\t\t\t\t";
        // line 972
        if ((($context["inline"] ?? null) == false)) {
            echo "<span class=\"copyurl\" onclick=\"copyClipboard(\\'url-' + f.id + '\\');\" style=\"cursor:pointer;\">\\
\t\t\t\t\t\t\t\t\t\t\t<i class=\"far fa-clipboard\"></i> Kopieer URL\\
\t\t\t\t\t\t\t\t\t</span>";
        }
        // line 974
        echo "\\
\t\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t</div>');

\t\t\t\t\t\t\$('#media-list').append(mediaObj);
\t\t\t\t\t});
\t\t\t\t}else{
\t\t\t\t\t\$('#media-list').append(\$('<div class=\"col s12 no-media\">";
        // line 982
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er is geen media in deze folder aanwezig", [], "cms"), "html", null, true);
        echo "</div>'));
\t\t\t\t}

\t\t\t\tinitDrag()
\t\t\t});

\t\t}
        clickedOpenClose = false;
\t}
\t";
        // line 991
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 991), "query", [], "any", false, false, false, 991), "get", [0 => "src"], "method", false, false, false, 991))) {
            // line 992
            echo "\t\t";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 992), "query", [], "any", false, false, false, 992), "get", [0 => "src"], "method", false, false, false, 992) == "video-popup")) {
                // line 993
                echo "\t\t\t/* #1 */
\t\t\tfunction loadMedia(mediaid, url, label, width){
\t            addVideo(null, url);
\t\t\t}
\t\t";
            } else {
                // line 998
                echo "\t\t\t/* #2 */
\t\t\tvar ref = ";
                // line 999
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 999), "query", [], "any", false, false, false, 999), "get", [0 => "ref"], "method", false, false, false, 999), "html", null, true);
                echo ";
\t\t\tfunction loadMedia(mediaid, url, label, width){
\t\t\t\twindow.CKEDITOR.tools.callFunction( ref, url );
\t            cpop.close();
\t\t\t}
\t\t";
            }
            // line 1005
            echo "\t";
        } elseif ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 1005), "query", [], "any", false, false, false, 1005), "get", [0 => "CKEditor"], "method", false, false, false, 1005))) {
            // line 1006
            echo "\t\t/* #3 */
\t\tvar ref = ";
            // line 1007
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 1007), "query", [], "any", false, false, false, 1007), "get", [0 => "ref"], "method", false, false, false, 1007), "html", null, true);
            echo ";
\t\tfunction loadMedia(mediaid, url, label, width){
\t\t\twindow.CKEDITOR.tools.callFunction( ref, url );
            cpop.close();
\t\t}
\t";
        } elseif (        // line 1012
($context["composer"] ?? null)) {
            // line 1013
            echo "
\t\t";
            // line 1014
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 1014), "get", [0 => "btn"], "method", false, false, false, 1014)) {
                // line 1015
                echo "\t\t\t/* #4 */
\t\t\tfunction loadMedia(mediaid, url, label, width){
\t\t\t\tlinkSelector(null, 'linkComposerPage', 'linkComposerMedia', '&url=' + encodeURIComponent(url) + '&label=' + encodeURIComponent(label));
\t\t\t}
\t\t";
            } else {
                // line 1020
                echo "\t\t\t/* #5 */
\t\t\tfunction loadMedia(mediaid, url, label, width){
\t\t\t\tclickedPopupMedia(mediaid, url, label, width);
\t            cpop.close();
\t\t\t}
\t\t";
            }
            // line 1026
            echo "\t";
        } elseif (($context["inline"] ?? null)) {
            // line 1027
            echo "\t\t";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 1027), "get", [0 => "btn"], "method", false, false, false, 1027)) {
                // line 1028
                echo "\t\t\t/* #6 */
\t\t\tfunction loadMedia(mediaid, url, label, width){
\t\t\t\tlinkSelector(null, 'linkComposerPage', 'linkComposerMedia', '&url=' + encodeURIComponent(url) + '&label=' + encodeURIComponent(label));
\t\t\t}
\t\t";
            } else {
                // line 1033
                echo "\t\t\t/* #7 */
\t\t\tfunction loadMedia(mediaid, url, label, width){
\t\t\t\tTrinity.ckWriteMedia(url, mediaid);
\t            cpop.close();
\t\t\t}
\t\t";
            }
            // line 1039
            echo "\t";
        } else {
            // line 1040
            echo "\t\t/* #8 */
\t\tfunction loadMedia(mediaid, url, label, width){
\t\t\twindow.location = '";
            // line 1042
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_view");
            echo "/' + mediaid + '?srcdir=' + activeFolder;
\t\t}
\t";
        }
        // line 1045
        echo "
        var lazyloadImages;
        var lazyloadThrottleTimeout;

        function lazyload () {
                lazyloadImages = document.querySelectorAll(\".bg-lazy\");

                if(lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function() {
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function(img) {
                                if(img.offsetTop < (window.innerHeight + scrollTop)) {
                                        img.src = img.dataset.src;
                                        img.classList.remove('bg-lazy');
                                }
                        });
                        if(lazyloadImages.length == 0) {
                                document.removeEventListener(\"scroll\", lazyload);
                                window.removeEventListener(\"resize\", lazyload);
                                window.removeEventListener(\"orientationChange\", lazyload);
                        }
                }, 20);
        }

\t\$().ready(function(){
\t\tmediaFileDrop = \$('#media-dropzone').filedrop(dropzoneConfig).find('.message').html(msg_idle);

\t\tif (document.readyState != 'interactive') {
\t\t\tlazyload();
\t\t}
\t});

\tfunction closeModal(){
        \$('#media-shade,#media-modal').removeClass('show');
\t}

\tfunction humanFileSize(size, dec = 2) {
\t    var i = Math.floor( Math.log(size) / Math.log(1024) );
\t    return ( size / Math.pow(1024, i) ).toFixed(dec) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
\t};
\t</script>

\t<style>
\t#was-form{
\t\tdisplay: none;
\t}
\t</style>

\t<script>
  \tdocument.addEventListener(\"DOMContentLoaded\", function() {
  \t\tconsole.log( 'START LAZY LOADING' );

  \t\tif (\"IntersectionObserver\" in window) {
  \t\t\tlazyloadImages = document.querySelectorAll(\".bg-lazy\");
  \t\t\tvar imageObserver = new IntersectionObserver(function(entries, observer) {
  \t\t\t\tentries.forEach(function(entry) {
  \t\t\t\t\tif (entry.isIntersecting) {
  \t\t\t\t\t\tvar image = entry.target;
  \t\t\t\t\t\timage.classList.remove(\"bg-lazy\");
  \t\t\t\t\t\timageObserver.unobserve(image);
  \t\t\t\t\t}
  \t\t\t\t});
  \t\t\t});

  \t\t\tlazyloadImages.forEach(function(image) {
  \t\t\t\timageObserver.observe(image);
  \t\t\t});
  \t\t} else {
  \t\t\tdocument.addEventListener(\"scroll\", lazyload);
  \t\t\twindow.addEventListener(\"resize\", lazyload);
  \t\t\twindow.addEventListener(\"orientationChange\", lazyload);
  \t\t}
  \t});
\t";
        // line 1121
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 1121), "xmlHttpRequest", [], "any", false, false, false, 1121)) {
            // line 1122
            echo "\t";
        } else {
            // line 1123
            echo "\t\t\$( \"body\" ).addClass( \"page-overview\" );
\t";
        }
        // line 1125
        echo "\t</script>
";
    }

    // line 5
    public function macro_parse_folders($__folders__ = null, $__Parent__ = null, $__depth__ = null, $__selected__ = null, $__multiLang__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "folders" => $__folders__,
            "Parent" => $__Parent__,
            "depth" => $__depth__,
            "selected" => $__selected__,
            "multiLang" => $__multiLang__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 6
            echo "  ";
            $macros["macros"] = $this;
            // line 7
            echo "  <ul class=\"tree-children depth-";
            echo twig_escape_filter($this->env, ($context["depth"] ?? null), "html", null, true);
            echo "\" data-depth=\"";
            echo twig_escape_filter($this->env, ($context["depth"] ?? null), "html", null, true);
            echo "\" data-parent=\"";
            (((($context["depth"] ?? null) > 1)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Parent"] ?? null), "id", [], "any", false, false, false, 7), "html", null, true))) : (print ("null")));
            echo "\" style=\"";
            echo (((($context["depth"] ?? null) > 1)) ? ("display:none;") : (""));
            echo "\">
    ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["folders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Folder"]) {
                // line 9
                echo "      ";
                if ((((($context["depth"] ?? null) == 1) && (null === twig_get_attribute($this->env, $this->source, $context["Folder"], "parent", [], "any", false, false, false, 9))) || (($context["depth"] ?? null) > 1))) {
                    // line 10
                    echo "      <li>
        <span class=\"folder\" style=\"cursor: pointer; position: relative;\" data-id=\"";
                    // line 11
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "id", [], "any", false, false, false, 11), "html", null, true);
                    echo "\" data-depth=\"";
                    echo twig_escape_filter($this->env, ($context["depth"] ?? null), "html", null, true);
                    echo "\" id=\"sidebar-folder-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "id", [], "any", false, false, false, 11), "html", null, true);
                    echo "\">
          ";
                    // line 12
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Folder"], "children", [], "any", false, false, false, 12), "count", [], "any", false, false, false, 12)) {
                        // line 13
                        echo "          <div style=\"display: block;\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "getLabel", [], "any", false, false, false, 13), "html", null, true);
                        echo "\" onclick=\"openFolder(this,";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "id", [], "any", false, false, false, 13), "html", null, true);
                        echo ");";
                        echo (((($context["depth"] ?? null) >= 3)) ? ("\$('.create-folder').hide();") : ("\$('.create-folder').show();"));
                        echo "\">
          ";
                    } else {
                        // line 15
                        echo "          <div style=\"display: block;\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "getLabel", [], "any", false, false, false, 15), "html", null, true);
                        echo "\" onclick=\"openFolder(this,";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "id", [], "any", false, false, false, 15), "html", null, true);
                        echo ");";
                        echo (((($context["depth"] ?? null) >= 3)) ? ("\$('.create-folder').hide();") : ("\$('.create-folder').show();"));
                        echo "\">
          ";
                    }
                    // line 17
                    echo "            ";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Folder"], "children", [], "any", false, false, false, 17), "count", [], "any", false, false, false, 17)) {
                        // line 18
                        echo "            <i class=\"fa has-children fa-plus\" onclick=\"showFolderSubs(this,";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Folder"], "id", [], "any", false, false, false, 18), "html", null, true);
                        echo ");\"></i>
            <i class=\"fa fa-circle-notch fa-spin\" style=\"display:none;\"></i>
            ";
                    }
                    // line 21
                    echo "            <i class=\"fa no-children fa-folder\"></i>

            ";
                    // line 23
                    echo twig_get_attribute($this->env, $this->source, $context["Folder"], "getLabel", [0 => ($context["multiLang"] ?? null)], "method", false, false, false, 23);
                    echo "
\t\t\t";
                    // line 24
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Folder"], "media", [], "any", false, false, false, 24), "count", [], "any", false, false, false, 24) > 0)) {
                        // line 25
                        echo "\t\t\t\t<span class=\"dir-file-count\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Folder"], "media", [], "any", false, false, false, 25), "count", [], "any", false, false, false, 25), "html", null, true);
                        echo "</span>
\t\t\t";
                    }
                    // line 27
                    echo "          </div>
        </span>
      </li>
      ";
                }
                // line 31
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Folder'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "  </ul>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@Cms/media/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1769 => 32,  1763 => 31,  1757 => 27,  1751 => 25,  1749 => 24,  1745 => 23,  1741 => 21,  1734 => 18,  1731 => 17,  1721 => 15,  1711 => 13,  1709 => 12,  1701 => 11,  1698 => 10,  1695 => 9,  1691 => 8,  1680 => 7,  1677 => 6,  1660 => 5,  1655 => 1125,  1651 => 1123,  1648 => 1122,  1646 => 1121,  1568 => 1045,  1562 => 1042,  1558 => 1040,  1555 => 1039,  1547 => 1033,  1540 => 1028,  1537 => 1027,  1534 => 1026,  1526 => 1020,  1519 => 1015,  1517 => 1014,  1514 => 1013,  1512 => 1012,  1504 => 1007,  1501 => 1006,  1498 => 1005,  1489 => 999,  1486 => 998,  1479 => 993,  1476 => 992,  1474 => 991,  1462 => 982,  1452 => 974,  1446 => 972,  1432 => 960,  1422 => 954,  1347 => 884,  1340 => 880,  1266 => 809,  1204 => 750,  1189 => 738,  1146 => 698,  1038 => 593,  1034 => 592,  1028 => 589,  1024 => 587,  999 => 566,  997 => 565,  994 => 564,  990 => 562,  988 => 561,  982 => 558,  977 => 556,  973 => 554,  967 => 551,  962 => 549,  958 => 547,  956 => 546,  946 => 539,  932 => 528,  922 => 520,  905 => 502,  899 => 499,  895 => 498,  892 => 497,  889 => 496,  887 => 495,  883 => 493,  877 => 490,  874 => 489,  871 => 488,  862 => 484,  852 => 480,  850 => 479,  846 => 478,  838 => 477,  831 => 473,  818 => 471,  812 => 467,  806 => 463,  802 => 461,  797 => 458,  794 => 457,  788 => 454,  783 => 453,  777 => 450,  773 => 449,  770 => 448,  768 => 447,  763 => 445,  759 => 444,  756 => 443,  752 => 441,  750 => 440,  744 => 439,  741 => 438,  739 => 437,  725 => 436,  718 => 433,  716 => 432,  711 => 431,  709 => 430,  706 => 429,  703 => 428,  690 => 421,  683 => 419,  677 => 417,  675 => 416,  670 => 415,  668 => 414,  665 => 413,  658 => 408,  650 => 406,  644 => 404,  642 => 403,  636 => 400,  633 => 399,  630 => 398,  628 => 388,  620 => 382,  612 => 377,  608 => 376,  604 => 375,  600 => 374,  596 => 373,  592 => 372,  588 => 370,  586 => 366,  584 => 365,  575 => 360,  559 => 347,  541 => 332,  536 => 329,  533 => 327,  529 => 325,  522 => 321,  511 => 315,  504 => 311,  499 => 309,  496 => 308,  494 => 307,  491 => 306,  488 => 305,  486 => 304,  479 => 300,  473 => 297,  463 => 294,  459 => 292,  452 => 288,  448 => 286,  442 => 284,  439 => 283,  435 => 281,  424 => 279,  420 => 278,  417 => 277,  414 => 276,  412 => 275,  406 => 271,  402 => 269,  398 => 267,  396 => 266,  388 => 261,  329 => 205,  325 => 204,  322 => 203,  318 => 202,  316 => 201,  299 => 187,  291 => 184,  283 => 179,  272 => 171,  265 => 167,  258 => 163,  246 => 154,  239 => 150,  219 => 133,  209 => 126,  205 => 125,  201 => 124,  197 => 123,  188 => 117,  184 => 116,  180 => 115,  176 => 114,  172 => 113,  168 => 112,  164 => 111,  157 => 106,  148 => 99,  146 => 98,  103 => 57,  100 => 56,  97 => 55,  93 => 53,  89 => 51,  87 => 50,  77 => 43,  73 => 41,  70 => 40,  67 => 39,  64 => 38,  61 => 37,  58 => 36,  54 => 35,  47 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/media/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/media/index.html.twig");
    }
}
