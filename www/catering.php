<?php
//Send Admin 

$adminEmail = "NILA Restaurant <kongsberg@nilarestaurant.no>";
$contactEmail = $adminEmail;


$name  = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $subject = "Hello " . $name . " you just inquiry on Nila Restaurant";
    $subject2 = $name ." has a catering inquiry.";
    // To send HTML mail, the Content-type header must be set.
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:' . $adminEmail . "\r\n"; // Sender's Email

    $headers2 = 'MIME-Version: 1.0' . "\r\n";
    $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers2 .= 'From:' . $adminEmail . "\r\n"; // Sender's Email

    $template = '<html xmlns="http://www.w3.org/1999/xhtml">'
                .'<head>'
                .'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'
                .'<title>NILA Restaurant</title>'
                .'</head>'
                .'<body bgcolor="#eae9ea" style="margin:0; padding:0;">'
                .'<table bgcolor="#eae9ea" width="600" align="center" style="font-family:Arial; font-size: 15px; background:#eae9ea; color: #666666" border="0" cellspacing="0" cellpadding="0">'
                .'<tr>'
                .'<td height="20">&nbsp;</td>'
                .'</tr>'
                .'<tr>'
                    .'<td>'
                        .'<table width="100%" background="#eae9ea" cellpadding="0" cellspacing="0" border="0" style="background:#eae9ea;">'
                            .'<tr>'
                                .'<td width="20">&nbsp;</td>'
                                .'<td><a href="#"><img src="https://nilarestaurant.no/images/logo.png" width="190" height="39" style="display:block; border:0; max-width:100%" alt="NILA Logo" /></a></td>'
                            .'</tr>'
                        .'</table>'
                    .'</td>'
                .'</tr>'
                .'<tr>'
                    .'<td height="20">&nbsp;</td>'
                .'</tr>'
                .'<tr>'
                    .'<td><img src="https://nilarestaurant.no/images/line.gif" width="600" height="2" style="display:block; border:0" /></td>'
                .'</tr>'
                .'<tr>'
                    .'<td>'
                        .'<table width="100%" background="#ffffff" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;">'
                            .'<tr>'
                                .'<td width="20">&nbsp;</td>'
                                .'<td>'
                                    .'<table width="100%" background="#ffffff" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;">'
                                        .'<tr>'
                                            .'<td height="20">&nbsp;</td>'
                                        .'</tr>'
                                        .'<tr>'
                                            .'<td style="font-size:16px; font-weight:normal; color:#000000;">Hello,</td>'
                                        .'</tr>'
                                        .'<tr>'
                                            .'<td height="20">&nbsp;</td>'
                                        .'</tr>'
                                        .'<tr>'
                                            .'<td style="font-size:16px; font-weight:normal; color:#000000;">Thank you for filling out your information! <br /><br />We will look over your message and get back to you shortly.</td>'
                                        .'</tr>'
                                        .'<tr>'
                                            .'<td height="20">&nbsp;</td>'
                                        .'</tr>'
                                        .'<tr>'
                                            .'<td style="font-size:16px; font-weight:normal; color:#000000;">You have submitted following information: <br><br> Event Detail : ' . $name . '<br>Email: ' .$email. '<br>Phone No: ' .$phone. '</td>'
                                        .'</tr>'
                                        .'<tr>'
                                            .'<td height="100">&nbsp;</td>'
                                        .'</tr>'
                                        .'<tr>'
                                            .'<td>Regards,<br /><font color="#000000">NILA Team</font></td>'
                                        .'</tr>'
                                        .'<tr>'
                                            .'<td width="20">&nbsp;</td>'
                                        .'</tr>'
                                    .'</table>'
                                .'</td>'
                                .'<td width="20">&nbsp;</td>'
                            .'</tr>'
                        .'</table>'
                    .'</td>'
                .'</tr>'
                .'<tr>'
                    .'<td><img src="https://nilarestaurant.no/images/line.gif" width="600" height="2" style="display:block; border:0" /></td>'
                .'</tr>'
                .'<tr>'
                    .'<td height="20">&nbsp;</td>'
                .'</tr>'
                .'<tr>'
                    .'<td>'
                        .'<table width="100%" background="#eae9ea" cellpadding="0" cellspacing="0" border="0" style="background:#eae9ea; text-align:center;" align="center">'
                                                    .'<tr>'
                                .'<td height="10" style="font-size:10px; line-height:10px; color:#eae9ea;">&nbsp;</td>'
                            .'</tr>'
                            .'<tr>'
                                .'<td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size: 10px;color: #999999">Copyright © 2022 nilarestaurant.no. All Rights Reserved.</td>'
                            .'</tr>'
                        .'</table>'
                    .'</td>'
                .'</tr>'
                .'<tr>'
                    .'<td height="20">&nbsp;</td>'
                .'</tr>'
            .'</table>'
            .'</body>'
            .'</html>';
            
            $template2 = '<html xmlns="http://www.w3.org/1999/xhtml">'
            .'<head>'
            .'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'
            .'<title>NILA Restaurant</title>'
            .'</head>'
            .'<body bgcolor="#eae9ea" style="margin:0; padding:0;">'
            .'<table bgcolor="#eae9ea" width="600" align="center" style="font-family:Arial; font-size: 15px; background:#eae9ea; color: #666666" border="0" cellspacing="0" cellpadding="0">'
            .'<tr>'
            .'<td height="20">&nbsp;</td>'
            .'</tr>'
            .'<tr>'
                .'<td>'
                    .'<table width="100%" background="#eae9ea" cellpadding="0" cellspacing="0" border="0" style="background:#eae9ea;">'
                        .'<tr>'
                            .'<td width="20">&nbsp;</td>'
                            .'<td><a href="#"><img src="https://nilarestaurant.no/images/logo.png" width="190" height="39" style="display:block; border:0; max-width:100%" alt="NILA Logo" /></a></td>'
                        .'</tr>'
                    .'</table>'
                .'</td>'
            .'</tr>'
            .'<tr>'
                .'<td height="20">&nbsp;</td>'
            .'</tr>'
            .'<tr>'
                .'<td><img src="https://nilarestaurant.no/images/line.gif" width="600" height="2" style="display:block; border:0" /></td>'
            .'</tr>'
            .'<tr>'
                .'<td>'
                    .'<table width="100%" background="#ffffff" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;">'
                        .'<tr>'
                            .'<td width="20">&nbsp;</td>'
                            .'<td>'
                                .'<table width="100%" background="#ffffff" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;">'
                                    .'<tr>'
                                        .'<td height="20">&nbsp;</td>'
                                    .'</tr>'
                                    .'<tr>'
                                        .'<td style="font-size:16px; font-weight:normal; color:#000000;">Hey Team,</td>'
                                    .'</tr>'
                                    .'<tr>'
                                        .'<td height="20">&nbsp;</td>'
                                    .'</tr>'                                            
                                    .'<tr>'
                                        .'<td style="font-size:16px; font-weight:normal; color:#000000;">A new catering event has been placed. Please check below submitted query.</td>'
                                    .'</tr>'
                                    .'<tr>'
                                        .'<td height="20">&nbsp;</td>'
                                    .'</tr>'
                                    .'<tr>'
                                        .'<td style="font-size:16px; font-weight:normal; color:#000000;">Website Contact Information: <br><br> Event Detail : ' . $name . '<br>Email: ' .$email. '<br>Phone No: ' .$phone. '</td>'
                                    .'</tr>'
                                    .'<tr>'
                                        .'<td height="100">&nbsp;</td>'
                                    .'</tr>'
                                    .'<tr>'
                                        .'<td>Regards,<br /><font color="#000000">NILA Team</font></td>'
                                    .'</tr>'
                                    .'<tr>'
                                        .'<td width="20">&nbsp;</td>'
                                    .'</tr>'
                                .'</table>'
                            .'</td>'
                            .'<td width="20">&nbsp;</td>'
                        .'</tr>'
                    .'</table>'
                .'</td>'
            .'</tr>'
            .'<tr>'
                .'<td><img src="https://nilarestaurant.no/images/line.gif" width="600" height="2" style="display:block; border:0" /></td>'
            .'</tr>'
            .'<tr>'
                .'<td height="20">&nbsp;</td>'
            .'</tr>'
            .'<tr>'
                .'<td>'
                    .'<table width="100%" background="#eae9ea" cellpadding="0" cellspacing="0" border="0" style="background:#eae9ea; text-align:center;" align="center">'
                         .'<tr>'
                            .'<td height="10" style="font-size:10px; line-height:10px; color:#eae9ea;">&nbsp;</td>'
                        .'</tr>'
                        .'<tr>'
                            .'<td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size: 10px;color: #999999">Copyright © 2022 nilarestaurant.no. All Rights Reserved.</td>'
                        .'</tr>'
                    .'</table>'
                .'</td>'
            .'</tr>'
            .'<tr>'
                .'<td height="20">&nbsp;</td>'
            .'</tr>'
        .'</table>'
        .'</body>'
        .'</html>';
    
        $sendmessage2 = "<div style=\"background-color:#eae9ea; color:white;\">" . $template2 . "</div>";
        // Message lines should not exceed 70 characters (PHP rule), so wrap it.
        $sendmessage2 = wordwrap($sendmessage2, 70);

    $sendmessage = "<div style=\"background-color:#eae9ea; color:white;\">" . $template . "</div>";
    // Message lines should not exceed 70 characters (PHP rule), so wrap it.
    
    $sendmessage = wordwrap($sendmessage, 70);
    // Send mail by PHP Mail Function.
    mail($email, $subject, $sendmessage, $headers);                                           
    mail($contactEmail, $subject2, $sendmessage2, $headers2);
    echo "Your Query has been received, We will contact you soon.";
} else {
    echo $email . "<span>* invalid email *</span>";
}
?>