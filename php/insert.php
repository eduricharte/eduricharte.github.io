<html>
    <head>
        <title>Missio Registro</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play">
    </head>
    <body style="background:url(../recursos/bg.jpg);background-size:100% 100%">
    <div class="rest">
        <style type="text/css">
            .rest {
                background: rgba(255, 255, 255,0.7);
                color: #000;
                padding: 40px;
                width: fit-content;
                margin: auto;
                margin-top: 200px;
                height: auto;
                align-self: center;
                font-family: 'Play', sans-serif;
                font-weight: bold;
            }
        </style>
        <h1>
        <?php
        //Variables
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $tel = $_POST['telefono'];
        $fb = $_POST['facebook'];
        $bautizado = $_POST['bautizado'];
        $confirmado = $_POST['confirmado'];
        $evangelizado = $_POST['evangelizado'];
        $first_time = $_POST['first_time'];
        $reason = $_POST['entrar_a_missio'];
        $server1 = $_POST['servidores1'];
        $server2 = $_POST['servidores2'];
        $server3 = $_POST['servidores3'];

        //Si todos los campos están llenos se ejecuta
        if (!empty($nombre) || !empty($edad) || !empty($tel) || !empty($fb) || !empty($bautizado) || !empty($confirmado) || 
        !empty($evangelizado) || !empty($first_time) || !empty($reason) || !empty($server1) || !empty($server2)|| !empty($server3)) {
            //Datos de la DB
            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "missio";
            
            //Crea la conexión
            $conn = new mysqli($host,$dbUsername,$dbPassword,$dbName);
            
            if(mysqli_connect_error()){
                die('Connect error('.mysqli_errno().')'.mysqli_error());
            }else{
                $SELECT = "SELECT nombre FROM register WHERE nombre = ? LIMIT 1";
                $INSERT = "INSERT INTO register (nombre,edad,telefono,fb,bautizado,confirmado,evangelizado,primera_vez,entrar_a_missio,servidores1,servidores2,servidores3) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                
                //Prepara el statement
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s",$nombre);
                $stmt->execute();
                $stmt->bind_result($nombre);
                $stmt->store_result();
                $rnum = $stmt->num_rows;
                
                if ($rnum==0) {
                    $stmt->close();
                    
                    $stmt = $conn->prepare($INSERT);
                    $stmt->bind_param("siisssssssss",$nombre,$edad,$tel,$fb,$bautizado,$confirmado,$evangelizado,$first_time,$reason,$server1,$server2,$server3);
                    $stmt->execute();
                    echo "Se ha registrado exitosamente";
                }else{
                    echo "Esta persona ya existe";
                }
                $stmt->close();
                $conn->close();
            }
        }else{
            echo "Todos los campos deben ser llenados";
            die();
        }

        ?>
        </h1>
</div>
</body>
</html>