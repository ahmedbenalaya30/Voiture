<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='../lib/main.css' rel='stylesheet' />
<script src='../lib/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      initialDate: '2020-09-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        @foreach($bookings as $booking)
        {
          title: '{{$booking->id}}',
          start: '{{$booking->pick_up_date}}',
          end: '{{$booking->drop_off_date}}'
        },
        @endforeach
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 800px;
    margin: 2px auto;
  }

</style>
</head>

</html>