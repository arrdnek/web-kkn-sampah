<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMilestone extends Model
{
    protected $table = 'tabel_milestone';
    protected $allowedFields = ['univ', 'kabupaten', 'kecamatan', 'kelurahan', 'dusun', 'indikator', 'nilai', 'created_at'];
}
