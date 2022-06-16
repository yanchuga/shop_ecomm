### Завдання
Потрібно зробити дві таблиці товарів, використовуючи чистий php. Ідеально якщо вийде відтворити mvc-структуру.
Група має містити складові: groups: id: name:
І інша група повинна містити: products: id name: group id: price

1. Вивести всі групи getgroupsAction
2. При кліку на назву групи вивести товари з даної групи getgroupAction
3. При перегляді товару зберегти в cookie id товару getproductAction
4. При перегляді груп (н1) або товарів (н2) вивести товари які раніше переглядав, навіть якщо вони з інших груп.

### Інформація по API
У нас є 4 endpoint:
1. Одна группа
http://localhost/ecomm/index.php?group=1
2. Всі группи
http://localhost/ecomm/index.php?groups
3. Один товар
http://localhost/ecomm/index.php?product=1
4. Всі товари
http://localhost/ecomm/index.php?products

Додатково:
1. База Данних - db/laravel_db.sql
2. Review коду - shop_review.mp4