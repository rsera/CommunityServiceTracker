function addExperience(more){
	if(more)
	{
		var name=$("#newName").val();
	    var expDate=$("#newDate").val();
		var hours=$("#newHours").val();
		var notes=$("#newNotes").val();
	}
	else
	{
		var name=$("#newName").val();
	    var expDate=$("#newDate").val();
		var hours=$("#newHours").val();
		var notes="";
	}

	$('#newName').val("");
	$('#newDate').val("");
	$('#newHours').val("");
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
				$("#recent div").first().before('<div id="e' + obj.id + '" class="panel"><div class="name">' + obj.name + '</div><div class="date">' + obj.expDate + '</div><div class="hours">' + obj.hours + ' hours</div></div>');
				var numHours = parseFloat($("#hoursLabel").html()) + parseFloat(obj.hours);
				$("#hoursLabel").html(numHours);
				$("#goalBar").attr("value", numHours);
			}
			else {
				alert("addContact API call fail whaled :(");
			}
		}
    });
}
