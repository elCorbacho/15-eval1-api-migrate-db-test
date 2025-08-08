<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * permiten que los campos sean asignados en masa.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * permiten que los campos sean ocultados en las respuestas JSON.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * permiten que los campos sean convertidos a tipos específicos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * COMPONENTES QUE PERMITEN LA AUTENTICACIÓN JWT
     *
     * @return string
     */

    //funcion para obtener el identificador que se almacenará en el reclamo del sujeto del JWT.
    public function getJWTIdentifier(): string
    {
        return (string) $this->getKey();
    }

    //función para obtener las reclamaciones personalizadas del JWT.
    public function getJWTCustomClaims(): array
    {
        return [];
    }


}
