# Pruebas Automáticas con Codeception y Cypress

Primero, clona el repositorio utilizando el siguiente comando:

```bash
git clone https://github.com/EmersonFernandez/automaticTests.git
````
### Configuración e Instalación de Dependencias

### Requisitos Previos
Para ejecutar las pruebas correctamente y visualizar el proyecto, asegúrate de tener instaladas las siguientes herramientas:
- Node.js
- Composer
- xampp

#### Configuración de Variables de Entorno `.env `
 ```json
  BASE_URL_TEST = url_base # La ruta base de el aplicativo
  DB_HOST = host_name # Nombre del host 
  DB_NAME = name_base # Nombre de la base de dato
  DB_USER = user_base # Usuario de la base de dato
  DB_PASSWORD = password_base # Contraseña de la base de dato
````

#### Configuraciones para Codeception.
Para correr las preebas de Codeception debe tener intalado los sguientes Herramientas.
 - ChormeDrive : https://googlechromelabs.github.io/chrome-for-testing/, descargar el que es compatible con la versión del navegador
 - ServerSelemiin : https://github.com/SeleniumHQ/selenium/releases, descargar ultimar version 'selemiun server'
 - Java : Tener Java instalado ultimas versiones.
   
Nota : Recomendable tener el chromedirver y el server selimiun en una sola carpeta.

### Instalaccíones
Para instalar la despedencias de Condeception.
composer i

Parar Instalar la depedencias de Cypress.
npm i

### Información del proyecto
Este proyecto es un sistama simple de autenticación de usuarios y registro de usuario, con el cual vamos a realizar las pruebas automaticas.
Ya clondo el reposorio puede acceder al sistema desde esta rura : http://localhost/<nombre-carpeta_clonada>.

### Comandos para correr las pruebas
- Para ejecutar las pruebas acutomaticas de codeception: php vendor/bin/codecept run acceptance
- Para ejecutar las pruebas automaticas de cypress: npx cypress open (desde la insterfaz) o npx cypress run (desde la linea de comando)
