<?php

/**
 * Author: J.Williams
 * Date: 12/1/2015
 * Description: Create the current term based on the current date provided.
 **/

//For creating dates....
//For testing purposes...
//$tempMONTH = date_create("2015-01-15");
//$month = date_format($tempMONTH,"n");
//End for testing purposes....



// SET THE CURRENT TERM BASED ON TODAY'S DATE
//Month of current year.
$month=date("n");
//Number/Date of current month in the current year.
$day=date("j");

// FIRST 4 MONTHS ARE SPRING TERM
if ($month <= 4) { $termmonth=1; }
// SPLIT MAY INTO SPRING AND SUMMER I TERMS
elseif ($month == 5 && $day <= 15) { $termmonth=1; }
elseif ($month == 5 && $day > 15) { $termmonth=6; }
// SPLIT JUNE INTO SUMMER I AND SUMMER II TERMS
elseif ($month == 6 && $day <= 25) { $termmonth=6; }
elseif ($month == 6 && $day > 25) { $termmonth=7; }
// ALL OF JULY IS SUMMER II TERM
elseif ($month == 7) { $termmonth=7; }
// REMAINING MONTHS ARE FALL TERM
else { $termmonth=8; }

//OVERALL PROJECT USES THE VARIABLE "myTERM" to SET THE TERM FOR THE REPORT.
$myTERM=2 . date("y") . $termmonth;

// SET ACADEMIC YEAR
$year="1415";

 

 ?>