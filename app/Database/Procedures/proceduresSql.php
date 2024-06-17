sp_users-> Procedimiento Almacenado para el filtro de cada marca con su debido modelo 

DELIMITER $$

CREATE DEFINER = 'root'@'localhost' PROCEDURE sp_users()
BEGIN
    SELECT
        US.User_id, US.User_documento, US.User_nombre, US.User_apellido_paterno, US.User_apellido_materno, US.User_telefono, US.User_correo, US.User_password, US.Roles_fk, US.User_status_fk, US.City_fk, US.Area_fk,  UST.User_status_name, RL.Roles_name, CI.City_name, AR.Area_name
    FROM
        users AS US
    INNER JOIN roles RL ON
        US.Roles_fk = RL.Roles_id
    INNER JOIN user_status UST ON
        US.User_status_fk = UST.User_status_id
    INNER JOIN cities CI ON
        US.City_fk = CI.City_id
    INNER JOIN areas AR ON
        US.Area_fk = AR.Area_id
    ORDER BY
        US.User_id ASC;
END$$

----------------------------------------------------------------------------------------

sp_elements-> Procedimiento Almacenado para el filtro de cada marca con su debido modelo 

DELIMITER $$

CREATE DEFINER = 'root'@'localhost' PROCEDURE sp_elements()
BEGIN
SELECT
    EL.Element_id, 
    EL.Element_nombre, 
    EL.Element_serial,
    EL.Element_imagen, 
    EL.Element_procesador, 
    EL.Element_memoria_ram, 
    EL.Element_disco, 
    EL.Element_valor, 
    EL.Element_stock, 
    EL.Category_fk, 
    EL.Element_status_fk, 
    EL.Brand_fk,
    MD.Brand_fk AS Model_Brand_fk,    -- Renombrar MD.Brand_fk
    ES.Element_status_name, 
    CT.Category_nombre, 
    BR.Brand_name, 
    MD.Model_name
FROM
    elements AS EL
INNER JOIN categories CT ON
    EL.Category_fk = CT.Category_id
INNER JOIN element_status ES ON
    EL.Element_status_fk = ES.Element_status_id
INNER JOIN brands BR ON
    EL.Brand_fk = BR.Brand_id
INNER JOIN models AS MD ON 
    MD.Brand_fk = BR.Brand_id
ORDER BY
    EL.Element_id ASC;
END$$

----------------------------------------------------------------------------------------

DELIMITER $$

DROP PROCEDURE IF EXISTS `sp_permissions_module_id`$$

CREATE DEFINER = `root`@`localhost` PROCEDURE `sp_permissions_module_id` (IN `roleModulesId` INT)   
BEGIN
SELECT  
    CONCAT('permission_',PM.Permissions_fk) AS "permission", 1 AS 'Status',RM.Modules_fk AS Modules_id FROM permissions_modules AS PM
INNER JOIN permissions P ON 
    PM.Permissions_fk=P.Permissions_id
INNER JOIN role_modules RM ON 
    PM.RoleModules_fk=RM.RoleModules_id
WHERE PM.RoleModules_fk=roleModulesId;
END$$
----------------------------------------------------------------------------------------

DELIMITER $$

DROP PROCEDURE IF EXISTS `sp_role_modules`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_role_modules` ()   
BEGIN
SELECT 
    RM.RoleModules_id,
    RM.Modules_fk,
    M.Modules_name,
    RM.Roles_fk,
    R.Roles_name,
    RM.update_at
FROM 
    role_modules as RM
INNER JOIN modules M ON 
    RM.Modules_fk=M.Modules_id
INNER JOIN roles R ON 
    RM.Roles_fk=R.Roles_id;
END$$
----------------------------------------------------------------------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `sp_role_modules_id`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_role_modules_id` (IN `roleId` INT)   
BEGIN
SELECT 
    RM.Modules_fk,
     MO.Modules_name,
     MO.Modules_route,
     MO.Modules_icon,
     MO.Modules_submodule,
     MO.Modules_parent_module,
      MO.Modules_description
FROM 
    role_modules as RM
INNER JOIN modules MO ON 
    RM.Modules_fk=MO.Modules_id
WHERE RM.Roles_fk=roleId;
END$$
----------------------------------------------------------------------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `sp_role_module_id`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_role_module_id` (IN `roleId` INT)   
BEGIN
SELECT  
    CONCAT('module_',RM.Modules_fk) AS "modules",
    1 AS Status,
    RM.Roles_fk AS Roles_id 
FROM 
    role_modules as RM
INNER JOIN modules M ON RM.Modules_fk=M.Modules_id
WHERE RM.Roles_fk=roleId;
END$$
----------------------------------------------------------------------------------------