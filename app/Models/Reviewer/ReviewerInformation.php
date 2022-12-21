<?php

namespace App\Models\Reviewer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class ReviewerInformation extends Model
{
    use HasFactory;
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
