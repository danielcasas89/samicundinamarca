var accion = "";
var indexUpdate = null;

//////////////////////////////////////////////////////////////////////////////
//En familiares ya se encuentran los registros
function setListaInicial() {
  var mayorIndice = 0;
  for (var indice in regsContext[nameContext]["regs"]) {
    addRow(regsContext[nameContext]["regs"][indice]);

    if (
      mayorIndice < parseInt(regsContext[nameContext]["regs"][indice]["indice"])
    ) {
      mayorIndice = regsContext[nameContext]["regs"][indice]["indice"];
    }
  }
  regsContext[nameContext]["nextId"] = mayorIndice + 1;
}

function eliminar(id) {
  if (confirm("¿Realmente desea eliminar el registro?")) {
    $("#item_list_" + id).remove();
    for (var indexReg in regsContext[nameContext]["regs"]) {
      if (regsContext[nameContext]["regs"][indexReg].indice == id) {
        regsContext[nameContext]["regs"].splice(indexReg, 1);
        //delete regsContext[nameContext]['regs'][indexReg];
      }
    }
  }
}
//////////////////////////////////////////////////////////////////
var dialog,
  form,
  indice = 0,
  // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
  emailRegex =
    /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
  nombre = $("#nombre"),
  edad = $("#edad"),
  genero = $("#genero"),
  discapacidad = $("#discapacidad"),
  desplazado = $("#desplazado"),
  lgbtiq = $("#lgbtiq"),
  relacion = $("#relacion"),
  allFields = $([])
    .add(nombre)
    .add(edad)
    .add(genero)
    .add(discapacidad)
    .add(desplazado)
    .add(lgbtiq)
    .add(relacion),
  tips = $(".validateTips");

function updateTips(t) {
  tips.text(t).addClass("ui-state-highlight");
  setTimeout(function () {
    tips.removeClass("ui-state-highlight", 1500);
  }, 500);
}

function checkLength(o, n, min, max) {
  if (o.val().length > max || o.val().length < min) {
    o.addClass("ui-state-error");
    updateTips(
      "Length of " + n + " must be between " + min + " and " + max + "."
    );
    return false;
  } else {
    return true;
  }
}

//INSERTA UNA FILA, DEBE TENER EL ATTR indice
function addRow(objeto) {
  var htmlRow = "<tr id='item_list_" + objeto.indice + "' >";
  htmlRow += "<td>" + objeto["indice"] + "</td>";
  for (var indice in context[nameContext]) {
    if (objeto[context[nameContext][indice]] != undefined)
      htmlRow += "<td>" + objeto[context[nameContext][indice]] + "</td>";
    else htmlRow += "<td></td>";
  }
  htmlRow += getButtonOptions(objeto.indice) + "</tr>";
  $("#tableList tbody").append(htmlRow);
}

function updateRow(objeto) {
  var htmlRow = "<td>" + objeto["indice"] + "</td>";
  for (var indice in context[nameContext]) {
    if (objeto[context[nameContext][indice]] != undefined)
      htmlRow += "<td>" + objeto[context[nameContext][indice]] + "</td>";
    else htmlRow += "<td></td>";
  }
  htmlRow += getButtonOptions(objeto.indice);
  $("#item_list_" + objeto.indice).html(htmlRow);
}

function getButtonOptions(indice) {
  return (
    "<td><button class='btn btn-danger btn-xs' title='Eliminar' onclick=\"eliminar('" +
    indice +
    "')\" ><i class='fa fa-times'></i></button> <button class='btn btn-info btn-xs' title='Editar' onclick=\"editar('" +
    indice +
    "')\" ><i class='fa fa-pencil-square-o'></i></button></td>"
  );
}

//CUANDO SE OPRIME EL BOTON +
function addUser() {
  var valid = true;
  allFields.removeClass("ui-state-error");
  /*
      valid = valid && checkLength( name, "username", 3, 16 );
      valid = valid && checkLength( email, "email", 6, 80 );
      valid = valid && checkLength( password, "password", 5, 16 );
 
      valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );*/

  //OBTENEMOS VALORES DEL FORMULARIO
  var objeto = obtenerValoresDeFormContext();
  console.debug(context);
  console.debug(objeto);
  console.debug(regsContext);

  //Le damos un indice al objeto
  objeto["indice"] = regsContext[nameContext]["nextId"];

  //Incrementamos el nextId
  regsContext[nameContext]["nextId"]++;

  //ADICIONAMOS LA FILA
  addRow(objeto);
  //ADICIONAMOS EL REGISTRO
  regsContext[nameContext]["regs"].push(objeto);
  //CERRAMOS EL DIALOG
  closeDialog();
  accion = null;
  //console.debug(regsContext);
  return valid;
}

