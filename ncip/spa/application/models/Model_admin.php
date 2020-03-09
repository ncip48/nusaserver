<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_admin extends CI_Model{

    function update_toko(){
        $config['upload_path'] = 'asset/images/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['max_size'] = '500'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('i');
        $hasil=$this->upload->data();

        if ($hasil['file_name']==''){
            $datadb = array('nama_toko'=>$this->db->escape_str($this->input->post('a')),
                            'alamat_toko'=>$this->db->escape_str($this->input->post('b')),
                            'jam_buka'=>$this->db->escape_str($this->input->post('c')),
                            'jam_tutup'=>$this->db->escape_str($this->input->post('d')),
                            'interval'=>$this->db->escape_str($this->input->post('e')),
                            'facebook'=>$this->db->escape_str($this->input->post('f')),
                            'instagram'=>$this->db->escape_str($this->input->post('g')),
                            'twitter'=>$this->db->escape_str($this->input->post('h')));
        }else{
            $datadb = array('nama_toko'=>$this->db->escape_str($this->input->post('a')),
                            'alamat_toko'=>$this->db->escape_str($this->input->post('b')),
                            'jam_buka'=>$this->db->escape_str($this->input->post('c')),
                            'jam_tutup'=>$this->db->escape_str($this->input->post('d')),
                            'interval'=>$this->db->escape_str($this->input->post('e')),
                            'facebook'=>$this->db->escape_str($this->input->post('f')),
                            'instagram'=>$this->db->escape_str($this->input->post('g')),
                            'twitter'=>$this->db->escape_str($this->input->post('h')),
                            'favicon'=>$hasil['file_name']);
        }
        $this->db->where('id_toko',1);
        $this->db->update('rb_toko',$datadb);
    }

    function update_logo(){
        $config['upload_path'] = 'asset/images/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['max_size'] = '500'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('a');
        $hasil=$this->upload->data();

        $datadb = array('logo'=>$hasil['file_name']);
        $this->db->where('id_logo',1);
        $this->db->update('rb_logo',$datadb);

    }

    function view_booking(){
        return $this->db->query("SELECT * FROM rb_booking a JOIN rb_konsumen b ON a.id_user=b.id_user JOIN rb_karyawan c ON a.id_karyawan=c.id_karyawan JOIN rb_services d ON a.id_services=d.id_services");
    }

    function view_booking_edit($id){
        return $this->db->query("SELECT * FROM rb_booking a JOIN rb_konsumen b ON a.id_user=b.id_user JOIN rb_karyawan c ON a.id_karyawan=c.id_karyawan JOIN rb_services d ON a.id_services=d.id_services WHERE a.id_booking='".$id."'");
    }

    function view_services(){
        return $this->db->get('rb_services');
    }

    function tambah_services(){
        $config['upload_path'] = 'asset/images/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['max_size'] = '500'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();

        if ($hasil['file_name']==''){
            $datadb = array('nama_services'=>$this->db->escape_str($this->input->post('a')),
                            'point'=>$this->db->escape_str($this->input->post('b')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('d')));
        }else{
            $datadb = array('nama_services'=>$this->db->escape_str($this->input->post('a')),
                            'point'=>$this->db->escape_str($this->input->post('b')),
                            'foto'=>$hasil['file_name'],
                            'deskripsi'=>$this->db->escape_str($this->input->post('d')));
        }
        $this->db->insert('rb_services',$datadb);
    }

    function edit_services(){
        $config['upload_path'] = 'asset/images/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['max_size'] = '500'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();

        if ($hasil['file_name']==''){
            $datadb = array('nama_services'=>$this->db->escape_str($this->input->post('a')),
                            'point'=>$this->db->escape_str($this->input->post('b')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('d')));
        }else{
            $datadb = array('nama_services'=>$this->db->escape_str($this->input->post('a')),
                            'point'=>$this->db->escape_str($this->input->post('b')),
                            'foto'=>$hasil['file_name'],
                            'deskripsi'=>$this->db->escape_str($this->input->post('d')));
        }

        $this->db->where('id_services',$this->input->post('id'));
        $this->db->update('rb_services',$datadb);
    }

    function hapus_services($id){
        $this->db->where('id_services',$id);
        $this->db->delete('rb_services');
    }

    function view_staff(){
        return $this->db->get('rb_karyawan');
    }

    function tambah_staff(){
        $config['upload_path'] = 'asset/images/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['max_size'] = '500'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();

        if ($hasil['file_name']==''){
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'password'=>$this->db->escape_str($this->input->post('b')),
                            'nama_karyawan'=>$this->db->escape_str($this->input->post('c')),
                            'email'=>$this->db->escape_str($this->input->post('d')),
                            'no_hp'=>$this->db->escape_str($this->input->post('e')),
                            'alamat'=>$this->db->escape_str($this->input->post('g')));
        }else{
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'password'=>$this->db->escape_str($this->input->post('b')),
                            'nama_karyawan'=>$this->db->escape_str($this->input->post('c')),
                            'email'=>$this->db->escape_str($this->input->post('d')),
                            'no_hp'=>$this->db->escape_str($this->input->post('e')),
                            'foto'=>$hasil['file_name'],
                            'alamat'=>$this->db->escape_str($this->input->post('g')));
        }
        $this->db->insert('rb_karyawan',$datadb);
    }

    function edit_karyawan(){
        $config['upload_path'] = 'asset/images/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['max_size'] = '500'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();

        if ($hasil['file_name']==''){
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'password'=>$this->db->escape_str($this->input->post('b')),
                            'nama_karyawan'=>$this->db->escape_str($this->input->post('c')),
                            'email'=>$this->db->escape_str($this->input->post('d')),
                            'no_hp'=>$this->db->escape_str($this->input->post('e')),
                            'alamat'=>$this->db->escape_str($this->input->post('g')));
        }else{
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'password'=>$this->db->escape_str($this->input->post('b')),
                            'nama_karyawan'=>$this->db->escape_str($this->input->post('c')),
                            'email'=>$this->db->escape_str($this->input->post('d')),
                            'no_hp'=>$this->db->escape_str($this->input->post('e')),
                            'foto'=>$hasil['file_name'],
                            'alamat'=>$this->db->escape_str($this->input->post('g')));
        }

        $this->db->where('id_karyawan',$this->input->post('id'));
        $this->db->update('rb_karyawan',$datadb);
    }

    function hapus_staff($id){
        $this->db->where('id_karyawan',$id);
        $this->db->delete('rb_karyawan');
    }

    function view_supervisor(){
        return $this->db->get('rb_supervisor');
    }

    function tambah_supervisor(){
        $config['upload_path'] = 'asset/images/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['max_size'] = '500'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();

        if ($hasil['file_name']==''){
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'password'=>$this->db->escape_str($this->input->post('b')),
                            'nama'=>$this->db->escape_str($this->input->post('c')),
                            'email'=>$this->db->escape_str($this->input->post('d')),
                            'no_hp'=>$this->db->escape_str($this->input->post('e')),
                            'alamat'=>$this->db->escape_str($this->input->post('g')));
        }else{
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'password'=>$this->db->escape_str($this->input->post('b')),
                            'nama'=>$this->db->escape_str($this->input->post('c')),
                            'email'=>$this->db->escape_str($this->input->post('d')),
                            'no_hp'=>$this->db->escape_str($this->input->post('e')),
                            'foto'=>$hasil['file_name'],
                            'alamat'=>$this->db->escape_str($this->input->post('g')));
        }
        $this->db->insert('rb_supervisor',$datadb);
    }

    function edit_supervisor(){
        $config['upload_path'] = 'asset/images/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['max_size'] = '500'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();

        if ($hasil['file_name']==''){
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'password'=>$this->db->escape_str($this->input->post('b')),
                            'nama'=>$this->db->escape_str($this->input->post('c')),
                            'email'=>$this->db->escape_str($this->input->post('d')),
                            'no_hp'=>$this->db->escape_str($this->input->post('e')),
                            'alamat'=>$this->db->escape_str($this->input->post('g')));
        }else{
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'password'=>$this->db->escape_str($this->input->post('b')),
                            'nama'=>$this->db->escape_str($this->input->post('c')),
                            'email'=>$this->db->escape_str($this->input->post('d')),
                            'no_hp'=>$this->db->escape_str($this->input->post('e')),
                            'foto'=>$hasil['file_name'],
                            'alamat'=>$this->db->escape_str($this->input->post('g')));
        }

        $this->db->where('id_supervisor',$this->input->post('id'));
        $this->db->update('rb_supervisor',$datadb);
    }

    function hapus_supervisor($id){
        $this->db->where('id_supervisor',$id);
        $this->db->delete('rb_supervisor');
    }

    function edit_profile(){
        $config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name']);
            }elseif ($hasil['file_name']=='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name']);
            }
            $where = array('username' => $this->input->post('id'));
            $this->db->update('users', $data);
    }

    function edit_booking($id){
        $datadb = array('jam_booking'=>$this->db->escape_str($this->input->post('a')));
        $this->db->where('id_booking',$this->input->post('id'));
        $this->db->update('rb_booking',$datadb);
    }

}