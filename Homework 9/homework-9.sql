-- 6. Write statements to create:
--  a. a new database in phpmyadmin called homework_9

CREATE DATABASE homework_9; 

-- b. a library table, in the create statement include the following columns:

CREATE TABLE library (
    id INT(11) NOT NULL AUTO_INCREMENT, 
    name VARCHAR(80) NOT NULL, 
    PRIMARY KEY (id)
); 

-- c. a books table, in the create statement include the following columns:

CREATE TABLE books (
    id INT(11) NOT NULL AUTO_INCREMENT, 
    name VARCHAR(80) NOT NULL, 
    PRIMARY KEY (id)
); 

-- d. libraryBook table, in the create statement include the following columns:

CREATE TABLE libraryBook (
    id INT(11) NOT NULL AUTO_INCREMENT, 
    libraryID INT(11) NOT NULL, 
    bookID INT(11) NOT NULL,  
    PRIMARY KEY (id)
); 

-- 7. Write statements to:
--  a. insert some data into the library and books tables

INSERT INTO library (name) VALUES ('Home Library'), ('School Library');
INSERT INTO books (name) VALUES ('The Great Gatsby'), ('The Outsiders'), ('It Ends With Us');

-- b. when you have the ids of the created rows, create some rows in the libraryBook table

INSERT INTO libraryBook (libraryID, bookID) VALUES (1, 1), (1, 2), (2, 3);

-- c. Select a library by id = 1

SELECT * FROM library WHERE id = 1;

-- d. Select a book using the like keyword and % wildcards to search the name column if it contains a single word

SELECT * FROM books WHERE name LIKE '%word%';

-- e. Select all books and order them alphabetically by name

SELECT * FROM books ORDER BY name;

-- 8. Write a query with a join to return the name of all books that belong to libraries

SELECT books.name
FROM books
JOIN libraryBook ON books.id = libraryBook.bookID
JOIN library ON library.id = libraryBook.libraryID;

-- 9. Write an update statement to update the name of one of the books

UPDATE books SET name = 'The Great Gatsby Updated' WHERE id = 1;

-- 10. Write a delete statement to delete one of the books.

DELETE FROM books WHERE id = 3;
