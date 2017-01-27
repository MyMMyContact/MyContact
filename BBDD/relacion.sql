ALTER TABLE `tbl_contacto`
ADD CONSTRAINT `contactus`
FOREIGN KEY (`id_usuario`)
REFERENCES `tbl_contacto`(`id_contacto`)