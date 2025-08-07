<?php

namespace App\Actions\Example;

use Illuminate\Http\Request;

/**
 * Uma "action" é uma classe que contém um único método chamado "execute".
 * Ela é responsável por executar uma única tarefa, como criar um novo usuário ou atualizar um modelo.
 * O nome dela deve descrever a ação que ela executa.
 * Acões podem ser chamadas em controllers, jobs e em outras classes de açoes.
 */
class ReturnProjectName
{
    public function __construct()
    {
        
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(Request $request)
    {
        // AQUI VAI A LOGICA
        return $request;
    }
}
