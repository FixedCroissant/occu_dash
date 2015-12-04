<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 11/19/2015
 * Time: 11:17 AM
 * Description: Connection file to update our table for the Occupancy Housing web-application
 */


//This is the connection file for the Housing Applications.
//DEVELOPMENT
$dbname="***REMOVED***";                             /*Set the database that we want to view, in this case ***REMOVED****/
$hostname="mysql:dbname=".$dbname.";host=127.0.0.1;port=3306";                   /*Set the hostname and the database*/
$username="root";                                   /*Development Side only */
$password ="***REMOVED***";                     /*Development Side only */

//Below is the database user name for the housing website
//$username="***REMOVED***";
//Removed old database due to testing
//$password="***REMOVED***";
//$hostname="mysql:host=localhost;dbname=***REMOVED***;port=3306";

