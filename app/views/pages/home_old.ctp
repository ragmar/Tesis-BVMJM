<?php //echo $this->Html->script('wijmo/jquery.wijmo.wijcalendar'); ?>
<?php //echo $this->Html->script('wijmo/external/globalize.min'); ?>
<?php //echo $this->Html->script('wijmo/external/cultures/globalize.cultures'); ?>
<?php
echo $this->Html->css('fullcalendar/fullcalendar');
echo $this->Html->css('fullcalendar/fullcalendar.print');
echo $this->Html->script('fullcalendar/fullcalendar');
?>

<style>
.texto {
 	color: #6C3F30;
    font-family: "Trebuchet MS", Arial, Helvetica, Sans-Serif;
    font-size: 12px;
    line-height: 170%;
    margin-left: 10px;
    margin-right: 10px;
}

/* Full Calendar */
#calendar {
    width: 260px;
    margin: 0 auto;
    font-size: 10px;
}
.fc-day-content{
	height: 5px;
}
.fc-header-title h2 {
    font-size: 1.8em;
    /* white-space: normal !important; */
}
.fc-view-month .fc-event, .fc-view-agendaWeek .fc-event {
    font-size: 0;
    overflow: hidden;
    height: 2px;
}
.fc-view-agendaWeek .fc-event-vert {
    font-size: 0;
    overflow: hidden;
    width: 2px !important;
}
.fc-agenda-axis {
    width: 20px !important;
    font-size: .7em;
}

.fc-button-content {
    padding: 0;
}
</style>
<br />
<div>
	<div style="width: 20%; float: left;">
		<p class="texto">
			La <strong>Biblioteca Virtual Musicol&oacute;gica Juan Meser&oacute;n</strong> pertenece al consorcio MultiMatch, 
			un proyecto financiado por la Comisi&oacute;n Europea en el per&iacute;odo 2006-2008, que pretende constituir un 
			motor de b&uacute;squeda multiling&uuml;e y multimedia para facilitar el acceso a los contenidos digitales relacionados 
			con el patrimonio cultural mundial. Pretende constituir un motor de b&uacute;squeda multiling&uuml;e y multimedia para 
			facilitar el acceso a los contenidos digitales relacionados con el patrimonio cultural mundial. Que 
			pretende constituir un motor de b&uacute;squeda multiling&uuml;e y multimedia para facilitar el acceso.
		</p>
		<?php echo $this->Html->image('ts/ima_firma.jpg'); ?>
	</div>
	
	<div style="width: 24%; float: left;">
		<a href="<?php echo $this->base . '/books'; ?>">
		<?php echo $this->Html->image('ts/tit_libros.jpg'); ?>
		<?php echo $this->Html->image('ts/ima_libros.jpg'); ?>
		<?php echo $this->Html->image('ts/vercol_libros.jpg'); ?>
		</a>
		<br /><br />
		<a href="<?php echo $this->base . '/'; ?>">
		<?php echo $this->Html->image('ts/tit_m_manus.jpg'); ?>
		<?php echo $this->Html->image('ts/ima_m_manus.jpg'); ?>
		<?php echo $this->Html->image('ts/vercol_m_manus.jpg'); ?>
		</a>
		<br /><br />
		<a href="<?php echo $this->base . '/'; ?>">
		<?php echo $this->Html->image('ts/tit_iconog.jpg'); ?>
		<?php echo $this->Html->image('ts/ima_iconog.jpg'); ?>
		<?php echo $this->Html->image('ts/vercol_iconog.jpg'); ?>
		</a>
	</div>
	<div style="width: 24%; float: left;">
		<a href="<?php echo $this->base . '/magazines'; ?>">
		<?php echo $this->Html->image('ts/tit_hemerografia.jpg'); ?>
		<?php echo $this->Html->image('ts/ima_hemero.jpg'); ?>
		<?php echo $this->Html->image('ts/vercol_hemero.jpg'); ?>
		</a>
		<br /><br />
		<a href="<?php echo $this->base . '/'; ?>">
		<?php echo $this->Html->image('ts/tit_m_impre.jpg'); ?>
		<?php echo $this->Html->image('ts/ima_m_impre.jpg'); ?>
		<?php echo $this->Html->image('ts/vercol_m_impre.jpg'); ?>
		</a>
		<br /><br />
		<a href="<?php echo $this->base . '/'; ?>">
		<?php echo $this->Html->image('ts/tit_tesis.jpg'); ?>
		<?php echo $this->Html->image('ts/ima_tesis.jpg'); ?>
		<?php echo $this->Html->image('ts/vercol_tesis.jpg'); ?>
		</a>
	</div>
	
	<div style="width: 29%; float: left;" class="texto">
		
	<div class="events calendar">
		<br />
		<div id='loading' style='display:none'>Cargando ...</div>
		<div id='calendar'></div>
	</div>

		<?php echo $this->Html->image('ts/tit_noticias.jpg'); ?>
		<?php $news = $this->requestAction('/news/news'); ?>
		<div style="height:460px; width: 270px; overflow: auto; padding-right: 10px;">
		<p class="noticias_txt" style="text-align: justify;"><br />
			<?php foreach ($news as $new) { ?>
				<strong><span class="noticias_tit"><?php echo $new['News']['title']; ?></span></strong><br />
				<?php echo $new['News']['content']; ?>
				<br />
				<i>Publicado el <?php echo $time->format('d-m-Y', $new['News']['created']); ?>.</i>
				<br /><br />
			<?php } ?>
		</p>
		</div>
	</div>
</div>

<br />

<div style="clear: both; background-color: white;"></div>

<script type="text/javascript">
    $(document).ready(function () {
        // Calendario wijmo.
        /*$("#calendar").wijcalendar({
            	navButtons: 'default',
            	showWeekNumbers: false,
            	culture: "es-ES",
            	nextPreviewTooltip: 'Anterior'
        });*/

        // Full Calendar
    	$('#calendar').fullCalendar({
			editable: false,
			// add event name to title attribute on mouseover
	        eventMouseover: function(event, jsEvent, view) {
	            //if (view.name !== 'agendaDay') {
	                $(jsEvent.target).attr('title', event.title);
	            //}
	        },
			selectable: false,
			events: "<?php echo $this->base; ?>/events/events",
			/*loading: function(bool) {
				if (bool) $('#loading').show();
				else $('#loading').hide();
			}*/
		});
    });
</script>