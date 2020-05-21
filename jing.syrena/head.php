<head>
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="lib/css/styleguide.css">
	<link rel="stylesheet" href="lib/css/gridsystem.css">
	<link rel="stylesheet" href="css/storetheme.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	

</head>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top
	</button>
	<header class="navbar">
		<div class="container display-flex">
			<div class="flex-stretch pad">
					<a href="index.php"><img class="logo" src="img/head/logo.png" alt="logo" style="padding-top: 5em; width:15%;cursor:pointer;"></a>
					
			</div>
			<nav class="nav">
				<!-- ul>li*3>a[href=#]>{Link} -->
				<ul class="display-flex">
					<!-- <li><a href="#"><img src="img/head/searchw1.png" alt="searchw" style=" width:55%;cursor:pointer;"></a></li> -->
					<li><a href="login.php"><img src="img/head/log1.png" alt="log" style=" width:55%;cursor:pointer;"></a></li>
					<li><a href="product_cart.php"><img src="img/head/cart1.png" alt="cart" style=" width:55%;cursor:pointer;"></a></a></li>
					<li><!-- <a href="#"> -->
	 				 <img class="menuimage" src="img/head/menuimage.png" id="main" style="cursor:pointer; width:55%;" onclick="openNav()"> 
					<!-- </a> --></li>
				</ul>
			</nav>
		</div>
		<div id="mySidenav" class="sidenav">
	    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	    	<a href="product_list.php">
	  			<button class="dropdown-btn" style="cursor:pointer;background-color: #4C7593;border-style: none;border-color: none;padding-left: 2em;">Store
		    	<i class="fa fa-caret-down"></i>
		  		</button>
		  	</a>
			<a href="about.php">
				<button class="dropdown-btn" style="cursor:pointer;background-color: #4C7593;border-style: none;border-color: none;padding-left: 2em;">About us
		    	<i class="fa fa-caret-down"></i>
		  	 	</button>
		  	</a>

		  	<a href="admin/index.php">
				<button class="dropdown-btn" style="cursor:pointer;background-color: #4C7593;border-style: none;border-color: none;padding-left: 2em;">Admin
		    	<i class="fa fa-caret-down"></i>
		  	 	</button>
			</a>
		  	<!-- <a href="#"><button class="dropdown-btn" style="cursor:pointer;background-color: #4C7593;border-style: none;border-color: none;padding-left: 2em;">Tropical Community
		    	<i class="fa fa-caret-down"></i>
		  	 </button>
		  	</a> -->
	</div>

	<script>
		// nav的大框架
	function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	  document.getElementById("main").style.marginRight = "250px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0)";
	  // document.header.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginRight= "0";
	  document.body.style.backgroundColor = "#4C7593";
	}

	// 下拉菜单

	var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
		  dropdown[i].addEventListener("click", function() {
		  this.classList.toggle("active");
		  var dropdownContent = this.nextElementSibling;
		  if (dropdownContent.style.display === "block") {
		  dropdownContent.style.display = "none";
		  } else {
		  dropdownContent.style.display = "block";
		  }
		  });
}
</script>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</header>
