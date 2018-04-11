function addExperience(){
		var name=$("#newName").val();
	    var expDate=$("#newDate").val();
		var hours=$("#newHours").val();
		var notes=$("#newNotes").val();

	// do validation
	if (name=="" || expDate==""){
		alert("fields are required");
		return;
	}

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
			else if(resp.substr(0,10)!="fail"){
				var obj = $.parseJSON(resp);
				$("#noActivity").hide();
				$("#recent tr").first().before('<tr id="e' + obj.id + '" data-note="' + obj.notes + '"><td><p class="header">' + obj.name + '</strong></p><p>' + obj.expDate + '</p><p>' + obj.hours + ' hours</p><p>' + obj.notes + '</p></td></tr>');
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

function updateGoal(){
		var goal=$("#newGoal").val();

	// do validation
	if (goal==""){
		alert("fields are required");
		return;
	}

    jQuery.ajax({
        url: '/API/updateGoal.php',
        type: "POST",
        data: {goal:goal},
		success: function(resp){
			if(resp=="invalid session"){
				//Kick them off to the login page.
			}
			else if(resp.substr(0,10)!="fail"){
				var obj = $.parseJSON(resp);
				$("#hoursLabel").html(numHours);
				$(".progress-bar").attr("style", "width:"+100*numHours/goal+"%");
			}
			else {
				alert("addContact API call fail whaled :(");
			}
		}
    });
}
/*
function searchExperiences(){
	jQuery.ajax({
        url: '/API/searchExperience.php',
        type: "GET",
        data: {searchTerm:searchTerm},
		success: function(resp){
			if(resp!="fail whale :("){
				$('#searchBox').val("");
				var obj = $.parseJSON(resp);
				$('.contact').hide();
				for(var i=0; i < obj.length; i++){
					$('#'+obj[i].cid).show();
				}
			}
		}
	});
}*/
