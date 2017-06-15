<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>EditableGrid - Minimal demo - Load grid from JSON</title>
		
								 <script src="{{ asset('js/editablegrid/editablegrid.js') }}"></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_renderers.js') }}" ></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_editors.js') }}" ></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_validators.js') }}" ></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_utils.js') }}" ></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_charts.js') }}" ></script>
		<link rel="stylesheet" href="{{ asset('css/editablegrid/editablegrid.css') }}" type="text/css" media="screen">
		
		<style>
			body { font-family:'lucida grande', tahoma, verdana, arial, sans-serif; font-size:11px; }
			h1 { font-size: 15px; }
			a { color: #548dc4; text-decoration: none; }
			a:hover { text-decoration: underline; }
			table.testgrid { border-collapse: collapse; border: 1px solid #CCB; width: 800px; }
			table.testgrid td, table.testgrid th { padding: 5px; border: 1px solid #E0E0E0; }
			table.testgrid th { background: #E5E5E5; text-align: left; }
			input.invalid { background: red; color: #FDFDFD; }
		</style>
		
		<script>
			window.onload = function() {
				var data ={

					"metadata":[
									{"name":"name","class":"test","label":"NAME","datatype":"string","editable":true},
									{"name":"firstname","label":"FIRSTNAME","datatype":"string","editable":true},
									{"name":"age","label":"AGE","datatype":"integer","editable":true},
									{"name":"height","label":"HEIGHT","datatype":"double(m,2)","editable":true},
									{"name":"country","label":"COUNTRY","datatype":"string","editable":true,"values":
										{
											"Europe":{"be":"Belgium","fr":"France","uk":"Great-Britain","nl":"Nederland"},
											"America":{"br":"Brazil","ca":"Canada","us":"USA"},
											"Africa":{"ng":"Nigeria","za":"South-Africa","zw":"Zimbabwe"}}
										},
									{"name":"email","label":"EMAIL","datatype":"email","editable":true},
									{"name":"freelance","label":"FREELANCE","datatype":"boolean","editable":true},
									{"name":"lastvisit","label":"LAST VISIT","datatype":"date","editable":true}
								],

"data":[res
]};
				// editableGrid = new EditableGrid("DemoGrid"); 
				// editableGrid.tableLoaded = function() { this.renderGrid("tablecontent", "testgrid"); };
				// var url = '{{ url("/import-excel" )}}';
				// editableGrid.load(data);

				editableGrid = new EditableGrid("ImportExel");
				editableGrid.load(data);
				editableGrid.renderGrid("tablecontent", "testgrid");
			} 
		</script>
		
	</head>
	
	<body>
		<h1>EditableGrid - Minimal Demo - Loading grid from JSON - <a href="../index.html">Back to menu</a></h1> 
		<div id="tablecontent"></div>
	</body>

</html>
