<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reg Excel</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/editablegrid/editablegrid.css') }}" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/micss.css') }}">
</head>
<body>
	<header>
		<div class="container">
			<h3>Registro Excel</h3>
		</div>
	</header>

	<section class="main row">
		
		<div class="container">
		<div>
		{{ Form::open (['url' => 'export', 'method' => 'POST', 'class' => 'form-horizontal']) }}

		{!! csrf_field() !!}
		<br><a href="{{ route('home') }}" class="btn btn-success">Atras</a>
		{{ Form::submit('Procesar', ['class' => 'btn btn-lg btn-primary pull-right', 'id' => 'request'])}}
		<!-- <a href="#" class="btn btn-primary pull-right">Procesar</a> --><br><br>
		</div>

			<!-- <table class="table table-hover">
			<script>
		        console.log(value);
        	</script>
				<div id="tablecontent"></div>
				@
			</table> -->

		<div class="table-responsive">
			<table class="table table-striped">
	            <thead>
	                <tr>
	                	<th>#</th>
	                    <th>Albaran</th>
	                    <th>Destinatario</th>
	                    <th>Direccion</th>
	                    <th>Poblacion</th>
	                    <th>cp</th>
	                    <th>Provincias</th>
	                    <th>Tlf</th>
	                    <th>Observaciones</th>
	                    <th>Fecha</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($data as $key => $value)

					<tr>
						<td>{!! $i = $value['id'] + 1 !!}</td>
						<td>
							<input type="text" size="10" id="{{ $value['id'] }}" name="albaran[]" value="{{ $value['albaran'] }}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['albaran'])) ? $errors[$value['id']]['albaran'] : '' }}" class="{{ (isset($errors[$value['id']]['albaran'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10"  name="destinatario[]" value="{!! $value['destinatario'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['destinatario'])) ? $errors[$value['id']]['destinatario'] : '' }}" class="{{ (isset($errors[$value['id']]['destinatario'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10"  name="direccion[]" value="{!! $value['direccion'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['direccion'])) ? $errors[$value['id']]['direccion'] : '' }}" class="{{ (isset($errors[$value['id']]['direccion'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10"  name="poblacion[]" value="{!! $value['poblacion'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['poblacion'])) ? $errors[$value['id']]['poblacion'] : '' }}" class="{{ (isset($errors[$value['id']]['poblacion'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="6" name="cp[]" value="{!! $value['cp'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['cp'])) ? $errors[$value['id']]['cp'] : '' }}" class="{{ (isset($errors[$value['id']]['cp'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10" name="provincia[]" value="{!! $value['provincia'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['provincia'])) ? $errors[$value['id']]['provincia'] : '' }}" class="{{ (isset($errors[$value['id']]['provincia'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10" name="telefono[]" value="{!! $value['telefono'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['telefono'])) ? $errors[$value['id']]['telefono'] : '' }}" class="{{ (isset($errors[$value['id']]['telefono'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10" name="observaciones[]" value="{!! $value['observaciones'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['observaciones'])) ? $errors[$value['id']]['observaciones'] : '' }}" class="{{ (isset($errors[$value['id']]['observaciones'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10" name="fecha[]" value="{!! $value['fecha'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['fecha'])) ? $errors[$value['id']]['fecha'] : '' }}" class="{{ (isset($errors[$value['id']]['fecha'])) ? 'form-control has-error' : '' }}">
						</td>
					</tr>

					@endforeach

	                {{ Form::close() }}
		        </tbody>
	        </table>
	        </div>
		</div>	
	</section>



	<footer class="footer">
		<div class="container">
			<h3 class="text-muted">Arturo Cabrera</h3>
		</div>
		</footer>
		<!-- <script src="{{ asset('js/editablegrid/editablegrid.js') }}"></script> -->
	<!-- [DO NOT DEPLOY] --> <!-- <script src="{{ asset('js/editablegrid/editablegrid_renderers.js') }}" ></script> -->
	<!-- [DO NOT DEPLOY] --> <!-- <script src="{{ asset('js/editablegrid/editablegrid_editors.js') }}" ></script> -->
	<!-- [DO NOT DEPLOY] --> <!-- <script src="{{ asset('js/editablegrid/editablegrid_validators.js') }}" ></script> -->
	<!-- [DO NOT DEPLOY] --> <!-- <script src="{{ asset('js/editablegrid/editablegrid_utils.js') }}" ></script> -->
	<!-- [DO NOT DEPLOY] --> <!-- <script src="{{ asset('js/editablegrid/editablegrid_charts.js') }}" ></script> -->
	<!-- <script type="text/javascript" src="{{ asset('js/tableEdit.js') }}"></script> -->	<!-- tabla editable-->
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<!-- mi ajax -->
	<script type="text/javascript" src="{{ asset('js/mijs.js') }} "></script>

</body>
</html>