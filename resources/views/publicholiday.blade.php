<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

$(document).ready(function(){
//--------------------- Add a 0 to numbers
function padNum(num) {
    if (num <= 9) {
        return "0" + num;
    }
    return num;
}
//--------------------- end    
    
//--------------------- From 24h to Am/Pm
function AmPm(num) {
    if (num <= 12) { return "am " + num; }
    return "pm " + padNum(num - 12);
}
//--------------------- end    

//--------------------- num Month to String
function monthString(num) {
    if (num === "01") { return "JAN"; } 
    else if (num === "02") { return "FEB"; } 
    else if (num === "03") { return "MAR"; } 
    else if (num === "04") { return "APR"; } 
    else if (num === "05") { return "MAJ"; } 
    else if (num === "06") { return "JUN"; } 
    else if (num === "07") { return "JUL"; } 
    else if (num === "08") { return "AUG"; } 
    else if (num === "09") { return "SEP"; } 
    else if (num === "10") { return "OCT"; } 
    else if (num === "11") { return "NOV"; } 
    else if (num === "12") { return "DEC"; }
}
//--------------------- end

//--------------------- from num to day of week
function dayString(num){
    if (num == "1") { return "Monday" }
    else if (num == "2") { return "Tuesday" }
    else if (num == "3") { return "Wednesday" }
    else if (num == "4") { return "Thusday" }
    else if (num == "5") { return "Friday" }
    else if (num == "6") { return "Saturday" }
    else if (num == "0") { return "Sunday" }
}

//--------------------- end
        
    var today = new Date(); //today date
    var addDate = new Date(today);
    addDate.setDate(addDate.getDate() + 1); // add 2 days 

    $.get("https://www.googleapis.com/calendar/v3/calendars/madlabs.com.my_3gqt90cjc8fp2cunnmq622jo5g@group.calendar.google.com/events?maxResults=7&orderBy=startTime&singleEvents=true&timeMax="+addDate.toISOString()+"&timeMin="+today.toISOString()+"&timeZone=Kuala%20Lumpur&key=AIzaSyBHXdd3WsTCik5_3EJn83SI-BYe-Tcjb_Q", function(data){
        if (data.items.length > 0 ) {

            for (i = 0; i < data.items.length; i++) { 
                var item = data.items[i];
                var classes = [];
                var allDay = item.start.date? true : false;
                var startDT = allDay ? item.start.date : item.start.dateTime;
                var dateTime = startDT.split("T"); //split date from time
                var date = dateTime[0].split("-"); //split yyyy mm dd
                var startYear = date[0];
                var startMonth = monthString(date[1]);
                var startDay = date[2];
                var startDateISO = new Date(startMonth + " " + startDay + ", " + startYear + " 00:00:00");
                var startDayWeek = dayString(startDateISO.getDay());

                if( allDay == true){ //change this to match your needs
                        $('#public').append("<font size='5' face='courier'> "+item.summary+" </font><br><small>"+startDayWeek+', '+startMonth+' '+startDay+', '+startYear+"</small><hr><br>");
                    }
            }
        }
        else{
            $('#public').append("<font size='5' face='courier'>No Event</font>");
        }
    });
});
</script>
</head>
<body style="background-color:grey">

<div id = "public"></div>
                            

</body>
</html>

