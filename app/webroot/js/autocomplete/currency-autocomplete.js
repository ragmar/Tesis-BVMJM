$(function(){
  
// setup autocomplete function pulling from authors[] array
if (typeof authors != "undefined") {
  $('#100a').autocomplete({
    lookup: authors,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Autor:</strong> ' + suggestion.value + ' <br> <strong>Autor:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
      
      	var tmp_100 = "";

		if ($('#100a').val().length > 0) {
			tmp_100 = tmp_100 + '^a' + $('#100a').val();
		}

		if ($('#100d').val().length > 0) {
			tmp_100 = tmp_100 + '^d' + $('#100d').val();
		}
		
		if (tmp_100.length > 0) {
			$("#100").val($("#100i1").val() + $("#100i2").val() + tmp_100);
			$("#l-100").html($("#100i1").val() + $("#100i2").val() + tmp_100);
		} else {
			$("#100").val('');
			$("#l-100").html('&nbsp;');
		}
    }
  });
}
  
//setup autocomplete function pulling from titles[] array
if (typeof titles != "undefined") {
  $('#245a').autocomplete({
    lookup: titles,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Título:</strong> ' + suggestion.value + ' <br> <strong>Título:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
      
      	var tmp_245 = "";

		if ($('#245a').val().length > 0) {
			tmp_245 = tmp_245 + '^a' + $('#245a').val();
		}

		if ($('#245b').val().length > 0) {
			tmp_245 = tmp_245 + '^b' + $('#245b').val();
		}

		if ($('#245c').val().length > 0) {
			tmp_245 = tmp_245 + '^c' + $('#245c').val();
		}

		if ($('#245h').val().length > 0) {
			tmp_245 = tmp_245 + '^h' + $('#245h').val();
		}
		
		if (tmp_245.length > 0) {
			$("#245").val($("#245i1").val() + $("#245i2").val() + tmp_245);
			$("#l-245").html($("#245i1").val() + $("#245i2").val() + tmp_245);
		} else {
			$("#245").val('');
			$("#l-245").html('&nbsp;');
		}
    }
  });
}

//setup autocomplete function pulling from places[] array
if (typeof places != "undefined") {
  $('#260a').autocomplete({
    lookup: places,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Lugar:</strong> ' + suggestion.value + ' <br> <strong>Lugar:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
      
      	var tmp_260 = "";

		if ($('#260a').val().length > 0) {
			tmp_260 = tmp_260 + '^a' + $('#260a').val();
		}

		if ($('#260b').val().length > 0) {
			tmp_260 = tmp_260 + '^b' + $('#260b').val();
		}

		if ($('#260c').val().length > 0) {
			tmp_260 = tmp_260 + '^c' + $('#260c').val();
		}
		
		if (tmp_260.length > 0) {
			$("#260").val('##' + tmp_260);
			$("#l-260").html('##' + tmp_260);
		} else {
			$("#260").val('');
			$("#l-260").html('&nbsp;');
		}
    }
  });
}

//setup autocomplete function pulling from editors[] array
if (typeof editors != "undefined") {
  $('#260b').autocomplete({
	    lookup: editors,
	    onSelect: function (suggestion) {
	      var thehtml = '<strong>Editor:</strong> ' + suggestion.value + ' <br> <strong>Editor:</strong> ' + suggestion.data;
	      $('#outputcontent').html(thehtml);
	      
	      	var tmp_260 = "";

			if ($('#260a').val().length > 0) {
				tmp_260 = tmp_260 + '^a' + $('#260a').val();
			}

			if ($('#260b').val().length > 0) {
				tmp_260 = tmp_260 + '^b' + $('#260b').val();
			}

			if ($('#260c').val().length > 0) {
				tmp_260 = tmp_260 + '^c' + $('#260c').val();
			}
			
			if (tmp_260.length > 0) {
				$("#260").val('##' + tmp_260);
				$("#l-260").html('##' + tmp_260);
			} else {
				$("#260").val('');
				$("#l-260").html('&nbsp;');
			}
	    }
  });
}

//setup autocomplete function pulling from years[] array
if (typeof years != "undefined") {
  $('#260c').autocomplete({
	    lookup: years,
	    onSelect: function (suggestion) {
	      var thehtml = '<strong>Año:</strong> ' + suggestion.value + ' <br> <strong>Año:</strong> ' + suggestion.data;
	      $('#outputcontent').html(thehtml);
	      
	      	var tmp_260 = "";

			if ($('#260a').val().length > 0) {
				tmp_260 = tmp_260 + '^a' + $('#260a').val();
			}

			if ($('#260b').val().length > 0) {
				tmp_260 = tmp_260 + '^b' + $('#260b').val();
			}

			if ($('#260c').val().length > 0) {
				tmp_260 = tmp_260 + '^c' + $('#260c').val();
			}
			
			if (tmp_260.length > 0) {
				$("#260").val('##' + tmp_260);
				$("#l-260").html('##' + tmp_260);
			} else {
				$("#260").val('');
				$("#l-260").html('&nbsp;');
			}
	    }
  });
}

//setup autocomplete function pulling from publications[] array
if (typeof publications != "undefined") {
  $('#362a').autocomplete({
	    lookup: publications,
	    onSelect: function (suggestion) {
	      var thehtml = '<strong>Publicación:</strong> ' + suggestion.value + ' <br> <strong>Publicación:</strong> ' + suggestion.data;
	      $('#outputcontent').html(thehtml);
	      
	      	var tmp_362 = "";

			if ($('#362a').val().length > 0) {
				tmp_362 = tmp_362 + '^a' + $('#362a').val();
			}
			
			if (tmp_362.length > 0) {
				$("#362").val(tmp_362);
				$("#l-362").html(tmp_362);
			} else {
				$("#362").val('');
				$("#l-362").html('&nbsp;');
			}
	    }
  });
}

//setup autocomplete function pulling from matters[] array
if (typeof matters != "undefined") {
  $('#653a').autocomplete({
	    lookup: matters,
	    onSelect: function (suggestion) {
	      var thehtml = '<strong>Materia:</strong> ' + suggestion.value + ' <br> <strong>Materia:</strong> ' + suggestion.data;
	      $('#outputcontent').html(thehtml);
	      
	      	var tmp_653 = "";

			if ($('#653a').val().length > 0) {
				tmp_653 = tmp_653 + '^a' + $('#653a').val();
			}
			
			if (tmp_653.length > 0) {
				$("#653").val($("#653i1").val() + $("#653i2").val() + tmp_653);
				$("#l-653").html($("#653i1").val() + $("#653i2").val() + tmp_653);
			} else {
				$("#653").val('');
				$("#l-653").html('&nbsp;');
			}
	    }
  });
}
});