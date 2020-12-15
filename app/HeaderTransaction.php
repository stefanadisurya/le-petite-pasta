<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderTransaction extends Model
{
    protected $table = 'headertransactions';

    protected $fillable = [
        'id', 'user_id'
    ];

    public function detailTransactions() {
        return $this->hasMany(DetailTransaction::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
