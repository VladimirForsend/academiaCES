<!doctype html>
<html <?php language_attributes(); ?> >
<?php $actual_link =  get_stylesheet_directory_uri() ;?> 
	<head>
	<link rel="icon" href="<?php echo $actual_link."/modulos-forsend/forsend-reporteria/img/ces.ico"; ?>" sizes="32x32" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	</head>
	<?php global $user;

	global $wpdb;
	$fecha2 = date("Y-m-d 23:59:59", time() );// "2021-05-05 23:59:59";
	$fecha1 = date("Y-m-d 00:00:00", time() ); //"2021-05-05 00:00:00";
	
		$cursos = $wpdb->get_results('SELECT 
		u.user_login rut,
		u.user_email email,
		u1.meta_value nombre,
		u2.meta_value apellido,
		u3.meta_value celular,
		u4.meta_value nivel,
		p1.ID id_curso,
		p1.post_title nom_curso,
		i.status estado,i.graduation progreso,i.start_time comienzo,i.end_time fin
		 FROM `wp_learnpress_user_items` i
		left join wp_users u on u.ID = i.user_id
		left join wp_usermeta u1 on u1.user_id = u.ID and u1.meta_key ="first_name"
		LEFT join wp_usermeta u2 on u2.user_id = u.ID and u2.meta_key ="last_name"
		left join wp_usermeta u3 on u3.user_id = u.ID and u3.meta_key ="user_cel"
		left join wp_usermeta u4 on u4.user_id = u.ID and u4.meta_key ="user_nivel"
		left join wp_posts p1 on p1.ID = i.item_id 
		where not p1.ID ="null"
		order by email');
		//echo json_encode($cursos);
	?>

	<link rel="stylesheet" href='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/css/bootstrap.css";?>' >
	<link rel="stylesheet" href='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/css/reporteria.css";?>' >
	<link rel="stylesheet" href='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/css/jquery-ui.css";?>' >	  
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

	<script src='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/js/jquery.min.js";?>' ></script>
	<script src='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/js/bootstrap.min.js";?>' ></script>
	<script src='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/js/reporteria.js";?>' ></script>
	<script src='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/js/jquery-ui.js";?>' ></script>

	<script src='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/js/xlsx.full.min.js";?>' ></script>
	<?php /*
	<script src='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/js/dropdown.js";?>' ></script>
	<link rel="stylesheet" href='<?php echo $actual_link."/modulos-forsend/forsend-reporteria/css/dropdown.css";?>' >
	 */?>
	<body id="page-admin-reporteria" class="modulo-reporteria">
     
		<div class="header-reporteria row mb-1">
			<div class="col-12 col-md-4 justify-content-start p-0">
				<img class="logo-reporteria" alt="AcademiaCES" src="<?php echo $actual_link."/modulos-forsend/forsend-reporteria/img/ces.ico"; ?>" width="250" height="110">
			</div>
			<div class="col-12 col-md-4 justify-content-center align-items-center d-flex">
					<h3 class="text-center primary-color">Reporteria Academia CES</h3>
			</div>
			<div class="col-12 col-md-4 flex-column justify-content-center align-items-center d-flex pr-5">
				<!--
				<div class="d-flex justify-content-end text-right w-100">
					<div class="filtros-estados row m-0 text-left">		
										
							<select name="filter_by">
								<option value="">Filtrar por.. </option>
								<option value = "p.ID" >Nº orden</option>
								<option value = "pm1.meta_value" >Nombre</option>
								<option value = "local_t.nombre" >Nombre local</option>
								<option value = "p.post_date" >Fecha de emisión</option>
								<option value = "pm10.meta_value" >Código de Autorización</option>
								<option value = "pm11.meta_value" >Nº de tarjeta</option>
								<option value = "pm17.meta_value" >Télefono</option>
								<option value = "pm3.meta_value" >Correo electrónico</option>
							</select>
					
						<input class="col-8 pl-2" type="search" id="post-search-input" name="s" value="" placeholder="Busca un pedido">
						<button type="submit" id="search-submit" class="button col-4" value="Buscar pedidos">Buscar</button>
					</div>
				</div>
				-->
			</div>
		</div>
		
		<div class="tablenav top pr-2 pl-2">

			<div class="container-fluid">
				<!--
				<div class="row seccion-select-filtros">				
					<div class="filtros-pagos col-2 text-left">
						<h6 class="mb-0"><i class="fas fa-money-check-alt"></i> Método de pago</h6>
						<select name="filter_shop_order_by_meta_2">
							<option value="">Filtro método de pago</option>
                            <option value="all">Todos</option>
                            <option value="Amipass">Amipass</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Sodexo">Sodexo</option>
                            <option value="Tarjeta Hites">Tarjeta Hites</option>
                            <option value="Tarjetas Bancarias (débito y crédito)">Tarjetas Bancarias (débito y crédito)</option>
                            <option value="Ticket Restaurant">Ticket Restaurant</option>
                            <option value="Transbank Webpay Plus">Transbank Webpay Plus</option>                     
						</select>	
					</div>	
					<div class="filtros-estados col-2 text-left p-0">
						<h6 class="mb-0"><i class="fas fa-clipboard-check"></i> Estado</h6>
						<select name="filter_shop_order_by_meta_3">
							<option value=''>Filtro estado orden</option>
							<option value='all'>Todos</option>
							<option value='wc-completed' >Completado</option>
							<option value='wc-cancelled'>Cancelado por webpay</option>
							<option value='wc-cancelled-local'>Cancelado por local</option>
							<option value='wc-failed'>Fallido</option>
							<option value='wc-pending'>Pendiente de pago</option>
							<option value='wc-processing'>Procesando</option>
						</select>	
					</div>	
					<div class="datepicker col-1 text-left pr-0">
						<h6 class="mb-0"><i class="far fa-calendar-minus"></i> Desde</h6>
						<input type="text" id="datepicker-antes"> 
					</div>
					<div class="datepicker col-1 text-left pr-0">
						<h6 class="mb-0"><i class="far fa-calendar-plus"></i> Hasta</h6>
						<input type="text" id="datepicker-despues">
					</div>
					<div class="filtros-clases col-3 text-left">					
						<h6 class="mb-0"><i class="fas fa-store"></i> clases</h6>		
						<select name="filter_shop_order_by_meta" id="myMulti" class="" multiple="multiple" >							
							<option value="100">Todos</option>
							<option value="0">La Florida</option>
							<option value="1">Las Condes</option>
							<option value="2">La Dehesa</option>
							<option value="3">Santiago Sur</option>
							<option value="4">Santiago Centro</option>
							<option value="5">Independencia</option>
							<option value="6">Huechuraba</option>
							<option value="7">San Miguel</option>
							<option value="8">Maipú Centro</option>
							<option value="9">Puente Alto</option>
							<option value="10">Via del Mar</option>
							<option value="11">Maipú Poniente</option>
							<option value="12">Rancagua</option>
							<option value="13">Quilicura</option>
							<option value="14">La Cisterna</option>
							<option value="15">Antofagasta Sur</option>
							<option value="16">Antofagasta Norte</option>
							<option value="17">La Serena</option>
							<option value="18">Lo Prado</option>
							<option value="19">Vitacura</option>
							<option value="20">Colón</option>
							<option value="21">El Bosque</option>
							<option value="22">Providencia</option>
							<option value="23">La Reina</option>
							<option value="24">Ñuñoa</option>
							<option value="25">Peñalolén</option>
							<option value="26">Macul</option>
							<option value="27">Cerrillos</option>
						</select>				
					</div>
					<div class="boton-enviar col-1 text-left d-flex align-items-end p-0">
						<button type="submit" name="filter_action" id="post-query-submit" class="button  btn-primary w-100" value="Filtrar">Filtrar</button>
					</div>		
							
				</div>
				-->
				<div class="boton-imprimir col-1 text-left d-flex align-items-end p-0">
						<button type="submit" name="print_action" id="print-query-btn" class="button  btn-secondary w-100" value="Imprimir">Imprimir</button>
				</div>	
			</div>		

			<div class="container-fluid mt-2 pl-0 pr-0">
				<div class="row seccion-titulos-datos m-0">				
				<h5 class="col-1"> 
						Rut
					</h5>
					<h5 class="col-1" > 
						Email
					</h5>
					<h5 class="col-1"> 
						Nombre
					</h5>
					<h5 class="col-1"> 
						Apellido
					</h5>
					<h5 class="col-1"> 
						Celular
					</h5>
					<h5 class="col-1"> 
						Nivel
					</h5>
					<h5 class="col-1"> 
						Id Curso
					</h5>
					<h5 class="col-1"> 
						Nombre clase
					</h5>
					<h5 class="col-1"> 
						Estado					
					</h5>
					<h5 class="col-1"> 
						Progreso
					</h5>
					<h5 class="col-1"> 
						Comienzo
					</h5>
					<h5 class="col-1"> 
						Fin
					</h5>
					
				</div>

				<div id="data-clases">	
					<?php 
					$i = 0;
					if(sizeof($cursos) > 0 ){
						foreach ($cursos as $key => $value) {
						?>	
								<div class="row m-0" >				
									<p class="col-1 data-admin text-center">
										<?php echo $cursos[$i]->rut; ?>
									</p>
									<p class="col-1 data-admin text-center overflow-auto"> 
										<?php echo $cursos[$i]->email; ?>
									</p>
									<p class="col-1 data-admin text-center"> 
										<?php echo $cursos[$i]->nombre; ?>
									</p>
									<p class="col-1 data-admin text-center"> 
										<?php echo $cursos[$i]->apellido; ?>
									</p>
									<p class="col-1 data-admin text-center"> 
										<?php echo $cursos[$i]->celular; ?>
									</p>
									<p class="col-1 data-admin text-center"> 
										<?php echo $cursos[$i]->nivel; ?>								
									</p>
									<p class="col-1 data-admin text-center"> 
										<?php echo $cursos[$i]->id_curso; ?>									
									</p>
									<p class="col-1 data-admin text-center  overflow-auto"> 
										<?php echo $cursos[$i]->nom_curso; ?>
									</p>
									<p class="col-1 data-admin text-center"> 
										<?php echo $cursos[$i]->estado; ?>
									</p>
									<p class="col-1 data-admin text-center"> 
										<?php echo $cursos[$i]->progreso ; ?>
									</p>
									<p class="col-1 data-admin text-center"> 
										<?php echo $cursos[$i]->comienzo; ?>
									</p>
									<p class="col-1 data-admin text-center"> 
										<?php echo $cursos[$i]->fin; ?>
									</p>
									
								</div>
			 			
						<?php
							$i++;
						}//fin foreach
					}//fin del if size
				?>
				</div>
			</div>			
		</div>
	</body>
</html>