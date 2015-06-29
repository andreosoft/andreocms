catalog = {
    inProgress: false,
    append: false,
    pageCount: 2,
    init: function () {

        $(document).ajaxStart(function () {
            $('#catalog_placeholder').animate({
                opacity: 0.4
            }, 100, 'swing');
            catalog.inProgress = true;
        });

        $(document).ajaxStop(function () {
            $('#catalog_placeholder').animate({
                opacity: 1
            }, 100, 'swing');
            catalog.inProgress = false;
        });
        
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 500 && !catalog.inProgress) {
                catalog.append = true;
                var page = $('#catalog_placeholder').data('page');
                if (catalog.pageCount <= page) { return false; }
                $('#catalog_placeholder').data('page', page = parseInt(page, 10) + 1);
                catalog.get();
                event.preventDefault ? event.preventDefault() : (event.returnValue = false);
            }

        });
        $('[type="checkbox"]').change(function (event) {
            $('#catalog_placeholder').data('page', '0');
            catalog.get();
            event.preventDefault ? event.preventDefault() : (event.returnValue = false);
        });

        $('.catalog_sort_select').click(function (event) {
            $('#dropdownMenu-sort').text($(this).html());
            var data = $(this).data('value').split(",");
            $('#catalog_placeholder').data('sortname', data[0]);
            $('#catalog_placeholder').data('sortdirection', data[1]);
            $('#catalog_placeholder').data('page', '0');
            catalog.get();
            event.preventDefault ? event.preventDefault() : (event.returnValue = false);
        });

        $('.catalog_type_select').click(function (event) {
            $('#dropdownMenu-person-type').text($(this).html());
            var data = $(this).data('value');
            $('#catalog_placeholder').data('type', data);
            $('#catalog_placeholder').data('page', '0');
            catalog.get();
            event.preventDefault ? event.preventDefault() : (event.returnValue = false);
        });
        $('.catalog_view a').click(function (event) {
            $('#catalog_placeholder').data('page', '0');
            var tpl = $(this).data('tpl');
            $('#catalog_placeholder').data('tpl', tpl);
            $('.catalog_view a').removeClass('active');
            catalog.get();
            $(this).addClass('active');
            event.preventDefault ? event.preventDefault() : (event.returnValue = false);
        });

        $('.range-slider').on('change', function (event) {
            var v = $(this).val();
            $('#catalog_placeholder').data('values', 'price>=' + v[0] + ',' + 'price<=' + v[1]);
            $('#catalog_placeholder').data('page', '0');
            catalog.get();
            event.preventDefault ? event.preventDefault() : (event.returnValue = false);
        });

    },
    get: function () {
        var categorysArray = new Array();
        $('[name="category"]:checked').each(
                function () {
                    categorysArray.push($(this).val());
                });
        var url = $('#catalog_placeholder').data('action_url')
        var params = {};
        params.page = $('#catalog_placeholder').data('page');
        params.limit = $('#catalog_placeholder').data('limit');
        params.type = $('#catalog_placeholder').data('type');
        params.values = $('#catalog_placeholder').data('values');
        params.sortname = $('#catalog_placeholder').data('sortname');
        params.sortdirection = $('#catalog_placeholder').data('sortdirection');
        params.tpl = $('#catalog_placeholder').data('tpl');
        params.onlyD = $('#catalog_placeholder').data('only_d');
        params.search = $('#catalog_placeholder').data('search');
        params.categorys = categorysArray.join(',');
        $.post(url, params, function (response) {
            if (response.success) {
                catalog.show(response.data);
                catalog.pageCount = response.pageCount;
            }
            else {
                alert(response.message);
            }
        });
    },
    show: function (data) {
        if (catalog.append) {
            $('#catalog_placeholder').append(data.result);
            catalog.append = false;
        } else {
            $('#catalog_placeholder').html(data.result);
        }
        $('#navigation_placeholder').html(data.navigation);
        $('.pagination').html(data.pagination);
        catalog.inProgress = false;
    }
};
$(document).ready(function () {
    catalog.init();
});


