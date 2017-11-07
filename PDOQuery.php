<?php

/**
 * Add a one-stop method for prepared query execution
 */
class PDOQuery extends PDO
{
    /**
     * Prepare and execute a query
     *
     * @param string $sql
     * @param Array $data  array(':place_holder_1' => 'value_1'[,...])
     * @return PDOStatement
     */
    public function preparedQuery($sql, Array $data=array())
    {
        $stmt = $this->prepare($sql);
        if($stmt == false)
        {
            throw new Exception('Prepare failed:'.PHP_EOL.print_r($this-errorInfo()));
        }
        if(($result = $stmt->execute($data)) == false)
        {
            throw new Exception('Execute failed:'.PHP_EOL.print_r($stmt->errorInfo()));
        }
        return $stmt;
    }
}
