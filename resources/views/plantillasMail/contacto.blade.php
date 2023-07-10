<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="{{asset('/css/contact.css')}}" rel="stylesheet" type="text/css" media="all"/>
	<title>Document</title>
</head>
<body>
	
	<table style="width: 70%">
		<tr>
			<td style="background:#DC0330;"><a href="{{url('/')}}"><img style="margin:0 40px;" src="{{asset('/img/logo2.png')}}" alt="Rojo Carmesí"></a></td>
		</tr>
			
		<tr>
			<td>
				<table style="">
					<tr>
						<td><h3 style="margin: 0 70px;">Ud tiene un nuevo mensaje: {{$datos['asunto_contacto']}}</h3></td>
					</tr>
					<tr>
						<td>
							<p style="margin: 0 70px;"><b>Nombre: </b>{{$datos['name_contacto']}} <a href="mailto:{{$datos['email_contacto']}}">{{$datos['email_contacto']}}</a></p>
						</td>
					</tr>
					<tr>
						<td><p style="margin: 0 90px;">{{$datos['mensaje_contacto']}}</p></td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td style="background:#EDECEC;">&nbsp; <br><br><br></td>
		</tr>
	</table>

</body>
</html>