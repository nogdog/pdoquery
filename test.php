<?php
/*
 * From this directory, just run `php test.php`
 */
require __DIR__.'/PDOQuery.php';
$pdo = new PDOQuery('sqlite:pdoquery_test.sqlite');
$pdo->preparedQuery('create table test_table(id integer primary key, some_text text)');
$pdo->preparedQuery(
    'insert into test_table(some_text) values(:text)',
    array(':text' => 'This is a test.')
);
$stmt = $pdo->preparedQuery(
    'select * from test_table where some_text = :text',
    array(':text' => 'This is a test.')
);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row != false && $row['some_text'] == 'This is a test.')
{
    echo 'PASS'.PHP_EOL;
}
else
{
    echo 'FAIL'.PHP_EOL;
}
unlink('pdoquery_test.sqlite');
