//Will be executed when we show a contest
$(function () {

    init_launch_count_down();
    //$(document.body).trigger('review_loaded');
});

function init_launch_count_down()
{
    var deadline_countdown_element = $('#contest-launch-timer');
    //var contest_id = $('#course-detail[courseid]').attr('courseid');

    //We initialize the count deadline to be the current time plus the number of seconds retrieved from the html,
    //The deadline is a unix timestamp in milliseconds
    if(deadline_countdown_element.attr('seconds') == undefined)
        return true;
    var deadline = parseInt(deadline_countdown_element.attr('seconds')) * 1000 + Date.now();
    var countdown = function () {
        //Update Countdown UI element, and get the new remaining number of seconds
        var remaining_seconds = Math.floor((deadline - Date.now())/1000);
        deadline_countdown_element.html(fmtMSS(remaining_seconds));
        //If count is positive
        if(remaining_seconds>0)
        //Wait one more second
            setTimeout(function (args) {
                //and call countdown recursively again
                countdown();
            },500); //We make it less then a second to ensure no seconds skipping in the UI in case of network lagging or something...
        else
        {
            //The entire countdown is elapsed, so we refresh the page
            window.location.reload();

        }
    };

    countdown();
}


//Count down and redirect to the course page


//function fmtMSS(s){return(s-(s%=60))/60+(9<s?':':':0')+s}

function fmtMSS(s){
    var res = "";
    var days = Math.floor(s/(60*60*24));
    s -= days * 60*60*24;
    var hours = Math.floor(s /(60 * 60));
    var mins = Math.floor((s - hours * 60 * 60) / 60);
    var secs = s - (hours*60*60) - mins* 60;
    if(days > 0)
        res += (days <= 9 ? '0' : '') + days + ":";
    if(days > 0 || hours > 0)
        res += (hours <= 9 ? '0' : '') + hours + ":";
    if(days > 0 || hours > 0 || mins > 0)
        res += (mins <= 9 ? '0' : '') + mins + ":";
    if(days > 0 || hours > 0 || mins > 0 || secs > 0 )
        res += (secs < 9 ? '0' : '') + secs;
    return res;
}
