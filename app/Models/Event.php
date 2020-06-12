<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_id',
        'owner_id',
        'title',
        'note',
        'start',
        'end',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    /**
     * @param $title
     * @return void
     */
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = Crypt::encryptString($title);
    }

    /**
     * @param $title
     * @return string
     */
    public function getTitleAttribute($title)
    {
        if($title !== null){
            return Crypt::decryptString($title);
        }

        return '';
    }

    /**
     * @param $note
     * @return void
     */
    public function setNoteAttribute($note)
    {
        $this->attributes['note'] = Crypt::encryptString($note);
    }

    /**
     * @param $note
     * @return string
     */
    public function getNoteAttribute($note)
    {
        if($note !== null){
            return Crypt::decryptString($note);
        }

        return '';
    }

    /**
     * @return BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
