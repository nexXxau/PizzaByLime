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
/**
 * Функция создает таблицы в базе данны с указаными значениями
 *
 * @param string $table Название таблицы
 * @param array $columns Ассоциативный массив, название колонки и значение
 *
 * @return string Возращает информацию о статусе
 */
function db_table_create($table, $columns)
{
    global $config;
    $db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

    $sql_columns = array();
    foreach ($columns as $name => $type) {
        $sql_columns[] = "`$name` $type";
    }

    $sql = "CREATE TABLE IF NOT EXISTS `$table` (" . implode(", ", $sql_columns) . ");";
    if ($db->query($sql) === TRUE) {
        return "Таблица $table создана!";
    } else {
        return "Ошибка создания: " . $db->error;
    }
}