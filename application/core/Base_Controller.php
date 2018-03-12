<?php
defined('BASEPATH') OR exit('No direct script acces allowed');
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 30/05/2017
 * Time: 10:29 AM
 */
class Base_Controller extends CI_Controller
{
    public $templates;

    public function __construct()
    {
        parent::__construct();
        $this->templates = new League\Plates\Engine(APPPATH . "/views");
    }

}