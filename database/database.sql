CREATE DATABASE microblog;
USE microblog;

CREATE TABLE users(
    id INT (255) AUTO_INCREMENT NOT NULL,
    name VARCHAR(100) NULL,
    lastname VARCHAR(100) NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR (255) NOT NULL,
    date DATE NULL,

    CONSTRAINT pk_users PRIMARY KEY (id),
    CONSTRAINT uq_email UNIQUE(email)
) ENGINE=InnoDb; -- por defecto, permite matener la integridad referencial

CREATE TABLE categories(
    id INT(255) AUTO_INCREMENT NOT NULL,
    name VARCHAR(100),

    CONSTRAINT pk_categories PRIMARY KEY (id)
)ENGINE=InnoDb; -- por defecto, permite matener la integridad referencial

-- cuando se elimine la categoria de esta entrada, que se elimine el registro donde este relacionado ON DELETE CASCADE
CREATE TABLE posts(
    id INT(255) AUTO_INCREMENT NOT NULL,
    user_id INT(255) NOT NULL,
    category_id INT(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description MEDIUMTEXT,
    date DATE NOT NULL,

    CONSTRAINT pk_posts PRIMARY KEY(id),
    CONSTRAINT fk_post_user FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_post_category FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE CASCADE 
)ENGINE=InnoDb; -- por defecto, permite matener la integridad referencial



#INSERTS PARA USERS#

-- El id es null, por que es autoincrementable
INSERT INTO users VALUES(null, 'Tiago', 'Dario', 'tiago@me.com', '123456', '2020-07-15');
INSERT INTO users VALUES(null, 'Victor', 'Velayos', 'victor@me.com', '123456', '2020-07-13');
INSERT INTO users VALUES(null, 'Maria', 'Caba', 'maria@me.com', '123456', '2020-05-07');
INSERT INTO users VALUES(null, 'Esther', 'Garzo', 'esther@me.com', '123456', '2020-05-01');


#INSERTAR FILAS SOLO CON CIERTAS COLUMNAS#

INSERT INTO users(email, password) VALUES('tiago@tiago.com', '123456');


#INSERTS PARA CATEGORIAS#

INSERT INTO categories VALUES (null, 'Quotes');
INSERT INTO categories VALUES (null, 'Poemas');


#INSERTS PARA ENTRADAS#

INSERT INTO posts VALUES(null, 1, 1, 'Untitled Love (I)', 'Ya perdí la cuenta de todos los besos que quiero darte.', CURDATE());
INSERT INTO posts VALUES(null, 1, 2, 'En mi oficio o mi arte sombrío', 'En mi oficio o mi arte sombrío ejercido en la noche silenciosa cuando sólo la luna se enfurece y los amantes yacen en el lecho con todas sus tristezas en los brazos, junto a la luz que canta yo trabajo no por ambición ni por el pan ni por ostentación ni por el tráfico de encantos en escenarios de marfil, sino por ese mínimo salario de sus más escondidos corazones. No para el hombre altivo que se aparta de la luna colérica escribo yo estas páginas de efímeras espumas, ni para los muertos encumbrados entre sus salmos y ruiseñores, sino para los amantes, para sus brazos que rodean las penas de los siglos, que no pagan con salarios ni elogios y no hacen caso alguno de mi oficio o mi arte..', CURDATE());

INSERT INTO posts VALUES(null, 2, 1, 'Untitled Love (II)', 'El amor puede con todo, me dijo. ¿Hablas de capacidad o de destrucción?, pensé.', CURDATE());
INSERT INTO posts VALUES(null, 2, 2, 'Un cambio en los climas del corazón', 'Un cambio en los climas del corazón vuelve seco lo húmedo, la bala de oro estalla sobre la tumba helada. Un clima en la comarca de las venas cambia la noche en día; la sangre entre sus soles ilumina al viviente gusano.', CURDATE());

