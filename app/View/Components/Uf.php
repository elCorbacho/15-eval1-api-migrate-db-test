<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\UfService;

class Uf extends Component
{
    public float|null $valorUf;

    public function __construct(UfService $ufService)
    {
        // Usar caché para evitar múltiples llamadas a la API
        $this->valorUf = cache()->remember('valor_uf', 3600, function () use ($ufService) {
            return $ufService->obtenerValorUf();
        });
    }

    public function render()
    {
        return view('components.uf');
    }
}