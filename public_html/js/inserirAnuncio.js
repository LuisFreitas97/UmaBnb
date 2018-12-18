$( document ).ready(function() {
    drawMap("mapa",[32.648483, -16.906916]);

    $(window).keydown(function(event){

        if((event.keyCode == 13) && ($(event.target)[0]!=$("textarea")[0])) {

            event.preventDefault();

            return false;

        }

    });
    
    $("#file").change( function() {
       var file    = document.querySelector('#file').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
        var fileName =$('#file').val();
           //preview.src = reader.result;
           $("#images").append("<div class='containerImage'>"+
           "<img src='"+ reader.result+"' class='img-thumbnail' style='height:150; width:150'>"+
           "<button type='button' class='btn btn btn-danger bDeleteImg' onclick='eliminarImagem(this);'> X </button>"
           +"<input type='hidden' name='imagensPost[]' value='"+reader.result+"'>"
           +"</div>");
           document.getElementById('file').value=null;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
    });
            $("#morada").autocomplete({
                minLength: 0,
              source: function( request, response ) {
                $.ajax( {
                  url: "http://mapsearch.gosur.com/api/",
                  dataType: "json",
                  data: {
                    q: request.term
                  },
                  success: function( data ) {
                    var list = data.features;
                    list = list.filter((i) =>
                    {
                        return i.properties.state && i.properties.postcode && i.properties.state == "Madeira" && i.properties.country == "Portugal";
                    });
                    list = list.map(function(i) 
                    { 
                        return {            
                            value: i.properties.postcode + " | " + i.properties.name + " | " + i.properties.city,
                            coordinates: [ i.geometry.coordinates[1], i.geometry.coordinates[0] ]
                        }              
                    });
                    response(list);
                  }
                } );
              },
              minLength: 1,
              select: function( event, item ) {
                  if($("#latitude").length && $("#longitude").length)
                  {
                    $("#latitude").val(item.item.coordinates[0]);
                    $("#longitude").val(item.item.coordinates[1]);
                  }
                  $("#mapa").append("<input type='hidden' id='latitude' name='latitude' value='"+item.item.coordinates[0]+"'>");
                  $("#mapa").append("<input type='hidden' id='longitude' name='longitude' value='"+item.item.coordinates[1]+"'>");
                setMarker(item.item.coordinates);
              }
            } );
});

function eliminarImagem(e){
    e.parentNode.parentNode.removeChild(e.parentNode);
}