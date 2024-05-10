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
                                                <form id="registro_ind_canguro2">
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

                                                  <!--  <div class="col-md-12 col-lg-12 progressBarCanguro">
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
                                                    -->
                                        </div>
                                    </div>
                        <div class="col-md-12">
                            <div id="FASEIA">
                            <div class="card-header">FASE I A - INTRAHOSPITALARIA: ADAPTACIÓN</div><br>
                            <div class="col-md-12">
                                <div class="card-header">Deserción inicial</div><br>
                                <div class="form-row">
                                        <div class="form-row">
                                            <div class=" form-group col-md-6 regis">
                                                <label for="ind1_1" class="">Número de pacientes que llegan al PMC ambulatorio
                                                </label>
                                                <input name="ind1_1" id="ind1_1" min="0" placeholder="" min="0" type="number" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-6 regis">
                                                <label for="ind1_2" class="">Número de pacientes elegibles egresados de una Unidad de Cuidado Neonatal o una aseguradora

                                                </label>
                                                <input name="ind1_2" id="ind1_2" placeholder="" min="0" type="number" class="form-control">
                                            </div>                                        
                                        </div>
                                </div>
                                <div class="card-header">Retraso inicial en el ingreso a un PMC ambulatorio: </div><br>
                                <div class="form-row">
                                        <div class="form-row">
                                            <div class=" form-group col-md-6 regis">
                                                <label for="ind2_1" class="">Número de pacientes que ingresan al PMC ambulatorio después de las primeras 48 horas luego del egreso de un PMC  intrahospitalario 
                                                </label>
                                                <input name="ind2_1" id="ind2_1" min="0" placeholder="" min="0" type="number" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-6 regis">
                                                <label for="ind2_2" class="">Número de pacientes que egresan de un PMC intrahospitalario.
                                                </label>
                                                <input name="ind2_2" id="ind2_2" placeholder="" min="0" type="number" class="form-control">
                                            </div>                                        
                                        </div>
                                </div>
                                <div class="card-header">Criterios de salida de un PMC hospitalario no respetados:</div><br>
                                <div class="form-row">
                                        <div class="form-row">
                                            <div class=" form-group col-md-6 regis">
                                                <label for="ind3_1" class="">Número de pacientes que ingresan al PMC ambulatorio sin cumplir los criterios de elegibilidad de egreso de hospitalización </label>
                                                <input name="ind3_1" id="ind3_1" min="0" placeholder="" min="0" type="number" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-6 regis">
                                                <label for="ind3_2" class="">Número de pacientes canguro que egresan de hospitalización </label>
                                                <input name="ind3_2" id="ind3_2" placeholder="" min="0" type="number" class="form-control">
                                            </div>                                        
                                        </div>
                                </div>
                                <div class="card-header">Accesibilidad de los padres (familia) a la Unidad de Cuidado Neonatal:</div><br>
                                <div class="form-row">
                                        <div class="form-row">
                                            <div class=" form-group col-md-6 regis">
                                                <label for="ind4_1" class="">Número de horas diarias de acceso de los padres en adaptación canguro a la unidad de cuidado neonatal  </label>
                                                <input name="ind4_1" id="ind4_1" min="0" placeholder="" min="0" type="number" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-6 regis">
                                                <input name="ind4_2" id="ind4_2" readonly type="number" class="form-control" value="24" >
                                            </div>                                        
                                        </div>
                                </div>
                                <div class="card-header">LME Lactancia materna exclusiva a la salida de adaptación canguro hospitalaria:</div><br>
                                <div class="form-row">
                                        <div class="form-row">
                                            <div class=" form-group col-md-6 regis">
                                                <label for="ind5_1" class="">Número de pacientes que egresan del PMC intrahospitalario con leche materna exclusiva </label>
                                                <input name="ind5_1" id="ind5_1" min="0" placeholder="" min="0" type="number" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-6 regis">
                                                <label for="ind5_2" class="">Número de pacientes que egresan del PMC intrahospitalario.</label>
                                                <input name="ind5_2" id="ind5_2" placeholder="" min="0" type="number" class="form-control">
                                            </div>                                        
                                        </div>
                                </div>
                                <div class="card-header">Exposición en Posición Canguro en la Unidad de Cuidado Neonatal: </div><br>
                                <div class="form-row">
                                        <div class="form-row">
                                            <div class=" form-group col-md-6 regis">
                                                <label for="ind6_1" class="">Número de horas al día en que el paciente se ha tenido en Posición Canguro durante la adaptación de los tres días previos a la salida</label>
                                                <input name="ind6_1" id="ind6_1" min="0" placeholder="" min="0" type="number" class="form-control">
                                            </div>                                       
                                        </div>
                                </div>                      
                        </div>
                        </div>                        
                        <div id="FASEIB">
                        <div class="card-header">FASE I B - AMBULATORIO:  ENTRADA HASTA 40 SEMANAS EG</div><br>
                            <div class="col-md-12">
                            <div class="card-header">Deserción a las 40 semanas.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind7_1" class="">Número de pacientes que desertaron del PMC ambulatorio en la fase I 
                                            </label>
                                            <input name="ind7_1" id="ind7_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind7_2" class="">Número de pacientes que ingresaron al PMC ambulatorio
                                            </label>
                                            <input name="ind7_2" id="ind7_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Oftalmología 40 semanas.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind8_1" class="">Número de pacientes a quienes se les realizó examen de oftalmología al terminar la fase I 
                                            </label>
                                            <input name="ind8_1" id="ind8_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind8_2" class="">Número de niños que culminaron la fase I del programa
                                            </label>
                                            <input name="ind8_2" id="ind8_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Ecografía 40 semanas</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind9_1" class="">Número de pacientes a quienes se les realizó ecografía cerebral al terminar la fase I </label>
                                            <input name="ind9_1" id="ind9_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind9_2" class="">Número de pacientes que culminaron la fase I del programa
                                            </label>
                                            <input name="ind9_2" id="ind9_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Evaluación neurológica en la semana 40 de edad gestacional.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind10_1" class="">Número de pacientes que recibieron valoración neurológica para evaluación de tono al terminar la fase I </label>
                                            <input name="ind10_1" id="ind10_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind10_2" class="">Número de niños que culminaron la fase I del programa</label>
                                            <input name="ind10_2" id="ind10_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Vacunas 40 semanas.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind11_1" class="">Número de pacientes que han recibido vacunación con hepatitis B y BCG al alcanzar 2000 g </label>
                                            <input name="ind11_1" id="ind11_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind11_2" class="">Número de niños que alcanzaron los 2000 g</label>
                                            <input name="ind11_2" id="ind11_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Lactancia Materna Exclusiva a las 40 semanas.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind12_1" class="">Número de niños alimentados con leche materna exclusiva a las 40 semanas </label>
                                            <input name="ind12_1" id="ind12_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind12_2" class="">Número de niños que culminaron la fase I del Programa (categorizando por edad gestacional al nacer)</label>
                                            <input name="ind12_2" id="ind12_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Re hospitalización a las 40 semanas.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind13_1" class="">Número de pacientes que asisten al PMC ambulatorio y que se re-hospitalizan por lo menos en una ocasión durante la primera fase del programa canguro ambulatorio</label>
                                            <input name="ind13_1" id="ind13_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind13_2" class="">Número de niños que culminaron la fase I del Programa</label>
                                            <input name="ind13_2" id="ind13_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Mortalidad a las 40 semanas.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind14_1" class="">Número de pacientes quienes ingresaron al PMC ambulatorio y que fallecen antes de 40 semanas </label>
                                            <input name="ind14_1" id="ind14_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind14_2" class="">Número de niños que culminaron la fase I del Programa</label>
                                            <input name="ind14_2" id="ind14_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Mortalidad en casa a las 40 semanas.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind15_1" class="">Número de pacientes que mueren en casa </label>
                                            <input name="ind15_1" id="ind15_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind15_2" class="">Número total de pacientes que fallecen durante el seguimiento hasta 40 semanas</label>
                                            <input name="ind15_2" id="ind15_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Crecimiento en peso, talla y perímetro cefálico a las 40 semanas.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind16_1" class="">Pacientes que participan en la fase I, que alcanzan talla, peso y perímetro cefálico (crecimiento armónico) superior a -2 DE de las curvas de la OMS</label>
                                            <input name="ind16_1" id="ind16_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind16_2" class="">Total de pacientes que participan en la fase I</label>
                                            <input name="ind16_2" id="ind16_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Cumplimiento de la toma de medidas antropométricas a las 40 semanas.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind17_1" class="">Niños que asisten a consulta de seguimiento en un PMC con toma de peso, talla y perímetro cefálico ubicado en las curvas de crecimiento</label>
                                            <input name="ind17_1" id="ind17_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind17_2" class="">Total de niños que asisten a consulta de seguimiento</label>
                                            <input name="ind17_2" id="ind17_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Consultas de urgencias antes de la semana 40 de edad gestacional.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind18_1" class="">Número de pacientes que consultan los servicios de urgencias por lo menos en una ocasión</label>
                                            <input name="ind18_1" id="ind18_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind18_2" class="">Número de pacientes que ingresan a la Fase 1 del PMC ambulatorio</label>
                                            <input name="ind18_2" id="ind18_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                        </div>
                        </div>
                        <div id="FASEII">
                        <div class="card-header">FASE II - AMBULATORIO HASTA UN AÑO ECG</div><br>
                            <div class="col-md-12">
                            <div class="card-header">Deserción a 1 año de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind19_1" class="">Número de pacientes que desertaron del PMC en la fase II </label>
                                            <input name="ind19_1" id="ind19_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind19_2" class="">Número de pacientes que ingresaron al PMC fase II</label>
                                            <input name="ind19_2" id="ind19_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Optometría a 1 año de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind20_1" class="">Número de pacientes a quienes se les realizó examen de optometría al terminar la fase II </label>
                                            <input name="ind20_1" id="ind20_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind20_2" class="">Número de niños que culminaron la fase II del programa</label>
                                            <input name="ind20_2" id="ind20_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Audiología a 1 año de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind21_1" class="">Número de pacientes a quienes se les realizó examen de audiometría al terminar la fase II </label>
                                            <input name="ind21_1" id="ind21_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind21_2" class="">Número de niños que culminaron la fase II del programa</label>
                                            <input name="ind21_2" id="ind21_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Desarrollo neurológico y desarrollo psicomotor a 1 año de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind22_1" class="">Número de pacientes que tienen evaluación neurológica y psicomotora al terminar la fase II </label>
                                            <input name="ind22_1" id="ind22_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind22_2" class="">Número de pacientes que culminaron la fase II del programa</label>
                                            <input name="ind22_2" id="ind22_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Esquema de vacunación completo a 1 año de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind23_1" class="">Número de pacientes que han recibido esquema de vacunación completa para el primer año de edad al terminar la fase II </label>
                                            <input name="ind23_1" id="ind23_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind23_2" class="">Número de pacientes que culminaron la fase II del programa</label>
                                            <input name="ind23_2" id="ind23_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Lactancia Materna durante el primer año de edad corregida (a los 3 meses de edad corregida):</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind24_1" class="">Número de pacientes que reciben leche materna a los 3 meses de edad corregida </label>
                                            <input name="ind24_1" id="ind24_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind24_2" class="">Número de pacientes que culminaron estos puntos de corte del programa</label>
                                            <input name="ind24_2" id="ind24_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Lactancia Materna durante el primer año de edad corregida (a los 6 meses de edad corregida):</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind25_1" class="">Número de pacientes que reciben leche materna a los 6 meses de edad corregida </label>
                                            <input name="ind25_1" id="ind25_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind25_2" class="">Número de pacientes que culminaron estos puntos de corte del programa</label>
                                            <input name="ind25_2" id="ind25_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Re hospitalización a 1 año de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind26_1" class="">Número de pacientes que al terminar la fase II se re-hospitalizaron al menos una vez durante la segunda fase del programa </label>
                                            <input name="ind26_1" id="ind26_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind26_2" class="">Número de niños que culminaron la fase II del programa</label>
                                            <input name="ind26_2" id="ind26_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Mortalidad a 1 año de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind27_1" class="">Número de pacientes que fallecen durante la fase II </label>
                                            <input name="ind27_1" id="ind27_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind27_2" class="">Número de niños que ingresan al PMC a fase II</label>
                                            <input name="ind27_2" id="ind27_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Crecimiento en peso, talla y perímetro cefálico a 1 año de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind28_1" class="">Pacientes que participan en la fase I, que alcanzan talla, peso y perímetro cefálico (crecimiento armónico) superior a -2 DE de las curvas de la OMS</label>
                                            <input name="ind28_1" id="ind28_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind28_2" class="">Total de pacientes que participan en la fase I</label>
                                            <input name="ind28_2" id="ind28_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Cumplimiento de la toma de medidas antropométricas a 1 año de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind29_1" class="">Niños que asisten a consulta de seguimiento en un PMC con toma de peso, talla y perímetro cefálico ubicado en las curvas de crecimiento</label>
                                            <input name="ind29_1" id="ind29_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind29_2" class="">Total de niños que asisten a consulta de seguimiento</label>
                                            <input name="ind29_2" id="ind29_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                        </div>
                        </div>                        
                        <div id="FASEIII">
                        <div class="card-header">FASE III - AMBULATORIO HASTA DOS EC</div><br>
                            <div class="col-md-12">
                            <div class="card-header">Deserción a 2 años de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind30_1" class="">Número de pacientes que desertaron del PMC en la fase III.</label>
                                            <input name="ind30_1" id="ind30_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind30_2" class="">Número de pacientes que ingresaron al PMC fase III</label>
                                            <input name="ind30_2" id="ind30_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Desarrollo neurológico y desarrollo psicomotor a 2 años de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind31_1" class="">Número de pacientes que tienen evaluación neurológica y psicomotora al terminar la fase III</label>
                                            <input name="ind31_1" id="ind31_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind31_2" class="">Número de pacientes que culminaron la fase III del programa</label>
                                            <input name="ind31_2" id="ind31_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Esquema de vacunación completo a 2 años de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind32_1" class="">Número de pacientes que han recibido esquema de vacunación completa para el segundo año de edad al terminar la fase III</label>
                                            <input name="ind32_1" id="ind32_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind32_2" class="">Número de pacientes que culminaron la fase III del programa</label>
                                            <input name="ind32_2" id="ind32_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Re hospitalización a 2 años de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind33_1" class="">Número de pacientes que al terminar la fase III se re-hospitalizaron al menos una vez durante la tercera fase del programa </label>
                                            <input name="ind33_1" id="ind33_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind33_2" class="">Número de niños que culminaron la fase III del programa</label>
                                            <input name="ind33_2" id="ind33_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Mortalidad a 2 años de edad corregida.</div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind34_1" class="">Número de pacientes que fallecen durante la fase III</label>
                                            <input name="ind34_1" id="ind34_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind34_2" class="">Número de niños que ingresan al PMC a fase III</label>
                                            <input name="ind34_2" id="ind34_2" min="0" type="number" class="form-control">
                                        </div>                                        
                                    </div>
                            </div>
                            <div class="card-header">Edad de la marcha independiente </div><br>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class=" form-group col-md-6 regis">
                                            <label for="ind35_1" class="">Número de pacientes que alcanzan la marcha independiene durante la fase III</label>
                                            <input name="ind35_1" id="ind35_1" min="0" min="0" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-6 regis">
                                            <label for="ind35_2" class="">Número de niños que ingresan al PMC a fase III</label>
                                            <input name="ind35_2" id="ind35_2" min="0" type="number" class="form-control">
                                        </div>                                        
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
       
        $('#FASEIA').hide();
        $('#FASEIB').hide();
        $('#FASEII').hide();
        $('#FASEIII').hide();
        

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

            $('#FASEIA').hide();
            $('#FASEIB').hide();
            $('#FASEII').hide();
            $('#FASEIII').hide();
            
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

                        for (i = 0;i<rta.dataFases.length;i++)
                        {
                            var fase = rta.dataFases[i].fase;
                            $('#'+fase).show();
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