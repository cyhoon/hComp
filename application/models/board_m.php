<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Board_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function board_check($uri)
    {
        $sql = "SELECT user_id FROM board WHERE board_id=$uri";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    function get_list($table)
    {
        if(!isset($table) || $table = ' ')
            $table = "board";

        $sql = "SELECT * FROM ".$table." ORDER BY board_id DESC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    function get_view($board_id)
    {
        // 조회수 업데이트
        $sql = "UPDATE `board` SET hits = hits+1 WHERE `board_id` = ".$board_id."";
        $this->db->query($sql);

        $sql = "SELECT * FROM `board` WHERE board_id = ".$board_id."";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    function write_m($element)
    {
        $subject = "\"".$element[0]."\"";
        $name = "\"".$element[1]."\"";
        $email = "\"".$element[2]."\"";
        $content = "\"".$element[3]."\"";
        $user_id = "\"".$element[4]."\"";

        $sql = "INSERT INTO `board`(`user_id`, `user_name`,`email`, `subject`, `contents`) VALUES ($user_id,$name,$email,$subject,$content)";
        $query = $this->db->query($sql);

    }

    function delete_m($board_id)
    {
        $sql = "DELETE FROM `board` WHERE board_id = $board_id";
        $this->db->query($sql);
    }

    function modify($board_id,$element)
    {
        $subject = $element[0];
        $content = $element[1];

        $sql = "UPDATE `board` SET subject='".$subject."',contents='".$content."' WHERE board_id = '".$board_id."' ";
        $this->db->query($sql);
    }

}

?>