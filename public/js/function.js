function comprueba_extension(formulario, archivo) {
   extensiones_permitidas = new Array(".xls", ".xlsx", ".xslm", ".xltx", ".xml");
   mierror = "";
   if (!archivo) {
      //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario
       mierror = "No has seleccionado ningún archivo";
       alert (mierror);
       window.location='/home';
   }else{
      //recupero la extensión de este nombre de archivo
      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
      //alert (extension);
      //compruebo si la extensión está entre las permitidas
      permitida = false;
      for (var i = 0; i < extensiones_permitidas.length; i++) {
         if (extensiones_permitidas[i] == extension) {
         permitida = true;
         break;
         }
      }
      if (!permitida) {
         mierror = "Comprueba la extensión del archivo. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join();
         alert (mierror);
         window.location='/home';
         
       }else{
         //alert ("Todo correcto.");
         formulario.submit();
         return 1;
       }
   }
   //si estoy aqui es que no se ha podido submitir
   alert (mierror);
   return 0;
} 

    $(function(){                
                 var datos =
                 {
                    "metadata":[
                     {  "name":"albaran",       "label":"Albaran","datatype":"string","editable":true},
                     {  "name":"destinatario",  "label":"Destinatario","datatype":"string","editable":true},
                     {  "name":"direccion",     "label":"Direccion","datatype":"string","editable":true},
                     {  "name":"poblacion",     "label":"Poblacion","datatype":"string","editable":true},
                     {  "name":"cp",            "label":"Cp","datatype":"string","editable":true},
                     {  "name":"provincia",     "label":"Provincia","datatype":"string","editable":true},
                     {  "name":"telefono",      "label":"Telefono","datatype":"integer","editable":true},
                     {  "name":"observaciones", "label":"Observaciones","datatype":"string","editable":true},
                     {  "name":"fecha",         "label":"Fecha","datatype":"date","editable":true}
                    ],

                     "data" : data
                };
                //console.log(datos);

                //editableGrid = new EditableGrid("import-excel");
                //editableGrid.load(datos);
                //editableGrid.renderGrid("tablecontent", "table table-hover", "import-excel");
               
    });


$(document).ready(function () {
            
             $.ajax({
                url: "validate-albaran",
                type: "get",
                dataType: "json",
                data:  $("input[name='albaran[]']"),

            }).done(function(response){
                console.log(response);
            });
            $('[data-toggle="popover"]').popover(); 
        });