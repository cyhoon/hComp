<?php if(!defined('BASEPATH')) exit('No direct access allowed');

class Member_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function login($query)
    {
        $email = "\"".$query['email']."\"";
        $passwd = "\"".$query['passwd']."\"";

        $sql = "SELECT * FROM user WHERE email = $email AND passwd = $passwd";
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function register($query)
    {
        $email = "\"".$query['email']."\"";
        $passwd = "\"".$query['passwd']."\"";
        $phone_number = "\"".$query['phone_number']."\"";
        $name = "\"".$query['name']."\"";

        $sql = "INSERT INTO `user`(`email`, `passwd`, `phone_number`, `name`) VALUES ($email,$passwd,$phone_number,$name)";

        $this->db->query($sql);
    }



}

?>