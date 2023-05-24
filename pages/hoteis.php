<?php
require '../data/data.php';

if (!isset($_GET['type']) || !isset($_GET['index'])) {
    header('Location: index.php');
    exit();
} else if ($_GET['type'] != 'city' && $_GET['type'] != 'destiny') {
    header('Location: index.php');
    exit();
}

if ($_GET['type'] == 'city') {
    if (count($cities) < intval($_GET['index'])) {
        header('Location: index.php');
        exit();
    } else {
        $data = $cities[$_GET['index']];
    }
} else if ($_GET['type'] == 'destiny') {
    if (count($destinies) < intval($_GET['index'])) {
        header('Location: index.php');
        exit();
    } else {
        $data = $destinies[$_GET['index']];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/hoteis.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Trêsvaga - Hotéis</title>

    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/fav/favicon-16x16.png">
    <link rel="manifest" href="../assets/images/fav/site.webmanifest">
    <link rel="mask-icon" href="../assets/images/fav/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="../assets/images/fav/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="../assets/images/fav/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <header id="main-header">
        <div>
            <div class="logo">
                <a href="./index.php">
                    <img src="../assets/images/logo.png" alt="Logo">
                </a>
            </div>
            <div class="fav">
                <a href="./index.php">
                    <img src="../assets/images/star.svg" alt="Star">
                    <p>Meus favoritos</p>
                </a>
            </div>
        </div>
    </header>

    <main>
        <section id="hoteis">
            <div>
                <h3>Hoteis <span>
                        <?= $data['name'] ?>
                    </span></h3>
                <div class="hoteis">
                    <?php
                    foreach ($data['hoteis'] as $hotel) {
                        ?>
                        <div class="hotel">
                            <div class="hotel-img">
                                <img alt="<?= $hotel['name'] ?>" src="<?= $hotel['imgUrl'] ?>">
                            </div>

                            <div class="hotel-text">
                                <div class="hotel-info">
                                    <div class="title-star">
                                        <h3>
                                            <?= $hotel['name'] ?>
                                        </h3>
                                        <img src="../assets/images/star.svg" alt="Star">
                                    </div>
                                    <div class="infos">
                                        <p>
                                            <?= $hotel['type'] ?>
                                        </p>
                                        <p>
                                            <?= $hotel['distance'] ?>km até o centro da cidade
                                        </p>
                                        <p><b>
                                                <?= $hotel['rating'][0] ?> - Exelente
                                            </b> (
                                            <?= $hotel['rating'][1] ?> avaliações )
                                        </p>
                                    </div>
                                </div>

                                <div class="offers">
                                    <div class="fist-offer">
                                        <h4>
                                            <?= $hotel['offers'][0]['site'] ?>
                                        </h4>
                                        <span>R$
                                            <?= $hotel['offers'][0]['offer'] ?>
                                        </span>
                                    </div>
                                    <div class="other-offers">
                                        <div class="offer">
                                            <h4>
                                                <?= $hotel['offers'][1]['site'] ?>
                                            </h4>
                                            <span>R$
                                                <?= $hotel['offers'][1]['offer'] ?>
                                            </span>
                                        </div>
                                        <div class="offer">
                                            <h4>
                                                <?= $hotel['offers'][2]['site'] ?>
                                            </h4>
                                            <span>R$
                                                <?= $hotel['offers'][2]['offer'] ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <section id="about-location">
            <div>
                <?php
                foreach ($data['about'] as $about) {
                    ?>
                    <div class="info-location">
                        <h4>
                            <?= $about['title'] ?>
                        </h4>
                        <p>
                            <?= $about['text'] ?>
                        </p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
    </main>

    <footer id="main-footer">
        <div>
            <div class="logo-social">
                <div class="logo">
                    <a href="./index.php">
                        <img src="../assets/images/logo.png" alt="Logo">
                    </a>
                </div>
                <div class="social-icons">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/trêsvaga" target="_blank" rel="noopener noreferrer">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm3 5.62h-1.52a.65.65 0 00-.61.54v1.56H15c-.09 1.19-.26 2.28-.26 2.28h-1.88v6.75h-2.8V12H8.7V9.72h1.36V7.86c0-.33-.07-2.61 2.87-2.61H15z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/trêsvaga" target="_blank" rel="noopener noreferrer"><span
                                    aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm5.62 7.86v.44a7.91 7.91 0 01-8 7.87A8 8 0 015.41 17h.44a6.3 6.3 0 003.78-1.3h-.2a2.68 2.68 0 01-2.56-1.92 2.32 2.32 0 00.53.05 2.9 2.9 0 00.79-.11 2.58 2.58 0 01-1.43-.67 2.66 2.66 0 01-.88-2 .57.57 0 010-.13 2.58 2.58 0 001.27.32 2.68 2.68 0 01-1.06-1.15h-.07a2.63 2.63 0 01-.22-1 2.53 2.53 0 01.41-1.41 6.72 6.72 0 00.9 1 1 1 0 00.19.17 7.7 7.7 0 002.18 1.07l.33.12a9 9 0 001 .28h.27a7.6 7.6 0 001 .09 2.59 2.59 0 01-.08-.58 2.66 2.66 0 01.24-1.13 2.47 2.47 0 01.52-.79 1.54 1.54 0 01.24-.26A2.76 2.76 0 0114.82 7a2.74 2.74 0 012.05.92l.35-.09a7.06 7.06 0 001.42-.58.88.88 0 01-.07.23 2.29 2.29 0 01-1.11 1.26v.09A6 6 0 0019 8.37a8.87 8.87 0 01-1.38 1.49z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/trêsvaga/" target="_blank" rel="noopener noreferrer"><span
                                    aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <g fill="currentColor">
                                            <circle cx="12" cy="12" r="2.25"></circle>
                                            <path
                                                d="M17.49 9.27A3.85 3.85 0 0017.26 8a2 2 0 00-.51-.77 2 2 0 00-.75-.49 3.85 3.85 0 00-1.25-.23H9.29A3.85 3.85 0 008 6.74a2 2 0 00-.77.51 2 2 0 00-.49.75 3.85 3.85 0 00-.23 1.25v5.46A3.85 3.85 0 006.74 16a2 2 0 00.51.77 2 2 0 00.77.51 3.85 3.85 0 001.25.23h5.46a3.85 3.85 0 001.27-.25A2.32 2.32 0 0017.26 16a3.85 3.85 0 00.23-1.25v-2.73c0-1.8.03-2.02 0-2.75zM12 15.46A3.46 3.46 0 1115.46 12 3.46 3.46 0 0112 15.46zm3.6-6.25a.81.81 0 11.81-.81.81.81 0 01-.81.81z">
                                            </path>
                                            <path
                                                d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm6.7 12.78a4.82 4.82 0 01-.31 1.64 3.49 3.49 0 01-2 2 4.82 4.82 0 01-1.64.31c-.72 0-.95.05-2.78.05s-2.06 0-2.78-.05a4.82 4.82 0 01-1.64-.31 3.19 3.19 0 01-1.19-.78 3.19 3.19 0 01-.78-1.19 4.82 4.82 0 01-.31-1.64v-2.78-2.78a4.82 4.82 0 01.31-1.64 3.19 3.19 0 01.78-1.19 3.19 3.19 0 011.19-.78 5 5 0 011.64-.32h5.56a5 5 0 011.64.32 3.19 3.19 0 011.19.78 3.19 3.19 0 01.78 1.19 4.82 4.82 0 01.31 1.64c0 .72.05.95.05 2.78s.02 2.03-.02 2.75z">
                                            </path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/user/trêsvaga" target="_blank" rel="noopener noreferrer">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g fill="currentColor">
                                            <path d="M10 9l5 3-5 3V9z"></path>
                                            <path
                                                d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm7 12.59A2.36 2.36 0 0116.59 17H7.41A2.36 2.36 0 015 14.59V9.41A2.36 2.36 0 017.41 7h9.18A2.36 2.36 0 0119 9.41z">
                                            </path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/trêsvaganv/" target="_blank"
                                rel="noopener noreferrer">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2a10 10 0 1010 10A10 10 0 0012 2zM8.73 17.4H6.15V9.71h2.58zM7.44 8.66A1.33 1.33 0 117.46 6a1.33 1.33 0 110 2.66zM18 17.4h-2.57v-4.12c0-1-.37-1.74-1.31-1.74a1.39 1.39 0 00-1.31.94 1.66 1.66 0 00-.09.62v4.3h-2.57V9.71h2.57v1.09A2.54 2.54 0 0115 9.53c1.69 0 3 1.09 3 3.46z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="extra-info">
                <div class="newsletter">
                    <h2 class="text-heading-m font-bold mb-4">
                        Quer <span>receber</span> ofertas de acomodações exclusivas?<br>
                        Assine nossa <span>newsletter</span>.
                    </h2>
                    <form>
                        <input type="text" placeholder="Endereço de email">
                        <button type="button" class="button">Inscreva-se</button>
                    </form>
                </div>
                <div class="rights">
                    <p>Direitos autorais 2023 trêsvaga | Todos os
                        direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>