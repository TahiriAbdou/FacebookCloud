<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Image extends Model implements HasMedia
{
    use HasMediaTrait;
    
    protected $table = 'images';

   
    public function user()
    {
        return $this->belongsTo(App\User::class);
    }
}
