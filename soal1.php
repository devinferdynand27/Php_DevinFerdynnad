<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Nomor 1</title>
</head>

<body>
    <form action="" method="POST">
        <div class="form-group">
            <label for="rows">Masukan Jumlah Baris</label>
            <input type="text" id="rows" name="rows" placeholder="Jumlah Baris">
        </div>
        <div class="form-group mt-3">
            <label for="columns">Masukan Jumlah Kolom</label>
            <input type="text" id="columns" name="columns" placeholder="Jumlah Kolom">
        </div>
        <div class="form-group mt-3">
            <button type="submit">Submit</button>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['rows']) && isset($_POST['columns']) && !isset($_POST['generated_form'])) {
            $rows = intval($_POST['rows']);
            $columns = intval($_POST['columns']);

            if ($rows > 0 && $columns > 0) {
                echo '<form action="" method="POST">';
                for ($i = 0; $i < $rows; $i++) {
                    echo '<div class="form-group">';
                    for ($j = 0; $j < $columns; $j++) {
                        echo '<input type="text" name="input_' . $i . '_' . $j . '" placeholder="Input ' . ($i + 1) . ',' . ($j + 1) . '">';
                    }
                    echo '</div>';
                }
                echo '<input type="hidden" name="rows" value="' . $rows . '">';
                echo '<input type="hidden" name="columns" value="' . $columns . '">';
                echo '<input type="hidden" name="generated_form" value="true">';
                echo '<div class="form-group mt-3"><button type="submit">Submit</button></div>';
                echo '</form>';
            } else {
                echo '<p>Please enter valid numbers for rows and columns.</p>';
            }
        } elseif (isset($_POST['generated_form'])) {
            $rows = intval($_POST['rows']);
            $columns = intval($_POST['columns']);
            echo '<h3>Form Data</h3>';
            for ($i = 0; $i < $rows; $i++) {
                for ($j = 0; $j < $columns; $j++) {
                    $input_name = 'input_' . $i . '_' . $j;
                    $input_value = isset($_POST[$input_name]) ? htmlspecialchars($_POST[$input_name]) : '';
                    echo '<p>' . ($i + 1) . '.' . ($j + 1) . ': ' . $input_value . '</p>';
                }
            }
        }
    }
    ?>
</body>

</html>
