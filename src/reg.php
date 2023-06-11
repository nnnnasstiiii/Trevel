<?php
const USERS_FILE = './storage/users.ser';
/**
 * Дістає список із усіх підписок з файлу
 * @return array
 */
function allUsers()
{
    $fileContent = file_get_contents(USERS_FILE);
    $users = unserialize($fileContent);
    return $users ? $users : [];
}

/**
 * Додає запис нової підписки у файл
 * @param $params
 */
function addUser($params)
{
    $users = allUsers();
    $users[] = $params;
    file_put_contents(USERS_FILE, serialize($users));
}
