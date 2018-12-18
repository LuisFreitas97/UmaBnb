function filtrarAnuncios(oEvent)
{
        var tipologia = $("#tipologia").val();
        var tipoAluguer = $("#tipoAluguer").val();
        var precoDe = $("#precoDe").val();
        var precoAte = $("#precoAte").val();
        var donoReside = $("#donoReside").val();
        var factura = $("#factura").val();
        var caucao = $("#caucao").val();
        var url = "/filtrarAnuncios/?";
        if (tipologia != 0)
        {
                url += "tipologia=" + tipologia + "&";
        }
        if (tipoAluguer != 0)
        {
                url += "tipoAluguer=" + tipoAluguer + "&";
        }
        if (precoDe)
        {
                url += "precoDe=" + precoDe + "&";
        }
        if (precoAte)
        {
                url += "precoAte=" + precoAte + "&";
        }
        if (donoReside != "")
        {
                url += "donoReside=" + donoReside + "&";
        }
        if (factura != "")
        {
                url += "factura=" + factura + "&";
        }
        if (caucao != "")
        {
                url += "caucao=" + caucao + "&";
        }
        $.ajax(
        {
                type: 'GET',
                url: url,
                success: function(data)
                {
                        $("#container").html("");
                        for (var i = 0; i < data.length; i++)
                        {
                                //                                $("#container").append("<a href='/anuncios/" + data[i].id + "'>" + "<div id='" + data[i].id + "' class='container shadow p-4 mb-4 bg-white'>" + "<div class='row'>" + "<div class='col-4'>" + "<img src='" + data[i].image + "' class='img-thumbnail'>" + "</div>" + "<div class='col-8'>" + "<h3> <b>" + data[i].title + "</b></h3>" + "<h5>" + data[i].address + "</h5>" + "<label>" + data[i].description + "</label>" + "</div>" + "</div>" + "</div>" + "</a>");
                                $("#container").append('<a href="/anuncios/' + data[i].id + '">' + '<div id="' + data[i].id + '" class="card">' + '<img src="' + data[i].image + '" class="ad-thumbnail" />' + '<h3> <b>' + data[i].title + '</b></h3>' + '<h5>' + data[i].address + '</h5>' + '<label>' + data[i].description + '</label>' + '</div>' + '</a>');
                        }
                },
                error: function()
                {
                        alert("erro");
                }
        });
}