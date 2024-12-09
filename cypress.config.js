const { defineConfig } = require("cypress");

require('dotenv').config();
const mysql = require('mysql2');

module.exports = defineConfig({
  e2e: {
    baseUrl: process.env.BASE_URL_TEST,
    env: {
      apiUrl: process.env.BASE_URL_TEST,
    },
    setupNodeEvents(on, config) {
      on('task', {
        queryDatabase({query, params = []}) {
          return new Promise((resolve, reject) => {
            const connection = mysql.createConnection({
              host: process.env.DB_HOST,
              user: process.env.DB_USER,
              password: process.env.DB_PASSWORD,
              database: process.env.DB_NAME
            });
            connection.execute(query, params, (err, results) => {
              if (err) {
                reject(err);
              } else {
                resolve(results);
              }
            });
            connection.end();
          });
        }
      });
    },
  },
});
