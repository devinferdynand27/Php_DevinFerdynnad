<!DOCTYPE html>
<html>

<head>
    <title>soal 2</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Laporan</h1>
    <form action="index.php" method="get">
        <label for="hobi">Search Hobi:</label>
        <input type="text" id="hobi" name="hobi">
        <button type="submit">Cari</button>
    </form>

    <table>
        <tr>
            <th>Hobi</th>
            <th>Jumlah Person</th>
        </tr>
        <?php
        include 'db_config.php';

       
        $sql = "SELECT hobi.hobi, COUNT(DISTINCT hobi.person_id) AS jumlah_person
        FROM hobi
        GROUP BY hobi.hobi
        ORDER BY jumlah_person DESC";


        if (isset($_GET['hobi'])) {
            $searchHobi = mysqli_real_escape_string($conn, $_GET['hobi']);
            $sql = "SELECT hobi.hobi, COUNT(DISTINCT hobi.person_id) AS jumlah_person
            FROM hobi
            WHERE hobi.hobi LIKE '%$searchHobi%'
            GROUP BY hobi.hobi
            ORDER BY jumlah_person DESC";
        }

        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["hobi"] . "</td>";
                echo "<td>" . $row["jumlah_person"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada hasil pencarian untuk hobi '" . htmlspecialchars($_GET['hobi']) . "'</td></tr>";
        }


        mysqli_close($conn);
        ?>

    </table>
</body>

</html>