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
    public function getCampaigns() 
    {
        $path = "/campaigns/list";

        return $this->get($path);
    }

    /**
     * Returns object with all active campaigns
     * 
     * @param int $campaignId   Id of the specific campaign
     * @return JSON Encoded JSON object
     */
    public function getCampaign($campaignId) 
    {
        $path = "/campaigns/get";
        $params = array(
            "id" => $campaignId
        );

        return $this->get($path, $params);
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
    public function createCampaign($campaignName, $campaignType, $campaignCode) 
    {
        $path = "/campaigns/create";
        $params = array(
            "name" => $campaignName,
            "type" => $campaignType,
            "code" => $campaignCode
        );

        return $this->post($path, $params);
    }

    /**
     * Creates a draft campaign
     * 
     * @param string $campaignId Name your campaign for reference..
     * 
     * @return JSON  Encoded JSON object
     */
    public function deleteCampaign($campaignId) 
    {
        $path = "/campaigns/list";
        $params = array(
            "id" => $campaignId
        );

        return $this->post($path, $params);
    }
}