Sp_models-> Procedimiento Almacenado para el filtro de cada marca con su debido modelo 

DELIMITER $$

CREATE DEFINER = 'root'@'localhost' PROCEDURE sp_models()
BEGIN
SELECT MD.Model_id , MD.Model_name , MD.Brand_fk, BR.Brand_name FROM models AS MD
INNER JOIN brands BR ON MD.Brand_fk = BR.Brand_id
ORDER BY MD.Brand_fk ASC;
END$$



