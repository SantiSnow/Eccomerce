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

