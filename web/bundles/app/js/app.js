/**
 * Created by zeppell on 10.07.17.
 */

$(function(){

    function renderFormEventPart() {

        alert('function');

        var newElement = $("<div class='new'> This is new element</div>");
        var foo = $("#formColor");

        newElement.appendTo(foo);
    };

    $('#serviceType').attr('selected','selected').change( function () {

        var serviceTypeColor = $('#formColor').removeAttr("class");
        var serviceTypeId = $('#serviceType').find(":selected").val();

        $ ('.input-period').removeAttr("disabled");

        switch (serviceTypeId) {
            case '1':
                serviceTypeColor.addClass("formColorGreen").addClass("row");
                $ ('.input-period').attr("disabled", "disabled");
                break;
            case '2':
                serviceTypeColor.addClass("formColorYellow").addClass("row");
                break;
            case '3':
                serviceTypeColor.addClass("formColorRed").addClass("row");
                break;
            case '4':
                serviceTypeColor.addClass("formColorPurple").addClass("row");
                break;
            case '5':
                serviceTypeColor.addClass("formColorBlue").addClass("row");
                break;
            case '6':
                serviceTypeColor.addClass("formColorOrange").addClass("row");
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

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        startDate: '-3d'
    });

});
