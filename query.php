<?php
$queryResult = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "Luca", "123", "museodb");

    $query = $_POST['query'];
    switch ($query) {
        case '1':
            $sql = "SELECT c.nome AS Citta, COUNT(m.CodMuseo) AS NumeroMusei
            FROM citta c
            LEFT JOIN musei m ON c.CodCitta = m.CodCitta
            GROUP BY c.CodCitta;";
            break;
        
        case '2':
            $input = $_POST["input"];
            $sql = "SELECT m.nome AS Nome 
            FROM musei m
            JOIN citta c ON m.CodCitta = c.CodCitta
            WHERE c.nome = '$input';";
            break;

        case '3':
            $input = $_POST["input"];
            $sql = "SELECT o.nome AS Opere
            FROM opere o
            JOIN artisti a ON o.CodArtista = a.CodArtista
            WHERE a.cognome = '$input';";
            break;

        case '4':
            $input = $_POST["input"];
            $sql = "SELECT o.nome AS Opera
            FROM opere o
            JOIN musei m ON o.CodMuseo = m.CodMuseo
            WHERE m.nome = '$input';";
            break; 

        case '5':
            $sql = "SELECT o.nome AS Opera, a.cognome AS Artista
            FROM opere o
            JOIN artisti a ON o.CodArtista = a.CodArtista
            JOIN musei m ON o.CodMuseo = m.CodMuseo
            WHERE m.nome = 'Louvre';";
            break;

        case '6':
            $sql = "SELECT nome AS Nome
            FROM artisti
            WHERE DataM = 0;";
            break;

        case '7':
            $input = $_POST["input"];
            $sql = "SELECT cognome AS Artista
            FROM artisti
            WHERE DataN >= '$input';";
            break;

        case '8':
            $input = $_POST["input"];
            $sql = "SELECT COUNT(*) AS NumeroOpere
            FROM opere o
            JOIN musei m ON o.CodMuseo = m.CodMuseo
            WHERE m.nome = '$input';";
            break;

        case '9':
            $input = $_POST["input"];
            $input2 = $_POST["input2"];
            $sql = "SELECT COUNT(*) AS NumeroOpere
            FROM opere o
            JOIN artisti a ON o.CodArtista = a.CodArtista
            JOIN musei m ON o.CodMuseo = m.CodMuseo
            WHERE m.nome = '$input' AND a.cognome = '$input2';";
            break;

        case '10':
            $sql = "SELECT a.nome AS Autore, m.nome AS Museo, COUNT(o.CodOpera) AS NumeroOpere
            FROM opere o
            JOIN artisti a ON o.CodArtista = a.CodArtista
            JOIN musei m ON o.CodMuseo = m.CodMuseo
            GROUP BY a.CodArtista, m.CodMuseo
            ORDER BY a.nome, m.nome;";
            break;

        case '11':
            $sql = "SELECT a.cognome AS Autore, m.nome AS Museo
            FROM opere o
            JOIN artisti a ON o.CodArtista = a.CodArtista
            JOIN musei m ON o.CodMuseo = m.CodMuseo
            GROUP BY a.CodArtista, m.CodMuseo
            HAVING COUNT(o.CodOpera) >= 2
            ORDER BY a.cognome, COUNT(o.CodOpera) DESC;";
            break;

        case '12':
            $input = $_POST["input"];
            $sql = "SELECT c.nome AS Citta, a.cognome AS Artista, COUNT(*) AS Numero_Opere
            FROM opere o
            JOIN artisti a ON o.CodArtista = a.CodArtista
            JOIN musei m ON o.CodMuseo = m.CodMuseo
            JOIN citta c ON m.CodCitta = c.CodCitta 
            WHERE a.cognome = '$input'
            GROUP BY c.nome
            ORDER BY Numero_Opere DESC;";
            break;

        case '13':
            $sql = "SELECT nome AS Nome, cognome AS Cognome
            FROM Artisti
            WHERE dataN BETWEEN '1400' AND '1600';";
            break;

        default:
            $sql = "";
            break;
    }

    if ($sql) {
        $result = $conn->query($sql);
        if ($result) {
            $queryResult = $result->fetch_all(MYSQLI_ASSOC);
            $result->free_result();
        } else {
            echo "Errore nella query: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Query Museo</title>
    <link rel="stylesheet" href="stili-query.css">
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
                        <li ><a href="parte-php/vis-artista.php">Artista</a></li>
                        <li ><a href="parte-php/vis-citta.php">Citta'</a></li>
                        <li ><a href="parte-php/vis-museo.php">Museo</a></li>
                        <li ><a href="parte-php/vis-opera.php">Opera</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Inserisci</a>
                    <ul class="azioni">
                        <li ><a href="parte-php/ins-artista.php">Artista</a></li>
                        <li ><a href="parte-php/ins-citta.php">Citta'</a></li>
                        <li ><a href="parte-php/ins-museo.php">Museo</a></li>
                        <li ><a href="parte-php/ins-opera.php">Opera</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Elimina</a>
                    <ul class="azioni">
                        <li ><a href="parte-php/el-artista.php">Artista</a></li>
                        <li ><a href="parte-php/el-citta.php">Citta'</a></li>
                        <li ><a href="parte-php/el-museo.php">Museo</a></li>
                        <li ><a href="parte-php/el-opera.php">Opera</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="CF.html">Chi siamo</a></li>
    </ul>
</nav>

<br>


    <h1>Seleziona una Query</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <select name="query">
            <option value="1">Selezionare il numero dei musei per ogni citta</option>
            <option value="2">Elenco dei musei presenti in una citta</option>
            <option value="3">Elenco dei quadri di un artista</option>
            <option value="4">Elenco di tutti i quadri presenti in un museo</option>
            <option value="5">Elenco di tutte le opere che si trovano in un museo con le informazioni relative all'artista</option>
            <option value="6">Elenco dei nomi degli autori che sono ancora viventi</option>
            <option value="7">Elenco degli autori che sono vissuti in un certo periodo</option>
            <option value="8">Quante opere sono presenti in un museo</option>
            <option value="9">Quante opere di un certo autore sono presenti in un museo</option>
            <option value="10">Selezionare il numero di opere di ciascun autore per ogni museo</option>
            <option value="11">Selezionare solo gli artisti che hanno almeno 2 quadri in ogni museo</option>
            <option value="12">Selezionare il numero di quadri di un certo autore in ogni città</option>          
            <option value="13">Elenco degli artisti vissuti tra il 1400 ed il 1600 </option>
        </select>

        <?php 
            error_reporting(0);
            ini_set('display_errors', 0);
            
            if (in_array($_POST['query'], ['2', '3', '4', '7', '8', '9', '12'])) {
                echo '<input type="text" name="input" placeholder="Inserisci il nome">';
            }
            
            if (in_array($_POST['query'], ['9'])) {
                echo '<input type="text" name="input2" placeholder="Inserisci il museo">';
            }
        ?>

        <button type="submit">Esegui Query</button>
    </form>

    <?php if ($queryResult): ?>
        <?php 
            if($query == 1){
                echo "<h2 style='color:#ffbf00; text-align:center'>Selezionare il numero dei musei per ogni citta:</h2>";
            }elseif($query == 2){
                echo "<h2 style='color:#ffbf00; text-align:center'>Elenco dei musei presenti a $input:</h2>";
            }elseif($query == 3){
                echo "<h2 style='color:#ffbf00; text-align:center'>Elenco dei quadri di $input:</h2>";
            }elseif($query == 4){
                echo "<h2 style='color:#ffbf00; text-align:center'>Elenco di tutti i quadri presenti in $input:</h2>";
            }elseif($query == 5){
                echo "<h2 style='color:#ffbf00; text-align:center'>Elenco di tutte le opere che si trovano in $input con le informazioni relative all'artista:</h2>";
            }elseif($query == 6){
                echo "<h2 style='color:#ffbf00; text-align:center'>Elenco dei nomi degli autori che sono ancora viventi:</h2>";
            }elseif($query == 7){
                echo "<h2 style='color:#ffbf00; text-align:center'>Elenco degli autori che sono vissuti in un certo periodo:</h2>";
            }elseif($query == 8){
                echo "<h2 style='color:#ffbf00; text-align:center'>Quante opere sono presenti in $input:</h2>";
            }elseif($query == 9){
                echo "<h2 style='color:#ffbf00; text-align:center'>Quante opere di $input sono presenti in $input2:</h2>";
            }elseif($query == 10){
                echo "<h2 style='color:#ffbf00; text-align:center'>Selezionare il numero di opere di ciascun autore per ogni museo:</h2>";
            }elseif($query == 11){
                echo "<h2 style='color:#ffbf00; text-align:center'>Selezionare solo gli artisti che hanno almeno 2 quadri in ogni museo:</h2>";
            }elseif($query == 12){
                echo "<h2 style='color:#ffbf00; text-align:center'>Selezionare il numero di quadri di $input in ogni città:</h2>";
            }elseif($query == 13){
                echo "<h2 style='color:#ffbf00; text-align:center'>Elenco degli artisti vissuti tra il 1400 ed il 1600:</h2>";
            }
        ?>
        <table>
            <thead>
                <tr>
                    <?php foreach ($queryResult[0] as $key => $value): ?>
                        <th><?php echo htmlspecialchars($key); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($queryResult as $row): ?>
                    <tr>
                        <?php foreach ($row as $cell): ?>
                            <td><?php echo htmlspecialchars($cell); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>