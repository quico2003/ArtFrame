# ArtFrame
Aplicacion web en la cual un artista podra logearse para poder crear su propia pagina web donde mostrar su trabajo, obras de arte, informacion personal....


## art_frame_db

### users

-id
-first_name (primer nombre del usuario, editable desde el apartado profile)
-last_name (Segundo nombre del usario, editable desde el apartado profile)
-email (Email del usuario, unico por lo tanto de mucha utilidad para diferenciar o incluso enviar emails de verificación)
-url_name (Terminacion de el apartado de cada usuario EJ: www.ArtFrame.com/jose este seria el apartado de Jose)
-biography (Biografia del artista, editable desde el apartado profile)
-password
-created_at (Fecha de creacion del usuario)
-updated_at (Ultima vez que se ha modificado el usuario)
-deleted_at(El usuario puede borrarse a si mismo, metodo de cancelacion de la subscripción)
-token
-expiredate

### artworks

-id
-user_id
-title
-description
-image_url
-Type ENUM for type of art ('painting', 'sculpture', 'drawing', 'photography', 'digital', 'other')
-price
-created_at
-updated_at
-deleted_at

### userpages

id
user_id
theme
image
... (Todo lo que se pueda imaginar que se pueda modificar en una landingPage, tambien si el usuario es premium tiene la opcion de tener mas de una pagina asta un total maximo como por ejemplo 5, esto le puede permitir que tenga una landingPage, una pagina con todos sus cuadros y mas info sobre ellos y algun tipo de pagina mas como informacion personal o eventos que realizara dentro de poco)