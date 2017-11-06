# PDOQuery

Extension of the PDOStatment class for a one-stop query

## Usage

```php
require_once 'PDOQuery.php';
$pdo = new PDOQuery($dns, $user, $pass);
$stmt = $pdo->preparedQuery(
    'SELECT * FROM my_table WHERE first_name=:first AND last_name=:last',
    array(':first' => 'John', ':last' => 'Doe');
);
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // . . .
}
```
