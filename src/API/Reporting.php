<?php
/**
 * 
 */




namespace Stannp\API;
use Stannp\StannpPhp as StannpPhp;


class Reporting extends StannpPhp
{
    /**
     * Retrieves a status summary on individual items within a date range.
     * 
     * @param date $startDate Start Date
     * @param date $endDate   End Date
     * 
     * @return JSON Encoded JSON object
    */
    public function summary($startDate, $endDate) 
    {
        $path = "/reporting/summary";
        $params = array (
            "startdate" => $startDate,
            "endsate"   => $endDate
        );

        return $this->getRequest($path, $params);
    }

    /**
     * Lists Mail Pieced 
     * 
     * @param date $startDate Start Date
     * @param date $endDate   End Date
     * @param int  $limit     Number of results returned
     * @param int  $offset    Offset
     *
     * @return JSON Encoded JSON object
     */
    public function list($startDate, $endDate, $limit = 100, $offset = 0) 
    {
        $path = "/reporting/list";

        return $this->getRequest($path);
    }
}