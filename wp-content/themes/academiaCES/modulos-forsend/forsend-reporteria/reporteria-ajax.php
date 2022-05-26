<?php
/*
 * AJAX contabilidad
 */
add_action('wp_ajax_query_contabilidad', 'query_contabilidad');
add_action('wp_ajax_nopriv_query_contabilidad', 'query_contabilidad');

function query_contabilidad() {

    global $wpdb;

    $fecha_antes_val = $_POST["fecha_antes"] ." 00:00:00";
    $fecha_despues_val = $_POST["fecha_despues"] ." 23:59:59";

    $all ="";
    for ($i=0; $i <28 ; $i++) {         
        if($i == 27)
            $all .='"'.$i.'"';
        else
            $all .='"'.$i.'",';
    } 

    $locales_val = str_replace(array("[","]", '"100"'), array("(",")", $all) , json_encode($_POST["locales"]));
 
    $pago_val = $_POST["pago"];

    if($pago_val == "all")
        $valpago = '("Amipass","Efectivo","Sodexo","Tarjeta Hites","Tarjetas Bancarias (débito y crédito)","Ticket Restaurant","Transbank Webpay Plus")';
    else
        $valpago = '("'.$pago_val.'")';

    $status_vals = str_replace('\\', "", $_POST["status"]);

    if($status_vals == "all")
        $status_in = '("wc-cancelled","wc-cancelled-local","wc-completed","wc-failed","wc-pending","wc-processing")';
    else
        $status_in = '("'.$status_vals.'")';
    
    $where_data = "post_status in $status_in AND post_type='shop_order' AND post_date 
	between '$fecha_antes_val' AND '$fecha_despues_val' 
    AND pm14.meta_value in $locales_val 
    AND pm7.meta_value in  $valpago ";
    
    $sql = "SELECT p.ID as n_orden,p.post_date as fecha_emision,pm1.meta_value as nombre, 
	pm2.meta_value as apellidos, 
	pm3.meta_value as email, 
	pm4.meta_value as direccion,
	pm5.meta_value as ciudad, 
	pm6.meta_value as region,
	pm7.meta_value as forma_de_pago,
	pm8.meta_value as transactionResponse,
	pm9.meta_value as buyOrder,
	pm10.meta_value as authorizationCode,
	pm11.meta_value as cardNumber,
	pm12.meta_value as transactionDate,
	pm14.meta_value as id_webpay,
	local_t.nombre as nombre_local,
	pm15.meta_value as Total_pedido,
    pm16.meta_value as tarjeta_pago,
    pm17.meta_value as fono,
	post_status as estado
	FROM pp_posts p 
	LEFT JOIN pp_postmeta pm1 ON (pm1.post_id = p.ID AND pm1.meta_key = '_billing_first_name') 
	LEFT JOIN pp_postmeta pm2 ON (pm2.post_id = p.ID AND pm2.meta_key = '_billing_last_name') 
	LEFT JOIN pp_postmeta pm3 ON (pm3.post_id = p.ID AND pm3.meta_key = '_billing_email') 
	LEFT JOIN pp_postmeta pm4 ON (pm4.post_id = p.ID AND pm4.meta_key = '_billing_address_1') 
	LEFT JOIN pp_postmeta pm5 ON (pm5.post_id = p.ID AND pm5.meta_key = '_billing_city')
	LEFT JOIN pp_postmeta pm6 ON (pm6.post_id = p.ID AND pm6.meta_key = '_billing_state')
	LEFT JOIN pp_postmeta pm7 ON (pm7.post_id = p.ID AND pm7.meta_key = '_payment_method_title')
	LEFT JOIN pp_postmeta pm8 ON (pm8.post_id = p.ID AND pm8.meta_key = 'transactionResponse')
	LEFT JOIN pp_postmeta pm9 ON (pm9.post_id = p.ID AND pm9.meta_key = 'buyOrder')
	LEFT JOIN pp_postmeta pm10 ON (pm10.post_id = p.ID AND pm10.meta_key = 'authorizationCode')
	LEFT JOIN pp_postmeta pm11 ON (pm11.post_id = p.ID AND pm11.meta_key = 'cardNumber')
	LEFT JOIN pp_postmeta pm12 ON (pm12.post_id = p.ID AND pm12.meta_key = 'transactionDate')
	LEFT JOIN pp_postmeta pm14 ON (pm14.post_id = p.ID AND pm14.meta_key = '_billing_webpay')
	LEFT JOIN pp_locales as local_t on (pm14.meta_value = local_t.id)  
	LEFT JOIN pp_postmeta pm15 ON (pm15.post_id = p.ID AND pm15.meta_key = '_order_total')
    LEFT JOIN pp_postmeta pm16 ON (pm16.post_id = p.ID AND pm16.meta_key = 'paymentCodeResult')
    LEFT JOIN pp_postmeta pm17 ON (pm17.post_id = p.ID AND pm17.meta_key = '_billing_phone')	
	WHERE $where_data
	ORDER BY p.ID desc";
    $locales = $wpdb->get_results($sql);

  	$i = 0;

    if(sizeof($locales) > 0 ){
     //   echo  $sql;
        foreach ($locales as $key => $value) {
            ?>
                    <div class="row m-0" >	
                        <p class="col-1 data-admin text-center"> 			
                            <a href="../wp-admin/post.php?post=<?php echo $locales[$i]->n_orden; ?>&action=edit" target="_blank">
                                <?php echo $locales[$i]->n_orden; ?> 
                            </a>
                        </p>
                        <p class="col-1 data-admin"> 
                            <?php echo $locales[$i]->nombre; ?>
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo $locales[$i]->nombre_local; ?>
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo $locales[$i]->fecha_emision; ?>
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo $locales[$i]->Total_pedido; ?>
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo $locales[$i]->forma_de_pago; ?>								
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo traducir_debito($locales[$i]->tarjeta_pago); ?>									
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo $locales[$i]->authorizationCode; ?>
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo $locales[$i]->cardNumber; ?>
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo traducir_estado($locales[$i]->estado ); ?>
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo $locales[$i]->fono; ?>
                        </p>
                        <p class="col-1 data-admin text-center"> 
                            <?php echo $locales[$i]->email; ?>
                        </p>
                    </div>
           
            <?php
        $i++;
        }//fin foreach
    }//fin del if size
   else { ?>
    <div class="row">				
        <p class="col-12 data-admin"> 
            NO SE ENCONTRARÓN RESULTADOS
        </p>        
    </div>
    <?php
        //echo  $sql;
   }
    wp_die();
}



