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
                                    <div>Registro Donantes BLH
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div> 
                                   
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Datos de Inscripción
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">  
                                            <div class="card-body">
                                                <form id="registro_donantes">
                                                <div class="form-row">
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="nombre" class="">Nombre Completo:</label>
                                                        <input name="nombre" id="nombre" placeholder="" type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="documento" class="">Documento de Identidad:</label>
                                                        <input name="documento" id="documento" placeholder="" type="number" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">   
                                                        <label for="fecha_nacimiento" class="">Fecha Nacimiento:</label>                                                 
                                                        <input class="form-control" type="date" value="" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="edad" class="">Edad:</label>
                                                        <input name="edad" id="edad" placeholder="" readonly type="number" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="telefono" class="">Telefono:</label>
                                                        <input name="telefono" id="telefono" placeholder="" type="number" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="celular" class="">Celular:</label>
                                                        <input name="celular" id="celular" placeholder="" type="number" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="direccion" class="">Dirección:</label>
                                                        <input name="direccion" id="direccion" placeholder="" type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="departamento" class="">Departamento:</label>                                                       
                                                        <select id='departamento' required name='departamento' class='form-control' required>
                                                            <option value=''>--</option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="municipio" class="">Municipio:</label>
                                                        <select id='municipio' required name='municipio' class='form-control' required>
                                                            <option value=''>--</option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="profesion" class="">Nivel Educativo: </label>
                                                        <select name="profesion" id="profesion" class="form-control" required>
                                                        <option value=''>--</option>
                                                        <option value='Ninguno'>Ninguno</option>
                                                        <option value='Preescolar'>Preescolar</option>
                                                        <option value='Primaria'>Primaria</option>
                                                        <option value='Secundaria'>Secundaria</option>
                                                        <option value='Técnico/Tecnólogo'>Técnico/Tecnólogo</option>
                                                        <option value='Univerisitario'>Univerisitario</option>
                                                        <option value='NS/NR'>NS/NR</option>
                                                    </select></div>
                                                    <div class="col-md-4">
                                                        <label for="pesoBebe" class="">Peso del bebe al nacer(gramos):</label>
                                                        <div class="input-group mb-2">        
                                                        <input type="number"  class="form-control" id="pesoBebe" name="pesoBebe" min="0" step="0.01" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">gr</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="nombreHijo" class="">Nombre del hijo:</label>
                                                        <input name="nombreHijo" id="nombreHijo" placeholder="" type="text" class="form-control" required>
                                                    </div>
                                                    </div>
                                        
                                            <div class="card-header">HISTORIA DE LA GESTACION:</div><br>
                                            <div class="form-row">                                         
                                                <div class="form-group col-md-4 regis">
                                                    <label for="control" class="">Asistió al control prenatal  </label>
                                                    <select name="control" id="control" class="form-control" > 
                                                    <option value='SI'>SI</option>
                                                    <option value='NO'>NO</option>
                                                </select></div>
                                                <div class="form-group col-md-4 regis">
                                                    <label for="tipoIps" class="">IPS </label>
                                                    <select name="tipoIps" id="tipoIps" class="form-control">
                                                    <option value=''>--</option>
                                                    <option value='PUBLICA'>PÚBLICA</option>
                                                    <option value='PRIVADA'>PRIVADA</option>
                                                </select></div>
                                                <div class=" form-group col-md-4 regis">
                                                    <label for="controlPrenatal" class="">¿Dónde asistió al control prenatal?:</label>
                                                    <input name="controlPrenatal" id="controlPrenatal"  placeholder="" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="pesoInicial" class="">Peso Inicial Gestación(kg):</label>
                                                    <div class="input-group mb-2">        
                                                    <input type="number" max="200" step="0.01" class="form-control" name="pesoInicial" id="pesoInicial" placeholder=""><div class="input-group-prepend">
                                                    <div class="input-group-text">kg</div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="pesoFinal" class="">Peso Final Gestación(kg):</label>
                                                    <div class="input-group mb-2">        
                                                    <input type="number" max="200" step="0.01" class="form-control" name="pesoFinal" id="pesoFinal" placeholder=""><div class="input-group-prepend">
                                                    <div class="input-group-text">kg</div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="talla" class="">Talla(cm):</label>
                                                    <div class="input-group mb-2">        
                                                    <input type="number" class="form-control" id="talla" name='talla' placeholder=""><div class="input-group-prepend">
                                                    <div class="input-group-text">cm</div>
                                                    </div>
                                                    </div>
                                                </div>                                          
                                                <!--<div class="form-group col-md-4 regis">
                                                    <label for="parto" class="">Parto a  </label>
                                                    <select name="parto" id="parto" class="form-control">
                                                    <option value='TERMINO'>TERMINO</option>
                                                    <option value='PRETERMINO'>PRETERMINO</option>
                                                </select></div>-->
                                                <div class="form-group col-md-4 regis">
                                                    <label for="semanas" class="">Edad gestacional al nacer(Ballard):</label>
                                                    <input name="semanas" id="semanas" placeholder="" type="number" min="0" class="form-control">
                                                </div>
                                                <div class=" form-group col-md-4 regis">   
                                                    <label for="fecha_parto" class="">Fecha Parto:</label>                                                 
                                                    <input class="form-control" type="date" value="" id="fecha_parto" name='fecha_parto'>
                                                </div>
                                            </div>


                                            <div class="card-header">EXÁMENES DE LABORATORIO DURANTE EL CONTROL PRENATAL:</div><br>
                                                <div class="form-row"> 
                                                    <div class="form-group col-md-3 regis">
                                                        <label for="vdrl" class="">VDRL</label>
                                                        <select name="vdrl" id="vdrl" class="form-control">
                                                            <option value=''>--</option>
                                                            <option value='POSITIVO'>POSITIVO</option>
                                                            <option value='NEGATIVO'>NEGATIVO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 regis">   
                                                        <label for="fecha_vdrl" class="">Fecha del laboratorio(VHDRL):</label>                                                 
                                                        <input class="form-control" type="date" value="" id="fecha_vdrl" name='fecha_vdrl'>
                                                    </div>
                                                    <div class="form-group col-md-3 regis">
                                                        <label for="hbsag" class="">HbsAg</label>
                                                        <select name="hbsag" id="hbsag" class="form-control">
                                                            <option value=''>--</option>
                                                            <option value='POSITIVO'>POSITIVO</option>
                                                            <option value='NEGATIVO'>NEGATIVO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 regis">   
                                                        <label for="fecha_hbsag" class="">Fecha del laboratorio(HbsAg):</label>                                                 
                                                        <input class="form-control" type="date" value="" id="fecha_hbsag" name='fecha_hbsag'>
                                                    </div>
                                                    <div class="form-group col-md-3 regis">
                                                        <label for="hiv" class="">HIV</label>
                                                        <select name="hiv" id="hiv" class="form-control">
                                                            <option value=''>--</option>
                                                            <option value='POSITIVO'>POSITIVO</option>
                                                            <option value='NEGATIVO'>NEGATIVO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 regis">   
                                                        <label for="fecha_hiv" class="">Fecha del laboratorio(HIV):</label>                                                 
                                                        <input class="form-control" type="date" value="" id="fecha_hiv" name='fecha_hiv'>
                                                    </div>                                                    
                                                    <div class="col-md-3">
                                                        <label for="hemoglobina" class="">Hb:</label>
                                                        <div class="input-group mb-2">        
                                                        <input type="number"  class="form-control" id="hemoglobina" name="hemoglobina" min="0" max="500" step="0.01" placeholder="">
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">gr/dl</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="hematocrito" class="">Hto:</label>
                                                        <div class="input-group mb-2">        
                                                        <input type="number"  class="form-control" id="hematocrito" name="hematocrito" min="0" max="200" step="0.01" placeholder="">
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">%</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3 regis">   
                                                        <label for="fecha_hb_hto" class="">Fecha del laboratorio(Hb y Hto):</label>                                                 
                                                        <input class="form-control" type="date" value="" id="fecha_hb_hto"  name='fecha_hb_hto'>
                                                    </div>
                                                    <div class="form-group col-md-4 regis">
                                                        <label for="transfusion" class="">Transfusión sanguinea los últimos 5 años</label>
                                                        <select name="transfusion" id="transfusion" class="form-control">
                                                            <option value=''>--</option>
                                                            <option value='SI'>SI</option>
                                                            <option value='NO'>NO</option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-5 regis">
                                                        <label for="enfermedades" class="">Enfermedades durante gestación:</label>
                                                        <input name="enfermedades" id="enfermedades" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4 regis">
                                                        <label for="medicamentos" class="">Medicamentos</label>
                                                        <select name="medicamentos" id="medicamentos" class="form-control">
                                                            <option value=''>--</option>
                                                            <option value='SI'>SI</option>
                                                            <option value='NO'>NO</option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-8 regis">
                                                        <label for="cuales_medicamentos" class="">Cuales:</label>
                                                        <input name="cuales_medicamentos" id="cuales_medicamentos" placeholder="" type="text" class="form-control">
                                                    </div>
                                                    
                                                    <div class="form-group col-md-3 regis">
                                                        <label for="fuma" class="">Fuma</label>
                                                        <select name="fuma" id="fuma" class="form-control">
                                                            <option value=''>--</option>
                                                            <option value='SI'>SI</option>
                                                            <option value='NO'>NO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 regis">
                                                        <label for="alcohol" class="">Consume alcohol</label>
                                                        <select name="alcohol" id="alcohol" class="form-control">
                                                            <option value=''>--</option>
                                                            <option value='SI'>SI</option>
                                                            <option value='NO'>NO</option>
                                                        </select>
                                                    </div>                                                
                                                    <div class=" form-group col-md-4 regis"><br>
                                                        <button type="submit" class="mt-3 btn btn-primary">Registrar Donante</button>
                                                    </div>                                  
                                            </div>
                                            

                                        </form>                                       
                                        </div>
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
        $("#menuRegistroDonantes").addClass("mm-active");

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
        $( "#control").change(function()
        {
            $( "#tipoIps" ).prop( "disabled", false );
            $( "#controlPrenatal" ).prop( "disabled", false );
            
            var control = $(this).val();
            if (control == "NO")
            {
                $( "#tipoIps" ).prop( "disabled", true );
                $( "#controlPrenatal" ).prop( "disabled", true );
            }

        }); 
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

    listarDepartamentos();
});

 </script>           
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>