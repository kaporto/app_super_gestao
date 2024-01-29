<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos(){
        // utilizacao normal
        //return $this->belongsToMany('App\Models\Produto','pedidos_produtos');

        //utilizacao com modelos / tabelas de nome diferentes
        return $this->belongsToMany('App\Models\Item','pedidos_produtos','pedido_id', 'produto_id')->withPivot('created_at');
    }
}
