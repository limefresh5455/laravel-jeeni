let addShowcasePopup = $('#addShowcasePopup');
let btnSubmit = $('#btnSubmitProfile');
let uploadTrackPopup = $('#uploadTrackPopup');
let deleteTrackPopup = $('#deleteTrack');
let hdnDeleteTrackId = $('#hdnDeleteTrackId');
let channelCheckboxes = document.querySelectorAll(".channelCheckbox");
let selectedChannelsContainer = document.querySelector(".selectChannelsContainer");
$("#frmAddShowcase").validate({
    ignore: ":hidden",
    rules: {
        nameShowcase: {
            required: true
        },
        descriptionShowcase: {
            required: true
        },
        /*thumbnailShowcase: {
            required: true
        }*/
    },
    errorElement: "em",
    errorPlacement: function (error, element) {
        element.parents(".w-100").addClass("has-feedback");
        error.addClass("help-block");
        error.insertAfter(element);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass("error-col");
        $(element).parents(".w-100").addClass("has-error").removeClass("has-success");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("error-col");
        $(element).siblings('.form-control-feedback').remove();
        $(element).siblings('.help-block').remove();
    },
    submitHandler: function (form) {
        let formData = new FormData(form);
        $.ajax({
            url: $(form).attr('action'),
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                toggleFrontLoader('show');
            },
            success: function (data) {
                if (data.hasOwnProperty('error')) {
                    flashErrorMessage(data.message);
                } else {
                    flashSuccessMessage(data.message)
                }
                addShowcasePopup.modal('hide');
                toggleFrontLoader('hide');
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            },
            error: function (data) {
                toggleFrontLoader('hide');
                flashErrorMessage(data.message);
            }
        });

        return false;
    }
});


$("#trackUploadForm").validate({
    ignore: ":hidden",
    rules: {
        trackTitle: {
            required: true
        },
        'selectedChannels[]': {
            required: true
        },
        trackFile: {
            required: function(element) {
                return $("#hdnTrackId").val() === 0;
            },
            extension: 'ogg|ogv|avi|mpeg|mov|wmv|flv|mp4',
            filesize : 50
        },
        thumbnailFile: {
            extension: 'jpg|jpeg|png|gif',
            filesize : 8
        }
    },
    messages: {
        trackFile: {
            extension: 'Please select a file with valid extension.'
        },
        thumbnailFile: {
            extension: 'Please select a file with valid extension.'
        }
    },
    errorElement: "em",
    errorPlacement: function (error, element) {
        element.parents(".w-100").addClass("has-feedback");
        error.addClass("help-block");
        error.insertAfter(element);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass("error-col");
        $(element).parents(".w-100").addClass("has-error").removeClass("has-success");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("error-col");
        $(element).siblings('.form-control-feedback').remove();
        $(element).siblings('.help-block').remove();
    },
    submitHandler: function (form) {
        let formData = new FormData(form);
        console.log(formData);
        $.ajax({
            url: $(form).attr('action'),
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                toggleFrontLoader('show');
            },
            success: function (data) {
                if (data.hasOwnProperty('error')) {
                    flashErrorMessage(data.message);
                } else {
                    flashSuccessMessage(data.message)
                }
                toggleFrontLoader('hide');
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            },
            error: function (data) {
                toggleFrontLoader('hide');
                flashErrorMessage(data.message);
            }
        });
        return false;
    }
});

$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param * 1000000)
}, 'File size must be less than {0} MB');

