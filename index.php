<?
include("inc/connect.php");
$citys = mysqli_query($connect, "SELECT * FROM `city`");
$orders = mysqli_query($connect, "SELECT * FROM `orders`");
$cars = mysqli_query($connect, "SELECT * FROM `cars`");
$cargos = mysqli_query($connect, "SELECT * FROM `cargo`");
$drivers = mysqli_query($connect, "SELECT * FROM `driver`");
$temperatures = mysqli_query($connect, "SELECT * FROM `temperature`");
$longorder = mysqli_query($connect, "SELECT * FROM `longorder`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Админ панель</title>
</head>

<body>
    <header class="header">
        <div class="header__contein _contein">
            <div class="header__content">
                <div class="header__block">
                    <div class="header__link click active" data-down="main">Главная</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="ground">Заказы</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="geotextile">Оформленные заказы</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="sand">Машины</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="geogrid">Георешетка</div>
                </div>
                <div class="header__block">
                    <a class="header__link click" href="site/index.php">Выход</a>
                </div>
            </div>
        </div>
    </header>
    <div class="page__content">
        <div class="page__content__block active-block" id="main">
            <div class="content__block welcome _contein">
                Добро пожаловать в админ панель
            </div>
        </div>
        <div class="page__content__block" id="ground">
            <div class="ground">
                <div class="table__block table__header _contein">
                    <div class="table__link__header">Код</div>
                    <div class="table__link__header">Имя клиента</div>
                    <div class="table__link__header">Номер клиента</div>
                    <div class="table__link__header">Город</div>
                    <div class="table__link__header">Оформить</div>
                    <div class="table__link__header">Удалить</div>
                </div>
                <?
                foreach ($orders as $order) {
                ?>
                    <div class="table__block table__links _contein">
                        <div class="table__link"><? echo $order["id"] ?></div>
                        <div class="table__link"><? echo $order["client"] ?></div>
                        <div class="table__link"><? echo $order["number"] ?></div>
                        <?
                        foreach ($citys as $city) {
                            if ($city["id"] == $order["cityId"]) {
                        ?>
                                <div class="table__link"><? echo $city["cityName"] ?></div>
                            <?
                            }
                        }
                        if ($order['free'] == NULL) {
                            ?>
                            <div class="table__link model__window__open">Оформить</div>
                        <?
                        } else {
                        ?>
                            <div style="pointer-events: none;" class="table__link model__window__open">Оформлен</div>
                        <?
                        }
                        ?>
                        <div class="table__link"><a href="inc/deletAdd.php?id=<? echo $order['id'] ?>&ref=del">Удалить</a></div>
                        <div class="model__window">
                            <div class="model__window__content">
                                <div class="order__block">
                                    <form action="inc/order.php" method="post">
                                        <div class="lable__text__lang">
                                            <label for="clientName">Имя клиента</label>
                                            <input readonly style="pointer-events: none;" type="text" value="<? echo $order["client"] ?>" name="clientName">
                                        </div>
                                        <div class="lable__text__lang">
                                            <label for="clientName">Номер клиента</label>
                                            <input type="text" style="pointer-events: none;" readonly value="<? echo $order["number"] ?>" name="number">
                                        </div>

                                        <?
                                        foreach ($citys as $city) {
                                            if ($order["cityId"] == $city["id"]) {
                                        ?>
                                                <div class="lable__text__lang">
                                                    <label for="clientName">Город</label>
                                                    <input type="text" readonly style="pointer-events: none;" value="<? echo $city["cityName"] ?>" name="cityId">
                                                </div>
                                        <?
                                            }
                                        }
                                        ?>
                                        <label for="clientName">Выбрать водителя</label>
                                        <select name="driverId" style="cursor: pointer;" id="">
                                            <?
                                            foreach ($drivers as $driver) {
                                                if ($driver['free'] == NULL) {

                                            ?>
                                                    <option value="<? echo $driver["id"] ?>"><? echo $driver["name"] ?></option>
                                            <?
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="clientName">Выбрать машину</label>
                                        <select style="cursor: pointer;" name="carId" id="car">
                                            <?
                                            foreach ($cars as $car) {
                                                $ids = $car['id'];
                                                $driverId = $car['driver'];
                                                $data = $cas['date'];
                                                if ($data != $today = date("Y-m-d")) {
                                                    mysqli_query($connect, "UPDATE `driver` SET `free`=NULL WHERE `id` = '$driverId'");
                                                    mysqli_query($connect, "UPDATE `cars` SET `driver`=NULL,`free`=NULL,`date`= NULL WHERE `id` = '$ids'");
                                                }
                                                if ($car['free'] == NULL) {
                                            ?>
                                                    <option data-price="<? echo $car["price"] ?>" value="<? echo $car["id"] ?>"><? echo $car["name"] ?></option>
                                            <?
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="clientName">Выбрать вид асфальтобетонной смеси</label>
                                        <select style="cursor: pointer;" name="vid" id="vid">
                                            <?
                                            foreach ($temperatures as $temperature) {
                                            ?>
                                                <option data-price="<? echo $temperature["price"] ?>" value="<? echo $temperature["id"] ?>"><? echo $temperature["name"] ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                        <label for="clientName">Выбрать заполнитель</label>
                                        <select style="cursor: pointer;" name="cargo" id="cargo">
                                            <?
                                            foreach ($cargos as $cargo) {
                                            ?>
                                                <option data-price="<? echo $cargo["price"] ?>" value="<? echo $cargo["id"] ?>"><? echo $cargo["name"] ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                        <div class="lable__text__lang">
                                            <div class="razdelenie">
                                                <label for="clientName">Тонн</label>
                                                <input type="number" min="1" onkeypress="return false" value="1" name="tonn" id="tonn">
                                                <label for="clientName">Цена</label>
                                                <input type="number" style="pointer-events: none;" readonly name="price" id="price">
                                            </div>
                                        </div>
                                        <input name="id" type="text" value="<? echo $order["id"] ?>" style="display: none;">
                                        <button type="submit">Оформить заказ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?
                }
                ?>
            </div>
        </div>
        <div class="page__content__block" id="geotextile">
            <div class="ground">
                <div class="table__block table__header _contein">
                    <div class="table__link__header">Код</div>
                    <div class="table__link__header">Имя клиента</div>
                    <div class="table__link__header">Номер клиента</div>
                    <div class="table__link__header">Город</div>
                    <div class="table__link__header">Цена</div>
                    <div class="table__link__header">Подробнее</div>
                </div>
                <?
                foreach ($longorder as $longorders) {
                ?>
                    <div class="table__block table__links _contein">
                        <div class="table__link"><? echo $longorders["id"] ?></div>
                        <div class="table__link"><? echo $longorders["clientName"] ?></div>
                        <div class="table__link"><? echo $longorders["number"] ?></div>
                        <div class="table__link"><? echo $longorders["cityId"] ?></div>
                        <div class="table__link"><? echo $longorders["price"] ?></div>
                        <div class="table__link model__window__open">Подробнее</div>
                        <div class="model__window">
                            <div class="model__window__content">
                                <div class="order__block">
                                    <form action="inc/order.php" method="post">
                                        <div class="lable__text__lang">
                                            <label for="clientName">Имя клиента</label>
                                            <input readonly style="pointer-events: none;" type="text" value="<? echo $longorders["clientName"] ?>" name="clientName">
                                        </div>
                                        <div class="lable__text__lang">
                                            <label for="clientName">Номер клиента</label>
                                            <input readonly style="pointer-events: none;" type="text" value="<? echo $longorders["number"] ?>" name="clientName">
                                        </div>
                                        <div class="lable__text__lang">
                                            <label for="clientName">Город</label>
                                            <input readonly style="pointer-events: none;" type="text" value="<? echo $longorders["cityId"] ?>" name="clientName">
                                        </div>
                                        <div class="lable__text__lang">
                                            <label for="clientName">Цена</label>
                                            <?
                                            foreach ($drivers as $driver) {
                                                if ($driver['id'] == $longorders['driverId']) {
                                            ?>
                                                    <input readonly style="pointer-events: none;" type="text" value="<?php echo $driver["name"] ?>" name="clientName">
                                            <?
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="lable__text__lang">
                                            <label for="clientName">Цена</label>
                                            <?
                                            foreach ($cars as $car) {
                                                if ($car['id'] == $longorders['carId']) {
                                            ?>
                                                    <input readonly style="pointer-events: none;" type="text" value="<?php echo $car["name"] ?>" name="clientName">
                                            <?
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="lable__text__lang">
                                            <label for="clientName">Цена</label>
                                            <?
                                            foreach ($cargos as $cargo) {
                                                if ($cargo['id'] == $longorders['vid']) {
                                            ?>
                                                    <input readonly style="pointer-events: none;" type="text" value="<?php echo $cargo["name"] ?>" name="clientName">
                                            <?
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="lable__text__lang">
                                            <div class="razdelenie">
                                                <label for="clientName">Тонн</label>
                                                <input type="number" readonly value="<? echo $longorders["tonn"] ?>" name="tonn" id="tonn">
                                                <label for="clientName">Цена</label>
                                                <input type="number" style="pointer-events: none;" value="<? echo $longorders["price"] ?>" readonly name="price" id="price">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?
                }
                ?>
            </div>
        </div>
        <div class="page__content__block" id="sand">
            <div class="ground">
                <div class="table__block table__header _contein">
                    <div class="table__link__header">Код</div>
                    <div class="table__link__header">Название</div>
                    <div class="table__link__header">Цена(за один день)</div>
                    <div class="table__link__header">Доступен?</div>
                    <div class="table__link__header">Прикреплен</div>
                </div>
                <?
                foreach ($cars as $car) {
                ?>
                    <div class="table__block table__links _contein">
                        <div class="table__link"><? echo $car["id"] ?></div>
                        <div class="table__link"><? echo $car["name"] ?></div>
                        <div class="table__link"><? echo $car["price"] ?></div>
                        <?
                        if ($car['date'] != NULL) {
                        ?>
                            <div class="table__link">Нет</div>
                        <?
                        } else {
                        ?>
                            <div class="table__link">Свободен</div>
                        <?
                        }
                        if ($car["driver"] == NULL) {
                        ?>
                            <div class="table__link">Не прикреплен</div>
                            <?
                        } else {
                            foreach ($drivers as $driver) {
                                if ($car["driver"] == $driver['id']) {
                            ?>
                                    <div class="table__link">Прикреплен за <? echo $driver["name"] ?></div>
                        <?
                                }
                            }
                        }
                        ?>
                    </div>
                <?
                }
                ?>
            </div>
        </div>
        <div class="page__content__block" id="geogrid">
            <div class="ground">
                <div class="table__block table__header _contein">
                    <div class="table__link__header">Код</div>
                    <div class="table__link__header">Название</div>
                    <div class="table__link__header">Цена(за 1 тонну)</div>
                    <div class="table__link model__window__open aass">+</div>
                    <div class="model__window">
                        <div class="model__window__content">
                            <div class="order__block">
                                <form action="inc/order.php" method="post">
                                    <div class="lable__text__lang">
                                        <label for="clientName">Название</label>
                                        <input type="text" name="name">
                                    </div>
                                    <div class="lable__text__lang">
                                        <label for="clientName">Цена</label>
                                        <input type="text" name="price">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?
                foreach ($cargos as $cargo) {
                ?>
                    <div class="table__block table__links _contein">
                        <div class="table__link"><? echo $cargo["id"] ?></div>
                        <div class="table__link"><? echo $cargo["name"] ?></div>
                        <div class="table__link"><? echo $cargo["price"] ?></div>
                    </div>
                <?
                }
                ?>
            </div>
        </div>
        <div class="page__content__block" id="stone">6</div>
    </div>
    <script src="js/scrollLeft.js"></script>
    <script src="js/script.js"></script>
</body>

</html>