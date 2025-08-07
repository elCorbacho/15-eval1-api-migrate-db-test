<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = ['nombre', 'fecha_inicio', 'estado', 'responsable', 'monto'];
    // protected $table = 'proyectos'; // Descomenta si tu tabla tiene un nombre diferente
}

