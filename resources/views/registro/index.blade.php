<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reg Excel</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
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
			
			<table class="table table-striped table-hover">
				<thead></thead>
				<tbody></tbody>
				
			</table>
			</div>
	</div>

	
		<footer class="footer">
			<div class="container">
				<h3 class="text-muted">Arturo Cabrera</h3>
			</div>
		</footer>

	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/function.js') }}"></script> 	<!-- mi ajax -->
	<script type="text/javascript" src="{{ asset('js/tableEdit.js') }}"></script>	<!-- tabla editable-->
</body>
</htcol-sm-6 ml>
