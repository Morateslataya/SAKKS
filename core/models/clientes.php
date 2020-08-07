<?php
/*
*	Clase para manejar la tabla clientes de la base de datos. Es clase hija de Validator.
*/
class Clientes extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $n_comercial = null;
    private $direccion = null;
    private $departamento = null;
    private $municipio = null;
    private $telefono = null;
    private $dui = null;
    private $correo = null;
    private $nit = null;
    private $actividad = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNComercial($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->n_comercial = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateAlphanumeric($value, 1, 70)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDepartamento($value)
    {
        if ($this->validateAlphanumeric($value, 1, 15)) {
            $this->departamento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMunicipio($value)
    {
        if ($this->validateAlphanumeric($value, 1, 15)) {
           $this->municipio = $value;
           return true;
        }else{
            return false;
        }
    }

    public function setTelefono($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono = $value;
            return true;
        }else {
            return false;
        }
    }

    public function setDUI($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
            return true;
        }else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        }else {
            return false;
        }
    }

    public function setNIT($value)
    {
        if ($this->validateNIT($value)) {
            $this->nit = $value;
            return true;
        }else {
            return false;
        }
    }

    public function setActividad($value)
    {
        if ($this->validateAlphanumeric($value, 1, 70)) {
            $this->actividad = $value;
            return true;
        }else {
            return false;
        }
    }    

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getNComercial()
    {
        return $this->n_comercial;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getDepartamento()
    {
        return $this->departamento;
    }

    public function getMunicipio()
    {
        return $this->municipio;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    // Función para buscar algún cliente
    public function searchRows($value)
    {
        // Código SQL
        $sql = 'SELECT idcliente, nombres, apellidos, nombrecomercial, direccion, departamento, municipio, telefono, dui, correo, nit, actividad
        FROM cliente
        WHERE nombres ILIKE ? OR apellidos ILIKE ? OR nombrecomercial ILIKE ?
        ORDER BY apellidos';
        $params = array("%$value%", "%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    // Función crear cliente
    public function createRow()
    {
        // Código SQL
        $sql = 'INSERT INTO cliente(nombres, apellidos, nombrecomercial, direccion, departamento, municipio, telefono, dui, correo, nit, actividad)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombres,$this->apellidos, $this->n_comercial, $this->direccion, $this->departamento, $this->municipio, $this->telefono, $this->dui, $this->correo, $this->nit, $this->actividad);
        return Database::executeRow($sql, $params);
    }

    // Función para leer todos los clientes para la tabla
    public function readAll()
    {
        $sql = 'SELECT idcliente, nombres, apellidos, nombrecomercial, direccion, departamento, municipio, telefono, dui, correo, nit, actividad
                FROM cliente
                ORDER BY apellidos';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT idcliente, nombres, apellidos, nombrecomercial, direccion, departamento, municipio, telefono, dui, correo, nit, actividad
                FROM cliente
                WHERE idcliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE cliente
                SET nombres = ?, apellidos = ?, nombrecomercial = ?, direccion = ?, departamento = ?, municipio = ?, telefono = ?, dui = ?, correo = ?, nit = ?, actividad = ?
                WHERE idcliente = ?';
        $params = array($this->nombres,$this->apellidos, $this->n_comercial, $this->direccion, $this->departamento, $this->municipio, $this->telefono, $this->dui, $this->correo, $this->nit, $this->actividad, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM cliente
                WHERE idcliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>
