<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>BD Marriage Media</title>
  <style type="text/css">
    body {
      margin: 0; padding: 0; min-width: 100%!important;
    }
    .content {
      width: 100%; max-width: 600px;
      border: 2px solid #d9e6ce;
    }
    .header {
      padding: 15px 30px 20px 30px;
    }
    .innerpadding {
      padding: 30px 30px 30px 30px;
    }
    .borderbottom {
      border-bottom: 1px solid #9a7b7b;
    }
    .h1, .h2, .bodycopy {
      color: #153643; font-family: sans-serif;
    }
    .h1 {
      font-size: 33px; line-height: 38px; font-weight: bold;
    }
    .h2 {
      padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;
    }
    .button {
      background-color: #4CAF50;
      color: white;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      cursor: pointer;
    }
    .bodycopy {
      font-size: 16px; line-height: 22px;
    }
    .footer {
      padding: 20px 30px 15px 30px;
    }
    .footercopy {
      font-family: sans-serif; font-size: 14px; color: #ffffff;
    }
    .footercopy a {
      color: #ffffff; text-decoration: underline;
    }
    @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
      body[yahoo] .hide {display: none!important;}
      body[yahoo] .buttonwrapper {background-color: transparent!important;}
      body[yahoo] .button {padding: 0px!important;}
      body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
      body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;
      }
    }
    /*@media only screen and (min-device-width: 601px) {
      .content {width: 600px !important;}
      .col425 {width: 425px!important;}
      .col380 {width: 380px!important;}
    }*/
  </style>
</head>

<body yahoo bgcolor="#f6f8f1">
<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td>  
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td bgcolor="#e1f6ce" class="header">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h2" style="padding: 5px 0 0 0; color: #cf51a4; text-align: center;">
               BD Marriage Media
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="bodycopy">
                <h4>Dear {{$user->first_name}},</h4><br>
                
                <h5>Your account successfully verified. Please complete your profile -  
                <a href="{{ route('login') }}" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #3869D4;">
                  Login
                </a></h5> <br><br>

                <h4 style="margin-bottom: 5px;">Thank you, <br>
                  BD Marriage Media
                </h4>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="innerpadding bodycopy" style="color: #ab5701;">
          For Any Queries, Please mail to <a href="mailto:contact@bdmarriagemedia.com"><b>contact@bdmarriagemedia.com</b></a> </td>
      </tr>
      <tr>
        <td class="footer" bgcolor="#e1f6ce">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" class="footercopy" style="color: #cf51a4">
                BD Marriage Media © <script type="text/JavaScript"> document.write(new Date().getFullYear()); </script> All rights reserved<br/>
                <a href="#" class="unsubscribe"><font color="#cf51a4">Unsubscribe</font></a> 
                <span class="hide">If don't like these emails</span>
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
