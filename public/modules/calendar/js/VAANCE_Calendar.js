var VAANCE_Calendar = {

    init: function () {
        this.createEventSetup();
        this.createCalendarSetup();
        this.fullScreen();
        this.calendarSwitch();

        $(window).resize(function() {
            $('#fullcalendar').fullCalendar( "rerenderEvents" );
        });

    },

    calendarSwitch: function(){

        $('#switch-calendar').select2({
            theme: "bootstrap",
            width: '100%',
            ajax: {
                url: '/calendar/accessible-calendars'
            }
        });
        $('#switch-calendar').on('select2:select', function (e) {
            window.location.href = "/calendar?calid="+e.params.data.id;
        });

    },


    fullScreen: function () {

        $(document).on('click','#calendar-full-screen',function(e){

            e.preventDefault();

            var calendarContainer =  $('#calendar-container');

            if(calendarContainer.hasClass('full-screen')){
                calendarContainer.removeClass('full-screen');
            }else{
                calendarContainer.addClass('full-screen');
            }

        });

    },


    refreshEvents: function(){
        $('#fullcalendar').fullCalendar('refetchEvents');
    },

    createCalendarSetup : function(){

        $(document).on('click', "#create-new-calendar", function (e) {
            e.preventDefault();

            var me = $(this);

            var modal = $('#calendar-event-modal');

            modal.find('.modal-body').load(me.attr('data-create-route'), function (result) {
                modal.modal('toggle');
                VAANCE_Common.initComponents();
                $.AdminBSB.input.activate();
            });
        });

        $(document).on("submit", ".calendarModalForm", function (e) {

            e.preventDefault();

            var form = $(e.target);

            $.post(form.attr('action'), form.serialize(), function (result) {

                $(form).parents('.modal').modal('toggle'); // close parent

                if (result.action == 'refresh_datatable') {

                    VAANCE_Common.showNotification('bg-green', result.message);

                    VAANCE_Calendar.calendarSwitch();
                    VAANCE_Calendar.refreshEvents();
                }

                if (result.action == 'show_message') {

                    VAANCE_Common.showNotification('bg-red', result.message);

                    VAANCE_Calendar.calendarSwitch();
                    VAANCE_Calendar.refreshEvents();
                }

            });

        });

    },


    createEventSetup: function () {
        // open popup

        $(document).on('click', "#create-calendar-event", function (e) {
            e.preventDefault();

            var me = $(this);

            var modal = $('#calendar-event-modal');

            modal.find('.modal-body').load(me.attr('data-create-route'), function (result) {
                modal.modal('toggle');
                VAANCE_Common.initComponents();
                $.AdminBSB.input.activate();
            });
        });

        $(document).on("submit", ".eventModalForm", function (e) {

            e.preventDefault();

            var form = $(e.target);

            $.post(form.attr('action'), form.serialize(), function (result) {

                $(form).parents('.modal').modal('toggle'); // close parent

                if (result.action == 'refresh_datatable') {

                    VAANCE_Common.showNotification('bg-green', result.message);

                    VAANCE_Calendar.refreshEvents();
                }

                if (result.action == 'show_message') {

                    VAANCE_Common.showNotification('bg-red', result.message);

                    VAANCE_Calendar.refreshEvents();
                }

            });

        });
    },

    calendarEventSelect: function (start, end, jsEvent, view) {

        var modal = $('#calendar-event-modal');

        modal.find('.modal-body').load(window.EVENT_CREATE_URL + "&start_date=" + start.format() + "&end_date=" + end.format()+"&calendar_utc=1", function (result) {

            modal.modal('toggle');
            VAANCE_Common.initComponents();
            $.AdminBSB.input.activate();

        });
    },

    calendarEventDrop: function (event, delta, revertFunction) {

        var start = event.start;
        var end   = event.end;

        if(event.allDay){
            start = event.start.format("DD-MM-YYYY");
            end   = event.start.format("DD-MM-YYYY");
        }else{
            start = event.start.format("DD-MM-YYYY HH:mm");
            if(end != null) {
                end = event.end.format("DD-MM-YYYY HH:mm");
            }else{
                end = event.start.add(2, 'hours').format("DD-MM-YYYY HH:mm");
            }
        }

        $.ajax({
            type: "POST",
            url: '/calendar/event-manage',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'action' : 'drop',
                'eventId': event.id,
                'startDate' : start,
                'endDate' : end,
                'fullDay' : event.allDay,
                'calendar_utc': 1
            },
            dataType: 'json',
            success: function (result) {
                if(result.action === 'refresh' || result.action ==='refresh_datatable'){
                    VAANCE_Calendar.refreshEvents();
                    VAANCE_Common.showNotification('bg-green', result.message);
                }
                if(result.action === 'show_message'){
                    VAANCE_Common.showNotification('bg-red', result.message);
                    VAANCE_Calendar.refreshEvents();
                }

            }
        });
    },

    calendarEventClick: function (event, jsEvent, view) {

        var modal = $('#calendar-event-modal');

        modal.find('.modal-body').load("/calendar/events/"+event.id+"/edit?mode=modal", function (result) {

            modal.modal('toggle');
            VAANCE_Common.initComponents();
            $.AdminBSB.input.activate();

        });

        $(document).on('click', ".event-details-btn", function (e) {
            var eventId = $(this).attr('data-id');

            window.location = '/calendar/events/'+eventId;
        });

        $(document).on('click', ".event-delete-event-btn", function (e) {

            var r = confirm($.i18n._('are_you_sure'));

            if (r !== true) {
                return false;
            }

            var eventId = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: '/calendar/events/'+eventId,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    '_method' : 'DELETE',
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'entityCreateMode' : 'modal'
                },
                dataType: 'json',
                success: function (result) {

                    modal.modal('toggle');

                    if(result.action === 'refresh' || result.action === 'refresh_datatable'){

                        VAANCE_Calendar.refreshEvents();
                        VAANCE_Common.showNotification('bg-green', result.message);
                    }
                    if(result.action === 'show_message'){
                        VAANCE_Common.showNotification('bg-red', result.message);
                        VAANCE_Calendar.refreshEvents();
                    }
                }
            });
        });


    },

    calendarEventResize: function (event, delta, revertFunction) {
        $.ajax({
            type: "POST",
            url: '/calendar/event-manage',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'action' : 'resize',
                'eventId': event.id,
                'endDate' : event.end.format("DD-MM-YYYY HH:mm"),
                'calendar_utc': 1
            },
            dataType: 'json',
            success: function (result) {
                if(result.action === 'refresh' || result.action === 'refresh_datatable'){
                    VAANCE_Calendar.refreshEvents();
                    VAANCE_Common.showNotification('bg-green', result.message);
                }
                if(result.action === 'show_message'){
                    VAANCE_Common.showNotification('bg-red', result.message);
                    VAANCE_Calendar.refreshEvents();
                }

            }
        });
    }

}

VAANCE_Calendar.init();