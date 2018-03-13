<?php
/**
 * 
 * 
 * 
 */

namespace Stannp\Stannp;
use Stannp\StannpPhp as StannpPhp;



class Letters extends StannpPhp
{
    public function createLetter(
        $test,
        $recipient,
        $background,
        $template,
        $pages,
        $file,
        $duplex
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

        return $this->post($path, $params);
    }

    public function postLetter(
        $test,
        $country,
        $pdf
    ) {
        $path = "/letters/post";  
        $params = array(
            "test"    => $test,
            "country" => $country,
            "pdf"     => $pdf
        );

        return $this->post($path, $params);
    }

    public function createBatch(
        $test,
        $csv,
        $background,
        $template,
        $pages,
        $file
    ) {
        $path = "/letters/batch";  
        $params = array(
            "test"       => $test,
            "csv"  => $csv,
            "background" => $background,
            "template"   => $template,
            "pages"      => $pages,
            "file"       => $file
        );

        return $this->post($path, $params);
    }
}