<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Announcement extends Model
{
    use HasFactory,Searchable;
    protected $fillable = ['title','body','price',];
    
    public function toSearchableArray()
    {
        // $category = $this->category('name');
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category->name,

        ];
        return $array;
    }

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
        
        // conteggio annunci da revisionare 
        public static function toBeRevisonedCount()
        {
        return Announcement::where('is_accepted', null)->count();
        }

        public function images()
        {
            return $this->hasMany(Image::class);
        }

        
        
    
}
