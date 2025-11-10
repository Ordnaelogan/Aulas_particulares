<?php

namespace App\Http\Controllers;

// Estas linhas importam as funções de validação e autorização
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

// Esta linha importa o "Verdadeiro" Controller do Laravel
use Illuminate\Routing\Controller as BaseController;

// A classe abstrata agora "herda" (extends) do BaseController
abstract class Controller extends BaseController
{
    // E agora ela "usa" as funções de autorização e validação
    use AuthorizesRequests, ValidatesRequests;
}