<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelRumah;
use App\Models\ModelKeterangan;

class Home extends BaseController
{
    protected $ModelSetting;
    protected $ModelWilayah;
    protected $ModelRumah;
    protected $ModelKeterangan;

    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelRumah = new ModelRumah();
        $this->ModelKeterangan = new ModelKeterangan();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'rumah' => $this->ModelRumah->AllData(),
            'keterangan' => $this->ModelKeterangan->AllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Wilayah($id_wilayah)
    {
        $dw = $this->ModelWilayah->DetailData($id_wilayah);
        $data = [
            'judul' => $dw['nama_wilayah'],
            'page' => 'v_detail_wilayah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'keterangan' => $this->ModelKeterangan->AllData(),
            'detailwilayah' => $this->ModelWilayah->DetailData($id_wilayah),
            'rumah' => $this->ModelRumah->AllDataPerWilayah($id_wilayah),
        ];
        return view('v_template_front_end', $data);
    }

    public function Keterangan($id_keterangan)
    {
        $dk = $this->ModelKeterangan->DetailData($id_keterangan);
        $data = [
            'judul' => $dk['keterangan'],
            'page' => 'v_rumah_per_keterangan',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'keterangan' => $this->ModelKeterangan->AllData(),
            'rumah' => $this->ModelRumah->AllDataPerKeterangan($id_keterangan),
        ];
        return view('v_template_front_end', $data);
    }

    public function DetailRumah($id_rumah)
    {
        $rumah = $this->ModelRumah->DetailData($id_rumah);
        $data = [
            'judul' => $rumah['nama'],
            'page' => 'v_detail_rumah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'keterangan' => $this->ModelKeterangan->AllData(),
            'rumah' => $rumah,
        ];
        return view('v_template_front_end', $data);
    }
}
