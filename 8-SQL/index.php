<div class="jumbotron" id="intro">
		<h1>Section 8 MySQL</h1>
		<img id="badge" src="..\resources\images\HTML5_logo.svg" align="left">
		<p>MySQL is an open-source relational database management system (RDBMS). Its name is a combination of "My", the name of co-founder Michael Widenius's daughter, and "SQL", the abbreviation for Structured Query Language. MySQL is a component of the LAMP web application software stack (and others), which is an acronym for Linux, Apache, MySQL, Perl/PHP/Python. MySQL is used by many database-driven web applications, including Drupal, Joomla, phpBB, and WordPress. MySQL is also used by many popular websites, including Facebook, Flickr, MediaWiki, Twitter, and YouTube.</p>

		<p>Below are pages created from following along with the course. The pages are broken up to demonstrate a specific function.</p>
	</div>

	<div  class="container">
		<div id="accordion">
			<h3>Section 8.1 - Retreiving from the database</h3>
			<div class="container pgContent">
				<div id="1"></div>
			</div>
			<h3>Section 1.2 - Headers</h3>
			<div class="container">
				<div id="2"></div>
			</div>
			<h3>Section 1.3 - Paragraphs</h3>
			<div class="container">
				<div id="3"></div>
			</div>
			<h3>Section 1.4 - Lists</h3>
			<div class="container">
				<div id="4"></div>
			</div> 
			<h3>Section 1.5 - Images</h3>
			<div class="container">
				<div id="5"></div>
			</div>
			<h3>Section 1.6 - Forms</h3>
			<div class="container">
				<div id="6"></div>
			</div>
			<h3>Section 1.7 - Tables</h3>
			<div class="container">
				<div id="7"></div>
			</div>
			<h3>Section 1.8 Links</h3>
			<div class="container">
				<div id="8"></div>
			</div>
			<h3>Section 1.9 - Entities</h3>
			<div class="container">
				<div id="9"></div>
			</div>
			<h3>Section 1.10 IFrames</h3>
			<div class="container">
				<div id="10"></div>
			</div>
			<h3>Section 1.11 - Final</h3>
				<div id="11"></div>
			</div>
		</div>
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.js" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.js" crossorigin="anonymous"></script>

    <script type="text/javascript">

    	$(function(){
    		$("#accordion").accordion({heightStyle: "content"});

    		//Load unit pages.
    		$("#1").load("1.1helloworld.html");
    		$("#2").load("1.2headers.html");
    		$("#3").load("1.3paragraphs.html");
    		$("#4").load("1.4lists.html");
    		$("#5").load("1.5images.html");
    		$("#6").load("1.6forms.html",);
    		$("#7").load("1.7tables.html");
    		$("#8").load("1.8links.html");
    		$("#9").load("1.9entities.html");
    		$("#10").load("1.10iframes.html");
    		$("#11").load("1.11moon.html"); 

    	});


    </script>


  </body>
</html>