<?php
/**
 * Mailer class
 * 
 * @author Nathan Wright <nathan@stannp.com>
 */

namespace Stannp;



class StannpPhp
{

    protected $api_key = null;
    public $endpoint = "https://dash.stannp.com/api/v1";
    public $debug = false;
    public $ch;

    /**
     * Entry point, sets CURL options as well as API key
     * API key can be an environment variable if not passed here
     * 
     * @param string $api_key 
     */
    public function __construct($api_key = null) 
    {
        if (!$api_key) {
            $api_key = STANNP_API_KEY;
        }
        if ($api_key) {
            $this->api_key = $api_key;
    
            $this->ch = curl_init();
    
            curl_setopt($this->ch, CURLOPT_HEADER, false);
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($this->ch, CURLOPT_TIMEOUT, 3);
        } else {
            return "Error: Stannp API key not set";
        }
    }
    
    /**
     * Preforms the cURL scrape
     * 
     * @param string $path   The URI to request
     * @param array  $params The paramaters
     * @param bool   $post   POST or GET
     * 
     * @return JSON An encoded JSON object
     */
    private function _call($path, $params, $post = true) 
    {
        $ch = $this->ch;
        $endpoint = $this->endpoint;
        $api_key = $this->api_key;
        
        $params = http_build_query($params);

        curl_setopt($ch, CURLOPT_POST, $post);
        curl_setopt($ch, CURLOPT_URL, "{$endpoint}{$path}?api_key={$api_key}");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_VERBOSE, $this->debug);

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);

        if (curl_error($ch)) {
            return (curl_error($ch));
        }
        return $response;
    }

    /**
     * Sends GET request
     * 
     * @param string $path   The URI to request
     * @param array  $params The paramaters
     * 
     * @return $resposne An encoded JSON object
     */
    public function getRequest($path, $params = array()) 
    {
        $response = $this->_call($path, $params, false);
        return $response;
    }

    /**
     * Sends POST request
     * 
     * @param string $path   The URI to request
     * @param array  $params The paramaters
     * 
     * @return JSON An encoded JSON object
     */
    public function postRequest($path, $params = array()) 
    {
        $this->_call($path, $params);
        return $response;
    }

    /**
     * Closes Connection
     */
    public function __destruct()
    {
        if (is_resource($this->ch)) {
            curl_close($this->ch);
        }
    }

}