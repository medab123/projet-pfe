@extends('layouts.app')

@section('title', 'Calendrier')

@section('content')
    <div class="container">
        <h2>Calendrier</h2>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body day-events">
                        <h3>Événements du jour</h3>
                        <ul id="day-event-list"></ul>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include necessary CSS and JS libraries for the calendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <script>
        // Initialize the calendar
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                // Add your calendar options and configurations here
                // For example:
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,agendaList'
                },
                defaultView: 'month',
                editable: false,
                events: {!! $webinaires !!},
                eventRender: function(event, element) {
                    // Add event descriptions as tooltips
                    element.attr('title', event.description);
                },
            });

            // Get the current date and time
            var now = moment();

            // Filter events for the current date
            var dayEvents = {!! $webinaires !!}.filter(function(event) {
                return moment(event.start).isSame(now, 'day');
            });

            // Set the locale to French
            moment.locale('fr');

            // Render the day events in the day-events section
            var dayEventList = $('#day-event-list');
            dayEvents.forEach(function(event) {
                var startTime = moment(event.start);
                var endTime = moment(event.end);
                var duration = moment.duration(endTime.diff(startTime)).asMinutes();
                var timeDifference = now.diff(startTime, 'minutes');
                var timeDifferenceHuman = startTime.fromNow();

                var listItem = $('<li>').html(`<strong>${event.title}</strong><br>
                                               Début : ${startTime.format('HH:mm')}<br>
                                               Fin : ${endTime.format('HH:mm')}<br>
                                               Durée : ${duration} minutes<br>
                                               Différence de temps : ${timeDifferenceHuman}`);
                dayEventList.append(listItem);

                // Set the border color based on the time difference
                if (timeDifference > 15) {
                    listItem.addClass('border-left-green');
                } else if (timeDifference > 0) {
                    listItem.addClass('border-warning');
                } else {
                    listItem.addClass('border-danger');
                }
            });

            $(".fc-button").css({
                background: "#0d6efd",
                color: "#fff"
            });

            $(".fc-button").mouseover(function() {
                $(this).css({
                    background: "#0b5ed7",
                    color: "#fff"
                });
            }).mouseout(function() {
                $(this).css({
                    background: "#0d6efd",
                    color: "#fff"
                });
            });
        });
    </script>

    <style>
        li {
            list-style: none;
        }

        .border-left-green {
            padding-left: 10px;
            border-left: 4px solid #28a745 !important;
        }

        .border-warning {
            padding-left: 10px;
            border-left: 4px solid #ffc107 !important;
        }

        .border-danger {
            padding-left: 10px;
            border-left: 4px solid #dc3545 !important;
        }
    </style>
@endsection
