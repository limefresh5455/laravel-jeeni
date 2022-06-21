let socialLinks = $('.social-links');
$(document).ready(function() {
    socialLinks.hide();
    $('.track-social-list #social-links').addClass('social-links').hide();
    $(document).on('click', '.track-social-list', function(e){
        e.preventDefault();
        let element = $(this).find('.social-links');
        if(element.is(":visible")) {
            element.hide();
        } else {
            element.show();
        }
    });

    $(document).on('click', '.add-track-to-favourite', function (e) {
        e.preventDefault();
        submitAjax($(this).data());
    });

    $(document).on('click', '.add-track-to-playlist', function (e) {
        e.preventDefault();
        submitAjax($(this).data());
    });

    $(document).on('click', '.remove-track-to-playlist', function (e) {
        e.preventDefault();
        submitAjax($(this).data());
    });

    $('.jeeni-tip').each(function () {
        let target = $(this).attr('data-target');
        $(this).tooltip({
            html: true,
            placement: 'bottom',
            title: $('#' + target).html()
        });
    });

    $('.btn-go-to').on('click', function() {
        let data = $(this).data();

        $.ajax({
            url: data.link,
            type: 'POST',
            dataType: 'JSON',
            data: data,
            beforeSend: function() {
                toggleFrontLoader('show');
            },
            success: async function (data) {
                window.location.href = data.data.link;
            },
            error: function (data) {
                flashErrorMessage(data.message);
            }
        });
    });
});

function submitAjax(data, className, toggleType) {
    $.ajax({
        url: data.submitUrl,
        type: 'POST',
        dataType: 'JSON',
        data: data,
        beforeSend: function() {
            toggleFrontLoader('show');
        },
        success: async function (data) {
            if (data.hasOwnProperty('error')) {
                flashErrorMessage(data.message);
            } else {
                flashSuccessMessage(data.message);
                toggleFavouriteClass(data.data);
            }
            toggleFrontLoader('hide');
            setTimeout(function () {
                window.location.reload();
            }, 2000);
        },
        error: function (data) {
            flashErrorMessage(data.message);
        }
    });
}

function flashSuccessMessage(message) {
    flashy(message, {type: 'flashy__success'});
}

function flashErrorMessage(message) {
    flashy(message, {type: 'flashy__danger'});
}

function copyToClipboard(elementId) {
    $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('#' + elementId).text()).select();
    document.execCommand("copy");
    $temp.remove();
    flashSuccessMessage('Content copied to your clipboard.');
}

function toggleFavouriteClass(data) {
    let actionSpan = $('span#trackVoteAction_' + data.trackId);
    actionSpan.removeAttr('class');
    actionSpan.addClass(data.spanClass);
    actionSpan.find('i').removeClass('bi-heart-fill bi-heart').addClass(data.heartClass);
    actionSpan.attr('data-submit-url', data.actionLink);
}

function toCamelCase(string) {
    return capitalizeFirstLetter(string.replace(/ /g, '_'));
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
