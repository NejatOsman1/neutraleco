window.onload = function() {
    var buttons = document.getElementsByClassName('dropzone-btn');
    var upload = buttons[0];
    if(typeof upload !== 'undefined'){
        upload.setAttribute("type", "button");
    }    
};

$(function () {
    $('select.select2').select2({
        minimumResultsForSearch: 'Infinity',
    });

    //If omheen die checkt of er wel een dropzone is.
    var callerEl = null;

    var totalUploadSize = 0;
    var fileDrop;
    var dropped = 0;

    var allowedDocTypes = ['application/doc', 'application/excel', 'application/pdf', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/x-zip-compressed', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ,'application/powerpoint', 'application/rtf', 'application/vnd.apple.keynote', 'application/vnd.apple.numbers', 'application/vnd.apple.pages', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/x-rar-compressed', 'application/zip', 'text/csv'];
    var allowedMediaTypes = ['image/bmp', 'image/gif', 'image/jpeg', 'image/jpeg', 'image/png', 'image/svg+xml'];

    var allowedTypes = $.merge($.merge([], allowedMediaTypes), allowedDocTypes);
    
    if(!(typeof question_id !== 'undefined'))return;
    var dropzone = $('#dropzone-' + question_id);

    if (dropzone) {
        fileDrop = $('#dropzone-' + question_id).filedrop({
            fallback_id: 'upload_button',   // an identifier of a standard file input element, becomes the target of "click" events on the dropzone
            url: upload_url,			  // upload handler, handles each file separately, can also be a function taking the file and returning a url
            paramname: 'file',		  // POST parameter name used on serverside to reference file, can also be a function taking the filename and returning the paramname
            withCredentials: true,		  // make a cross-origin request with cookies
//                data: {
//                    entryid: '{{Question.id}}',		   // send POST variables
//                },
            /*headers: {		  // Send additional request headers
                'header': 'value'
            },*/
            error: function (err, file) {
                switch (err) {
                    case 'BrowserNotSupported':
                        alert('{{ browser does not support HTML5 drag and drop | trans }}');
                        break;
                    case 'TooManyFiles':
                        $('.dropzone-msg').html(err_maxfiles);
                        // user uploaded more than 'maxfiles'
                        break;
                    case 'FileTooLarge':
                        $('.dropzone-msg').html(err_filesize);
                        // program encountered a file whose size is greater than 'maxfilesize'
                        // FileTooLarge also has access to the file which was too large
                        // use file.name to reference the filename of the culprit file
                        break;
                    case 'FileTypeNotAllowed':
                        var err_filetype = file_type + file.type + '"' + text1 + '</strong><ul><li>' + allowedTypes.join('</li><li>') + '</li></ul>';
                        $('.dropzone-msg').html(err_filetype);
                        // The file type is not in the specified list 'allowedfiletypes'
                        break;
                    case 'FileExtensionNotAllowed':
                        $('.dropzone-msg').html(err_fileext);
                        // The file extension is not in the specified list 'allowedfileextensions'
                        break;
                    default:
                        break;
                }
            },
            allowedfiletypes: allowedTypes,   // filetypes allowed by Content-Type.  Empty array means no restrictions
            allowedmediafiletypes: allowedMediaTypes,
            allowedfileextensions: [], // file extensions allowed. Empty array means no restrictions
            maxfiles: 8,
            maxfilesize: maxFileSize,	// max file size in MBs
            maxmediafilesize: maxMediaFileSize, // max images file size in KB's
            dragOver: function () {
                //console.info('Entering dropzone');
                // user dragging files over #dropzone
                $('#dropzone-' + question_id).addClass('hover').find('.dropzone-msg').html(msg_hover);
            },
            dragLeave: function () {
                //console.info('Leaving dropzone');
                $('#dropzone-' + question_id).removeClass('hover').find('.dropzone-msg').html(msg_idle);
            },
            docOver: function () {
                // user dragging files anywhere inside the browser document window
            },
            docLeave: function () {
                // user dragging files out of the browser document window
            },
            drop: function () {
                // user drops file
                //console.info('File dropped');
                $('#modal .modal-content .files').html('');
                $('.file-upload-totals').find('div.progress-bar').removeClass('finished');
                $('.file-upload-totals').find('div.progress').css('width', '0%');
                $('#shade,#modal').addClass('show');
                totalUploadSize = 0;
                dropped = 0;
                $('.cancel-btn').show();
            },
            uploadStarted: function (i, file, len) {
                // console.info('Start upload.');
                $($('.file-upload-preview').get(i)).find('i.fa').attr('class', 'fa fa-fw fa-upload');
                // a file began uploading
                // i = index => 0, 1, 2, 3, 4 etc
                // file is the actual file of the index
                // len = total files user dropped
            },
            uploadFinished: function (i, file, response, time) {
                if (response.status) {
                    $('#new_media').val($('#new_media').val() + ',' + response.mediaid);
                    //console.info('Start finished.', file);
                    $($('.file-upload-preview').get(i)).find('i.fa').attr('class', 'fa fa-fw fa-check');
                    $($('.file-upload-preview').get(i)).find('div.progress-bar').addClass('finished');
                    // response is the data you got back from server in JSON format.

                    var imgUrl = '/' + response.webpath;

                    var splitted = imgUrl.split('.');
                    var extention = splitted[splitted.length -1];
                    var classname = '';

                    switch (extention) {
                        case 'pdf':
                            classname = "fas fa-file-pdf";
                            break;
                        case 'zip':
                            classname = 'fas fa-file-archive';
                            break;
                        case 'ppt', 'pptx':
                            classname = 'fas fa-file-powerpoint';
                            break;
                        case 'docx':
                            classname = 'fas fa-file-word';
                            break;
                        case 'xlsx':
                            classname = 'fas fa-file-excel';
                            break;
                    }

                    var fileEl = $('<div class="item preview-element" data-mediaid="' + response.mediaid + '">\
						<div class="media-preview-wrap ' + classname + '"><img class="media-preview" src="' + imgUrl + '" alt=""></div>\
						<a onclick="deleteMedia(this, ' + response.mediaid + ');"><i class="fa fa-times"></i> ' + lbl_delete + '</a>\
					    </div>');

                    $('#preview-' + question_id).append(fileEl);

                    refreshMedia();
                }
            },
            progressUpdated: function (i, file, progress) {
                // console.info('File progress:', progress, file);
                $($('.file-upload-preview').get(i)).find('div.progress').css('width', progress + '%');
                // this function is used for large files and updates intermittently
                // progress is the integer value of file being uploaded percentage to completion
            },
            globalProgressUpdated: function (progress) {
                // console.info('Global progress:', progress);
                $('.file-upload-totals').find('div.progress').css('width', progress + '%');
                // progress for all the files uploaded on the current instance (percentage)
                // ex: $('#progress div').width(progress+"%");
            },
            speedUpdated: function (i, file, speed) {
                // console.info('Speed changed:', speed, file);
                // $('.file-upload-totals').find('span.size').html(humanFileSize(totalUploadSize, 1));
                // speed in kb/s
            },
            rename: function (name) {
                // console.info('Rename:', name);
                // name in string format
                // must return alternate name as string
            },
            beforeEach: function (file) {
                // console.info('Before file', file);
                var date = new Date(file.lastModified);
                var months = ['jan.', 'feb.', 'mar.', 'apr.', 'may.', 'jun.', 'jul.', 'aug.', 'sep.', 'oct.', 'nov.', 'dec.'];
                var year = date.getFullYear();
                var month = months[date.getMonth()];
                var day = date.getDate();
                var hour = date.getHours();
                var min = date.getMinutes();
                var sec = date.getSeconds();
                var fileInfo = $('<div class="file-upload-preview"> \
								<span class="label"><i class="fa fa-fw fa-clock-o"></i>' + file.name + '</span> \
								<div class="right"> \
										<span class="modified">' + day + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec + '</span> \
										<span class="size">' + humanFileSize(file.size, 1) + '</span> \
										<span class="progress">0 %</span> \
										<a href="#" class="delete"></a> \
								</div> \
								<div class="progress-bar"><div class="progress" style="width:0%;"></div></div> \
						</div>');
                $('#modal .modal-content .files').append(fileInfo);
                totalUploadSize += file.size;
                $('.file-upload-totals').find('span.size').html(humanFileSize(totalUploadSize, 1));
                dropped++;
                // file is a file object
                // return false to cancel upload
            },
            beforeSend: function (file, i, done) {
                if (dropped <= 0) {
                    $('.totals').hide();
                }
                // console.info('Before send', file);
                // file is a file object
                // i is the file index
                // call done() to start the upload
                done(); // Start upload
                $('#dropzone-' + question_id).removeClass('hover').find('.dropzone-msg').html(msg_uploading)
            },
            afterAll: function () {
                //console.log('after all');
                // console.info('After all');
                // runs after all files have been uploaded or otherwise dealt with
                $('.file-upload-totals').find('div.progress-bar').addClass('finished');
                $('#dropzone-' + question_id).removeClass('hover').find('.dropzone-msg').html(msg_done_idle)

                // window.location = window.location.href;
                $('#shade,#modal').removeClass('show');
            }
        }).find('.dropzone-msg').html(msg_idle);


        $('#forms-bundle-form').on('submit', function (e) {
            // e.preventDefault();

            if ($('.form-question > .fields-parent > .field-child > .type-email_check').length > 0 && $('.form-question > .fields-parent > .field-child > .type-email').length > 0) {
                if ($('.form-question > .fields-parent > .field-child > .type-email_check input').val() == $('.form-question > .fields-parent > .field-child > .type-email input').val()) {
                    $('.form-question > .fields-parent > .field-child > .type-email_check .error').hide();
                    return true;
                } else {
                    $('.form-question > .fields-parent > .field-child > .type-email_check .error').show();
                }
            } else {
                return true;
            }

            return false;
        });


        $.each($('.field.required.checkbox'), function (ind, group) {
            var inputs = $(group).find('input');
            inputs.change(function () {
                if (inputs.is(':checked')) {
                    inputs.removeAttr('required');
                } else {
                    inputs.attr('required', 'required');
                }
            });

            if (inputs.is(':checked')) {
                console.log('remove required');
                inputs.removeAttr('required');
            } else {
                console.log('add required');
                inputs.attr('required', 'required');
            }
        });

        $.each($('.signature-pad'), function (e) {
            var id = $(this).data('id');

            var canvas = document.getElementById("signature-" + id);

            var cancelButton = document.getElementById('clear-' + id);

            var signaturePad = new SignaturePad(canvas, {
                minWidth: 1,
                maxWidth: 1
            });

            cancelButton.addEventListener('click', function (event) {
                signaturePad.clear();
            });

            $('#signature-' + id).on('touchend mouseout', function (event) {

                var data = signaturePad.toDataURL('image/png');

                $("#sign-" + id).val(data);
            });
        });

        //{% if saved %}
//		$([document.documentElement, document.body]).animate({
//	        scrollTop: $(".plugin-forms").offset().top
//	    }, 700);
        //{% endif %}

        $.each($('[data-type="checkbox"]'), function (i, checkboxGroup) {
            $(checkboxGroup).find('input[type="checkbox"]').click(function () {
                console.log('clicked', this);
                var oneChecked = ($('input[type="checkbox"]:checked').length > 0);
                if (oneChecked) {
                    console.log('Disable require');
                    $('input[type="checkbox"]').prop('required', false);
                } else {
                    console.log('Enable require');
                    $('input[type="checkbox"]').prop('required', true);
                }
            });

            var oneChecked = ($('input[type="checkbox"]:checked').length > 0);
            console.log(oneChecked);
            if (oneChecked) {
                console.log('Disable require');
                $('input[type="checkbox"]').prop('required', false);
            } else {
                console.log('Enable require');
                $('input[type="checkbox"]').prop('required', true);
            }
        });
    }
});

