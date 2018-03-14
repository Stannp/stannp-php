<?php
/**
 * 
 * 
 * 
 */

namespace Stannp\API;
use Stannp\StannpPhp as StannpPhp;



class Recipients extends StannpPhp
{
    
    /**
     * Creates a recipient
     * 
     * @param int $groupID ID of group
     * @param int $limit   request limit 
     * 
     * @return encoded JSON object
     */
    public function getRecipients($groupID, $limit = 100) 
    {
        $path = "/recipients/list";

        $params = array (
            "group_id" => $groupID,
            "limit"    => $limit
        );

        return $this->get($path, $params);
    }

    /**
     * Fetched info about a recipient
     * 
     * @param int $recipientID 
     * 
     * @return encoded JSON object
     */
    public function getRecipient($recipientID) 
    {
        $path = "/recipient/get";

        $params = array (
            "recipient" => $recipientID
        );

        return $this->get($path, $params);
    }

    /**
     * Creates a recipient
     * 
     * @param string $recipientFName First Name
     * @param string $recipientLName Last Name
     * @param string $address1       address ln 1
     * @param string $address2       address ln 2
     * @param string $address3       address ln 3
     * @param string $city           city
     * @param string $postcode       postcode
     * @param string $country        country
     * @param string $groupId        
     * @param string $onDuplicate    action on duplicate ('duplicate', 'ignore', 'replace')
     * 
     * @return encoded JSON object
     */
    public function createRecipient(
        $recipientFName,
        $recipientLName,
        $address1,
        $address2,
        $address3,
        $city,
        $postcode,
        $country,
        $groupId,
        $onDuplicate = "duplicate"
    ) {
        $path = "/recipients/new";
        $params = array (
            'firstname'    => $recipientFname,
            'lastname'     => $recipientLName,
            'address1'     => $address1,
            'address2'     => $address2,
            'address3'     => $address3,
            'city'         => $city,
            'postcode'     => $postcode,
            'country'      => $country,
            'group_id'     => $groupId,
            'on_duplicate' => $onDuplicate
        );

        return $this->post($path, $params);
    }

    /**
     * Creates a recipient
     * 
     * @param int $recipientID 
     * 
     * @return encoded JSON object
     */
    public function deleteRecipient($recipientID) 
    {
        $path = "/recipient/delete";

        $params = array (
            "id" => $recipientID
        );

        return $this->post($path, $params);
    }

    /**
     * Validates an address (british only)
     * 
     * @param string $company  Company name
     * @param string $address1 Address ln 1
     * @param string $address2 Address ln 2
     * @param string $address3 Address ln 3
     * @param string $city     City
     * @param string $postcode Postcode
     * @param string $country  Country
     * 
     * @return encoded JSON object
     */
    public function validateAddress(
        $company,
        $address1,
        $address2,
        $address3,
        $city,
        $postcode,
        $country = "GB"
    ) {
        $path = "/recipient/validate";
        $params = array (
            'company'  => $company,
            'address1' => $address1,
            'address2' => $address2,
            'address3' => $address3,
            'city'     => $city,
            'postcode' => $postcode,
            'country'  => $country
        );


        return $this->post($path, $params);
    }


    /**
     * Creates a recipient
     * 
     * @param file   $file       Either a base 64 URL or CSV/XLSX
     * @param int    $groupId    Group ID
     * @param string $duplicates Action on duplicate ('duplicate', 'ignore', 'replace')
     * @param bool   $noHeadings If headings present on import file set to true and use the mapping paramater
     * @param string $mappings   Comma seperated string with the table headings of the import CSV
     * 
     * @return encoded JSON object
     */
    public function importRecipients($file, $groupId, $duplicates, $noHeadings, $mappings) 
    {
        $path = "/recipient/import";

        $params = array (
            "file"        => $file,
            "group_id"    => $groupId,
            "duplicates"  => $duplicates,
            "no_headings" => $noHeadings,
            "mappings"    => $mappings
        );

        return $this->post($path, $params);
    }
}