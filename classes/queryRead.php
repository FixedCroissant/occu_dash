<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 10/1/2015
 * Time: 11:51 AM
 * Description:
 * Note: PDO will not work with the Housing Server as it does not have oci drivers for the PDO function.
 * In order for this to work properly, must utilzie Oracle's OCI8 functionality.
 *
 */

//001
//Building Numbers are located in:
//view: ps_nc_his_blcnt_vw

//002
//Assigned Numbers are located in:
//view: ps_nc_his_ascnt_vw


//003
//Staff Numbers are located in:
//view: ps_nc_his_staff_vw


//004
//Total Building Capacity are located in:
//ps_nc_his_stfct_vw

//End Production




class queryRead
{


    //Set variables
    var $setUSER;   //Username
    var $setPASS;   //Password
    var $setHOST;   //Host name
    var $CONN;      //Database Handler
    var $STID;      //Statement Handler.... used when parsing the query with the connection and when executing the actual query itself.

    //End Variables

    //Create Constructor for new database lookups.
    function queryRead($host,$userName,$userPass)
    {
        //First, create a connection based on necessary parameters.
        $this->createConnection($host,$userName,$userPass);
    }

    //Set the CONN (CONNECTION) that is initialized in the below createConnection method.
    function setCONN($ConnNewValue){
        $this->CONN=$ConnNewValue;
    }
    //Get the CONN whenever it is needed.
    function getCONN(){
        return $this ->CONN;
    }


    //Set up a new Oracle Connection
    function createConnection($host,$userName,$userPass){
        //Try to go and create a new PDO based connection...
        $conn = oci_connect($userName,$userPass,$host);

        //Set the variable to the conn.
        $this->setCONN($conn);

        //if there is any errors
        if(!$conn){
            //Set error
            #error variable is $error
            $error = oci_error();

            //Display an error on connection errors.
            trigger_error(htmlentities($error['message'],ENT_QUOTES),E_USER_ERROR);
        }



    }

    function queryParse($connection,$queryToUse){
        $tempSTID = oci_parse($connection,$queryToUse);

        //Assign the above Statement handler to our variable.
        $this->setSTID($tempSTID);
        //DONE.

    }
    function setSTID($newStatementHandler){
        //Set the STID variable to the variable passed in the method parameter.
        $this->STID=$newStatementHandler;
    }

    //Return what is in the statement handler.
    function getSTID(){
        return $this->STID;
    }

    //Bind the term we want with the query we're trying to find information.
    function bindTerm($STATEMENT_ID,$termWeWant,$fieldWeAreChanging){
        //return oci_bind_by_name($STATEMENT_ID,$termWeWant,$fieldWeAreChanging);
    }

    //Create a new query to read information
    //MUST HAVE A STID to execute the query properly.
    function queryExecute($STID){

           $QUERY_EXECUTE = oci_execute($STID);

        /**
         * temporary
         */


       // echo "<table border='1'>\n";
       // while ($row = oci_fetch_array($STID, OCI_ASSOC+OCI_RETURN_NULLS)) {
       //     echo "<tr>\n";
       //     foreach ($row as $item) {
       //         echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
       //     }
       //     echo "</tr>\n";
       // }
       // echo "</table>\n";


        /**
         * end temporary
         */

    }

    //Used for reading the database table.
    //
    function createTableDisplay($STID){


             echo "<table border='1'>\n";
             while ($row = oci_fetch_array($STID, OCI_ASSOC+OCI_RETURN_NULLS)) {
                 echo "<tr>\n";
                 foreach ($row as $item) {
                     echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                 }
                 echo "</tr>\n";
             }
             echo "</table>\n";

    }


}