$(document).ready(function () {

    $('a[href="#'+tabName+'"]').tab('show');
    if(tabName === 'upload') {
        uploadTrackPopup.modal('show');
    }

    $('#offerTags').select2({
        dropdownParent: $('#addOffer'),
        width: '100%',
        placeholder: "Select tags",
    });

    $('.btn-edit-showcase').on('click', function (e) {
        toggleFrontLoader('show');
        let data = $(this).data();
        addShowcasePopup.find('#nameShowcase').val(data.title);
        addShowcasePopup.find('#descriptionShowcase').val(data.description);
        addShowcasePopup.find('#hdnShowcaseId').val(data.id);
        addShowcasePopup.find('#imgThumbnailShowcase')
            .attr('src', data.thumbnail)
            .attr('alt', data.title);
        addShowcasePopup.find('#thumbWrapper').removeClass('d-none');
        toggleFrontLoader('hide ');
        addShowcasePopup.modal('show');
    });

    $('#addShowcasePopup').on('hidden.bs.modal', function () {
        addShowcasePopup.find('#hdnShowcaseId').val(0);
        addShowcasePopup.find('#imgThumbnailShowcase')
            .attr('src', '')
            .attr('alt', '');
        addShowcasePopup.find('#thumbWrapper').addClass('d-none');
    });

    $("#imgInp, #imgInpNew").change(function() {
        readURL(this);
    });

    $(".channelCheckbox").change(function() {
        let checkbox = this;
        if(checkbox.checked && (getCheckedLength() < 4)) {
            let labelName = $(checkbox).siblings('label.customCheckBoxLabel').text();
            createSelectedItem(labelName, $(checkbox).val());
        }
    });

    $("#myTab a").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });

    $('.view-tab').click(function (e) {
        $('.bi-eye-slash').toggleClass('bi-eye', 'bi-eye');
    });

    $('#addMarketingContentBTN').click(function () {
        $('#marketingContentForm').show(400);
        $(this).hide(200);
        $('#closeEditorBTN').show(300).click(function () {
            $(this).hide(200);
            $('#addMarketingContentBTN').show(300);
            $('#marketingContentForm').hide(400);
        });
    });

    $("#profilePopupForm").validate({
        ignore: ":hidden",
        rules: {
            profileName : {
                required: true
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.parents(".form-group").addClass("has-feedback");
            element.parents(".input-group").removeClass("mb-3").addClass("mb-4");
            error.addClass("help-block");
            error.insertAfter(element);
        },
        highlight: function ( element, errorClass, validClass ) {
            $(element).addClass("error-col");
            $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $(element).removeClass("error-col");
            $(element).siblings('.form-control-feedback').remove();
            $(element).siblings('.help-block').remove();
            $(element).parents(".input-group").removeClass("mb-4").addClass("mb-3");
        },
        submitHandler: function (form) {
            let formData = $(form).serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

            let myInterests = [];
            $("input:checkbox.my-interests:checked").each(function(){
                myInterests.push($(this).val());
            });

            formData['my_interests'] = myInterests;

            let submitUrl = $(form).attr('action');
            $.ajax({
                url: submitUrl,
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                beforeSend: function() {
                    btnSubmit.attr('disabled', 'disabled');
                    toggleFrontLoader('show');
                },
                success: function (data) {
                    if(data.hasOwnProperty('error')) {
                        setResultData(data.message, false);
                        btnSubmit.removeAttr('disabled');
                    } else {
                        setResultData(data.message, true);
                        btnSubmit.removeAttr('disabled');
                        setTimeout(function (){
                            window.location.reload();
                        }, 1000);
                    }
                    toggleFrontLoader('hide');
                },
                error: function (data) {
                    setResultData(data.message, false);
                    btnSubmit.removeAttr('disabled');
                    toggleFrontLoader('hide');
                }
            });
            return false;
        }
    });

    $("#imageUpload").change(function(){
        let file = this.files[0];
        uploadFile(file, 'cover_photo', uploadCoverPhoto);
    });

    $('.delete-track').on('click', function(e){
        e.preventDefault();
        hdnDeleteTrackId.val($(this).data('id'));
        deleteTrackPopup.modal('show');
    });

    $('.btn-delete-track').on('click', function(e){
        e.preventDefault();
        let btnSave = $(this);

        let formData = new FormData();
        formData.append('id',hdnDeleteTrackId.val());

        $.ajax({
            url: btnSave.data('link'),
            type: 'POST',
            data: formData,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend: function() {
                toggleFrontLoader('show');
            },
            success: function(response) {
                toggleFrontLoader('hide');
                toastr.success(response.message);
                hdnDeleteTrackId.val('');
                deleteTrackPopup.modal('hide');
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            },
            error: function (data) {
                toggleFrontLoader('hide');
                toastr.error(data.message);
            }
        });
    });

    $('.btn-edit-track').on('click', function (e) {
        e.preventDefault();
        let trackData = $(this).data();
        $('#uploadTrackPopup #trackTitle').val(trackData.title);
        $('#uploadTrackPopup #hdnTrackId').val(trackData.id);
        $('#uploadTrackPopup #trackDescription').val(trackData.description);

        let channelList = trackData.channels.split(',');
        if(channelList.length > 0) {
            for(let channel of channelList) {
                let channelCheckBox = $('#channel' + channel);
                createSelectedItem(channelCheckBox.siblings('label.customCheckBoxLabel').text(), channel);
                channelCheckBox.prop('checked', true);
            }
        }

        uploadTrackPopup.modal('show');
    });
});

$(document).on('click', '.btn-close-channel', function(){
    console.log($(this).data('id'));
    unselectItem($(this).data('id'));
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#my-image, #uploadAgain').attr('src', e.target.result);
            $('#upload').hide();
            $('#uploadAgain').show();
            var resize = new Croppie($('#my-image')[0], {
                viewport: {
                    width: 150,
                    height: 150,
                    type: 'square'
                },
                boundary: {
                    width: 150,
                    height: 150,
                },
                // showZoomer: false,
                // enableResize: true,
                enableOrientation: true
            });
            $('#use').fadeIn();

            $('#use').on('click', function() {
                resize.result('base64').then(function(dataImg) {
                    var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];
                    uploadFile(dataImg, 'avatar', uploadAvatar);
                    $('#result').attr('src', dataImg);
                });
            });

            $('#use').click(function (e) {
                $('#imageSavedMessage').show();
                $('#uploadAgain').show();
                $('#imgInp, #upload').hide();
                $(this).hide();
            });
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function unselectItem(id) {
    $('#selectedItem_' + id).remove();
    $('#channel' + id).prop('checked', false);
}

function uploadFile(file, type, postUrl){
    let uploadData = new FormData();
    uploadData.append(type,file);
    $.ajax({
        url: postUrl,
        type: 'POST',
        data: uploadData,
        contentType:false,
        cache:false,
        processData:false,
        beforeSend: function() {
            toggleFrontLoader('show');
        },
        success: function(response) {
            toggleFrontLoader('hide');
            toastr.success(response.message);
        },
        error: function (data) {
            toggleFrontLoader('hide');
            toastr.error(data.message);
        }
    });
}

function getCheckedLength() {
    return $('.channelCheckbox:checked').length;
}

function createSelectedItem(name, id) {
    let selectedItem = '<div id="selectedItem_'+id+'" title="'+name+'" ';
    selectedItem += 'class="selectedItem d-flex align-items-center border border-danger">';
    selectedItem += '<div class="selectedItemValue">'+name+'</div>';
    selectedItem += '<button data-id="'+id+'" class="btn-close btn-close-channel bg-light customUnselectBtn" ';
    selectedItem += 'type="button" aria-label="Close"></button>';
    selectedItem += '</div>'
    $('div.selectChannelsContainer').append(selectedItem);
}
