<div class="box-body">
    <div class="form-group"><br>
    	{{ Form::label('fichero', 'Fichero Origen:', ['class' => 'col-sm-4 control-label']) }}
    	<span class="btn btn-default btn-file">
    		{{ Form::file('excel', ['class' => 'form-control','id' => 'file']) }}
    	</span>
    	<!-- {{ Form::reset('Cancelar', ['class' => 'btn btn-info']) }} -->
    	{{ Form::submit('Subir Fichero', ['class' => 'btn btn-lg btn-primary pull-right', 'id' => 'request', 'onclick' => 'comprueba_extension(this.form, this.form.excel.value)'])}}
    </div>
  </div>