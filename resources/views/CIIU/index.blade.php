<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<!-- Styles -->
	<link href="{{asset('css/style_datelimit.css')}}" rel="stylesheet">
	<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
	<link href="{{asset('css/sweetalert2.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</head>
<body oncontextmenu="return false" >

	<section class="container">
		<div class="row">
			@if($false==true)
			 <style type="text/css">
			 #fomulario { display: none; }
			 </style>
			@else
			<style type="text/css">
			 #fomulario { display: block; }
			 </style>
			@endif
			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xs-12 mt-1" id="fomulario">
				
				<form action="/create" method="post" class="form">
					<div class="mt-3"></div>

					<div class="container">

						@csrf
						<div class="text-center">

							<div class="form-group">
								<input type="text" name="tel" class="form-control" id="telefono" aria-describedby="emailHelp" placeholder="Ingresa el Celular" value="{{old('tel')}}">
								@if ($errors->has('tel'))
								<div class="error">
									{{ $errors->first('tel') }}
								</div>
								@endif
							</div> 

							<div class="form-group">
								<input type="text" name="nit" class="form-control" id="nit" aria-describedby="emailHelp" placeholder="Ingresa el NIT" value="{{old('nit')}}">
								@if ($errors->has('nit'))
								<div class="error">
									{{ $errors->first('nit') }}
								</div>
								@endif
							</div>

							<div class="form-group">
								<input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Escribe tu nombre" value="{{old('name')}}">
								@if ($errors->has('name'))
								<div class="error">
									{{ $errors->first('name') }}
								</div>
								@endif
							</div>

							<div class="form-group">
								<input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingresa tu Email" value="{{old('email')}}">
								@if ($errors->has('email'))
								<div class="error">
									{{ $errors->first('email') }}
								</div>
								@endif
							</div>

							<div class="form-group">
								<input type="text" name="activity_id" class="form-control" id="actividadeconomica" aria-describedby="emailHelp" placeholder="Ingresa tu código CIIU" value="{{old('activity_id')}}" pattern="[0-9]{4}">
								@if ($errors->has('activity_id'))
								<div class="error">
									{{ $errors->first('activity_id') }}
								</div>
								@endif
							</div>

							<div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}" id="captcha">
								@if($errors->has('g-recaptcha-response'))
								<span class="invalid-feedback" style="display: block;">
									<strong>{{$errors->first('g-recaptcha-response')}}</strong>
								</span>
								@endif
							</div>
						</div>
					</div>
					<div class="text-center btn-yellow-dark mt-3" id="identity">
						<button type="submit" class="btn search"  >Consultar</button>
					</div> 
					<div class="mt-2"></div>
				</form>

			</div>
			
			@if($false==false)
			<style type="text/css">
			 #consulta { display: none; }
			 </style>
			 @else
			 <style type="text/css">
			 #consulta { display: block; }
			 </style>
			 @endif
			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xs-12 mt-sl" id="consulta">
				<table class="table table-bordered table-hover table-shadow">
					@foreach($limits as $limit)
					<tr>
						<th class="bg-violet">Código CIIU</th>
						<td>{{ $limit->activity_id}}</td>
					</tr>
					<tr>
						<th class="bg-violet">Actividad ecónomica</th>
						<td>{{$limit->activity_name}}</td>
					</tr>
					<tr>
						<th class="bg-violet">Fecha para iniciar registro*</th>
						<td>{{$limit->start_date}}</td>
					</tr>
					<tr>
						<th class="bg-violet">Fecha máxima para iniciar a expedir factura**</th>
						<td>{{$limit->end_date}}</td>
					</tr>
					<tr>
						<th class="bg-violet">Fecha para iniciar registro*</th>
						<td>{{$limit->days}}</td>
					</tr>
					<div class="text-center mt-3">
						<p>
							* Resolución 000020 de 2019  ** Resolución 000030 de 2019 
						</p>
					</div>
					@endforeach
				</table>
			</div>
			
			
		</div>		
	</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{asset('js/jquery.min.map.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
	<script src="{{asset('js/cancel.js')}}"></script>
	@if($validate==true)
	<script>
		Swal.fire({
		  type: 'error',
		  title: 'Error',
		  text: 'No se encontro Código CIIU!',
		})
	</script>
	@else

	@endif
</body>
</html>




