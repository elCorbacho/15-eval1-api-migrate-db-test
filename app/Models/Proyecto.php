<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha_inicio', 'estado', 'responsable', 'monto'];
    // protected $table = 'proyectos'; // Descomenta si tu tabla tiene un nombre diferente
}

