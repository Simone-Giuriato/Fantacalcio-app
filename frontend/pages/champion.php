<?php
session_start();
error_reporting(0);
if (empty($_SESSION['user_id'])) {
    header('location: ../login.php');
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fantacalcio | Campionato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo1.png">
</head>

<body style="background-color:#ffebcd">
    <?php require_once(__DIR__ . '\navbar.php'); ?>

    <div class="container px-3 py-3">

        <?php
        include_once dirname(__FILE__) . '/../function/match.php';
        $numbermatch = getLastNumberMatch($_SESSION['id_league']); //piccolom problema con prima giornata tocca fare manualmente
        if ($numbermatch == -1) {
            echo ('<p class="text-danger">Non sono state ancora simulate le prime partite.</p>');
        }
        ?>

       

        <?php
        include_once dirname(__FILE__) . '/../function/league.php';
        $check = checkTrustee($_SESSION['user_id']);
        ?>

       

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $res = simulateMatch($_SESSION['id_league']);
            if ($res['message'] == "1") {
                header("Refresh:0");//campionato concluso non funziona
            } elseif ($res['message'] == "Campionato concluso") {
                unset($_SESSION['id_squad']);
                unset($_SESSION['id_league']);
                header('location: homepage.php');
            }
        }
        ?>

        <br>
        <?php if ($numbermatch != -1): ?>

            <h2> Punteggi della giornata:
                <?php echo $numbermatch ?>
            </h2>
            <?php
            $match = getLastMatch($_SESSION['id_league'], $numbermatch);
            ?>
            <?php if ($match != "-1"): ?>
                <div class="container mt-4">
                    <ol class="list-group">
                        <?php foreach ($match as $row): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start " >
                                <div class="ms-2 me-auto" >
                                    <div class="fw-bold">
                                        <?php echo ($row['name']) ?>
                                    </div>
                                </div>
                                <span class="badge bg-dark rounded-pill">
                                    <?php echo ($row['score']) ?>
                                </span>
                            </li>
                        <?php endforeach ?>
                    </ol>
                </div>
            <?php endif ?>

            <?php if ($check == 0): ?>
            <form method="post">
                <button class="btn  mt-3 btn btn-outline-dark" type="submit">Simula una nuova giornata</button>
            </form>
        <?php endif ?>

        <?php endif ?>

    </div>

    <hr>
    <hr>
    <?php
    include_once dirname(__FILE__) . '/../function/league.php';
    $ranking = getRanking($_SESSION['id_league']);
    $i = 1;
    ?>



    <div class="container" style="padding: 30px 10px; ">

        <?php
        include_once dirname(__FILE__) . '/../function/match.php';
        $numbermatch = getLastNumberMatch($_SESSION['id_league']);
        if ($numbermatch == -1) {
            echo ('<p class="text-danger">Non sono state ancora simulate le prime partite.</p>');
        }
        ?>
        
        
        <?php if ($numbermatch != -1): ?>
            <div class="container">
            <div class="container mt-4">
                <h2>Classifica dopo  <b>
                        <?php echo ($numbermatch) ?> 
                    </b>
                    giornate: </h2>
            </div>
        </div>
        
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Posizione</th>
                        <th scope="col">Nome Squadra</th>
                        <th scope="col">Punteggio</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider table-dark">
                    <?php foreach ($ranking as $row): ?>
                        <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>
                            <td>
                                <?php echo $row['score'] ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        
    <?php endif ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>


