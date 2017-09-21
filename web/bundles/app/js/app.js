/**
 * Created by zeppell on 10.07.17.
 */

$(function(){

    var $collectionHolder;

    var $addEventElementLink = $('<a href="#" class="btn btn-success">' +
                                '<span class="glyphicon glyphicon-plus"></span> Dodaj kolejne zdarzenie' +
                                '</a>');
    var $newLinkLi = $('<li class="list-group-item"></li>').append($addEventElementLink);


    // Get the ul that holds the collection of eventElements
    $collectionHolder = $('ul.list-group');

    // add a delete link to all of the existing eventElements form li elements
    $collectionHolder.find('li').each(function() {
        addEventElementFormDeleteLink($(this));
    });

    // add the "Dodaj kolejne zdarzenie" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addEventElementLink.on('click', function(e) {

        e.preventDefault();

        addEventElementForm($collectionHolder, $newLinkLi);
    });

    function addEventElementForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        var newForm = prototype;
        // You need this only if you didn't set 'label' => false in your tags field in TaskType
        // Replace '__name__label__' in the prototype's HTML to
        // instead be a number based on how many items we have
        // newForm = newForm.replace(/__name__label__/g, index);

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        newForm = newForm.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Dodaj kolejne zdarzenie" link li
        var $newFormLi = $('<li></li>').append(newForm);
        $newLinkLi.before($newFormLi);

        addEventElementFormDeleteLink($newFormLi);
    }

    function addEventElementFormDeleteLink($EventElementFormLi) {

        var $removeFormA = $('<a href="#" class="btn btn-danger">' +
                            '<span class="glyphicon glyphicon-minus"></span> Usuń to zdarzenie' +
                            '</a>');
        $EventElementFormLi.append($removeFormA);

        $removeFormA.on('click', function(e) {

            e.preventDefault();

            $EventElementFormLi.remove();
        });
    }

    $('#appbundle_event_eventElement_0_serviceTypee').attr('selected','selected').change( function () {

        var serviceTypeColor = $('#formColor').removeAttr("class");
        var serviceTypeId = $('#appbundle_event_eventElement_0_serviceType').find(":selected").val();

        $ ('.input-period').removeAttr("disabled");

        switch (serviceTypeId) {
            case '1':
                serviceTypeColor.addClass("formColorGreen").addClass("panel-body");
                $ ('.input-period').attr("disabled", "disabled");
                break;
            case '2':
                serviceTypeColor.addClass("formColorYellow").addClass("panel-body");
                break;
            case '3':
                serviceTypeColor.addClass("formColorRed").addClass("panel-body");
                break;
            case '4':
                serviceTypeColor.addClass("formColorPurple").addClass("panel-body");
                break;
            case '5':
                serviceTypeColor.addClass("formColorBlue").addClass("panel-body");
                break;
            case '6':
                serviceTypeColor.addClass("formColorOrange").addClass("panel-body");
                break;
        }
    });

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
