![Logo de la aplicación](public/images/logo.png)

# Sterna Logistics

El objetivo principal del proyecto Sterna es desarrollar una aplicación web funcional 
para la gestión de pedidos y transportes a gran escala. La plataforma permite a los 
administradores coordinar y gestionar los envíos y a los clientes seguir el estado de los 
mismos.  

# Tecnologías empleadas

* Laravel
* Bootstrap
* HTML - CSS
* JavaScript
* Google Maps API
* DOMPDF 
* SweetAlter2
* Mailtrap 
* Git - Github 
* Amazon Web Services 
* MariaDB
* Stripe
* Illustration Kit

# Diseño y estructura

* Página de inicio
* Panel de administración
* Pandel de cliente
* Inicio de sesión
* Registro
* Solicitud de envío
* Recuperación de credenciales

# Funcionalidades y etapas

El desarrollo de la aplicación se organizó en las siguientes etapas: 

### Autenticación y roles

Se implementaron formularios de login y registro diferenciados para clientes 
(distinguimos entre particulares y empresas dentro de esta categoría) y administradores. Se añadieron roles en la base de datos y control mediante Middlewares.

### Gestión de pedidos

El administrador puede agregar pedidos confirmar y modificar su estados. Se incluyen 
campos como origen, destino, fecha de salida, fecha de llegada entre otros. 

### Seguimiento de paquetes

El cliente tiene acceso a un buscador donde introduciendo su número de seguimiento 
puede consultar el estado y ubicación de su envío. Se utilizó la API de Google Maps 
para mostrar la ruta visualmente.

### Panel del cliente 

Al igual que los administradores los clientes también tienen acceso a un panel en el que 
pueden realizar diversas acciones como:

* Ver una tabla con todos los pedidos que tienen asociados.
* Modificar sus datos personales. 

# Pruebas, errores y soluciones planteadas 

Durante el desarrollo se realizaron pruebas de funcionalidad manuales, simulando 
acciones principales como la creación de pedidos, el seguimiento de envíos y la edición 
de perfiles, así como pruebas de interfaz y rendimiento.

### Login y registro 

Inicialmente, hubo dificultades al gestionar múltiples roles y vistas personalizadas según 
privilegios. Esto se resolvió utilizando Middlewares personalizados y ajustando las rutas 
de redirección. 

### Interacción con Google Maps

La API no se mostraba correctamente debido a problemas con la clave API y la configuración de permisos. Se soluciona generando una nueva clave desde Google Cloud Console y activando el servicio de mapas correspondiente. 

### Servidor de correo

Tras probar diferentes proveedores de servidores de correo dándonos error al enviar los 
correos de cambios de contraseña y actualización del estados de las órdenes. Optamos por Mailtrap el cual también nos dio problemas con el puerto de envío en la configuración incial. 

### Diseño base de datos 

Aunque no fue un problema como tal, durante el desarrollo hemos tenido que cambiar 
el diseño de la base de datos ya que ha medida que iba creciendo la aplicación el 
diseño no se adapta a las necesidades de ese momento.

### Implementación de pasarela de pago

Al principio intentamos implementar una pasarela de pago en Redsys sandbox y debido
a la falta de documentación y actualización de esta librería decidimos integrar la librería
de Stripe sandbox ya que estaba mucho mas actualizada, con esto fue mucho mas sencillo y no hubo problema alguno.

# Conclusiones

El proyecto ha conseguido los objetivos que nos hemos propuesto como la creación de
una página segura y robusta la cual cuenta con múltiples funcionalidades tanto a nivel
de usuario como de administrador. Hemos realizado un buen diseño y maquetación de
la página además de un comportamiento responsive.
