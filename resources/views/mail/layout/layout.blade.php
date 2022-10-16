<!DOCTYPE html>
<html>
<head>
    @include('mail.layout.head')
</head>
<body width="100%" bgcolor="#fff" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; margin: auto; background: #fff; text-align: left;">
        <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        </div>
        <div style="max-width: 680px; margin: 50px auto; border-radius: 5px;" class="email-container">
            @include('mail.layout.header')
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px; border-bottom: 1px solid #e8e7e5; border-left: 1px solid #e8e7e5; border-right: 1px solid #e8e7e5;" class="email-container">
                <tr>
                    <td bgcolor="#ffffff">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            @yield('content')
                            @include('mail.layout.footer')
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>
</html>