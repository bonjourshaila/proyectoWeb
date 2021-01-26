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

	private $idTrabajador;
	private $telefono;
	private $idTipoTelefono;
	private $idTelefono;

	public function getIdTrabajador() {
		return $this->idTrabajador;
	}
	public function getTelefono() {
		return $this->telefono;
	}
	public function getIdTipoTelefono() {
		return $this->idTipoTelefono;
	}


		public function setIdTrabajador($idTrabajador=''){
			$this->idTrabajador=$idTrabajador;
		}
		public function setTelefono($telefono=''){
			$this->telefono=$telefono;
		}
		public function setIdTipoTelefono($idTipoTelefono=''){
			$this->idTipoTelefono=$idTipoTelefono;
		}

		public function getIdTelefono() {
			return $this->idTelefono;
		}

		public function setIdTelefono($idTelefono=''){
			$this->idTelefono=$idTelefono;
		}





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

			$stm2 = $this->pdo
			            ->prepare("DELETE FROM telefonos WHERE idTrabajador = ?");

			$stm2->execute(array($id));
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
						fechaNacimiento = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre,
												$data->apellidoPaterno,
                        $data->apellidoMaterno,
                        $data->correo,
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
		$sql = "INSERT INTO trabajadores (nombre, apellidoPaterno, apellidoMaterno, correo, fechaNacimiento)
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
          $data->nombre,
          $data->apellidoPaterno,
          $data->apellidoMaterno,
          $data->correo,
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


	public function ListarTelefonos($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("	SELECT trabajadores.id,
																						CONCAT(trabajadores.nombre,' ',trabajadores.apellidoPaterno,' ',trabajadores.apellidoMaterno) AS nombre,
																						telefonos.telefono, telefonos.idTelefono,
																						(SELECT tipotelefono.tipoTelefono FROM tipotelefono WHERE tipotelefono.idTipo = telefonos.idTipoTelefono) AS tipoTEl,
																						(SELECT tipotelefono.idTipo FROM tipotelefono WHERE tipotelefono.idTipo = telefonos.idTipoTelefono) AS idTipoTel
																						FROM trabajadores JOIN telefonos ON trabajadores.id = telefonos.idTrabajador WHERE trabajadores.id = $id ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function ObtenerTel($idTelefono)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM trabajadores WHERE idTelefono = ?");


			$stm->execute(array($idTelefono));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function EliminarTel($idTelefono)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM telefonos WHERE idTelefono = ?");

			$stm->execute(array($idTelefono));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ActualizarTel($data)
	{
		try
		{
			$sql = "UPDATE telefonos SET
						telefono        = ?,
            idTipoTelefono        = ?
				    WHERE idTelefono = ? ";


			$this->pdo->prepare($sql)
			     ->execute(
				    array(
												$data->telefono,
                        $data->idTipoTelefono,
                        $data->idTelefono
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function RegistrarTel(TrabajadorModelo $data)
	{
		try
		{
		$sql = "INSERT INTO telefonos (idTrabajador, telefono, idTipoTelefono)
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
          $data->idTrabajador,
          $data->telefono,
          $data->idTipoTelefono
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function ListarTipoTel()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tipoTelefono");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}






}
