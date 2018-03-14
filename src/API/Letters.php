<?php
/**
 * 
 * 
 * 
 */

namespace Stannp\API;
use Stannp\StannpPhp as StannpPhp;



class Letters extends StannpPhp
{
    /**
     * Creates a letter
     * 
     * @param string $recipient  Recipient ID
     * @param string $background Background URL
     * @param string $template   Template ID
     * @param string $pages      String containing basic HTML. Pages separated by sending an array
     * @param string $file       PDF / DOC file directly. This value can be either a binary file or a URL to a file
     * @param bool   $test       Produce a sample PDF and not dispatch the letter
     * @param bool   $duplex     Print both side of the letter
     * 
     * @return JSON An encoded JSON object
     */
    public function create(
        $recipient,
        $background,
        $template,
        $pages,
        $file,
        $test = true,
        $duplex = false
    ) {
        $path = "/letters/create";  
        $params = array(
            "test"       => $test,
            "recipient"  => $recipient,
            "background" => $background,
            "template"   => $template,
            "pages"      => $pages,
            "file"       => $file,
            "duplex"     => $duplex,
        );

        return $this->postRequest($path, $params);
    }


    /**
     * Posts a letter based on file input
     * 
     * @param string $pdf     URL or binary file of the pdf file to print and post.
     * @param string $country ISO alpha 2 country code. For example “GB”, “US”, “FR” or “DE”.
     * @param bool   $test    Produce a sample PDF and not dispatch the letter
     * 
     * @return JSON An encoded JSON object
     */
    public function post(
        $pdf,
        $country = "GB",
        $test = true
    ) {
        $path = "/letters/post";  
        $params = array(
            "test"    => $test,
            "country" => $country,
            "pdf"     => $pdf
        );

        return $this->postRequest($path, $params);
    }

    /**
     * Post a single letter that already has an address on the PDF file.
     * 
     * @param string $csv        CSV file containing recipient addresses
     * @param string $background A letter heading design or a file for the background of every page
     * @param int    $template   An ID of a template already set up on the platform.
     * @param string $pages      String containing basic HTML. Pages separated by sending an array 
     * @param string $file       PDF / DOC file directly. This value can be either a binary file or a URL to a file
     * @param bool   $test       Produce a sample PDF and not dispatch the letter
     * 
     * @return JSON An encoded JSON object
     */
    public function batch(
        $csv,
        $background,
        $template,
        $pages,
        $file,
        $test = true
    ) {
        $path = "/letters/batch";  
        $params = array(
            "test"       => $test,
            "csv"        => $csv,
            "background" => $background,
            "template"   => $template,
            "pages"      => $pages,
            "file"       => $file
        );

        return $this->postRequest($path, $params);
    }
}