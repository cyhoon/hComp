<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 테스트 컨트롤러
 *
 */

class Test extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
//        $this->load->model('board_m');
        $this->load->helper(array('url','date'));
    }

    /*
     * 주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
     */
    public function index()
    {
        $this->lists();
    }

    /*
     * 사이트 헤더, 푸터가 자동으로 추가된다.
     */
    public function _remap($method)
    {
        // 헤더 include
        $this->load->view('header_v');

        if ( method_exists($this, $method))
        {
            $this->{"{$method}"}();
        }

        // 푸터 include
        $this->load->view('footer_v');
    }

    /*
     * 목록 불러오기
     */
    public function lists()
    {
        echo "Hello";
    }

}

?>