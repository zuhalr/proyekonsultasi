<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class M_pdf 
{ 
    function __construct()
    { 
        include_once APPPATH.'libraries/mpdf_vendor/vendor/autoload.php'; 
    } 
    function pdf()
    { 
        $CI = & get_instance(); 
        log_message('Debug', 'mPDF class is loaded.'); 
    } 
    // function load($param=[])
    function load()
    { 
        // return new \Mpdf\Mpdf($param); 
        // return new \mPDF($param); 
        return new \mPDF('c', 'A4-L'); // untuk kertas a4 & landscape
    } 

    function load_potrait()
    { 
        return new \mPDF('c', 'A4');
    } 

    function loadA6()
    { 
        
        return new \mPDF('c', 'A6-L'); // untuk kertas a4 & landscape
    } 

    function loadA6_potrait()
    { 
        return new \mPDF('c', 'A6');
    } 


    function load_chinese()
    {
        return new \mPDF('utf-8', 'A4');
    }




}