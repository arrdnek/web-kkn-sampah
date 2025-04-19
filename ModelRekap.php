<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRekap extends Model
{
    protected $table = 'tabel_rekap';
    protected $allowedFields = ['univ', 'kecamatan', 'univ', 'rata_nilai', 'indikator', 'created_at'];
}
