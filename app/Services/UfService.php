<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UfService
{
    protected string $apiUrl = 'https://mindicador.cl/api/uf';

    /**
     * Devuelve el valor de la UF actual.
     */
    public function obtenerValorUf(): ?float
    {
        try {
            $response = Http::timeout(5)->get($this->apiUrl);
            if ($response->successful()) {
                return $response->json()['serie'][0]['valor'] ?? null;
            }
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}