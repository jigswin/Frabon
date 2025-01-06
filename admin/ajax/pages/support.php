<?php 
    session_start(); 
    include "../../../config/config.php";
    require '../../../mailer/PHPMailerAutoload.php';

    if($_POST['flag'] == 'create_ticket') { 

        $files = '';
        foreach ($_POST['array'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/support/' . $new_name;
            
            if(file_put_contents($path, file_get_contents($url))) {
                if($files == '') {
                    $files .= $new_name;
                } else {
                    $files .= ',' . $new_name;
                }              
            }
        }

        $qry = mysqli_query($con, "SELECT * FROM admin WHERE role = 'admin' ");
        $data = mysqli_fetch_assoc($qry);

        $ticket = substr(str_shuffle('0123456789'), 0, 10);

        $subject = $_POST['subject'];
        $text = $_POST['text'];
        $email = $data['email'];
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        $date = $_POST['date'];
        $status = 0;
        $user_key = USER_KEY;
        $img_path = $_SESSION['path'].'admin/images/support/';

        $stmt = $sup_con->prepare("INSERT INTO `support` (`user_key`, `subject`, `problem`, `ticket`, `customer_email`, `image`, `img_path`, `user_id`, `user_name`, `created_date`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
        $stmt->bind_param("sssssssssss", $user_key,$subject,$text,$ticket,$email,$files,$img_path,$user_id,$user_name,$date,$status);
        
        if($stmt->execute()) {
            $id = $sup_con->insert_id;
            insertLog($con, "support" , $id, '','Support add');
            echo 1;

            $query = mysqli_query($sup_con, "SELECT * FROM `detail` ");
            $row = mysqli_fetch_assoc($query);

            // support team
            $mes = '<div>'.TITLE.' created new ticket.</div><br><div>Ticket id is '.$ticket.'.</div><div style="line-height:20px;">Subject : '.$_POST['subject'].'</div><div style="line-height:20px;">Problem : '.$_POST['text'].'</div>';
            sendMail($row['email'], 'Ticket Created', $mes, $files);

            if($data['user_id'] == $_SESSION['user_id']) {
                // client admin
                $mes = '<div>Your ticket Created successfully, we can contact you soon.</div><br><div>Your ticket id is '.$ticket.'.</div><div style="line-height:20px;">Subject : '.$_POST['subject'].'</div><div style="line-height:20px;">Problem : '.$_POST['text'].'</div>';
                sendMail($data['email'], 'Ticket Created', $mes, $files);
            }
            else {
                // client admin
                $mes = '<div>'.$data['name'].' New ticket created, we can contact you soon.</div><br><div>Your ticket id is '.$ticket.'.</div><div style="line-height:20px;">Subject : '.$_POST['subject'].'</div><div style="line-height:20px;">Problem : '.$_POST['text'].'</div>';
                sendMail($data['email'], 'Ticket Created', $mes, $files);
    
    
                $qry1 = mysqli_query($con, "SELECT `email` FROM admin WHERE user_id = '{$_SESSION['user_id']}' ");
                $data1 = mysqli_fetch_assoc($qry1);
        
                // client user
                $mes = '<div>Your ticket Created successfully, we can contact you soon.</div><br><div>Your ticket id is '.$ticket.'.</div><div style="line-height:20px;">Subject : '.$_POST['subject'].'</div><div style="line-height:20px;">Problem : '.$_POST['text'].'</div>';
                sendMail($data1['email'], 'Ticket Created', $mes, $files);
            }
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'ticket_reply') {
        $files = '';
        foreach ($_POST['array'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/support/' . $new_name;
            
            if(file_put_contents($path, file_get_contents($url))) {
                if($files == '') {
                    $files .= $new_name;
                } else {
                    $files .= ',' . $new_name;
                }              
            }
        }

        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        $is_client = 1;
        $ticket = $_POST['id'];
        $mes = $_POST['mes'];
        $date = $_POST['date'];

        $stmt = $sup_con->prepare("INSERT INTO `support_chat` (`ticket_id`, `user_id`, `user_name`, `is_client`, `message`, `image`, `datetime`) VALUES (?, ?, ?, ?, ?, ?, ?) ");
        $stmt->bind_param("sssssss", $ticket,$user_id,$user_name,$is_client,$mes,$files,$date);
        
        if($stmt->execute()) {
            echo 1;

            $query = mysqli_query($sup_con, "SELECT * FROM `detail` ");
            $row = mysqli_fetch_assoc($query);

            // support team
            $mes = '<div>'.$user_name.' replied on ticket '.$ticket.'.</div><div style="line-height:20px;">Message : '.$_POST['mes'].'</div>';
            sendMail($row['email'], 'Ticket Reply', $mes, $files);
        } else {
            echo 2;
        }
    }

    function sendMail($email, $sub, $mes, $files) {

        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = Host;  
        $mail->SMTPAuth = SMTPAuth;  
        $mail->SMTPSecure = SMTPSecure;  
        $mail->SMTPAutoTLS = SMTPAutoTLS; 
        $mail->Port = Port;  
        $mail->Host = Host1; 
    
        $mail->Username = EMAIL;                 
        $mail->Password = PASS;       
        $mail->setFrom(EMAIL, '');    
        $mail->addAddress($email);
        $mail->addReplyTo('');
        $mail->isHTML(true);      

        $array = explode(",", $files);
        foreach ($array as $val) {
            $mail->addAttachment('../../images/support/'.$val, $val);     
        }                                

        $mail->Subject = $sub;
        $mail->Body = '<div style="width: 100%;max-width: 600px;border:1px solid lightgrey;margin:auto;">
                        <div style="background-color: #0e76a8;color:#FFF;font-size: 30px;text-align: center;padding: 10px;">
                            '.TITLE.'
                        </div>
                        <div style="padding: 20px;letter-spacing: .7px;font-size: 15px;">
                            '.$mes.'
                        </div>
                    </div>';

        if($mail->send()) { return 1; } 
        else { return 2; } 
    }

?>