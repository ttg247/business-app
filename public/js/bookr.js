$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "events.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            
            var $this = this;
            //$("#addEvent").modal({
            //    backdrop: 'static'
            //});
            //$("#eventStarts").datetimepicker("date", start)
            //var form = $("#addEventForm");
            //$("#addEvent").find('.delete-event').hide().end().find('.save-event').show().end().find('.save-event').unbind('click').click(function() {
            //    form.submit();
            //});
            //$("#addEvent").find('form').on('submit', function() {                
                //var title = form.find("#eventName").val();
                //var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                //var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                //var start = form.find("#eventStarts").val();
                //var end = form.find("input[name='ending']").val();
                //var categoryClass = form.find("#addColor [type=radio]:checked").data("color");
                //if (title !== null && title.length != 0) {
                //    $.ajax({
                //        url: 'app/Controller/event-manager/add-event.php',
                //        data: 'title=' + title + '&start=' + start + '&end=' + end,
                //        type: "POST",
                //        success: function (data) {
                //            $("#addEvent").modal('hide');
                //            displayMessage("Added Successfully");
                //        },
                //        failure: function () {
                //            alert("Failed");
                //        }
                //    });
                //    calendar.fullCalendar(
                //        'renderEvent',
                //        {
                //            title: title,
                //            start: start,
                //            end: end,
                //            color: categoryClass,
                //            allDay: allDay,
                //        }, 
                //        true,
                //    );
                //} else {
                //    alert('You have to give a title to your event');
                //};
                //return false;
            //});
            var title = prompt('Event Title:');
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: 'app/Controller/event-manager/add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                    true
                );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url: 'app/Controller/event-manager/edit-event.php',
                data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                type: "POST",
                success: function (response) {
                    displayMessage("Updated Successfully");
                }
            });
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "app/Controller/event-manager/delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}