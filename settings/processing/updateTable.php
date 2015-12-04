<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 11/19/2015
 * Time: 11:12 AM
 * Description: This file will update the information from the settings page for the Occupancy Dashboard
 * to the table "occu_dash_settings" that resides within the ***REMOVED*** database.
 */


//Get connection information
//File is within the /settings/connection/connection.php file...
include('../connection/connection.php');

//Test post back information ...
$reportRunning=$_POST['semestersToRunReport'];


//Temporarily comment out.
//echo "This is the semesters ahead of Fall 2015 that we want the report to display:";
//echo $reportRunning;


//The default number is 3
//If the number is set to 3, then Fall 2015 and Spring 2016 show up.


/**
 * Function Name setYears
 * This provides the last two digits of a given year (Starting at 2017)
 * @param $yearStart this is the report running number that is provided by the drop down box from the end user.
 * @return int       this is the last two digits of the corresponding year (20XX) for this function.
 *                   this function ends at the year 2040.
 */
function setYears($yearStart){

    if($yearStart==3||$yearStart==4){
        $yearToStart=16;    /*Yr. 2016*/
    }
    else if($yearStart==5||$yearStart==6){
        $yearToStart=17;    /*Yr. 2017*/
    }
    else if ($yearStart==7||$yearStart==8){
        $yearToStart=18;    /*Yr. 2018*/
    }
    else if ($yearStart==9||$yearStart==10){
       $yearToStart=19;      /*Yr. 2019*/
    }
    else if ($yearStart==11|$yearStart==12){
        $yearToStart=20;     /*Yr. 2020*/
    }
    else if ($yearStart==13||$yearStart==14){
        $yearToStart=21;     /*Yr. 2021*/
    }
    else if ($yearStart==15||$yearStart==16){
        $yearToStart=22;    /*Yr. 2022*/
    }
    else if ($yearStart==17||$yearStart==18){
        $yearToStart=23;    /*Yr. 2023*/
    }
    else if ($yearStart==19||$yearStart==20){
        $yearToStart=24;    /*Yr. 2024*/
    }
    else if ($yearStart==21||$yearStart==22){
        $yearToStart=25;    /*Yr. 2025*/
    }
    else if ($yearStart==23||$yearStart==24){
        $yearToStart=26;    /*Yr. 2026*/
    }
    else if ($yearStart==25||$yearStart==26){
        $yearToStart=27;    /*Yr. 2027*/
    }
    else if ($yearStart==27||$yearStart==28){
        $yearToStart=28;    /*Yr. 2028*/
    }
    else if ($yearStart==29||$yearStart==30){
        $yearToStart=29;    /*Yr. 2029*/
    }
    else if ($yearStart==31||$yearStart==32){
        $yearToStart=30;    /*Yr. 2030*/
    }
    else if ($yearStart==33||$yearStart==34){
        $yearToStart=31;    /*Yr. 2031*/
    }
    else if ($yearStart==35||$yearStart==36){
        $yearToStart=32;    /*Yr. 2032*/
    }
    else if ($yearStart==37||$yearStart==38){
        $yearToStart=33;    /*Yr. 2033*/
    }
    else if ($yearStart==39||$yearStart==40){
        $yearToStart=34;    /*Yr. 2034*/
    }
    else if ($yearStart==41||$yearStart==42){
        $yearToStart=35;    /*Yr. 2035*/
    }
    else if ($yearStart==43||$yearStart==44){
        $yearToStart=36;    /*Yr. 2036*/
    }
    else if ($yearStart==45||$yearStart==46){
        $yearToStart=37;    /*Yr. 2037*/
    }
    else if ($yearStart==47||$yearStart==48){
        $yearToStart=38;    /*Yr. 2038*/
    }
    else if ($yearStart==49||$yearStart==50){
        $yearToStart=39;    /*Yr. 2039*/
    }
    else if ($yearStart==51||$yearStart==52){
        $yearToStart=40;    /*Yr. 2040*/
    }
    //STOP YEAR AT THE YEAR 2040.


    return $yearToStart;
}


function provideMessage($reportRunning){

    //Subsequent semesters after 2015....
    //Only run if the semesters chosen in the drop-down list
    //is greater than 3, representing Spring 2016 and on-ward.
   if($reportRunning>=3) {

       //$semesterUPDATED="test test test";
        //Start at 2017 year.
       $yearToStart=17;
        //for ($x = 5;$x<=$reportRunning;$x++) {


            //Check years
            $yearToStart=setYears($reportRunning);

            //Spring Terms... (ODD Numbers)
            if($reportRunning % 2!=0){
                $term="Spring";
                $year="20".$yearToStart;
                $semesterUPDATED=$term." ".$year;
            }

            //Fall Terms  ... (EVEN Numbers)
            else if ($reportRunning % 2==0){
                $term="Fall";
                $year="20".$yearToStart;
                $semesterUPDATED=$term." ".$year;
            }
        //}
    }
    //End subsequent semesters



    return $semesterUPDATED;


}


//Temporarily comment out.
//echo "This report will now pull up to ".$semesterUPDATED;
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <title>
            NC State - University Housing - Occupancy Dashboard - Settings Page
        </title>
        <!--Internal Stylesheet-->
        <link rel="stylesheet" type="text/css" href="css/settingsFormat.css">
    </head>
    <body>
    <div id="header">
        <img src="../../images/university_housing_logo.png" alt="University Housing"/>
    </div>
    <div id ='content'>
        <div id = 'information'>

            <h3 style="text-align: left;">Thank you for your Update</h3>
            <br/>
            <br/>
            This Occupancy Report will now pull up to the following term: <?php echo "<STRONG>".provideMessage($reportRunning) . "</STRONG>";?>
            <br/>
            <br/>
            <br/>
            <!--Updated to the new link in reports/ on 11 30 2015-->
            <a href ='https://housing.ncsu.edu/reports/occu_dash/index.php' title='Go back to Occupancy Dashboard'>Go back to Occupancy Dashboard</a>
            <br/>

        </div>
        <br/>
        <br/>
    </div>
    </body>
    </html>






<?php
try{
    //Create a new PDO object to work with out database table.
    $databaseREAD = new PDO($hostname,$username,$password);                                  /*All of this information is contained in the above include file.*/
    $databaseREAD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $updateQUERY = "UPDATE occu_dash_settings
                    SET terms_to_display=:termsTOLIST
                    WHERE id=1";

    $statementTOUpdate = $databaseREAD->prepare($updateQUERY);

    //Bind the value we receive from the change.php file to update our database table.
    $statementTOUpdate ->bindValue(':termsTOLIST',$reportRunning);

    //Execute the query....
    //This will update the occu_dash_settings table, field id terms_to_display
    //to whatever is provided in the prior screen.
    $statementTOUpdate->execute();
}
/*Catch any errors that happen when trying to connect to the database and let the user know of the error(s).*/
catch(PDOException $error){
    //If there are any errors, let us know the error and completely stop the connection.
    die('Could not connect to the database: <br/>.'.$error);
}