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
                                    <div>Indicadores Madre Canguro
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Registrar indicadores Madre Canguro
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">                                         
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <form id="registro_ind_canguro">
                                                <div class="form-row">
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="hospital" class="">Seleccione Hospital:</label>                                                       
                                                        <select id='hospital' required name='hospital' class='form-control' >
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
                        <div class="col-md-12">
                            <div class="card-header">1. Crecimiento en peso niños y  niñas</div><br>
                            <div class="form-row">
                                <div class=" form-group col-md-6 regis">
                                    <label for="ind1_1" class="">Número de pacientes con peso superior a 2500 gr a las 40 semanas
                                    </label>
                                    <input name="ind1_1" id="ind1_1" min="0" placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind1_2" class="">Número de pacientes que culminaron la <br> Fase I del programa
                                    </label>
                                    <input name="ind1_2" id="ind1_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                        
                            </div>
                        </div>
                        </div>
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">2. Deserción Inicial por peso</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind2_1" class="">Número de pacientes con peso menor a 1800 gramos al egresar del intrahospitalario que ingresan al PMC ambulatorio</label>
                                    <input name="ind2_1" id="ind2_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind2_2" class="">Número de pacientes con peso menor a 1800 gramos al egresar, que egresan de PMC intrahospitalario</label>
                                    <input name="ind2_2" id="ind2_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                            
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">3. Deserción Inicial por edad gestacional</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind3_1" class="">Número de pacientes con edad gestacional menor a 34 semanas que ingresan al PMC ambulatorio</label>
                                    <input name="ind3_1" id="ind3_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind3_2" class="">Número de pacientes con edad gestacional menor a 34 semanas al nacer que egresan de PMC intrahospitalario</label>
                                    <input name="ind3_2" id="ind3_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                            
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">4. Deserción Inicial (todos los candidatos)</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind4_1" class="">Número de pacientes que ingresan al PMC Ambulatorio</label>
                                    <input name="ind4_1" id="ind4_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind4_2" class="">Número de pacientes que egresan de PMC intrahospitalario</label>
                                    <input name="ind4_2" id="ind4_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                              
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">5. Retraso inicial en el ingreso a un PMC ambulatorio</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind5_1" class="">Número de pacientes que ingresan al ambulatorio después de 48 horas del egreso de un PMC intrahospitalario</label>
                                    <input name="ind5_1" id="ind5_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind5_2" class="">Número de pacientes que egresan de<br>PMC intrahospitalario</label>
                                    <input name="ind5_2" id="ind5_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">6. Criterios de salida de un PMC hospitalario no respetados</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind6_1" class="">Número de pacientes que egresan del PMC intrahospitalario sin cumplir los criterios de eligibilidad de egreso de hospitalizacion e ingresan al ambulatorio</label>
                                    <input name="ind6_1" id="ind6_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind6_2" class="">Número de pacientes que egresan de<br> PMC intrahospitalario</label>
                                    <input name="ind6_2" id="ind6_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                            
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">7. Exposición en Posición Canguro en la Unidad de Cuidado Neonatal</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind7_1" class="">Número de horas al día en que el paciente se ha tenido en posición canguro durante la adaptación de los tres días previos a la salida del intrahospitalario</label>
                                    <input name="ind7_1" id="ind7_1"  placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">8. LME Lactancia materna exclusiva a la salida de adaptación canguro hospitalaria</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind8_1" class="">Número de pacientes que egresan del PMC intrahospitalario con leche materna </label>
                                    <input name="ind8_1" id="ind8_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind8_2" class="">Número de pacientes que egresan de <br>PMC intrahospitalario</label>
                                    <input name="ind8_2" id="ind8_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                         
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">9. Deserción a las 40 semanas</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind9_1" class=""> Número de pacientes que desertaron del PMC ambulatorio en la Fase I</label>
                                    <input name="ind9_1" id="ind9_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind9_2" class="">Número de pacientes que ingresan al PMC Ambulatorio</label>
                                    <input name="ind9_2" id="ind9_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                               
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">10. Oftalmología 40 semanas (menores de 34 semanas de E.G al nacer)</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind10_1" class="">Número de pacientes (menores de 34 semanas  de edad gestacional al nacer) a quienes se les realizó examen de oftalmología y que terminan la Fase I </label>
                                    <input name="ind10_1" id="ind10_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind10_2" class="">Número de pacientes que culminaron la Fase I del programa , niños menores de 34 semanas de edad gestacional al nacer</label>
                                    <input name="ind10_2" id="ind10_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                                
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">11. Oftalmología 40 semanas (mayores de 34 semanas de E.G al nacer con factores de riesgo)</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind11_1" class="">Número de pacientes a quienes se les realizó examen de oftalmología al terminar la Fase I, pacientes de 34 o más semanas de edad gestacional que tienen factores específicos de riesgo</label>
                                    <input name="ind11_1" id="ind11_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind11_2" class="">Número de pacientes que culminaron la Fase I del programa , niños de 34 o mas semanas de edad gestacional al nacer con factores específicos de riesgo</label>
                                    <input name="ind11_2" id="ind11_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">12. Oftalmología 40 semanas (menores de 32 semanas de E.G al nacer)</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind12_1" class="">Número de pacientes a quienes se les realizó examen de oftalmología al terminar la Fase I, niños menores de 32 semanas de edad gestacional al nacer</label>
                                    <input name="ind12_1" id="ind12_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind12_2" class="">Número de pacientes que culminaron la Fase I del programa , niños menores de 32 semanas de edad gestacional al nacer</label>
                                    <input name="ind12_2" id="ind12_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">13. Oftalmología 40 semanas (mayores de 32 semanas de E.G al nacer con factores de riesgo)</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind13_1" class="">Número de pacientes a quienes se les realizó examen de oftalmología al terminar la Fase I, pacientes de 32 o más semanas de edad gestacional que tienen factores específicos de riesgo</label>
                                    <input name="ind13_1" id="ind13_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind13_2" class="">Número de pacientes que culminaron la Fase I del programa , niños de 32 o mas semanas de edad gestacional al nacer con factores específicos de riesgo</label>
                                    <input name="ind13_2" id="ind13_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">14. Ecografía 40 semanas</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind14_1" class="">Número de pacientes a quienes se les realizó ecografía cerebral al terminar la Fase I</label>
                                    <input name="ind14_1" id="ind14_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind14_2" class="">Número de pacientes que culminaron la<br> Fase I del programa</label>
                                    <input name="ind14_2" id="ind14_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>                        
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">15. Evaluación neurológica en la semana 40 de edad gestacional</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind15_1" class="">Número de pacientes que recibieron valoración neurológica para evaluación de tono al terminar la Fase I</label>
                                    <input name="ind15_1" id="ind15_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind15_2" class="">Número de pacientes que culminaron la<br> Fase I del programa</label>
                                    <input name="ind15_2" id="ind15_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>                   
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">16. Vacunas a 40 semanas</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind16_1" class="">Número de pacientes que han recibido vacunación con hepatitis B y BCG al terminar la Fase I</label>
                                    <input name="ind16_1" id="ind16_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind16_2" class="">Número de pacientes que culminaron la<br> Fase I del programa</label>
                                    <input name="ind16_2" id="ind16_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>               
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">17. Lactancia Materna Exclusiva a las 40 semanas</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind17_1" class="">Número de niños alimentados con leche materna exclusiva a las 40 semanas E.G</label>
                                    <input name="ind17_1" id="ind17_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind17_2" class="">Número de pacientes que culminaron la<br> Fase I del programa</label>
                                    <input name="ind17_2" id="ind17_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>             
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">18. Re-hospitalización 40 semanas</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind18_1" class="">Número de pacientes que se re-hospitalizan por lo menos en una ocasión durante la primera fase del programa canguro ambulatorio y finalizan Fase I</label>
                                    <input name="ind18_1" id="ind18_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind18_2" class="">Número de pacientes que culminaron la<br> Fase I del programa</label>
                                    <input name="ind18_2" id="ind18_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>          
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">19. Mortalidad 40 semanas</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind19_1" class="">Número de pacientes quienes ingresaron al  PMC ambulatorio y que fallecen (durante el periodo) antes de 40 semanas</label>
                                    <input name="ind19_1" id="ind19_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind19_2" class="">Número de pacientes que ingresan al PMC Ambulatorio</label>
                                    <input name="ind19_2" id="ind19_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>         
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">20. Mortalidad evitable en casa a 40 semanas</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind20_1" class="">Número de pacientes que mueren en casa durante el seguimiento hasta 40 semanas.</label>
                                    <input name="ind20_1" id="ind20_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind20_2" class="">Número de pacientes quienes ingresaron al  PMC ambulatorio y que fallecen (durante el periodo) antes de 40 semanas</label>
                                    <input name="ind20_2" id="ind20_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>       
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">21. Crecimiento en peso, talla y perímetro cefálico a 40 semanas niños</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind21_1" class="">Número  de  pacientes que alcanzan más de los 2500 g de peso, 46.1 cm de talla y 31.9 cm de perímetro cefálico para los niños a las 40 semanas</label>
                                    <input name="ind21_1" id="ind21_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind21_2" class="">Número de niños que alcanzan las 40 semanas</label>
                                    <input name="ind21_2" id="ind21_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>     
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">22. Crecimiento en peso, talla y perímetro cefálico a 40 semanas niñas</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind22_1" class="">Número  de  pacientes que alcanzan más de 2400 g, 42.4 de talla y 31.5 cm de perímetro cefálico para las niñas a las 40 semanas</label>
                                    <input name="ind22_1" id="ind22_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind22_2" class="">Número de niñas que alcanzan las 40 semanas</label>
                                    <input name="ind22_2" id="ind22_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>   
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">23. Consultas a servicios de urgencias antes de la semana 40 de edad gestacional</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind23_1" class="">Número de pacientes que consultan los servicios de urgencias por lo menos en una ocasión durante la Fase I</label>
                                    <input name="ind23_1" id="ind23_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind23_2" class="">Número de pacientes que ingresan al PMC Ambulatorio</label>
                                    <input name="ind23_2" id="ind23_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">24. Deserción 1 año de edad corregida</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind24_1" class="">Número de pacientes que desertaron del PMC en la Fase II, sin incluir a los que pierden las aseguradoras</label>
                                    <input name="ind24_1" id="ind24_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind24_2" class="">Número de pacientes que culminaron la Fase I del programa</label>
                                    <input name="ind24_2" id="ind24_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">25. Optometría</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind25_1" class="">Número de pacientes a quienes se les realizó examen de optometría al terminar la Fase II</label>
                                    <input name="ind25_1" id="ind25_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind25_2" class="">Número de pacientes que finalizan la etapa II</label>
                                    <input name="ind25_2" id="ind25_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">26. Audiometría</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind26_1" class="">Número de pacientes a quienes se les realizó examen de audiometría terminar la Fase II</label>
                                    <input name="ind26_1" id="ind26_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind26_2" class="">Número de pacientes que finalizan la etapa II</label>
                                    <input name="ind26_2" id="ind26_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">27. Desarrollo neurológico y desarrollo psicomotor a 1 año de edad corregida</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind27_1" class="">Número de pacientes que tienen evaluación neurológica y psicomotora al terminar la Fase II</label>
                                    <input name="ind27_1" id="ind27_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind27_2" class="">Número de pacientes que finalizan la etapa II</label>
                                    <input name="ind27_2" id="ind27_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">28. Vacunación completa a 1 año de edad corregida</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind28_1" class="">Número de pacientes que han recibido esquema de vacunación completa para el primer año de edad</label>
                                    <input name="ind28_1" id="ind28_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind28_2" class="">Número de pacientes que finalizan la etapa II</label>
                                    <input name="ind28_2" id="ind28_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">29. Lactancia Materna a los 3 meses</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind29_1" class="">Número  de  pacientes que reciben leche materna a los 3 meses</label>
                                    <input name="ind29_1" id="ind29_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind29_2" class="">Número de pacientes que alcanzan los 3 meses</label>
                                    <input name="ind29_2" id="ind29_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">30. Lactancia Materna a los 6 meses</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind30_1" class="">Número  de  pacientes que reciben leche materna a los 6 meses</label>
                                    <input name="ind30_1" id="ind30_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind30_2" class="">Número de pacientes que alcanzan los 6 meses</label>
                                    <input name="ind30_2" id="ind30_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">31. Re hospitalización a 1 año de edad corregida</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind31_1" class="">Número de pacientes que al terminar la Fase II se re-hospitalizaron al menos una vez durante la segunda fase</label>
                                    <input name="ind31_1" id="ind31_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind31_2" class="">Número de pacientes que finalizan la etapa II</label>
                                    <input name="ind31_2" id="ind31_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">32. Mortalidad a 1 año de edad corregida</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind32_1" class="">Número de pacientes que  fallecen durante la Fase II</label>
                                    <input name="ind32_1" id="ind32_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind32_2" class="">Número de pacientes que culminaron la Fase I del programa</label>
                                    <input name="ind32_2" id="ind32_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">33. Crecimiento en peso, talla y perímetro cefálico 1 año de edad corregida niños</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind33_1" class="">Número  de  pacientes que alcanzan más de los 7700 g de peso, 71.0 cm de talla y 43.5 cm de perímetro cefálico  para los niños al año E.C</label>
                                    <input name="ind33_1" id="ind33_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind33_2" class="">Número de niños que alcanzan un año E.C</label>
                                    <input name="ind33_2" id="ind33_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                      
                        </div>
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">34. Crecimiento en peso, talla y perímetro cefálico 1 año de edad corregida niñas</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind34_1" class="">Número  de  pacientes que alcanzan más de más de 7000 g, 68.9 de talla y 42.2 cm de perímetro cefálico para las niñas al año E.C</label>
                                    <input name="ind34_1" id="ind34_1"  placeholder="" min="0" type="number" class="form-control">
                                </div> 
                                <div class="form-group col-md-6 regis">
                                    <label for="ind34_2" class="">Número de niñas que alcanzan un año E.C</label>
                                    <input name="ind34_2" id="ind34_2" placeholder="" min="0" type="number" class="form-control">
                                </div>                                             
                            </div>                                            
                        </div> 
                        
                        <!-- Indicador-->
                        <div class="col-md-12">
                            <div class="card-header">35. Accesibilidad de los padres (familia) a la Unidad de Cuidado Neonatal</div><br>
                            <div class="form-row">
                                <div class="form-group col-md-6 regis">
                                    <label for="ind35_1" class="">Número de horas de acceso de los padres a la unidad Neonatal</label>
                                    <input name="ind35_1" id="ind35_1"  placeholder="" min="0" type="number" class="form-control">
                                    <input type="hidden" id="valor1" name="valor1" value="0">                                 
                                    <input type="hidden" id="valor2" name="valor2" value="0">
                                    <input type="hidden" id="valor3" name="valor3" value="0">
                                    <input type="hidden" id="valor4" name="valor4" value="0">
                                    <input type="hidden" id="valor5" name="valor5" value="0">
                                    <input type="hidden" id="valor6" name="valor6" value="0">
                                    <input type="hidden" id="valor7" name="valor7" value="0">
                                    <input type="hidden" id="valor8" name="valor8" value="0">
                                    <input type="hidden" id="valor9" name="valor9" value="0">
                                    <input type="hidden" id="valor10" name="valor10" value="0">
                                    <input type="hidden" id="valor11" name="valor11" value="0">
                                    <input type="hidden" id="valor12" name="valor12" value="0">
                                    <input type="hidden" id="valor13" name="valor13" value="0">
                                    <input type="hidden" id="valor14" name="valor14" value="0">
                                    <input type="hidden" id="valor15" name="valor15" value="0">
                                    <input type="hidden" id="valor16" name="valor16" value="0">
                                    <input type="hidden" id="valor17" name="valor17" value="0">
                                    <input type="hidden" id="valor18" name="valor18" value="0">
                                    <input type="hidden" id="valor19" name="valor19" value="0">
                                    <input type="hidden" id="valor20" name="valor20" value="0">
                                    <input type="hidden" id="valor21" name="valor21" value="0">
                                    <input type="hidden" id="valor22" name="valor22" value="0">
                                    <input type="hidden" id="valor23" name="valor23" value="0">
                                    <input type="hidden" id="valor24" name="valor24" value="0">
                                    <input type="hidden" id="valor25" name="valor25" value="0">
                                    <input type="hidden" id="valor26" name="valor26" value="0">
                                    <input type="hidden" id="valor27" name="valor27" value="0">
                                    <input type="hidden" id="valor28" name="valor28" value="0">
                                    <input type="hidden" id="valor29" name="valor29" value="0">
                                    <input type="hidden" id="valor30" name="valor30" value="0">
                                    <input type="hidden" id="valor31" name="valor31" value="0">
                                    <input type="hidden" id="valor32" name="valor32" value="0">
                                    <input type="hidden" id="valor33" name="valor33" value="0">
                                    <input type="hidden" id="valor34" name="valor34" value="0">
                                    <input type="hidden" id="valor35" name="valor35" value="0">
                                </div>                                             
                            </div>                                      
                        </div>

                             
                            <div class=" form-group col-md-4 regis">   
                            <button type="submit" class="mt-2 btn btn-primary">Registrar indicador</button>
                            </div>                                      
                        </div>
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
 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuIndCanguro").addClass("mm-active");

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
                    if (rta.perfil == "Canguro")
                    {                          
                        $("#hospital").append("<option value='"+rta.data[0].id_hospital+"'>"+rta.data[0].nombre_hospital+"</option>");
                        $('#hospital').prop('disabled',true);
                    }
                    else
                    {                        
                        $("#hospital").append("<option value=''>--</option>");
                        for(var i=0;i<rta.data.length;i++){
                            $("#hospital").append("<option value='"+rta.data[i].id_hospital+"'>"+rta.data[i].nombre_hospital+"</option>");
                        }
                    }
                    $('#hospital').trigger("change");
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
            $.each($('#registro_ind_canguro').serializeArray(), function(i, field) {
                var j = field.name;
                if (!j.includes("valor"))
                {
                    if (field.name!='hospital' && field.name!='fecha_registro')
                    {
                        $('#'+field.name).val(''); 
                    }
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
                        command: 'listarProgresoCanguro',
                        hospital:hospital,
                        mes:mes
                    },
                    success: function(rta){
               
                        var totalMissing = 0;
                        var totalQuestions = 68;
                        var barra = $('#loading-bar');
                        if (rta.data.length > 0)
                        {
                            for (var i in rta.data[0])
                            {
                                $('#'+i).val(rta.data[0][i]);
                            } 
                        }
                        
                        $.each($('#registro_ind_canguro').serializeArray(), function(i, field) {
                            var j = field.name;
                            if (!j.includes("valor"))
                            {
                                if (field.value=='')
                                {
                                    totalMissing++;
                                }   
                            }                         
                        });
                        var totalProgress = (totalQuestions-totalMissing)*100/totalQuestions;
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