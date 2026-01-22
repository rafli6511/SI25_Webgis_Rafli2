<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function JmlRumah()
    {
        return $this->db->table('tbl_rumah')
        ->countAll();
    }

    public function JmlWilayah()
    {
        return $this->db->table('tbl_wilayah')
        ->countAll();
    }
}
