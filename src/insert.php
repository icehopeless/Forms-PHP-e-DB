<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Insert CPF</title>
</head>
<body>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cpfdata";

    //conexao
    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("A conexão não foi estabelecida" . mysqli_connect_error());

    }

    //Testando se o cpf é válido
    if (isset($_POST["cpf"])) {
        $cpf = $_POST["cpf"]; 
        
        if(!empty(trim($cpf))){
            if(strlen($cpf) === 11){

                echo "<p style='color: white;'>CPF VÁLIDO.</p>"; 
                $sql = "INSERT INTO users (cpf) VALUES ('$cpf')"; // criando a query

                //testando se a query foi executada com sucesso
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Novo registro criado com sucesso!!!');</script>";
                }else {
                     echo "<p style='color: white;'>Falha ao inserir o CPF com o Banco de Dados!.</p>";
                }

            }else{
                echo "<p style='color: white;'>Por favor, insira um CPF Valido.</p>";
            }
        }else{
            echo "<p style='color: white;'>CPF Vazio</p>";
        }
    }
    ?>
</body>
</html>