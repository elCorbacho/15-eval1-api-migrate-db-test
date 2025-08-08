
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

| 🌐 Método  | 📍 Endpoint              | 📝 Descripción                        |
|------------|--------------------------|---------------------------------------|
| **GET**    | `/api/proyectosAPI`          | Listar todos los proyectos            |
| **GET**    | `/api/proyectosAPI/{id}`     | Obtener proyecto por ID               |
| **POST**   | `/api/proyectosAPI`          | Crear un nuevo proyecto               |
| **PATCH**  | `/api/proyectosAPI/{id}`     | Actualizar proyecto por ID            |
| **DELETE** | `/api/proyectosAPI/{id}`     | Eliminar proyecto por ID              |
| **GET**    | `/api/user`                  | Obtener usuario autenticado (Sanctum) |

> **Nota:** Todos los endpoints API están activos en `routes/api.php` y utilizan el prefijo `/api/proyectosAPI`.

### **Endpoints Web** (`routes/web.php`)

| 🌐 Método  | 📍 Endpoint              | 📝 Descripción                        |
|------------|--------------------------|---------------------------------------|
| **GET**    | `/`                      | Página principal (welcome)            |
| **GET**    | `/proyectos`             | Listar todos los proyectos            |
| **GET**    | `/proyectos/crear`       | Formulario para crear un proyecto     |
| **POST**   | `/proyectos`             | Guardar un nuevo proyecto             |
| **GET**    | `/proyectos/eliminar`    | Formulario para eliminar un proyecto  |
| **POST**   | `/proyectos/eliminar`    | Eliminar un proyecto                  |
| **GET**    | `/proyectos/editar/{id}` | Formulario para editar un proyecto    |
| **PATCH**  | `/proyectos/editar/{id}` | Actualizar un proyecto                |
