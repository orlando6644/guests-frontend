<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\GuestService;

class GuestController extends BaseController
{
    private GuestService $guestService;

    public function __construct()
    {
        $this->guestService = new GuestService(new \App\Repositories\GuestExternalApiRepository());
    }    

    public function index()
    {       
        return view('guests/index', [
            'title' => 'Guest List',
            'guests' => $this->guestService->getAllGuests()
        ]);
    }

    public function create()
    {
        return view('guests/form', [
            'title' => 'Add New Guest',
            'guest' => ['name' => '', 'email' => '', 'phone' => ''],
            'action' => site_url('guests/store'),
        ]);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'phone' => 'permit_empty|max_length[15]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        try {
            $this->guestService->createGuest([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
            ]);
            
            return redirect()->to('/guests')->with('success', 'Guest added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to add guest: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $guest = $this->guestService->getGuestById($id);

        if (!$guest) {
            return redirect()->to('/guests')->with('error', 'Guest not found.');
        }

        return view('guests/form', [
            'title' => 'Edit Guest',
            'guest' => $guest,
            'action' => site_url('guests/update/' . $id),
        ]);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'phone' => 'permit_empty|max_length[15]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        try {
            $this->guestService->updateGuest($id, [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
            ]);
            
            return redirect()->to('/guests')->with('success', 'Guest updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update guest, contact support.');
        }
    }

}