function updateUser() {
  var valid = true;
  allFields.removeClass("ui-state-error");

  //OBTENEMOS VALORES DEL FORMULARIO
  var objeto = obtenerValoresDeFormContext();
  for (var atts in objeto) {
    //console.debug(atts);
    //console.debug(objeto[atts]);
    //console.debug(regsContext[nameContext]['regs'][indexUpdate][atts]);
    regsContext[nameContext]["regs"][indexUpdate][atts] = objeto[atts];
  }

  //ADICIONAMOS LA FILA
  updateRow(regsContext[nameContext]["regs"][indexUpdate]);
  //CERRAMOS EL DIALOG
  closeDialog();
  accion = null;
  return valid;
}
//ABRE EL CUADRO DE DIALOGO
function editar(indice) {
  accion = "update";
  var indexElement = -1;
  for (var index in regsContext[nameContext]["regs"]) {
    if (regsContext[nameContext]["regs"][index].indice == indice) {
      indexElement = index;
      break;
    }
  }
  indexUpdate = index;
  setValoresDeFormContext(regsContext[nameContext]["regs"][index]);
  openDialog();
}

function setValoresDeFormContext(object) {
  for (var index in context[nameContext]) {
    var input = $("input[name=" + context[nameContext][index] + "]");
    if (input[0] == undefined)
      input = $("select[name=" + context[nameContext][index] + "]");
    if (input[0] == undefined)
      input = $("input:radio[name=" + context[nameContext][index] + "]");

    if (typeof object[context[nameContext][index]] == "undefined") {
      object[context[nameContext][index]] = "";
    } else {
      if (
        input.attr("type") == "checkbox" &&
        object[context[nameContext][index]] == "1"
      ) {
        input.prop("checked", "checked");
      } else if (input.attr("type") == "radio") {
        input.each(function () {
          var meI = $(this);
          if (meI.val() == object[context[nameContext][index]])
            meI.prop("checked", "checked");
        });
      } else {
        if (typeof input[0] != "undefined")
          input[0].value = object[context[nameContext][index]];
      }
    }
  }
}

function obtenerValoresDeFormContext() {
  var objeto = {};
  for (var index in context[nameContext]) {
    //BUSCAMOS UN RADIO CHECKEADO
    var input = $(
      "input:radio[name=" + context[nameContext][index] + "]:checked"
    );
    if (typeof input[0] != "undefined") {
      objeto[context[nameContext][index]] = input.val();
      continue;
    }

    input = $("select[name=" + context[nameContext][index] + "]");
    if (typeof input[0] != "undefined") {
      objeto[context[nameContext][index]] =
        input.val() == "" ? null : input.val();
      continue;
    }

    input = $("input[name=" + context[nameContext][index] + "]");
    if (typeof input[0] != "undefined") {
      if (input.attr("type") == "checkbox") {
        objeto[context[nameContext][index]] = input.prop("checked") ? "1" : "0";
        //console.warn(input.prop('checked'));
      } else if (input.attr("type") == "radio") {
        objeto[context[nameContext][index]] = null;
      } else {
        objeto[context[nameContext][index]] =
          input.val() == "" ? null : input.val();
      }
      continue;
    }

    objeto[context[nameContext][index]] = null;
  }
  return objeto;
}

function openDialog() {
  dialog.dialog("open");
  if (typeof afterOpenDialog != "undefined") afterOpenDialog();
}
function closeDialog() {
  dialog.dialog("close");
  if (typeof afterCloseDialog != "undefined") afterCloseDialog();
}

$(function () {
  dialog = $("#dialog-form").dialog({
    autoOpen: false,
    height: 500,
    width: 400,
    modal: true,
    buttons: {
      Guardar: function () {
        if (accion == "add") addUser();
        else if (accion == "update") updateUser();
      },
      Cancel: function () {
        closeDialog();
        accion = null;
      },
    },
    close: function () {
      form[0].reset();
      allFields.removeClass("ui-state-error");
      if (typeof afterCloseDialog != "undefined") afterCloseDialog();
    },
  });

  form = dialog.find("form").on("submit", function (event) {
    event.preventDefault();
  });

  $("#adicionar")
    .button()
    .on("click", function () {
      accion = "add";
      openDialog();
    });
});
