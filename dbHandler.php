<?php

class Db_Handler
{
	private $connection;
	private $host;
	private $userName;
	private $password;
	private $dbName;
	private $tableName;

	public function __construct($host, $username, $passwd)
	{
		$this->host = $host;
		$this->userName = $username;
		$this->password = $passwd;
		$this->dbName = "user_db";
		$this->tableName = "user_details";
	}

	public function openConnection()
	{
		if($this->connection = mysqli_connect($this->host, $this->userName, $this->password))
		{
			$createDBQuery = "CREATE DATABASE IF NOT EXISTS $this->dbName";
			if (mysqli_query($this->connection, $createDBQuery)) 
			{
				$this->connection->select_db($this->dbName);
				$createTableQuery = "CREATE TABLE $this->tableName (emailId varchar(50) primary key, ".
									"password varchar(50), fName varchar(50), lName varchar(50));";
				$val = mysqli_query($this->connection, 'select 1 from user_table');
				if($val === false)
				{
					if(mysqli_query($this->connection, $createTableQuery))
					{
						echo "true";
						return true;
					}
					else
					{
						return false;
					}
				}
			}
			else 
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function closeConnection()
	{
		mysqli_close($this->connection);
	}

	public function createEntry($email, $passwd, $fname, $lname)
	{
		$insertIntoQuery = "INSERT INTO $this->tableName VALUES('$email', '$passwd', '$fname', '$lname');";
		echo $insertIntoQuery;
		if(mysqli_query($this->connection, $insertIntoQuery))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function checkEmailExists($email)
	{
		$selectQuery = "SELECT fName FROM $this->tableName WHERE emailId='".$email."';";
		$result = mysqli_query($this->connection, $selectQuery);
		if(mysqli_num_rows($result) == 0)
		{
			echo "false";
			return false;
		}
		else
		{
			echo "true";
			return true;
		}
		echo $selectQuery;
	}
}
?>