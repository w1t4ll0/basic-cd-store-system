<?php 
include("heade.php");
if (isset($_SESSION['nor'])==0) {
  echo "<script> window.location=' login.php'</script>";
}
 ?>
 <style type="text/css">
    body{
      margin-top: 10%;
    }
  </style>

  <body >
<?php if (isset($_SESSION['id'])) {
  $id_cliente = $_SESSION['id'];
} ?>
 <?php
           include_once "conexao.php";
            $sql = "select * from pedido where id_cliente =".$id_cliente;
           $result = mysql_query($sql,$con);
            if($result){
            while($linha = mysql_fetch_array($result)){
?><?php $num =  $linha['id_pedido'];
$_SESSION['pedido'] = $num ;?>
<?php }} ?>

<?php 
  date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y | H:i:s'); ?>

  
<?php 
 if (isset($_SESSION['dados'])) {
  $test = $_SESSION['dados'];

    foreach ($test as $key) {
$sql="INSERT INTO `pedido_itens` (`id_pedido`, `id_cliente`, `id_cd`, `quantidade`, `data`) VALUES ('".$num."','".$id_cliente."','".$key['id_cd']."','".$key['quantity']."','".$date."')";
mysql_query($sql,$con);
    }
}  
    echo"<script> alert('comprado com sucesso')</script>";   
    if (isset($_GET['boleto'])) {
  $boleto = $_GET['boleto'];
}  
    echo"<script>window.location='".$boleto.".php'</script>";
?>