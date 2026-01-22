<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelRumah;
use App\Models\ModelKeterangan;

class Rumah extends BaseController
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

    public function index()
    {
        $data = [
            'judul' => 'Rumah',
            'menu' => 'rumah',
            'page' => 'rumah/v_index',
            'rumah' => $this->ModelRumah->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Input Rumah',
            'menu' => 'rumah',
            'page' => 'rumah/v_input',
            'web' => $this->ModelSetting->DataWeb(),
            'provinsi' => $this->ModelRumah->allProvinsi(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'keterangan' => $this->ModelKeterangan->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama' => [
                'label' => 'Nama', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'mata_pencaharian' => [
                'label' => 'mata_pencaharian',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'coordinat' => [
                'label' => 'Koordinat',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'id_keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'id_provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'id_kabupaten' => [
                'label' => 'Kabupaten',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'id_kecamatan' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'jenis_atap' => [
                'label' => 'Jenis Atap',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'jenis_dinding' => [
                'label' => 'Jenis Dinding',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'jenis_lantai' => [
                'label' => 'Jenis Lantai',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'ventilasi' => [
                'label' => 'Ventilasi',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'pencahayaan' => [
                'label' => 'Pencahayaan',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'air_bersih' => [
                'label' => 'Air Bersih',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'sanitasi' => [
                'label' => 'Sanitasi',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'jenis_bantuan' => [
                'label' => 'Jenis Bantuan',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'id_wilayah' => [
                'label' => 'Wilayah Administrasi',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
                'foto' => [
                'label' => 'Foto', 
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]', 
                'errors' => [
                    'max_size' => 'ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
                ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file_foto = $foto->getRandomName();
            //jika validasi berhasil
            $data = [
                'nama' => $this->request->getPost('nama'),
            'nik'           => $this->request->getPost('nik'),
            'alamat'        => $this->request->getPost('alamat'),
            'mata_pencaharian'        => $this->request->getPost('mata_pencaharian'),
            'coordinat'     => $this->request->getPost('coordinat'),
            'id_keterangan' => $this->request->getPost('id_keterangan'),
            'id_provinsi'   => $this->request->getPost('id_provinsi'),
            'id_kabupaten'  => $this->request->getPost('id_kabupaten'),
            'id_kecamatan'  => $this->request->getPost('id_kecamatan'),
            'jenis_atap'    => $this->request->getPost('jenis_atap'),
            'jenis_dinding' => $this->request->getPost('jenis_dinding'),
            'jenis_lantai'  => $this->request->getPost('jenis_lantai'),
            'ventilasi'     => $this->request->getPost('ventilasi'),
            'pencahayaan'     => $this->request->getPost('pencahayaan'),
            'air_bersih'     => $this->request->getPost('air_bersih'),
            'sanitasi'     => $this->request->getPost('sanitasi'),
            'jenis_bantuan' => $this->request->getPost('jenis_bantuan'),
            'id_wilayah'    => $this->request->getPost('id_wilayah'),
                'foto' => $nama_file_foto,
            ];
            $foto->move('foto', $nama_file_foto);
            $this->ModelRumah->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('Rumah');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to('Rumah/Input')->withInput('validations', \Config\Services::validation());
        }
    }

    public function Edit($id_rumah)
    {
        $data = [
            'judul' => 'Edit Rumah',
            'menu' => 'rumah',
            'page' => 'rumah/v_edit',
            'web' => $this->ModelSetting->DataWeb(),
            'provinsi' => $this->ModelRumah->allProvinsi(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'keterangan' => $this->ModelKeterangan->AllData(),
            'rumah' => $this->ModelRumah->DetailData($id_rumah),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_rumah)
    {
        if ($this->validate([
            'nama'          => ['label' => 'Nama', 'rules' => 'required'],
            'nik'           => ['label' => 'NIK', 'rules' => 'required'],
            'alamat'        => ['label' => 'Alamat', 'rules' => 'required'],
            'mata_pencaharian'        => ['label' => 'Mata Pencaharian', 'rules' => 'required'],
            'coordinat'     => ['label' => 'Koordinat', 'rules' => 'required'],
            'id_keterangan' => ['label' => 'Keterangan', 'rules' => 'required'],
            'id_provinsi'   => ['label' => 'Provinsi', 'rules' => 'required'],
            'id_kabupaten'  => ['label' => 'Kabupaten', 'rules' => 'required'],
            'id_kecamatan'  => ['label' => 'Kecamatan', 'rules' => 'required'],
            'jenis_atap'    => ['label' => 'Jenis Atap', 'rules' => 'required'],
            'jenis_dinding' => ['label' => 'Jenis Dinding', 'rules' => 'required'],
            'jenis_lantai'  => ['label' => 'Jenis Lantai', 'rules' => 'required'],
            'ventilasi'     => ['label' => 'Ventilasi', 'rules' => 'required'],
            'pencahayaan'     => ['label' => 'Pencahayaan', 'rules' => 'required'],
            'air_bersih'     => ['label' => 'Air Bersih', 'rules' => 'required'],
            'sanitasi'     => ['label' => 'Sanitasi', 'rules' => 'required'],
            'jenis_bantuan' => ['label' => 'Jenis Bantuan', 'rules' => 'required'],
            'id_wilayah'    => ['label' => 'Wilayah Administrasi', 'rules' => 'required'],
                'foto' => [
                'label' => 'Foto rumah', 
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]', 
                'errors' => [
                    'max_size' => 'ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
                ],
        ])) {
            $rumah = $this->ModelRumah->DetailData($id_rumah);
            $foto = $this->request->getFile('foto');
            

            if ($foto->getError() == 4) {
                $nama_file_foto = $rumah['foto'];
            }else {
                $nama_file_foto = $foto->getRandomName();
                $foto->move('foto', $nama_file_foto);
            }
            //jika validasi berhasil
            $data = [
                'id_rumah'   => $id_rumah,
                'nama' => $this->request->getPost('nama'),
                'nik'     => $this->request->getPost('nik'),
                'alamat'        => $this->request->getPost('alamat'),
                'mata_pencaharian'        => $this->request->getPost('mata_pencaharian'),
                'coordinat'     => $this->request->getPost('coordinat'),
                'id_keterangan' => $this->request->getPost('id_keterangan'),
                'id_provinsi'   => $this->request->getPost('id_provinsi'),
                'id_kabupaten'  => $this->request->getPost('id_kabupaten'),
                'id_kecamatan'  => $this->request->getPost('id_kecamatan'),
                'jenis_atap'    => $this->request->getPost('jenis_atap'),
                'jenis_dinding' => $this->request->getPost('jenis_dinding'),
                'jenis_lantai'  => $this->request->getPost('jenis_lantai'),
                'ventilasi'     => $this->request->getPost('ventilasi'),
                'pencahayaan'     => $this->request->getPost('pencahayaan'),
                'air_bersih'     => $this->request->getPost('air_bersih'),
                'sanitasi'     => $this->request->getPost('sanitasi'),
                'jenis_bantuan' => $this->request->getPost('jenis_bantuan'),
                'id_wilayah'    => $this->request->getPost('id_wilayah'),
                'foto' => $nama_file_foto,
            ];

            $this->ModelRumah->UpdateData($id_rumah, $data);
            session()->setFlashdata('insert', 'Data Berhasil Diupdate !!');
            return redirect()->to('Rumah');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to('Rumah/Edit/' . $id_rumah)->withInput('validations', \Config\Services::validation());
        }
    }

    //delete
    public function Delete($id_rumah)
    {
        //delete foto
        $rumah = $this->ModelRumah->DetailData($id_rumah);
        if ($rumah['foto'] <> '') {
            unlink('foto/' . $rumah['foto']);
        }
        $data = [
            'id_rumah' => $id_rumah,
        ];
        $this->ModelRumah->DeleteData($id_rumah, $data);
            session()->setFlashdata('delete', 'Data Berhasil Didelete !!');
            return redirect()->to('Rumah');
    }

    public function Detail($id_rumah)
    {
        $data = [
            'judul' => 'Detail Rumah',
            'menu' => 'rumah',
            'page' => 'rumah/v_detail',
            'rumah' => $this->ModelRumah->DetailData($id_rumah),
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    //kabupaten, kecamatan
    public function Kabupaten()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $kab = $this->ModelRumah->allKabupaten($id_provinsi);
        echo '<option value=""> --Pilih Kabupaten-- </option>';
        foreach ($kab as $key => $value) {
            echo '<option value="' . $value['id_kabupaten'] . '">' . $value['nama_kabupaten'] . '</option>';
        }
    }

    public function Kecamatan()
    {
        $id_kabupaten = $this->request->getPost('id_kabupaten');
        $kec = $this->ModelRumah->allKecamatan($id_kabupaten);
        echo '<option value=""> --Pilih Kecamatan-- </option>';
        foreach ($kec as $key => $value) {
            echo '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>';
        }
    }
}
