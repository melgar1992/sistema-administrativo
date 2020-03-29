<?php
/**
 * QR_BarCode - Barcode QR Code Image Generator
 * @author CodexWorld
 * @url http://www.codexworld.com
 * @license http://www.codexworld.com/license/
 */
class QR_BarCode{
    // Google Chart API URL
    private $googleChartAPI = 'http://chart.apis.google.com/chart';
    // Code data
    private $codeData;
    
    /**
     * URL QR code
     * @param string $url
     */
    public function url($url = null){
        $this->codeData = preg_match("#^https?://#", $url) ? $url : "http://{$url}";
    }
    
    /**
     * Text QR code
     * @param string $text
     */
    public function text($text){
        $this->codeData = $text;
    }
    
    /**
     * Email address QR code
     *
     * @param string $email
     * @param string $subject
     * @param string $message
     */
    public function email($email = null, $subject = null, $message = null) {
        $this->codeData = "MATMSG:TO:{$email};SUB:{$subject};BODY:{$message};;";
    }
    
    /**
     * Phone QR code
     * @param string $phone
     */
    public function phone($phone){
        $this->codeData = "TEL:{$phone}";
    }
    
    /**
     * SMS QR code
     *
     * @param string $phone
     * @param string $text
     */
    public function sms($phone = null, $msg = null) {
        $this->codeData = "SMSTO:{$phone}:{$msg}";
    }
    
    /**
     * VCARD QR code
     *
     * @param string $name
     * @param string $address
     * @param string $phone
     * @param string $email
     */
    public function contact($name = null, $address = null, $phone = null, $email = null) {
        $this->codeData = "MECARD:N:{$name};ADR:{$address};TEL:{$phone};EMAIL:{$email};;";
    }
    
    /**
     * Content (gif, jpg, png, etc.) QR code
     *
     * @param string $type
     * @param string $size
     * @param string $content
     */
    public function content($type = null, $size = null, $content = null) {
        $this->codeData = "CNTS:TYPE:{$type};LNG:{$size};BODY:{$content};;";
    }
    
    /**
     * Generate QR code image
     *
     * @param int $size
     * @param string $filename
     * @return bool
     */
    public function qrCode($size = 200, $filename = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->googleChartAPI);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($this->codeData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $img = curl_exec($ch);
        curl_close($ch);
    
        if($img) {
            if($filename) {
                if(!preg_match("#.png$#i", $filename)) {
                    $filename .= ".png";
                }
                
                return file_put_contents($filename, $img);
            } else {
                header("Content-type: image/png");
                print $img;
                return true;
            }
        }
        return false;
    }
}
?>