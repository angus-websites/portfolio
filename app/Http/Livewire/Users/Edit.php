<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    use AuthorizesRequests;

    public User $user;
    public $user_new_password;
    public $user_new_password_confirmed;
    public $is_create;

    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a project
         */
        $rules = [
            'user.email' => ["required", "email", "unique:users,email,". $this->user->id],
            'user.name' => 'required|string|min:1',
            'user.role_id' => 'required|exists:roles,id'
        ];

        // Conditional Validation
        if($this->is_create){
            $rules['user_new_password'] = 'required|min:5';
        }else{
            $rules['user_new_password'] = 'nullable|min:5';
        }
        $rules['user_new_password_confirmed'] = 'same:user_new_password';


        return $rules;
    }

    protected $messages = [
        'user_new_password_confirmed.same' => 'Passwords do not match'
    ];

    public function updated($propertyName)
    {
        /**
         * Called when the user
         * changes a single
         * input / property on the page
         */
        
        $this->validateOnly($propertyName);
    }

    public function saveUser()
    {
        /**
         * Save the details for
         * this user to the database
         */
        $this->validate();

        // If the password has been changed then validate & update
        if ($this->user_new_password){
            $this->user->password = $this->user_new_password;
        }

        $this->user->save();

        if ($this->is_create){
            return redirect()->route('users.index')->with("success","User created!");
        }
        session()->flash('success', 'User successfully updated.');


    }
    

    public function mount(User $user)
    {
        $this->is_create = !$user->exists;

        // Validate
        $this->is_create ? $this->authorize("create", User::class) : $this->authorize('update', $user)
        ;
        $this->user = $user;

        // Assign defaults on load
        if($this->is_create){
            $this->user->role_id = Role::where("changeable" ,"1")->firstOrFail()->id;
        }

        
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
