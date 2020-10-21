## Instrucciones para ejecutar este proyecto de laravel

POr favor asegurate de cumplir con los siguientes requerimientos mínimos:

Requerimientos:
- Composer version 1.10.15 (https://getcomposer.org/doc/00-intro.md)
- Laravel version 8.10.0 (https://laravel.com/docs/8.x/installation)
- npm version 6.14.8 (https://www.npmjs.com/get-npm)
- PHP version 7.4.3 (https://www.php.net/manual/es/install.php)

Sigue los siguientes pasos para ejecutar el proyecto en modo local en tu computadora:

1. Clona este repositorio en tu equipo.
2. Una vez que hayas clonado el repositorio, navega hasta el folder de github_wrapper.
3. Para crear el archivo .env, ejecuta:
```
cp .env.example .env
```
4. Debes ingresar tus credenciales de acceso de github en el archivo .env (GITHUB_USER y GITHUB_TOKEN).
5. Existen algunas dependencias de PHP que laravel 8.10.0 requiere para trabajar, dependiendo de la distribución de
   SO que estes utilizando. Este proyecto se realizo en ubuntu, para ello es necesario ejecutar:
```
sudo apt-get install php7.4-{bcmath, bz2, intl, gd, mbstring, mysql, zip, php-xml}
```
   Si se requiere alguna dependencia extra, sigue las instrucciones para instalarla que te aparezcan en pantalla.
6. Para instalar las dependencias de composer ejecuta:
```
composer install
```
7. Para instalar las dependencias de npm ejecuta:
```
npm install
```
8. Para generar la llave de laravel ejecuta:
```
php artisan key:generate
```
9. Para poner en marcha el servidor local ejecuta:
```
php artisan serve
```
Y sigue el link que aparece en pantalla.

Nuevamente, no olvide generar las credenciales de github. Para mayor información en como hacerlo visita el sitio oficial
de github: https://docs.github.com/en/free-pro-team@latest/github/authenticating-to-github/creating-a-personal-access-token

## Puntos importantes del código
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


# 99minutos Fullstack Engineer Interview
Interview test for fullstack Software Engineers

## Welcome!
If you’re reading this, it means we’re interested in working with you in 99minutos.com and solving amazing and difficult problems in shipping for online shopping tech in Latam.

This README provides the instructions to a small, self-contained test for a FullStack Software Engineer position.

## What we're looking for
We're looking for a talented and driven full-stack engineer, comfortable with building responsive front end experiences, as well as with designing and building rigorous APIs and backend services. 

This means that this test is designed to gather signal on your coding structure, the tradeoffs and decisions you make on API design, and how you build a lightweight frontend app to show the data coming from your API. We're excited to see what you build!

## The test
Today, we'll be building an API wrapper around the git information of this project. We suggest forking this repo and start working on it on your private fork, the url of which is the only thing you need to send us when you're done.

The main objects we'll be dealing with are:
- Commits
- Authors
- Branches
- PRs

We'd like to see a visual representation of the git history of this repo as a web-app, using the API previously described. To be specific, we'd like to see the following:
- A view where we can see the existing branches
- A branch detail view where we can see all the commits to one specific branch, with commit messages, authors and timestamps.
- A commit detail view where we can see the commit message, timestamp, number of files changed and author names / emails.
- A "PR" create view, where we can choose two branches (base and compare), and merge them together, just like Pull Requests work in Github. 
- A "PR" list view, where we see all created PRs and the following info: Author, Title, Description and Status (`Open`, `Closed`, `Merged`). If the status is `Open`, there should be a button that allows us to mark it as `Closed`.

For the **PR create view**, we'll ask the user for a PR title and description, and we'll give them 2 options: either save it (Status = `Open`), or merge it. Note that merge operations can fail due to conflicts or other reasons, so make sure you handle and show whatever error happens when merging. There's no need to do something about these errors other than show them in the frontend. After a successful merge, the PR should move to a `Merged` status.

## Deliverables
We expect this test to take around 4 hours, but not significantly more (your time is very valuable!). We're giving you a week from the date you receive it to complete it and send us your repo URL, using **whatever stack you feel most comfortable with**. Due to this, we ask that you also provide a `README` with instructions for running your project, both back and frontend, along with setup instructions (or provide a Dockerfile and a `docker run` instruction).

It's up to you to design how this should look code-wise, but we don't expect you to model all git objects in a DB. We're ok with reading them using a library wrapper for git like [GitPython](https://gitpython.readthedocs.io/en/stable/), on-demand. The only DB design required is the one for PRs.

## Grading
We'll grade this project according to completion percentage of the features requested, good coding style for both back and frontend. For us, good coding means:
- It's readable. We read code much more often than we write it, so it's important that we're clear on what we're doing and comment any hairy parts (which we don't really expect to have in this test!).
- It's reasonably well ordered and with a logically thought-out structure. We like to do separation of concerns, and deal with routing, DB models, serialization, etc in their own file structure / files. 
- Clear, understandable variable names. No one wants to read the whole file to understand what the variable `c1_2` means.

We also care about being able to run your test without significant effort on our part, so make sure you test the instructions you provide on your README.

### Things we won't be grading
- Design chops: we care that you know enough CSS not to be surprised when you need to work on it, but we're not picky about your solution's UX/UI.

### Bonus points
- Your code has tests.

If you come across any questions or anything we didn't cover on this README, feel free to reach out to us and we'll get you an answer as soon as possible.
If you have any question please contact jonathan@99minutos.dev or carlos.ramirez@99minutos.dev
Happy coding!
