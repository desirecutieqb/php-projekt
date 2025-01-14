<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'borrow_date',
        'return_date',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_borrows');
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
