<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Account extends Component
{
    use AuthorizesRequests;
    public $user_id;
    public $user_email;

    public $current_password;
    public $new_password;
    public $new_password_confirmed;


    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a user
         */
        return [
            'current_password' => ['required'],
            'new_password' => 'required',
            'new_password_confirmed' => 'same:new_password'
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
        $this->user_id=$user->id;
        $this->user_email = $user->email;
    }

    public function render()
    {
        return view('livewire.users.account');
    }

    public function updateAccount()
    {
        $this->authorize('updateAccount', User::class);
        $this->validate();
        $user = User::findOrFail($this->user_id);

        // Validate current password
        if(Hash::check($this->current_password, $user->password)){
            // Update the users password
            $user->password = $this->new_password;
            $user->save();
            session()->flash('success', 'Password Updated!');
        }else{
            $this->addError('current_password', 'Password incorrect');
             
        }
    }
}
