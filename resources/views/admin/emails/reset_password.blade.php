<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Password Reset</title>
    <style type="text/css" rel="stylesheet" media="all">
    .email-wrapper,body{background-color:#F2F4F6}.body-action,.email-footer,.email-masthead{text-align:center}.button,body{-webkit-text-size-adjust:none}:not(br):not(tr):not(html){font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;box-sizing:border-box}body{width:100%!important;height:100%;margin:0;line-height:1.4;color:#74787E}.email-content,.email-wrapper{width:100%;-premailer-width:100%;-premailer-cellpadding:0;-premailer-cellspacing:0;margin:0;padding:0}a{color:#3869D4}a img{border:none}.body-sub,.email-body{border-top:1px solid #EDEFF2}td{word-break:break-word}.email-body,.email-body_inner{background-color:#FFF}.email-masthead{padding:25px 0}.email-masthead_logo{width:94px}.email-masthead_name{font-size:16px;font-weight:700;color:#bbbfc3;text-decoration:none;text-shadow:0 1px 0 #fff}.email-body{width:100%;margin:0;padding:0;-premailer-width:100%;-premailer-cellpadding:0;-premailer-cellspacing:0;border-bottom:1px solid #EDEFF2}.email-body_inner,.email-footer{width:570px;margin:0 auto;-premailer-width:570px;padding:0;-premailer-cellpadding:0;-premailer-cellspacing:0}.email-footer p{color:#AEAEAE}.body-action{width:100%;margin:30px auto;padding:0;-premailer-width:100%;-premailer-cellpadding:0;-premailer-cellspacing:0}.body-sub{margin-top:25px;padding-top:25px}.content-cell{padding:35px}.preheader{display:none!important;visibility:hidden;mso-hide:all;font-size:1px;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden}@media only screen and (max-width:600px){.email-body_inner,.email-footer{width:100%!important}}@media only screen and (max-width:500px){.button{width:100%!important}}.button{background-color:#3869D4;border-top:10px solid #3869D4;border-right:18px solid #3869D4;border-bottom:10px solid #3869D4;border-left:18px solid #3869D4;display:inline-block;color:#FFF;text-decoration:none;border-radius:3px;box-shadow:0 2px 3px rgba(0,0,0,.16)}h1,h2,h3{color:#2F3133;font-weight:700;margin-top:0;text-align:left}.button--green{background-color:#1976d2;border-top:10px solid #1976d2;border-right:18px solid #1976d2;border-bottom:10px solid #1976d2;border-left:18px solid #1976d2}h1{font-size:19px}h2{font-size:16px}h3{font-size:14px}p{margin-top:0;color:#74787E;font-size:16px;line-height:1.5em;text-align:left}p.sub{font-size:12px}p.center{text-align:center}
    </style>
</head>
<body>
    <span class="preheader">Use this link to reset your password.</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="email-masthead">
                            <a href="javascript:void(0);" class="email-masthead_name"><img src="{{ URL::asset('assets/img/admin-logo.png') }}"/></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-cell">
                                        <h1>Hi, {{ $_name }}</h1>
                                        <p>You are receiving this email because we received a password reset request for your account.</p>
                                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center">
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>
                                                                            <a href="{{ url('admin/reset',$_token) }}" class="button button--green" target="_blank">Reset your password</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <p>If you did not request a password reset, no further action is required.</p>
                                        <p>Thanks</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-cell" align="center">
                                        <p class="sub align-center">&copy; 2018 D-Support All rights reserved.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>