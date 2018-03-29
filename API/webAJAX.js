function addExperience(){
		var name=$("#newName").val();
	    var expDate=$("#newDate").val();
		var hours=$("#newHours").val();
		var notes=$("#newNotes").val();

	$('#newName').val("");
	$('#newDate').val("");
	$('#newHours').val("");
	$('#newNotes').val("");

    jQuery.ajax({
        url: '/API/addExperience.php',
        type: "POST",
        data: {name:name, expDate:expDate, hours:hours, notes:notes},
		success: function(resp){
			if(resp=="invalid session"){
				//Kick them off to the login page.
			}
			else if(resp!="fail whale :("){
				var obj = $.parseJSON(resp);
				$("#noActivity").hide();
				$("#recent tr").first().before('<tr><td><p id="e' + obj.id + '" class="header">' + obj.name + '</strong></p><p>' + obj.expDate + '</p><p>' + obj.hours + ' hours</p></td></tr>');
				var numHours = parseFloat($("#hoursLabel").html()) + parseFloat(obj.hours);
				$("#hoursLabel").html(numHours);
				var goal = parseFloat($(".progress-bar").attr("aria-valuemax"));
				$(".progress-bar").attr("style", "width:"+100*numHours/goal+"%");
			}
			else {
				alert("addContact API call fail whaled :(");
			}
		}
    });
}
