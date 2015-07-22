<?php
echo $this->Html->css('fullcalendar/fullcalendar');
echo $this->Html->css('fullcalendar/fullcalendar.print');
echo $this->Html->script('fullcalendar/fullcalendar');
//echo $this->Html->script('fullcalendar/gcal');
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: false,
			eventMouseover: function(event, jsEvent, view) {
	            //if (view.name !== 'agendaDay') {
	                $(jsEvent.target).attr('title', event.title);
	            //}
	        },
			selectable: false,
			events: "events/events.php",
			loading: function(bool) {
				if (bool) $('#loading').show();
				else $('#loading').hide();
			}
		});
	});
</script>
<style>
	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}

	#calendar {
		width: 900px;
		margin: 0 auto;
	}
</style>

<div class="events calendar">
<br />
<div id='loading' style='display:none'>Cargando ...</div>
<div id='calendar'></div>
</div>