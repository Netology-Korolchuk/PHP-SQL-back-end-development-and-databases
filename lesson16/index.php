<?php
    error_reporting(E_ALL);
    require_once __DIR__ . '/vendor/autoload.php';
    require_once "autoload.php";
    $geo = new YandexGeo();
?>

<!DOCTYPE html>
<html>
    <head>
    <script src="//api-maps.yandex.ru/2.0/?load=package.standard,package.geoObjects&lang=ru-RU" type="text/javascript"></script>
        <meta charset="utf-8">
        <title>Работа с Yandex Geo</title>
        <style>
    table {
        border-spacing: 0;
        border-collapse: collapse;
    }
    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    table th {
        background: #eee;
    }
        </style>
    </head>
<body>
<center>
<h1>Работа с Yandex Geo</h1>

    <form method="GET">
        <label for="address">Адрес:</label>
        <input type="text" name="address">
        <button type="submit">Найти</button>
    </form>
    <hr/>

    <?php
        $addressList = $geo->checkFormUrl();
        if (! empty ($addressList)) :
            $geo -> usersSelection();
            $latitude = $addressList[$geo -> getSelector()] -> getLatitude();
            $longitude = $addressList[$geo -> getSelector()] -> getLongitude();
     ?>
<!-- Выводим карту -->
    <script>
            ymaps.ready(init);
            var latitude =  <?php echo $latitude  ?>;
            var longitude = <?php echo $longitude  ?>;
            function init () {
                var myMap = new ymaps.Map("map", {
                        center: [latitude, longitude],
                        zoom: 10
                    }),
                    myGeoObject = new ymaps.GeoObject({
                        geometry: {
                            type: "Point",
                            coordinates: [latitude, longitude]
                        }
                    });
                myMap.geoObjects.add(myGeoObject);
                myMap.controls.add('zoomControl', { left: 5, top: 5 }).add('typeSelector').add('mapTools', { left: 35, top: 5 });
            }
    </script>

    <div id="map" style="width:100%; height:400px"></div>
<!-- end -->

<!-- Выводим таблицу адресов -->
   <hr/>
        <table>
            <th>Адрес</th>
            <th>Координаты</th>
            <th>Ссылка</th>
            <?php
                $i = 0;
                foreach ($addressList as $address) :
                $current_address =  $address -> getAddress();
                $current_latitude =  $address -> getLatitude();
                $current_longitude =  $address -> getLongitude();
            ?>
            <tr>
            <td> <?php echo $current_address;  ?></td>
            <td> <?php echo $current_latitude . ', ' .$current_longitude; ?> </td>
                    <?php if ($current_latitude == $latitude && $current_longitude == $longitude) : ?>
                    <td>На карте</td>
                    <?php else : ?>
                    <td><a href="index.php?address=<?php echo htmlspecialchars($_GET['address']); ?>&result=<?php echo $i; ?>">Показать на карте</a><td>
                    <?php endif; ?>
            </tr>
            <?php
                $i++;
                endforeach;
            ?>
        </table>
    <hr/>
<!-- end -->
        <?php endif; ?>
</center>
</body>
</html>