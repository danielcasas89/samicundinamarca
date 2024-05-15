var DbOffline = {
  nameDB: "ense_salud",

  destroy: function (callback) {
    alert("Ejecutando Destry");
    var request = DbOffline.indexedDB.deleteDatabase(DbOffline.nameDB);
    //console.warn(request);
    request.onsuccess = function () {
      //console.warn('Eliminada !!');
      alert("Database appencuestas eliminada!");
      if (typeof callback != "undefined") callback();
    };
    request.onerror = function (event) {
      alert("deletedb(); error: " + event);
    };

    request.onblocked = function () {
      //console.log("Couldn't delete database due to the operation being blocked");
    };
  },

  clear: function (callback) {
    //OBTENEMOS LA CONEXION
    var active = DbOffline.dataBase.result;
    //CREAMOS LA TRANSACCION
    var transaction = active.transaction(["encuestas"], "readwrite");

    transaction.oncomplete = function (event) {
      //console.debug('Terminada transaccion de clear');
      if (typeof callback != "undefined") callback();
    };
    transaction.onerror = function (event) {
      //console.debug('Error en transaccion de clear');
      //console.debug(transaction.error);
    };

    var objectStore = transaction.objectStore("encuestas");

    var objectStoreRequest = objectStore.clear();

    objectStoreRequest.onsuccess = function (event) {
      //console.debug('Tabla limpiada correctamente.');
    };
  },

  /**
   * Inicializa la base de datos.
   * CONTENEDOR: appencuestas
   * COLECCIONES: encuestas
   * INDICES: nombre, cedula
   *
   */
  init: function (callback, callbackError) {
    //CREAMOS EL OBJETO INDEXDB PARA NO DEPENDER DEL TIPO DE NAVEGADOR
    DbOffline.indexedDB =
      window.indexedDB ||
      window.mozIndexedDB ||
      window.webkitIndexedDB ||
      window.msIndexedDB;
    //VARIABLE DE LA DB
    DbOffline.dataBase = null;
    //PARA SABER SI SOPRTA DbOffline.indexedDB
    if (!DbOffline.indexedDB) {
      alert("No soporta DbOffline.indexedDB.");
      return;
    } else {
      //console.debug('Felicidades!!\nSoporta DbOffline.indexedDB.');
    }

    //CREAMOS EL CONECTOR A LA BASE DE DATOS (CONTENEDOR): NOMBRE DEL CONTENEDOR (DB), VERSION DE LA DB (Mayor a 0)
    DbOffline.dataBase = DbOffline.indexedDB.open(DbOffline.nameDB, 1);

    //SE EJECUTA CUANDO SE CREA UNA NUEV VERSION DE LA DB
    DbOffline.dataBase.onupgradeneeded = function (e) {
      //OBTENEMOS LA CONEXION A LA DB
      var active = DbOffline.dataBase.result;
      //CREAMOS UNA COLECCION (TABLAS) LLAMADA encuesta CUYA LLAVE ES id Y ES AUTOINCREMENTABLE
      var object = active.createObjectStore("encuestas", {
        keyPath: "id",
        autoIncrement: false,
      });
      //INDEXAMOS: NOMBRE DEL INDICE, NOMBRE DEL CAMPO A INDEXAR, OPCIONES(SI ES ÚNICA)
      object.createIndex("by_nombre", "nombre", { unique: false });
      object.createIndex("by_cedula", "cedula", { unique: true });

      //CREAMOS UNA COLECCION (TABLAS) LLAMADA encuesta CUYA LLAVE ES id Y ES AUTOINCREMENTABLE
      var object2 = active.createObjectStore("configuracion", {
        keyPath: "id",
        autoIncrement: true,
      });
    };
    //console.debug('Va a iniciar....');
    //ACCIONES CUANDO SE EJECUTA SATISFACTORIAMENTE
    DbOffline.dataBase.onsuccess = function (e) {
      //console.debug('Base de datos cargada correctamente');
      /*e.target.result.onversionchange = function(event) {
                event.target.close();
            }*/
      callback();
    };
    //ACCIONES CUANDO SE EJECUTA SATISFACTORIAMENTE
    DbOffline.dataBase.onerror = function (e) {
      //console.debug('El tipo del callback error es '+(typeof callbackError));
      if (typeof callbackError != "undefined") callbackError();
      else {
        alert("Error cargando la base de datos local.");
      }
    };
  },

  /**
   * Actualiza un atributo de un objeto de la COLECCION encuestas con el nuevo valor
   *
   * @param id number Identificador del objeto(registro)
   * @param campo Nombre del atributo a actualizar
   * @param valor Nuevo valor del atributo
   *
   */
  setField: function (id, campo, valor, callback) {
    //OBTENEMOS LA CONEXION
    var active = DbOffline.dataBase.result;
    //CREAMOS LA TRANSACCION
    var data = active.transaction(["encuestas"], "readonly");
    //SELECCIONAMOS LA COLECCION
    var object = data.objectStore("encuestas");
    //REALIZAMOS LA PETICION BUSQUEDA POR EL keyPath USANDO EL ID
    var request = object.get(id);
    //SI LA PETICION RESULTA EXITOSA
    request.onsuccess = function () {
      //console.debug("campo es "+campo);
      request.result[campo] = valor;
      //GUARDAMOS EL RESULTADO DE LA CONSULTA
      //console.debug(request.result);
      DbOffline.updateWith(request.result, callback);
    };
  },
  setObject: function (id, valores, callback) {
    //OBTENEMOS LA CONEXION
    var active = DbOffline.dataBase.result;
    //CREAMOS LA TRANSACCION
    var data = active.transaction(["encuestas"], "readonly");
    //SELECCIONAMOS LA COLECCION
    var object = data.objectStore("encuestas");
    //REALIZAMOS LA PETICION BUSQUEDA POR EL keyPath USANDO EL ID
    var request = object.get(id);
    //SI LA PETICION RESULTA EXITOSA
    request.onsuccess = function () {
      //console.debug(request.result);
      for (var indice in valores) {
        request.result[indice] = valores[indice];
      }
      //console.debug('Iniciando updateWith');
      //GUARDAMOS EL RESULTADO DE LA CONSULTA
      //console.debug(request.result);
      DbOffline.updateWith(request.result, callback);
    };
  },

  /*
   * Inserta o sobreescribe un registro.
   *
   * @param object Objeto a insertar o con valores actualizados.
   */
  updateWith: function (registro, callback) {
    //OBTENEMOS LA CONEXION
    var active = DbOffline.dataBase.result;
    //CREAMOS UNA TRANSACCION: Array de colecciones(tablas) a usar, readonly o readwrite
    var data = active.transaction(["encuestas"], "readwrite");
    //INDICAMOS SOBRE QUÉ COLECCION VAMOS A OPERAR: Nombre de la coleccion a utilizar (people)
    var object = data.objectStore("encuestas");
    //REALIZAMOS LA INSERCION
    var request = object.put(registro);
    //CONTROLAMOS EL ERROR DE LA INSERCION
    request.onerror = function (e) {
      //console.debug('error en update updateWith');
      alert(request.error.name + "\n, \n" + request.error.message);
    };
    //CUANDO LA TRANSACCION SE EJECUTA CORRECTAMENTE
    data.oncomplete = function (e) {
      if (typeof callback != "undefined") callback();
      //alert('Objeto actualizado correctamente');
    };
  },
  /*
   * Inserta un nuevo objeto a la colección 'encuestas'
   *
   * @param object Objeto a insertar en la colección. Atributos obligatorios 'id', 'nombre'.
   */
  add: function (registro, callback) {
    //OBTENEMOS LA CONEXION
    var active = DbOffline.dataBase.result;
    //CREAMOS UNA TRANSACCION: Array de colecciones(tablas) a usar, readonly o readwrite
    var data = active.transaction(["encuestas"], "readwrite");
    //INDICAMOS SOBRE QUÉ COLECCION VAMOS A OPERAR: Nombre de la coleccion a utilizar (people)
    var object = data.objectStore("encuestas");
    //REALIZAMOS LA INSERCION
    var request = object.put(registro);

    //CONTROLAMOS EL ERROR DE LA INSERCION
    request.onerror = function (e) {
      //console.debug('error en add');
      alert(request.error.name + "\n, \n" + request.error.message);
    };
    //CUANDO LA TRANSACCION SE EJECUTA CORRECTAMENTE
    data.oncomplete = function (e) {
      //console.debug('Objeto agregado correctamente');
      if (typeof callback != "undefined") callback();
    };
  },

  /*
   * Inserta un nuevo objeto a la colección 'encuestas'
   *
   * @param object Objeto a insertar en la colección. Atributos obligatorios 'id', 'nombre'.
   */
  addMultiple: function (registros, callback) {
    //OBTENEMOS LA CONEXION
    var active = DbOffline.dataBase.result;
    //CREAMOS UNA TRANSACCION: Array de colecciones(tablas) a usar, readonly o readwrite
    var data = active.transaction(["encuestas"], "readwrite");
    //INDICAMOS SOBRE QUÉ COLECCION VAMOS A OPERAR: Nombre de la coleccion a utilizar (people)
    var object = data.objectStore("encuestas");
    var i = 0;
    putNext();

    function putNext() {
      if (i < registros.length) {
        object.put(registros[i]).onsuccess = putNext;
        i++;
      } else {
        //console.log('populate complete');
        if (typeof callback != "undefined") callback();
      }
    }
  },

  /*
   * Elimina un registro de la base de datos.
   *
   * @param id string ID del registro
   * @param callback function función que se ejecuta cuando el objeto es eliminado correctamente.
   */
  del: function (id, callback) {
    //OBTENEMOS LA CONEXION
    var active = DbOffline.dataBase.result;
    //CREAMOS UNA TRANSACCION: Array de colecciones(tablas) a usar, readonly o readwrite
    var data = active.transaction(["encuestas"], "readwrite");
    //INDICAMOS SOBRE QUÉ COLECCION VAMOS A OPERAR: Nombre de la coleccion a utilizar (people)
    var object = data.objectStore("encuestas");
    //REALIZAMOS LA INSERCION
    var request = object.delete(id);
    //CONTROLAMOS EL ERROR DE LA INSERCION
    request.onerror = function (e) {
      //console.debug('error en del');
      alert(request.error.name + "\n, \n" + request.error.message);
    };
    //CUANDO LA TRANSACCION SE EJECUTA CORRECTAMENTE
    data.oncomplete = function (e) {
      //console.debug('Objeto eliminado correctamente');
      if (typeof callback != "undefined") callback();
    };
  },
  /**
   *
   *
   *
   *
   */
  get: function (id, callback) {
    //OBTENEMOS LA CONEXION
    var active = DbOffline.dataBase.result;
    //CREAMOS LA TRANSACCION
    var data = active.transaction(["encuestas"], "readonly");
    //SELECCIONAMOS LA COLECCION
    var object = data.objectStore("encuestas");
    //REALIZAMOS LA PETICION BUSQUEDA POR EL keyPath USANDO EL ID
    var request = object.get(id);
    //SI LA PETICION RESULTA EXITOSA
    request.onsuccess = function () {
      //GUARDAMOS EL RESULTADO DE LA CONSULTA
      var result = request.result;
      //console.debug('Encontrado:');
      //console.debug(result);
      if (typeof result != "undefined") {
        callback(result);
      } else {
        DbOffline.printDB();
        //console.debug('error en get');
        alert("Objeto no encontrado con id=" + id);
      }
    };
  },

  getConfig: function (callback) {
    DbOffline.get(0, callback);
  },

  setConfig: function (configuracion) {
    configuracion.id = 0;
    DbOffline.setObject(0, configuracion);
  },

  /*
Devuelve toda la lista de encuesta en la base de datos exceptuando la que tenga ID=0 ya
que este registro se usa para la configuracion
*/
  getAll: function (callback) {
    var active = DbOffline.dataBase.result;
    var data = active.transaction(["encuestas"], "readonly");
    var object = data.objectStore("encuestas");
    var elements = [];

    object.openCursor().onsuccess = function (e) {
      var result = e.target.result;
      // SOLO ALMACENA LOS RESULTADOS QUE SON NO NULOS
      if (result == null) {
        return;
      }

      if (result.value.id != 0 && result.value.id != "0")
        elements.push(result.value);

      //console.debug("Encontrado: ");
      //console.debug(result.value.id);

      result.continue();
    };

    data.oncomplete = function () {
      callback(elements);
      //console.debug('datos:');
      //console.debug(elements);
    };
  },

  printDB: function () {
    var active = DbOffline.dataBase.result;
    var data = active.transaction(["encuestas"], "readonly");
    var object = data.objectStore("encuestas");
    var elements = [];

    object.openCursor().onsuccess = function (e) {
      var result = e.target.result;
      if (result === null) {
        return;
      }
      elements.push(result.value);
      result.continue();
    };

    data.oncomplete = function () {
      //console.debug('datos:');
      //console.debug(elements);
      elements = [];
    };
  },

  loadDB: function (callback, callbackError) {
    console.debug("Cargando base de datos...");
    $.ajax({
      url: "/php/services/Front.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        command: "obtenerDataOffline",
        data: ["ok"],
      },
      success: function (rta) {
        console.warn("obtenerDataOffline");
        console.warn(rta);
        if (rta.type == "info") {
          DbOffline.clear(function () {
            if (rta.data.length > 0) {
              DbOffline.addMultiple(rta.data, callback);
            } else {
              alert("No existen encuestas para realizar.");
            }
          });
        } else {
          alert(rta.msg + ".");
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
  },
};
