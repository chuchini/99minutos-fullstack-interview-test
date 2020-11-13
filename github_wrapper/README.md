Las carpetas principales donde se hacen los cambios y se almacenan los archivos para el funcionamiento de la web app son:

1. app/http/controllers/ ---> aquí se encuentran los controladores encargados de modelar los objetos de la API y hacer su envoltura,
   para que en caso de que la API cambie, únicamente se tenga que cambiar el código de los métodos de los controladores en lugar
   de todos los lugares donde se usara la API (en caso de que no se hiciera una envoltura).
  
2. app/public/js ---> aquí se encuentra un pequeño archivo custom.js para implementar una pequeña funcionalidad de la web app.

3. app/resources/views ---> En esta carpeta encontraremos todas las vistas usadas en esta pequeña web app, así como otra carpeta layout
   donde se encuentra el layout principal de la app, que extendemos a las demas vistas usando la funcionalidad de blade.
   
4. app/routes ---> Por último, aquí se encuentran las rutas que usaremos para las vistas, siendo que las que usamos se encuentran en
   el archivo de web.php
   
Todo el código se encuentra documentado.
