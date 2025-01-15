<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = ['title','description', 'status', 'lesson_id'];


    public $statusOptions = [
        'P' => 'Pendent',
        'O' => 'Open',
        'F' => 'Finished'
    ];

    // public function getOptionsStatus()
    // {
    //     return $this->statusOptions;
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function replies()
    {
        return $this->hasMany(ReplySupport::class);
    }
}
