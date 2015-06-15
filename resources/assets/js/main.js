$(function () {
    $('.share').on('click', function (e) {
        e.preventDefault();

        var url = $(this).data('url');
        var type = $(this).data('type');

        if (typeof _gaq !== 'undefined') {
            _gaq.push(['_trackEvent', 'Share', 'Blog', url]);
        }

        popupwindow(url, '', 800, 800);
    });

    $('.delete').on('click', function() {
        return confirm('Are you sure you wish to delete this?');
    });

    function popupwindow(url, title, w, h) {
        var wLeft = window.screenLeft ? window.screenLeft : window.screenX;
        var wTop = window.screenTop ? window.screenTop : window.screenY;

        var left = wLeft + (window.innerWidth / 2) - (w / 2);
        var top = wTop + (window.innerHeight / 2) - (h / 2);
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
    }
});