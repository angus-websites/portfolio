<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class Edit extends Component
{
    public User $user;

    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a project
         */
        return [
            'user.email' => ["required", "email", "unique:users,email,". $this->user->id],
            'user.name' => 'required|string|min:1',
        ];
    }

    public function updated($propertyName)
    {
        /**
         * Called when the user
         * changes a single
         * input / property on the page
         */
        
        $this->validateOnly($propertyName);
    }
    

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.users.edit',
        [
            "roles" => Role::all()
        ]
        );
    }
}
