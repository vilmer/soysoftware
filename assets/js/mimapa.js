
    $('#map')
      .gmap3({
        zoom: 16,
        center: [-1.0466482,-78.5905324],
        mapTypeId : google.maps.MapTypeId.ROADMAP
      })
       .marker([
        {
          position:[-1.043968, -78.590416],
        }

      ])
       .on('click', function (marker) {
        alertify.success('PARQUE CENTRAL SALCEDO,:)');
      })
       .marker([
        {
          position:[-1.043850, -78.588864]
        }
      ])
       .on('click', function (marker) {
       alertify.success('MERCADO CENTRAL SALCEDO,:)');
      })
       .marker([
        {
          position:[-1.047523, -78.588298]
        }
      ])
       .on('click', function (marker) {
       alertify.success('PLAZOLETA SAN ANTONIO,:)');
      })
       .marker([
        {
          position:[-1.049557, -78.587754]
        }
      ])
       .on('click', function (marker) {
       alertify.success('SOYSOFTWARE,:)');
      })
       .route({
        origin:[-1.044074, -78.591130],
        destination:[-1.049507, -78.587457],
        travelMode: google.maps.DirectionsTravelMode.DRIVING
      })
      .directionsrenderer(function (results) {
        if (results) {
          return {
            panel: "#box",
            directions: results
          }
        }
      })
      .polyline({
        strokeColor: "#FF0000",
        strokeOpacity: 1.0,
        strokeWeight: 2,
        path: [
          [-1.043968, -78.590416],
          [-1.043850, -78.588864],
          [-1.047005, -78.588439],
          [-1.047523, -78.588298],
          [-1.048418, -78.587830],
          [-1.048505, -78.587929],
          [-1.048897, -78.587669],
          [-1.049507, -78.587457]
        ]
      })
      .fit();