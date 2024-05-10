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
                                    <div>Registro Indicadores BL Humana
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Registro Indicadores BL Humana
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">                                         
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <form id="registro_ind_blh">
                                                <div class="form-row">
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="hospital" class="">Seleccione Hospital:</label>                                                       
                                                        <select id='hospital'  name='hospital' class='form-control' required>
                                                            <option value=''>--</option>
                                                        </select>
                                                    </div>    
                                                    <div class=" form-group col-md-6 regis">   
                                                        <label for="fecha_registro" class="">Fecha:</label>                                                 
                                                        <input class="form-control" type="month" value="" id="fecha_registro" name='fecha_registro'>
                                                    </div> 

                                                    <div class="col-md-12 col-lg-12 progressBarCanguro">
                                                        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                                                            <div class="widget-content">
                                                                <div class="widget-content-outer">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left pr-2 fsize-1">
                                                                            <div id="textProgress" class="widget-numbers mt-0 fsize-3 text-warning textProgress"></div>
                                                                        </div>
                                                                        <div class="widget-content-right w-100">
                                                                            <div class="progress-bar-xs progress">
                                                                                <div id="loading-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: %;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-left fsize-1">
                                                                        <div class="text">Porcentaje diligenciado</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 

                                                    </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-10 offset-md-1 regis">
                                        <label for="ind1_1" class="">1.1 Número de intervenciones educativas colectivas organizadas por el BLH durante el mes.</label>
                                        <input name="ind1_1" id="ind1_1" min="0" placeholder=""  type="number" class="form-control">                                                   
                                    </div>

                                    <div class="form-group col-md-10 offset-md-1 regis">
                                        <label for="ind1_2" class="">1.2 Número de personas que participaron en las intervenciones durante el mes.</label>
                                        <input name="ind1_2" id="ind1_2" min="0" placeholder=""  type="number" class="form-control">                                                   
                                    </div>

                                    <div class="form-group col-md-10 offset-md-1 regis">
                                        <label for="ind2" class="">2. Número de mililitros (ml) de leche de fórmula distribuida en la Unidad de Recién Nacidos en un mes.</label>
                                        <input name="ind2" id="ind2" min="0" placeholder="" min="0" type="number" class="form-control">                                                   
                                    </div>

                                    <div class="form-group col-md-10 offset-md-1 regis">
                                        <label for="ind3_1" class="">3.1. Numero de neonatos hospitalizados en URN alimentados exclusivamente con leche materna o pasteurizada ofrecida por el BLH.</label>
                                        <input name="ind3_1" id="ind3_1" min="0" placeholder="" min="0" type="number" class="form-control">                                                   
                                    </div>

                                    <div class="form-group col-md-10 offset-md-1 regis">
                                        <label for="ind3_2" class="">3.2. Número total de neonatos hospitalizados en URN durante el periodo de tiempo estudiado.</label>
                                        <input name="ind3_2" id="ind3_2" min="0" placeholder="" min="0" type="number" class="form-control">                                                   
                                    </div>

                                    <div class="form-group col-md-10 offset-md-1 regis">
                                        <label for="ind4" class="">4. Número de niños a quienes se les diagnosticó ECN estadío II o III en la URN en un mes.</label>
                                        <input name="ind4" id="ind4" min="0" placeholder="" min="0" type="number" class="form-control">                                                   
                                    </div>

                                    <div class="form-group col-md-10 offset-md-1 regis">
                                        <label for="ind5" class="">5. Número de niños hospitalizados en la URN a quienes se les diagnosticó Sepsis durante la hospitalización.</label>
                                        <input name="ind5" id="ind5" min="0" placeholder="" min="0" type="number" class="form-control">                                                   
                                    </div>

                                    <div class="form-group col-md-10 offset-md-1 regis">
                                        <label for="ind6_1" class="">6.1. Suma de días de estancia hospitalaria de la totalidad de los niños hospitalizados en la URN en el mes.</label>
                                        <input name="ind6_1" id="ind6_1" min="0" placeholder="" min="0" type="number" class="form-control">                                                   
                                    </div>

                                    <div class="form-group col-md-10 offset-md-1 regis">
                                        <label for="ind6_2" class="">6.2. Número de niños hospitalizados en URN durante un mes.</label>
                                        <input name="ind6_2" id="ind6_2" min="0" placeholder="" min="0" type="number" class="form-control">                                                   
                                    </div>

                             
                            <div class=" form-group col-md-4 regis">   
                            <button type="submit" class="mt-2 btn btn-primary">Registrar indicador</button>
                            </div>   <br>                                   
                       
                    </div>
                    </form>                                       
                    </div>

                    </div>
                    </div>
                    </div>                                   

                    </div>
                    </div>
            </div>
            </div>
            </div>
 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuRegistroIndBancoLeche").addClass("mm-active");

        function listarHospitales(){
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarHospitalUsuario'
                }, 
                success: function(rta){
                    if (rta.perfil != "Administrador Sistema")
                    {                         
                        $("#hospital").append("<option value='"+rta.data[0].id_hospital+"'>"+rta.data[0].nombre_hospital+"</option>");
                        $('#hospital').prop('disabled',true);
                        $('#hospital').val(rta.data[0].id_hospital); 
                    }
                    else
                    {                        
                        $("#hospital").append("<option value=''>--</option>");
                        for(var i=0;i<rta.data.length;i++){
                            $("#hospital").append("<option value='"+rta.data[i].id_hospital+"'>"+rta.data[i].nombre_hospital+"</option>");
                        }
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
        
        $('#hospital, #fecha_registro').change(function()
        {
            $(".progressBarCanguro").hide();
            $("#textProgress").removeClass();
            $('#loading-bar').removeClass();
            
            $(".saveSuccess").hide();
            $.each($('#registro_ind_blh').serializeArray(), function(i, field) {
                var j = field.name;
                if (field.name!='hospital' && field.name!='fecha_registro')
                {
                    $('#'+field.name).val(''); 
                }                                     
            }); 
            
            var hospital = $('#hospital').val();
            var mes = $('#fecha_registro').val();
            var values = {};

            if (hospital!='' && mes!='')
            {
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarProgresoBLH',
                        hospital:hospital,
                        mes:mes
                    },
                    success: function(rta){
                        console.warn(rta);
                        var totalMissing = 0;
                        var totalQuestions = 9;
                        var barra = $('#loading-bar');
                        if (rta.data.length > 0)
                        {
                            for (var i in rta.data[0])
                            {
                                $('#'+i).val(rta.data[0][i]);
                            } 
                        }
                        
                        $.each($('#registro_ind_blh').serializeArray(), function(i, field) {
                            var j = field.name;
                            if (field.value=='')
                            {
                                totalMissing++;
                            }   
                                                   
                        });
                        console.warn("totalMissing"+totalMissing);
                        var totalProgress = (totalQuestions-totalMissing)*100/totalQuestions;
                        console.warn("total progress"+totalProgress);
                        
                        barra.attr('aria-valuenow', totalProgress).attr('style', 'width: '+totalProgress+'%');
                        if (totalProgress <100 && totalProgress>0)
                        { 
                            barra.addClass("progress-bar progress-bar-striped progress-bar-animated bg-warning");
                            $("#textProgress").addClass("widget-numbers mt-0 fsize-3 textProgress text-warning");
                        }
                        else if (totalProgress == 0)
                        {
                            barra.addClass("progress-bar progress-bar-striped progress-bar-animated bg-danger");
                            $("#textProgress").addClass("widget-numbers mt-0 fsize-3 textProgress text-danger");

                        }else if (totalProgress == 100)
                        {
                            barra.addClass("progress-bar progress-bar-striped progress-bar-animated bg-success");
                            $("#textProgress").addClass("widget-numbers mt-0 fsize-3 textProgress text-success");
                        }
                        $(".textProgress").html(totalProgress.toFixed(2)+"%");                        
                        $(".progressBarCanguro").show();

                    },
                    error: function(objAjax, textStatus, strErrorThrown ){
                        if(typeof callbackError != 'undefined'){
                            callbackError(textStatus);
                        }else{
                            alert('Error en la conexion con el servidor: '+ textStatus);
                        }
                    }
                });
            }
            return false;

        }); 


        listarHospitales();
});

 </script>           
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>