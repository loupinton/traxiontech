$(document).on('submit', 'form.city-form', function(event) {
    var empty_flds = 0;
    $("form.city-form input").each(function() {
        if (!$.trim($(this).val())) {
            empty_flds++;
        }
    });
    if (empty_flds == 0) {
        event.preventDefault();
        $(".forcast").hide();
        $(".loader").fadeIn();

        var apiKey = "3749477c8a560e12e5ee135e88fee1b7";
        var city_name = $("form.city-form input[name='city-name']").val();

        $.getJSON("https://api.openweathermap.org/data/2.5/weather?q=" + city_name + "&appid=" +
            apiKey,
            function(data) {
                console.log(data);
                $(".loader").hide();
                $(".forcast").fadeIn();
                $("#weather-area h2 span.city-name").html("Weather for: " + city_name + " &#40;" + data["sys"]
                    ["country"] + "&#41; " + "has " + data["weather"][0]["description"]);
                $("#weather-area  .temp").html("Temp: " + data["main"]["temp"]);
                $("#weather-area  .pressure").html("Pressure: " + data["main"]["pressure"] +
                    " mBar");
                $("#weather-area .wind-spd").html("Wind Speed: " + data["wind"]["speed"] +
                    " m/s");
                map.setCenter([data["coord"]["lon"], data["coord"]["lat"]]);
                $(".map-marker").show();
                $("form .form-error-message").html("We'll display the current weather of the city.");
            }).fail(function(jqXHR, textStatus, errorThrown) {
            $("form .form-error-message").html("<span style='color:red;'>Request error: Please double check your city name.</span>");
            $(".map-marker").hide();
            $(".loader").hide();
        });
    }
});