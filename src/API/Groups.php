<?php 
/**
 * 
 * 
 * 
 */

namespace Stannp\API;
use Stannp\StannpPhp as StannpPhp;



class Groups extends StannpPhp 
{

    /**
     * List of all groups
     * 
     * @param int $limit Limit number of resukts returned
     * 
     * @return encoded JSON object
     */
    public function list($limit = 100) 
    {
        $pat = "/groups/list";
        $params = array (
            "limit" => $limit
        );

        return $this->getRequest($path, $params);
    }

    /**
     * List of all groups
     * 
     * @param string $name Name of new group
     * 
     * @return encoded JSON object
     */
    public function new($name = "") 
    {
        $path = "/groups/new";
        $params = array (
            "name" => $name
        );

        return $this->postRequest($path, $params);
    }

    /**
     * Add a recipient to a group
     * 
     * @param int $groupId      limit number of resukts returned
     * @param int $recipientsId Id of the recipient(s) comma seperated string for multiple users
     * 
     * @return encoded JSON object
     */
    public function add($groupId, $recipientsId) 
    {
        $path = "/groups/add/{$groupId}";
        $params = array (
            "recipients" => $recipientsID
        );

        return $this->postRequest($path, $params);
    }

    /**
     * Remove a recipient to a group
     * 
     * @param int $groupId      limit number of resukts returned
     * @param int $recipientsId Id of the recipient(s) comma seperated string for multiple users
     * 
     * @return encoded JSON object
     */
    public function remove($groupId, $recipientsId) 
    {
        $path = "/groups/remove/{$groupId}";
        $params = array (
            "recipients" => $recipientsID
        );

        return $this->postRequest($path, $params);
    }

    /**
     * Delete a group
     * 
     * @param int $groupId limit number of resukts returned
     * 
     * @return encoded JSON object
     */
    public function delete($groupId = -1) 
    {
        $path = "/groups/delete";
        $params = array (
            "id" => $groupId
        );
    
        return $this->postRequest($path, $params);
    }
}