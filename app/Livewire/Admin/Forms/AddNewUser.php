<?php

namespace App\Livewire\Admin\Forms;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddNewUser extends ModalComponent
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ];

    public function createUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'user_type' => 'admin',
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'User created successfully.');
        $this->dispatch('Users', 'refreshComponent');
        $this->closeModal();

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.forms.add-new-user');
    }
}
