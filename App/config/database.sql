CREATE
    DATABASE wiki;
USE
    wiki;

CREATE TABLE users
(
    userId    int auto_increment primary key,
    username  varchar(255),
    email     varchar(255),
    password  varchar(255),
    userImage mediumblob
);
CREATE TABLE category
(
    categoryId          int auto_increment primary key,
    categoryName        varchar(255),
    categoryDescription varchar(255),
    categoryImage       mediumblob
);

CREATE TABLE tag
(
    tagId   int auto_increment primary key,
    tagName varchar(255)
);
CREATE TABLE wiki
(
    wikiId          int auto_increment primary key,
    wikiTitle       varchar(255),
    wikiContent     text,
    wikiDescription varchar(255),
    wikiImage       mediumblob,
    authorId        int,
    categoryId      int,
    FOREIGN KEY (authorId) REFERENCES users (userId) ON DELETE CASCADE,
    FOREIGN KEY (categoryId) REFERENCES category (categoryId) ON DELETE CASCADE,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP,
    isArchived int
);
CREATE TABLE wikiTag
(
    pivotId int auto_increment primary key,
    tagId   int,
    wikiId  int,
    FOREIGN KEY (wikiId) REFERENCES wiki (wikiId) ON DELETE CASCADE,
    FOREIGN KEY (tagId) REFERENCES tag (tagId) ON DELETE CASCADE
);
ALTER TABLE users
ADD COLUMN role int;

DELIMITER //
CREATE TRIGGER if not exists after_update_wikis
    AFTER UPDATE ON wiki
    FOR EACH ROW
BEGIN
    UPDATE wiki SET updatedAt = current_timestamp() WHERE wikiId = NEW.wikiId;
END;
//
DELIMITER ;
