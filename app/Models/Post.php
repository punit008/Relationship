<?php

namespace App\Models;

// use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'name'
    ];

    // reverse one to many
    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function tags() {
        // If you do not follow the naming convention then you have to specify the table name and columns
        // return $this->belongsToMany(Tag::class, 'post_tag','post_id','tag_id');
        return $this->belongsToMany(Tag::class);
    }
}
