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
						<td><h3 style="margin: 0 70px;">Gracias por registrarte!!!</h3></td>
					</tr>
					<tr>
						<td>
							<p style="margin: 0 70px;"><b>Nombre: </b>{{$datos['name']}} <a href="mailto:{{$datos['mail']}}">{{$datos['mail']}}</a></p>
						</td>
					</tr>
					<tr>
						<td><p style="margin: 0 90px;">{{$datos['mensaje']}}</p></td>
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