
function getStyles(mapStyle){
	
	var styles;
	
	if(mapStyle === 'black_and_white'){
		styles = [
			{
				"featureType": "road",
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "on"
					}
				]
			},
			{
				"featureType": "poi",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "administrative",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"weight": 1
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "geometry.stroke",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"weight": 0.8
					}
				]
			},
			{
				"featureType": "landscape",
				"stylers": [
					{
						"color": "#ffffff"
					}
				]
			},
			{
				"featureType": "water",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "transit",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"elementType": "labels.text",
				"stylers": [
					{
						"visibility": "on"
					}
				]
			},
			{
				"elementType": "labels.text.stroke",
				"stylers": [
					{
						"color": "#ffffff"
					}
				]
			},
			{
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#000000"
					}
				]
			},
			{
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "on"
					}
				]
			}
		]
	}else if(mapStyle === 'paper'){
		styles = [
			{
				"featureType": "administrative",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					},
					{
						"hue": "#0066ff"
					},
					{
						"saturation": 74
					},
					{
						"lightness": 100
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					},
					{
						"weight": 0.6
					},
					{
						"saturation": -85
					},
					{
						"lightness": 61
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry",
				"stylers": [
					{
						"visibility": "on"
					}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "on"
					}
				]
			},
			{
				"featureType": "transit",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					},
					{
						"color": "#5f94ff"
					},
					{
						"lightness": 26
					},
					{
						"gamma": 5.86
					}
				]
			}
		]
	}else if(mapStyle === 'pale_down'){
		styles = [
			{
				"featureType": "administrative",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"lightness": 33
					}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "all",
				"stylers": [
					{
						"color": "#f2e5d4"
					}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#c5dac6"
					}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"lightness": 20
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "all",
				"stylers": [
					{
						"lightness": 20
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#c5c6c6"
					}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#e4d7c6"
					}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#fbfaf7"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#acbcc9"
					}
				]
			}
		]
	}else if(mapStyle === 'subtle_grayscale'){
		styles = [
			{
				"featureType": "administrative",
				"elementType": "all",
				"stylers": [
					{
						"saturation": "-100"
					}
				]
			},
			{
				"featureType": "administrative.province",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "all",
				"stylers": [
					{
						"saturation": -100
					},
					{
						"lightness": 65
					},
					{
						"visibility": "on"
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "all",
				"stylers": [
					{
						"saturation": -100
					},
					{
						"lightness": "50"
					},
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "all",
				"stylers": [
					{
						"saturation": "-100"
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "all",
				"stylers": [
					{
						"lightness": "30"
					}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "all",
				"stylers": [
					{
						"lightness": "40"
					}
				]
			},
			{
				"featureType": "transit",
				"elementType": "all",
				"stylers": [
					{
						"saturation": -100
					},
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
					{
						"hue": "#ffff00"
					},
					{
						"lightness": -25
					},
					{
						"saturation": -97
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels",
				"stylers": [
					{
						"lightness": -25
					},
					{
						"saturation": -100
					}
				]
			}
		]
	}else if(mapStyle === 'shades_of_grey'){
		styles = [
			{
				"featureType": "all",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"saturation": 36
					},
					{
						"color": "#000000"
					},
					{
						"lightness": 40
					}
				]
			},
			{
				"featureType": "all",
				"elementType": "labels.text.stroke",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#000000"
					},
					{
						"lightness": 16
					}
				]
			},
			{
				"featureType": "all",
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 20
					}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "geometry.stroke",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 17
					},
					{
						"weight": 1.2
					}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 20
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 21
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 17
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry.stroke",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 29
					},
					{
						"weight": 0.2
					}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 18
					}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 16
					}
				]
			},
			{
				"featureType": "transit",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 19
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 17
					}
				]
			}
		]
	}else{
		styles=null;
	}
	
	return styles;
}
	
