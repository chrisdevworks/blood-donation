<?php
session_start();
ini_set('display_errors', 1);
class Action
{
	private $db;

	public function __construct()
	{
		ob_start();
		include 'db_connect.php';

		$this->db = connectdb();
	}
	function __destruct()
	{
		$this->db->close();
		connectdb();

		ob_end_flush();
	}


	// ========================================================LOGIN============================================================


	function login()
	{
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '" . $username . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'password' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			return 1;
		} else {
			return 3;
		}
	}
	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}


	// =======================================================USER=============================================================


	function save_user()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'cpass')) && !is_numeric($k)) {
				if ($k == 'password')
					$v = md5($v);
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM users where username ='$username' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set $data");
		} else {
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if ($save) {
			return 1;
		}
	}

	function edit_user()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set $data");
		} else {
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if ($save)
			return 1;
	}



	function delete_user()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = " . $id);
		if ($delete)
			return 1;
	}

	function save_page_img()
	{
		extract($_POST);
		if ($_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
			if ($move) {
				$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
				$hostName = $_SERVER['HTTP_HOST'];
				$path = explode('/', $_SERVER['PHP_SELF']);
				$currentPath = '/' . $path[1];
				// $pathInfo = pathinfo($currentPath); 

				return json_encode(array('link' => $protocol . '://' . $hostName . $currentPath . '/admin/assets/uploads/' . $fname));
			}
		}
	}


	// =================================================NEW DONOR=======================================================================

	function save_donor()
	{
		extract($_POST);
		// $data = array();
		// $payload = file_get_contents('php://input');
		// parse_str(urldecode($payload), $dataArray);

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middlename = $_POST['middlename'];
		$gender = $_POST['gender'];
		$blood_type = $_POST['blood_type'];
		$quantity = $_POST['quantity'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$body_weight = $_POST['body_weight'];

		$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
		$path = "img/uploads/"; // upload directory
		$img = $_FILES['photo']['name'];
		$tmp = $_FILES['photo']['tmp_name'];
		$size = $_FILES['photo']['size'];
		$errorimg = $_FILES["photo"]["error"]; //stores any error code resulting from the transfer

		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000, 1000000) . $img;
		// check's valid format

		if (in_array($ext, $valid_extensions)) {
			$path = $path . strtolower($final_image);
			if ($size > 2097152) {
				echo 'File size must be less than 15 MB';
			} else {
				if (move_uploaded_file($tmp, $path)) {

					$save = $this->db->query("INSERT INTO donor (firstname,middlename,lastname,gender,blood_type,quantity,address,email,phone,body_weight,photo) 
					VALUES 
					('" . $firstname . "','" . $middlename . "','" . $lastname . "','" . $gender . "','" . $blood_type . "','" . $quantity . "','" . $address . "','" . $email . "','" . $phone . "','" . $body_weight . "','" . $path . "') ");

					if ($save)
						return 1;
					exit;
				}
			}
		} else {
			echo 'invalid';
		}
	}

	function update_donor()
	{
		extract($_POST);
		// $data = array();
		// $payload = file_get_contents('php://input');
		// parse_str(urldecode($payload), $dataArray);

		$donor_id = $_POST['donor_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middlename = $_POST['middlename'];
		$gender = $_POST['gender'];
		$blood_type = $_POST['blood_type'];
		$quantity = $_POST['quantity'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$body_weight = $_POST['body_weight'];

		$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
		$path = 'img/uploads/'; // upload directory
		$img = $_FILES['photo']['name'];
		$tmp = $_FILES['photo']['tmp_name'];
		$size = $_FILES['photo']['size'];
		$errorimg = $_FILES["photo"]["error"]; //stores any error code resulting from the transfer

		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000, 1000000) . $img;
		// check's valid format

		if (in_array($ext, $valid_extensions)) {
			$path = $path . strtolower($final_image);
			if ($size > 2097152) {
				echo 'File size must be less than 15 MB';
			} else {
				if (move_uploaded_file($tmp, $path)) {

					$save = $this->db->query("UPDATE donor SET 
						firstname = '" . $firstname . "',
						middlename = '" . $middlename . "',
						lastname = '" . $lastname . "',
						gender = '" . $gender . "',
						blood_type = '" . $blood_type . "',
						quantity = '" . $quantity . "',
						address = '" . $address . "',
						email = '" . $email . "',
						phone = '" . $phone . "',
						body_weight	= '" . $body_weight . "',
						photo = '" . $path . "' 
						WHERE donor_id = '" . $donor_id . "' ");


					if ($save)
						return 1;
					exit;
				}
			}
		} else {
			echo 'invalid';
		}
	}


	function delete_donor()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM donor where donor_id = " . $donor_id);
		if ($delete)
			return 1;
	}
}
