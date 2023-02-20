<?php
// Подключение файла config.php
require_once 'config.php';


/**
 * Функция проверяет существует ли таблица
 *
 * @param string $table Название таблицы для проверки
 *
 * @return boolean Возращает значение в зависимости от существования таблицы
 */
function db_table_exist($table)
{
    global $config; // Используем массив $config, объявленный в файле config.php
    $db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
    $result = $db->query("SHOW TABLES LIKE '" . $table . "'");
    if ($result->num_rows == 1) {
        return true;
    } else {
        return false;
    }
}

function db_table_create($table)
{
    global $config;
    $db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
    $sql = "CREATE TABLE IF NOT EXISTS $table (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if ($db->query($sql) === TRUE) {
        return "Таблица $table создана успешно";
    } else {
        return "Ошибка создания таблицы: " . $db->error;
    }
}