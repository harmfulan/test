#!/usr/bin/env python
import cgi, sys
import csv
form = cgi.FieldStorage()         # извлечь данные из формы
print("Content-type: text/html; charset=UTF-8; \n") # плюс пустая строка

html = """
<!DOCTYPE html>
<html lang="en">
<head>    
    <link href="../style.css" rel="stylesheet" >
        <link rel="shortcut icon" href="../favicon/favicon.ico">
    <link rel="icon" type="image/gif" href="../favicon/favicon.ico">
    <title>tutor5</title>
</head>
<body>
    <div class="head">
        <img src="../image/logo.png" width="100px" class="logo">
        <h1>Антивирусные программы</h1>
        <div class="nav">
            <a href="../index.html">Главная</a>
            <a href="../basis.html">Общая информация об антивирусных программах</a>
            <a href="../book.html">Использованные источники</a>
            <a href="../laba3.html">Laba 3</a>
            <a href="http://127.0.0.1:8080/form.html">Анкета (Laba 4)</a>
        </div>
    </div>
    <div class="main">         
    <br>
        <hr>
        <h2 style="text-align: center;">Результаты анкетирования</h3>
        <div class="result" style="text-align: center;  width : 1000px; background: #008B8B; border-radius: 100px; margin: auto;" >
            <h4>Вас зовут:  <i style="font-size: 16px; color: #00008B;" >%(surname)s %(name)s %(lastname)s</i> <h4>
            <H4>Классификация: <i style="font-size: 16px; color: #00008B;" >%(group)s</i></H4>
            <H4>Как определить, что компьютер заражен вредоносной программой?: <i style="font-size: 16px; color: #00008B;"> %(radio)s</i></H4>
            <H4>Методы защиты от вирусов?: <i style="font-size: 16px; color: #00008B;" > %(checkbox)s</i> </H4>
            <H4>Дата заполнения:  <i style="font-size: 16px; color: #8B0000;"> %(timedisplay)s</i> </H4>
            <H4>Комментарии:</H4>
            <P style="font-size: 12px; color: #00008B;">%(comment)s</P>
        </div>
        <hr>
        <div class="footer" style="font-size: 12px; color: #0000; padding-left: 0;">
            <address>Санкт-Петербург</address>
        </div>
    </div>

</body>
</html>"""

data = {}
for field in ('surname', 'lastname', 'name', 'group', 'radio', 'checkbox', 'comment', 'timedisplay'):
    if not field in form:
        data[field] = '(unknown)'
    else:
        if not isinstance(form[field], list):
            data[field] = form[field].value
        else:
            values = [x.value for x in form[field]]
            data[field] = ' and '.join(values)


with open('data.csv', 'a', newline='') as file:
    fieldnames = data.keys()
    writer = csv.DictWriter(file, fieldnames=fieldnames, delimiter=';')
    writer.writerow(data)

print(html % data)