@if (!is_null($valorUf))
    <div class="alert alert-info p-2 rounded">
        <strong>UF Hoy:</strong> ${{ number_format($valorUf, 2, ',', '.') }}
    </div>
@else
    <div class="alert alert-warning p-2 rounded">
        <strong>UF no disponible</strong>
    </div>
@endif