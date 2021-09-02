<?php 
/**
 * 
 * 
 * 
 */

namespace Stannp\API;
use Stannp\StannpPhp as StannpPhp;



class Postcard extends StannpPhp 
{
    /**
     * Sends a postcard
     * 
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
     * @param bool   $test 
     * @param string $recipientCountry  Address Country code
     * 
     * @return JSON 
     */
    public function create(
        $size,
        $front,
        $message,
        $signature,
        $recipientTitle,
        $recipientFName,
        $recipientLName,
        $recipientAddr1,
        $recipientAddr2,
        $recipientCity,
        $recipientPostcode,
        $test = true,
        $recipientCountry = "GB"
    ) {
        $params = array (
            'test'                 => $test,
            'size'                 => $size,
            'front'                => $front,
            'message'              => $message,
            'signature'            => $signature,
            'recipient[title]'     => $recipientTitle,   
            'recipient[firstname]' => $recipientFName,
            'recipient[lastname]'  => $recipientLName,
            'recipient[address1]'  => $recipientAddr1,
            'recipient[address2]'  => $recipientAddr2,
            'recipient[postcode]'  => $recipientPostcode,
            'recipient[city]'      => $recipientCity,
            'recipient[country]'   => $recipientCountry
        );

        return $this->postRequest('/postcards/create', $params);
    }
}
