<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trainings';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'duration',
        'user_id',
        'type_id',
    ];

    /**
     * Get the user that owns the training
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the type of the training
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * The categories that belong to the training
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'trainings_categories');
    }

    /**
     * Get the chapters for th training.
     */
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
