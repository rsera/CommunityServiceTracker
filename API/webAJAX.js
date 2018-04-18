function addExperience(){
		var name=$("#newName").val();
	    var expDate=$("#newDate").val();
		var hours=$("#newHours").val();
		var notes=$("#newNotes").val();

	// do validation
	if (name=="" || expDate=="" || hours==""){
		//alert("fields are required");
		$("#validationMsg").removeClass("defaultHidden");
		return;
	}
	else{
		if(!$("#validationMsg").is(":hidden"))
			$("#validationMsg").addClass("defaultHidden");
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

				if(numHours >= goal)
					$("#goalCongrats").dialog();
			}
			else {
				alert("addContact API call fail whaled :(");
			}
		}
    });
}

function updateGoal(){
	if($("#newGoal").val()!="")
		var goal=$("#newGoal").val();
	else if ($("#newGoalCongrats").val()!="")
		var goal=$("#newGoalCongrats").val();

	// do validation
	if (goal==""){
		alert("fields are required");
		return;
	}
	else if (isNaN(goal)){
		alert("please enter a number");
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
				$("#goalLabel").html(obj.goal);
				$(".progress-bar").attr("aria-valuemax", obj.goal);
				$(".progress-bar").attr("style", "width:"+100*parseFloat($("#hoursLabel").html())/obj.goal+"%");

				var numHours = parseFloat($("#hoursLabel").html());
				if(numHours >= obj.goal)
					$("#goalCongrats").dialog();
			}
			else {
				alert("addContact API call fail whaled :(");
			}
		}
    });
}

function approveOrg(id){
	jQuery.ajax({
        url: '/API/approveOrg.php',
        type: "POST",
		data: {orgID:id},
		success: function(resp){
			if(resp=="invalid session"){
				//Kick them off to the login page.
			}
			else if(resp.substr(0,10)!="fail"){
				var obj = $.parseJSON(resp);
				var oID = "#o" + obj.id;
				$(oID).remove();
			}
			else {
				alert("approveOrg API call fail whaled :(");
			}
		}
    });
}

function declineOrg(id){
	jQuery.ajax({
        url: '/API/deleteOrg.php',
        type: "POST",
		data: {orgID:id},
		success: function(resp){
			if(resp=="invalid session"){
				//Kick them off to the login page.
			}
			else if(resp.substr(0,10)!="fail"){
				var obj = $.parseJSON(resp);
				var oID = "#o" + obj.id;
				$(oID).remove();
			}
			else {
				alert("deleteOrg API call fail whaled :(");
			}
		}
    });
}
