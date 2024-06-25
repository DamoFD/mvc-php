<?php

Trait Database
{
    private string $servername = DB_SERVER;
    private string $username = DB_USER;
    private string $password = DB_PASS;
    private string $dbname = DB_NAME;
    public object $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function isDbConnected(): bool
    {
        return $this->conn->ping();
    }

    private function getParamType($value)
    {
        if (is_int($value)) {
            return 'i';
        } elseif (is_float($value)) {
            return 'd';
        } else {
            return 's';
        }
    }

    public function query($query, $params = [])
    {
        $stm = $this->conn->prepare($query);

        if ($stm === false) {
            throw new Exception("Error is preparing query: " . $this->conn->error);
        }

        if (!empty($params)) {
            $types = '';
            foreach ($params as $param) {
                $types .= $this->getParamType($param);
            }

            $stm->bind_param($types, ...$params);
        }

        $check = $stm->execute();

        if ($check) {
            $result = $stm->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        }
        return false;
    }

    public function get_row($query, $data = [])
    {
        $stm = $this->conn->prepare($query);

        if ($stm === false) {
            throw new Exception("Error is preparing query: " . $this->conn->error);
        }

        if (!empty($data)) {
            $types = str_repeat('s', count($data));
            $stm->bind_param($types, ...$data);
        }

        $check = $stm->execute();

        if ($check) {
            $result = $stm->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        }
        return false;
    }
}
