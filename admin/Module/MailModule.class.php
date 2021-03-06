<?php
class MailModule
{
    // 发送邮件
    public function send($address, $name, $subject, $body)
    {
        try {
            include_once arCfg('EXTENSION_DIR') . 'PHPMailer' . DS . 'class.phpmailer.php';
            $mail = new PHPMailer(true); //建立邮件发送类
            $mail->CharSet = "UTF-8";
            $mail->IsSMTP(); // 使用SMTP方式发送
            $mail->Host = "smtp.163.com"; // 您的企业邮局域名
            $mail->SMTPAuth = true; // 启用SMTP验证功能
            $mail->Username = "13688327275@163.com"; // 邮局用户名(请填写完整的email地址)
            $mail->Password = "665690"; // 邮局密码
            $mail->Port = 25;
            $mail->From = "13688327275@163.com"; //邮件发送者email地址
            $mail->FromName = "智赢世纪";
            $mail->AddAddress($address, $name);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
            //$mail->AddReplyTo("", "");
            //$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
            //$mail->AddAttachment("d:/aa.txt"); // 添加附件
            $mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
            $mail->Subject = $subject; //邮件标题
            $mail->Body = $body;
            //$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
            if(!$mail->Send())
            {
                return false;
            }
            return true;
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }

    }

}
