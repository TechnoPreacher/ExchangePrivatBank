Созданный класс обеспечивает получение информации с сайта ПриватБанка

Реализовано функция обмена валюты, в которую передаётся желаемое число и вид обмена - продажа или покупка.
Функция вернёт количество потраченных или полученных гривен в обмен на баксы.

Внутри класса всё упаковано в калбэк, и, в зависимости от входящей строки, вызывается или функция sale(), которая позволяет продавать доллары, или функция buy(), позволяющая их покупать.

В качестве единственного параметра передаётся строка фиксированного формата:
"sale xxx USD" или "buy ХХХ USD", где XXX - желаемое число для конвертации
