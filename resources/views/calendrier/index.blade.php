@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Calendar</h2>
        <div class="card">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <!-- Include necessary CSS and JS libraries for the calendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
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
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                editable: false,
                events: {!! $webinaires !!},
                eventRender: function(event, element) {
                    // Add event descriptions as tooltips
                    
                }
            });
        });
    </script>
@endsection
