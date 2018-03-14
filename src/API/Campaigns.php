<?php
/**
 * 
 * 
 * 
 */

namespace Stannp\API;
use Stannp\StannpPhp as StannpPhp;



class Campaigns extends StannpPhp
{
    /**
     * Returns object with all active campaigns
     * 
     * @return JSON Encoded JSON object
     */
    public function list() 
    {
        $path = "/campaigns/list";

        return $this->getRequest($path);
    }

    /**
     * Returns object with all active campaigns
     * 
     * @param int $campaignId   Id of the specific campaign
     * @return JSON Encoded JSON object
     */
    public function get($campaignId) 
    {
        $path = "/campaigns/get";
        $params = array(
            "id" => $campaignId
        );

        return $this->getRequest($path, $params);
    }

    /**
     * Creates a draft campaign
     * 
     * @param string $campaignName Name your campaign for reference.
     * @param string $campaignType The type of campaign this will be (a6-postcard | a5-postcard | dl-postcard | letter-dl).
     * @param string $campaignCode If you have a voucher code.
     * 
     * @return JSON  Encoded JSON object
     */
    public function draft($campaignName, $campaignType, $campaignCode) 
    {
        $path = "/campaigns/draft";
        $params = array(
            "name" => $campaignName,
            "type" => $campaignType,
            "code" => $campaignCode
        );

        return $this->postRequest($path, $params);
    }

    /**
     * Creates a draft campaign
     * 
     * @param string $campaignId Name your campaign for reference..
     * 
     * @return JSON  Encoded JSON object
     */
    public function delete($campaignId) 
    {
        $path = "/campaigns/delete";
        $params = array(
            "id" => $campaignId
        );

        return $this->postRequest($path, $params);
    }
}