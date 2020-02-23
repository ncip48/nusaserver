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
  public function is_valid_num($username){
    $this->db->select('user.id_user, user.username, user.password, keys.key');
    $this->db->from('user');
    $this->db->join('keys', 'user.id_user = keys.user_id');
    $this->db->where('user.username',$username);
    $query = $this->db->get();
    return $query->row();
  }

  public function hitung_user($username){
    $this->db->select('user.id_user, user.username, user.password, keys.key');
    $this->db->from('user');
    $this->db->join('keys', 'user.id_user = keys.user_id');
    $this->db->where('user.username',$username);
    $query = $this->db->get();
    return $query->num_rows();
  }
}