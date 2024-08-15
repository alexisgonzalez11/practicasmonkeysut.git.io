sudo sed -i 's/Listen 80$//' /etc/apache2/ports.conf
sudo sed -i 's/<VirtualHost \*:80>/ServerName 127.0.0.1\n<VirtualHost \*:8080>/' /etc/apache2/sites-enabled/000-default.conf
apache2ctl start

Pasos para poder configurar un codespace

 - 1.- Crear el codespace con el README, subir los archivos de nuestro proyecto a realizar.
 - 2.- Descargar el apache con estos codigos en la terminal del codespace:
    ```sh
    sudo sed -i 's/Listen 80$//' /etc/apache2/ports.conf
    ```
     El comando elimina la línea Listen 80 del archivo de configuración de Apache (/etc/apache2/ports.conf), impidiendo que el servidor escuche en el puerto 80, normalmente usado para HTTP.
    ```sh
    sudo sed -i 's/<VirtualHost \*:80>/ServerName 127.0.0.1\n<VirtualHost \*:8080>/' /etc/apache2/sites-enabled/000-default.conf
    ```
     El comando cambia el puerto de Apache de 80 a 8080 y establece 127.0.0.1 como nombre de servidor.
    ```sh
    apache2ctl start
    ```
    El comando inicia el servidor Apache.
 - 3.- Termina la descarga y configuracion y se agregan 2 puertos, se descarga SQLTOOLS.
 - 4.- Se crea una nueva conexion con todos los campos como 'mariadb'.
 - 5.- Se crea la tabla y se conecta al codigo del proyecto.
 - 6.- Se creo una contraseña encriptada que seria 'hola' en todos los usuarios creados.
