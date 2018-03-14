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
    public function listGroups($limit = 100) 
    {
        $params = array (
            "limit" => $limit
        );

        return $this->get("/groups/list", $params);
    }

    /**
     * List of all groups
     * 
     * @param string $name Name of new group
     * 
     * @return encoded JSON object
     */
    public function newGroup($name = "") 
    {
        $params = array (
            "name" => $name
        );

        return $this->post("/groups/new", $params);
    }

    /**
     * Add a recipient to a group
     * 
     * @param int $groupId      limit number of resukts returned
     * @param int $recipientsId Id of the recipient(s) comma seperated string for multiple users
     * 
     * @return encoded JSON object
     */
    public function addToGroup($groupId, $recipientsId) 
    {
        $params = array (
            "recipients" => $recipientsID
        );

        return $this->post("/groups/add/{$groupID}", $params);
    }

    /**
     * Remove a recipient to a group
     * 
     * @param int $groupId      limit number of resukts returned
     * @param int $recipientsId Id of the recipient(s) comma seperated string for multiple users
     * 
     * @return encoded JSON object
     */
    public function removeFromGroup($groupId, $recipientsId) 
    {
        $params = array (
            "recipients" => $recipientsID
        );

        return $this->post("/groups/remove/{$groupID}", $params);
    }

    /**
     * Delete a group
     * 
     * @param int $groupId limit number of resukts returned
     * 
     * @return encoded JSON object
     */
    public function deleteGroup($groupId = -1) 
    {
        $params = array (
            "id" => $groupId
        );
    
        return $this->post("/groups/delete", $params);
    }
}