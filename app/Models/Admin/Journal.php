<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin\Journal_Type;
use App\Models\Admin\Comment;
class Journal extends Model
{
    use HasFactory;
    public function user()
    {
      return $this->belongsTo(User::class,);
    }
    public function journal_type()
     {
      return $this->belongsTo(Journal_Type::class,);
     }

     public function comment()
     {
      return $this->hasMany(Comment::class,);
     }
}
