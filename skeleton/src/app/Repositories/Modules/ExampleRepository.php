<?php

namespace App\Repositories\Modules;

use App\Models\Example;
use App\Repositories\Contracts\RepositoryContract;
use App\Repositories\Abstracts\BaseRepository;

/**
 * Toda a lógica de acesso a dados deve ser feita em repositórios.
 * Repositórios são responsáveis por abstrair a lógica de acesso a dados, permitindo que a aplicação use múltiplos tipos de armazenamento de dados. 
 * Repositórios NÃO devem conter lógica de negócio.
 * Repositórios NÃO devem ser chamados diretamente por controllers.
 * Repositórios DEVEM ser chamados por actions.
 */
class ExampleRepository extends BaseRepository
{
    public function __construct(protected Example $model){}
}
