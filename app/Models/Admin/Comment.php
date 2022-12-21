<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin\Journal;
class Comment extends Model
{
    use HasFactory;

    public function user()
    {
      return $this->belongsTo(User::class,);
    }

    public function journal()
    {
      return $this->belongsTo(Journal::class,);
    }
}
