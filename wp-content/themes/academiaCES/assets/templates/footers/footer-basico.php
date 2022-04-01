<style>
    <?php include get_template_directory() . '/assets/templates/footers/footer.css'; ?>
</style>
<div id="FooterBasico" class="container">
    <!--menu footer-->
    <div class="row">


        <div class="row col-12 col-md-9">
            <div class="col-12 col-md-2">
                <?php include get_template_directory() . '/assets/templates/site-branding/site-branding.php'; ?>
            </div>
            <?php
            wp_nav_menu(array(

                'theme_location' => 'menu-footer',
                'container_class'      => 'menu-menu-container col-12 col-md-8 mt-3',
                'menu_id'        => 'footer-nav',
                'menu_class' => 'footer-navbar-nav m-0',
            )); ?>

        </div>
        <div class="col-12 col-md-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success col-12" data-toggle="modal" data-target="#exampleModal">
                Reservar
            </button>
            <div class="row">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-rrss',
                    'container_class'      => 'menu-rrss-container col-12 mt-3',
                    'menu_id'        => 'footer-nav-rrss',
                    'menu_class' => 'footer-navbar-nav nav-rrss m-0',
                )); ?>
            </div>
        </div>
    </div>
    <!--menu footer-->

    <!--menu footer columnas 2-->
    <div class="row col-12">
        <div class="col-12 col-md-3">
            menu 1
        </div>

        <div class="col-12 col-md-3">
            menu 2
        </div>

        <div class="col-12 col-md-3">
            menu 3
        </div>
    </div>
    <!--menu footer columnas 2-->
    <div class="row col-12">
        2021 Puerto nuevo todos los derechos reservados.
    </div>



</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://puertonuevo.hotelero.pro/reservar" allowfullscreen></iframe>
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bg-dark" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>