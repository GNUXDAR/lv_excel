<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reg Excel</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/editablegrid/editablegrid.css') }}" type="text/css" media="screen">
	
	<style>
		
	</style>
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
		<form method="post" action="{{ url('import-excel') }}">
		<br><a href="{{ route('home') }}" class="btn btn-success">Atras</a>
		<input type="submit" value="Procesar" class="btn btn-primary pull-right">
		<!-- <a href="#" class="btn btn-primary pull-right">Procesar</a> --><br><br>
		</div>

			<!-- <table class="table table-hover">
			<script>
		        console.log(value);
        	</script>
				<div id="tablecontent"></div>
				@
			</table> -->
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
					<td>{!! $value['id'] !!}</td>
					<td>
					<input type="text" size="10" name="albaran[{{$key}}]" value="{{ $value['albaran'] }}">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">
							&times;
						</button>
						{{ $errors->first('albaran[$key]') }}
					</div>
					
					</td>

					<td>
					<input type="text" name="destinatario[{{$key}}]" value="{!! $value['destinatario'] !!}">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">
							&times;
						</button>
						{{ $errors->first('destinatario[$key]') }}
					</div>
					</td>

					<td>
					<input type="text" name="direccion[{{$key}}]" value="{!! $value['direccion'] !!}">
					</td>

					<td>
					<input type="text" name="poblacion[{{$key}}]" value="{!! $value['poblacion'] !!}">
					<td>
					<input type="text" size="6" name="cp[{{$key}}]" value="{!! $value['cp'] !!}">
					</td>

					<td>
					<input type="text" size="10" name="provincia[{{$key}}]" value="{!! $value['provincia'] !!}">
					</td>

					<td>
					<input type="text" size="10" name="telefono[{{$key}}]" value="{!! $value['telefono'] !!}">
					</td>

					<td>
					<input type="text" size="10" name="observaciones[{{$key}}]" value="{!! $value['observaciones'] !!}">
					</td>

					<td>
					<input type="text" size="10" name="fecha[{{$key}}]" value="{!! $value['fecha'] !!}">
					</td>
				</tr>

				@endforeach

                </form>
            </tbody>
        </table>
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

	<script type="text/javascript">
		
		$(document).ready(function () {
			
			 $.ajax({
                url: "validate-albaran",
                type: "get",
                dataType: "json",
                data:  $("input[name='albaran[]']"),

            }).done(function(response){
            	console.log(response);
            });
		});
	</script>

</body>
</html>