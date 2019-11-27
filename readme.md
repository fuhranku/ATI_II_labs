<p align="center"><img src="http://computacion.ciens.ucv.ve/escueladecomputacion/img/layout_publico/encabezado/logo_ciencias.jpg" width="100"></p>

## Laboratorio 1

Laboratorio 01 para el curso de ATI II. Aplicación demo para CRUD y localización en el framework PHP Laravel

## Cómo desplegar el laboratorio (MODO DESARROLLO)

### Prerequisitos (WINDOWS OS)

#### Instalando las herramientas esenciales
Aunque es posible desplegar la aplicación utilizando el comando

```
php artisan serve
```

Se sugiere el uso de XAMPP para montar la aplicación así como también la base de datos. Es necesario entonces:

- **[XAMPP](https://www.apachefriends.org/es/index.html)**
- **[PHP 7.x](https://windows.php.net/download/)**
- **[Composer dependencies installer](https://getcomposer.org/download/)**

#### Configurar el proyecto para despliegue de forma local
Esto es lo que se necesita para desplega la aplicación de forma local en la máquina

##### Clonar proyecto

```
git clone https://github.com/fuhranku/ATI_II_labs.git
```
NOTA: Si se está trabajando con XAMPP, por ejemplo, clonar el laboratorio dentro de la carpeta **htdocs** de XAMPP

##### Instalar las dependencias del composer
Siempre que se clone un nuevo proyecto de Laravel desde cero, se debe realizar la instalación de las dependencias. Esto lo que realmente instala Laravel, así como también todos los paquetes necesarios para que este funcione.

```
composer install
```

##### Crear una copia del archivo .env
Debido a que los _.env_ no se _committean_ por razones de seguridad, es necesario crear este archivo. Existe un archivo llamado _.env.example_ que es una plantilla. Haremos una copia de él para crear nuestro archivo _.env_, en donde se coloca parte de la configuración más importante de Laravel.

```
cp .env.example .env
```

##### Generar una llave de encriptamiento para la aplicación
Laravel requiere dicha llave para el correcto y seguro funcionamiento de distintos aspectos, por ejemplo, cookies, hashes de contraseñas, etc. Utilizaremos la terminal de Laravel para crear dicha llave **solo despues de tener el archivo de configuración .env**

```
php artisan key:generate
```

Si ahora se accede al archivo .env, ahora estará una larga cadena aleatoria de caracteres en el campo APP_KEY.

##### Crear una DB para la aplicación
Encender XAMPP, luego **Apache** y **MySQL** después ir a

```
localhost/phpmyadmin
```
y crear una base de datos para el proyecto a través de la simple interfaz de phpmyadmin. Como requerimiento de este equipo desarrollador, se decidió que la base de datos se llame **lab01**.

##### En el archivo .env, añadir la información de la base de datos para permitir que Laravel se conecte con la base de datos

Queremos que Laravel se conecte con la base de datos creada previamente. Para hacer esto, debemos añadir los credenciales de conexión en el archivo .env en los campos DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME y DB_PASSWORD para que coincidan con los de la BD creada. 

Usualmente la siguiente configuración debería funcionar:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lab01
DB_USERNAME=root
DB_PASSWORD=
```

Nota: Verificar el puerto que utiliza XAMPP para MySQL, por defecto es el 3306.

##### Migrar el modelo de Eloquent a la base de datos
Ahora se debe realizar la migración a la base de datos.

```
php artisan migrate
```

Es posible que este comando no funcione ya que el nombre de la tabla es demasiado extensa. Corregir como sigue

###### Corregir el error por longitud de nombre de BD
Ir al archivo AppServiceProvider.php dentro del proyecto y colocar el siguiente código:

```
use Illuminate\Support\Facades\Schema;

    public function boot()
    {
        Schema::defaultStringLength(191);
    }
```

Esto debería ser suficiente. Realizar nuevamente el comando de migrate para completar el proceso de migración.
Se sugiere mirar la base de datos dentro de phpmyadmin para verificar que los modelos del Eloquent que posee la aplicación han sido migrados exitosamente.

### Correr el proyecto
Encender **Apache** y **MySQL** desde XAMPP. Luego, simplement visitar

```
localhost/laboratorio01/public
```

## Autores
- **Frank Ponte** - Trabajo Inicial/Desarrollador - [fuhranku](https://github.com/fuhranku)
- **José Enrique Tirado** - Desarrollador - [jet29](https://github.com/jet29)

## Licencia

_The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT)._
