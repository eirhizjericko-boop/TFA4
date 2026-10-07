<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Users extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index(): string
    {
        $model = new UserModel();

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $model->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function newForm(): string
    {
        return view('users/new', [
            'title' => 'Add User',
        ]);
    }

    public function create(): RedirectResponse
    {
        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
            'email'     => 'permit_empty|valid_email|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $model->insert([
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'avatar'    => null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/users')->with('success', 'User added successfully.');
    }

    public function edit(int $id): string|RedirectResponse
    {
        $model = new UserModel();
        $user = $model->find($id);

        if ($user === null) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }

        return view('users/edit', [
            'title' => 'Edit User',
            'user'  => $user,
        ]);
    }

    public function update(int $id): RedirectResponse
    {
        $model = new UserModel();
        $user = $model->find($id);

        if ($user === null) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }

        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username,id,' . $id . ']',
            'full_name' => 'required|max_length[100]',
            'email'     => 'permit_empty|valid_email|max_length[100]',
        ];

        $avatar = $this->request->getFile('avatar');
        $hasAvatarInput = $avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE;

        if ($hasAvatarInput) {
            $rules['avatar'] = 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
        ];

        if ($hasAvatarInput && $avatar->isValid() && ! $avatar->hasMoved()) {
            $fileName = $avatar->getRandomName();
            $uploadPath = FCPATH . 'uploads';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            service('image')
                ->withFile($avatar->getTempName())
                ->fit(300, 300)
                ->save($uploadPath . DIRECTORY_SEPARATOR . $fileName);

            $data['avatar'] = $fileName;
        }

        $model->update($id, $data);

        return redirect()->to('/users/edit/' . $id)
            ->with('success', 'User updated successfully.');
    }
}
