$(document).ready(function() {
  $('#calendar').fullCalendar({
    editable: true,
    events: [
      {
        title : 'event1',
        start : '2014-12-19'
      },

      {
        title : 'event2',
        start : '2014-12-20'
      },

        {
            title  : 'event3',
            start  : '2014-12-24T12:30:00',
            allDay : false // will make the time show
        }
    ]
  });
});