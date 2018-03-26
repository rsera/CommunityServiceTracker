<?php include "header.php";
	if(!isset($_SESSION['UserID'])){
		header("location: /");
	}
?><!DOCTYPE html><html>
	<head>
		<!-- <script src="jquery-3.2.1.min.js"></script> -->
		<!-- <script src="/API/APIfront.js"></script> -->
		<!--- Styles will be moved off into their own css file --->
		<style>
			body{margin:0px;width:100%;}
			.left{float:left;}
			.staticLeft{left:0px;}
			.staticRight{right:0px;}
			.right{float:right;}
			.clearBoth{clear:both;}

			.panel{background:#9ad3a6;color:#FFF;margin-top:20px;text-align:center;padding:30px;}
			.panel .panel{background:#F5F5F5;color:#333;margin-top:5px;border-radius:5px;}
			.panel .panel:first-of-type{margin-top:0px;}

			#ribbon{height:40px;width:100%;position:fixed;margin-top:0px;border-bottom:20px solid #F5F5F5;background:#9ad3a6;padding:0px;}
			#ribbon span{padding:5px;}
			#goalText{margin-top:20px;color:#333;}
			#recent{padding-top:60px;}

			body{background:#F5F5F5}
			aside{margin-top:40px;position:fixed;width:30%;}
			main{width:calc(40% - 60px);margin-left:calc(30% + 30px);padding-top:30px;}
			progress{width:100%;height:60px; border-radius:5px;}
			h2{background:#76cb89;}


		</style>
	</head>
	<body>
		<header id="ribbon">
			<span class="image left">VTRAK</span>
			<span class="account right">D:</span>
		</header>
		<aside class="staticLeft">
			<?php
				$thisUserID = $_SESSION['UserID'];
				$sql = "SELECT goal, IFNULL(SUM(hours),0) AS hours FROM user LEFT JOIN experiences on user.userID = experiences.userID WHERE user.userID = ".$thisUserID. " GROUP BY user.userID";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result)){
						echo '<div id="goalText"><span class="left">Goal</span><span class="right"><span id="hoursLabel">' . $row['hours'] . '</span> of <span id="goalLabel">' . $row['goal'] . '</span></span></div>';
						echo '<progress id="goalBar" value="' . $row['hours'] . '" max="' . $row['goal'] . '"></progress>';
					}
				}
			?>

			<div class="panel">
			<div id="addNew" class="panel">
				<div class="name"><label>Name</label><input id="newName" type="text"></input></div>
				<div class="date"><label>Date</label><input id="newDate" type="date"></input></div>
				<div class="hours"><label>Hours</label><input id="newHours" type="number"></input></div>
				<div class="more"><input id="newMore" type="button" value="+" class="left"></input></div>
				<div class="submit"><input id="newSubmit" type="button" value="Submit" class="right"></input></div>
				<div class="clearBoth"></div>
			</div>
		</div>
		</aside>
		<aside class="staticRight">
			<h2 class="panel">You might like...</h2>
			<div id="recommendations" class="panel">
				<?php
					$thisUserID = $_SESSION['UserID'];
					$sql = "SELECT orgID, orgName, orgType, orgWebsite FROM organizations INNER JOIN user ON organizations.orgZip = user.userZip AND user.userID = ".$thisUserID;
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_assoc($result)){
							echo '<div id="o'. $row['orgID'] . '" class="panel"><div class="name">' . $row['orgName'] . '</div><div class="type">' . $row['orgType'] . '</div><div class="webaddress">' . $row['orgWebsite'] . '</div></div>';
						}
					}
				?>
			</div>
		</aside>
		<main id="history">
			<h2 class="panel">Recent Activity</h2>
			<div id="recent" class="panel">
				<?php
					$thisUserID = $_SESSION['UserID'];
					$sql = "SELECT experienceID, name, expDate, hours FROM experiences WHERE userID = ".$thisUserID ." ORDER BY expDate DESC";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_assoc($result)){
							echo '<div id="e' . $row['experienceID'] . '" class="panel"><div class="name">' . $row['name'] . '</div><div class="date">' . $row['expDate'] . '</div><div class="hours">' . $row['hours'] . ' hours</div></div>';
						}
					}
				?>
			</div>
		</main>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
			<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
			<script src="API/webAJAX.js"></script>

		<script>
			// When you click "submit" for new experiences, add the experience and updat the recent list
			$("#newSubmit").on("click",function(){addExperience(<?=$_SESSION['UserID']?>, false)});
			//$("#newSubmit").on("click",$("#addNew").val(""));

			// When you click on contacts, swap to the Read-Only form and show their info
			$(".contact").on("click",function(){viewContact(<?=$_SESSION['UserID']?>,this.id);});
			// When you click 'Add A New Contact', show the add contact section
			$("#AddContact").on("click",function(){
				if($("#addContactInfo").is(":hidden")){
					$(".togglePanel").toggleClass("defaultHidden");
				}
			});
			// When you click 'Delete Contact', remove the contact from the active page
			$("#DeleteContact").on("click",function(){
				if($("#addContactInfo").is(":hidden")){
					deleteContact(<?=$_SESSION['UserID']?>,$("#contactDisplay").attr("data-cid"))
				}
			});
			// When you click 'Save Contact', add the contact and display its info
			$(".addContactButton").on("click",function(){addContact(<?=$_SESSION['UserID']?>)});

			// When you click "search" it searches with what's in the box
			$("#searchButton").on("click",function(){searchContact(<?=$_SESSION['UserID']?>, $("#searchBox").val())});

			$('#myContacts h2').on("click",function(){$('#contactList button').not('.defaultHidden').show()});

			// Helper function for showing errors.
			function showError(str){
				$("#error").html(str).removeClass("defaultHidden");
				setTimeout(function(){$("#error").addClass("defaultHidden");},3000);
			}
		</script>
	</body>
</html>
