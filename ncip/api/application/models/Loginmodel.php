<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loginmodel extends CI_Model{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function is_valid($username){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username',$username);
    $query = $this->db->get();
    return $query->row();
  }
  public function is_valid_num($username, $pw){
    $this->db->select('user.id_user, user.username, user.password, keys.key, keys.level');
    $this->db->from('user');
    $this->db->join('keys', 'user.id_user = keys.user_id');
    #$this->db->where('user.username',$username AND 'user.password', $pw);
    $array = array('user.username' => $username, 'user.password' => $pw);
    $this->db->where($array); 
    $query = $this->db->get();
    return $query->row();
  }

  public function cek_key($username){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->join('keys', 'user.id_user = keys.user_id');
    $this->db->where('user.username',$username);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function cek_username($username){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username',$username);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function cek_akun($username, $pw){
    $this->db->select('*');
    $this->db->from('user');
    $array = array('user.username' => $username, 'user.password' => $pw);
    $this->db->where($array); 
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function cek_level($id_user){
    $this->db->select('*');
    $this->db->from('keys');
    $this->db->where('user_id',$id_user);
    $query = $this->db->get();
    return $query->row();
  }

  public function insert_key($id_user, $token){
    $user = array('user_id'=>$id_user,
                  'key'=>$token,
                  'level'=>'1',
                  'date_created'=>'0');
    $this->db->insert('keys',$user);
  }
}