<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;
    
    protected $fillable =[
    			'id_pessoa', 
    			'id_livro', 
    			'data_incio',
    			'data_fim', 
    			'data_devolucao', 
    			'devolvido'];
}
