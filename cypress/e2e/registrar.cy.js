// data
const nombre = 'Usuario de prueba';
const email = 'pruebas@example.com';
const clave = 'pruebas';
// Consulta SQL parametrizada para insertar los datos
const query = `DELETE FROM usuarios WHERE email = ?`;
describe('Registrar usuarios', () => {

  before(() => {
    // Código que se ejecuta UNA VEZ antes de todas las pruebas
    cy.queryDatabase(query, [email]).then((results) => {
      cy.log(results);
    });
  });

  after(() => {
    // Código que se ejecuta UNA VEZ después de todas las pruebas
    cy.queryDatabase(query, [email]).then((results) => {
      cy.log(results);
    });
  });

  it('Registrar', () => {
    // Registrar usuario
    cy.visit('/login.php')
    cy.get('p').contains('Inicio Sesión').should('be.visible');
    cy.get('#registrar').click();

    
    // Llenamos el formulario
    cy.get('#nombre').type(nombre);
    cy.get('#email').type(email);
    cy.get('#contrasena').type(clave);

    // Damos click al btn de registrar
    cy.get('#registraruser').click();

    // Validamo que se haya registrado el usuario correctamente
    cy.get('div').contains('Usuario registrado con éxito').should('be.visible');
    
    // Regresamos al login 
    cy.get('#atrasLogin').click();
    
    // Iniciamos sesión
    cy.get('#email').type(email);
    cy.get('#contrasena').type(clave);
    cy.get('#iniciarsesion').click();

    // Validamos que estamos en la página de inicio 
    cy.url().should('match', /index\.php$/);
    cy.get('h1').contains('Bienvenido').should('be.visible');

    // Cerramos sesión
    cy.get('#cerrarsesion').click();
    
    // Validamos que cerró sesión
    cy.url().should('match', /login\.php$/);
    cy.get('p').contains('Inicio Sesión').should('be.visible');
  })
})