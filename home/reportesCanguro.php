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
                                    <div>Programa Madre Canguro

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Reporte
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                    <iframe title="SAMI_PMC" width="1200" height="400" src="https://app.powerbi.com/view?r=eyJrIjoiMzM0YzQzZmEtYTczMi00MWEzLWI1MmItNjJlMjEzNTRiMWNiIiwidCI6IjlkMzQ5ZjhiLTdmNzAtNGRmMC1hYjBmLTY0ZTA2YTFlNWM5MyIsImMiOjR9" frameborder="0" allowFullScreen="true"></iframe>

                                    </div>
                                </div>
                            </div>


 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuReporteCanguro").addClass("mm-active");

});

 </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>