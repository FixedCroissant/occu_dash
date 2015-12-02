<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 11/18/2015
 * Time: 8:00 AM
 * Description:
 */

//Get Year
$year=date("y");


//Pull information from the database table....
include('settings/connection/connection.php');                                                /*This is the same connection that is being used within the settings folder.*/
try{
    $databaseREAD = new PDO($hostname,$username,$password);                                  /*All of this information is contained in the above include file.*/
    $databaseREAD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $queryToReadData = "SELECT terms_to_display,terms_to_get_backups FROM occu_dash_settings";        /*Query to pull information from the ***REMOVED*** database.*/

    //Execute the query....
    $queryRUN = $databaseREAD->query($queryToReadData);


    foreach ($queryRUN->fetchAll() as $reportTerms){
        //Specifically set the variable limitOfTerms (used below) to be the value that is pulled from the occu_dash_settings table.
        $limitOFTerms=$reportTerms['terms_to_display'];

        //TODO assign the about of reports that need to be backed up automatically thinking about setting it to the amount of terms displayed in the dropdown.

    }

}
/*Catch any errors that happen when trying to connect to the database and let the user know of the error(s).*/
catch(PDOException $error){
    //If there are any errors, let us know the error and completely stop the connection.
    die('Could not connect to the database: <br/>.'.$error);
}

//Range of Semester Drop-Downs shown.
//Hardcoded value....
//$limitOFTerms="2";      /*1 Semesters==FALL2015*/

echo "<form id='setTerm' action='index.php' method='POST'>";
echo "<select id='setTermForReport' name='TERM'>";

//Dynamically make a drop down based on the Spring and Summer terms that we need, starting on Fall 2015/2158 term.
    for($x=0;$x<$limitOFTerms;$x++){
                //Beginning part.
                if($x==0){
                    //For Fall terms
                    //Below works for adding Fall 2015, however it adds a whole additional
                    //select row that is unnecessary.
                    //echo "<option value='2".$year."8'>Fall 20".$year."</option>";
                    //By default we will start with 1111 term or NO term.
                    //Then, the end-user can make the change on the information they want to pull from the
                    //report.
                    echo "<option value='1111'>None</option>";
                }
                else if($x%2){
                    //For Fall terms
                    echo "<option value='2".$year."8'>Fall 20".$year."</option>";

                }
                else{
                    $year = ($year+1);
                    //For Spring terms
                    echo "<option value='2".$year."1'>Spring 20".$year."</option>";

                }

    }


echo "</select>";

//Create button
echo "<input type='submit' value='Update'/>";

//close the form
echo "</form>";

?>