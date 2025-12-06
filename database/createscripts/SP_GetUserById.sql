USE Laravel;

DROP PROCEDURE IF EXISTS sp_GetUserById;

DELIMITER $$

CREATE PROCEDURE sp_GetUserById(IN p_Id INT)
BEGIN
SELECT 
        USRS.Id
       ,USRS.name
       ,USRS.email
       ,USRS.rolename
FROM users AS USRS
WHERE USRS.Id = p_Id;

END$$

DELIMITER ;

/************************* Debug mode***************************

CALL sp_GetUserById(2);

*****************************************************************/