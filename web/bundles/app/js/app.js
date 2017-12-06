/**
 * Created by zeppell on 10.07.17.
 */

$( document ).ready(function() {

    var $collectionHolder = $('ul.list-group');

    var $addButton = $( '<a href="#" class="btn btn-success">' +
        '<span class="glyphicon glyphicon-plus"></span> Dodaj kolejne zdarzenie' +
        '</a>');
    var $newLi = $('<li class="list-group-item"></li>');

    // add the "Dodaj kolejne zdarzenie" anchor and li to the tags ul
    $collectionHolder.append($newLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    addEventElementForm($collectionHolder, $newLi.append($addButton));

    $addButton.on('click', function(e) {

        e.preventDefault();

        addEventElementForm($collectionHolder, $newLi);


    });

    function addEventElementForm($collectionHolder, $newLi) {
        // Get the data-prototype
        var form  = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        form = form.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Dodaj kolejne zdarzenie" link li
        form = $('<li class="list-group-item formColor"></li>').append(form);

        $newLi.before(form);

        if (index != 0) {
            addRemoveButton(form);
        }

        formBeautify(form.children().children(), index);
    }

    function addRemoveButton(form) {

        var $removeButton = $('<div class="input-group col-xs-12 col-sm-4 col-md-3 col-lg-2">' +
            '<a href="#" class="btn btn-danger">' +
            '<span class="glyphicon glyphicon-minus"></span> Usuń to zdarzenie' +
            '</a>' +
            '</div>');
        form.children().append($removeButton);

        $removeButton.on('click', function(e) {

            e.preventDefault();

            form.remove();
        });
    }

    function formBeautify (form, index) {

        form.addClass( "input-group col-xs-12 col-sm-4 col-md-3 col-lg-2" ).find('label').remove();

        form.eq(0).attr('style', "display:none");
        // form.eq(0).find('select').val('event.id');

        form.eq(1).prepend( '<div class="width80 input-group-addon">' +
            '<span class="glyphicon glyphicon-wrench"></span>' +
            '</div>');
        form.eq(1).find('select').addClass('form-control width160');

        form.eq(2).addClass('custom-search-form');

        form.eq(2).prepend( '<div class="input-group-btn">' +
            '<button id="searchParts" type="button" class="btn btn-search btn-default ' +
            'dropdown-toggle width80">' +
            '<span class="glyphicon glyphicon-search"></span>' +
            '<span class="caret"></span>' +
            '</button>' +
            '</div>');
        form.eq(2).find('input').attr({
            value:"ddddddddddd",
            placeholder: "wprowadź lub wybierz część",
            title: "wprowadź lub wybierz część",
            class: "form-control width160"
        });
        form.eq(3).prepend('<div class="width80 input-group-addon">PLN</div>');
        form.eq(3).find('input').attr({
            placeholder:    "wartość wymiany",
            title:          "wartość wymiany w PLN",
            class:          "form-control width160",
            scale:          '2',
            min:            '0',
            step:           '1'
        });
        form.eq(4).prepend('<div class="width80 input-group-addon">tyś. KM</div>');
        form.eq(4).find('input').attr({
            placeholder:    "okr. wymiany",
            title:          "okres wymiany w tysiącach km",
            class:          "form-control width160 input-period",
            scale:          '2',
            min:            '0',
            step:           '1'
        });
        form.eq(5).prepend('<div class="width80 input-group-addon">miesięcy</div>');
        form.eq(5).find('input').attr({
            placeholder:    "okr. wymiany",
            title:          "okres wymiany w miesiącach",
            class:          "form-control width160 input-period",
            scale:          '2',
            min:            '0',
            step:           '1'
        });

        // $('li.formColor').find('#searchParts').on('click', function(e){
        //     alert('fffffffffffffffffffffff');
        //     e.preventDefault();
        // })
        // $.each($('#searchParts'), function (index, item) {
        //     $(item).on('click', function () {
        //         alert('fuuuuuuuuuuuuuuuuuuuuuuuu ' + index);
        //     });
        // });

        $('li.formColor').find('#searchParts').on('click', function() {

            $(this).css('background-color', 'yellow');

        });
        $('li.formColor').find('select').change( function () {

            var serviceTypeVal = $(this).val();

            var li = $(this).parent().parent().parent();

            var inputPeriod = $(this).parent().parent().find('.input-period').removeAttr("disabled");

            switch (serviceTypeVal) {
                case '1':
                    li.attr('style', 'background-color: #00CC00');
                    inputPeriod.attr("disabled", "disabled");
                    break;
                case '2':
                    li.attr('style', 'background-color: #FFFF00');
                    break;
                case '3':
                    li.attr('style', 'background-color: #FF0000');
                    break;
                case '4':
                    li.attr('style', 'background-color: #FF00FF');
                    break;
                case '5':
                    li.attr('style', 'background-color: #6495ED');
                    break;
                case '6':
                    li.attr('style', 'background-color: orange');
                    break;
                default:
                    li.removeAttr('style');
            }
        });

    }

    // $.each($('li.formColor'), function (index, item) {
    //
    //     var dupa =$(item).find('#searchParts');
    //
    //     dupa.on('click', function () {
    //         alert('fuuuuuuuuuuuuuuuuuuuuuuuu ' + index);
    //     });
    // });

    // $.each($('li.formColor'), function (index, item) {
    //
    //         alert('fuuuuuuuuuuuuuuuuuuuuuuuu ' + index);
    //
    // });

    function dump(obj) {
        var out = '';
        for (var i in obj) {
            out += i + ": " + obj[i] + "\n";
        }

        var pre = document.createElement('pre');
        pre.innerHTML = out;
        document.body.appendChild(pre)
    }

    $('a[href="#navbar-more-show"], .navbar-more-overlay').on('click', function(event) {
        event.preventDefault();
        $('body').toggleClass('navbar-more-show');
        if ($('body').hasClass('navbar-more-show'))	{
            $('a[href="#navbar-more-show"]').closest('li').addClass('active');
        }else{
            $('a[href="#navbar-more-show"]').closest('li').removeClass('active');
        }
        return false;
    });



    // $('.datepicker').datepicker({
    //     format: 'dd/mm/yyyy',
    //     startDate: '-3d'
    // });

});