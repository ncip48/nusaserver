<?php

class Model_api extends CI_model{

    public function getProvinsi($id = null)
    {
        if ($id === null) {
            return $this->db->get('provinces')->result_array();
        } else {
            return $this->db->get_where('provinces', ['provinsi_id' => $id])->result_array();
        }
    }

    public function getKabupaten($prov = null, $kab = null)
    {
        if ($prov === null && $kab === null) {
            $this->db->select('provinces.provinsi_id,regencies.kota_id,provinces.nama_provinsi,regencies.nama_kabupaten');
            $this->db->from('regencies');
            $this->db->join('provinces', 'regencies.provinsi_id = provinces.provinsi_id');
            return $this->db->get()->result_array();
        } elseif ($kab === null) {
            $this->db->select('provinces.provinsi_id,regencies.kota_id,provinces.nama_provinsi,regencies.nama_kabupaten');
            $this->db->from('regencies');
            $this->db->join('provinces', 'regencies.provinsi_id = provinces.provinsi_id');
            $this->db->where('provinces.provinsi_id', $prov);
            return $this->db->get()->result_array();
        } else {
            $this->db->select('provinces.provinsi_id,regencies.kota_id,provinces.nama_provinsi,regencies.nama_kabupaten');
            $this->db->from('regencies');
            $this->db->join('provinces', 'regencies.provinsi_id = provinces.provinsi_id');
            $this->db->where('regencies.kota_id', $kab);
            return $this->db->get()->result_array();
        }
    }

    public function getKecamatan($kab = null, $kec = null)
    {
        if ($kab === null && $kec === null) {
            $this->db->select('regencies.kota_id,districts.kecamatan_id,regencies.nama_kabupaten,districts.nama_kecamatan');
            $this->db->from('districts');
            $this->db->join('regencies', 'districts.kota_id = regencies.kota_id');
            return $this->db->get()->result_array();
        } elseif ($kec === null) {
            $this->db->select('regencies.kota_id,districts.kecamatan_id,regencies.nama_kabupaten,districts.nama_kecamatan');
            $this->db->from('districts');
            $this->db->join('regencies', 'districts.kota_id = regencies.kota_id');
            $this->db->where('regencies.kota_id', $kab);
            return $this->db->get()->result_array();
        } else {
            $this->db->select('regencies.kota_id,districts.kecamatan_id,regencies.nama_kabupaten,districts.nama_kecamatan');
            $this->db->from('districts');
            $this->db->join('regencies', 'districts.kota_id = regencies.kota_id');
            $this->db->where('districts.kecamatan_id', $kec);
            return $this->db->get()->result_array();
        }
    }

    public function getDesa($kec = null, $desa = null)
    {
        if ($kec === null && $desa === null) {
            $this->db->select('districts.kecamatan_id,villages.desa_id,districts.nama_kecamatan,villages.nama_desa');
            $this->db->from('villages');
            $this->db->join('districts', 'districts.kecamatan_id = villages.kecamatan_id');
            return $this->db->get()->result_array();
        } elseif ($desa === null) {
            $this->db->select('districts.kecamatan_id,villages.desa_id,districts.nama_kecamatan,villages.nama_desa');
            $this->db->from('villages');
            $this->db->join('districts', 'districts.kecamatan_id = villages.kecamatan_id');
            $this->db->where('districts.kecamatan_id', $kec);
            return $this->db->get()->result_array();
        } else {
            $this->db->select('districts.kecamatan_id,villages.desa_id,districts.nama_kecamatan,villages.nama_desa');
            $this->db->from('villages');
            $this->db->join('districts', 'districts.kecamatan_id = villages.kecamatan_id');
            $this->db->where('villages.desa_id', $desa);
            return $this->db->get()->result_array();
        }
    }

    public function getValidLogins()
    {
        
    }

}
