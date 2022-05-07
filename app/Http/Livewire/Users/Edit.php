<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class Edit extends Component
{
    protected User $user;
    public $user_email;
    public $user_name;
    public $user_roleid;

    public $user_new_password;
    public $user_new_password_confirmed;

    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a project
         */
        return [
            'user_email' => ["required", "email", "unique:users,email,". $this->user->id],
            'user_name' => 'required|string|min:1',
            'user_roleid' => 'required|exists:roles,id'
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
        $this->user_email = $user->email;
        $this->user_name = $user->name;
        $this->user_roleid = $user->role_id;
    }

    public function render()
    {
        return view('livewire.users.edit',
        [
            "roles" => Role::where("changeable" ,"1")->get()
        ]
        );
    }
}
