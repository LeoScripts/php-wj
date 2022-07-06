CREATE DATABASE db_store;

USE db_store;

CREATE TABLE category (
  code INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL
);

CREATE TABLE product (
  sku INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  description VARCHAR(100) NOT NULL,
  photo VARCHAR(255) NOT NULL,
  price FLOAT(12,2) NOT NULL,
  quantity INT(5) NOT NULL,
  created_at DATETIME NOT NULL
);


CREATE TABLE product_category(
product_sku INTEGER,
category_code INTEGER,
FOREIGN KEY(product_sku) REFERENCES product(sku),
FOREIGN KEY(category_code) REFERENCES category(code)
);


INSERT INTO  category (name, description)
VALUES
('informatica', 'coisas de informatica'),
('escritorio', 'coisas de escritorio'),
('papelaria', 'coisas de papelaria');

INSERT INTO  product (name, description, photo, price,quantity, created_at)
VALUES
('teclado','teclado mecanico','https://m.media-amazon.com/images/I/71xVYmz-y9S._AC_SY450_.jpg',199.99,50,'2022-05-10 22:10:34'),
('mouse','mouse gamer','https://m.media-amazon.com/images/I/416XwN-ZiHL._AC_.jpg',250.50,10,'2022-05-10 22:20:34'),
('Processador AMD Ryzen 7 5800X','8-Core, 16-Threads, 3.8GHz (4.7GHz Turbo), Cache 36MB, AM4, 100-100000063WOF','https://media.pichau.com.br/media/catalog/product/cache/2f958555330323e505eba7ce930bdf27/1/0/100-100000063wof_1.jpg',1997.90,146,'2022-05-10 22:20:34'),
('monitor','monitor gamer de 24 pol.','https://m.media-amazon.com/images/I/61QJlo+D8pL._AC_SY450_.jpg',188.99,5,'2022-05-10 22:22:34');



-- busca produtos que estejam na categoria selecionada
SELECT 
    product.name
FROM product_category
INNER JOIN product ON (product.sku = product_category.product_sku)
INNER JOIN category ON (
    category.code = product_category.category_code
    AND category.name='azul'
)

-- busca categorias de um produto
SELECT 
    category.name
FROM product_category
INNER JOIN category ON (category.code = product_category.category_code)
INNER JOIN product ON (
    product.sku = product_category.product_sku
    AND product.name='teclado'
)