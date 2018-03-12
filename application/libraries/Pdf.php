<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 31/05/2017
 * Time: 2:19 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}
/* application/libraries/Pdf.php */
?>