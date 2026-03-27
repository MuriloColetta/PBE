<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovimentacaoEstoque extends Model
{
    protected $guarded = [];

    use HasFactory;
    protected $table = 'movimentacao_estoques';

    protected $fillable = [
        'produto_id',
        'tipo',
        'quantidade',
        'observacao',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    protected static function booted()
    {
        
        static::created(function ($movimentacao) {
            $produto = $movimentacao->produto;

            if ($movimentacao->tipo === 'entrada') {
                $produto->estoque += $movimentacao->quantidade;
            } else {
                $produto->estoque -= $movimentacao->quantidade; 
            }

            $produto->save();
        });
    }
}
