<?php
session_start();
$email = $_SESSION['email'];
function send_reg_email($email)
{
    global $pdo;
    $email = addslashes($email);

    // Send email here
    //mail($mail, 'Website: reset password', 'your code is ' . $code);
    send_mail($email, '[ASAKI] Shizumi account creation', '
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href=\'https://fonts.googleapis.com/css?family=PT Sans\' rel=\'stylesheet\'>
        <link rel="stylesheet" href="email.css">
    </head>
    <body>
        <table border="0" cellspacing="0" cellpadding="0" role="presentation" width="100%">
            <tr>
                <td bgcolor="transparent" style="font-size: 0;">&​nbsp;</td>
                <td bgcolor="#505050" width="600" class="box">
                    <h1 style="color: #fff;">Shizumi account</h1>
                    <p style="color: #fff;">Hi, Welcome to Shizumi ! Your account has been created successfully ! You can login now !</p>
                    <p style="color: #009fff;"><a href="#">Access Shizumi</a></p>
                </td>
                <td bgcolor="#505050">&​nbsp;</td>
                <td bgcolor="#505050" style="color: #fff;">
                    <p><i>If you didn\'t created an account with this email, this can be a mistake. <a href="#">Contact us</a></i></p>
                </td>
                <td bgcolor="transparent" style="font-size: 0;">&​nbsp;</td>
            </tr>
          </table>
    </body>
    </html>
    ');
}
?>