<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class document extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function pedido()
    {
        return $this->BelongsTo(Pedido::class);
    }
}
