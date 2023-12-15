<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quote Generator</title>

    <!--=============== BOXICONS ===============-->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>

    <!--=============== Favicon ================-->
        <link rel="shortcut icon" href="assets/fav.svg" type="image/x-icon"/>

    <!--=============== CSS ====================-->
    <link rel="stylesheet" href="assets/style.css" />
</head>

<body>

    <!--==================== HEADER ====================-->
    <header class="header">
        <nav class="nav container">
            <a href="https://ahmmedimtiaz.com" class="nav__logo"> Ahmmed Imtiaz </a>
            <div class="nav__toggle" id="nav-toggle" onclick="toggleCode()">
                <a href="https://github.com/ahmmedimtiaz/quote-generator" target="_blank" class="source-code" id="sourceCode">Source Code</a>
                <i class="bx bx-grid-alt"></i>
            </div>
        </nav>
    </header>

    <!--==================== Main ====================-->
    <div class="quote-container">
        <div class="quote-logic">
            <?php
                function readQuotesFromFile($filename)
                {
                    $quotes = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    return $quotes;
                }

                function getRandomQuote($quotes)
                {
                    $randomIndex = array_rand($quotes);
                    return $quotes[$randomIndex];
                }

                $quotesFile = 'quotes.txt';

                $allQuotes = readQuotesFromFile($quotesFile);

                $randomQuote = getRandomQuote($allQuotes);

                list($quote, $author) = explode(" - ", $randomQuote);
            ?>
        </div>
        <div class="quote">
            <div class="quote-text"><?php echo $quote ?></div>
            <div class="quote-author"><?php echo 'Author - ' . $author ?></div>
        </div>
    </div>
    <button class="btn" onclick="getNewQuote()">
            Get New Quote
    </button>
    <script>
        function getNewQuote() {
            location.reload();
        }
    </script>

    <script>
    function toggleCode() {
        var codeElement = document.getElementById("sourceCode");
        codeElement.style.display = (codeElement.style.display === 'none' || codeElement.style.display === '') ? 'inline' : 'none';
    }
</script>
</body>
</html>