<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Support\Helper\Acceptance;

class FirstCest
{
    // credeciales
    public $email = 'prueba@example.com';
    public $clave = 'contrasena123';

    public function _before(AcceptanceTester $I)
    {
        $pdo = Acceptance::getDbConnection();
        $stmt = $pdo->prepare('DELETE FROM usuarios WHERE email = :email');
        $stmt->execute([':email' => $this->email]);
    }

    public function _after(AcceptanceTester $I)
    {
        $pdo = Acceptance::getDbConnection();
        $stmt = $pdo->prepare('DELETE FROM usuarios WHERE email = :email');
        $stmt->execute([':email' => $this->email]);
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        // Registrar usuario
        $I->amOnPage('/login.php');
        $I->see('Inicio Sesión', 'p');
        $I->click('#registrar');

        // Rellenar el formulario
        $I->see('Registrar', 'p');
        $I->fillField('#nombre', 'Usuario de Prueba');
        $I->fillField('#email', $this->email);
        $I->fillField('#contrasena', $this->clave);

        // Enviar el formulario
        $I->click('#registraruser');
        $I->see('Usuario registrado con éxito', 'div');
        $I->click('#atrasLogin');

        // Credeciales incorrestas
        $I->fillField('#email', $this->email);
        $I->fillField('#contrasena', '3423');
        $I->click('#iniciarsesion');
        $I->see('Credenciales incorrectas', 'div');

        // Iniciar sesión
        $I->fillField('#email', $this->email);
        $I->fillField('#contrasena', $this->clave);
        $I->click('#iniciarsesion');
        $I->see('Bienvenido');

        // Cerrar sesión
        $I->click('#cerrarsesion');
        $I->see('Inicio Sesión', 'p');
    }
}
