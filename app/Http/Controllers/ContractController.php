<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetSimilarContractRequest;
use Symfony\Component\HttpFoundation\Response;

class ContractController extends Controller
{
    public function getSimilarContract(GetSimilarContractRequest $getSimilarContractRequest): Response
    {
        $pramCheck = $getSimilarContractRequest->validated();
        return new Response(json_encode($pramCheck));
    }
}
