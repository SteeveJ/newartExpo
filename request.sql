ALTER TABLE user ADD CONSTRAINT FK_8D93D649A76ED395 FOREIGN KEY (user_id) REFERENCES users (id);
ALTER TABLE user ADD CONSTRAINT FK_8D93D6495FB89118 FOREIGN KEY (coverpicture_id) REFERENCES picture (id);
CREATE UNIQUE INDEX UNIQ_8D93D649A76ED395 ON user (user_id);
CREATE INDEX IDX_8D93D6495FB89118 ON user (coverpicture_id);
