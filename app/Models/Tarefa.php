<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    //propriedade para definir o nome da tabela, caso seja diferente do nome da model no plural
    protected $table = 'tarefas';
    protected $primaryKey = 'id'; //define o nome da chave primária - opcional para o caso de ser id o nome da chave primária
    public $incrementing = true; //define se a chave é auto-incremento ou não - opcional para o caso de true
    protected $keyType = 'int'; //define o tipo da chave primária - opcional para o caso de ser int

    public $timestamps = FALSE; //define que não serão usdaos os campos created_at e update_at - opcional para o caso dos campos sere usados;
//    CONST CREATED_AT = 'criado_em'; //setando um nome diferente para o campo created_at
//    CONST UPDATED_AT = 'atualizado_em'; //setando um nome diferente para o campo updated_at

    //indica quais campos poderão sofrer atualizacão em massa
    protected $fillable = ['titulo'];

}
