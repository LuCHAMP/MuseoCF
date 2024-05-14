<html>
    <head>
        <link rel="stylesheet" href="stili-visualizza.css">
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
        <h1>Visualizza tutti i musei</h1>

</body>
</html>

<?php
    $conn = mysqli_connect("localhost", "Luca", "123", "museodb");

    $listsql = "SELECT * FROM musei";
    $result = $conn->query($listsql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        </tr>";

        while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["CodMuseo"] . "</td>";
        echo "<td>" . $row["Nome"] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nessun risultato trovato";
    }
?>