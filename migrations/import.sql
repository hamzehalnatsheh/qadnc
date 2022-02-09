 ALTER TABLE `user` ADD qualifications TEXT DEFAULT null NULL;
ALTER TABLE `user` ADD experience TEXT DEFAULT null NULL;
ALTER TABLE `user` ADD activities TEXT DEFAULT null NULL;
ALTER TABLE `user` ADD phone varchar(100) DEFAULT null NULL;

ALTER TABLE `user` MODIFY COLUMN avatar varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'images/default.png' NULL;

ALTER TABLE `user` MODIFY COLUMN username varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT null NULL;


UPDATE `user`
SET `user`.`avatar`=  'images/default.png';


ALTER TABLE achievements MODIFY COLUMN vedio varchar(265) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT null NULL;