function refreshMedia() {
    var newMedialist = [];
    $.each($('.preview-element'), function (ind, pv) {
        var id = $(pv).data('mediaid');
        newMedialist.push(id);
    });

    $('#images-' + question_id).val(newMedialist.join(','));
}

function deleteMedia(delBtn, media) {
    if (confirm(lbl_confirm)) {
        $(delBtn).closest('.preview-element').remove();

        refreshMedia();
    }
}

function closeModal() {
    $('#shade,#modal').removeClass('show');
}

function humanFileSize(size, dec) {
    dec = dec || 2;

    var i = Math.floor(Math.log(size) / Math.log(1024));
    return (size / Math.pow(1024, i)).toFixed(dec) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
};

function clickedPopupMedia(mediaid, filepath, label, width) {
    $('#meta-field-' + mediaField).val(filepath);
    $('#meta-image-' + mediaField).html('<img src="' + filepath + '" style="max-width: 100%;max-height: 100%;" /><button style="" type="button" onclick="deleteMetaImage(' + mediaField + ');" class="btn red darken-1 del_btn"><i class="far fa-trash-alt"></i></button>');
    $('#meta-imageselect-' + mediaField).hide();
    cpop.close();
}

function deleteMetaImage(id) {
    $('#meta-field-' + id).val('');
    $('#meta-image-' + id).html('');
    $('#meta-imageselect-' + id).show();
}
