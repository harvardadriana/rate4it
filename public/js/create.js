$(document).ready(function () {

    // STARS: Change color of the start selected and all stars on the left of the selected one
    $('.star').on('click', function () {

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

    // STARS: If form fails to submit, select again all stars previously selected by user
    let selectedStar = document.getElementsByClassName('star selected');

    for (let i = 0; i < selectedStar.length; ++i) {

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

    // YES/NO BTN: If form fails to submit, select again yes/no button previously selected by user
    window.onload = checkButtonWasClicked;

    function checkButtonWasClicked() {

        let takeCourseNotActive = document.getElementsByClassName('take_course not_active');
        let takeCourseActive = document.getElementsByClassName('take_course active');

        // Set back the configuration of button that was not selected to idle state
        $(takeCourseNotActive).css({
            'background-color': '#FA7308',
            'border': 'none',
            'box-shadow': '#fff'
        });

        // set configuration as active button if the button was selected previously
        $(takeCourseActive).css({
            'border': '2px solid #fff',
            'background-color': '#ffc107',
            'box-shadow': '0 0 7px #fff2cd'
        });

    }

    // Hovering and click effects for YES/NO Button
    $('.take_course').mouseover(function ($this) {

        // Change button color
        $($this).css({
            'border': '2px solid #fff',
            'background-color': '#ffc107',
            'box-shadow': '0 0 7px #fff2cd'
        });

    }).mouseout(function ($this) {

        // Change button color
        $($this).css({
            'background-color': '#FA7308',
            'border': 'none',
            'box-shadow': '#fff',
            'color': 'purple'
        });

    }).click(function ($this) {

        $($this).unbind("mouseover mouseout");

    });

});