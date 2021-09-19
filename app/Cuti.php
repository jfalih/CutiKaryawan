<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $fillable = [
        'alasan', 'from', 'to', 'file', 'status', 'cat_id', 'user_id', 'sub_id'
    ];
    public $timestamps = false; 
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
