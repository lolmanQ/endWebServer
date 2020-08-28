<?php

	//require('serverConfig.json');

	class DB
	{

		public function getConn(){

			$serverConfigString = '{
				"db":{
					"host":"localhost",
					"name": "usertest",
					"username": "user",
					"password": ""
				}	
			}';

			$serverConfig = json_decode($serverConfigString);
			$conn = new mysqli($serverConfig->db->host, $serverConfig->db->username, $serverConfig->db->password, $serverConfig->db->name);
			return $conn;
		}
	}
	

?>