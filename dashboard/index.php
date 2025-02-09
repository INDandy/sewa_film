<?php 
include("../lib/auth.php"); 
include("../lib/functions.php");
$theme=setTheme();
getHeader($theme);
?>
					<div class="col col-md-9">
						<div class="col col-md-5">
							<h4><?php echo "Hello, " . $_SESSION['nama']; ?></h4>
						</div>
						<div class="col col-md-7"></div>
						<div class="embed-responsive embed-responsive-16by9" style="text-align: center;">
							<h5>Movies Trailer</h5>
						</div>
						<div class="iframe-container" style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%;">
							<iframe 
								class="embed-responsive-item"
								src="https://www.youtube.com/embed/videoseries?list=PL4s3asBCeP-OoBR9JGV8yCdZq97q9-1T_" 
								title="YouTube video player" 
								frameborder="0" 
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
								referrerpolicy="strict-origin-when-cross-origin"
								alt="yt"
								loading="lazy"
								allowfullscreen
								style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
							</iframe>
						</div>
					</div>
					<?php
					getFooter($theme,'');
					?>
