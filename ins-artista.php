<html>
    <head>
        <link rel="stylesheet" href="stili-azioni.css">
    </head>
    <body>
    <h1>GALLERIA CF</h1>
<nav>
    <ul>
    <li><a href="galleria.html">Home</a></li>
        <li>
            <a href="">Artisti</a>
            <ul>
                <li class="artisti"><a href="beckmann.html">Beckmann</a></li>
                <li class="artisti"><a href="botticelli.html">Botticelli</a></li>
                <li class="artisti"><a href="michelangelo.html">Buonarroti</a></li>
                <li class="artisti"><a href="cezanne.html">Cezanne</a></li>
                <li class="artisti"><a href="davinci.html">Da Vinci</a></li>
                <li class="artisti"><a href="dali.html">Dali'</a></li>
                <li class="artisti"><a href="">Friedrich</a></li>
                <li class="artisti"><a href="">Gauguin</a></li>
                <li class="artisti"><a href="">Klee</a></li>
                <li class="artisti"><a href="">Klimt</a></li>
                <li class="artisti"><a href="">Liebermann</a></li>
                <li class="artisti"><a href="">Macke</a></li>
                <li class="artisti"><a href="">Manet</a></li>
                <li class="artisti"><a href="">Marc</a></li>
                <li class="artisti"><a href="">Merisi</a></li>
                <li class="artisti"><a href="">Monet</a></li>
                <li class="artisti"><a href="">Munch</a></li>
                <li class="artisti"><a href="">Picasso</a></li>
                <li class="artisti"><a href="">Renoir</a></li>
                <li class="artisti"><a href="">Sanzio</a></li>
                <li class="artisti"><a href="">Van Gogh</a></li>
                <li class="artisti"><a href="">Vermeer</a></li>
            </ul>
        </li>
        <li>
            <a href="">Azioni</a>
            <ul>
                <li>
                    <a href="">Visualizza</a>
                    <ul class="azioni">
                        <li ><a href="vis-artista.php">Artista</a></li>
                        <li ><a href="vis-citta.php">Citta'</a></li>
                        <li ><a href="vis-museo.php">Museo</a></li>
                        <li ><a href="vis-opera.php">Opera</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Inserisci</a>
                    <ul class="azioni">
                        <li ><a href="ins-artista.php">Artista</a></li>
                        <li ><a href="ins-citta.php">Citta'</a></li>
                        <li ><a href="ins-museo.php">Museo</a></li>
                        <li ><a href="ins-opera.php">Opera</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Elimina</a>
                    <ul class="azioni">
                        <li ><a href="el-artista.php">Artista</a></li>
                        <li ><a href="el-citta.php">Citta'</a></li>
                        <li ><a href="el-museo.php">Museo</a></li>
                        <li ><a href="el-opera.php">Opera</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="query.php">Query</a></li>
        <li><a href="CF.html">Chi siamo</a></li>
    </ul>
</nav>

<br>
        <h1>Inserisci un artista</h1>
        <form method="post" action='<?php echo($_SERVER["PHP_SELF"]) ?>' >
            <h3>Nome: </h3>
            <input type="text" name="nome"><br>
            <h3>Cognome: </h3>
            <input type="text" name="cognome"><br>
            <h3>Anno di nascita: </h3>
            <input type="number" name="dataN"><br>
            <h3>Anno di morte: </h3>
            <input type="number" name="dataM"><br>
            <input type="submit" name="invio" value="Aggiungi">
        </form>
    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conn = mysqli_connect("localhost", "Luca", "123", "museodb");
    $cod = $_POST["codArtista"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $dataN = $_POST["dataN"];
    $dataM = $_POST["dataM"];
    
    $listsql = "INSERT INTO artisti (CodArtista, Nome, Cognome, DataN, DataM) VALUES
                ('$cod', '$nome', '$cognome', '$dataN', '$dataM')";

    if (mysqli_query($conn, $listsql)) {
        echo "<h3 style='color:#ffbf00; text-align:center;'>Artista aggiunto con successo</h3>";
    } else {
        echo "<h3 style='color:red; text-align:center;'>Errore nell'aggiunta dell'artista: " . mysqli_error($conn) . "</h3>";
    }
}    
?>