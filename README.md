# Pruebas Automáticas con Codeception y Cypress

Primero, clona el repositorio utilizando el siguiente comando:

```bash
git clone https://github.com/EmersonFernandez/automaticTests.git
````
## Configuración e Instalación de Dependencias

### Requisitos Previos
Para ejecutar las pruebas correctamente y visualizar el proyecto, asegúrate de tener instaladas las siguientes herramientas:
- Node.js
- Composer
- xampp
- MySql
  
### Configuración de la Base de Datos MySQL

El script para crear la base de datos utilizada se encuentra en la carpeta `src/database/` bajo el nombre `script.sql`.
Sigue estos pasos para configurar la base de datos:

1. Abre el archivo `script.sql` en un editor de texto.
2. Ejecuta el script en tu servidor MySQL para crear las tablas necesarias.
3. Asegúrate de que las credenciales y la configuración en el archivo `.env` coincidan con los detalles de tu base de datos.

### Configuración de Variables de Entorno `.env `
 ```json
  "BASE_URL_TEST": "url_base",
  "DB_HOST": "host_name",
  "DB_NAME": "name_base",
  "DB_USER": "user_base",
  "DB_PASSWORD": "password_base"
````

#### Configuración para Codeception
Para ejecutar las pruebas de Codeception, debes tener instaladas las siguientes herramientas:
 - ChromeDriver: Descárgalo desde [Chrome for Testing](https://googlechromelabs.github.io/chrome-for-testing/) y asegúrate de que sea compatible con la versión de tu navegador Chrome.
 - Selenium Server: Descárgalo desde [Selenium Releases](https://github.com/SeleniumHQ/selenium/releases) e instala la última versión disponible de "Selenium Server".
 - Java: Asegúrate de tener instalada la última versión de Java.
   
*Nota: Es recomendable tener tanto ChromeDriver como Selenium Server en una misma carpeta para facilitar la ejecución.*

### Instalación de Dependencias
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

## Información del Proyecto
Este proyecto es un sistema simple de autenticación de usuarios y registro de usuarios. Las pruebas automáticas se realizarán sobre este sistema.
Una vez clonado el repositorio, podrás acceder al sistema en la siguiente ruta: 
```bash
http://localhost/<nombre-carpeta-clonada>
````
 *Nota : Remplazar `<nombre-carpeta-clonada>` por el nombre de la carpeta asignada en el xampp*

### Pasos para correr las pruebas
##### Codeception 
1. Iniciar Selenium Server y ChromeDrive:
 - Ejecutar ChromeDirve
 - Abre una terminal (CMD) en la ubicación donde se encuentra el archivo y ejecuta el siguiente comando:
   ```bash
    java -jar selenium-server-<version>.jar standalone
   ````
   *Nota: Reemplaza `<version>` con la versión correspondiente del archivo.*

2. Ejecutar las pruebas de aceptación:
  - Desde la raíz del proyecto, ejecuta los siguientes comandos para correr todas las pruebas o una prueba específica:
    ```bash
    php vendor/bin/codecept run acceptance
    php vendor/bin/codecept run acceptance FirstCest.php
    ````
##### Cypress
1. Ejecutar desde la interfaz de usuario:
  - Desde la raíz del proyecto, ejecuta
    ```bash
    npx cypress open
    ````
 Este comando abrirá una interfaz gráfica que permite gestionar y ejecutar las pruebas automáticas.
  - Paso 1: Selecciona el tipo de prueba (en este caso, E2E testing).
  - Paso 2: Elige el navegador donde deseas correr las pruebas y haz clic en "Comenzar".
  - Paso 3: Haz clic en el nombre de la prueba que deseas ejecutar (por ejemplo, `registrar.cy.js`).
2. Ejecutar desde la línea de comandos:
 - Para correr las pruebas directamente desde la terminal, ejecuta
   ```bash
   npx cypress run 
   ````
