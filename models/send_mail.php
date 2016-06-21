<?php
function Send_Mail($to, $subject, $body)
{
// khai bao thu vien phpmailer
    require "../public/PHPMailer/class.phpmailer.php";

// khai bao tao PHPMailer
    $mail = new PHPMailer();
//Khai bao gui mail b?ng SMTP
    $mail->IsSMTP();
//Tat mo kiem tra loi tra ve, chap nhan cac gia tri 0 1 2
// 0 = off ko thong bao bat ki gi, tot nhat nen dung khi da hoan thanh.
// 1 = thong bao loi client
// 2 = thong bao loi ca client va server
    $mail->SMTPDebug = 0;

    $mail->Debugoutput = "html"; // loi tra ve hien thi cau truc HTML
    $mail->Host = "smtp.gmail.com"; //host smtp de gui mail
    $mail->Port = 587; // cong de gui mail
    $mail->SMTPSecure = "tls"; //Phuong thuc ma hoa thu - ssl hoac tls

    $mail->SMTPAuth = true; //xac thuc SMTP
    $mail->Username = "vutukien1995@gmail.com"; // Ten tk gmail
    $mail->Password = "hackertheky"; //Mat khau gmail
    $mail->SetFrom("vutukien1995@gmail.com", "Admin email"); // thong tin nguoi gui
    $mail->AddReplyTo("vutukien1995@gmail.com", "Admin Reply");// an dinh email se nhan khi nguoi dung reply lai.
    $mail->AddAddress($to, $to);//Email cua nguoi nhan

    $mail->Subject = $subject; //Tieu de thu
    $mail->MsgHTML($body); //Noi dung thu

// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
// Gui thu tap tin html
//$mail->AltBody = "This is a plain-text message body";//N?i dung r�t g?n hi?n th? b�n ngo�i thu m?c thu.
//$mail->AddAttachment("images/attact-tui.gif");//Tap tin can attach

//Gui email va kiem tra loi
    if (!$mail->Send()) {
        //echo "Co loi khi gui mail: " . $mail->ErrorInfo;
        return($mail->ErrorInfo);
    } else {
        //echo "Gui thu thanh cong !!";
        return("1");
    }

}

?>