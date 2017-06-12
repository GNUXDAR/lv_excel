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
		<br><a href="{{ route('home') }}" class="btn btn-success">Atras</a>
		<a href="#" class="btn btn-primary pull-right">Procesar</a><br><br>
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
						<!-- cmienza desde 56, no entiendo porque -->
							<tr>
							<td>{!! $value['id'] !!}</td>
							<td>
							{!! $value['albaran'] !!}
							{{ $mp = strlen($value['albaran'])-55 }}
								
								@if (empty($value['albaran']))
									{{ 'No puede estar vacio' }}
								@elseif ($mp > 20)
									{{--'Debe ser menos'--}}
								@endif
							@php //die() @endphp
							</td>
							<td>
							{!! $value['destinatario'] !!}
							{{ $mp = strlen($value['destinatario'])-77 }}
								
								@if (empty($mp))
									{{ 'No puede estar vacio' }}
								@elseif ($mp >= 28)
									{{'Debe ser menos'}}
								@endif
							</td>
							<td>{!! $value['direccion'] !!}</td>
							<td>{!! $value['poblacion'] !!}</td>
							<td>{!! $value['cp'] !!}</td>
							<td>{!! $value['provincia'] !!}</td>
							<td>
							{!! $value['telefono'] !!}
							{{ $mp = strlen($value['telefono'])-56 }}
								
								@if (empty($mp))
									{{ 'No puede estar vacio' }}
								@elseif ($mp >= 28)
									{{'Debe ser menos'}}
								@endif
							</td>
							<td>{!! $value['observaciones'] !!}</td>
							<td>{!! $value['fecha'] !!}</td>
						</tr>

				@endforeach
                
               
             

                 
             
             
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