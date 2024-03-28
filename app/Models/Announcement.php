<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = ['title','body','price',];

    public function category()
        {
            return $this->belongsTo(Category::class);
        
        }
        public function user ()
            {
                return $this->belongsTo(User::class);
            }

        public function setAccepted($value)
        {
            $this->is_accepted = $value;
            $this->save();
            return true;

        }

        public static function toBeRevisonedCount()
        {
        return Announcement::where('is_accepted', null)->count();
        }

        public function images()
        {
            return $this->hasMany(Image::class);
        }
        
    
}
