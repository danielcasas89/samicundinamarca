<?php 
session_start();
if(isset($_SESSION['usuario_sesion'])){
	@require '../php/cabecera.php';
    ?>
    <style>
        .table th, .table td {
            font-size: 11px;
        }
    </style>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-config">
                                        </i>
                                    </div>
                                    <div>Cumplimiento Indicadores Madre Canguro
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <a href="indiami.php"><button type="button" class=" btn btn-info">Regresar a indicadores</button></a>
                                    </div>
                                </div>     
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Cumplimiento Indicadores Madre Canguro
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                
                                    <div class="col-md-12">
                                        <div class="">                                         
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <form id="registro_paso">
                                                <div class="form-row">
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="hospital" class="">Seleccione un Hospital:</label>                                                       
                                                         <select id='hospital' required name='hospital' class='form-control' >
                                                        </select>
                                                    </div>  

                                                    </div>
                                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">                      
                                            <div class="card-body">                   
                                        <h5 class="card-title">Cumplimiento Canguro Mes</h5>
                                                <div class="form-row">                                                                                     
                                                    <div class="form-group col-md-12">
                                                    <table class="mb-0 table table-bordered table-hover" id="tableIndicadores">
                                                <thead>
                                                <tr>
                                                    <th>PERIODO</th>
                                                    <th>ENERO</th>
                                                    <th>FEBRERO</th>
                                                    <th>MARZO</th>
                                                    <th>ABRIL</th>
                                                    <th>MAYO</th>
                                                    <th>JUNIO</th>
                                                    <th>JULIO</th>
                                                    <th>AGOSTO</th>
                                                    <th>SEPTIEMBRE</th>
                                                    <th>OCTUBRE</th>
                                                    <th>NOVIEMBRE</th>
                                                    <th>DICIEMBRE</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">IND 1: Crecimiento en peso niños y  niñas</th>
                                                    <td class="tableiami" id="ene_ind1"></td>
                                                    <td class="tableiami" id="feb_ind1"></td>
                                                    <td class="tableiami" id="mar_ind1"></td>
                                                    <td class="tableiami" id="abr_ind1"></td>
                                                    <td class="tableiami" id="may_ind1"></td>
                                                    <td class="tableiami" id="jun_ind1"></td>
                                                    <td class="tableiami" id="jul_ind1"></td>
                                                    <td class="tableiami" id="ago_ind1"></td>
                                                    <td class="tableiami" id="sep_ind1"></td>
                                                    <td class="tableiami" id="oct_ind1"></td>
                                                    <td class="tableiami" id="nov_ind1"></td>
                                                    <td class="tableiami" id="dic_ind1"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 2: Deserción Inicial por peso</th>
                                                    <td class="tableiami" id="ene_ind2"></td>
                                                    <td class="tableiami" id="feb_ind2"></td>
                                                    <td class="tableiami" id="mar_ind2"></td>
                                                    <td class="tableiami" id="abr_ind2"></td>
                                                    <td class="tableiami" id="may_ind2"></td>
                                                    <td class="tableiami" id="jun_ind2"></td>
                                                    <td class="tableiami" id="jul_ind2"></td>
                                                    <td class="tableiami" id="ag0_ind2"></td>
                                                    <td class="tableiami" id="sep_ind2"></td>
                                                    <td class="tableiami" id="oct_ind2"></td>
                                                    <td class="tableiami" id="nov_ind2"></td>
                                                    <td class="tableiami" id="dic_ind2"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 3: Deserción Inicial por edad gestacional</th>
                                                    <td class="tableiami" id="ene_ind3"></td>
                                                    <td class="tableiami" id="feb_ind3"></td>
                                                    <td class="tableiami" id="mar_ind3"></td>
                                                    <td class="tableiami" id="abr_ind3"></td>
                                                    <td class="tableiami" id="may_ind3"></td>
                                                    <td class="tableiami" id="jun_ind3"></td>
                                                    <td class="tableiami" id="jul_ind3"></td>
                                                    <td class="tableiami" id="ag0_ind3"></td>
                                                    <td class="tableiami" id="sep_ind3"></td>
                                                    <td class="tableiami" id="oct_ind3"></td>
                                                    <td class="tableiami" id="nov_ind3"></td>
                                                    <td class="tableiami" id="dic_ind3"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 4: Deserción Inicial (todos los candidatos)</th>
                                                    <td class="tableiami" id="ene_ind4"></td>
                                                    <td class="tableiami" id="feb_ind4"></td>
                                                    <td class="tableiami" id="mar_ind4"></td>
                                                    <td class="tableiami" id="abr_ind4"></td>
                                                    <td class="tableiami" id="may_ind4"></td>
                                                    <td class="tableiami" id="jun_ind4"></td>
                                                    <td class="tableiami" id="jul_ind4"></td>
                                                    <td class="tableiami" id="ag0_ind4"></td>
                                                    <td class="tableiami" id="sep_ind4"></td>
                                                    <td class="tableiami" id="oct_ind4"></td>
                                                    <td class="tableiami" id="nov_ind4"></td>
                                                    <td class="tableiami" id="dic_ind4"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 5: Retraso inicial en el ingreso a un PMC ambulatorio</th>
                                                    <td class="tableiami" id="ene_ind5"></td>
                                                    <td class="tableiami" id="feb_ind5"></td>
                                                    <td class="tableiami" id="mar_ind5"></td>
                                                    <td class="tableiami" id="abr_ind5"></td>
                                                    <td class="tableiami" id="may_ind5"></td>
                                                    <td class="tableiami" id="jun_ind5"></td>
                                                    <td class="tableiami" id="jul_ind5"></td>
                                                    <td class="tableiami" id="ago_ind5"></td>
                                                    <td class="tableiami" id="sep_ind5"></td>
                                                    <td class="tableiami" id="oct_ind5"></td>
                                                    <td class="tableiami" id="nov_ind5"></td>
                                                    <td class="tableiami" id="dic_ind5"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 6: Criterios de salida de un PMC hospitalario no respetados</th>
                                                    <td class="tableiami" id="ene_ind6"></td>
                                                    <td class="tableiami" id="feb_ind6"></td>
                                                    <td class="tableiami" id="mar_ind6"></td>
                                                    <td class="tableiami" id="abr_ind6"></td>
                                                    <td class="tableiami" id="may_ind6"></td>
                                                    <td class="tableiami" id="jun_ind6"></td>
                                                    <td class="tableiami" id="jul_ind6"></td>
                                                    <td class="tableiami" id="agp_ind6"></td>
                                                    <td class="tableiami" id="sep_ind6"></td>
                                                    <td class="tableiami" id="oct_ind6"></td>
                                                    <td class="tableiami" id="nov_ind6"></td>
                                                    <td class="tableiami" id="dic_ind6"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 7: Exposición en Posición Canguro en la Unidad de Cuidado Neonatal</th>
                                                    <td class="tableiami" id="ene_ind7"></td>
                                                    <td class="tableiami" id="feb_ind7"></td>
                                                    <td class="tableiami" id="mar_ind7"></td>
                                                    <td class="tableiami" id="abr_ind7"></td>
                                                    <td class="tableiami" id="may_ind7"></td>
                                                    <td class="tableiami" id="jun_ind7"></td>
                                                    <td class="tableiami" id="jul_ind7"></td>
                                                    <td class="tableiami" id="agp_ind7"></td>
                                                    <td class="tableiami" id="sep_ind7"></td>
                                                    <td class="tableiami" id="oct_ind7"></td>
                                                    <td class="tableiami" id="nov_ind7"></td>
                                                    <td class="tableiami" id="dic_ind7"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 8: LME Lactancia materna exclusiva a la salida de adaptación canguro hospitalaria</th>
                                                    <td class="tableiami" id="ene_ind8"></td>
                                                    <td class="tableiami" id="feb_ind8"></td>
                                                    <td class="tableiami" id="mar_ind8"></td>
                                                    <td class="tableiami" id="abr_ind8"></td>
                                                    <td class="tableiami" id="may_ind8"></td>
                                                    <td class="tableiami" id="jun_ind8"></td>
                                                    <td class="tableiami" id="jul_ind8"></td>
                                                    <td class="tableiami" id="agp_ind8"></td>
                                                    <td class="tableiami" id="sep_ind8"></td>
                                                    <td class="tableiami" id="oct_ind8"></td>
                                                    <td class="tableiami" id="nov_ind8"></td>
                                                    <td class="tableiami" id="dic_ind8"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 9: Deserción a las 40 semanas</th>
                                                    <td class="tableiami" id="ene_ind9"></td>
                                                    <td class="tableiami" id="feb_ind9"></td>
                                                    <td class="tableiami" id="mar_ind9"></td>
                                                    <td class="tableiami" id="abr_ind9"></td>
                                                    <td class="tableiami" id="may_ind9"></td>
                                                    <td class="tableiami" id="jun_ind9"></td>
                                                    <td class="tableiami" id="jul_ind9"></td>
                                                    <td class="tableiami" id="agp_ind9"></td>
                                                    <td class="tableiami" id="sep_ind9"></td>
                                                    <td class="tableiami" id="oct_ind9"></td>
                                                    <td class="tableiami" id="nov_ind9"></td>
                                                    <td class="tableiami" id="dic_ind9"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 10: Oftalmología 40 semanas (menores de 34 semanas de E.G al nacer)</th>
                                                    <td class="tableiami" id="ene_ind10"></td>
                                                    <td class="tableiami" id="feb_ind10"></td>
                                                    <td class="tableiami" id="mar_ind10"></td>
                                                    <td class="tableiami" id="abr_ind10"></td>
                                                    <td class="tableiami" id="may_ind10"></td>
                                                    <td class="tableiami" id="jun_ind10"></td>
                                                    <td class="tableiami" id="jul_ind10"></td>
                                                    <td class="tableiami" id="agp_ind10"></td>
                                                    <td class="tableiami" id="sep_ind10"></td>
                                                    <td class="tableiami" id="oct_ind10"></td>
                                                    <td class="tableiami" id="nov_ind10"></td>
                                                    <td class="tableiami" id="dic_ind10"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 11: Oftalmología 40 semanas (mayores de 34 semanas de E.G al nacer con factores de riesgo)</th>
                                                    <td class="tableiami" id="ene_ind11"></td>
                                                    <td class="tableiami" id="feb_ind11"></td>
                                                    <td class="tableiami" id="mar_ind11"></td>
                                                    <td class="tableiami" id="abr_ind11"></td>
                                                    <td class="tableiami" id="may_ind11"></td>
                                                    <td class="tableiami" id="jun_ind11"></td>
                                                    <td class="tableiami" id="jul_ind11"></td>
                                                    <td class="tableiami" id="agp_ind11"></td>
                                                    <td class="tableiami" id="sep_ind11"></td>
                                                    <td class="tableiami" id="oct_ind11"></td>
                                                    <td class="tableiami" id="nov_ind11"></td>
                                                    <td class="tableiami" id="dic_ind11"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 12: Oftalmología 40 semanas (menores de 32 semanas de E.G al nacer)</th>
                                                    <td class="tableiami" id="ene_ind12"></td>
                                                    <td class="tableiami" id="feb_ind12"></td>
                                                    <td class="tableiami" id="mar_ind12"></td>
                                                    <td class="tableiami" id="abr_ind12"></td>
                                                    <td class="tableiami" id="may_ind12"></td>
                                                    <td class="tableiami" id="jun_ind12"></td>
                                                    <td class="tableiami" id="jul_ind12"></td>
                                                    <td class="tableiami" id="agp_ind12"></td>
                                                    <td class="tableiami" id="sep_ind12"></td>
                                                    <td class="tableiami" id="oct_ind12"></td>
                                                    <td class="tableiami" id="nov_ind12"></td>
                                                    <td class="tableiami" id="dic_ind12"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 13: Oftalmología 40 semanas (mayores de 32 semanas de E.G al nacer con factores de riesgo)</th>
                                                    <td class="tableiami" id="ene_ind13"></td>
                                                    <td class="tableiami" id="feb_ind13"></td>
                                                    <td class="tableiami" id="mar_ind13"></td>
                                                    <td class="tableiami" id="abr_ind13"></td>
                                                    <td class="tableiami" id="may_ind13"></td>
                                                    <td class="tableiami" id="jun_ind13"></td>
                                                    <td class="tableiami" id="jul_ind13"></td>
                                                    <td class="tableiami" id="agp_ind13"></td>
                                                    <td class="tableiami" id="sep_ind13"></td>
                                                    <td class="tableiami" id="oct_ind13"></td>
                                                    <td class="tableiami" id="nov_ind13"></td>
                                                    <td class="tableiami" id="dic_ind13"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 14: Ecografía 40 semanas</th>
                                                    <td class="tableiami" id="ene_ind14"></td>
                                                    <td class="tableiami" id="feb_ind14"></td>
                                                    <td class="tableiami" id="mar_ind14"></td>
                                                    <td class="tableiami" id="abr_ind14"></td>
                                                    <td class="tableiami" id="may_ind14"></td>
                                                    <td class="tableiami" id="jun_ind14"></td>
                                                    <td class="tableiami" id="jul_ind14"></td>
                                                    <td class="tableiami" id="agp_ind14"></td>
                                                    <td class="tableiami" id="sep_ind14"></td>
                                                    <td class="tableiami" id="oct_ind14"></td>
                                                    <td class="tableiami" id="nov_ind14"></td>
                                                    <td class="tableiami" id="dic_ind14"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 15: Evaluación neurológica en la semana 40 de edad gestacional</th>
                                                    <td class="tableiami" id="ene_ind15"></td>
                                                    <td class="tableiami" id="feb_ind15"></td>
                                                    <td class="tableiami" id="mar_ind15"></td>
                                                    <td class="tableiami" id="abr_ind15"></td>
                                                    <td class="tableiami" id="may_ind15"></td>
                                                    <td class="tableiami" id="jun_ind15"></td>
                                                    <td class="tableiami" id="jul_ind15"></td>
                                                    <td class="tableiami" id="agp_ind15"></td>
                                                    <td class="tableiami" id="sep_ind15"></td>
                                                    <td class="tableiami" id="oct_ind15"></td>
                                                    <td class="tableiami" id="nov_ind15"></td>
                                                    <td class="tableiami" id="dic_ind15"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 16: Vacunas a 40 semanas</th>
                                                    <td class="tableiami" id="ene_ind16"></td>
                                                    <td class="tableiami" id="feb_ind16"></td>
                                                    <td class="tableiami" id="mar_ind16"></td>
                                                    <td class="tableiami" id="abr_ind16"></td>
                                                    <td class="tableiami" id="may_ind16"></td>
                                                    <td class="tableiami" id="jun_ind16"></td>
                                                    <td class="tableiami" id="jul_ind16"></td>
                                                    <td class="tableiami" id="agp_ind16"></td>
                                                    <td class="tableiami" id="sep_ind16"></td>
                                                    <td class="tableiami" id="oct_ind16"></td>
                                                    <td class="tableiami" id="nov_ind16"></td>
                                                    <td class="tableiami" id="dic_ind16"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 17: Lactancia Materna Exclusiva a las 40 semanas</th>
                                                    <td class="tableiami" id="ene_ind17"></td>
                                                    <td class="tableiami" id="feb_ind17"></td>
                                                    <td class="tableiami" id="mar_ind17"></td>
                                                    <td class="tableiami" id="abr_ind17"></td>
                                                    <td class="tableiami" id="may_ind17"></td>
                                                    <td class="tableiami" id="jun_ind17"></td>
                                                    <td class="tableiami" id="jul_ind17"></td>
                                                    <td class="tableiami" id="agp_ind17"></td>
                                                    <td class="tableiami" id="sep_ind17"></td>
                                                    <td class="tableiami" id="oct_ind17"></td>
                                                    <td class="tableiami" id="nov_ind17"></td>
                                                    <td class="tableiami" id="dic_ind17"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 18: Re-hospitalización 40 semanas</th>
                                                    <td class="tableiami" id="ene_ind18"></td>
                                                    <td class="tableiami" id="feb_ind18"></td>
                                                    <td class="tableiami" id="mar_ind18"></td>
                                                    <td class="tableiami" id="abr_ind18"></td>
                                                    <td class="tableiami" id="may_ind18"></td>
                                                    <td class="tableiami" id="jun_ind18"></td>
                                                    <td class="tableiami" id="jul_ind18"></td>
                                                    <td class="tableiami" id="agp_ind18"></td>
                                                    <td class="tableiami" id="sep_ind18"></td>
                                                    <td class="tableiami" id="oct_ind18"></td>
                                                    <td class="tableiami" id="nov_ind18"></td>
                                                    <td class="tableiami" id="dic_ind18"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 19: Mortalidad 40 semanas</th>
                                                    <td class="tableiami" id="ene_ind19"></td>
                                                    <td class="tableiami" id="feb_ind19"></td>
                                                    <td class="tableiami" id="mar_ind19"></td>
                                                    <td class="tableiami" id="abr_ind19"></td>
                                                    <td class="tableiami" id="may_ind19"></td>
                                                    <td class="tableiami" id="jun_ind19"></td>
                                                    <td class="tableiami" id="jul_ind19"></td>
                                                    <td class="tableiami" id="agp_ind19"></td>
                                                    <td class="tableiami" id="sep_ind19"></td>
                                                    <td class="tableiami" id="oct_ind19"></td>
                                                    <td class="tableiami" id="nov_ind19"></td>
                                                    <td class="tableiami" id="dic_ind19"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 20: Mortalidad evitable en casa a 40 semanas</th>
                                                    <td class="tableiami" id="ene_ind20"></td>
                                                    <td class="tableiami" id="feb_ind20"></td>
                                                    <td class="tableiami" id="mar_ind20"></td>
                                                    <td class="tableiami" id="abr_ind20"></td>
                                                    <td class="tableiami" id="may_ind20"></td>
                                                    <td class="tableiami" id="jun_ind20"></td>
                                                    <td class="tableiami" id="jul_ind20"></td>
                                                    <td class="tableiami" id="agp_ind20"></td>
                                                    <td class="tableiami" id="sep_ind20"></td>
                                                    <td class="tableiami" id="oct_ind20"></td>
                                                    <td class="tableiami" id="nov_ind20"></td>
                                                    <td class="tableiami" id="dic_ind20"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 21: Crecimiento en peso, talla y perímetro cefálico a 40 semanas niños</th>
                                                    <td class="tableiami" id="ene_ind21"></td>
                                                    <td class="tableiami" id="feb_ind21"></td>
                                                    <td class="tableiami" id="mar_ind21"></td>
                                                    <td class="tableiami" id="abr_ind21"></td>
                                                    <td class="tableiami" id="may_ind21"></td>
                                                    <td class="tableiami" id="jun_ind21"></td>
                                                    <td class="tableiami" id="jul_ind21"></td>
                                                    <td class="tableiami" id="agp_ind21"></td>
                                                    <td class="tableiami" id="sep_ind21"></td>
                                                    <td class="tableiami" id="oct_ind21"></td>
                                                    <td class="tableiami" id="nov_ind21"></td>
                                                    <td class="tableiami" id="dic_ind21"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 22: Crecimiento en peso, talla y perímetro cefálico a 40 semanas niñas</th>
                                                    <td class="tableiami" id="ene_ind22"></td>
                                                    <td class="tableiami" id="feb_ind22"></td>
                                                    <td class="tableiami" id="mar_ind22"></td>
                                                    <td class="tableiami" id="abr_ind22"></td>
                                                    <td class="tableiami" id="may_ind22"></td>
                                                    <td class="tableiami" id="jun_ind22"></td>
                                                    <td class="tableiami" id="jul_ind22"></td>
                                                    <td class="tableiami" id="agp_ind22"></td>
                                                    <td class="tableiami" id="sep_ind22"></td>
                                                    <td class="tableiami" id="oct_ind22"></td>
                                                    <td class="tableiami" id="nov_ind22"></td>
                                                    <td class="tableiami" id="dic_ind22"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 23: Consultas a servicios de urgencias antes de la semana 40 de edad gestacional</th>
                                                    <td class="tableiami" id="ene_ind23"></td>
                                                    <td class="tableiami" id="feb_ind23"></td>
                                                    <td class="tableiami" id="mar_ind23"></td>
                                                    <td class="tableiami" id="abr_ind23"></td>
                                                    <td class="tableiami" id="may_ind23"></td>
                                                    <td class="tableiami" id="jun_ind23"></td>
                                                    <td class="tableiami" id="jul_ind23"></td>
                                                    <td class="tableiami" id="agp_ind23"></td>
                                                    <td class="tableiami" id="sep_ind23"></td>
                                                    <td class="tableiami" id="oct_ind23"></td>
                                                    <td class="tableiami" id="nov_ind23"></td>
                                                    <td class="tableiami" id="dic_ind23"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 24: Deserción 1 año de edad corregida</th>
                                                    <td class="tableiami" id="ene_ind24"></td>
                                                    <td class="tableiami" id="feb_ind24"></td>
                                                    <td class="tableiami" id="mar_ind24"></td>
                                                    <td class="tableiami" id="abr_ind24"></td>
                                                    <td class="tableiami" id="may_ind24"></td>
                                                    <td class="tableiami" id="jun_ind24"></td>
                                                    <td class="tableiami" id="jul_ind24"></td>
                                                    <td class="tableiami" id="agp_ind24"></td>
                                                    <td class="tableiami" id="sep_ind24"></td>
                                                    <td class="tableiami" id="oct_ind24"></td>
                                                    <td class="tableiami" id="nov_ind24"></td>
                                                    <td class="tableiami" id="dic_ind24"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 25: Optometría</th>
                                                    <td class="tableiami" id="ene_ind25"></td>
                                                    <td class="tableiami" id="feb_ind25"></td>
                                                    <td class="tableiami" id="mar_ind25"></td>
                                                    <td class="tableiami" id="abr_ind25"></td>
                                                    <td class="tableiami" id="may_ind25"></td>
                                                    <td class="tableiami" id="jun_ind25"></td>
                                                    <td class="tableiami" id="jul_ind25"></td>
                                                    <td class="tableiami" id="agp_ind25"></td>
                                                    <td class="tableiami" id="sep_ind25"></td>
                                                    <td class="tableiami" id="oct_ind25"></td>
                                                    <td class="tableiami" id="nov_ind25"></td>
                                                    <td class="tableiami" id="dic_ind25"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 26: Audiometría</th>
                                                    <td class="tableiami" id="ene_ind26"></td>
                                                    <td class="tableiami" id="feb_ind26"></td>
                                                    <td class="tableiami" id="mar_ind26"></td>
                                                    <td class="tableiami" id="abr_ind26"></td>
                                                    <td class="tableiami" id="may_ind26"></td>
                                                    <td class="tableiami" id="jun_ind26"></td>
                                                    <td class="tableiami" id="jul_ind26"></td>
                                                    <td class="tableiami" id="agp_ind26"></td>
                                                    <td class="tableiami" id="sep_ind26"></td>
                                                    <td class="tableiami" id="oct_ind26"></td>
                                                    <td class="tableiami" id="nov_ind26"></td>
                                                    <td class="tableiami" id="dic_ind26"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 27: Desarrollo neurológico y desarrollo psicomotor a 1 año de edad corregida</th>
                                                    <td class="tableiami" id="ene_ind27"></td>
                                                    <td class="tableiami" id="feb_ind27"></td>
                                                    <td class="tableiami" id="mar_ind27"></td>
                                                    <td class="tableiami" id="abr_ind27"></td>
                                                    <td class="tableiami" id="may_ind27"></td>
                                                    <td class="tableiami" id="jun_ind27"></td>
                                                    <td class="tableiami" id="jul_ind27"></td>
                                                    <td class="tableiami" id="agp_ind27"></td>
                                                    <td class="tableiami" id="sep_ind27"></td>
                                                    <td class="tableiami" id="oct_ind27"></td>
                                                    <td class="tableiami" id="nov_ind27"></td>
                                                    <td class="tableiami" id="dic_ind27"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 28: Vacunación completa a 1 año de edad corregida</th>
                                                    <td class="tableiami" id="ene_ind28"></td>
                                                    <td class="tableiami" id="feb_ind28"></td>
                                                    <td class="tableiami" id="mar_ind28"></td>
                                                    <td class="tableiami" id="abr_ind28"></td>
                                                    <td class="tableiami" id="may_ind28"></td>
                                                    <td class="tableiami" id="jun_ind28"></td>
                                                    <td class="tableiami" id="jul_ind28"></td>
                                                    <td class="tableiami" id="agp_ind28"></td>
                                                    <td class="tableiami" id="sep_ind28"></td>
                                                    <td class="tableiami" id="oct_ind28"></td>
                                                    <td class="tableiami" id="nov_ind28"></td>
                                                    <td class="tableiami" id="dic_ind28"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 29: Lactancia Materna a los 3 meses</th>
                                                    <td class="tableiami" id="ene_ind29"></td>
                                                    <td class="tableiami" id="feb_ind29"></td>
                                                    <td class="tableiami" id="mar_ind29"></td>
                                                    <td class="tableiami" id="abr_ind29"></td>
                                                    <td class="tableiami" id="may_ind29"></td>
                                                    <td class="tableiami" id="jun_ind29"></td>
                                                    <td class="tableiami" id="jul_ind29"></td>
                                                    <td class="tableiami" id="agp_ind29"></td>
                                                    <td class="tableiami" id="sep_ind29"></td>
                                                    <td class="tableiami" id="oct_ind29"></td>
                                                    <td class="tableiami" id="nov_ind29"></td>
                                                    <td class="tableiami" id="dic_ind29"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 30: Lactancia Materna a los 6 meses</th>
                                                    <td class="tableiami" id="ene_ind30"></td>
                                                    <td class="tableiami" id="feb_ind30"></td>
                                                    <td class="tableiami" id="mar_ind30"></td>
                                                    <td class="tableiami" id="abr_ind30"></td>
                                                    <td class="tableiami" id="may_ind30"></td>
                                                    <td class="tableiami" id="jun_ind30"></td>
                                                    <td class="tableiami" id="jul_ind30"></td>
                                                    <td class="tableiami" id="agp_ind30"></td>
                                                    <td class="tableiami" id="sep_ind30"></td>
                                                    <td class="tableiami" id="oct_ind30"></td>
                                                    <td class="tableiami" id="nov_ind30"></td>
                                                    <td class="tableiami" id="dic_ind30"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 31: Re hospitalización a 1 año de edad corregida</th>
                                                    <td class="tableiami" id="ene_ind31"></td>
                                                    <td class="tableiami" id="feb_ind31"></td>
                                                    <td class="tableiami" id="mar_ind31"></td>
                                                    <td class="tableiami" id="abr_ind31"></td>
                                                    <td class="tableiami" id="may_ind31"></td>
                                                    <td class="tableiami" id="jun_ind31"></td>
                                                    <td class="tableiami" id="jul_ind31"></td>
                                                    <td class="tableiami" id="agp_ind31"></td>
                                                    <td class="tableiami" id="sep_ind31"></td>
                                                    <td class="tableiami" id="oct_ind31"></td>
                                                    <td class="tableiami" id="nov_ind31"></td>
                                                    <td class="tableiami" id="dic_ind31"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 32: Mortalidad a 1 año de edad corregida</th>
                                                    <td class="tableiami" id="ene_ind32"></td>
                                                    <td class="tableiami" id="feb_ind32"></td>
                                                    <td class="tableiami" id="mar_ind32"></td>
                                                    <td class="tableiami" id="abr_ind32"></td>
                                                    <td class="tableiami" id="may_ind32"></td>
                                                    <td class="tableiami" id="jun_ind32"></td>
                                                    <td class="tableiami" id="jul_ind32"></td>
                                                    <td class="tableiami" id="agp_ind32"></td>
                                                    <td class="tableiami" id="sep_ind32"></td>
                                                    <td class="tableiami" id="oct_ind32"></td>
                                                    <td class="tableiami" id="nov_ind32"></td>
                                                    <td class="tableiami" id="dic_ind32"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 33: Crecimiento en peso, talla y perímetro cefálico 1 año de edad corregida niños</th>
                                                    <td class="tableiami" id="ene_ind33"></td>
                                                    <td class="tableiami" id="feb_ind33"></td>
                                                    <td class="tableiami" id="mar_ind33"></td>
                                                    <td class="tableiami" id="abr_ind33"></td>
                                                    <td class="tableiami" id="may_ind33"></td>
                                                    <td class="tableiami" id="jun_ind33"></td>
                                                    <td class="tableiami" id="jul_ind33"></td>
                                                    <td class="tableiami" id="agp_ind33"></td>
                                                    <td class="tableiami" id="sep_ind33"></td>
                                                    <td class="tableiami" id="oct_ind33"></td>
                                                    <td class="tableiami" id="nov_ind33"></td>
                                                    <td class="tableiami" id="dic_ind33"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 34: Crecimiento en peso, talla y perímetro cefálico 1 año de edad corregida niñas</th>
                                                    <td class="tableiami" id="ene_ind34"></td>
                                                    <td class="tableiami" id="feb_ind34"></td>
                                                    <td class="tableiami" id="mar_ind34"></td>
                                                    <td class="tableiami" id="abr_ind34"></td>
                                                    <td class="tableiami" id="may_ind34"></td>
                                                    <td class="tableiami" id="jun_ind34"></td>
                                                    <td class="tableiami" id="jul_ind34"></td>
                                                    <td class="tableiami" id="agp_ind34"></td>
                                                    <td class="tableiami" id="sep_ind34"></td>
                                                    <td class="tableiami" id="oct_ind34"></td>
                                                    <td class="tableiami" id="nov_ind34"></td>
                                                    <td class="tableiami" id="dic_ind34"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IND 35: Accesibilidad de los padres (familia) a la Unidad de Cuidado Neonatal</th>
                                                    <td class="tableiami" id="ene_ind35"></td>
                                                    <td class="tableiami" id="feb_ind35"></td>
                                                    <td class="tableiami" id="mar_ind35"></td>
                                                    <td class="tableiami" id="abr_ind35"></td>
                                                    <td class="tableiami" id="may_ind35"></td>
                                                    <td class="tableiami" id="jun_ind35"></td>
                                                    <td class="tableiami" id="jul_ind35"></td>
                                                    <td class="tableiami" id="agp_ind35"></td>
                                                    <td class="tableiami" id="sep_ind35"></td>
                                                    <td class="tableiami" id="oct_ind35"></td>
                                                    <td class="tableiami" id="nov_ind35"></td>
                                                    <td class="tableiami" id="dic_ind35"></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                                    
                                                
                                                </div>


                                                    </div>
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
            </div>
 <script>
     $(document).ready(function(){
       $('.mm-active').removeClass('mm-active');
       $("#menuCumplimientoCanguro").addClass("mm-active");

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

        $('#hospital').change(function()
        {
            var hospital = $('#hospital').val();
            var values = {};
            if (hospital=='')
            {
                return;
            }

            $('table > tbody > tr').each(function() {
                $(this).children('td').each(function(){
                    $(this).html('');
                    $(this).css("background-color", "white");                    
                })

                });
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'cumplimientoCanguro',
                    hospital:hospital
                },
                success: function(rta)
                {
                    for (var i in rta.dataMes01)
                    {
                        if (rta.dataMes01[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes01[i]).toFixed(2);
                            $('#ene_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes02)
                    {
                        if (rta.dataMes02[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes02[i]).toFixed(2);
                            $('#feb_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes03)
                    {
                        if (rta.dataMes03[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes03[i]).toFixed(2);
                            $('#mar_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes04)
                    {
                        if (rta.dataMes04[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes04[i]).toFixed(2);
                            $('#abr_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes05)
                    {
                        if (rta.dataMes05[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes05[i]).toFixed(2);
                            $('#may_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes06)
                    {
                        if (rta.dataMes06[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes06[i]).toFixed(2);
                            $('#jun_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes07)
                    {
                        if (rta.dataMes07[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes07[i]).toFixed(2);
                            $('#jul_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes08)
                    {
                        if (rta.dataMes08[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes08[i]).toFixed(2);
                            $('#ago_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes09)
                    {
                        if (rta.dataMes09[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes09[i]).toFixed(2);
                            $('#sep_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes10)
                    {
                        if (rta.dataMes10[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes10[i]).toFixed(2);
                            $('#oct_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes11)
                    {
                        if (rta.dataMes11[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes11[i]).toFixed(2);
                            $('#nov_ind'+i).html(valor+"%");
                        }
                    } 
                    for (var i in rta.dataMes12)
                    {
                        if (rta.dataMes12[i]!== null)
                        {
                            var valor = parseFloat(rta.dataMes12[i]).toFixed(2);
                            $('#dic_ind'+i).html(valor+"%");
                        }
                    }  
                    
                    $('table > tbody > tr').each(function() {
                        $(this).children('td').each(function(){
                            var data = $(this).html();
                            var res = data.replace("%",""); 
                            console.warn(res);

                            if (res == '')
                            {
                                $(this).css("background-color", "white");
                                $(this).css("color", "black"); 
                                
                            }
                            else if (res >= 0 && res <= 59)
                            {
                                $(this).css("background-color", "red");
                                $(this).css("color", "white");
                                
                            }
                            else if (res >= 60 && res <= 79)
                            {
                                $(this).css("background-color", "yellow");
                                $(this).css("color", "black");

                            }
                            else if (res >= 80)
                            {
                                $(this).css("background-color", "green");
                                $(this).css("color", "white");
                            }
                            else if (res == '')
                            {
                            }
                      
                        })

                        });

                    return false;

                },
                error: function(objAjax, textStatus, strErrorThrown ){
                    if(typeof callbackError != 'undefined'){
                        callbackError(textStatus);
                    }else{
                        alert('Error en la conexion con el servidor: '+ textStatus);
                    }
                }
            });
           
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