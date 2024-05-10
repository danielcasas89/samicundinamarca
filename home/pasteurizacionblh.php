<?php 
session_start();
if(isset($_SESSION['usuario_sesion'])){
	@require '../php/cabecera.php';
	?>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-config">
                                        </i>
                                    </div>
                                    <div>Pasteurización BLH
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header ">Pasteurización
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Procesamiento creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">  
                                            <div class="card-body">
                                                <form id="registro_pasteurizacion">
                                                <div class="form-row">                               
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="frasco_pasteurizado" class="">Seleccione Frasco Pasteurizado:</label>                                                       
                                                        <select id='frasco_pasteurizado' required name='frasco_pasteurizado' class='form-control' >
                                                            <option value=''>--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                    <hr/>
                                                <div class="form-row">                                                       
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="fecha_creacion" class="">Fecha:</label>
                                                        <input name="fecha_creacion" id="fecha_creacion" placeholder="" type="text" readonly class="form-control">
                                                        <input name="id_core__pool_blh" id="id_core__pool_blh" placeholder="" type="hidden" readonly class="form-control">                                                    
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="frascos_recolectados" class="">Número Frascos Recolectados:</label>                                                        
                                                        <textarea class="form-control" id="frascos_recolectados" readonly name="frascos_recolectados" rows="2"></textarea>
                                                    </div>                                                         
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="pool" class="">Pool:</label>
                                                        <input name="pool" id="pool" placeholder="" type="text" readonly class="form-control">
                                                    </div>
                                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-header  ">REGISTRO PASTEURIZACIÓN</div><br>
                                        <div class="form-row">

                                            <div class=" form-group col-md-4 regis">   
                                                <label for="volumen" class="">Volumen:</label>                                                 
                                                <input class="form-control" type="text" value="" id="volumen" name='volumen'>
                                            </div> 
                                            <div class=" form-group col-md-4 regis">   
                                                <label for="sgdonante" class="">S.G Donante:</label>                                                 
                                                <input class="form-control" type="text" value="" id="sgdonante" name='sgdonante'>
                                            </div> 
                                            <div class=" form-group col-md-4 regis">   
                                                <label for="diasleche" class="">Días leche:</label>                                                 
                                                <input class="form-control" type="text" value="" id="diasleche" name='diasleche'>
                                            </div>  
                                            <div class=" form-group col-md-4 regis">   
                                                <label for="d" class="">(°D):</label>                                                 
                                                <input class="form-control" type="text" value="" id="d" name='d'>
                                            </div>  
                                            <div class=" form-group col-md-4 regis">   
                                                <label for="kcal" class="">Kcal/Onz:</label>                                                 
                                                <input class="form-control" type="text" value="" id="kcal" name='kcal'>
                                            </div> 
                                            </div>
                                            <div class=" form-group col-md-4 regis">   
                                            <button type="submit" class="mt-2 btn btn-primary">Registrar Pasteurizacion</button>
                                            </div>                                             
                                            </div>
                                        </form>                                       
                                        </div>
                                    </div>
                            </div>
                        </div>                                   

                        <div class="d-block text-center card-footer">
                        </div>
                    </div>
                </div>
            </div>
            </div>
 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuPasteurizacion").addClass("mm-active");

        function listarDonantes(){

            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarFrascosPasteurizadosBLH'                    
                },
                success: function(rta){
                    for(var i=0;i<rta.data.length;i++){
                        $("#frasco_pasteurizado").append("<option value='"+rta.data[i].id_core__pool_blh+"'>"+rta.data[i].frasco_pasteurizado+"</option>");
                    }
                },
                error: function(objAjax, textStatus, strErrorThrown ){
                    //console.debug(textStatus);
                    if(typeof callbackError != 'undefined'){
                        callbackError(textStatus);
                    }else{
                        alert('Error en la conexion con el servidor: '+ textStatus);
                    }
                }
            });
        }

        $( "#frasco_pasteurizado").change(function()
        {
            $('#fecha_creacion').val('');
            $('#pool').val('');
            $('#frascos_recolectados').val('');
            $('#id_core__pool_blh').val('');
            var idFrascoPool= $(this).val();
            $("#municipio").html('<option value="">--</option>');
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarDetalleFrascoPool',
                        idFrascoPool:idFrascoPool
                    },
                    success: function(rta){
                        if (rta.data[0].frascos_recolectados.includes("/"))
                        {
                            $('#pool').val("SI"); 
                        }
                        else{
                            
                            $('#pool').val("NO");
                        }
                        $('#fecha_creacion').val(rta.data[0].fecha_creacion);  
                        $('#id_core__pool_blh').val(rta.data[0].id_core__pool_blh); 
                        $('#frascos_recolectados').val(rta.data[0].frascos_recolectados); 
                    },
                    error: function(objAjax, textStatus, strErrorThrown ){
                        //console.debug(textStatus);
                        if(typeof callbackError != 'undefined'){
                            callbackError(textStatus);
                        }else{
                            alert('Error en la conexion con el servidor: '+ textStatus);
                        }
                    }
                });
            });  

        listarDonantes();
});

 </script>           
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>