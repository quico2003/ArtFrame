# ArtFrame
Aplicacion web para un artista, este puede crear sus propias obras de arte para asi poderlas mostrar a internet desde la pagina web.

## art_frame_db

### users

| Campo          | Tipo de dato        | Descripción                  |
| -------------- | ------------------- | ---------------------------- |
| id             | INT / SERIAL (PK)   | ID único del usuario         |
| username       | VARCHAR(50) UNIQUE  | Nombre de usuario            |
| password\_hash | VARCHAR(255)        | Contraseña (encriptada)      |
| email          | VARCHAR(100) UNIQUE | Correo electrónico           |
| created\_at    | TIMESTAMP           | Fecha de creación de usuario |
| updated\_at    | TIMESTAMP           | Fecha de creación de usuario |
| deleted_\at    | TIMESTAMP           | Fecha de creación de usuario |
| token          | TIMESTAMP           | Token del para la sesion     |
| expiredate     | TIMESTAMP           | Fecha de expiracion del token|

### artworks

| Campo          | Tipo de dato            | Descripción                              |
| -------------- | ----------------------- | ---------------------------------------- |
| id             | INT / SERIAL (PK)       | ID único de la obra                      |
| user_id        | INT                     | Relacion con el artista                  |
| category_id    | INT                     | Relacion con la category                 |
| title          | VARCHAR(255)            | Título de la obra                        |
| description    | TEXT                    | Descripción o historia de la obra        |
| image\_url     | VARCHAR(255)            | Ruta/URL de la imagen de la obra         |
| creation\_date | DATE                    | Fecha en que se creó la obra             |
| dimensions     | VARCHAR(100)            | Ejemplo: "100cm x 70cm"                  |
| medium         | VARCHAR(100) o ENUM     | Técnica (óleo, acrílico, acuarela, etc.) |
| price          | DECIMAL(10,2), NULLABLE | Precio (si está a la venta)              |
| is\_available  | BOOLEAN                 | ¿Está disponible o vendida?              |
| created\_at    | TIMESTAMP               | Fecha de registro en la plataforma       |
| updated\_at    | TIMESTAMP               | Última actualización                     |
| deleted\_at    | TIMESTAMP               | Puede eliminarse                         |


### categories

| Campo       | Tipo de dato      | Descripción            |
| ----------- | ----------------- | ---------------------- |
| id          | INT / SERIAL (PK) | ID de categoría        |
| name        | VARCHAR(100)      | Nombre de la categoría |
| description | TEXT              | Descripción opcional   |
