<?php
    echo $this->Html->css(array('frontend/fullcalendar.min'));
    echo $this->Html->script(array('frontend/lib/moment.min','frontend/fullcalendar.min'));
?>

<div class="container">
 	<?php extract($PageVar); ?>
    <?php echo $this->element('frontend-breadcumb'); ?>    
    <div class="table-responsive timetable">
        <script>

            jQuery(document).ready(function() {
                
                $.ajax({
                   url: '<?=PRACTITIONER_WEBROOT?>availability/get_availabilities',
                   type: 'POST',
                   data: 'type=fetch',
                   async: false,
                   success: function(response){
                     json_events = response;
                     console.log(json_events);
                   }
                });
                
                jQuery('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: new Date(),
                    navLinks: true, // can click day/week names to navigate views
                    selectable: false,
                    selectHelper: true,
                    select: function(start, end) {
                        var title = prompt('Event Title:');
                        var eventData;
                        if (title) {
                            eventData = {
                                title: title,
                                start: start,
                                end: end
                            };
                            jQuery('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                        }
                        jQuery('#calendar').fullCalendar('unselect');
                    },
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: {
                        url: '<?=PRACTITIONER_WEBROOT?>availability/get_availabilities',
                        type: 'POST', // Send post data
                        error: function() {
                            alert('There was an error while fetching events.');
                        }
                    },
                    eventClick:  function(event, jsEvent, view) {
                        $('#bookAppointment').attr('data-aid',event.id);
                        $('#bookAppointment').attr('data-uid',event.user_id);
                        $('#modalTitle').html('<i class="fa fa-user-md"></i> '+event.title);
                        $('#EmailId').html('<i class="fa fa-envelope"></i> '+event.email);
                        $('#ContactNumber').html('<i class="fa fa-phone"></i> '+event.contact_no);
                        $('#FaxNumber').html('<i class="fa fa-fax"></i> '+event.fax_no);
                        $('#aboutPractitioner').html('<b>About Practitioner</b> : '+event.user_description);
                        $('#Address').html('<i class="fa fa-map-marker"></i> '+event.description);
                        $('#StartTime').html('<i class="fa fa-clock-o"></i> <b> Start Time : '+moment(event.start).format('MMM Do h:mm A'));
                        $('#EndTime').html('<i class="fa fa-clock-o"></i> <b> End Time : '+moment(event.end).format('MMM Do h:mm A'));
                        $('#calendarModal').modal();
                    },
                });
                
                $('#bookAppointment').click(function(){
                    $.ajax({
                        url:'',
                        method:'',
                        data:'',
                        beforeSend:function(){

                        },
                        success:function(response){
                            
                        }
                    });
                });
            });

        </script>
        <div id='calendar'></div>
    </div>  
</div>
<!-- Model -->
<div id="calendarModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"> 
                <p id="aboutPractitioner"></p>
                <div id="Address"></div>
                <div id="EmailId"></div>
                <div id="ContactNumber"></div>
                <div id="FaxNumber"></div>
                <div id="StartTime"></div>
                <div id="EndTime"></div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary" data-uid="" data-aid="" id="bookAppointment" data-dismiss="modal">Book an Appointment</button> -->
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>