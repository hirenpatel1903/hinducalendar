@extends('mail.layout.layout')
@section('content')

<tr>
	<td style="padding: 10px 30px 30px; font-family: 'Open Sans','Lucida Grande','Segoe UI',Arial,Verdana,'Lucida Sans Unicode',Tahoma,'Sans Serif'; font-size: 11pt; line-height: 27px; color: #444; text-align: left;">
            <p style="margin: 0;">Hello {{$name}},</p>
	</td>
</tr>
<tr>
	<td style="padding: 0 30px 30px; font-family: 'Open Sans','Lucida Grande','Segoe UI',Arial,Verdana,'Lucida Sans Unicode',Tahoma,'Sans Serif'; font-size: 11pt; line-height: 27px; color: #444; text-align: left;">
		<p style="margin: 0;">We have received a request of forgot password. Please click on the below link to Reset your password</p>
	</td>
</tr>
<tr>
	<td style="padding: 0 30px 30px; font-family: 'Open Sans','Lucida Grande','Segoe UI',Arial,Verdana,'Lucida Sans Unicode',Tahoma,'Sans Serif'; font-size: 11pt; line-height: 27px; color: #444;">
		<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
			<tr>
				<td style="border-radius: 5px; background: #005854; text-align: center; padding: 10px 20px;" class="button-td">
					<a href="{{url('/forgot-password/'.$token)}}" style="background: #005854; font-family: 'Open Sans','Lucida Grande','Segoe UI',Arial,Verdana,'Lucida Sans Unicode',Tahoma,'Sans Serif'; font-size: 11pt; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 5px; font-weight: bold;" class="button-a">
						<span style="color:white;" class="button-link">Reset My password</span>
					</a>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td style="padding: 0 30px 30px; font-family: 'Open Sans','Lucida Grande','Segoe UI',Arial,Verdana,'Lucida Sans Unicode',Tahoma,'Sans Serif'; font-size: 11pt; line-height: 27px; color: #444; text-align: left;">
		<p style="margin: 0;">If you believe that this is a mistake and you do not intend to change your password, you can simply ignore this message and nothing else will happen</p>
	</td>
</tr>
@stop