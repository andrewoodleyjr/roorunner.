 <body class="left-sidebar">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Content -->
					<div id="content">
						<div id="content-inner">
					
							<!-- Post -->
								<article class="is-post is-post-excerpt">
									<header>
										<!--
											Note: Titles and bylines will wrap automatically when necessary, so don't worry
											if they get too long. You can also remove the "byline" span entirely if you don't
											need a byline.
										-->
										<h2>All Jobs</h2>
										<span class="byline"><?php if(isset($tasks)) echo 'Below are all the bargins and tasks on the market'; ?></span>
									</header>
								</article>	
									
							<hr width="100%">
		
						
						
						<?php if(isset($tasks)) echo $tasks; ?>
                        		
							
							
						
							
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
					
						<!-- Logo -->
							<div id="logo">
								<h1>RooRunner</h1>
							</div>
					
						<!-- Nav -->
							<nav id="nav">
								<ul>
                                 <li ><a href="/manage/create/">Create Tasks</a></li>
                                	<li><a href="/manage/">Current Tasks</a></li>
                                    
									<li class="current_page_item"><a href="/manage/jobs/">All Tasks</a></li>
                                    
									
									<li><a href="/manage/profile/">Profile</a></li>
                                    <li><a href="/logout/">Sign Out</a></li>
									
									
								</ul>
							</nav>

						
					
						
					
						
					
						
							<div id="copyright">
								<p>
									&copy; 2013 An Untitled Site.<br />
									Images: <a href="http://n33.co">n33</a>, <a href="http://fotogrph.com">fotogrph</a>, <a href="http://iconify.it">Iconify.it</a>
									Design: <a href="http://html5up.net/">HTML5 UP</a>
								</p>
							</div>

					</div>

			</div>