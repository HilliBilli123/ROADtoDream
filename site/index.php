<?
include("../inc/connect.php");
$citys = mysqli_query($connect, "SELECT * FROM `city`");
$cargos = mysqli_query($connect, "SELECT * FROM `cargo`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная</title>
</head>

<body>
    <header class="header">
        <div class="header__contein _contein">
            <div class="header__content">
                <div class="header__block">
                    <div class="header__link click active" data-down="main">Главная</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="ground">Материалы</div>
                </div>
                <!-- <div class="header__block">
                    <div class="header__link click" data-down="geotextile">Геотекстиль</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="sand">Песок</div>
                </div> -->
                <div class="header__block">
                    <div class="header__link click" data-down="geogrid">О нас</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="order">Заказать</div>
                </div>
                <div class="header__block">
                    <a class="header__link click" href="../index.php">Вход</a>
                </div>
            </div>
        </div>
    </header>
    <div class="page__content">
        <div class="page__content__block" id="main">
            <img src="response/image/back.jpg" alt="">
            <div class="block__content__text">
                <div class="_contein">
                    <div class="text__title">Нажмите<br> на кнопку ниже<br /> что бы заказать</div>
                    <button class="btn click" data-down="order">Заказать</button>
                </div>
            </div>
        </div>
        <div class="page__content__block _contein" id="ground">
            <div class="items__center">
                <div class="block__title">
                    Материалы
                </div>
                <div class="ground__image__block">
                    <div class="ground__image__link">
                        <img src="response/image/material-1.jpg" alt="">
                        <div class="image__link__title">Песок</div>
                    </div>
                    <div class="ground__image__link">
                        <img src="response/image/material-2.jpg" alt="">
                        <div class="image__link__title">Щебень</div>
                    </div>
                    <div class="ground__image__link">
                        <img src="response/image/material-4.jpg" alt="">
                        <div class="image__link__title">Бетоная смесь</div>
                    </div>
                    <div class="ground__image__link">
                        <img src="response/image/material-3.jpg" alt="">
                        <div class="image__link__title">Грунт</div>
                    </div>
                    <div class="ground__image__link">
                        <img src="response/image/material-5.jpg" alt="">
                        <div class="image__link__title">Керамзит</div>
                    </div>
                    <div class="ground__image__link">
                        <img src="response/image/material-6.jpg" alt="">
                        <div class="image__link__title">Геотекстиль</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="page__content__block" id="geotextile">3</div> -->
        <!-- <div class="page__content__block" id="sand">4</div> -->
        <div class="page__content__block _contein" id="geogrid">
            <div class="items__center">
                <div class="block__title">
                    О нас
                </div>
                <div class="geogrid__image__link">
                    <p>Каждому автомобилисту, велосипедисту либо простому пешеходу приятнее ехать или идти по ровной, гладкой дороге. Любые повреждения дорожного покрытия влияют на скорость вождения, траекторию, а также негативно сказываются на износе деталей машины либо другого транспорта.</p>
                    <p>Укладывая определенное покрытие, необходимо предварительно учесть нагрузку на него, чтобы предотвратить его преждевременное разрушение.</p>
                </div>
            </div>
        </div>
        <!-- <div class="page__content__block" id="stone">6</div> -->
        <!-- <div class="page__content__block" id="coverage">7</div> -->

        <div class="page__content__block _contein" id="order">
            <div class="items__center">
                <div class="block__title">
                    Оформить заказ
                </div>
                <div class="order__block">
                    <form action="../inc/add.php" method="post">
                        <div class="lable__text__lang">
                            <label for="clientName">Ваше имя</label>
                            <input type="text" name="clientName">
                        </div>
                        <div class="lable__text__lang">
                            <label for="clientName">Ваш номер</label>
                            <input type="tel" maxlength="12" name="number">
                        </div>
                        <label for="clientName">Выберите город</label>
                        <select name="cityId" id="city">
                            <?
                            foreach ($citys as $city) {
                            ?>
                                <option value="<? echo $city["id"] ?>"><? echo $city["cityName"] ?></option>
                            <?
                            }
                            ?>
                        </select>
                        <div class="plus__conteint">
                            <label for="clientName">Груз</label>
                            <!-- <button class="plus__button">+</button> -->
                        </div>
                        <div class="plus__add__block">
                            <div class="select__block__flex">
                                <select name="cargo[]" class="cargo" id="cargo">
                                    <?
                                    foreach ($cargos as $cargo) {
                                    ?>
                                        <option data-cargos="<? echo $cargo["price"] ?>" value="<? echo $cargo["name"] ?>"><? echo $cargo["name"], " от ", $cargo["price"], " тг за 1 кубометр" ?></option>
                                    <?
                                    }
                                    ?>
                                </select>

                                <div class="input__plus__minus">
                                    <div class=" input__button minus">-</div>
                                    <input type="text" id="input__type">
                                    <div class="input__button plus">+</div>

                                </div>
                            </div>
                        </div>
                        <div class="lable__text__lang">
                            <label for="clientName">Цена</label>
                            <input type="text" id="price" disabled>
                            <input type="text" style="display:none;" name="price" id="dubl">
                        </div>
                        <button type="submit">Оформить заказ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/scroll.js"></script>
    <script src="js/scipt.js"></script>
    <!-- <script src="js/map.js"></script> -->

</body>

</html>