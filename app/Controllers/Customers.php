<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\HTTP\RedirectResponse;

class Customers extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function newForm(): string
    {
        return view('customers/new', [
            'title' => 'Add Customer',
        ]);
    }

    public function create(): RedirectResponse|string
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new CustomerModel();
        $model->insert([
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/customers/new')->with('success', 'Customer added successfully.');
    }

    public function edit(int $id): string|RedirectResponse
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            return redirect()->to('/customers/new')->with('error', 'Customer not found.');
        }

        return view('customers/edit', [
            'title'    => 'Edit Customer',
            'customer' => $customer,
        ]);
    }

    public function update(int $id): RedirectResponse
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            return redirect()->to('/customers/new')->with('error', 'Customer not found.');
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
        ]);

        return redirect()->to('/customers/edit/' . $id)
            ->with('success', 'Customer updated successfully.');
    }
}
