<?php

namespace App\Services;

use App\Models\ModelMilestone;
use App\Models\ModelRekap;
use Config\Database;

class ServiceRekap
{
    public function sinkronisasi()
    {
        $modelMilestone = new ModelMilestone();
        $modelRekap = new ModelRekap();

        $db = Database::connect();
        $builder = $db->table('tabel_milestone');

        $query = $builder->select('univ, indikator, kecamatan, AVG(nilai) as rata_nilai')
                         ->groupBy(['univ', 'indikator', 'kecamatan'])
                         ->get();

        foreach ($query->getResultArray() as $row) {
            $existing = $modelRekap
                ->where('univ', $row['univ'])
                ->where('indikator', $row['indikator'])
                ->where('kecamatan', $row['kecamatan'])
                ->first();
        
            if ($existing) {
                //  Update data yang sudah ada
                $modelRekap->update($existing['id'], [
                    'rata_nilai' => $row['rata_nilai'],
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                // ➕ Insert data baru
                $modelRekap->insert([
                    'univ'       => $row['univ'],
                    'indikator'  => $row['indikator'],
                    'kecamatan'  => $row['kecamatan'],
                    'rata_nilai' => $row['rata_nilai'],
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
