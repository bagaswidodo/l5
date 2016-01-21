<!DOCTYPE html>
<html>
<head>
	<title>Trial Error broh</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Form Validation example</h1>

			@if ($errors->any())
			    <ul class="alert alert-danger">
			        @foreach ($errors->all() as $error)
			            <li>{{ $error }}</li>
			        @endforeach
			    </ul>
			@endif

		<form method="post" action="">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
			    <label>Nama</label>
			    <input type="text" class="form-control" id="id" name="name" placeholder="Name . . .">
			 </div>
			 <div class="form-group">
			     <label>Tanggal Mulai</label>
			     <input type="date" class="form-control" id="start_date" name="start_date">
			 </div>
		    <div class="form-group">
			       <label>Tanggal Selesai</label>
			       <input type="date" class="form-control" id="end_date" name="end_date">
	       </div>

	        <div class="form-group">
	         <label>Telpon</label>
	         <input type="text" class="form-control" id="telpon" name="telpon" placeholder="placeholder">
	        </div>

	        <div class="form-group">
	           <label>Webpage</label>
	           <input type="text" class="form-control" id="web" name="web" placeholder="http://">
	        </div>

			<div class="form-group">
			    <label>Jam Mulai</label>
			    <input type="text" class="form-control" id="open" name="open" placeholder="hh:mm">
			</div>
			<div class="form-group">
			      <label>Jam Selesai</label>
			      <input type="text" class="form-control" id="close" name="close" placeholder="hh:mm">
			</div>
			<div class="form-group">
			    <label>Jam Mulai Istirahat</label>
			    <input type="text" class="form-control" id="id" name="break_start" placeholder="hh:mm">
			  </div>
			<button class="btn btn-success form-control"> Create</button>
			<button class="btn btn-danger form-control"> Cancel</button>
		</form>

<!-- {!! Form::open(['url' => 'pegawai']) !!}

    <div class="form-group">
        {!! Form::label('nama', 'Nama') !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'masukan nama']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'masukan email']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('level', 'Level') !!}
        {!! Form::select('level', [' ' => 'Pilih Level', '1' => 'Level 1', '2' => 'Level 2', '3' => 'Level 3'], null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Buat data pegawai', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
		</div> -->
	</div>
</body>
</html>