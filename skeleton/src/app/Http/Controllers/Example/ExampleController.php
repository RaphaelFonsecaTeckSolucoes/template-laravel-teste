<?php

namespace App\Http\Controllers\Example;

use App\Actions\Example\ReturnProjectName;
use App\Actions\Example\ReturnTheRepositoryExample;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExampleController extends Controller
{
    public function __construct() {
        // $token = Auth::token();
    }

    /**
     * Execute the action.
     */
    public function getProjectName(Request $request, ReturnProjectName $returnProjectName)
    {

        return Auth::token();

        $permissions = [
            "cozinheiro",
            "parteira",
            "fuzileiro_naval",
            "gerente-rh",
            "gerente_geral",
            "uma_protection"
        ];

        try {

            if(Auth::hasAnyRole('front-consig', $permissions)){
                return response()->json($returnProjectName->execute($request));
            }else{
                return response()->json(['God said:' => 'Thou shalt not steal: '], 401);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao acessar campanhas: ' . $e->getMessage()], 500);
        }
    }

    public function getProjectNameRepository(ReturnTheRepositoryExample $returnTheRepositoryExample)
    {
        return response()->json($returnTheRepositoryExample->execute());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json("index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response()->json("store");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return response()->json("show");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return response()->json("update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return response()->json("destroy");
    }
}
