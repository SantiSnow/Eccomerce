# Eccomerce
Ecommerce realizado en java ee, mysql, php, bootstrap.

Este Ecommerce esta pensado para sitios de venta electronica, desde luego es un ejemplo adaptable a varios comercios, por ello solo tiene dummys ilustrativos.

Tecnologias usadas:
Java. Jdbc, jsp
Mysql
Bootstrap
Javascript
Html5 y css3
Apache Tomcat - Wamp

LEER:

Uso: Para buscar en la pagina productos, necesita conectar con una base de datos myslq de forma local. Para ello tiene los parametros en un archivo Java independiente.

Para ingresar al sistema de Empleados, el enlace esta en la pagina ecommerceprueba.jsp. En la barra de navegacion hay un dropdown con el nombre "Menu" -> "Seccion Empleados". Esto lleva al log in de empleados que tiene un formulario de registro y otro de loggeo. Estos usuarios tambien estan conectados a una bbdd en mysql. Si se quiere probar el proyecto en local, se necesita una bbdd mysql en local con:

Usuario: "root"

password: ""

puerto: 3306

una base de datos llamada: usuarios

dos tablas llamadas: productos (para el buscador de productos)

y otra llamada: empleados (para el sistema de loggeo)

Servidores usados: TomCat 8.5 y Wamp (mysql 5.7)

Tambien estan las tablas subidas en la carpeta tablas




Posibles errores y soluciones si descarga el repositorio y el proyecto no funciona:

Revise usuario, contraseña y puertos de la base de datos.

Revise versiones de tomcat y wamp

Revise sentencias sql y que sus bases de datos lleven los mismos nombres

Revise versiones: (aunque git deberia resolver eso) mysql 5.7.26, php 7.3.5 y java 11

Revise que las tablas fueron subidas o importadas en el formato correspondiente
