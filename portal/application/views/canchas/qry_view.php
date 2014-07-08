<section id="content">	

    <!-- Page Heading -->
    <section class="section page-heading animate-onscroll">

        <h1>Búsqueda de Canchas</h1>
        <p class="breadcrumb"><a href="<?php echo URL_MAIN; ?>">Inicio</a> / Búsqueda de Canchas</p>

    </section>
    <!-- Page Heading -->



    <!-- Section -->
    <section class="section full-width-bg gray-bg">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="media-filters" style="opacity: 1;">

                    <div class="filter-filtering">

                        <label>Buscar por:</label>
                        <ul class="filter-dropdown">
                            <li><span>Nombre</span>
                                <ul>
                                    <li data-filter="all" class="filter">Nombre</li>
                                    <li data-filter=".category-campaign" class="filter">Precio</li>
                                </ul>
                            </li>
                        </ul>

                    </div>

                    <!--                    <label>Sort by:</label>-->

                    <div class="filter-sorting">
                        <input type="text" class="clase_input" />
                    </div>

                    <div class="filter-sorting" style="vertical-align: top;margin-left: 10px;">
                        <a class="button medium2 cursor_pointer" id="btn_fnd_canchas_qry">
                            Buscar algo
                        </a>

                    </div>

                    <script>
                        $(function(){   

                            // ACCION COMBO DEPARTAMENTO -> BUSCAR PROVINCIAS Y DISTRITOS
                            $("#btn_fnd_canchas_qry").bind('click', function(event){
                                alert("buscando");
                            }); 
   
                        });    
                    </script>

                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="media-items row">
                    <?php $i = 1; ?>
                    <?php foreach ($list_canchas as $list_canchas) { ?>
                        <?php
                        if ($i == 1) {
                            $img_cancha = 'img-demo3.jpg';
                        } else if ($i == 2) {
                            $img_cancha = 'img-demo4.jpg';
                        } else if ($i == 3) {
                            $img_cancha = 'img-demo5.jpg';
                        } else if ($i == 4) {
                            $img_cancha = 'img-demo6.jpg';
                        } else if ($i == 5) {
                            $img_cancha = 'img-demo7.jpg';
                        } else if ($i == 6) {
                            $img_cancha = 'img-demo8.jpg';
                        } else if ($i == 7) {
                            $img_cancha = 'img-demo3.jpg';
                        } else if ($i == 8) {
                            $img_cancha = 'img-demo4.jpg';
                        }
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 mix category-photos" data-nameorder="1" data-dateorder="3">

                            <!-- Media Item -->
                            <div class="media-item animate-onscroll ">
                                <div class="media-image">
                                    <img src="<?php echo URL_IMG; ?><?php echo $img_cancha; ?>" alt="">
                                    <div class="media-hover">
                                        <div class="media-icons">
                                            <a href="<?php echo URL_IMG; ?><?php echo $img_cancha; ?>" data-group="media-jackbox" data-thumbnail="img/media/media1.jpg" class="jackbox media-icon"><i class="icons icon-zoom-in"></i></a>
                                            <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo str_replace(" ", "-", $list_canchas->cCanNombre) . "_" . $list_canchas->nCanID; ?>" target="_blank" class="media-icon"><i class="icons icon-link"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="media-info">
                                    <div class="media-header">
                                        <div class="media-caption">
                                            <h2><a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo str_replace(" ", "-", $list_canchas->cCanNombre) . "_" . $list_canchas->nCanID; ?>" target="_blank"><?php echo $list_canchas->cCanNombre; ?></a></h2>
                                        </div>
                                    </div>

                                    <div class="media-description">
                                        <p>
                                            <i class="icons icon-location"></i> <?php echo $list_canchas->direccion; ?>
                                        </p>
                                        <p>
                                            <i class="icons icon-home"></i> <?php echo $list_canchas->distrito; ?>, <?php echo $list_canchas->departamento; ?>
                                        </p>
                                        <p>
                                            <i class="icons icon-phone"></i> <?php echo $list_canchas->telefono; ?>
                                        </p>
                                        <p>
                                            <i class="icons icon-flag-1"></i> <?php echo $list_canchas->nro_canchas; ?>
                                        </p>
                                    </div>

                                    <div class="media-button">
                                        <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo str_replace(" ", "-", $list_canchas->cCanNombre) . "_" . $list_canchas->nCanID; ?>" target="_blank" class="button big button-arrow">Ver detalle</a>									</div>

                                </div>
                            </div>
                            <!-- /Media Item -->							
                        </div>

                        <?php $i++; ?>
                    <?php } ?>

                </div>

                <div class="animate-onscroll">
                    <div class="divider"></div>
                    <div class="numeric-pagination">
                        <a href="#" class="button"><i class="icons icon-left-dir"></i></a>
                        <a href="#" class="button">1</a>
                        <a href="#" class="button active-button">2</a>
                        <a href="#" class="button">3</a>
                        <a href="#" class="button"><i class="icons icon-right-dir"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /Section -->

</section>