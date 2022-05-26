jQuery(function($) {  
    $(document).ready(function() {
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '< Ant',
            nextText: 'Sig >',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);

        $( "#datepicker-antes" ).datepicker();
        $( "#datepicker-despues" ).datepicker();


        $("#post-query-submit").click(function(e) {  

            fecha_antes_val = $("#datepicker-antes").val();
            fecha_despues_val = $("#datepicker-despues").val();
            locales_val = $('[name="filter_shop_order_by_meta"]').val();
            pago_val = $('[name="filter_shop_order_by_meta_2"]').val(); 
            estado_val = $('[name="filter_shop_order_by_meta_3"]').val(); 
            
            if( fecha_antes_val =="" ||
                fecha_despues_val =="" ||
                locales_val =="" ||
                pago_val ==""  ||
                estado_val =="" ){
                alert("faltan datos");
            }else{ 
                setTimeout(function(){                    
                    $("#data-locales").html('<div class="cont-preload"><div class="preloader"></div></div>');
                }, 1);
                e.preventDefault();
                i=0; 
                url_base = document.location.origin+ "/";            
                path_dir  = "";
                uri_ajax = url_base + path_dir +'wp-admin/admin-ajax.php';

                data_set = {
                    action: 'query_dacademia',
                    fecha_antes : fecha_antes_val ,
                    fecha_despues : fecha_despues_val ,
                    locales : locales_val ,
                    pago : pago_val ,
                    status : estado_val,
                
                }
                console.log(data_set);
                $.ajax({   
                    async:false,
                    cache:false,
                    type: 'post',
                    url: url_base+path_dir+'wp-admin/admin-ajax.php',
                    data: data_set,
                    beforeSend: function (response) {
                        //$thisbutton.removeClass('added').addClass('loading');
                    },
                    complete: function (response) {
                        //$thisbutton.addClass('added').removeClass('loading');
                        
                    },
                    success: function (response) {            
                        console.log(response);  

                        setTimeout(function(){                    
                            $("#data-locales").html('');
                            $("#data-locales").html(response);

                        }, 100);

                       
                    }
                });    //fin ajax 

                                                
            }
        });

        $("#search-submit").click(function(e) {  
            datos_buscador = $("#post-search-input").val();       
            data_filter  = $('[name="filter_by"]').val();  
         
            if( datos_buscador =="" || data_filter =="" ){
                alert("faltan datos");
            }else{ 
                setTimeout(function(){
                    
                    $("#data-locales").html('<div class="cont-preload"><div class="preloader"></div></div>');
                }, 1);
                e.preventDefault();
                i=0; 
                url_base = document.location.origin+ "/";            
                path_dir  = "";
                uri_ajax = url_base + path_dir +'wp-admin/admin-ajax.php';

                data_set = {
                    action: 'query_dacademia_por_dato',
                    data_a_buscar : datos_buscador ,
                    filter_by: data_filter,
                
                }
                console.log(data_set);
                $.ajax({   
                    async:false,
                    cache:false,
                    type: 'post',
                    url: url_base+path_dir+'wp-admin/admin-ajax.php',
                    data: data_set,
                    beforeSend: function (response) {
                        //$thisbutton.removeClass('added').addClass('loading');
                    },
                    complete: function (response) {
                        //$thisbutton.addClass('added').removeClass('loading');
                        
                    },
                    success: function (response) {            
                        console.log(response);                           
                        setTimeout(function(){                    
                            $("#data-locales").html('');
                            $("#data-locales").html(response);
                        }, 100);
                    }
                });    //fin ajax                                              
            }
        });
        $("#print-query-btn").click(function(e) {  

            fecha_antes_val = $("#datepicker-antes").val();
            fecha_despues_val = $("#datepicker-despues").val();
            locales_val = $('[name="filter_shop_order_by_meta"]').val();
            pago_val = $('[name="filter_shop_order_by_meta_2"]').val(); 
            estado_val = $('[name="filter_shop_order_by_meta_3"]').val(); 
            
            if( (fecha_antes_val =="" ||
                fecha_despues_val =="" ||
                locales_val =="" ||
                pago_val ==""  ||
                estado_val =="" ) && false){
                alert("faltan datos");
            }else{ 
                setTimeout(function(){                    
                    $("#data-locales").append('<div class="cont-preload"><div class="preloader"></div></div>');
                }, 1);
                e.preventDefault();
                i=0; 
                url_base = document.location.origin+ "/";           
                path_dir  = "";
                uri_ajax = url_base + path_dir +'wp-admin/admin-ajax.php';
                /*
                data_set = {
                    action: 'imprimir_excel',
                    fecha_antes : fecha_antes_val ,
                    fecha_despues : fecha_despues_val ,
                    locales : locales_val ,
                    pago : pago_val ,
                    status : estado_val,
                
                }
                */
                data_set = {
                    action: 'imprimir_excel'                
                }
                console.log(data_set);
                $.ajax({   
                    async:false,
                    cache:false,
                    type: 'post',
                    url: uri_ajax,
                    data: data_set,
                    beforeSend: function (response) {
                        //$thisbutton.removeClass('added').addClass('loading');
                    },
                    complete: function (response) {
                        //$thisbutton.addClass('added').removeClass('loading');
                        setTimeout(function(){ 
                            $(".cont-preload").remove();
                        }, 1);
                    },
                    success: function (response) {                         
                        console.log(response);    
                           
                        ExportData(response, fecha_antes_val,fecha_despues_val);     
                    }
                });    //fin ajax                                                 
            }
        });
        function ExportData(data, fecha_antes_val,fecha_despues_val){            

            data =JSON.parse(data)
            var ws = XLSX.utils.json_to_sheet(data);
            fileName = "ReporteAcademia_"+fecha_despues_val ; //fecha_antes_val+"_hasta_"+fecha_despues_val;
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Reporte");
            
            XLSX.writeFile(wb, fileName+".xlsx");
        }


    }); //fin $(document).ready(function()         
}); //fin jQuery(function($)      

