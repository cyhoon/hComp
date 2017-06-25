<?php if (!defined('BASEPATH')) exit('No direct access allowed');

class Board extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('board_m');
        $this->load->helper(array('url','date'));
        $this->load->helper('form');
    }

    public function index()
    {
        $this->lists();
    }

    public function _remap($method)
    {
        // 헤더 include
        $this->load->view('board/inc/header_v');

        if ( method_exists($this,$method) )
        {
            $this->{"{$method}"}();
        }

        //  푸터 include

        $this->load->view('board/inc/footer_v');
    }

    /*
     * 목록 불러옴.
     */
    public function lists()
    {
        $data['list'] = $this->board_m->get_list($this->uri->segment(3));
        $this->load->view('board/list_v',$data);
    }

    /*
     * 게시글 보기 기능
     */
    public function view()
    {
        // 게시판 이름과 게시물 번호에 해당하는 게시물 가져오기
        $data['views'] = $this->board_m->get_view($this->uri->segment(3));

        // view 호출
        $this->load->view('board/view_v',$data);
    }

    public function write()
    {
        /*
         * 게시물의 글을 작성하려면
         * 작성하는 기본 html 페이지와 작성한 데이터를 데이터베이스에게 보내주어야한다.
         * 컨트롤러에서 뷰로 뷰에서 컨트롤러로 컨트롤러는 다시 뷰로 간다.
         * */

        /*
         * 폼 검증 :
         * */

        /* 폼 검증 라이브러리 로드 */
        $this->load->library('form_validation');
        $this->load->helper('alert');


        if($_POST)
        {

            /* required : 공백 */
            $this->form_validation->set_rules('subject','제목','required');
// 세션 적용하기 전 코드            $this->form_validation->set_rules('name','이름','required');
            $this->form_validation->set_rules('content','내용','required');
            
            // 포스트 전송 성공시 데이터베이스에게 데이터를 넘겨줌.

            if($this->form_validation->run() == TRUE) {
                $query_element = array(
                    $subject = $this->input->post('subject', TRUE),
                    $name = $this->session->userdata('name'),
                    $email = $this->session->userdata('email'),
                    $content = $this->input->post('content', TRUE),
                    $user_id = $this->session->userdata('user_id')
                );

                $result = $this->board_m->write_m($query_element);

//                if(!$result){
//                    alert('글이 입력되지 않았습니다.','/hComp/board/');
//                }

                redirect('http://localhost/hComp/board');
            }

            $this->load->view('board/write_v');
        }else{
            // 그렇지 않다면 쓰기 뷰를 호출한다.
            $this->load->view('board/write_v');
        }
    }

    public function delete()
    {
        // 이 게시물 user_id 값이 반환됨
        $result = $this->board_m->board_check($this->uri->segment(3));

        if($result[0]->user_id != $this->session->userdata('user_id'))
        {
            echo "<script> alert('자신의 글 만 수정해 주세요'); </script>";
            echo "<script> window.location.replace(\"/hComp/board\");</script>";
            exit;
        }else {

            $board_id = $this->uri->segment(3);

            $this->board_m->delete_m($board_id);

            redirect('http://localhost/hComp/board');
        }
    }

    public function modify()
    {

        // 이 게시물 user_id 값이 반환됨
        $result = $this->board_m->board_check($this->uri->segment(3));

        if($result[0]->user_id != $this->session->userdata('user_id'))
        {
            echo "<script> alert('자신의 글 만 수정해 주세요'); </script>";
            echo "<script> window.location.replace(\"/hComp/board\");</script>";
            exit;
        }
        /*
         * 수정:
         *  입력된 데이터를 상대방한테 다시 보여준다. ( select 문 )
         *  그 후 상대방이 수정이된다면 수정한다고 전송한다. ( post 요청 )
         *  포스트 데이터 방식이 왔다면 update 문을 이용해서 수정한다 ( update 수정 )
         * */

        /* 폼 검증 라이브러리 로드 */
        $this->load->library('form_validation');

        if($_POST)
        {

            /* 폼 검증 라이브러리 활용함 */
            /* required : 공백 */
            $this->form_validation->set_rules('subject','제목','required');
            $this->form_validation->set_rules('content','내용','required');

            if($this->form_validation->run() == TRUE) {
                $query_element = array(
                    $subject = $this->input->post('subject', TRUE),
                    $content = $this->input->post('content', TRUE)
                );
                $board_id = $this->uri->segment(3);

                $this->board_m->modify($board_id, $query_element);
                redirect('http://localhost/hComp/board');
            }

            $board_id = $this->uri->segment(3);

            $data['views'] = $this->board_m->get_view($this->uri->segment(3));

            $this->load->view('board/modify_v',$data);

        }else{
            $board_id = $this->uri->segment(3);

            $data['views'] = $this->board_m->get_view($this->uri->segment(3));

            $this->load->view('board/modify_v',$data);
        }
    }

}

?>