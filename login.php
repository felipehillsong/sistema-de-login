<?php
session_start();
if(isset($_POST['email']) && empty($_POST['email']) == false){
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $dsn = "mysql:dbname=felipe_2;host=localhost";
    $dbuser= "root";
    $dbpass = "";

    try{
        $db = new PDO($dsn, $dbuser, $dbpass);
        $sql = $db->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $_SESSION['id'] = $dado['id'];

            header("Location: index.php");
        }

    }catch(PDOExeption $e){
        echo "Falhou: ".$e->getMessage();
    }
}
?>
Pagina de Login <br/><br/>
<form method="POST">
E-mail:<br/>
<input type="email" name="email" /><br/><br/>
Senha:<br/>
<input type="password" name="senha" /><br/><br/>
<input type="submit" value="Entrar" />
</form>