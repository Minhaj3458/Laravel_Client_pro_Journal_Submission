<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class AuthInformation extends Model
{
    use HasFactory;
    public function user()
    {
      return $this->belongsTo(User::class,);
    }
}
