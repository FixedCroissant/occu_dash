<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 11/19/2015
 * Time: 8:32 AM
 * Description: This is the front facing panel.
 */

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
<img src="../images/university_housing_logo.png" alt="University Housing"/>
</div>
<div id ='content'>
    <div id = 'information'>

        <p>This page allows for you to change the terms that you can view on the occupancy dashboard page. The left hand column affects the drop-down on the
        main page. Altering the drop-down below will update the application and you will be able to see more (or less) semesters as needed.
            <br/>
            <br/>
            <br/>

            <div class='NC_StateNice'>Example:</div>
            <img src="images/term_change_for_report_example.png"  alt="Area of the Report changed by left column." />

        </p>

    </div>
    <br/>
    <br/>
    <!--Updated to the new link in reports/ on 11 30 2015-->
    <a href ='https://housing.ncsu.edu/reports/occu_dash/index.php' title='Go back to Occupancy Dashboard'>Go back to Occupancy Dashboard</a>
    <br/>
    <br/>

<form id="UpdatesNeeded" name="UpdatesNeeded" action="processing/updateTable.php" method="POST">
<table id="settings" border="1" width="90%">
    <thead>
    <th>
        Semesters to Pull Information on the Occupancy Dashboard Page:
    </th>
    </thead>
    <tbody>
    <tr>
        <td>

            Report will run until:
            <select id="semestersToRun" name="semestersToRunReport">
                <?php
                //Set up a way of displaying the maximum # of reports available.
                $maximum = 25;       /*Default Number is 2, will provide the end-user with term up to template 2017*/
                                    /*The maximum number is 25 as this will take us to year 2040, the last element that a correct message will show up on the message screen*/
                $tempYEAR=16;

                //Default term past template 2015.
                $termsPastFall2015 = 3;             /*BY DEFAULT TERM IS SET TO 3--which provides template 2015 results, to get the minimum of Spring 2016, we need to start the
                                                    the value of number 4 and onward to make this update work properly.*/

                //Start term is
                //template 2015 -- 2158 = 0   term
                //Spring 2016 -- 2161 = 1 term
                //template 2016 -- 2168 = 2 terms
                //Spring 2017 -- 2171 = 3 terms
                //template 2017 -- 2178 = 4 terms


                for($x=0;$x<$maximum;$x++){

                    if($maximum>=2) {
                        //Provide term options that will be necessary to shown on the
                        //main occupancy_dashboard that will allow new drop-down elements.
                        echo "<option value='$termsPastFall2015'>Spring 20" . $tempYEAR . "</option>";

                        //Increment the term value ...
                        $termsPastFall2015++;

                        echo "<option value='$termsPastFall2015'>template 20" . $tempYEAR . "</option>";

                        //Increment the term value ...
                        $termsPastFall2015++;

                        //Increase our year
                        $tempYEAR++;
                    }
                }



                ?>

            </select>
        </td>
    </tr>
    </tbody>

</table>
    <br/>
    <br/>
    <input type="submit" value="Update Application"/>
</form>
</div>
</body>
</html>