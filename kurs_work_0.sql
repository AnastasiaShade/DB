1. Добавление нового юзера(при регистрации)
INSERT INTO user(NULL, "Введенный логин", "Введенный пароль", "дата регистрации", "имя", "фамилия", "номер телефона",
 "паспорт", "водительское удостоверение", "юридическое лицо");

2. Поиск юзера(вход в личный кабинет)
SELECT * FROM user WHERE username = "Введенный логин" AND password = "Введенный пароль";

3. Проверка на существующий логин при регистрации
SELECT * FROM user WHERE username = "Введенный логин";

4. Получить список автомобилей, удовлетворяющих запросам клиента с помощью фильтра
SELECT * FROM car LEFT JOIN model ON car.id_model = model.id_model
LEFT JOIN colour ON car.id_colour = colour.id_colour
WHERE model.model = "Введенная модель" AND model.type = "Введенный тип" AND model.class = "Введенный класс" 
AND colour.colour = "Введенный цвет" AND car.rent_price IN ("Введенная начальная цена","Введенная конечная цена");

5. Добавление нового контракта
INSERT INTO contract(NULL, (SELECT id_user FROM user WHERE username = "Введенный логин"), "Введенная дата начала действия договора", 
"Введенная дата окончания действия договора", "дата добавления контракта", "Введенная стоимость услуг");

6. Добавление автомобиля в контракт
INSERT INTO car_in_contract((SELECT id_contract FROM contract WHERE id_contract = "Введенный номер договора"), 
(SELECT id_car FROM car WHERE car_number = "Введенный регистрационный номер машины"), 
(SELECT id_address FROM address WHERE address = "Введенный адрес отправки автомобиля"),
(SELECT id_address FROM address WHERE address = "Введенный адрес прибытия автомобиля"))