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
                                    <div>Registro Beneficiarios BLH
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div> 
                                   
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <div class="card-header">Datos de Inscripción Beneficiario BLH
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">                                         
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <form id="registro_beneficiarios">
                                                <div class="form-row">                                                                                                 
                                                    <div class="form-group col-md-4 regis">
                                                        <label for="receptor" class="">Receptor:</label>
                                                        <select name="receptor" id="receptor" class="form-control"> 
                                                        <option value='INTERNO'>INTERNO</option>
                                                        <option value='EXTERNO'>EXTERNO</option>
                                                        </select>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="nombre_bebe" class="">Nombre Beneficiario:</label>
                                                        <input name="nombre_bebe" id="nombre_bebe" type="text" class="form-control" required>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="registro_civil" class="">Documento Beneficiario:</label>
                                                        <input name="registro_civil" id="registro_civil" type="text" class="form-control" required>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="nombre_madre" class="">Nombre Madre:</label>
                                                        <input name="nombre_madre" id="nombre_madre" type="text" class="form-control" required>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="documento_madre" class="">Documento Madre:</label>
                                                        <input name="documento_madre" id="documento_madre" type="text" class="form-control" required>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="regimen" class="">Regimen Seguridad Social:</label>
                                                        <select name="regimen" id="regimen" class="form-control" required> 
                                                            <option value=''>--</option>
                                                            <option value='CONTRIBUTIVO'>CONTRIBUTIVO</option>
                                                            <option value='SUBSIDIADO'>SUBSIDIADO</option>
                                                            <option value='EXCEPCION'>EXCEPCION</option>
                                                            <option value='ESPECIAL'>ESPECIAL</option>
                                                            <option value='NO ASEGURADO'>NO ASEGURADO</option>
                                                        </select>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="eapb" class="">EAPB:</label>
                                                        <select name="eapb" id="eapb" class="form-control" required> 
                                                        </select>
                                                    </div>                                                    

                                                    <div class=" form-group col-md-4 regis">   
                                                        <label for="fecha_parto" class="">Fecha Parto:</label>                                                 
                                                        <input class="form-control" type="date" value="" id="fecha_parto" name="fecha_parto" required>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="edad_gestacional" class="">Edad Gestacional(semanas):</label>
                                                        <input name="edad_gestacional" id="edad_gestacional" type="number" min="10" min="45" class="form-control" required>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label for="peso_nacer" class="">Peso al nacer:</label>
                                                        <div class="input-group mb-2">        
                                                        <input type="number"  class="form-control" id="peso_nacer" name="peso_nacer" min="100" min="5500" step="0.1" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">grs</div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="peso_actual" class="">Peso actual:</label>
                                                        <div class="input-group mb-2">        
                                                        <input type="number"  class="form-control" id="peso_actual" name="peso_actual" min="100" step="0.1" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">grs</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="card-header  ">DIAGNÓSTICO DEL RECEPTOR</div><br>
                                                        <div class="form-row">

                                                        <div class="form-group col-md-4 regis">
                                                            <label for="gemelo" class="">Gemelo:</label>
                                                            <select name="gemelo" id="gemelo" name="gemelo"  class="form-control" required> 
                                                                <option value=''>--</option>
                                                                <option value='SI'>SI</option>
                                                                <option value='NO'>NO</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4 regis">
                                                            <label for="bajo_peso" class="">Bajo peso:</label>
                                                            <select name="bajo_peso" id="bajo_peso" name="bajo_peso"  class="form-control" required> 
                                                                <option value=''>--</option> 
                                                                <option value='SI'>SI</option>
                                                                <option value='NO'>NO</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4 regis">
                                                            <label for="prematuro" class="">Prematuro:</label>
                                                            <select name="prematuro" id="prematuro" name="prematuro"  class="form-control" required>  
                                                                <option value=''>--</option>
                                                                <option value='SI'>SI</option>
                                                                <option value='NO'>NO</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6 regis">
                                                            <label for="prob_respiratorios" class="">Problemas respiratorios:</label>
                                                            <select name="prob_respiratorios" id="prob_respiratorios" name="prob_respiratorios"  class="form-control" required> 
                                                                <option value=''>--</option> 
                                                                <option value='SI'>SI</option>
                                                                <option value='NO'>NO</option>
                                                            </select>
                                                        </div>

                                                        <div class=" form-group col-md-6 regis">
                                                            <label for="cuales_prob_respiratorios" class="">Cuales:</label>
                                                            <input name="cuales_prob_respiratorios" id="cuales_prob_respiratorios" placeholder="" type="text" class="form-control">
                                                        </div>

                                                        <div class="form-group col-md-6 regis">
                                                            <label for="infeccion" class="">Infección:</label>
                                                            <select name="infeccion" id="infeccion" name="infeccion"  class="form-control" required>  
                                                                <option value=''>--</option>
                                                                <option value='SI'>SI</option>
                                                                <option value='NO'>NO</option>
                                                            </select>
                                                        </div>

                                                        <div class=" form-group col-md-6 regis">
                                                            <label for="cuales_infeccion" class="">Cuales:</label>
                                                            <input name="cuales_infeccion" id="cuales_infeccion" placeholder="" type="text" class="form-control">
                                                        </div>

                                                        <div class="form-group col-md-6 regis">
                                                            <label for="prob_metabolicos" class="">Problemas metabólicos:</label>
                                                            <select name="prob_metabolicos" id="prob_metabolicos" name="prob_metabolicos"  class="form-control" required>  
                                                                <option value=''>--</option>
                                                                <option value='SI'>SI</option>
                                                                <option value='NO'>NO</option>
                                                            </select>
                                                        </div>
                                                        <div class=" form-group col-md-6 regis">
                                                            <label for="cuales_prob_metabolicos" class="">Cuales:</label>
                                                            <input name="cuales_prob_metabolicos" id="cuales_prob_metabolicos" placeholder="" type="text" class="form-control">
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>                                   
                                            <div class=" form-group col-md-4 regis">   
                                                <button type="submit" class="mt-2 btn btn-primary">Registrar Beneficiario</button>
                                            </div>                                             
                                            </div>
                                        </form>    
                            </div>
                        </div>                                   

                    </div>
                </div>
            </div>
            </div>
 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuBeneficiarios").addClass("mm-active");     
        $("#regBenef").addClass("mm-show");
        listarEAPB();



        $( "#prob_respiratorios" ).change(function() {
            if ($("#prob_respiratorios").val() == "SI"){$("#cuales_prob_respiratorios").removeAttr("readonly");}
            if ($("#prob_respiratorios").val() == "NO"){$("#cuales_prob_respiratorios").attr("readonly", "readonly");}
        });

        $( "#infeccion" ).change(function() {
            if ($("#infeccion").val() == "SI"){$("#cuales_infeccion").removeAttr("readonly");}
            if ($("#infeccion").val() == "NO"){$("#cuales_infeccion").attr("readonly", "readonly");}
        });

        $( "#prob_metabolicos" ).change(function() {
            if ($("#prob_metabolicos").val() == "SI"){$("#cuales_prob_metabolicos").removeAttr("readonly");}
            if ($("#prob_metabolicos").val() == "NO"){$("#cuales_prob_metabolicos").attr("readonly", "readonly");}
        });


    });

    function listarEAPB(){
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarEAPB'
                },
                success: function(rta){                      
                    $("#eapb").append("<option value=''>--</option>");
                        for(var i=0;i<rta.data.length;i++){
                            $("#eapb").append("<option value='"+rta.data[i].nombre+"'>"+rta.data[i].nombre+"</option>");
                        }                    
                    $('#eapb').trigger("change");
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


 </script>           
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>