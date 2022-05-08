<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function is_super_admin()
    {
        return $this->name == "Super Admin";
    }

    public function is_admin()
    {
        return $this->name == "Admin";
    }
}
