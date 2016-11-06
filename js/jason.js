function llenarTabla(tablaEventoJson) {
	tablaEventoCocinero = JSON.parse(tablaEventoJson);
    var i;

		//var out = "<table class=\"table\"><thead><tr>" +
    var out = "<h2 align=\"center\">Eventos disponibles</h2><br/><div class=\"table-responsive\" style=\"overflow-x:auto;\"><table class=\"table\"><thead><tr>" +
          "<th class=\"text-center\"><span>Nombre comida</span></th>" +
          "<th class=\"text-center\"><span>Fecha</span></th>" +
		  "<th class=\"text-center\"><span>Precio</span></th>" +
          "<th class=\"text-center\"><span>Nombre cocinero</span></th>" +
          "<th class=\"text-center\"><span>Cant Minima</span></th>" +
          "<th class=\"text-center\"><span>Cant Maxima</span></th>" +
        "</tr></thead><tbody>";

    for(i = 0; i < tablaEventoCocinero.length; i++) {
        out += "<tr><td class=\"text-center\">" +
		"<a href=\"detalleEvento.php?idevento=" + tablaEventoCocinero[i].idevento + "\">" + tablaEventoCocinero[i].nombreComida + "</a>"+
        "</td><td class=\"text-center\">" +
        tablaEventoCocinero[i].fecha +
        "</td><td class=\"text-center\">" +
        tablaEventoCocinero[i].precio +
        "</td><td class=\"text-center\">" +
        "<a href=\"detalleCocinero.php?idcocinero=" + tablaEventoCocinero[i].idcocinero + "\">" + tablaEventoCocinero[i].nombre +
        "</td><td class=\"text-center\">" +
        tablaEventoCocinero[i].cantminpersonas +
		"</td><td class=\"text-center\">" +
        tablaEventoCocinero[i].cantmaxpersonas +
        "</td></tr>";
    }
    // out += "</tbody></table>";
		out += "</tbody></table></div>";
    document.getElementById("latabla").innerHTML = out;
}
