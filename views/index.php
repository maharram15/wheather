<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,900,300);

    body {
        width: 100%;
        height: 100%;
        background-color: #263238;
        margin: 0;
        padding: 0;
        font-family: 'Roboto', Helvetica, Arial, sans-serif;
        color: #fff;
    }

    .widget-container {
        width: 612px;
        height: 412px;
        display: block;
        background-color: #313e45;
        border-radius: 25px;
        /*   border: 5px solid #eceff1; */
        margin: 0 auto;
    }


    /* Widget 4 Quarter Division here */

    .top-left {
        height: 60%;
        width: 50%;
        /*   background-color:red; */
        padding: 55px 0 0 70px;
        display: inline-block;
    }

    .top-right {
        height: 60%;
        width: 50%;
        /*   background-color: blue; */
        float: right;
        padding: 55px 0 0 0;
    }

    .bottom-left {
        height: 40%;
        width: 45%;
        /*   background-color:orange; */
        float: left;
        margin: 0;
        padding: 40px 0 0 50px;
    }

    .bottom-right {
        height: 40%;
        width: 55%;
        /*   background-color: brown; */
        float: right;
        padding: 25px 0 0 60px;
    }

    h1,
    h2,
    h3,
    p {
        margin: 0;
        padding: 0;
    }


    /* Top-left Div CSS */

    #city {
        font-weight: 900;
        font-size: 25px;
    }

    #day {
        font-weight: 700;
        font-size: 25px;
        margin-top: 18px;
    }

    #date {
        font-weight: 500;
        font-size: 20px;
        margin-top: 4px;
    }

    #time {
        font-weight: 400;
        font-size: 18px;
        margin-top: 8px;
    }

    #codepen-link {
        font-weight: 400;
        font-size: 12px;
        margin-top: 20px;
    }

    .top-left>a {
        text-decoration: none;
        color: white;
    }

    .top-left>a:hover {
        color: #b0bec5;
    }


    /* Top-Right Div CSS */

    #weather-status {
        font-size: 18px;
        font-weight: 300;
        text-align: center;
        margin: 0 auto;
    }

    .top-right>img {
        width: 120px;
        height: 120px;
        display: block;
        margin: 15px auto 0 auto;
    }


    /* Horizontal-Half-divider */

    .horizontal-half-divider {
        width: 100%;
        height: 3px;
        margin-top: -5px;
        background-color: #263238;
    }

    .vertical-half-divider {
        width: 3px;
        position: absolute;
        height: 167px;
        background-color: #263238;
        float: right;
        display: inline-block;
        padding: 0;
    }


    /* Bottom-left CSS */

    #temperature,
    #celsius,
    #temp-divider,
    #fahrenheit {
        display: inline;
        vertical-align: middle;
    }

    #temperature {
        font-size: 60px;
        font-weight: 800;
        margin-right: 5px;
    }

    #celsius {
        margin-right: 10px;
    }

    #fahrenheit {
        margin-right: 5px;
        color: #b0bec5;
    }

    #celsius,
    #temp-divider,
    #fahrenheit {
        font-size: 30px;
        font-weight: 800;
    }

    #celsius:hover,
    #fahrenheit:hover {
        cursor: pointer;
    }




    /* Bottom-Right CSS */

    .other-details-key {
        float: left;
        font-size: 16px;
        font-weight: 300;
    }

    .other-details-values {
        float: left;
        font-size: 16px;
        font-weight: 400;
        margin-left: 40px;
    }

    .watermark-link {
        text-decoration: none;
        color: #b0bec5;
    }

    .watermark-link:hover {
        color: white;
        text-decoration: none;
    }

    .watermark {
        margin-top: 10px;
        text-align: center;
        font-weight: 400;
    }
</style>


