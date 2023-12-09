<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style_laba6.css" rel="stylesheet">
    <title>Антивирусные программы</title>
</head>
  <header class="head">
        <img src="image/logo.png" width="100px" class="logo">
        <h1>Антивирусные программы</h1>
        <nav class="nav">
            <a href="index.html">Главная</a>
            <a href="basis.html">Общая информация об антивирусных программах</a>
            <a href="book.html">Использованные источники</a>
            <a href="laba3.html">Laba 3</a>
            <a href="http://127.0.0.1:8080/form.html">Анкета (Laba 4)</a>

        </nav>
    </header>
<body>
<br>
<div class="main" style='text-align=center;'>
    <div>
        <div class="scroll-table">
                <table class = 'table_virus' >
                    <caption>Классификация вирусов</caption>
                    <col width="200" valign="top">
                    <col width="150" valign="top">
                    <col width="150" valign="top">
                    <colgroup>
                        <thead class="borderClass">
                            <tr>
                                <th>По способу заражения среды обитания</th>
                                <th>По среде обитания</th>
                                <th>По особенностям алгоритма</th>
                            </tr>
                        </thead>
                    </colgroup>
                </table>
            </div>
            <div class="scroll-table-body">
            <?php
            require_once '_scripts.php';
              get_db();
            ?>
            </div>
            <div class="FormConteiner">
                <div class="addRowForm">
                     <?php
                      require_once '_scripts.php';
                      showForm();
                     ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <hr>
    <footer class="footer">
        <address>Санкт-Петербург</address>
    </footer>
</body>
</html>