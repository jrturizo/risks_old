

// Funciones para sliderbar --------------------------------------------------	


		var keypressSlider = document.getElementById('barra-rango-dias'),
		input = document.getElementById('campo-rango-dias');

		noUiSlider.create(keypressSlider, {
			start: 0,
			step: 5,
			connect: 'lower',

			range: {
				'min': [0],
				'25%': [50,5],
				'50%': [100,5],
				'75%': [150,5],
				'max': 200
			},
			pips: {
            	mode: 'range',
            	density: 2.5,
				prefix: 'd',
        	},


		});

		keypressSlider.noUiSlider.on('update', function( values, handle ) {
			input.value = values[handle];
		});

		input.addEventListener('change', function(){
			keypressSlider.noUiSlider.set([null, this.value]);
		});


		// Listen to keydown events on the input field.
		input.addEventListener('keydown', function( e ) {

			// Convert the string to a number.
			var value = Number( keypressSlider.noUiSlider.get() ),
				sliderStep = keypressSlider.noUiSlider.steps()

			// Select the stepping for the first handle.
			sliderStep = sliderStep[0];

			// 13 is enter,
			// 38 is key up,
			// 40 is key down.
			switch ( e.which ) {
				case 13:
					keypressSlider.noUiSlider.set(this.value);
					break;
				case 38:
					keypressSlider.noUiSlider.set( value + sliderStep[1] );
					break;
				case 40:
					keypressSlider.noUiSlider.set( value - sliderStep[0] );
					break;
			}
		});
