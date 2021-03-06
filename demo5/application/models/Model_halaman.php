<?php 
class Model_halaman extends CI_model{
    function page_detail($id){
        return $this->db->query("SELECT * FROM halamanstatis where id_halaman='".$this->db->escape_str($id)."' OR judul_seo='".$this->db->escape_str($id)."'");
    }

    function page_dibaca_update($id){
        return $this->db->query("UPDATE halamanstatis SET dibaca=dibaca+1 where id_halaman='".$this->db->escape_str($id)."' OR judul_seo='".$this->db->escape_str($id)."'");
    }

    function halamanstatis(){
        return $this->db->query("SELECT * FROM halamanstatis")->row_array();
    }

    function hubungi(){
        return $this->db->query("SELECT * FROM hubungi");
    }

    function about_update(){
        $datadb = array('isi_halaman'=>$this->input->post('a'),
                        'tgl_posting'=>date('Y-m-d'));
        $this->db->update('halamanstatis',$datadb);
    }

    function halamanstatis_tambah(){
            $config['upload_path'] = 'asset/foto_statis/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'isi_halaman'=>$this->input->post('b'),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'username'=>$this->session->username,
                                    'dibaca'=>'0',
                                    'jam'=>date('H:i:s'),
                                    'hari'=>hari_ini(date('w')));
            }else{
            		$datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'isi_halaman'=>$this->input->post('b'),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'gambar'=>$hasil['file_name'],
                                    'username'=>$this->session->username,
                                    'dibaca'=>'0',
                                    'jam'=>date('H:i:s'),
                                    'hari'=>hari_ini(date('w')));
            }
        $this->db->insert('halamanstatis',$datadb);
    }

    function halamanstatis_edit($id){
        return $this->db->query("SELECT * FROM halamanstatis where id_halaman='$id'");
    }

    function halamanstatis_update(){
        $config['upload_path'] = 'asset/foto_statis/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();
        if ($hasil['file_name']==''){
                    $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'isi_halaman'=>$this->input->post('b'),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'username'=>$this->session->username,
                                    'dibaca'=>'0',
                                    'jam'=>date('H:i:s'),
                                    'hari'=>$this->db->escape_str($this->input->post('j')));
        }else{
                    $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'isi_halaman'=>$this->input->post('b'),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'gambar'=>$hasil['file_name'],
                                    'username'=>$this->session->username,
                                    'dibaca'=>'0',
                                    'jam'=>date('H:i:s'),
                                    'hari'=>$this->db->escape_str($this->input->post('j')));
        }
        $this->db->where('id_halaman',$this->input->post('id'));
        $this->db->update('halamanstatis',$datadb);
    }

    function halamanstatis_delete($id){
        return $this->db->query("DELETE FROM halamanstatis where id_halaman='$id'");
    }
}