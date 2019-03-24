@extends('layouts.app')

@section('content')

<script type="text/javascript">
	$(document).ready(function(){
    $('.timepicker').timepicker();
  });
</script>


<div class="row">
	<div class="col s12 m5 offset-m3">
		<div class="card padding">
			<form method="POST" action="{{ route('schedule.store') }}" >
					@csrf
					<h4 class="center-align">lunes</h4>
					<div class="row">
						<input type="hidden" name="day" value="lunes">
						<div class="col s6 center-align">
							<label>Inicia</label>
							<input type="text" class="timepicker" name="start_hour">
						</div>
						
						<div class="col s6 center-align">
							<label>Termina</label>
							<input type="text" class="timepicker" name="finish_hour">
						</div>
					</div>
					<h4 class="center-align">Martes</h4>
					<div class="row">
						<input type="hidden" name="day2" value="martes">
						<div class="col s6 center-align">
							<label>Inicia</label>
							<input type="text" class="timepicker" name="start_hour2">
						</div>
						
						<div class="col s6 center-align">
							<label>Termina</label>
							<input type="text" class="timepicker" name="finish_hour2">
						</div>
					</div>
					<h4 class="center-align">Miercoles</h4>
					<div class="row">
						<input type="hidden" name="day3" value="miercoles">
						<div class="col s6 center-align">
							<label>Inicia</label>
							<input type="text" class="timepicker" name="start_hour3">
						</div>
						
						<div class="col s6 center-align">
							<label>Termina</label>
							<input type="text" class="timepicker" name="finish_hour3">
						</div>
					</div>
					<h4 class="center-align">Jueves</h4>
					<div class="row">
						<input type="hidden" name="day4" value="jueves">
						<div class="col s6 center-align ">
							<label >Inicia</label>
							<input type="text" class="timepicker" name="start_hour4">
						</div>
						
						<div class="col s6 center-align">
							<label>Termina</label>
							<input type="text" class="timepicker" name="finish_hour4">
						</div>
					</div>
					<h4 class="center-align">Viernes</h4>
					<div class="row">
						<input type="hidden" name="day5" value="viernes">
						<div class="col s6 center-align">
							<label>Inicia</label>
							<input type="text" class="timepicker" name="start_hour5">
						</div>
						
						<div class="col s6">
							<label>Termina</label>
							<input type="text" class="timepicker" name="finish_hour5">
						</div>
					</div>

				<button class="btn btn-block color-cut">Enviar</button>
			</form>
			
		</div>
	</div>
</div>
@endsection