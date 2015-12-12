<?php
	class User
	{
		//Properties of the Volunteer object
		protected $username;
		protected $firstname;
		
		// This constructor function will be used to instantiate the user object
		function __construct($inUserName=null, $inFirstName=null) {
			$this->username = $inUserName;
			$this->firstname = $inFirstName;
		}
		
		// "get" and "set" functions are necessary for proper encapsulation.
		function get_username() {
			return $this->username;
		}
		
		function set_username($un) {
			$this->username = $un;
		}
		
		function get_firstname() {
			return $this->firstname;
		}
		
		function set_firstname($fn) {
			$this->firstname = $fn;
		}
		
		static function saveUser() {
			// these are just tests lines
			$user = new User("joshbjones", "Josh");
			
			$un = $user->get_username();
			$fn = $user->get_firstname();
			
			$username = "<h1>This guy was just added to the database:</h1>
							<h2>Username: " . $un . "</h2><br>
							<h2>First Name: " . $fn . "</h2>";
			echo $username;
			
			// Connect to the MySQL Server
			include("connect.inc");
			$query = "INSERT INTO user
						(username, First_Name)
						VALUES ('$un', '$fn')";
			$result = mysqli_query($cxn, $query)
				or die ("Couldn't execute query.");
		}
	}
?>