$(document).ready(function () {

//     $('.star').on('mouseover', function ($element) {
//
//         let starPrefix = ($(this).attr('id')).slice(0,2);
//         let starPosition = ($(this).attr('id')).slice(2);
//
//         let numberStars = 5;
//
//         for (let i = 1; i <= numberStars; i++) {
//             if (i <= starPosition) {
//                 $('#' + starPrefix + i).addClass('hover');
//             } else {
//                 $('#' + starPrefix + i).removeClass('hover');
//             }
//         }
//     });
// }).on('mouseout', function($element) {
//
//     let numberStars = 5;
//     //let starPrefixs = ($(this).attr('id')).slice(0,2);
//     console.log(('.star'));
//
//     for (let i = 1; i <= numberStars; i++) {
//         $('#' + starPrefix + i).removeClass('hover');
//     }
//
// });
//


//     $('#navbarDropdown').on('mouseover', function ($element) {
//
//         $('#subMenu').addClass("show");
//
//     });
// }).on('mouseout', function($element) {
//
//     $('#subMenu').removeClass("show");
//
//
// });


    // $('#dropdownUser').click(function() {
    //
    //     $('#subMenu').toggle()
    //
    // });


    //
    // $('#dropdownUser').click(function() {
    //
    //     if()
    //     $('#subMenu').addClass("show");
    //     $(this).addClass("show");
    //
    // });
    //
    // $('#subMenu').mouseout(function() {
    //
    //     $('#subMenu').removeClass("show");
    //
    // });



    $('.star').on('click', function ($element) {

        // Get star's position
        let starPrefixss = ($(this).attr('id')).slice(0, 2);
        let starPosition = ($(this).attr('id')).slice(2);

        // Disable all stars
        for (let i = 1; i <= 5; i++) {
            $('#' + starPrefixss + i).css({
                'color': '#eee'
            });
        }

        // enable selected star and all stars on the left
        for (let i = 1; i <= starPosition; i++) {
            $('#' + starPrefixss + i).css({
                'color': '#ff0',
                'text-shadow': '0 0 25px #ffffcc'
            });
        }

    });

    // If form is not submitted, select again all stars previously selected by user
    let selectedStar = document.getElementsByClassName('star selected');

    for (let i = 0; i < selectedStar.length; ++i) {
        let star = selectedStar[i];

        // Get star's position
        let starPre = ($(selectedStar[i])).attr('id').slice(0, 2);
        let position = ($(selectedStar[i])).attr('id').slice(2);

        // enable selected star and all stars on the left
        for (let i = 1; i <= position; i++) {
            $('#' + starPre + i).css({
                'color': '#ff0',
                'text-shadow': '0 0 25px #ffffcc'
            });
        }
    }

});