<div class="ruf">
    <div class="wrapper">
        <div class="widget-container">
            <div class="top-left">
                <h1 class="city" id="city"><?= $ip->country . " / " . $ip->city ?></h1>
                <h2 id="day"><?php
                                $weath = "http://openweathermap.org/img/w/{$json->weather[0]->icon}.png";
                                $mydate = date("Y-m-d");
                                echo date('l', strtotime($mydate));
                                ?></h2>
                <h3 id="date"><?= Yii::$app->formatter->asDate(date("Y-m-d")) ?></h3>
                <h3 id="time"><?= date("H:i") ?></h3>
                <!--       <a target="_blank" href="https://codepen.io/myleschuahiock/"><p id="codepen-link">codepen.io/myleschuahiock</p></a> -->
                <p class="geo"></p>
            </div>
            <div class="top-right">
                <h1 id="weather-status"><?= $json->weather[0]->main ?></h1>
                <img class="weather-icon" src="<?= $weath ?>">
            </div>
            <div class=" horizontal-half-divider">
            </div>
            <div class="bottom-left">
                <h1 id="temperature"><?= $model->k_to_c($json->main->temp) ?></h1>
                <h2 id="celsius">&degC</h2>
            </div>
            <div class="vertical-half-divider"></div>
            <div class="bottom-right">
                <div class="other-details-key">
                    <p>Wind Speed</p>
                    <p>Humidity</p>
                    <p>Pressure</p>
                    <p>Sunrise Time</p>
                    <p>Sunset Time</p>
                </div>
                <div class="other-details-values">
                    <p class="windspeed"><?= $json->wind->speed ?> Km/h</p>
                    <p class="humidity"><?= $json->main->humidity ?> %</p>
                    <p class="pressure"> <?= $json->main->pressure ?> hPa</p>
                    <p class="sunrise-time"><?= Yii::$app->formatter->asTime($json->sys->sunrise) ?></p>
                    <p class="sunset-time"><?= Yii::$app->formatter->asTime($json->sys->sunset) ?></p>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $(".wrapper").css("margin-top", ($(window).height()) / 5);
        //DATE AND TIME//
        //Converted into days, months, hours, day-name, AM/PM
        var dt = new Date()
        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        $('#day').html(days[dt.getDay()]);
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
        $('#date').html(months[dt.getMonth()] + " " + dt.getDate() + ", " + dt.getFullYear());
        $('#time').html((dt.getHours() > 12 ? (dt.getHours() - 12) : dt.getHours()).toString() + ":" + ((dt.getMinutes() < 10 ? '0' : '').toString() + dt.getMinutes().toString()) + (dt.getHours() < 12 ? ' AM' : ' PM').toString());

        //CELSIUS TO FAHRENHEIT CONVERTER on Click
        var temp = 0;
        $('#fahrenheit').click(function() {
            $(this).css("color", "white");
            $('#celsius').css("color", "#b0bec5");
            $('#temperature').html(Math.round(temp * 1.8 + 32));
        });

        $('#celsius').click(function() {
            $(this).css("color", "white");
            $('#fahrenheit').css("color", "#b0bec5");
            $('#temperature').html(Math.round(temp));
        });

        //GEOLOCATION and WEATHER API//
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var myLatitude = parseFloat(Math.round(position.coords.latitude * 100) / 100).toFixed(2);
                var myLongitude = parseFloat(Math.round(position.coords.longitude * 100) / 100).toFixed(2);
                //var utcTime = Math.round(new Date().getTime()/1000.0);

                // $('.geo').html(position.coords.latitude + " " + position.coords.longitude);
                $.getJSON("http://api.openweathermap.org/data/2.5/weather?lat=" + myLatitude + "&lon=" + myLongitude + "&id=524901&appid=ca8c2c7970a09dc296d9b3cfc4d06940", function(json) {
                    $('#city').html(json.name + ", " + json.sys.country);
                    $('#weather-status').html(json.weather[0].main + " / " + json.weather[0].description);

                    //WEATHER CONDITIONS FOUND HERE: http://openweathermap.org/weather-conditions
                    switch (json.weather[0].main) {
                        case "Clouds":
                            $('.weather-icon').attr("src", "https://myleschuahiock.files.wordpress.com/2016/02/cloudy.png");
                            break;
                        case "Clear":
                            $('.weather-icon').attr("src", "https://myleschuahiock.files.wordpress.com/2016/02/sunny2.png");
                            break;
                        case "Thunderstorm":
                            $('.weather-icon').attr("src", "https://myleschuahiock.files.wordpress.com/2016/02/thunderstorm.png");
                            break;
                        case "Drizzle":
                            $('.weather-icon').attr("src", "https://myleschuahiock.files.wordpress.com/2016/02/drizzle.png");
                            break;
                        case "Rain":
                            $('.weather-icon').attr("src", "https://myleschuahiock.files.wordpress.com/2016/02/rain.png");
                            break;
                        case "Snow":
                            $('.weather-icon').attr("src", "https://myleschuahiock.files.wordpress.com/2016/02/snow.png");
                            break;
                        case "Extreme":
                            $('.weather-icon').attr("src", "https://myleschuahiock.files.wordpress.com/2016/02/warning.png");
                            break;
                    }
                    temp = (json.main.temp - 273);
                    $('#temperature').html(Math.round(temp));
                    $('.windspeed').html(json.wind.speed + " Km/h")
                    $('.humidity').html(json.main.humidity + " %");
                    $('.pressure').html(json.main.pressure + " hPa");
                    var sunriseUTC = json.sys.sunrise * 1000;
                    var sunsetUTC = json.sys.sunset * 1000;
                    var sunriseDt = new Date(sunriseUTC);
                    var sunsetDt = new Date(sunsetUTC);
                    $('.sunrise-time').html((sunriseDt.getHours() > 12 ? (sunriseDt.getHours() - 12) : sunriseDt.getHours()).toString() + ":" + ((sunriseDt.getMinutes() < 10 ? '0' : '').toString() + sunriseDt.getMinutes().toString()) + (sunriseDt.getHours() < 12 ? ' AM' : ' PM').toString());
                    $('.sunset-time').html((sunsetDt.getHours() > 12 ? (sunsetDt.getHours() - 12) : sunsetDt.getHours()).toString() + ":" + ((sunsetDt.getMinutes() < 10 ? '0' : '').toString() + sunsetDt.getMinutes().toString()) + (sunsetDt.getHours() < 12 ? ' AM' : ' PM').toString());
                    // $('.sunrise-time').html(json.sys.sunrise);
                    // $('.sunset-time').html(json.sys.sunset);
                });

            });
        } else {
            $("#city").html("Please turn on Geolocator on Browser.")
        }
    });
</script>