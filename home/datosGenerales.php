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
                                    <div>Estrategia Instituciones Amigas de la Mujer y la infancia con enfoque integral - IAMII
                                        <div class="page-title-subheading">Se debe diligenciar cada trimestre calendario
                                        </div>
                                    </div>
                                </div> 
                                   
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">DATOS GENERALES DE LA INSTITUCIÒN
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">                                        
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <form id="registro_datos_generales">
                                                <div class="form-row">

                                                    <div class=" form-group col-md-5 regis">
                                                        <label for="hospital" class="">Institución:</label>                                                       
                                                        <select id='hospital' required name='hospital' class='form-control' >
                                                        </select>
                                                    </div> 
                                                    <div class=" form-group col-md-3 regis">
                                                        <label for="direccion" class="">Dirección:</label>
                                                        <input name="direccion" id="direccion" placeholder="" type="text" class="form-control">
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="departamento" class="">Departamento:</label>                                                       
                                                        <select id='departamento' required name='departamento' class='form-control' >
                                                            <option value=''>--</option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="municipio" class="">Municipio:</label>
                                                        <select id='municipio' required name='municipio' class='form-control' >
                                                            <option value=''>--</option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="telefono" class="">Telefono institucional:</label>
                                                        <input name="telefono" id="telefono" placeholder="" type="number" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="correo" class="">Correo institucional:</label>
                                                        <input name="correo" id="correo" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="gerente" class="">Nombre del Gerente y/o representante legal de la Institución</label>
                                                        <input name="gerente" id="gerente" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="tel_gerente" class="">Teléfono Gerente</label>
                                                        <input name="tel_gerente" id="tel_gerente" placeholder="" type="number" class="form-control">
                                                    </div>
                                                    
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="referente_iami" class="">Referente IAMII:</label>
                                                        <input name="referente_iami" id="referente_iami" placeholder="" type="text" class="form-control">
                                                    </div>                                                    
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="profesion" class="">Profesion:</label>
                                                        <input name="profesion" id="profesion" placeholder="" type="text" class="form-control">
                                                    </div>                                                    
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="telefono_referente" class="">Teléfono referente:</label>
                                                        <input name="telefono_referente" id="telefono_referente" placeholder="" type="number" class="form-control">
                                                    </div>                                                   
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="correo_referente" class="">Correo referente:</label>
                                                        <input name="correo_referente" id="correo_referente" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    <!--
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="coordIami" class="">Nombre del Coordinador del Comitè IAMI</label>
                                                        <input name="coordIami" id="coordIami" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="tel_coordIami" class="">Contacto Coordinador IAMI</label>
                                                        <input name="tel_coordIami" id="tel_coordIami" placeholder="" type="number" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="subgerenteCient" class="">Subgerente Cientifico</label>
                                                        <input name="subgerenteCient" id="subgerenteCient" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="tel_subgerenteCient" class="">Contacto SubGerente Cientifico</label>
                                                        <input name="tel_subgerenteCient" id="tel_subgerenteCient" placeholder="" type="number" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="subGerAdmin" class="">Subgerente Administrativo</label>
                                                        <input name="subGerAdmin" id="subGerAdmin" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="tel_subGerAdmin" class="">Contacto SubGerente Administrativo</label>
                                                        <input name="tel_subGerAdmin" id="tel_subGerAdmin" placeholder="" type="number" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="subGerComu" class="">Subgerente Comunitario</label>
                                                        <input name="subGerComu" id="subGerComu" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="tel_subGerComu" class="">Contacto SubGerente Comunitario</label>
                                                        <input name="tel_subGerComu" id="tel_subGerComu" placeholder="" type="number" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="repCalidad" class="">Representante de Calidad</label>
                                                        <input name="repCalidad" id="repCalidad" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="tel_repCalidad" class="">Contacto Representante de Calidad</label>
                                                        <input name="tel_repCalidad" id="tel_repCalidad" placeholder="" type="number" class="form-control">
                                                    </div>
                                                    -->
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="tipoInstitucion" class="">Tipo de institución</label>
                                                        <select name="tipoInstitucion" id="tipoInstitucion" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='PUBLICA'>PUBLICA</option>
                                                        <option value='PRIVADA'>PRIVADA</option>
                                                        <option value='MIXTA'>MIXTA</option>
                                                    </select></div>
                                                    <div class=" form-group col-md-2 regis">
                                                        <label for="nivel_complejidad" class="">Nivel de Complejidad</label>
                                                        <input name="nivel_complejidad" id="nivel_complejidad" placeholder="" type="number" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="cuidadoPreconcepcional" class="">Ofrece atención para el cuidado preconcepcional:</label>
                                                        <select name="cuidadoPreconcepcional" id="cuidadoPreconcepcional" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                    </select></div>
                                                    <div class=" form-group col-md-2 regis">
                                                        <label for="consultaPrenatal" class="">Ofrece control y/o Consulta prenatal:</label>
                                                        <select name="consultaPrenatal" id="consultaPrenatal" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                    </select></div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="partos" class="">Ofrece atención<br> del parto:</label>
                                                        <select name="partos" id="partos" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                    </select></div>
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="controlNinoSanoEnf" class="">Ofrece atención integral en salud individual para niños y niñas en primera infancia</label>
                                                        <select name="controlNinoSanoEnf" id="controlNinoSanoEnf" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                    </select></div>                                                    

                                                    <div class=" form-group col-md-4 regis">   
                                            <button type="submit" class="mt-2 btn btn-primary">Registrar Datos</button>
                                            </div> 
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
        $("#menuDatos").addClass("mm-active");



        function listarDepartamentos(){
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarDepartamentos'
                },
                success: function(rta){
                    for(var i=0;i<rta.data.length;i++){
                        $("#departamento").append("<option value='"+rta.data[i].nombre_departamento+"'>"+rta.data[i].nombre_departamento+"</option>");
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
        $( "#departamento").change(function()
        {
            var idDepartamento = $(this).val();
            $("#municipio").html('<option value="">--</option>');
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarMunicipiosPorDepartamentos',
                        idDepartamento:idDepartamento
                    },
                    success: function(rta){
                        console.warn(rta);
                        for(var i=0;i<rta.data.length;i++){
                            $("#municipio").append("<option value='"+rta.data[i].id_municipio+"'>"+rta.data[i].nombre_municipio+"</option>");
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
        });
        $("#hospital").change(function()
        {
            
            cargarDatosGenerales($(this).val());
        });
            
        $('#fecha_nacimiento').on('input',function(e)
        {
            var fechaNacimiento = $(this).val();
            var dob = new Date(fechaNacimiento);  
            //calculate month difference from current date in time  
            var month_diff = Date.now() - dob.getTime();  
            //convert the calculated difference in date format  
            var age_dt = new Date(month_diff);   
            //extract year from date      
            var year = age_dt.getUTCFullYear();  
            //now calculate the age of the user  
            var age = Math.abs(year - 1970);  
            //display the calculated age  
            if (age > 1 && age <90)
            {
                $('#edad').val(age);                
            }
        }); 

        function cargarDatosGenerales(idHospital)
        {
            $('#registro_datos_generales')[0].reset();
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'cargarDatosGenerales',
                    idHospital:idHospital
                },
                success: function(rta2){    
                    console.warn("rta2");   
                    console.warn(rta2);        
                    if (rta2.type != "error" && rta2.data.length > 0)
                    {                                    
                       // $('#hospital').val(rta2.data[0].hospital); 
                        $('#direccion').val(rta2.data[0].direccion); 
                        $('#departamento').val(rta2.data[0].departamento);     
                        $("#municipio").append("<option value='"+rta2.data[0].id_municipio+"'>"+rta2.data[0].nombre_municipio+"</option>");
                        $("#municipio").val(rta2.data[0].id_municipio);
                        $('#telefono').val(rta2.data[0].telefono); 
                        $('#correo').val(rta2.data[0].correo); 
                        $('#gerente').val(rta2.data[0].gerente); 
                        $('#tel_gerente').val(rta2.data[0].tel_gerente); 
                        $('#referente_iami').val(rta2.data[0].referente_iami); 
                        $('#profesion').val(rta2.data[0].profesion); 
                        $('#telefono_referente').val(rta2.data[0].telefono_referente); 
                        $('#correo_referente').val(rta2.data[0].correo_referente); 
                        $('#cuidadoPreconcepcional').val(rta2.data[0].cuidadoPreconcepcional);                         

                        $('#coordIami').val(rta2.data[0].coordIami); 
                        $('#tel_coordIami').val(rta2.data[0].tel_coordIami); 
                        $('#subgerenteCient').val(rta2.data[0].subgerenteCient); 
                        $('#tel_subgerenteCient').val(rta2.data[0].tel_subgerenteCient); 
                        $('#subGerAdmin').val(rta2.data[0].subGerAdmin); 
                        $('#tel_subGerAdmin').val(rta2.data[0].tel_subGerAdmin); 
                        $('#subGerComu').val(rta2.data[0].subGerComu); 
                        $('#tel_subGerComu').val(rta2.data[0].tel_subGerComu); 
                        $('#repCalidad').val(rta2.data[0].repCalidad); 
                        $('#tel_repCalidad').val(rta2.data[0].tel_repCalidad); 
                        $('#tipoInstitucion').val(rta2.data[0].tipoInstitucion); 
                        $('#nivel_complejidad').val(rta2.data[0].nivel_complejidad); 
                        $('#consultaPrenatal').val(rta2.data[0].consultaPrenatal); 
                        $('#partos').val(rta2.data[0].partos); 
                        $('#controlNinoSanoEnf').val(rta2.data[0].controlNinoSanoEnf); 
                    }                    
                    $('#hospital').val(idHospital);  
                    
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
                    if (rta.perfil == "IAMII")
                    {                         
                        $("#hospital").append("<option value='"+rta.data[0].id_hospital+"'>"+rta.data[0].nombre_hospital+"</option>");
                        $('#hospital').prop('disabled',true);
                    } 
                    else if(rta.perfil == "Administrador Sistema" || rta.perfil == "Administrador IAMII" )
                    {                       
                        $("#hospital").append("<option value=''>--</option>");
                        for(var i=0;i<rta.data.length;i++){
                            $("#hospital").append("<option value='"+rta.data[i].id_hospital+"'>"+rta.data[i].nombre_hospital+"</option>");
                        }
                    }
                    else
                    {                      
                        $("#hospital").append("<option value=''>--</option>");
                        for(var i=0;i<rta.data.length;i++){
                            $("#hospital").append("<option value='"+rta.data[i].id_hospital+"'>"+rta.data[i].nombre_hospital+"</option>");
                        }
                        $('#hospital').prop('disabled',true);
                    }
                    if (rta.idHospital != null)
                    { 
                        cargarDatosGenerales(rta.idHospital);
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
        listarDepartamentos();
        listarHospitales();
});

 </script>           
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>