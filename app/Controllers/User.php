<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    protected $ModelUser;
    protected $session;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->session = \Config\Services::session();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'judul' => 'User',
            'menu' => 'user',
            'page' => 'user/v_index',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Input User',
            'menu' => 'user',
            'page' => 'user/v_input',
        ];
        return view('v_template_back_end', $data);
    }

    public function InsertData()
    {
        if (!$this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'foto' => [
                'label' => 'Foto User',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('User/Input')->withInput();
        }

        $foto = $this->request->getFile('foto');
        $nama_file_foto = $foto->getRandomName();
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => sha1($this->request->getPost('password')),
            'foto' => $nama_file_foto,
        ];
        $foto->move('foto', $nama_file_foto);
        $this->ModelUser->InsertData($data);
        session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('User');
    }

    public function Edit($id_user)
    {
        $data = [
            'judul' => 'Edit User',
            'menu' => 'user',
            'page' => 'user/v_edit',
            'user' => $this->ModelUser->DetailData($id_user),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_user)
    {
        if (!$this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi !!']
            ],
            'foto' => [
                'label' => 'Foto User',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('User/Edit/' . $id_user)->withInput();
        }

        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $nama_file_foto = $foto->getRandomName();
            $foto->move('foto', $nama_file_foto);

            // Hapus foto lama
            $user = $this->ModelUser->DetailData($id_user);
            if ($user['foto'] && file_exists('foto/' . $user['foto'])) {
                unlink('foto/' . $user['foto']);
            }

            $data = [
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => sha1($this->request->getPost('password')),
                'foto' => $nama_file_foto,
            ];
        } else {
            $data = [
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => sha1($this->request->getPost('password')),
            ];
        }

        $this->ModelUser->UpdateData($id_user, $data);
        session()->setFlashdata('update', 'Data Berhasil Diedit !!');
        return redirect()->to('User');
    }

    public function DeleteData($id_user)
    {
        $user = $this->ModelUser->DetailData($id_user);
        if ($user['foto'] && file_exists('foto/' . $user['foto'])) {
            unlink('foto/' . $user['foto']);
        }

        $data = ['id_user' => $id_user];
        $this->ModelUser->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !!');
        return redirect()->to('User');
    }
}
