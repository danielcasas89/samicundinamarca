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
                                    <div>Configuración de Cuenta
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="main-card mb-3 card">

                                    <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                        <div class="main-card col-md-12 card">
                                        <h5 class="card-title"></h5>
                                        <div class="card-header">Cambiar Clave
                                    </div>
                                            <div class="card-body">

                                    <div class="alert alert-success fade show saveSuccess" role="alert">Contraseña actualizada correctamente.</div>
                                    <div class="alert alert-warning fade show saveError" role="alert"></div>
                                                <form id="cambioClaveform">
                                                <div class="form-row">
                                                    <div class=" form-group col-md-12 regis">
                                                        <label for="claveActual" class="">Clave Actual:</label>
                                                        <input name="claveActual" id="claveActual" placeholder="" type="password" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-12 regis">
                                                        <label for="nuevaClave" class="">Nueva Clave:</label>
                                                        <input name="nuevaClave" id="nuevaClave" placeholder="" type="password" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-12 regis">
                                                        <label for="nuevaClave2" class="">Repita Nueva Clave:</label>
                                                        <input name="nuevaClave2" id="nuevaClave2" placeholder="" type="password" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <button type="submit" id="cambiarClavebtn" class="mt-2 btn btn-primary">Cambiar Clave</button>
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

        $("#cambioClaveform").submit(function(e){

            $(".saveError").hide();
            e.preventDefault();
            var claveActual = $("#claveActual").val();
            var nuevaClave = $("#nuevaClave").val();
            var nuevaClave2 = $("#nuevaClave2").val();
            if (nuevaClave != nuevaClave2)
            {
                $(".saveError").html("Claves no coinciden.");
                $(".saveError").show();
                return;
            }
            else if (nuevaClave.length < 6)
            {
                $(".saveError").html();
                $(".saveError").html("Nueva clave debe contener al menos 6 caracteres.");
                $(".saveError").show();
            }
            else
            {
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'cambiarClaveActual',
                        claveActual: claveActual,
                        nuevaClave: nuevaClave
                    },
                    success: function(rta){
                        if(rta.type =="info")
                        {
                            $(".saveSuccess").show();
                            $('html, body').animate({scrollTop: '0px'}, 0);
                            $('#cambioClaveform')[0].reset();
                        }
                        else
                        {
                            $(".saveError").html();
                            $(".saveError").html(rta.msj);
                            $(".saveError").show();
                        }
                    },
                    error: function(objAjax, textStatus, strErrorThrown ){
                    }
                });

            }
            return false;
        });
});

 </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>