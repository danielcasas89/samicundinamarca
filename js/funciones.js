function ajax(procesador, variables, panel, accion) {
  p = "#" + panel;
  $.post(procesador, variables, function (resultado) {
    if (accion == "mostrar") {
      $(p).html(resultado);
      xpos = screen.availWidth / 4;
      ypos = screen.availHeight / 3;
      $(p).css({
        left: $(document).scrollLeft() + xpos + "px",
        top: $(document).scrollTop() + ypos + "px",
      });
      $(p).show(1000);
    }
    if (accion == "borrar") {
      $(p).hide(1000);
    }
    if (accion == "evaluar") {
      eval(resultado);
    }
    if (accion == "normal") {
      $(p).html(resultado);
    }
  });
}
const autenticar = function () {
  $(".alertLogin").hide();
  var data = {
    usuario: $("#usuario").val(),
    password: $("#password").val(),
    token: $("#token").val(),
  };
  $.ajax({
    url: "start_session.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: data,
    success: function (rta) {
      if (rta.type == "info") {
        window.location = "home";
      } else {
        $(".alertLogin").html(rta.msg);
        $(".alertLogin").show();
      }
    },
    error: function (rta) {
      console.debug(rta);
      alert(rta);
    },
  });
};

$(document).ready(function () {
  function listarHospitales() {
    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "listarHospitalUsuario",
      },
      success: function (rta) {
        console.warn(rta);
        if (rta.perfil == "IAMII") {
          $("#mostrarHospital").html(rta.data[0].nombre_hospital);
          $("#hospital").append(
            "<option value='" +
              rta.data[0].id_hospital +
              "'>" +
              rta.data[0].nombre_hospital +
              "</option>"
          );
          $("#hospital").prop("disabled", true);
        }
        $("#hospital").trigger("change");
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
  }

  $("#hospital").change(function () {
    var hospital = $("#hospital").val();
    const currentYear = new Date();

    var values = {};
    if (hospital == "") {
      return;
    }

    $("table > tbody > tr").each(function () {
      $(this)
        .children("td")
        .each(function () {
          $(this).html("");
          $(this).css("background-color", "white");
        });
    });
    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "cumplimientoIami",
        hospital: hospital,
        year: currentYear.getFullYear(),
      },
      success: function (rta) {
        console.warn("cumplimientoIami");
        console.warn(rta);
        $("#dilig1").html(
          rta.dataDiligTrimestre1.diligenciamiento.toFixed(1) + "%"
        );
        $("#dilig2").html(
          rta.dataDiligTrimestre2.diligenciamiento.toFixed(1) + "%"
        );
        $("#dilig3").html(
          rta.dataDiligTrimestre3.diligenciamiento.toFixed(1) + "%"
        );
        $("#dilig4").html(
          rta.dataDiligTrimestre4.diligenciamiento.toFixed(1) + "%"
        );
        $("#paso1tr1").html(
          rta.dataPaso1Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso1tr2").html(
          rta.dataPaso1Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso1tr3").html(
          rta.dataPaso1Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso1tr4").html(
          rta.dataPaso1Trimestre4.cumplimiento.toFixed(1) + "%"
        );
        $("#paso2tr1").html(
          rta.dataPaso2Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso2tr2").html(
          rta.dataPaso2Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso2tr3").html(
          rta.dataPaso2Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso2tr4").html(
          rta.dataPaso2Trimestre4.cumplimiento.toFixed(1) + "%"
        );
        $("#paso3tr1").html(
          rta.dataPaso3Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso3tr2").html(
          rta.dataPaso3Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso3tr3").html(
          rta.dataPaso3Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso3tr4").html(
          rta.dataPaso3Trimestre4.cumplimiento.toFixed(1) + "%"
        );
        $("#paso4tr1").html(
          rta.dataPaso4Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso4tr2").html(
          rta.dataPaso4Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso4tr3").html(
          rta.dataPaso4Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso4tr4").html(
          rta.dataPaso4Trimestre4.cumplimiento.toFixed(1) + "%"
        );
        $("#paso5tr1").html(
          rta.dataPaso5Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso5tr2").html(
          rta.dataPaso5Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso5tr3").html(
          rta.dataPaso5Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso5tr4").html(
          rta.dataPaso5Trimestre4.cumplimiento.toFixed(1) + "%"
        );
        $("#paso6tr1").html(
          rta.dataPaso6Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso6tr2").html(
          rta.dataPaso6Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso6tr3").html(
          rta.dataPaso6Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso6tr4").html(
          rta.dataPaso6Trimestre4.cumplimiento.toFixed(1) + "%"
        );
        $("#paso7tr1").html(
          rta.dataPaso7Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso7tr2").html(
          rta.dataPaso7Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso7tr3").html(
          rta.dataPaso7Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso7tr4").html(
          rta.dataPaso7Trimestre4.cumplimiento.toFixed(1) + "%"
        );
        $("#paso8tr1").html(
          rta.dataPaso8Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso8tr2").html(
          rta.dataPaso8Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso8tr3").html(
          rta.dataPaso8Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso8tr4").html(
          rta.dataPaso8Trimestre4.cumplimiento.toFixed(1) + "%"
        );
        $("#paso9tr1").html(
          rta.dataPaso9Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso9tr2").html(
          rta.dataPaso9Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso9tr3").html(
          rta.dataPaso9Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso9tr4").html(
          rta.dataPaso9Trimestre4.cumplimiento.toFixed(1) + "%"
        );
        $("#paso10tr1").html(
          rta.dataPaso10Trimestre1.cumplimiento.toFixed(1) + "%"
        );
        $("#paso10tr2").html(
          rta.dataPaso10Trimestre2.cumplimiento.toFixed(1) + "%"
        );
        $("#paso10tr3").html(
          rta.dataPaso10Trimestre3.cumplimiento.toFixed(1) + "%"
        );
        $("#paso10tr4").html(
          rta.dataPaso10Trimestre4.cumplimiento.toFixed(1) + "%"
        );

        $("table > tbody > tr").each(function () {
          $(this)
            .children("td")
            .each(function () {
              var data = $(this).html();
              var res = data.replace("%", "");
              if (res == 0.0) {
                $(this).css("background-color", "white");
                $(this).css("color", "black");
              } else if (res > 0 && res <= 59) {
                $(this).css("background-color", "rgb(241 87 87)");
                $(this).css("color", "white");
              } else if (res >= 60 && res <= 79) {
                $(this).css("background-color", "yellow");
                $(this).css("color", "black");
              } else if (res >= 80) {
                $(this).css("background-color", "rgb(74 171 74)");
                $(this).css("color", "white");
              }
            });
        });
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });

    return false;
  });

  // listarHospitales();

  $("#formulario").submit(function (ev) {
    ev.preventDefault();
    autenticar();
  });

  $("#registro_usuarias_sala").submit(function (e) {
    var values = {};
    $.each($("#registro_usuarias_sala").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarUsuariaSala",
        tabla: "core__registro_sala",
        campos: values,
      },
      success: function (rta) {
        console.warn(rta);
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_usuarias_sala")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_curva").submit(function (e) {
    var values = {};
    $.each($("#registro_curva").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarCurva",
        tabla: "core__registro_curva",
        campos: values,
      },
      success: function (rta) {
        console.warn(rta);
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_curva")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_beneficiarios").submit(function (e) {
    var values = {};
    $.each($("#registro_beneficiarios").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarBeneficiario",
        tabla: "core__registro_beneficiario",
        campos: values,
      },
      success: function (rta) {
        console.warn(rta);
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_beneficiarios")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_datos_usuario").submit(function (e) {
    var values = {};
    $.each($("#registro_datos_usuario").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarDatosUsuario",
        tabla: "gestion__usuarios",
        campos: values,
      },
      success: function (rta) {
        console.warn(rta);
        if (rta.type == "info") {
          console.warn(rta);
          /* $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_beneficiarios")[0].reset();
          $(".saveSuccess").show();*/
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_fases_canguro").submit(function (e) {
    var values = {};
    $.each($("#registro_fases_canguro").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });
    values["fases"] = $("#myMulti").val();
    values["hospital"] = $("#hospital").val();

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarFasesCanguro",
        tabla: "core__fases_canguro",
        campos: values,
      },
      success: function (rta) {
        console.warn(rta);
        //return false;
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_fases_canguro")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_temperaturas").submit(function (e) {
    var values = {};
    $.each($("#registro_temperaturas").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });

    var temp_actual = parseFloat($("#temp_actual").val());
    var temp_minima = parseFloat($("#temp_minima").val());
    var temp_maxima = parseFloat($("#temp_maxima").val());

    if (temp_actual > temp_maxima) {
      alert("La temperatura actual no debe ser mayor que la maxima");
      return false;
    } else if (temp_minima > temp_actual) {
      alert("La temperatura minima no debe ser mayor que la actual");
      return false;
    }

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarTemperatura",
        tabla: "core__temperaturas",
        campos: values,
      },
      success: function (rta) {
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_temperaturas")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_equipos").submit(function (e) {
    var values = {};
    $.each($("#registro_equipos").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarEquipos",
        tabla: "core__equipos",
        campos: values,
      },
      success: function (rta) {
        console.warn(rta);
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_equipos")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_donantes_sala").submit(function (e) {
    var values = {};
    $.each($("#registro_donantes_sala").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarDonanteBLHSala",
        tabla: "core__registro_blh",
        campos: values,
      },
      success: function (rta) {
        console.warn(rta);
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_donantes_sala")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_usuarios").submit(function (e) {
    $(".saveError").hide();
    var values = {};
    $.each($("#registro_usuarios").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });
    values["hospital"] = $("#hospital").val();
    if ($("#password").val() != $("#password2").val()) {
      $(".saveError").show();
      e.preventDefault();
      return false;
    } else {
      $.ajax({
        url: "../php/services/Front.php",
        type: "POST",
        async: true,
        dataType: "json",
        data: {
          command: "registrarUsuarioSistema",
          tabla: "core__registro_blh",
          campos: values,
        },
        success: function (rta) {
          if (rta.type == "info") {
            $("html, body").animate({ scrollTop: "0px" }, 0);
            $("#registro_usuarios")[0].reset();
            $(".saveSuccess").show();
          } else {
            alert("Error enviando el formato. Consulte al administrador");
          }
        },
        error: function (objAjax, textStatus, strErrorThrown) {
          //console.debug(textStatus);
          if (typeof callbackError != "undefined") {
            callbackError(textStatus);
          } else {
            alert("Error en la conexion con el servidor: " + textStatus);
          }
        },
      });
      e.preventDefault();
      return false;
    }
  });

  $("#registro_procesamiento").submit(function (e) {
    var values = {};
    $.each($("#registro_procesamiento").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });
    values["idFrasco"] = $("#frasco1").val();

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarProcesamientoBLH",
        tabla: "core__procesamiento_blh",
        campos: values,
      },
      success: function (rta) {
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_procesamiento")[0].reset();
          $(".saveSuccess").show();

          location.reload();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_pool").submit(function (e) {
    var values = {};
    $.each($("#registro_pool").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });
    if (values["pool"] == "NO") {
      values["resultado"] = $("#resultado").val();
      values["kcal"] = $("#kcal").val();
      values["tipoLeche"] = $("#tipoLeche").val();
    }
    values["cantidad"] = $("#cantidad").val();

    console.warn(values);
    //return false;

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarPoolBLH",
        tabla: "core__pool_blh",
        campos: values,
      },
      success: function (rta) {
        if (rta.type == "info") {
          $("#numFrasco").html(rta.id);
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_pool")[0].reset();
          $(".saveSuccess").show();
          alert("Numero de Frasco: " + rta.id);
          location.reload();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_paso").submit(function (e) {
    var values = {};
    var paso = $("#paso").val();
    var ano = $("#ano").val();
    $(".progressBarIami").hide();
    $.each($("#registro_paso").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });
    values["hospital"] = $("#hospital").val();
    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarPasoIami",
        tabla: "core__indicador_iami",
        paso: paso,
        campos: values,
        ano: ano,
      },
      success: function (rta) {
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_paso")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_ind_canguro").submit(function (e) {
    var values = {};
    var paso = $("#paso").val();
    $(".progressBarIami").hide();
    $("#valor1").val(($("#ind1_1").val() / $("#ind1_2").val()) * 100);
    $("#valor2").val(($("#ind2_1").val() / $("#ind2_2").val()) * 100);
    $("#valor3").val(($("#ind3_1").val() / $("#ind3_2").val()) * 100);
    $("#valor4").val(($("#ind4_1").val() / $("#ind4_2").val()) * 100);
    $("#valor5").val(($("#ind5_1").val() / $("#ind5_2").val()) * 100);
    $("#valor6").val(($("#ind6_1").val() / $("#ind6_2").val()) * 100);
    $("#valor7").val(($("#ind7_1").val() / 24) * 100);
    $("#valor8").val(($("#ind8_1").val() / $("#ind8_2").val()) * 100);
    $("#valor9").val(($("#ind9_1").val() / $("#ind9_2").val()) * 100);
    $("#valor10").val(($("#ind10_1").val() / $("#ind10_2").val()) * 100);
    $("#valor11").val(($("#ind11_1").val() / $("#ind11_2").val()) * 100);
    $("#valor12").val(($("#ind12_1").val() / $("#ind12_2").val()) * 100);
    $("#valor13").val(($("#ind13_1").val() / $("#ind13_2").val()) * 100);
    $("#valor14").val(($("#ind14_1").val() / $("#ind14_2").val()) * 100);
    $("#valor15").val(($("#ind15_1").val() / $("#ind15_2").val()) * 100);
    $("#valor16").val(($("#ind16_1").val() / $("#ind16_2").val()) * 100);
    $("#valor17").val(($("#ind17_1").val() / $("#ind17_2").val()) * 100);
    $("#valor18").val(($("#ind18_1").val() / $("#ind18_2").val()) * 100);
    $("#valor19").val(($("#ind19_1").val() / $("#ind19_2").val()) * 100);
    $("#valor20").val(($("#ind20_1").val() / $("#ind20_2").val()) * 100);
    $("#valor21").val(($("#ind21_1").val() / $("#ind21_2").val()) * 100);
    $("#valor22").val(($("#ind22_1").val() / $("#ind22_2").val()) * 100);
    $("#valor23").val(($("#ind23_1").val() / $("#ind23_2").val()) * 100);
    $("#valor24").val(($("#ind24_1").val() / $("#ind24_2").val()) * 100);
    $("#valor25").val(($("#ind25_1").val() / $("#ind25_2").val()) * 100);
    $("#valor26").val(($("#ind26_1").val() / $("#ind26_2").val()) * 100);
    $("#valor27").val(($("#ind27_1").val() / $("#ind27_2").val()) * 100);
    $("#valor28").val(($("#ind28_1").val() / $("#ind28_2").val()) * 100);
    $("#valor29").val(($("#ind29_1").val() / $("#ind29_2").val()) * 100);
    $("#valor30").val(($("#ind30_1").val() / $("#ind30_2").val()) * 100);
    $("#valor31").val(($("#ind31_1").val() / $("#ind31_2").val()) * 100);
    $("#valor32").val(($("#ind32_1").val() / $("#ind32_2").val()) * 100);
    $("#valor33").val(($("#ind33_1").val() / $("#ind33_2").val()) * 100);
    $("#valor34").val(($("#ind34_1").val() / $("#ind34_2").val()) * 100);
    $("#valor35").val($("#ind35_1"));

    $.each($("#registro_ind_canguro").serializeArray(), function (i, field) {
      console.warn(field.value);
      if (field.value != "NaN") values[field.name] = field.value;
    });
    values["hospital"] = $("#hospital").val();
    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarIndicadorCanguro",
        tabla: "core__indicador_canguro",
        campos: values,
      },
      success: function (rta) {
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_ind_canguro")[0].reset();
          $(".saveSuccess").show();
          $(".progressBarCanguro").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_ind_blh").submit(function (e) {
    var values = {};
    $.each($("#registro_ind_blh").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });
    values["hospital"] = $("#hospital").val();

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarIndicadoresBLH",
        tabla: "core__indicador_BLH",
        campos: values,
      },
      success: function (rta) {
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_ind_blh")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_pasteurizacion").submit(function (e) {
    var values = {};
    $.each($("#registro_pasteurizacion").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });
    console.warn(values);

    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarPasteurizacionBLH",
        tabla: "core__pasteurizacion_blh",
        campos: values,
      },
      success: function (rta) {
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_pasteurizacion")[0].reset();
          $(".saveSuccess").show();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });

  $("#registro_datos_generales").submit(function (e) {
    var values = {};
    $.each(
      $("#registro_datos_generales").serializeArray(),
      function (i, field) {
        values[field.name] = field.value;
      }
    );
    values["hospital"] = $("#hospital").val();
    $.ajax({
      url: "../php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "registrarDatosGenerales",
        tabla: "core__datos_generales",
        campos: values,
      },
      success: function (rta) {
        if (rta.type == "info") {
          $("html, body").animate({ scrollTop: "0px" }, 0);
          $("#registro_datos_generales")[0].reset();
          $(".saveSuccess").show();
          location.reload();
        } else {
          alert("Error enviando el formato. Consulte al administrador");
        }
      },
      error: function (objAjax, textStatus, strErrorThrown) {
        //console.debug(textStatus);
        if (typeof callbackError != "undefined") {
          callbackError(textStatus);
        } else {
          alert("Error en la conexion con el servidor: " + textStatus);
        }
      },
    });
    e.preventDefault();
    return false;
  });
});

function ocultar_elemento(e) {
  x = "#" + e;
  $(x).hide(1000);
}

function validarMail(valor) {
  var filtro =
    /^[A-Za-z][A-Za-z0-9_.-]*@[A-Za-z0-9_-]+\.[A-Za-z0-9_.]+[A-za-z]$/;
  if (filtro.test(valor)) {
    return true;
  } else {
    return false;
  }
}

function validarNumerico(valor) {
  var filtro = /^[0-9]+$/;
  if (filtro.test(valor)) {
    return true;
  } else {
    return false;
  }
}

function validarCelular(valor) {
  var filtro = /^[0-9]10$/;
  if (filtro.test(valor)) {
    return true;
  } else {
    return false;
  }
}
