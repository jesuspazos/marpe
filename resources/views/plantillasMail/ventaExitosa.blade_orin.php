<div style="padding:0; max-width:700px; margin:0 auto">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td class="x_logo" align="left" style="padding:10px 0 15px 0"><img data-imagetype="External" src="{{asset('/img/logo.png')}}" alt="RojoCarmesi" border="0" title="RojoCarmesi" width="132" height="70"> </td>
			</tr>
			<!--<tr>
				<td width="100%" style="border-top:solid 1px #E8E8E8; display:block"></td>
			</tr>
			<tr>
				<td height="25" style="font-size:1px">&nbsp;</td>
			</tr>-->
		</tbody>
	</table>

	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td width="40"><img data-imagetype="External" src="http://static.mlstatic.com/org-img/emails/icons/ico_ok2.gif" alt="Congrats" width="32" height="32"> </td>
				<td style="font-family:Arial; font-size:20px; color:#DC0330; font-weight:normal">¡Gracias por tu compra! </td>
			</tr>	
		</tbody>
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td height="10" style="font-size:1px">&nbsp;</td>
			</tr>
		</tbody>
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td>
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr valign="top">
								<td style="width:90px"><span style="border:1px solid #cccccc; display:block"><img data-imagetype="External" src="{{asset($datos['img_prod'])}}" width="90" height="90" style="display:block"> </span></td>
								<td>
									<table cellpadding="0" cellspacing="0" border="0">
										<tbody>
											<tr>
												<td style="font-family:Arial; font-size:14px; color:#666666; padding:0 20px 6px 15px; line-height:1.4">
													Tus articulos Rojo Carmesí</td>	
											</tr>
											<!--<tr>
												<td style="font-family:Arial; font-size:12px; color:#999999; padding:0 20px 6px 15px">Color: Gris oscuro<br>Cantidad: 1 </td>
											</tr>-->
											<tr>
												<td style="font-family:Arial; font-size:16px; color:#B22C00; padding:0 20px 0 15px">
													$ {{number_format($datos['tota_neto'],2)}} <span style="font-family: Arial, serif, EmojiFont; font-size: 14px; color: rgb(102, 102, 102);">Total </span></td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td height="25" style="font-size:1px">&nbsp;</td>
			</tr>
		</tbody>
	</table>

	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td style="font-family:Arial; font-size:18px; color:#333333; padding-bottom:3px">Envío </td>
			</tr>
			<!--<tr>
				<td style="font-family:Arial; font-size:14px; color:#666666; padding-bottom:10px; line-height:1.4">
					<strong>Express a domicilio </strong><br>
							<span>Llega entre el 7 y 9 de marzo. </span></td>
			</tr>-->
			<tr>
				<td style="font-family:Arial; font-size:14px; color:#666666; line-height:1.4">C. {{$datos['calle_c']}}, N° exterior {{$datos['noexterior_c']}} , N° interior {{$datos['nointerior_c']}} Referencia: 	<br>
					{{$datos['colonia_c']}}<br>
					{{$datos['cp_c']}}, {{$datos['ciudad_c']}}, {{$datos['estado_c']}}<br>
					{{$datos['nombre_c']}}
				</td>
			</tr>
		</tbody>
	</table>

	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td height="25" style="font-size:1px">&nbsp;</td>
			</tr>
		</tbody>
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td style="font-family:Arial; font-size:18px; color:#333333">Pago </td>
			</tr>
			<tr>
				<td height="3" style="font-size:1px">&nbsp;</td>
			</tr>
		</tbody>
	</table>
	
	<!--<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 5px 0">
		<tbody>
			<tr>
				<td width="120" style="font-family:Arial; font-size:14px; color:#666666"><img data-imagetype="External" src="http://img.mlstatic.com/org-img/MP3/API/logos/debvisa.gif" alt="debvisa" border="0" title="debvisa" width="auto" height="auto" style="display:inline; vertical-align:middle"> Visa Débito terminada en 2212 </td>
			</tr>
		</tbody>
	</table>-->
	
	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr style="display:block; padding:5px 0">
				<td width="120" style="font-family:Arial; font-size:14px; color:#666666">Producto </td>
				<td style="font-family:Arial; font-size:14px; color:#666666">&nbsp;&nbsp;$ {{number_format($datos['tota_neto']-$datos['costo_envio'],2)}} </td>
			</tr>
			<tr style="display:block; padding:5px 0">
				<td width="120" style="font-family:Arial; font-size:14px; color:#666666">Envío: </td>
				<td style="font-family:Arial; font-size:14px; color:#666666">&nbsp;&nbsp;$ {{number_format($datos['costo_envio'],2)}} </td>
			</tr>
			<tr style="display:block; padding:5px 0">
				<td valign="top" width="120" style="font-family:Arial; font-size:14px; color:#666666; border-top:solid 1px #DDDDDD; padding:5px 0">
				Total: </td>
				<td valign="top" style="font-family:Arial; font-size:14px; color:#B22C00; border-top:solid 1px #DDDDDD; padding:5px 0">
				&nbsp;&nbsp;$ {{number_format($datos['tota_neto'],2)}} </td>
			</tr>
			<tr>
				<td colspan="2" width="145" style="font-family:Arial; font-size:13px; color:#999999; padding-bottom:5px; line-height:1.4">
					Tu pago aparecerá como MercadoPago en el estado de cuenta de la tarjeta. </td>
			</tr>
		</tbody>
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td height="25" style="font-size:1px">&nbsp;</td>
			</tr>
		</tbody>
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td height="25" style="font-size:1px">
					<hr style="border-top:dotted 1px #ccc; border-bottom:none">
				</td>
			</tr>
		</tbody>
	</table>

	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td style="font-family:Arial; font-size:18px; color:#333333; font-weight:normal; padding-bottom:3px; line-height:1.4">
					¿Y ahora qué tengo que hacer? </td>
			</tr>
			<tr>
				<td style="font-family:Arial; font-size:14px; color:#666666; padding-bottom:25px; line-height:1.4">
					Solo tienes que esperar a que llegue el producto. Cuando esté en camino, te enviaremos un e-mail para que puedas hacer el seguimiento. </td>
			</tr>
		</tbody>
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td style="font-family:Arial; font-size:14px; color:#666666">¡Que lo disfrutes! </td>
			</tr>
			<tr>
				<td style="font-family:Arial; font-size:14px; color:#666666">El equipo de Rojo Carmesí</td>
			</tr>
			<tr>
				<td height="25" style="font-size:1px">&nbsp;</td>
			</tr>
		</tbody>
	</table>

	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:0 20px 0 0">
		<tbody>
			<tr>
				<td style="padding-top:10px; border-top:solid 1px #E8E8E8"><span style="font-family: Arial, serif, EmojiFont; font-size: 12px; color: rgb(153, 153, 153);">No respondas este e-mail.</span></td>
			</tr>
			<tr>
				<td height="15" style="font-size:1px">&nbsp;</td>
			</tr>
		</tbody>
	</table>
		
	<img data-imagetype="External" src="https://www.mercadolibre.com.mx/gz/emails/pixel?email_id=13010592235&amp;email_template=CHO_PAGO_ENVIO&amp;user_id=5797951&amp;email_address=japj784@hotmail.com&amp;site_id=MLM&amp;sent_date=2018-03-04T13:27:49.373-04:00&amp;v=2&amp;business=mercadolibre&amp;hash=042e36d4dc490288a360e465fc975684b261151f" width="1" height="1" border="0" style="display:none!important; visibility:hidden!important"> 
	
</div>