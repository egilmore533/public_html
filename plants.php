<?php

include ("account.php") ;
( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or die ( "Unable to connect to MySQL database" );
mysql_select_db( $project ); 
			
$name = $_GET["Name"]; 

$s = "SELECT * FROM `Plants` WHERE Name = '$name'"; 

//1. GET TABLE $t
( $t = mysql_query ( $s  )) or die ( mysql_error() );

while (   $r = mysql_fetch_array($t) )
{
	
	//3. GET COLUMNS/CELLS OF ROW $r["---"]
	$name = $r["Name"];
	$facts = $r["Facts"];
	$safety = $r["Safety"];
	$image = $r["Image"];
	$location = $r["Location"];
}
?>


<html>
      <head>
      <link rel="stylesheet" type="text/css" href="/~epg5/style.css">
            <title><?php echo $name ?></title>
      </head>
	  
	  <center>
			<a href = "/~epg5/index.html">
				<button   class="dropbtn"> Home </button>
			</a>
			<?php 
					if($location == 'NorthEast'){
					echo '	<a href = "/~epg5/north_east_home.html">
								<button   class="dropbtn"> North East </button>
							</a>';
					}
					else if($location == 'Midwest'){
					echo '	<a href = "/~epg5/mid_west_home.html">
								<button   class="dropbtn"> Midwest </button>
							</a>';
					}
					else if($location == 'South'){
					echo '	<a href = "/~epg5/south_home.html">
								<button   class="dropbtn"> South </button>
							</a>';
					}
					else if($location == 'West'){
					echo '	<a href = "/~epg5/west_home.html">
								<button   class="dropbtn"> West </button>
							</a>';
					}
			?>
	  </center>
	  
	  <h1><center> <?php echo $name?> </center></h1><br/>
	  
      <body><br>
	
			<center><?php echo '<img src="'.$image.'" alt="Plant">' ?></center>

			<body>
				<p>FACTS</p>
			</body>

			<body>
				 <?php echo $facts?>
			</body> 

			<br><br><br><br>

			<body>
					<p>SAFETY</p>
			</body>

			<body>
					<?php echo $safety?>
			</body> 

			<br><br><br><br>
     </body> 
</html>