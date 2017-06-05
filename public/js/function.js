 $(function(){
        $("#formFile").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formFile"));
            //formData.append("dato", "valor");
            formData.append('exel', $(this)[0].file);
            $.ajax({
                url: "import-excel",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
	    		processData: false

            })
                .done(function(data){
                   console.log(data);
                  
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

                     "data" : data.data
                };
                //console.log(datos);

                editableGrid = new EditableGrid("ImportExel");
                editableGrid.load(datos);
                editableGrid.renderGrid("tablecontent", "testgrid");
                    // var tabla = $("table");
                    // $("table").html('');
             //        tabla.append('<tr><th>Albaran</th><th>Destinatario</th><th>Direccion</th><th>Poblacion</th><th>cp</th><th>Provincia</th><th>Tlf</th><th>Observaciones</th><th>Fecha</th></tr>');
             //        $.each(res.data, function( key, value ) {
             //            var nuevaFila = "<tr>";
             //            nuevaFila+= "<td>" + value.albaran + "</td>";
             //            nuevaFila+= "<td>" + value.destinatario + "</td>";
             //            nuevaFila+= "<td>" + value.direccion + "</td>";
             //            nuevaFila+= "<td>" + value.poblacion + "</td>";
             //            nuevaFila+= "<td>" + value.cp + "</td>";
             //            nuevaFila+= "<td>" + value.provincia + "</td>";
             //            nuevaFila+= "<td>" + value.tlf + "</td>";
             //            nuevaFila+= "<td>" + value.observaciones + "</td>";
             //            nuevaFila+= "<td>" + value.fecha.date + "</td>";
             //            nuevaFila+= "</tr>";
  				       // tabla.append(nuevaFila);
		           //   });
		   
                });
        });
    });