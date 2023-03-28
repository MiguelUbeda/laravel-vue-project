<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   protected $fillable = [
      'title',
      'description',
      'url',
      'image',
  ];
  
  public function profileImage()
  {
   $imagePath = ($this->image) ? $this->image : '/storage/uploads/DwelRoqFG54yMSRCmrf5A1fMbzR29BNriBIcuxYy.png';
   return '/storage/' . $imagePath;
  }

   public function user()
   {
    return $this->belongsTo(User::class);
   }
}
