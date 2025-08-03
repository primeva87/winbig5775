<?php
class PHPMailer {
    public $Host, $Port = 587, $SMTPAuth = false, $Username, $Password;
    public $From, $FromName, $Subject, $Body, $AltBody;
    private $to = array();
    public function __construct() {}
    public function isHTML() {}
    public function isSMTP() {}
    public function addAddress($address) { $this->to[] = $address; return true; }
    public function send() { return true; }
    public function SmtpConnect() { return true; }
}
?>
