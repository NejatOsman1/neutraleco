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

/* @TrinityBlog/entry/addcategory.html.twig */
class __TwigTemplate_13084bcb5d578fda4cedbcb9425b8c6e extends Template
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
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@Cms/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityBlog/entry/addcategory.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuws", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "    ";
        if (($context["saved"] ?? null)) {
            // line 8
            echo "        <div class=\"card\">
            <div class=\"card-content text-center\">
                <i class=\"fa fa-3x fa-check-circle\"></i>
                <h3 class=\"mt-3\">";
            // line 11
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De categorie is succesvol toegevoegd", [], "cms"), "html", null, true);
            echo "</h3>
            </div>
        </div>

        <script>setTimeout(function(){ window.location = '";
            // line 15
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry", ["id" => twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "id", [], "any", false, false, false, 15)]), "html", null, true);
            echo "'; }, 1000);</script>
    ";
        } else {
            // line 17
            echo "    <div class=\"card\">
        <div class=\"card-content\">
            <div class=\"card-title\"><h6>Categorie</h6></div>
            ";
            // line 20
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
            echo "
            <input type=\"hidden\" class=\"image-input\" id=\"image-input\" name=\"image-input\" value=\"";
            // line 21
            if ((twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "image", [], "any", true, true, false, 21) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "image", [], "any", false, false, false, 21)))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "image", [], "any", false, false, false, 21), "id", [], "any", false, false, false, 21), "html", null, true);
            }
            echo "\">

            ";
            // line 23
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "category", [], "any", false, false, false, 23), 'row', ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel", [], "cms")]);
            echo "
            ";
            // line 24
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "intro", [], "any", false, false, false, 24), 'row', ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Introtekst", [], "cms")]);
            echo "

            <div class=\"form-label\">Afbeelding uploaden</div>

            <a class=\"right btn btn-gray  mb-3\" onclick=\"";
            // line 28
            echo "addMediaTest(this, 'extra1');\">Selecteer een afbeelding</a>

            <div style=\"display:none;\" id=\"dropzone\"><span class=\"message\"></span></div>

            <div id=\"image-field\" class=\"image-field\">
                ";
            // line 33
            if ((twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "image", [], "any", true, true, false, 33) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "image", [], "any", false, false, false, 33)))) {
                // line 34
                echo "                    <div class=\"img-thumb\">
                      <img src=\"/uploads/images/";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "image", [], "any", false, false, false, 35), "path", [], "any", false, false, false, 35), "html", null, true);
                echo "\" alt=\"\">
                      <div class=\"btns\">
                        <a data-type=\"extra1\" data-uri=\"/admin/projects/media/delete/category/";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "id", [], "any", false, false, false, 37), "html", null, true);
                echo "\" onclick=\"deleteMedia(this);\" class=\"btn btn-icon red\"><i class=\"far fa-trash-alt\"></i></a>
                      </div>
                    </div>
                ";
            }
            // line 41
            echo "            </div>
        </div>
    </div>

    <div class=\"btn-bar\">
        <div class=\"left\">
        </div>
        <div class=\"right\">
            <a href=\"#\" class=\"btn btn-flat\" onClick=\"history.back()\"><i class=\"fa fa-arrow-left\"></i> ";
            // line 49
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Terug", [], "cms"), "html", null, true);
            echo "</a>
            <button type=\"submit\"  class=\"btn\"><i class=\"material-icons left\">save</i>";
            // line 50
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "cms"), "html", null, true);
            echo "</button>
        </div>
    </div>

    ";
            // line 54
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
            echo "

    <form method=\"post\" enctype=\"multipart/form-data\">
        <input type=\"hidden\" id=\"mediadirid\" name=\"mediadirid\" value=\"";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Mediadir"] ?? null), "id", [], "any", false, false, false, 57), "html", null, true);
            echo "\" />
        <input type=\"hidden\" name=\"manual_upload\" value=\"1\" />
        <input type=\"file\" name=\"media[]\" id=\"upload_button\" />
        <button type=\"submit\">";
            // line 60
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden", [], "cms"), "html", null, true);
            echo "</button>
    </form>

    <script src=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/ckeditor/ckeditor.js"), "html", null, true);
            echo "\"></script>
    <script type=\"text/javascript\" src=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/jquery.filedrop.js"), "html", null, true);
            echo "\"></script>
    <script type=\"text/javascript\">

        function deleteMedia(el){
            var uri = \$(el).data('uri');
            cpop.confirm('Weet u zeker dat u dit bestand wilt verwijderen?', function(){
                \$(el).closest('.img-thumb').remove();

                if(\$('.img-thumb').length == 0){
                    \$('#preview-card').hide();
                }

                \$('.image-input').val('');

                cpop.close();
            });
        }

        var totalUploadSize = 0;
        var fileDrop;
        var dropped = 0;

        var allowedDocTypes = ['text/plain', 'text/richtext', 'application/msword', 'application/excel', 'application/vnd.ms-excel', 'application/x-excel', 'application/x-msexcel', 'application/pdf', 'application/mspowerpoint', 'application/powerpoint', 'application/vnd.ms-powerpoint', 'application/x-mspowerpoint', 'application/x-iwork-keynote-sffkey', 'application/x-iwork-numbers-sffnumbers', 'application/vnd.apple.keynote', 'application/vnd.apple.pages', 'application/vnd.apple.numbers', 'text/html', 'text/css', 'text/php', 'text/asp', 'text/x-c', 'text/x-script.csh', 'text/x-script.elisp', 'text/x-setext', 'text/webviewhtml', 'text/x-java-source', 'text/x-pascal', 'text/pascal', 'text/x-script.perl', 'text/x-script.perl-module', 'text/x-script.phyton', 'text/x-asm', 'text/sgml', 'text/x-sgml', 'text/x-script.sh', 'text/x-server-parsed-html', 'text/uri-list', 'text/x-uuencode', 'video/msvideo', 'video/avi', 'video/x-msvideo', 'video/mpeg', 'video/mp4', 'video/quicktime', 'audio/basic', 'audio/x-midi', 'audio/mpeg', 'audio/vorbis', 'audio/ogg', 'audio/x-pn-realaudio', 'audio/vnd.rn-realaudio', 'audio/wav', 'audio/x-wav', 'application/x-rar-compressed', 'application/octet-stream', 'application/zip', 'application/csv', 'text/csv'];
        var allowedMediaTypes = ['image/bmp', 'image/gif', 'image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff'];

        var allowedTypes = \$.merge( \$.merge([], allowedMediaTypes), allowedDocTypes)

        \$().ready(function(){
            var msg_idle = '";
            // line 92
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep hier bestanden naar toe of klik hier om deze toe te voegen.", [], "cms"), "html", null, true);
            echo "';
            var msg_hover = '";
            // line 93
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Laat los om toe te voegen.", [], "cms"), "html", null, true);
            echo "';
            var msg_uploading = '";
            // line 94
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met uploaden...", [], "cms"), "html", null, true);
            echo "';
            var msg_done_idle = '";
            // line 95
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden voltooid!", [], "cms"), "html", null, true);
            echo "';

            fileDrop = \$('#dropzone').filedrop({
                fallback_id: 'upload_button',   // an identifier of a standard file input element, becomes the target of \"click\" events on the dropzone
                url: '";
            // line 99
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_cat_handler", ["id" => twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "id", [], "any", false, false, false, 99), "type" => "category"]), "html", null, true);
            echo "',              // upload handler, handles each file separately, can also be a function taking the file and returning a url
                paramname: 'media',          // POST parameter name used on serverside to reference file, can also be a function taking the filename and returning the paramname
                withCredentials: true,          // make a cross-origin request with cookies
                /*headers: {          // Send additional request headers
                    'header': 'value'
                },*/
                error: function(err, file) {
                    switch(err) {
                        case 'BrowserNotSupported':
                            alert('browser does not support HTML5 drag and drop')
                            break;
                        case 'TooManyFiles':
                            // user uploaded more than 'maxfiles'
                            break;
                        case 'FileTooLarge':
                            cpop.loadHtml('Bestand is te groot. Maximaal toegestaan:<br />Media bestanden: ";
            // line 114
            echo twig_escape_filter($this->env, ($context["maxMediaFileSize"] ?? null), "html", null, true);
            echo " KB<br />Alle overige bestanden: ";
            echo twig_escape_filter($this->env, ($context["maxFileSize"] ?? null), "html", null, true);
            echo " MB');
                            // program encountered a file whose size is greater than 'maxfilesize'
                            // FileTooLarge also has access to the file which was too large
                            // use file.name to reference the filename of the culprit file
                            break;
                        case 'FileTypeNotAllowed':
                            cpop.loadHtml('Bestandstype \\'' + file.type + '\\' is niet toegestaan.<br/><br/><strong>Toegestane bestanden:</strong><ul><li>' + allowedTypes.join('</li><li>') + '</li></ul>');
                            // The file type is not in the specified list 'allowedfiletypes'
                            break;
                        case 'FileExtensionNotAllowed':
                            // The file extension is not in the specified list 'allowedfileextensions'
                            break;
                        default:
                            break;
                    }
                },
                allowedfiletypes: allowedTypes,   // filetypes allowed by Content-Type.  Empty array means no restrictions
                allowedmediafiletypes: allowedMediaTypes,
                allowedfileextensions: [], // file extensions allowed. Empty array means no restrictions
                maxfiles: 10,
                maxfilesize: ";
            // line 134
            echo twig_escape_filter($this->env, ($context["maxFileSize"] ?? null), "html", null, true);
            echo ",    // max file size in MBs
                maxmediafilesize: ";
            // line 135
            echo twig_escape_filter($this->env, ($context["maxMediaFileSize"] ?? null), "html", null, true);
            echo ", // max images file size in KB's
                dragOver: function() {
                    // console.info('Entering dropzone');
                    // user dragging files over #dropzone
                    \$('#dropzone').addClass('hover').find('.message').html(msg_hover);
                },
                dragLeave: function() {
                    // console.info('Leaving dropzone');
                    \$('#dropzone').removeClass('hover').find('.message').html(msg_idle)
                },
                docOver: function() {
                    // user dragging files anywhere inside the browser document window
                },
                docLeave: function() {
                    // user dragging files out of the browser document window
                },
                drop: function() {
                    // user drops file
                    // console.info('File dropped');
                    \$('#modal .modal-content .files').html('');
                    \$('.file-upload-totals').find('div.progress-bar').removeClass('finished');
                    \$('.file-upload-totals').find('div.progress').css('width', '0%');
                    \$('#shade,#modal').addClass('show');
                    totalUploadSize = 0;
                    dropped = 0;
                    \$('.cancel-btn').show();
                },
                uploadStarted: function(i, file, len){
                    // console.info('Start upload.');
                    \$(\$('.file-upload-preview').get(i)).find('i.fa').attr('class', 'fa fa-fw fa-upload');
                    // a file began uploading
                    // i = index => 0, 1, 2, 3, 4 etc
                    // file is the actual file of the index
                    // len = total files user dropped
                },
                uploadFinished: function(i, file, response, time) {
                    //\$('#preview-card').show();
                    // console.info('Start finished.', file);
                    //\$(\$('.file-upload-preview').get(i)).find('i.fa').attr('class', 'fa fa-fw fa-check');
                    //\$(\$('.file-upload-preview').get(i)).find('div.progress-bar').addClass('finished');
                    // response is the data you got back from server in JSON format.
                    var imgUrl = '/uploads/images/' + response.path;
                        /*\$('#preview').append(\$('<div class=\"img-thumb\" style=\"margin:0 5px 5px 0;width:130px;float: left;border:solid 1px #ddd;border-radius:5px;height:100px;display:inline-block;background:url(' + imgUrl + ') no-repeat;background-size:contain;background-position:center;\">\\
                                <input type=\"hidden\" name=\"media_sort[]\" value=\"' + response[0].id + '\">\\
                            </div>'));*/
                        \$('.image-field').empty();
                        \$('.image-input').val(response.id);
                        /*\$('.image-field').append(\$('<div class=\"img-thumb\" style=\"margin:0 5px 5px 0;width:130px;float: left;border:solid 1px #ddd;border-radius:5px;height:100px;display:inline-block;background:url(' + filepath + ') no-repeat;background-size:contain;background-position:center;\">\\
                            <input type=\"hidden\" name=\"media_sort[]\" value=\"' + mediaid + '\">\\
                            <a style=\"cursor:pointer;\" data-uri=\"nope\" onclick=\"deleteMedia(this);\"><i class=\"material-icons red-text text-lighten-2\">clear</i></a>\\
                            </div>'));*/
                        \$('.image-field').append(\$('<div class=\"img-thumb\">\\
                            <img src=\"' + imgUrl + '\" alt=\"\">\\
                            <div class=\"btns\">\\
                            <a data-type=\"extra1\" data-uri=\"nope\" onclick=\"deleteMedia(this);\" class=\"btn btn-icon red\"><i class=\"far fa-trash-alt\"></i></a>\\
                            </div>\\
                        </div>'));
                },
                progressUpdated: function(i, file, progress) {
                    // console.info('File progress:', progress, file);
                    \$(\$('.file-upload-preview').get(i)).find('div.progress').css('width', progress + '%');
                    // this function is used for large files and updates intermittently
                    // progress is the integer value of file being uploaded percentage to completion
                },
                globalProgressUpdated: function(progress) {
                    // console.info('Global progress:', progress);
                    \$('.file-upload-totals').find('div.progress').css('width', progress + '%');
                    // progress for all the files uploaded on the current instance (percentage)
                    // ex: \$('#progress div').width(progress+\"%\");
                },
                speedUpdated: function(i, file, speed) {
                    // console.info('Speed changed:', speed, file);
                    // \$('.file-upload-totals').find('span.size').html(humanFileSize(totalUploadSize, 1));
                    // speed in kb/s
                },
                rename: function(name) {
                    // console.info('Rename:', name);
                    // name in string format
                    // must return alternate name as string
                },
                beforeEach: function(file) {
                    // console.info('Before file', file);
                    var date = new Date(file.lastModified);
                    var months = ['jan.','feb.','mar.','apr.','may.','jun.','jul.','aug.','sep.','oct.','nov.','dec.'];
                    var year = date.getFullYear();
                    var month = months[date.getMonth()];
                    var day = date.getDate();
                    var hour = date.getHours();
                    var min = date.getMinutes();
                    var sec = date.getSeconds();
                    var fileInfo = \$('<div class=\"file-upload-preview\"> \\
                        <span class=\"label\"><i class=\"fa fa-fw fa-clock-o\"></i>' + file.name + '</span> \\
                        <div class=\"right\"> \\
                            <span class=\"modified\">' + day + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec + '</span> \\
                            <span class=\"size\">' + humanFileSize(file.size, 1) + '</span> \\
                            <span class=\"progress\">0 %</span> \\
                            <a href=\"#\" class=\"delete\"></a> \\
                        </div> \\
                        <div class=\"progress-bar\"><div class=\"progress\" style=\"width:0%;\"></div></div> \\
                    </div>');
                    \$('#modal .modal-content .files').append(fileInfo);
                    totalUploadSize += file.size;
                    \$('.file-upload-totals').find('span.size').html(humanFileSize(totalUploadSize, 1));
                    dropped++;
                    // file is a file object
                    // return false to cancel upload
                },
                beforeSend: function(file, i, done) {
                    if(dropped <= 0){
                        \$('.totals').hide();
                    }
                    // console.info('Before send', file);
                    // file is a file object
                    // i is the file index
                    // call done() to start the upload
                    done(); // Start upload
                    \$('#dropzone').removeClass('hover').find('.message').html(msg_uploading)
                },
                afterAll: function() {
                    console.log('after all');
                    // console.info('After all');
                    // runs after all files have been uploaded or otherwise dealt with
                    \$('.file-upload-totals').find('div.progress-bar').addClass('finished');
                    \$('#dropzone').removeClass('hover').find('.message').html(msg_done_idle)

                    // window.location = window.location.href;
                    \$('#shade,#modal').removeClass('show');
                    \$( \".sortable\" ).sortable();
                }
            }).find('.message').html(msg_idle);
        });

        function closeModal(){
            \$('#shade,#modal').removeClass('show');
        }

        var callerEl = null;
        function addMedia(el){
            callerEl = \$(el);
            cpop.large().loadAjax('";
            // line 274
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => 0, "type" => "all", "inline" => 1, "composer" => 1]), "html", null, true);
            echo "');
            return false;
        }

        function addMediaTest(el, type){
            callerEl = \$(el);
            cpop.large().loadAjax('";
            // line 280
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => 0, "type" => "all", "inline" => 1, "composer" => 1]), "html", null, true);
            echo "');
            return false;
        }

        function clickedPopupMedia(mediaid, filepath, label, width){
            \$('.image-field').empty();
            \$('.image-input').val(mediaid);
            /*\$('.image-field').append(\$('<div class=\"img-thumb\" style=\"margin:0 5px 5px 0;width:130px;float: left;border:solid 1px #ddd;border-radius:5px;height:100px;display:inline-block;background:url(' + filepath + ') no-repeat;background-size:contain;background-position:center;\">\\
                <input type=\"hidden\" name=\"media_sort[]\" value=\"' + mediaid + '\">\\
                <a style=\"cursor:pointer;\" data-uri=\"nope\" onclick=\"deleteMedia(this);\"><i class=\"material-icons red-text text-lighten-2\">clear</i></a>\\
                </div>'));*/
            \$('.image-field').append(\$('<div class=\"img-thumb\">\\
                <img src=\"' + filepath + '\" alt=\"\">\\
                <div class=\"btns\">\\
                <a data-type=\"extra1\" data-uri=\"nope\" onclick=\"deleteMedia(this);\" class=\"btn btn-icon red\"><i class=\"far fa-trash-alt\"></i></a>\\
                </div>\\
            </div>'));
        }

        function deleteImage(id){
            \$('#meta-field-' + id).val('');
            \$('#meta-image-' + id).html('');
            \$('#meta-imageselect-' + id).show();
        }

        function humanFileSize(size, dec = 2) {
            var i = Math.floor( Math.log(size) / Math.log(1024) );
            return ( size / Math.pow(1024, i) ).toFixed(dec) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
        };
        </script>
";
        }
    }

    public function getTemplateName()
    {
        return "@TrinityBlog/entry/addcategory.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  420 => 280,  411 => 274,  269 => 135,  265 => 134,  240 => 114,  222 => 99,  215 => 95,  211 => 94,  207 => 93,  203 => 92,  172 => 64,  168 => 63,  162 => 60,  156 => 57,  150 => 54,  143 => 50,  139 => 49,  129 => 41,  122 => 37,  117 => 35,  114 => 34,  112 => 33,  105 => 28,  98 => 24,  94 => 23,  87 => 21,  83 => 20,  78 => 17,  73 => 15,  66 => 11,  61 => 8,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityBlog/entry/addcategory.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/BlogBundle/Resources/views/entry/addcategory.html.twig");
    }
}
