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
        width: 220px;
        margin: 0 auto;
        font-size: 10px;
    }

    .fc-day-content {
        height: 2px;
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

    ::-webkit-scrollbar{
        width: 10px;
        background: #dbe8ec;
    }
    ::-webkit-scrollbar-button{
        width:8px;
        height: 5px;
    }
    ::-webkit-scrollbar-track{
        background:#6C3F30;
        border:thin solid #6C3F30;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb{
        background: -webkit-linear-gradient(top, #795730, #835334);
        -webkit-box-shadow:   inset 0 1px 0 rgba(255,255,225,.5),
            inset 1px 0 0 rgba(255,255,255,.4),
            inset 0 1px 2px rgba(255,255,255,.3);

        border:thin solid #232c34;
        border-radius: 10px;
        -webkit-border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover{
        background: -webkit-linear-gradient(top, #fff, #fff);
    }
    /* Pseudo-clase */
    ::-webkit-scrollbar-thumb:window-inactive {
        background: rgba(77,161,112,.6);
    }
</style>

<div class="row">
    <div class="col-md-3 column">
        <div id="es">
            <h2>La Biblioteca
                <a id="f_uk" style="cursor: pointer;" class="btn btn-primary">
                    <?php //echo $html->image('nuevo/flag_uk.png', array('alt' => 'English', 'title' => 'Read in English', 'width' => '30px', 'style' => 'float: right')); ?>
                    <font size="2" style="text-align: right;">English</font>
                </a>
            </h2>
            <p>
                La <b>Biblioteca Virtual Musicológica Juan Meserón</b> es un proyecto
                académico en desarrollo adscrito al Departamento de Musicología de la
                Escuela de Artes, así como a la Maestría en Música Latinoamericana,
                pertenecientes a la Facultad de Humanidades y Educación de la
                Universidad Central de Venezuela. La finalidad de la misma es reunir
                en un portal web materiales digitalizados considerados fundamentales
                para el estudio de la música en Venezuela. <br />
                <br /> En toda Biblioteca Virtual está presente la integración de la
                informática y las comunicaciones, teniendo como componente esencial el
                Internet con sus características de ubicuidad, sincronía, asincronía e
                hipermedialidad. Esto implica que las fronteras no están signadas por
                la geografía y la disponibilidad temporal es permanente, por lo que el
                usuario puede consultar los documentos siempre y cuando disponga de
                conexión a la red.
            </p>
            <p>La Biblioteca Virtual Musicológica Juan Meserón, que debe su nombre
                al autor del primer libro de música publicado en Venezuela, pone a
                disposición de la comunidad internacional las siguientes colecciones:

            <ul style="color: #6c3f30;">
                <li>Libros relacionados con la música de los siglos XVII hasta la
                    primera mitad del siglo XX depositados en fondos públicos venezolanos</li>
                <li>Hemerografía musical venezolana de los siglos XIX y XX</li>
                <li>Partituras de música venezolana de los siglos XVIII hasta
                    principios del siglo XX, tanto impresas como manuscritas</li>
                <li>Iconografía musical venezolana de los siglos XVI y XX</li>
                <li>Tesis, catálogos y bases de datos vinculados con temas musicales
                    generados en el Departamento de Musicología de la Escuela de Artes</li>
            </ul>
            </p>
            <p>Con este instrumento tecnológico, la Escuela de Artes de la UCV,
                espera poner a disposición del interesado documentos que corren el
                riesgo de desaparecer y que, hasta el momento, son de muy limitada
                consulta, para todo aquel investigador que no viva en Caracas.
            </p>
            <p>El equipo de trabajo de la BVMJM está conformado por profesores y
                estudiantes del Departamento de Musicología de la Escuela de Artes, de
                la Escuela de Comunicación Social y de la Escuela de Bibliotecología y
                Archivología de la Facultad de Humanidades y Educación, además de
                estudiantes y profesores de la Escuela de Computación de la Facultad
                de Ciencias, Universidad Central de Venezuela. El trabajo
                interdisciplinario de estos especialistas promete construir un portal
                amigable de fácil navegación con buscadores especializados y
                herramientas musicológicas de altísima calidad.
            </p>
            <p>El desarrollo de la BVMJM ha sido posible gracias al financiamiento
                del Consejo de Desarrollo Científico y Humanístico de la Universidad
                Central de Venezuela.
            </p>
        </div>
        <div id="en" style="display: none;">
            <h2>The Library
                <a id="f_spain" style="cursor: pointer;" class="btn btn-primary">
                    <?php //echo $html->image('nuevo/flag_spain.png', array('alt' => 'Español', 'title' => 'Leer en Español', 'width' => '30px', 'style' => 'float: right')); ?>
                    <font size="2" style="text-align: right;">Español</font>
                </a>
            </h2>
            <p>The <b>Musicological Virtual Library Juan Meserón</b> is developing an academic 
                project within the Department of Musicology at the School of Arts and Master 
                of Latin-American Music, belonging to the Faculty of Humanities and Education 
                of the Central University of Venezuela. The purpose of it is to bring together 
                in a web portal digitized materials considered essential to the study of music 
                in Venezuela.
            </p>
            <p>Across all Virtual Libraries are present the integration of computing and 
                communications, with the Internet as an essential component of ubiquity with 
                its characteristics, synchrony, asynchron. This implies that the boundaries 
                are not marked by geography and time availability is permanent, so the user 
                can consult the documents provided you have network connectivity.
            </p>
            <p>The Musicological Virtual Library Juan Meserón, which is named after the 
                author's first book of music published in Venezuela, offers the international 
                community the following collections:

            <ul style="color: #6c3f30;">
                <li>Books related to music from the seventeenth to the mid twentieth century 
                    Venezuelan public funds deposited in </li>
                <li>Hemerography Venezuelan music of the nineteenth and twentieth</li>
                <li>Scores of Venezuelan music from the eighteenth to early twentieth century, 
                    bothprinted and handwritten</li>
                <li>Venezuelan musical iconography of the sixteenth and twentieth</li>
                <li>Thesis, catalogs and databases associated with musical themes generated in 
                    the Department of Musicology at the School of Arts</li>
            </ul>
            </p>
            <p>With this technological tool, the School of Arts at the Central University 
                of Venezuela, expects to make available the documents concerned at risk of 
                disappearing and, so far, are very limited consultation, research for anyone not 
                living in Caracas.
            </p>
            <p>The working team at the Musicological Virtual Library Juan Meserón consists 
                in teachers and students of the Department of Musicology at the School of Arts, 
                School of Social Communication and the School of Library and Archival of the 
                Faculty of Humanities and Education, as well as students and teachers School of 
                Computing, Faculty of Sciences, Central University of Venezuela. Interdisciplinary 
                work of these specialists promise to build a friendly website with easy navigation 
                and search engines specialized musicological tools of highest quality.
            </p>
            <p>The development of the Virtual Library is ​possible by funding from the Council of 
                Scientific and Humanistic Development of the Central University of Venezuela.
            </p>
            <p>The Central University of Venezuela, meanwhile, is the oldest university in the 
                country (founded 1721) and is an autonomous institution of public interest and free, 
                with almost three centuries of service to the Venezuelan nation, dedicated to the 
                study and dissemination of Hispanic culture and universal. Its headquarters, the 
                University City of Caracas, was declared a World Heritage Site by UNESCO in 2000. 
                It currently has eleven faculties, counting among them the Faculty of Humanities and 
                Education, an institution which houses the School of Arts, rather than the rising of the 
                Virtual Library project Musicological John Meserón, after the author's first book of music 
                published in Venezuela.
            </p>		
        </div>

        <br />
        <p style="text-align: center;">
            <?php echo $this->Html->image('nuevo/firma_meseron.jpg', array('class' => 'img-responsive')); ?>
        </p>
    </div>
    <div class="col-md-6 column">
        <br />
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail">
                    <?php echo $this->Html->image('nuevo/1.jpg', array('url' => '/books', 'class' => 'img-responsive', 'title' => 'Entrar al Módulo de Libros.')); ?>
                    <div class="caption">
                        <h3>Libros</h3>
                        <p>En el Módulo Libros se exponen todos aquellos tratados o ensayos musicales 
                            que se difundieron o se produjeron en Venezuela durante los siglos XVII, 
                            XVIII, XIX y XX.</p>
                        <p class="text-center">
                            <?php echo $this->Html->link('Más Información', '/books/intro', array('class' => 'btn btn-primary')); ?>
                            <?php //echo $this->Html->link('Entrar', '/books', array('class' => 'btn btn-primary')); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <?php echo $this->Html->image('nuevo/2.jpg', array('url' => '/magazines', 'class' => 'img-responsive', 'title' => 'Entrar al Módulo de Hemerografías.')); ?>
                    <div class="caption">
                        <h3>Hemerografías</h3>
                        <p>El módulo Hemerografía Musical, contiene las principales publicaciones 
                            seriadas venezolanas vinculadas de alguna manera con la música.</p>
                        <p class="text-center">
                            <?php echo $this->Html->link('Más Información', '/magazines/intro', array('class' => 'btn btn-primary')); ?>
                            <?php //echo $this->Html->link('Entrar', '/magazines', array('class' => 'btn btn-primary')); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail">
                    <?php echo $this->Html->image('nuevo/3.jpg', array('url' => '/manuscripts', 'class' => 'img-responsive', 'title' => 'Entrar al Módulo de Música Manuscrita.')); ?>
                    <div class="caption">
                        <h3>Música Manuscrita</h3>
                        <p>El módulo partituras manuscritas de la BVMJM contiene música inédita que posee un superlativo interés para los estudios musicológicos en Venezuela; 
                            esto es: música de autores venezolanos o, incluso, música de compositores extranjeros transcrita por venezolanos.</p>
                        <p class="text-center">
                            <?php echo $this->Html->link('Más Información', '/manuscripts/intro', array('class' => 'btn btn-primary')); ?>
                            <?php //echo $this->Html->link('Entrar', '/manuscripts', array('class' => 'btn btn-primary')); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <?php echo $this->Html->image('nuevo/4.jpg', array('url' => '/printeds', 'class' => 'img-responsive', 'title' => 'Entrar al Módulo de Música Impresa.')); ?>
                    <div class="caption">
                        <h3>Música Impresa</h3>
                        <p>El módulo partituras impresas de la BVMJM contiene música editada que posee un marcado interés para los estudios musicológicos en Venezuela; 
                            esto es: música de autores venezolanos y extranjeros impresa en Venezuela y música de venezolanos impresa en el exterior.</p>
                        <p class="text-center">
                            <?php echo $this->Html->link('Más Información', '/printeds/intro', array('class' => 'btn btn-primary')); ?>
                            <?php //echo $this->Html->link('Entrar', '/', array('class' => 'btn btn-primary', 'onclick' => 'alert("Módulo en construcción."); return false;')); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail">
                    <?php echo $this->Html->image('nuevo/5.jpg', array('url' => '/iconographies', 'class' => 'img-responsive', 'title' => 'Entrar al Módulo de Iconografías.')); ?>
                    <div class="caption">
                        <h3>Iconografías</h3>
                        <p>La iconografía musical es considerada como una ciencia y método de investigación auxiliar de la musicología, que consiste en la interpretación de 
                            documentos gráficos u objetos tridimensionales que estén provistos de escenas, temáticas, 
                            simbologías e instrumentos vinculados con la música.</p>
                        <p class="text-center">
                            <?php echo $this->Html->link('Más Información', '/iconographies/intro', array('class' => 'btn btn-primary')); ?>
                            <?php //echo $this->Html->link('Entrar', '/iconographies', array('class' => 'btn btn-primary')); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <?php echo $this->Html->image('nuevo/7.jpg', array('url' => '/', 'class' => 'img-responsive', 'title' => 'Entrar al Módulo de Documentos.')); ?>
                    <div class="caption">
                        <h3>Documentos</h3>
                        <p>El Módulo Documentos contiene una selección de importantes documentos digitalizados vinculados con la música en Venezuela: partidas de bautismo, 
                            matrimonio y/o defunción de músicos, Actas del Cabildo, Recibos de Pago, Contrataciones, etc.<br /><br /></p>
                        <p class="text-center">
                            <?php echo $this->Html->link('Más Información', '/documents/intro', array('class' => 'btn btn-primary', 'onclick' => 'alert("Módulo en construcción."); return false;')); ?>
                            <?php //echo $this->Html->link('Entrar', '/', array('class' => 'btn btn-primary', 'onclick' => 'alert("Módulo en construcción."); return false;')); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="thumbnail">
                    <?php echo $this->Html->image('nuevo/6.jpg', array('url' => '/academic_papers', 'class' => 'img-responsive', 'title' => 'Entrar al Módulo de Trabajos Académicos.', 'style' => 'margin: 0 auto;')); ?>
                    <div class="caption">
                        <h3>Trabajos Académicos</h3>
                        <p style="text-align: justify;">Este módulo almacenará los trabajos especiales de grado, trabajos de ascenso y tesis de Maestría y Doctorado del Departamento de música de la 
                            Escuela de Artes, así como artículos académicos de estudiantes y profesores de la UCV y otras casas de estudio con carreras musicales en Venezuela.</p>
                        <p class="text-center">
                            <?php echo $this->Html->link('Más Información', '/academic_papers/intro', array('class' => 'btn btn-primary')); ?>
                            <?php //echo $this->Html->link('Entrar', '/', array('class' => 'btn btn-primary', 'onclick' => 'alert("Módulo en construcción."); return false;')); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-3 column" style="height: 1865px; overflow: auto;">
        <div class="events calendar">
            <br />
            <div id='loading' style='display: none'>Cargando ...</div>
            <div id='calendar'></div>
        </div>

        <h2>Noticias</h2>
        <?php $news = $this->requestAction('/news/news'); ?>
        <div style="width: 270px; padding-right: 10px;">
            <p class="noticias_txt lead" style="text-align: justify;">
                <br />
                <?php foreach ($news as $new) { ?>
                <p><strong><span class="noticias_tit"><?php echo $new['News']['title']; ?></span></strong></p>
                        <?php echo $new['News']['content']; ?>
                <p><i>Publicado el <?php echo $time->format('d-m-Y', $new['News']['created']); ?>.</i></p>
                <br />
            <?php } ?>
            </p>
            <!--
            <p>
                    <a class="btn btn-primary" href="#">Leer Más</a>
            </p>
            -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        // Cambia el texto a ingles.
        $("#f_uk").click(function () {
            $("#es").hide();
            $("#en").show();
        });

        // Cambia el texto a español.
        $("#f_spain").click(function () {
            $("#en").hide();
            $("#es").show();
        });

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
            eventMouseover: function (event, jsEvent, view) {
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