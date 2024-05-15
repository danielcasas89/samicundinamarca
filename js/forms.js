$(document).on("change", ".btn-file :file", function () {
  var input = $(this);
  input.trigger("fileselect");
});

$(document).ready(function () {
  $(".btn-file :file").on("fileselect", function (event, numFiles, label) {
    showThumbnail($(this).attr("id") + "_thumbnail", this.files[0]);
  });
  //INICICALIZAR LA DB
  DbOffline.init(function () {
    //OBTENEMOS EL ID DE ENCUESTA PASADO POR URL
    var paramsGet = getGET();
    idEncuesta = paramsGet["idEncuesta"];
    //OBTENEMOS EL REGISTRO DE LA ENCUESTA DE LA DB
    //var registro = getObjectFromDB(idEncuesta);

    DbOffline.get(idEncuesta, function (registro) {
      //console.debug("registro");
      //console.debug(registro);

      //PARA EL STEP 1 SE DESHABILITA LA FLECHA HACIA ATRAS
      if (step == 1) {
        initStep(registro);
        $("#anterior").addClass("disabled");
      }

      //SI ESTAMOS EN EL ULTIMO PASO DESHABILITAMOS EL BOTON SIGUIENTE
      if (step == numSteps) {
        $("#siguiente").addClass("disabled");
        //MOSTRAMOS EL BOTON FINALIZAR
        $("#finalizar").show();
        $("#finalizar").click(function (e) {
          e.preventDefault();
          //GUARDAMOS LA SECCION Y LA DEJA EN ESTADO FINALIZADA
          guardarSeccion("listarEncuestas.html#js_", true);
        });
        //MOSTRAMOS EL BOTON FINALIZAR
        $("#guardar_cambios").show();
        $("#guardar_cambios").click(function (e) {
          e.preventDefault();
          //GUARDAMOS LA SECCION Y LA DEJA EN ESTADO FINALIZADA
          guardarSeccion("listarEncuestas.html#js_", false);
        });
      }

      //SETEAMOS CADA UNO DE LOS INPUT DEL FORMULARIO CON EL VALOR DEL REGISTRO
      setValues(registro);

      //A LOS PAGINADORES COLOCAMOS EL HREF
      $(".item_paginador").each(function (index, element) {
        var jqElemento = $(element);
        var num = jqElemento.text().trim();
        //COLOCAMOS COMO ACTIVA LA PAGINA ACTUAL
        if (num == step) {
          jqElemento.attr("href", "#").parent().addClass("active");
          jqElemento.click(function (e) {
            e.preventDefault();
          });
        } else {
          //COLOCAMOS LAS URLs RESPECTIVAS
          jqElemento.attr(
            "href",
            "encuesta" + num + ".html#js_?idEncuesta=" + idEncuesta
          );
          jqElemento.click(function (e) {
            e.preventDefault();
            guardarSeccion($(this).attr("href"));
          });
        }
      });
      $("#anterior")
        .attr(
          "href",
          step != 1
            ? "encuesta" + (step - 1) + ".html#js_?idEncuesta=" + idEncuesta
            : "#"
        )
        .click(function (e) {
          e.preventDefault();
          if (step != 1) {
            guardarSeccion($(this).attr("href"));
          }
        });
      $("#siguiente")
        .attr(
          "href",
          step != numSteps
            ? "encuesta" + (step + 1) + ".html#js_?idEncuesta=" + idEncuesta
            : "#"
        )
        .click(function (e) {
          e.preventDefault();
          if (step != numSteps) {
            guardarSeccion($(this).attr("href"));
          }
        });
      DbOffline.getConfig(function (config) {
        $("#nombre_usuario").html(config.nombre);
        $("#perfil_usuario").html(config.perfil);
        if (typeof initSection != "undefined") initSection(registro, config);
      });
      //DbOffline.printDB();
    });
  });
});
