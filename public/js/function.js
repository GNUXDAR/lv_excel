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

                     "data" : {{ $data->data }}
                };
                //console.log(datos);

                editableGrid = new EditableGrid("import-excel");
                editableGrid.load(datos);
                editableGrid.renderGrid("tablecontent", "testgrid");
                });
        });
    });