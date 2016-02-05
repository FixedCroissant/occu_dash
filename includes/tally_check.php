<?php
// Get user's Unity ID from SHIB
$unityID=$_SERVER['SHIB_UID'];

//GET LOG-IN INFORMATION
$hostname="mysql:host=localhost;dbname=XXXXXXX;port=3306";

//Below is the database user name for the housing website
$username="XXXXXXXXXXXXX";
$password="XXXXXXXXXXXXXX";

try{    
    $connPDO = new PDO($hostname,$username,$password);
    
}catch(PDOException $e){
    //Comment out.
	//die('Could not connect to the database: <br/>' . $e);
    
}
//END LOG-IN INFORMATION

//Variables...
$id;    //record id in the table.
$count; //current count.


/**
 * LOOK FOR PRIOR LOG-INS.
 */

/* Execute a prepared statement by passing an array of values */
$sqlToLookForPriorLogins = 'SELECT id,unityid,count
    						FROM occu_dash_visits
    						WHERE unityid = :unityIDTOLOOKFOR';


$PDO = $connPDO->prepare($sqlToLookForPriorLogins);
//$PDO->execute(array(':calories' => 150, ':colour' => 'red'));

//Bind the parameter.
$PDO ->bindParam(':unityIDTOLOOKFOR',$unityID,PDO::PARAM_STR);

//Execute the prepared statement.
$PDO->execute();


//Go through the results variable and see what it contains.
while ($row = $PDO ->fetch(PDO::FETCH_ASSOC))
{
			$id = $row['id'];
			$count = $row['count'];
}


//FIRST TIME VISIT
if($id==NULL){

				//Increment count
				$count=1;


				//connection name is $connPDO.
				//query to utilize
				//Set up a prepare statement.
				$queryToInsert = ("INSERT INTO occu_dash_visits (unityid,count)
				 VALUES (:unityID,:count)");

				//Prepare Statement
				$PDO = $connPDO->prepare($queryToInsert);

				//Add the person to the database.
				$PDO ->bindParam(':unityID',$unityID,PDO::PARAM_STR);
				$PDO ->bindParam (':count',$count,PDO::PARAM_INT);
				//Execute the prepared statement.
				$PDO->execute();

}

//PERSON ALREADY EXISTS...
//UPDATE THE COUNT.
else{
		//Increment the current count.
		$count++;	


		//connection name is $connPDO.
		//query to utilize
		//Set up a prepare statement.
		$queryToUpdate = ("UPDATE occu_dash_visits 
		 SET  count =:countToUPDATE
		 WHERE id = :recordID");

		//Prepare Statement
		$PDO = $connPDO->prepare($queryToUpdate);

		//Add the person to the database.
		$PDO ->bindParam (':countToUPDATE',$count,PDO::PARAM_INT);
		$PDO ->bindParam (':recordID',$id,PDO::PARAM_INT);
		
		//Execute the prepared statement.
		$PDO->execute();

		//DONE UPDATING THE TABLE.
}


?>
