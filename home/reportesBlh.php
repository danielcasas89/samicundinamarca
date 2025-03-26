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
                                    <div>Bancos de Leche Humana

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
                                    <iframe title="SAMI_BLH" width="1100" height="500" src="https://app.powerbi.com/view?r=eyJrIjoiMjAzZDRhZDYtMGFkOC00MWU2LWE4ZjMtMjg0NWU3Njk3ZGM0IiwidCI6IjkwMjliMTUwLTg4NjQtNDBiNS1iYTM1LTQ1MGFmYTE5ZWJkZCJ9&pageName=ReportSection050526d2a0647c1e66ec" frameborder="0" allowFullScreen="true"></iframe>

                                    </div>
                                </div>
                            </div>


 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuReportesBlh").addClass("mm-active");

});

 </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>