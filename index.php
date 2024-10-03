<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$parkingFilter = $_GET["parking"];
$voteFilter = $_GET["vote"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <h1 class="text-center pt-5">HOTEL</h1>

    <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="mb-3">
                        <label for="parking" class="form-label">Filtra Hotel con Parcheggio</label>
                        <select class="form-select" id="parking" name="parking">
                            <option value="0">NO</option>
                            <option value="1">SI</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="vote" class="form-label">Filtra Hotel per voto</label>
                        <select class="form-select" id="vote" name="vote">
                            <option value="0">NO</option>
                            <option value="1">> 1</option>
                            <option value="2">> 2</option>
                            <option value="3">> 3</option>
                            <option value="4">> 4</option>
                            <option value="5">> 5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtra</button>
                    <button type="reset" class="btn btn-warning">Cancella</button>
                    <span class="mx-3">FILTRO PARCHEGGIO:
                        <?php if (!$parkingFilter) {
                            echo "NO";
                        } else {
                            echo "SI";
                        }  ?></span>
                    <span>FILTRO VOTO: <?php if (!$voteFilter) {
                                            echo "NO";
                                        } else {
                                            echo ">" . $voteFilter;
                                        }  ?></span>
                </form>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Parcheggio</th>
                            <th scope="col">Voto</th>
                            <th scope="col">Distanza dal centro</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($hotels as $hotel) { ?>
                            <?php if (($parkingFilter && $hotel["parking"] || !$parkingFilter) &&
                                (!$voteFilter || $hotel["vote"] >= $voteFilter)
                            ) { ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $hotel["name"] ?>
                                    </th>
                                    <td>
                                        <?php echo $hotel["description"] ?>
                                    </td>
                                    <td>
                                        <?php if ($hotel["parking"]) {
                                            echo "SI";
                                        } else {
                                            echo "NO";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php echo $hotel["vote"] ?>
                                    </td>
                                    <td>
                                        <?php echo $hotel["distance_to_center"] . " km" ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>