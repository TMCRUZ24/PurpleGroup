CREATE TABLE users (
  idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  uidUsers TINYTEXT NOT NULL,
  emailUsers TINYTEXT NOT NULL,
  pwdUsers LONGTEXT NOT NULL
);

CREATE TABLE posts (
  idPosts INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  titleposts VARHAR(255),
  subjectpots LONGTEXT,
  date VARCHAR (255)
);
