<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;

class Index extends Component
{

    use AuthorizesRequests;
    public $delete_modal_open = false;
    public $user_to_delete;

    public function showDelete(User $user)
    {
        $this->delete_modal_open = true;
        $this->user_to_delete = $user;
    }

    public function deleteUser()
    {
        /**
         * Delete the User
         */
        $this->authorize("delete", $this->user_to_delete);
        $this->user_to_delete->delete();
        $this->delete_modal_open = false;
        session()->flash('info', 'User deleted');

    }

    public function mount()
    {
        $this->user_to_delete = User::firstOrNew();
    }


    public function render()
    {
        return view('livewire.users.index');
    }
}
