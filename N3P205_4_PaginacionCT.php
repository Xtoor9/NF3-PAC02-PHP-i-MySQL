<?php
//conexion con la base de datos MySQL (servidor)
$db = mysqli_connect('localhost', 'root') or die ('No se pudo conectar. revisa tus parametros.');
    

mysqli_select_db($db,'animalsite') or die(mysqli_error($db));
   
$noRegistros = 1; //Registros por página
$pagina = 1; //Por defecto primera pagina 1
    
if($_GET['pagina']){
    $pagina = $_GET['pagina'];
}
$buskr=$_GET['search'];   
$sSQL = "SELECT animal_name,animaltype_raza FROM animal, animaltype WHERE animal_name LIKE '%$change%' LIMIT ". ($pagina-1)*$noRegistros .",$noRegistros";
$result = mysqli_query($db,$sSQL) or die(mysqli_error($db));
//Tabla
echo "<table border=1px solid black>";
while($row = mysqli_fetch_array($result)) { 
	echo "<tr>";
	echo "<td height=80 align=center> $row[animal_name] <br> </td>";
	echo "<td height=100 align=center> $row[animaltype_raza] <br> </td>";
	echo "</tr>";
	
}
//Imprimiendo paginacion
$sSQL = "SELECT count(*) FROM animal WHERE animal_name LIKE '%$change%'"; //Cuento el total de registros
$result = mysqli_query($db,$sSQL);
$row = mysqli_fetch_array($result);
$totalRegistros = $row["count(*)"]; 
$noPaginas = $totalRegistros/$noRegistros; 
?>

<tr>
    <td colspan="1" align="center"><?php echo "<strong>Total registros: </strong>". $totalRegistros; ?></td>
    <td colspan="1" align="center"><?php echo "<strong>Pagina: </strong>". $pagina; ?></td>
</tr>
<tr bgcolor="f3f4f1">
    <td colspan="2" align="right"><strong>Pagina:
    
<?php
//Imprimo las paginas
for($i=1; $i<$noPaginas+1; $i++) { 
	if($i == $pagina)
	   //Poner color rojo a la pagina donde estas
		echo "<font color=red>". $i ."</font>";
	else
		echo "<a href=\"?pagina=". $i ."&searchs=". $buskr ."\" style=color:#000;> ". $i ."</a>";
}
?>

	</strong></td>
</tr>
</table>