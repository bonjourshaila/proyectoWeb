<?php
class TrabajadorModelo
{
	private $pdo;

    private $id;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $correo;
    private $telefono1;
    private $telefono2;
    private $fechaNacimiento;
		private $filtro;


	public function setId($id='') {
		$this->id=$id;
	}

	public function getId() {
		return $this->id;
	}

	public function setNombre($nombre='') {
		$this->nombre=$nombre;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setApellidoPaterno($apellidoPaterno='') {
		$this->apellidoPaterno=$apellidoPaterno;
	}

	public function getApellidoPaterno() {
		return $this->apellidoPaterno;
	}

	public function setApellidoMaterno($apellidoMaterno='') {
		$this->apellidoMaterno=$apellidoMaterno;
	}

	public function getApellidoMaterno() {
		return $this->apellidoMaterno;
	}

	public function setCorreo($correo='') {
		$this->correo=$correo;
	}

	public function getCorreo() {
		return $this->correo;
	}

	public function setTelefono1($telefono1='') {
		$this->telefono1=$telefono1;
	}

	public function getTelefono1() {
		return $this->telefono1;
	}

	public function setTelefono2($telefono2='') {
		$this->telefono2=$telefono2;
	}

	public function getTelefono2() {
		return $this->telefono2;
	}

	public function setFechaNacimiento($fechaNacimiento='') {
		$this->fechaNacimiento=$fechaNacimiento;
	}

	public function getFechaNacimiento() {
		return $this->fechaNacimiento;
	}

	public function setFiltro($filtro='') {
		$this->filtro=$filtro;
	}

	public function getFiltro() {
		return $this->filtro;
	}



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


		public function ListarFiltro($filtro)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT *
																	FROM trabajadores
																	WHERE nombre LIKE '%".$filtro."%' OR
																				apellidoPaterno LIKE '%".$filtro."%' OR
																				apellidoMaterno LIKE '%".$filtro."%' OR
																				correo LIKE '%".$filtro."%' OR
																				telefono1 LIKE '%".$filtro."%' OR
																				telefono2 LIKE '%".$filtro."%' OR
																				fechaNacimiento LIKE '%".$filtro."%'");
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

	public function Registrar(TrabajadorModelo $data)
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
