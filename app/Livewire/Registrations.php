<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;

class Registrations extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:registrations,email',
        'phone' => 'required|string|min:11',
        'password' => 'required|min:6',
    ];

    public function save()
    {
        $this->validate();

        Registration::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Registration successful!');

        // Reset form
        $this->reset(['name', 'email', 'phone', 'password']);
    }

    public function render()
    {
        return view('livewire.registrations');
    }
}