/*
 * AJAX contabilidad por dato buscador
 */
add_action('wp_ajax_query_contabilidad_por_dato', 'query_contabilidad_por_dato');
add_action('wp_ajax_nopriv_query_contabilidad_por_dato', 'query_contabilidad_por_dato');

function query_contabilidad_por_dato() {

    global $wpdb;

    $dato_query = $_POST["data_a_buscar"] ;
    $filter_by = $_POST["filter_by"] ;

    $where_data = "post_type='shop_order' and( $filter_by  like '%".$dato_query."%' ) ";

    $sql = "SELECT p.ID as n_orden,p.post_date as fecha_emision,pm1.meta_value as nombre, 
	pm2.meta_value as apellidos, 
	pm3.meta_value as email, 
	pm4.meta_value as direccion,
	pm5.meta_value as ciudad, 
	pm6.meta_value as region,
	pm7.meta_value as forma_de_pago,
	pm8.meta_value as transactionResponse,
	pm9.meta_value as buyOrder,
	pm10.meta_value as authorizationCode,
	pm11.meta_value as cardNumber,
	pm12.meta_value as transactionDate,
	pm14.meta_value as id_webpay,
	local_t.nombre as nombre_local,
	pm15.meta_value as Total_pedido,
    pm16.meta_value as tarjeta_pago,
    pm17.meta_value as fono,
	post_status as estado
	FROM pp_posts p 
	LEFT JOIN pp_postmeta pm1 ON (pm1.post_id = p.ID AND pm1.meta_key = '_billing_first_name') 
	LEFT JOIN pp_postmeta pm2 ON (pm2.post_id = p.ID AND pm2.meta_key = '_billing_last_name') 
	LEFT JOIN pp_postmeta pm3 ON (pm3.post_id = p.ID AND pm3.meta_key = '_billing_email') 
	LEFT JOIN pp_postmeta pm4 ON (pm4.post_id = p.ID AND pm4.meta_key = '_billing_address_1') 
	LEFT JOIN pp_postmeta pm5 ON (pm5.post_id = p.ID AND pm5.meta_key = '_billing_city')
	LEFT JOIN pp_postmeta pm6 ON (pm6.post_id = p.ID AND pm6.meta_key = '_billing_state')
	LEFT JOIN pp_postmeta pm7 ON (pm7.post_id = p.ID AND pm7.meta_key = '_payment_method_title')
	LEFT JOIN pp_postmeta pm8 ON (pm8.post_id = p.ID AND pm8.meta_key = 'transactionResponse')
	LEFT JOIN pp_postmeta pm9 ON (pm9.post_id = p.ID AND pm9.meta_key = 'buyOrder')
	LEFT JOIN pp_postmeta pm10 ON (pm10.post_id = p.ID AND pm10.meta_key = 'authorizationCode')
	LEFT JOIN pp_postmeta pm11 ON (pm11.post_id = p.ID AND pm11.meta_key = 'cardNumber')
	LEFT JOIN pp_postmeta pm12 ON (pm12.post_id = p.ID AND pm12.meta_key = 'transactionDate')
	LEFT JOIN pp_postmeta pm14 ON (pm14.post_id = p.ID AND pm14.meta_key = '_billing_webpay')
	LEFT JOIN pp_locales as local_t on (pm14.meta_value = local_t.id)  
	LEFT JOIN pp_postmeta pm15 ON (pm15.post_id = p.ID AND pm15.meta_key = '_order_total')    
    LEFT JOIN pp_postmeta pm16 ON (pm16.post_id = p.ID AND pm16.meta_key = 'paymentCodeResult')
    LEFT JOIN pp_postmeta pm17 ON (pm17.post_id = p.ID AND pm17.meta_key = '_billing_phone')	
	WHERE $where_data
	ORDER BY p.ID desc";
    $locales = $wpdb->get_results($sql);

  	$i = 0;

    if(sizeof($locales) > 0 ){
   
        foreach ($locales as $key => $value) {
            ?> 
            <div class="row m-0" >				
                    <p class="col-1 data-admin text-center"> 
                        <a href="../wp-admin/post.php?post=<?php echo $locales[$i]->n_orden; ?>&action=edit" target="_blank">
                            <?php echo $locales[$i]->n_orden; ?> 
                        </a>
                    </p>
                    <p class="col-1 data-admin"> 
                        <?php echo $locales[$i]->nombre; ?>
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo $locales[$i]->nombre_local; ?>
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo $locales[$i]->fecha_emision; ?>
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo $locales[$i]->Total_pedido; ?>
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo $locales[$i]->forma_de_pago; ?>								
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo traducir_debito($locales[$i]->tarjeta_pago); ?>								
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo $locales[$i]->authorizationCode; ?>
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo $locales[$i]->cardNumber; ?>
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo traducir_estado($locales[$i]->estado ); ?>
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo $locales[$i]->fono; ?>
                    </p>
                    <p class="col-1 data-admin text-center"> 
                        <?php echo $locales[$i]->email; ?>
                    </p>
                </div>     
           
        <?php
            $i++;
        }//fin foreach
    }//fin del if size
   else { ?>
    <div class="row">				
        <p class="col-12 data-admin"> 
            NO SE ENCONTRARÓN RESULTADOS
        </p>        
    </div>
    <?php
      
   }
    wp_die();
}

