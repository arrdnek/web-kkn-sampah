<?php

namespace App\Controllers;

use App\Services\ServiceRekap;

class ControlRekap extends BaseController
{
    public function sinkron()
    {
        $rekap = new ServiceRekap();
        $rekap->sinkronisasi();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Sinkronisasi berhasil']);
    }
}
