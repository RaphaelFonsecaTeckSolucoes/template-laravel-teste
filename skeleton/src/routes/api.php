<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Example\ExampleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/template', 'middleware' => ['auth:api','ValidateRole']], function () {
    Route::get("/project-name", [ExampleController::class, "getProjectName"]);
});

// EX: PERMISSOES ROLE CadastroEmpresa
// EmpresaConvenioReadOnly
// EmpresaFundosReadWrite
// EmpresaConsignatariaUpdateOnly
// EmpresaContatoFullAccess
// EmpresaEnderecoFullAccess

// EX: PERMISSOES ROLE 2
// ClienteDadosBancariosFullAccess
// ClienteDadosProfissionaisFullAccess
// ClienteMargensFullAccess

// index: Retorna uma lista de recursos.
// Método HTTP: GET
// URL: /example
// store: Armazena um novo recurso.
// Método HTTP: POST
// URL: /example
// show: Retorna um recurso específico.
// Método HTTP: GET
// URL: /example/{id}
// update: Atualiza um recurso específico.
// Método HTTP: PUT ou PATCH
// URL: /example/{id}
// destroy: Remove um recurso específico.
// Método HTTP: DELETE
// URL: /example/{id}
