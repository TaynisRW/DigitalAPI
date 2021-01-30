<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/TaynisRW/DigitalAPI/master/public/favicon.ico" width="150" height="150"></a></p>

<p align="center">
<a href="https://github.com/TaynisRW/DigitalAPI/"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://github.com/TaynisRW/DigitalAPI/"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://atiwalkers.com/api/v2/products"><img src="https://poser.pugx.org/google/apiclient/v/unstable" alt="Latest Stable Version"></a>
<a href="https://opensource.org/licenses/MIT"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Guía para instalar el proyecto
**Desarrollo de una API REST con autenticación usando Passport en Laravel 8 para hacer un CRUD de productos y carrito de compras**

1. Descarga el repositorio
2. Descromprime la carpeta dentro del directorio de tu servidor web
3. Renombra la carpeta (Opcional) 
4. Entra a la carpeta desde la terminal `cd directorio/de/la/carpeta`
5. Copia el contenido del archivo `.env.example` a un nuevo archivo llamado `.env`
    * Si estás en Liunx o Mac puedes ejecutar el comando: `cp .env.example .env`
6. Crea una base de datos para el proyecto (digital_docs)
7. Modifica las variables de conexión del nuevo archivo `.env` 
    * Define los datos de conexión 
        * DB_DATABASE=
        * DB_USERNAME=
        * DB_PASSWORD=
8. Ejecuta `composer install`
9. Ejecuta `php artisan key:generate`
10. Ejecutar `php artisan migrate` para generar las tablas de la base de datos 
11. Ejecuta  `php artisan migrate --seed` para migrar las tablas y los datos de prueba generados (opcional)
12. Ejecuta `php artisan db:seed` para importar los datos de prueba a las base de datos (opcional)
13. Ejecuta `npm install` o `yarn`
14. Ejecuta `npm run dev` o `yarn dev`
15. Ejecuta el comando `php artisan serve`
16. Para hacer las pruebas debes tener un programa especial para mandar Request de API por ejemplo (PostMan)
17. Abre la aplicación en el navegador y comienza a ver como puedes mejorar el sistema

## License
Licensed under the [MIT license](https://opensource.org/licenses/MIT).
