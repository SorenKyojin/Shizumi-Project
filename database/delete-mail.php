<?php
$email = $_SESSION['email'];
function send_email($email)
{
    global $pdo;

    $expire = time() + (60 * 2);
    $code = rand(100000, 999999);
    $email = addslashes($email);

    $query = "INSERT INTO codes (email, code, expire) VALUES (:email, :code, :expire)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':expire', $expire);
    $stmt->execute();

    $_SESSION['code'] = $code;

    // Send email here
    //mail($mail, 'Website: reset password', 'your code is ' . $code);
    send_mail($email, '[ASAKI] Shizumi account removal', '
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
                  <p style="color: #fff;">Hello, we are sorry to see you leaving. Here is your code: <b>' . $code . '</b></p>
                </td>
                <td bgcolor="transparent" style="font-size: 0;">&​nbsp;</td>
            </tr>
          </table>
    </body>
    </html>
    ');
}
?>