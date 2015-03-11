/*
 * jQuery UI addresspicker @VERSION
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Progressbar
 *
 * Depends:
 *   jquery.ui.core.js
 *   jquery.ui.widget.js
 *   jquery.ui.autocomplete.js
 *   
 */


//En cas de mise à jour de plugin, ajouter la gestion des adresses et CP

(function( $, undefined ) {

    $.widget( "ui.addresspicker", {
        options: {
            appendAddressString: "",
            mapOptions: {
                zoom: 5, 
                center: new google.maps.LatLng(48.113475800,-1.675708055), 
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            },
            elements: {
                map: false,
                lat: false,
                lng: false,
                route: false,
                postal_code: false,
                locality: false,
                country: false
            },
            draggableMarker: true
        },

        marker: function() {
            return this.gmarker;
        },
	
        map: function() {
            return this.gmap;
        },

        updatePosition: function() {
            this._updatePosition(this.gmarker.getPosition());
        },
  
        reloadPosition: function() {
            this.gmarker.setVisible(true);
            this.gmarker.setPosition(new google.maps.LatLng(this.lat.val(), this.lng.val()));
            this.gmap.setCenter(this.gmarker.getPosition());
        },
  
        selected: function() {
            return this.selectedResult;
        },
  
        _create: function() {
            this.geocoder = new google.maps.Geocoder();
            this.element.autocomplete({
                source: $.proxy(this._geocode, this),  
                focus:  $.proxy(this._focusAddress, this),
                select: $.proxy(this._selectAddress, this)
            });
		
            this.lat      = $(this.options.elements.lat);
            this.lng      = $(this.options.elements.lng);
            this.route = $(this.options.elements.route);
            this.locality = $(this.options.elements.locality);
            this.postal_code = $(this.options.elements.postal_code);
            this.country  = $(this.options.elements.country);
            if (this.options.elements.map) {
                this.mapElement = $(this.options.elements.map);
                this._initMap();
            }
        },

        _initMap: function() {
            if (this.lat && this.lat.val() && this.lat.val() != 0) {
                this.options.mapOptions.center = new google.maps.LatLng(this.lat.val(), this.lng.val());
            }

            this.gmap = new google.maps.Map(this.mapElement[0], this.options.mapOptions);
            this.gmarker = new google.maps.Marker({
                position: this.options.mapOptions.center, 
                map:this.gmap, 
                draggable: this.options.draggableMarker
            });
            google.maps.event.addListener(this.gmarker, 'dragend', $.proxy(this._markerMoved, this));
            this.gmarker.setVisible(false);
        },
  
        _updatePosition: function(location) {
            if (this.lat) {
                this.lat.val(location.lat());
            }
            if (this.lng) {
                this.lng.val(location.lng());
            }
        },
        _reverseGeocode: function(location) {
            var latlng = new google.maps.LatLng(location.lat(), location.lng()), self = this;
            this.geocoder.geocode({
                'latLng': latlng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        results[i].label =  results[i].formatted_address;
                    };
                } 
                var address = results[0];
                
                if (self._findInfo(address, 'route')) {
                    if(self._findInfo(address, 'street_number')){
                        self.route.val(self._findInfo(address, 'street_number') +" "+ self._findInfo(address, 'route'));
                    }else{
                        self.route.val(self._findInfo(address, 'route'));

                    }
                }
                if (self.locality) {
                    self.locality.val(self._findInfo(address, 'locality'));
                }
                if (self.postal_code) {
                    self.postal_code.val(self._findInfo(address, 'postal_code'));
                }
            }
        
            );
        },
  
        _markerMoved: function() {
            this._updatePosition(this.gmarker.getPosition());
            this._reverseGeocode(this.gmarker.getPosition());
        },
  
        // Autocomplete source method: fill its suggests with google geocoder results
        _geocode: function(request, response) {
            var address = request.term, self = this;
            this.geocoder.geocode( {
                'address': address + this.options.appendAddressString
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        results[i].label =  results[i].formatted_address;
                    };
                } 
                response(results);
            })
        },

  
        _findInfo: function(result, type) {
            for (var i = 0; i < result.address_components.length; i++) {
                var component = result.address_components[i];
                if (component.types.indexOf(type) !=-1) {
                    return component.long_name;
                }
            }
            return false;
        },
  
        _focusAddress: function(event, ui) {
            var address = ui.item;
            if (!address) {
                return;
            }
    
            if (this.gmarker) {
                this.gmarker.setPosition(address.geometry.location);
                this.gmarker.setVisible(true);

                this.gmap.fitBounds(address.geometry.viewport);
            }
            this._updatePosition(address.geometry.location);
    

            if (this._findInfo(address, 'route')) {
                if(this._findInfo(address, 'street_number')){
                    this.route.val(this._findInfo(address, 'street_number') +" "+ this._findInfo(address, 'route'));
                }else{
                    this.route.val(this._findInfo(address, 'route'));

                }
            }
            
            if (this.postal_code) {
                this.postal_code.val(this._findInfo(address, 'postal_code'));
            }
            if (this.locality) {
                this.locality.val(this._findInfo(address, 'locality'));
            }
            if (this.country) {
                this.country.val(this._findInfo(address, 'country'));
            }
        },
  
        _selectAddress: function(event, ui) {
            this.selectedResult = ui.item;
        }
    });

    $.extend( $.ui.addresspicker, {
        version: "@VERSION"
    });


    // make IE think it doesn't suck
    if(!Array.indexOf){
        Array.prototype.indexOf = function(obj){
            for(var i=0; i<this.length; i++){
                if(this[i]==obj){
                    return i;
                }
            }
            return -1;
        }
    }

})( jQuery );
