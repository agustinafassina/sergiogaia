/*link new fields*/
ALTER TABLE mk000780_gaia.novedades ADD link_novedad varchar(255) NULL;
ALTER TABLE mk000780_gaia.novedades MODIFY COLUMN fecha DATETIME DEFAULT NULL NULL;
