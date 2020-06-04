<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
class MailHelper
{
    private $Config = null;
    private $SMTPDebug = false;
    private $IsSMTP = true;
    private $SMTPAuth = true; 
    private $SMTPSecure = false;
    private $CharSet = 'UTF-8'; 
    private $From = null;
    private $FromName = null;
    private $To = null;
    private $ToName = null;
    private $WordWrap = 50;
    private $Subject = null;
    private $CC = [];
    private $Body = null;
    private $View = null;
    private $data = null;
    private $SmtpOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
    function setConfig($_config) {

        $this->Config = $_config;
        return $this;
    }

    public function setSMTPDebug($_SMTPDebug){

        $this->SMTPDebug = $_SMTPDebug;
        return $this;
    }
    public function setIsSMTP($_isSMTP){

        $this->IsSMTP = $_isSMTP;
        return $this;
    }
    public function setSMTPAuth($_SMTPAuth){

        $this->SMTPAuth = $_SMTPAuth;
        return $this;
    }

    public function setSMTPSecure( $_SMTPSecure ){

        $this->SMTPSecure = $_SMTPSecure;
        return $this;
    }

    public function setCharSet($_CharSet){

        $this->CharSet = $_CharSet;
        return $this;
    }

    public function setFrom( $_From ){

        $this->From = $_From;
        return $this;
    }

    public function setFromName( $_FromName ){

        $this->FromName = html_entity_decode($_FromName , ENT_QUOTES);
        return $this;
    }

    public function setTo( $_To ){

        $this->To = $_To;
        return $this;
    }

    public function setToName( $_ToName ){

        $this->ToName = html_entity_decode($_ToName , ENT_QUOTES);
        return $this;
    }

    public function setWordWrap( $_WordWrap ){

        $this->WordWrap = $_WordWrap;
        return $this;
    }

    public function setSubject( $_Subject ){

        $this->Subject = $_Subject;
        return $this;
    }

    public function setBody( $_Body ){

        $this->Body = $_Body;
        return $this;
    }

    public function setView( $_View ){

        $this->View = $_View;
        return $this;
    }

    public function setCC( $_CC = array() ){

        $this->CC = $_CC;
        return $this;
    }

    public function setData( $_Data ){
        $this->data = $_Data;
        return $this;
    }

    private function template()
    {
        if( !$this->View ){
            return "";
        }
        // Make values in the associative array easier to access by extracting them
        if (is_array($this->data)) {
            extract($this->data);
        }
        // buffer the output (including the file is "output")
        ob_start();
        include $this->View;
        return ob_get_clean();
    }
    /**
     * create mail function in order to send mail
     * 
     * initial config for object mailler such as smtp, email from - to, charset, ...
     *
     * @param  mixed $args contain data of set up default for phpmailler run such as teamplate view, seting of ssl, CharSet, ...
     * @param  mixed $ojbMail
     *
     * @return void
     */
    public function create()
    {
        
        $mail = new PHPMailer();
        if( $this->IsSMTP ){
            $mail->IsSMTP();
        }
        $mail->SMTPDebug = 0;
        
        $mail->Host = $this->Config['email']['smtp']['host'];
        $mail->Port = $this->Config['email']['smtp']['port'];

        $mail->Username = $this->Config['email']['username'];
        $mail->Password = $this->Config['email']['password'];


        $mail->SMTPAuth = $this->SMTPAuth; 
        $mail->SMTPSecure = $this->SMTPSecure;

        $mail->SMTPOptions = $this->SmtpOptions;
        $mail->CharSet = $this->CharSet; 
        
        $mail->From = $this->From;
        $mail->FromName = $this->FromName;
        $mail->AddAddress($this->To, $this->ToName);
        $mail->AddReplyTo($this->From, $this->FromName );
        foreach($this->CC as $email){
            
            $mail->AddCC($email);
        }
        $mail->WordWrap = $this->WordWrap; 
        $mail->IsHTML(true); 
        $mail->Subject = $this->Subject;

        if( !$this->Body ){
            $this->Body = $this->template();
        }
            
        $mail->Body = $this->Body;
        return $mail;
    }
}

