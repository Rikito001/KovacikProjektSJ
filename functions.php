<?php
function insertQnA()
{
    $json = file_get_contents("data/datas.json");
    $data = json_decode($json, true);
    $otazky = $data["otazky"];
    $odpovede = $data["odpovede"];
    echo '<section class="container">';
    for ($i = 0; $i < count($otazky); $i++) {
        echo '<div class="vec">
                    <div class="otazka">' .
            $otazky[$i] . '
                     </div>
                    <div class="odpoved">' .
            $odpovede[$i] . '
                    </div>
            </div>';
    }
    echo '</section>';
}

?>