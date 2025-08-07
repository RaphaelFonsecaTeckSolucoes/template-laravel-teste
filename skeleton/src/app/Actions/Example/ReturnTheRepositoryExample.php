<?php

namespace App\Actions\Example;

use App\Repositories\Modules\ExampleRepository;

/**
 * Uma "action" é uma classe que contém um único método chamado "execute".
 * Ela é responsável por executar uma única tarefa, como criar um novo usuário ou atualizar um modelo.
 * O nome dela deve descrever a ação que ela executa.
 * Acões podem ser chamadas em controllers, jobs e em outras classes de açoes.
 */
class ReturnTheRepositoryExample
{
    public function __construct(private ExampleRepository $exampleRepository)
    {
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute()
    {
        // aqui você pode fazer o que quiser com o repositório
        return $this->exampleRepository;
    }
}
