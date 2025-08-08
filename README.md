**Instala las dependencias PHP:**
   ```bash
   composer install
   ```

 **Copia el archivo de entorno y configura tus variables:**
   ```bash
   cp .env.example .env
   ```

 **Genera la clave de la aplicación:**
   ```bash
   php artisan key:generate
   ```

 **Configura la base de datos en el archivo `.env`.**

 **Ejecuta las migraciones:**
   ```bash
   php artisan migrate
   ```

. *(Opcional)* **Instala las dependencias frontend:**
   ```bash
   npm install && npm run dev
   ```

 **Inicia el servidor:**
   ```bash
   php artisan serve
   ```

## 🌐 Uso

Accede a la aplicación en [http://localhost:8000/proyectos](http://localhost:8000/proyectos).

## 📡 Endpoints principales

### **Endpoints API** (`routes/api.php`)

| 🌐 Método  | 📍 Endpoint                   | 📝 Descripción                        |
|------------|------------------------------|---------------------------------------|
| **POST**   | `/api/login`                 | Iniciar sesión y obtener token JWT    |
| **POST**   | `/api/register`              | Registrar un nuevo usuario            |
| **GET**    | `/api/proyectosAPI`          | Listar todos los proyectos            |
| **GET**    | `/api/proyectosAPI/{id}`     | Obtener proyecto por ID               |
| **POST**   | `/api/proyectosAPI`          | Crear un nuevo proyecto               |
| **PATCH**  | `/api/proyectosAPI/{id}`     | Actualizar proyecto por ID            |
| **DELETE** | `/api/proyectosAPI/{id}`     | Eliminar proyecto por ID              |
| **GET**    | `/api/user`                  | Obtener usuario autenticado (JWT)     |

> **Nota:** Todos los endpoints API están activos en `routes/api.php` y utilizan el prefijo `/api`.

---

### **Endpoints Web** (`routes/web.php`)

| 🌐 Método  | 📍 Endpoint                  | 📝 Descripción                        |
|------------|-----------------------------|---------------------------------------|
| **GET**    | `/`                         | Página principal (redirección a proyectos) |
| **GET**    | `/proyectos`                | Listar todos los proyectos            |
| **GET**    | `/proyectos/crear`          | Formulario para crear un proyecto     |
| **POST**   | `/proyectos`                | Guardar un nuevo proyecto             |
| **GET**    | `/proyectos/eliminar`       | Formulario para eliminar un proyecto  |
| **POST**   | `/proyectos/eliminar`       | Eliminar un proyecto                  |
| **GET**    | `/proyectos/editar`         | Formulario para buscar proyecto a editar |
| **GET**    | `/proyectos/editar/buscar`  | Buscar proyecto por ID para editar    |
| **GET**    | `/proyectos/editar/{id}`    | Formulario para editar un proyecto    |
| **PATCH**  | `/proyectos/editar/{id}`    | Actualizar un proyecto                |
| **GET**    | `/proyecto/buscar`          | Formulario para buscar un proyecto    |
| **GET**    | `/login`                    | Formulario de inicio de sesión        |
| **POST**   | `/login`                    | Procesar inicio de sesión             |
| **GET**    | `/register`                 | Formulario de registro de usuario     |
| **POST**   | `/register`                 | Procesar registro de usuario          |
