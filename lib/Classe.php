<?php

function DbConnect()
{
    $conexion=mysqli_connect("localhost", "root", "root","macfilter");
    mysqli_set_charset($conexion,'utf8');
    return $conexion;
}


function SendQuery($sql,$conexion)
{
    $result = mysqli_query($conexion,$sql);
    return $result;
}

function BringRow($result)
{
    $row=mysqli_fetch_array($result);
    return $row;
}

function BackSingleCell($campo,$sql,$conexion)
{
    $res=SendQuery($sql,$conexion);
    $row=BringRow($res);
    return $row[$campo];
}

function BringMaxCode($tabla,$codigo,$conexion)
{
  $mysqli="select Max($codigo)as code from $tabla ";
  $row=BackSingleCell("code",$mysqli,$conexion);
  $rezilta=$row;
  return $rezilta;
} 

function SearchCode($codigo,$descripcion,$desc,$tabla,$conexion)
{
  $mysqli="select $codigo from $tabla where $descripcion=ltrim(rtrim('$desc'))";
  $row=BackSingleCell($codigo,$mysqli,$conexion);
  return $row;
}

function SearchsCode($codigo,$descripcion,$descripcion1,$desc,$desc1,$tabla,$conexion)
{
  $mysqli="select $codigo from $tabla where $descripcion=ltrim(rtrim('$desc')) and $descripcion1=ltrim(rtrim('$desc1')) ";
  $row=BackSingleCell($codigo,$mysqli,$conexion);
  return $row;
}

function SearchCodes($codigo,$descripcion,$descripcion1,$descripcion2,$desc,$desc1,$desc2,$tabla,$conexion)
{
  $mysqli="select $codigo from $tabla where $descripcion=ltrim(rtrim('$desc')) and $descripcion1=ltrim(rtrim('$desc1'))
   and $descripcion2=ltrim(rtrim('$desc2')) ";
  $row=BackSingleCell($codigo,$mysqli,$conexion);
  return $row;
}
//---------------------------------------------------------------------------------------------------------------
function SearchComplexeCode($codigo,$descripcion,$descripcion1,$desc,$desc1,$tabla,$tabla1,$cod,$conexion)
{
  $mysqli="select n.$codigo from $tabla n left join $tabla1 m on n.$cod=m.$cod
  where n.$descripcion='$desc' and m.$descripcion1='$desc1'";
  $row=BackSingleCell($codigo,$mysqli,$conexion);
  return $row;
}
//-----------------------------------------------fin----------------------------------------------------------------
//---------------------------------------------Metodo para llenar un combo------------------------------------------
function FullCombo($id,$campo,$tabla,$link){
 $sql="select $id,$campo from $tabla"; 
  $result=mysqli_query($link,$sql);
  while ($row=mysqli_fetch_row($result)) 
  { 
    echo "<option value=".$row[0]." >".$row[1]."</option>\n";
  } 
}


function FullCombos($sql,$link){
$result=mysqli_query($link,$sql); 
    while ($row=mysqli_fetch_row($result))
    {
        echo "<option >".$row[0]."</option>\n";
    }
}
//---------------------------------------------fin------------------------------------------------------------------
function Encrypt($str)
{
 $val=base64_encode($str);
return $val; 
}

function Decrypt($str)
{
 $val=base64_decode($str);
 return $val; 
}

function Decimal($number){
  if($number==null){
    $number=0;
    $format= number_format($number, 2, '.', '');
    return $format;
  }else{
    $format= number_format($number, 2, '.', '');
    return $format;
  }
}

function Validate_Email($str)
{
  $matches = null;
  return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
}

?>