<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
    <tr>
        <td>
            <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <br>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:570px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">

                            <tr>

                                <td style="padding:0 35px;">
                                    <h1 style="color:#1d9bf0; font-weight:500; margin-top:2px;font-size:15px;font-family:Arial, Helvetica, sans-serif;text-align:center ; line-height:2"><span style="font-weight:750; color:#3574e3; font-size:60px">webapp</span> </h1>
                                    <br>
                                    <h1 style="color:#455056; font-weight:bold; margin:0;font-size:25px;font-family:'Rubik',sans-serif; text-align:start;  ">Bună, <span>{{$name}}</span></h1>
                                    <br>
                                    <h1 style="color:#455056; font-weight:500; margin-top:2px;font-size:20px;font-family:'Rubik',sans-serif;text-align:justify;">Ne-ai rugat să-ți resetam parola contului creat pe site-ul nostru. Pentru a continua, fă clic pe butonul de mai jos și setează o nouă parolă.</h1>
                                    <br>
                                    <br>
                                    <a href="{{route('password.reset', ['token'=>$token, 'email'=>$email])}}"style="background:#ff7a59;text-decoration:none !important; font-weight:500; margin-top:30px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;">RESETEAZĂ PAROLA</a>
                                    <h1 style="color:#455056; font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif;text-align:center ;margin-bottom:30px;">Acest link va expira in <span style="color:red;">{{$count}}</span> de minute</h1>
                                    <span style=" margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                    <h1 style="color:#455056; font-weight:500; margin-top:2px;font-size:20px;font-family:'Rubik',sans-serif;text-align:justify;">Nu tu ai solicitat schimbarea? Ei bine, poți igonora acest email :)</h1>

                                    <h1 style="color:#455056; font-weight:500; margin-top:2px;font-size:15px;font-family:Arial, Helvetica, sans-serif;text-align:center ; line-height:2">Thanks, <span style="font-weight:750; color:#3574e3">webapp Inc.</span> </h1>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>

</html>
