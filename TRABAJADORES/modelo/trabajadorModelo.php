<?php
class Trabajador
{
	private $pdo;

    public $id;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $correo;
    public $telefono1;
    public $telefono2;
    public $fechaNacimiento;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM trabajadores");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM trabajadores WHERE id = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM trabajadores WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE trabajadores SET
						nombre          = ?,
						apellidoPaterno        = ?,
            apellidoMaterno        = ?,
            correo        = ?,
						telefono1            = ?,
            telefono2            = ?,
						fechaNacimiento = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre,
												$data->apellidoPaterno,
                        $data->apellidoMaterno,
                        $data->correo,
                        $data->telefono1,
                        $data->telefono2,
                        $data->fechaNacimiento,
                        $data->id
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Trabajador $data)
	{
		try
		{
		$sql = "INSERT INTO trabajadores (nombre, apellidoPaterno, apellidoMaterno, correo, telefono1, telefono2, fechaNacimiento)
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
          $data->nombre,
          $data->apellidoPaterno,
          $data->apellidoMaterno,
          $data->correo,
          $data->telefono1,
          $data->telefono2,
          $data->fechaNacimiento
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function ObtenerCumpleaños()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM trabajadores WHERE MONTH(fechaNacimiento)=MONTH(NOW())");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



}
