$(document).ready(function () {

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

    // If form is not submitted, select again yes/no button previously selected by user
    let takeCourseNotActive = document.getElementsByClassName('take_course not_active');
    let takeCourseActive = document.getElementsByClassName('take_course active');

    // Set back the configuration of button that was not selected to idle state
    $(takeCourseNotActive).css({
        'background-color': 'var(--main-orange)',
        'border': 'none',
        'box-shadow': '#fff'
    });

    // set configuration as active button if the button was selected previously
    $(takeCourseActive).css({
        'border': '2px solid #fff',
        'background-color': '#ffc107',
        'box-shadow': '0 0 7px #fff2cd'
    });

    // On clicking in take course again button
    $('.take_course').on('click', function ($element) {

        // Get buttons
        let allButtons = document.getElementsByClassName('take_course');

        // Reset the configuration of both buttons to idle state
        $(allButtons).css({
            'background-color': 'var(--main-orange)',
            'border': 'none',
            'box-shadow': '#fff'
        });

        // set configuration as active to the selected button
        $(this).removeClass('not_active').css({
            'border': '2px solid #fff',
            'background-color': '#ffc107',
            'box-shadow': '0 0 7px #fff2cd'
        });

    });

});