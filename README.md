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

#### Configuración para Codeception
Para ejecutar las pruebas de Codeception, debes tener instaladas las siguientes herramientas:
 - ChromeDriver: Descárgalo desde [Chrome for Testing](https://googlechromelabs.github.io/chrome-for-testing/) y asegúrate de que sea compatible con la versión de tu navegador Chrome.
 - Selenium Server: Descárgalo desde [Selenium Releases](https://github.com/SeleniumHQ/selenium/releases) e instala la última versión disponible de "Selenium Server".
 - Java: Asegúrate de tener instalada la última versión de Java.
   
Nota: Es recomendable tener tanto ChromeDriver como Selenium Server en una misma carpeta para facilitar la ejecución.

#### Instalación de Dependencias
##### Codeception
Para instalar las dependencias de Codeception, ejecuta:
```bash
composer i
````
##### Cypress
Para instalar las dependencias de Cypress, ejecuta:
```bash
npm i
````

### Información del Proyecto
Este proyecto es un sistema simple de autenticación de usuarios y registro de usuarios. Las pruebas automáticas se realizarán sobre este sistema.
Una vez clonado el repositorio, podrás acceder al sistema en la siguiente ruta: `http://localhost/<nombre-carpeta_clonada>`

### Pasos para correr las pruebas.
##### Codeception 
Paso 1 : Se debe ejeuctar el chromeDirve y el servidor de serlemiun, para el servidor de serlenin se abre el cmd desde la mis carpeta de ubicación y se ejecuta el siguiente comando.
```bash
 java -jar selenium-server-<version-del-selenin>.jar standalone
````
Paso 2 : Se ejecuta el siguiente comadno desde la raiz del proyecto, para ejeuctar las pruebas automaticas de acceptance.
```bash
php vendor/bin/codecept run acceptance
php vendor/bin/codecept run acceptance FirstCest.php
 ````
##### Cypress
Paso 1 : Se debe ejeuctar el siguiente comando desde la raiz del proyecto.4
- Ejecutar desde la insterfacea de usuarios :
  ```bash
  npx cypress open
  ````
  Nota : Este comando abre uns interfaz donde se puede ejeuctar las prueba aotomatica.
       Paso 1: Abirr la interfaz, Elegir el tipo pruebas que este caso es (E2E testing)
       Paso 2 : Elegir el navegador que deseas correr las pruebas y dar en comezar.
       Paso 3 : Dar clic al nombre de la prueba que este caso es (registrar.cy.js)
- Ejecutar desde la línea de comado :
  ```bash
 	 npx cypress run 
  ````
