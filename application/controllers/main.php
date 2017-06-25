<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('board_m');
        $this->load->helper(array('url','date'));
    }

    public function _remap($method)
    {
        // 헤더 include
        $this->load->view('home/inc/header_v');

        if ( method_exists($this,$method) )
        {
            $this->{"{$method}"}();
        }

        //  푸터 include

        $this->load->view('home/inc/footer_v');
    }


    public function index()
    {
        $this->home();
    }

    function home()
    {
        // 회사 메인 페이지를 해줌.

        $this->load->view('home/main_v');
    }
}

?>