function traducir_debito($val){
    $tolow =strtolower($val);

    if($val =="Venta Débito"){
        return "Débito";
    }else if($tolow =="sin cuotas"){
        return "Débito";
    }else if($val =="" || $val == null){
        return "";
    }
    else{
        return "Crédito";
    }
}

function traducir_estado($val){  

    switch ($val) {
        case 'auto-draft':
            $dato = "Eliminado por admin";
            break;
        case 'cancelled-local':
            $dato = "Cancelado por local";
            break;
        case 'wc-cancelled':
            $dato = "Cancelado por webpay";
            break;
        case 'wc-cancelled-local':
            $dato = "Cancelado por local";
            break;
        case 'wc-completed':
            $dato = "Completado";
            break;
        case 'wc-failed':
            $dato = "Fallido";
            break;
        case 'wc-pending':
            $dato = "Pendiente de pago";
            break;        
        case 'wc-processing':
            $dato = "Procesando";
            break;

        default:
            $dato = "";
            break;
    }
    return $dato;
}

add_action('wp_ajax_imprimir_excel', 'imprimir_excel');
add_action('wp_ajax_nopriv_imprimir_excel', 'imprimir_excel');

function imprimir_excel() {

    global $wpdb;

    $fecha_antes_val = $_POST["fecha_antes"] ." 00:00:00";
    $fecha_despues_val = $_POST["fecha_despues"] ." 23:59:59";

    $all ="";
    for ($i=0; $i <28 ; $i++) {         
        if($i == 27)
            $all .='"'.$i.'"';
        else
            $all .='"'.$i.'",';
    } 

    $locales_val = str_replace(array("[","]", '"100"'), array("(",")", $all) , json_encode($_POST["locales"]));
 
    $pago_val = $_POST["pago"];

    if($pago_val == "all")
        $valpago = '("Amipass","Efectivo","Sodexo","Tarjeta Hites","Tarjetas Bancarias (débito y crédito)","Ticket Restaurant","Transbank Webpay Plus")';
    else
        $valpago = '("'.$pago_val.'")';

    $status_vals = str_replace('\\', "", $_POST["status"]);

    if($status_vals == "all")
        $status_in = '("wc-cancelled","wc-cancelled-local","wc-completed","wc-failed","wc-pending","wc-processing")';
    else
        $status_in = '("'.$status_vals.'")';
    
    $where_data = "post_status in $status_in AND post_type='shop_order' AND post_date 
	between '$fecha_antes_val' AND '$fecha_despues_val' 
    AND pm14.meta_value in $locales_val 
    AND pm7.meta_value in  $valpago ";
    
    $sql = "SELECT p.ID as n_orden,p.post_date as fecha_emision,pm1.meta_value as nombre, 
	pm2.meta_value as apellidos, 
	pm3.meta_value as email, 
	pm4.meta_value as direccion,
	pm5.meta_value as ciudad, 
	pm6.meta_value as region,
	pm7.meta_value as forma_de_pago,
	pm8.meta_value as transactionResponse,
	pm9.meta_value as buyOrder,
	pm10.meta_value as authorizationCode,
	pm11.meta_value as cardNumber,
	pm12.meta_value as transactionDate,
	local_t.nombre as nombre_local,
	pm15.meta_value as Total_pedido,
    pm16.meta_value as tarjeta_pago,
    pm17.meta_value as fono,
	post_status as estado
	FROM pp_posts p 
	LEFT JOIN pp_postmeta pm1 ON (pm1.post_id = p.ID AND pm1.meta_key = '_billing_first_name') 
	LEFT JOIN pp_postmeta pm2 ON (pm2.post_id = p.ID AND pm2.meta_key = '_billing_last_name') 
	LEFT JOIN pp_postmeta pm3 ON (pm3.post_id = p.ID AND pm3.meta_key = '_billing_email') 
	LEFT JOIN pp_postmeta pm4 ON (pm4.post_id = p.ID AND pm4.meta_key = '_billing_address_1') 
	LEFT JOIN pp_postmeta pm5 ON (pm5.post_id = p.ID AND pm5.meta_key = '_billing_city')
	LEFT JOIN pp_postmeta pm6 ON (pm6.post_id = p.ID AND pm6.meta_key = '_billing_state')
	LEFT JOIN pp_postmeta pm7 ON (pm7.post_id = p.ID AND pm7.meta_key = '_payment_method_title')
	LEFT JOIN pp_postmeta pm8 ON (pm8.post_id = p.ID AND pm8.meta_key = 'transactionResponse')
	LEFT JOIN pp_postmeta pm9 ON (pm9.post_id = p.ID AND pm9.meta_key = 'buyOrder')
	LEFT JOIN pp_postmeta pm10 ON (pm10.post_id = p.ID AND pm10.meta_key = 'authorizationCode')
	LEFT JOIN pp_postmeta pm11 ON (pm11.post_id = p.ID AND pm11.meta_key = 'cardNumber')
	LEFT JOIN pp_postmeta pm12 ON (pm12.post_id = p.ID AND pm12.meta_key = 'transactionDate')
	LEFT JOIN pp_postmeta pm14 ON (pm14.post_id = p.ID AND pm14.meta_key = '_billing_webpay')
	LEFT JOIN pp_locales as local_t on (pm14.meta_value = local_t.id)  
	LEFT JOIN pp_postmeta pm15 ON (pm15.post_id = p.ID AND pm15.meta_key = '_order_total')
    LEFT JOIN pp_postmeta pm16 ON (pm16.post_id = p.ID AND pm16.meta_key = 'paymentCodeResult')
    LEFT JOIN pp_postmeta pm17 ON (pm17.post_id = p.ID AND pm17.meta_key = '_billing_phone')	
	WHERE $where_data
	ORDER BY p.ID desc";
    $locales = $wpdb->get_results($sql);  

    //Set header information to export data in excel format   

    //Set variable to false for heading
    $heading = false;
    $i=0;
    foreach ($locales as $key => $value) {
        $val = $locales[$i]->tarjeta_pago;

        $traduction = traducir_debito($val);
        $locales[$i]->tarjeta_pago = $traduction;

        $val_es = $locales[$i]->estado;

        $traduction_es = traducir_estado($val_es);
        $locales[$i]->estado = $traduction_es;


        $val_num = $locales[$i]->Total_pedido;

        $traduction_num = intval($val_num);
        $locales[$i]->Total_pedido = $traduction_num;
        $i++;

        
    }
   
    echo json_encode($locales);
    wp_die();    
    exit(); 
    
}







