# REST API (Backend) 

Oriontek acaba de contratarlo a ústed para crear un Sistema de clientes en línea. La misma le instruyó construir un REST API (Backend) el cuál permita sus clientes consumir el listado de clientes disponibles, así como también, leer las direcciones de cada cliente. 

En próximas iteraciones se agregará soporte para create y borrar clientes, y además, se agregará soporte para interconectarse con otros servicios.

## Requerimientos Técnicos 
- PHP 7.4.7 o mayor
- Mysql o phpmyadmin(Xampp)
- Composer

## Proceso de instalación del API

1 - Clonar el repositorio utilizando:   
```
git clone https://github.com/franchyreyes/php-rest-api.git
```

2 - Entrar en la carpeta del repositorio clonado y ejecutar:

```
composer install
```

3 - Una vez composer este instalado, debe cambiar el nombre de .env.example a .env y configurar los datos de su base de datos.

4 - Abrir el navegador de su preferencia.

5 - Levante el servidor de su preferencia y su entorno de base de datos. En nuestro caso tenemos a Xampp
    1 - Instalar Xampp
    2 - Ir a Xampp Control Panel.
    3 - Hacer click en start en la seccion de apache
    4 - Hacer click en start en la seccion de Mysql

5 - Ejecutar la url en el navegador y hacer enter para cargar la base de datos.
```
http://localhost/{nombre_de_su_proyecto}/start.php
```

6 - Para visualizar el listado de clientes acceder:
'''
http://localhost/{nombre_de_su_proyecto}/customer
''' 

7 - Para visualizar un cliente acceder a:
'''
http://localhost/{nombre_de_su_proyecto}/customer/1
''' 

8 - Para visualizar todas las dirreciones de un cliente:
'''
http://localhost/{nombre_de_su_proyecto}/customer/1/address/)
'''
