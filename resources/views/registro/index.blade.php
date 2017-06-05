<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reg Excel</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
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
</head>
<body>
	<header>
		<div class="container">
			<h3>Registro Excel</h3>
		</div>
	</header>

	<div class="container-fluid">
		<section class="main row">
			<article class="col-sm-6 col-md-10">
				<div class="box box-info"><!-- 'route' => 'registro.store', --> 
					{{ Form::open (['url' => '#', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'formFile']) }}
						@include('registro.partials.form')
		            {{ Form::close() }}
				</div>
				@include('registro.partials.info')
			</article>
			<aside class="col-sm-6 col-md-2">
				<p>
					1. Ingrese el fichero Excel que se procesara <br><br>

					2. Es necesario que sea un archivo con formato adecuado .xls <br>
				</p>
			</aside>
		</section>
		<div class="row">
			<div id="tablecontent"></div>
			
			</div>
	</div>

	
		<footer class="footer">
			<div class="container">
				<h3 class="text-muted">Arturo Cabrera</h3>
			</div>
		</footer>
	<script type="text/javascript" src="{{ asset('js/tableEdit.js') }}"></script>	<!-- tabla editable-->
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/function.js') }}"></script> 	<!-- mi ajax -->
	
</body>
</html>
