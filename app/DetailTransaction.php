<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailTransaction extends Model
{
    use SoftDeletes;

    protected $table = 'detailtransactions';

    protected $fillable = [
        'quantity', 'header_id', 'product_id'
    ];

    public function headerTransaction() {
        return $this->belongsTo(HeaderTransaction::class, 'header_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }
}
