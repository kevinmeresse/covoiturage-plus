sfEasyGMapPlugin
================

The sfEasyGMap plugin provides helpers and an objet-oriented PHP
abstraction to the Google Maps API to ease the process of adding a
Google Map and customising it in your symfony projects.

Installation
------------

  * Install the plugin

        $ symfony plugin:install sfEasyGMapPlugin (Not tested)

    or in your plugins directory via GIT (the SVN version is not updated anymore):

        $ git clone https://github.com/theodo/sfEasyGMapPlugin.git

    When using the GIT install, remember to enable the plugin in your ProjectConfiguration.class.php

  * Optional: enable the sample module in your `settings.yml`, sfEasyGMapPlugin

            [php]
            all:
              .settings:
                enabled_modules:      [default, sfEasyGMapPlugin]

  * Google API keys: add the following lines in your `app.yml` file

            [php]
            all:
              google_maps_api:
                keys:
                  www.yourdomain.com: 'google_key1'
                  localhost:          'google_key2'
                  default:            'google_key3'

    Keys are obtained here: http://code.google.com/intl/fr/apis/maps/signup.html

  * Clear your cache

        $ php symfony cc


Examples
--------

  All samples are available in the sfEasyGMapPlugin module of the plugin (/sfEasyGMapPlugin/index)

  IMPORTANT ! The JavaScript in the samples will not work unless you put the js files in your web directory.

        $ ln -s ../plugins/sfEasyGMapPlugin/web web/sfEasyGMapPlugin

        or use the symfony command :
        $ php symfony plugin:publish-assets

  * Sample 1

    Add some markers on a map, using longitudes and latitudes

    * In the action:

            $this->gMap = new GMap();
            $this->gMap->setZoom(0);
            $this->gMap->setCenter(0, 0);
            $this->gMap->addMarker(new GMapMarker(51.245475,6.821373));
            $this->gMap->addMarker(new GMapMarker(46.262248,6.115969));

    * In the template:

            <?php use_helper('Javascript','GMap') ?>

            <?php include_map($gMap,array('width'=>'512px','height'=>'400px')); ?>

            <!-- Javascript included at the bottom of the page -->
            <?php include_map_javascript($gMap); ?>


  * Sample 2

    Geocode some addresses and open an info window if the user clicks on a marker

    * In the action:

            $this->gMap = new GMap();

            // some places in the world
            $addresses = array(
              'Graf-Recke-Strasse 220 - 40237 Düsseldorf',
              'Avenue des sports 01210 FERNEY-VOLTAIRE - FRANCE',
              '44 boulevard Saint-Michel, Paris',
              'Route Saclay 91120 Palaiseau',
              'Rämistrasse 101, Zürich'
            );

            foreach ($addresses as $address)
            {
              $geocoded_address = $this->gMap->geocode($address);
              $gMapMarker = new GMapMarker($geocoded_address->getLat(),$geocoded_address->getLng());
              $gMapMarker->addHtmlInfoWindow('<b>Address:</b><br />'.$address);
              $this->gMap->addMarker($gMapMarker);
            }

    * In the template:

            <?php use_helper('Javascript','GMap') ?>

            <?php include_map($gMap,array('width'=>'512px','height'=>'400px')); ?>

            <!-- Javascript included at the bottom of the page -->
            <?php include_map_javascript($gMap); ?>



TODO
----

  * correct javascript files that suppose that the map's javascript object is called 'map'
  * add support for EncodedLines
  * add support for custom zoom and move controls
  * add support for Directions
  * add support for Labeled markers
