<div id="footer-section" class="grid-whole">
<div class="grid-1 m-hidden s-hidden">&nbsp;</div>
<div class="grid-14 s-grid-whole m-grid-whole">
<div class="grid-third s-grid-whole m-grid-half chatter">
<div class="grid-4 right padded"><a href="https://twitter.com/kayapress"><img src="http://kaya.codisattva.com/wp-content/themes/kaya_theme/twitter-icon.png" width="23" height="19" style="
    margin-top:6px;" /></a></div><div class="grid-12 left padded"><h1>kaya chatter</h1></div>

<?php
  $tweets = getTweets(3, kayapress, array('include_rts'=>true));

  foreach($tweets as $tweet){
            $pubDate        = $tweet['created_at'];
            $form_date     = niceTime($pubDate);
            $statusid         = $tweet['id_str'];
            $tweet          = $tweet['text'];
            
            # Turn URLs into links
            $tweet = preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\./-]*(\?\S+)?)?)?)@', '<a target="blank" title="$1" href="$1">$1</a>', $tweet);
            
            #Turn hashtags into links
            $tweet = preg_replace('/#([0-9a-zA-Z_-]+)/', "<a target='blank' title='$1' href=\"http://twitter.com/search?q=%23$1\">#$1</a>", $tweet);
            
            #Turn @replies into links
            $tweet = preg_replace("/@([0-9a-zA-Z_-]+)/", "<a target='blank' title='$1' href=\"http://twitter.com/$1\">@$1</a>", $tweet);
            $twitter .= "<div class='time-meta right grid-4 padded-right padded-top'><a href=\"http://twitter.com/kayapress/statuses/" . $statusid . "\">" . $form_date . "</a></div><div class='left entry-content grid-12 padded'>" . $tweet . "</div>";

  }
  echo $twitter;
?>


</div>

<div class="grid-third s-grid-whole m-grid-half creative"><div class="padded-bottom"><h1>creative contagion</h1></div>
	
	<p class="padded-vertical">Sign up for our newsletter to receive Kaya updates. The only spam we like is spam musbi. We will never share your info.</p>


<!-- Begin MailChimp Signup Form -->

<form action="http://kaya.us4.list-manage.com/subscribe/post?u=1d19f7b96ceebd1b8b7a5b063&amp;id=852d438278" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
  

<div class="mc-field-group padded-bottom">
  <input maxlength="64" size="30" type="text" name="FNAME" id="mce-FNAME" onfocus="if(this.value=='First Name') this.value='';" onblur="if(this.value=='') this.value='First Name';" value="First Name">
</div>
<div class="mc-field-group padded-bottom">
  <input maxlength="64" size="30" type="text" name="LNAME" id="mce-LNAME" onfocus="if(this.value=='Last Name') this.value='';" onblur="if(this.value=='') this.value='Last Name';" value="Last Name">
</div>
<div class="mc-field-group padded-bottom">
  <input maxlength="64" size="30" type="email"  name="EMAIL" class="required email" id="mce-EMAIL" onfocus="if(this.value=='Email') this.value='';" onblur="if(this.value=='') this.value='Email';" value="Email">
</div>
  <div id="mce-responses" class="clear">
    <div class="response" id="mce-error-response" style="display:none"></div>
    <div class="response" id="mce-success-response" style="display:none"></div>
  </div>  
<div class="crm-submit-buttons">
   <span class="crm-button"><input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="button"></span>
</div>
</form>


<!--End mc_embed_signup-->      
    
    
</div>

<div class="grid-third m-grid-whole s-grid-whole">
	<div class="grid-half right padded-inner">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'footer_menu' ) ); ?>
		<hr class="foot_rule" />
		<div class="social">
		<div class="grid-whole"><a href="https://twitter.com/search?q=%23kayapress&src=hash">#kayapress</a></div>
		<div class="grid-whole right padded-top"><a href="https://twitter.com/kayapress" id="twitter">Twitter</a><a href="http://www.facebook.com/pages/KAYA-Press/160101600672575" id="facebook">Facebook</a></div>
		<div class="grid-whole right padded-top"><a href="http://kayapress.tumblr.com/" id="tumblr">Tumblr</a><a href="http://instagram.com/kayapress" id="mail">Instagram</a></div>

		</div>	
	</div>
	<div class="grid-half padded-inner">
		<footer>
			<a href="/"><img class="alignnone size-tiger padded-vertical" alt="tiger-logo" src="http://kaya.codisattva.com/wp-content/uploads/2013/02/tiger-logo.png" width="124" height="100" /></a>
			<p class="foot_about padded-top"><strong>Kaya Press</strong> is a publisher of Asian Pacific Diasporas and is under the academic auspices of the USC Dana and David Dornsife College of Letters, Arts and Sciences.</p>
			<p class="foot">&copy; copyright <?php echo date("Y"); ?> kaya press</p>
		</footer>
	</div>	
</div>
</div>	
<div class="grid-1 m-hidden s-hidden">&nbsp;</div>
</div>