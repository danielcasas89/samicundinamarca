<?php
session_start();
if(isset($_SESSION['usuario_sesion'])){
	@require '../php/header.php';
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
                                    <div>Indicadores IAMII
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Estrategia Instituciones Amigas de la Mujer y la Infancia Integral IAMII
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-12 card">
                                            <div class="card-body">
                                    <div class="card-body">
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami1.php" style="color: white;text-decoration: none;">PASO 1. Disponer de una política institucional para la promoción, protección, atención y apoyo en salud y nutrición a la población materna e infantil.</a></button>
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami2.php" style="color: white;text-decoration: none;">PASO 2. Capacitar a todo el personal que atiende la población materna e infantil, de tal forma que esté en condiciones de poner en práctica la política IAMII institucional de salud y nutrición en favor de la mujer y la infancia.</a></button>
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami3.php" style="color: white;text-decoration: none;">PASO 3. Brindar a las mujeres gestantes y sus familias, información, educación y atención oportuna y pertinente para que puedan vivir satisfactoriamente su gestación, prepararse para el parto, el puerperio, la lactancia materna y la crianza.</a></button>
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami4.php" style="color: white;text-decoration: none;">PASO 4. Garantizar la atención del trabajo de parto y el parto con calidad y calidez acompañada en lo posible de una persona significativa para la madre, dentro de un ambiente de respeto, libre de intervenciones innecesarias,  favoreciendo el contacto piel a piel al nacer y el inicio temprano de la lactancia materna en la primera hora.</a></button>
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami5.php" style="color: white;text-decoration: none;">PASO 5. Ofrecer orientación y ayuda efectiva a las madres, padres y otros cuidadores sobre la promoción, protección y atención en salud y nutrición de las madres y de las niñas y los niños recién nacidos, durante el posparto.</a></button>
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami6.php" style="color: white;text-decoration: none;">PASO 6. Promover, proteger y dar apoyo efectivo a las madres y sus familias para poner en práctica la lactancia materna exclusiva durante los primeros seis meses de vida, y con alimentación complementaria adecuada hasta los dos años de edad o más.</a></button>
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami7.php" style="color: white;text-decoration: none;">PASO 7. Favorecer el alojamiento conjunto de la madre y el niño o niña incluso en caso de hospitalización de alguno de los dos.</a></button>
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami8.php" style="color: white;text-decoration: none;">PASO 8. Proveer atención integral en salud y nutrición para niños y niñas en primera infancia.</a></button>
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami9.php" style="color: white;text-decoration: none;">PASO 9. Garantizar atención con calidad y calidez en todos sus servicios partiendo del reconocimiento de las usuarias y usuarios de los servicios como sujetos de derechos, promoviendo siempre el respeto a la diferencia, la participación y el trato digno para toda la población.</a></button>
                                            <button class="mb-2 mr-2 btn btn-secondary btn-lg btn-block" style="padding: 15px;"><a href="iami10.php" style="color: white;text-decoration: none;">PASO 10. Disponer de mecanismos y estrategias de apoyo institucional y comunitario que favorezcan la continuidad de las acciones más allá de los servicios institucionales, con el fin de favorecer la salud y la nutrición materna e infantil.</a></button>
                                        </div>

                                        </div>
                                        </div>

                                        </div>
                                        </div>
                                        </div>
 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuIndiami").addClass("mm-active");

});

 </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>