<html> <body>
<!-- bgcolor="#E6E6FB"> --> 
<FONT color="blue" size="5pt"><B><I>Laissez nous un message SVP </B></I></FONT>
<br/>
<br/>
<form action="demo.php" method="post">
<table>
    <tr>
        <td>
            <label for="nom">Nom</label> :<br /> <input type="text" name="nom" id="nom" tabindex="20" /><br/>
        </td>
        <td>
            <label for="prenom">Prénom</label> :<br /> <input type="text" name="prenom" id="prenom" tabindex="30" /><br/>
        </td>
        <td>
            <label for="email">Email</label> :<br /> <input type="text" name="email" id="email" tabindex="40" /><br/>
        </td>
    </tr>
</table>
<br>
<table>
    <tr>
        <td>
            <!-- <label for="message">Votre message</label> :<br /> <input type="text" name="message" id="message" tabindex="90" /><br/> -->
            <label for="message">Votre message</label> :<br /> <textarea name="message" cols="82" rows="5" id="message"></textarea> <br/>
        </td>
    </tr>
</table>
<input type="submit" value="OK"> 
</form>
</body></html>

<?php 
$prenom = $_POST['prenom']; 
$nom = $_POST['nom'];
$email1 = $_POST['email']; 
$message = $_POST['message'];

$servername = "mariadb";
$username = "demo";
$password = "changemoi";
$dbname = "sampledb";

if(!empty($prenom) or !empty($nom)) {
    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $dbname
    );

    if ($conn->connect_error) {
            die('Connexion impossible : ' . $conn->connect_error);
    }

    $sql = "INSERT INTO Form (firstname, lastname, email, message)
        VALUES ('$nom', '$prenom', '$email1', '$message');";

    if ($conn->multi_query($sql) === TRUE) {
        print("Merci pour votre message <b> $prenom $nom </b>"); 
        echo "<br>";
        print("Voici ce que vous avez écrit:"); 
        echo "<br>";
        echo "<FONT color='blue'>$message</FONT>"; 
        echo "<br>";
        echo "==========". "<br>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $sql = "SELECT * FROM Form;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<br>". $row["lastname"]." ". $row["firstname"]. ":". "<br>". $row["message"]. "<br>". "______________". "<br>";
        }
    } else {
            echo "0 results";
    }

    $conn->close();
} 

?> 


