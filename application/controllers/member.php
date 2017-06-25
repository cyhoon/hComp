<?php if (!defined('BASEPATH')) exit('No direct access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('member_m');
        $this->load->helper(array('url','date'));
        $this->load->helper('form');
    }

    public function index()
    {

    }

    public function _remap($method)
    {
        // 헤더 include
        $this->load->view('member/inc/header_v');

        if ( method_exists($this,$method) )
        {
            $this->{"{$method}"}();
        }

        //  푸터 include

        $this->load->view('member/inc/footer_v');
    }

    public function login()
    {
        /*
         * 로그인 인증 절차
         *  1. 폼 데이터가 전송되면 폼 검증을 이용해서 이메일 양식이 맞는지 검사.
         *  2. 아이디가 있는지 검사와 비밀번호가 일치하는지 검사한다.
         *  3. 세션을 할당해 준다.
         *  4. 리아디렉션으로 홈으로 보내준다.
         */

        /* 폼 검증 라이브러리 로드 */
        $this->load->library('form_validation');

        if($_POST)
        {

            /* 폼 검증 라이브러리 활용함 */
            /* required : 공백 */
            $this->form_validation->set_rules('email','이메일','valid_email|required');
            $this->form_validation->set_rules('password','비밀번호','required');

            if($this->form_validation->run() == TRUE)
            {
                $email = $this->input->post('email', TRUE);
                $password = $this->input->post('password', TRUE);

                $query_element = array(
                    'email' => $email,
                    'passwd' => hash('sha256',$password)
                );

                $result = $this->member_m->login($query_element);

                if($result) {

                    // 세션 생성
                    $newdata = array(
                        'name' => $result->name,
                        'email' => $result->email,
                        'user_id' => $result->id,
                        'logged_in' => TRUE
                    );

                    // 세션 등록
                    $this->session->set_userdata($newdata);
                    // 홈 뷰로 이동.
                    echo "<script> window.location.replace(\"/hComp/main/home\"); </script>";
                }else{ // 아이디 또는 비밀번호가 불일치일 경우 로그인 뷰로 이동.
                    echo "<script> alert(\"아이디 또는 비밀번호가 불일치 합니다.\"); </script>";
                    $this->load->view('member/login_v');
                }

            }else{
                // 양식에 안맞으므로 다시 적게함.
                echo "<script> alert(\"입력안했거나 양식에 안맞습니다.\"); </script>";
                $this->load->view('member/login_v');
            }

        }else{
            $this->load->view('member/login_v');
        }
    }

    public function join()
    {
        /*
         * 회원 가입 처리 절차
         *  1. 폼 데이터가 전송되면 폼 검증을 해서 형식에 안맞으면 다시 회원가입창으로 리다이렉션 시킨다 .
         *  2. 폼 검증에 통과되면 이용자가 적은 비밀번호를 암호화 한다.
         *  3. 암호화한 비밀번호를 바탕으로 데이터베이스에 새로운 사용자를 추가한다.
        */

        /* 폼 검증 라이브러리 로드 */
        $this->load->library('form_validation');

        // 폼 데이터 전송이 되었을때.
        if ($_POST) {

            /* 폼 검증 라이브러리 활용함 */
            /* required : 공백 */
            $this->form_validation->set_rules('email','이메일','valid_email|required|callback_username_check');
            $this->form_validation->set_rules('password','비밀번호','required');
            $this->form_validation->set_rules('phone','전화번호','numeric|required');
            $this->form_validation->set_rules('name','이름','required|min_length[2]');

            if($this->form_validation->run() == TRUE)
            {
                $email = $this->input->post('email', TRUE);
                $password = $this->input->post('password', TRUE);
                $phone_number = $this->input->post('phone',TRUE);
                $name = $this->input->post('name',TRUE);

                $query_element = array(
                    'email' => $email,
                    'passwd' => hash('sha256',$password),
                    'phone_number' => $phone_number,
                    'name' => $name
                );

                $this->member_m->register($query_element);
                $this->load->view('member/login_v');
            }else{
                $this->load->view('member/join_v');
            }

        } else { // 안되었을 때
            $this->load->view('member/join_v');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        echo "<script> alert(\"로그아웃 되었습니다.\") </script>";
        echo "<script> window.location.replace(\"/hComp/member/login\"); </script>";
    }

    public function username_check($email)
    {

        $this->load->database();

        if ($email)
        {
            $sql = "SELECT email FROM user WHERE email='".$email."'";
            $query = $this->db->query($sql);
            $result = @$query->row();

            if( $result )
            {
                $this->form_validation->set_message('중복된 아이디입니다.');
                return FALSE;
            }else{
                return TRUE;
            }
        }else{
            return FALSE;
        }
    }

}

?>