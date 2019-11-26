<?php

class UserModel extends CI_Model
{

    public function loginUser($uName, $uPassword)
    {
        $this->db->where('uname', $uName);
        $this->db->where('upassword', md5($uPassword));
        $res = $this->db->get('user_table');

        if ($res->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailValid($uemail)
    {
        $this->db->where('uemail', $uemail);
        $res = $this->db->get("user_table");

        if ($res->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function fatchLastPassword($uemail)
    {
        $this->db->where('uemail', $uemail);
        $res = $this->db->get("user_table")->row();

        return $res;
    }

    public function userRegistered($data)
    {
        $this->db->insert('user_table', $data);

        return true;
    }
    public function userDetails()
    {
        $userName = $_SESSION['userName'];
        $this->db->where('uname', $userName);
        $que = $this->db->get('user_table')->row();

        return $que;
    }
    public function removePic($uId, $userName)
    {
        $data = array('uimage' => '');
        $this->db->where('uid', $uId);
        $this->db->where('uname', $userName);
        $this->db->update('user_table', $data);
    }
} //end User Model  Class
