# wpt_mobile_catalog
Thema WP for mobile catalog


##Реализовано:
1. Максимально использован ООП подход
- статический класс темы
- статический класс подключения стилей и скриптов
- статический класс ajax и класс REST API
- абстрактынй класс сущности
- класс кастомного типа, наследованный от сущьности, позволяет создавать сущьность и к ней такономмии (фильтры)
- классы Меню и Виджета

2. Виджет-фильтр на основе таксономий + подключен в сайдбар
3. Отдельная страница для выбора товара
4. Фильтрация проходит через ajax + rest API (кнопкой фильтра)
5. Данные передаются json и на фронте используется jQuery-шаблонизатор
6. Пагинация реализована только через стандартный get запрос

