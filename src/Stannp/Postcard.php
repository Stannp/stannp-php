<?php 
/**
 * 
 * 
 * 
 */

namespace Stannp\Stannp;
use Stannp\StannpPhp as StannpPhp;



class Postcard extends StannpPhp 
{
    /**
     * Sends a postcard
     * 
     * @param bool   $test 
     * @param string $size 
     * @param string $front 
     * @param string $message 
     * @param string $signature 
     * @param string $recipientTitle 
     * @param string $recipientFName    First name
     * @param string $recipientLName    Last name
     * @param string $recipientAddr1    Address line 1
     * @param string $recipientAddr2    Address line 1
     * @param string $recipientCity     Address City
     * @param string $recipientPostcode Address Postcode
     * @param string $recipientCountry  Address Country code
     * 
     * @return JSON 
     */
    public function sendPostcard(
        $test = true,
        $size = "A6",
        $front = "https://www.stannp.com/assets/samples/a6-postcard-front.jpg",
        $message = "Hello World",
        $signature = "https://www.stannp.com/assets/samples/signature-example.jpg",
        $recipientTitle = "John",
        $recipientFName = "Smith",
        $recipientLName = "Smith",
        $recipientAddr1 = "Unit 1 Willow Tree Court",
        $recipientAddr2 = "Roundswell Business Park",
        $recipientCity = "Barnstaple",
        $recipientPostcode = "EX31 3TD",
        $recipientCountry = "GB"
    ) {
        $params = array (
            'test'                 => $test,
            'size'                 => $size,
            'front'                => $front,
            'message'              => $message,
            'signature'            => $signature,
            'recipient[title]'     => $recipientTitle,   
            'recipient[firstname]' => $recipientFname,
            'recipient[lastname]'  => $recipientLName,
            'recipient[address1]'  => $recipientAddr1,
            'recipient[address2]'  => $recipientAddr2,
            'recipient[postcode]'  => $recipientPostcode,
            'recipient[city]'      => $recipientCity,
            'recipient[country]'   => $recipientCountry
        );

        return $this->post('/postcards/create', $params);
    }
}