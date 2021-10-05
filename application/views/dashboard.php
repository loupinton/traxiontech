<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form style="margin-top: 100px;" class="city-form">
                <div class="form-group">
                    <label for="exampleInputEmail1">City Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="city-name" required
                        placeholder="Ex: New York">
                    <small class="form-text text-muted form-error-message">We'll display the current weather of the
                        city.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
            <div id="weather-area">
                <div class="forcast">
                    <div id="city-forecast">
                        <h2 class="text-center"><span class="city-name"><span></h2>
                        <p class="weather-descr col-xs-12"></p>
                        <p class="temp col-xs-12"></p>
                        <p class="pressure col-xs-12"></p>
                        <p class="wind-spd col-xs-12"></p>
                    </div>
                </div>
                <div class="loader">
                    <img
                        src="<?=base_url("assets/img/loader.gif")?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id='map' style='width: 100%; height: 300px;'></div>
            <img src="<?=base_url("assets/img/pin.png")?>"
                class="map-marker">
        </div>
    </div>
</div>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

<script>
    mapboxgl.accessToken =
        'pk.eyJ1IjoibG91cGludG9uIiwiYSI6ImNrbmFsc2l4cjFpbmEyd3FwZzY5cm1mOXcifQ.ZvQyaXnUoz0NRFiT-vpwWQ';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11'
    });
</script>
<?php include viewPath('includes/footer');
