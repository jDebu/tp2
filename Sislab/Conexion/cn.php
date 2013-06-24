<?php 

define ("MSHOST", "localhost");
define ("MSDATA", "sislab");
define ("MSUSER", "root");
define ("MSPASS", "root");
define ("FCORTE", "2012-10-10");

define ("ruta", "https://intranetp.produce.gob.pe/institucional/aplicativos/siprosac/");
/*include('funciones.php');

include('00_qry2.php');
include('00_qry3.php');
include('00_qry.php');*/

class DB
{
   var $error = array();
   var $con;
   var $rs;
   var $qry;

   function DB()
   {
      $this->con = mysql_connect(MSHOST, MSUSER, MSPASS)
      OR $this->error(1,"Hay un error de conexion con el servidor MSSQL");
    
      mysql_select_db(MSDATA, $this->con)
      OR $this->error(1,"No se pudo seleccionar la base de datos");
   }

   function query($a)
   {
       $this->qry = $a;
       $this->rs = mysql_query($a, $this->con);
   }

   function getRow()
   {
      return mysql_fetch_assoc($this->rs);
   }
   
   function getRow2()
   {
      return mysql_fetch_array($this->rs);
   }

   function numRows()
   {
      return mysql_num_rows($this->rs);
   } 

   function close()
   {
      mysql_close($this->con);
   }

   function first()
   {
      mssql_data_seek($this->rs,0);
   }

   function pos($x)
   {
      mssql_data_seek($this->rs,$x);
   }

   function error($error , $quote)
   { 
       if($error = 1) die($quote.': '.$this->qry);
   }

}

?>