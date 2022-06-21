<script type="text/javascript">
    let resultData = $('#resultData');
    $(document).ready(function () {
        resetResultData();
    });
    function setResultData(message, type) {
        resetResultData();
        let className = (type === false) ? 'alert-danger' : 'alert-success';
        resultData.addClass(className);
        resultData.html(message);
        resultData.show();
    }

    function resetResultData() {
        resultData.hide();
        resultData.html('');
        resultData.removeClass('alert-success alert-danger');
    }
</script>
