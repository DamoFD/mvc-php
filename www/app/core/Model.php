<?php

/**
* Main model class
*/
class Model
{
    use Database;

    protected $table = 'users';
    protected $limit = 10;
    protected $offset = 0;

    public function fetchAll()
    {
        //
    }

    public function where($data, array $data_not = []): array
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ";

        foreach ($keys as $key) {
            $query .= $key . " = ? && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != ? && ";
        }

        $query = rtrim($query," && ");

        $query .= " limit ? offset ?";

        $params = array_merge(array_values($data), array_values($data_not), [$this->limit, $this->offset]);

        return $this->query($query, $params);
    }

    public function first()
    {
        //
    }

    public function create($data)
    {
        //
    }

    public function update($id, $data, $id_column = 'id')
    {
        //
    }

    public function delete($id, $id_column = 'id')
    {
        //
    }
}
