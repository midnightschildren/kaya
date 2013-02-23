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
	
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/jquery.min.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min.js"></script>
<style type="text/css">@import url("http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/jquery-ui-1.8.16/css/smoothness/jquery-ui-1.8.16.custom.css");</style>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.autocomplete.js"></script>
<style type="text/css">@import url("http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/css/jquery.autocomplete.css");</style>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jstree/jquery.jstree.js"></script>
<style type="text/css">@import url("http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jstree/themes/default/style.css");</style>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.menu.pack.js"></script>
<style type="text/css">@import url("http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/css/menu.css");</style>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.chainedSelects.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.contextMenu.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.tableHeader.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.textarearesizer.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.form.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.tokeninput.js"></script>
<style type="text/css">@import url("http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/css/token-input-facebook.css");</style>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.timeentry.pack.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.mousewheel.pack.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.toolTip.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
<style type="text/css">@import url("http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/DataTables/media/css/demo_table_jui.css");</style>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.dashboard.js"></script>
<style type="text/css">@import url("http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/css/dashboard.css");</style>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.FormNavigate.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.validate.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.civicrm-validate.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.ui.datepicker.validation.pack.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery-fieldselection.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.mustache.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.blockUI.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/js/rest.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/js/Common.js"></script>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/js/jquery/jquery.crmeditable.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/js/jquery/jquery.crmaccordions.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/js/jquery/jquery.crmasmselect.js"></script>
<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/js/jquery/jquery.crmtooltip.js"></script>


<script type="text/javascript">var cj = jQuery.noConflict();</script>

<form action="http://kaya.codisattva.com/index.php?page=CiviCRM&amp;q=civicrm/profile/create&amp;gid=13&amp;reset=1" method="post" name="Edit" id="Edit" >

<div><input name="postURL" type="hidden" value="" /></div>

<script type="text/javascript" src="http://kaya.codisattva.com/wp-content/plugins/civicrm/civicrm/js/Common.js"></script>

<div id="crm-container" lang="en" xml:lang="en">

<div class="form-layout-compressed"><div class="fn_form-item padded-bottom">
<input maxlength="64" size="30" name="first_name" type="text" id="first_name" onfocus="if(this.value=='First Name') this.value='';" onblur="if(this.value=='') this.value='First Name';" value="First Name" /></div><div class="clear"></div>
<div class="ln_form-item padded-bottom">
<input maxlength="64" size="30" name="last_name" type="text" id="last_name" onfocus="if(this.value=='Last Name') this.value='';" onblur="if(this.value=='') this.value='Last Name';" value="Last Name" /></div><div class="clear"></div>
<div class="email_form-item padded-bottom">
<input maxlength="64" size="30" name="email-Primary" type="text" id="email_primary" onfocus="if(this.value=='Email') this.value='';" onblur="if(this.value=='') this.value='Email';" value="Email" /></div><div class="clear"></div></div><!-- end form-layout-compressed for last profile --> 

<div class="crm-submit-buttons">
   <span class="crm-button"><input class="form-submit default" accesskey="S" name="_qf_Edit_next" value="Sign Up" type="submit" id="Edit_next" /></span>
</div>

</div> 


<script type="text/javascript">
    
cj(document).ready(function(){ 
	cj('#selector tr:even').addClass('odd-row ');
	cj('#selector tr:odd ').addClass('even-row');
});

</script>


</form>

      
    <script type="text/javascript" >
      cj( function( ) {
        cj("#Edit").validate({ 'errorClass': 'crm-error'});
      });
    </script><script type="text/javascript">jQuery.noConflict(true);</script>
    
</div>

<div class="grid-third m-grid-whole s-grid-whole">
	<div class="grid-half right padded-inner">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'footer_menu' ) ); ?>
		<hr class="foot_rule" />
		<div class="social">
		<div class="grid-whole"><a href="https://twitter.com/search?q=%23kayapress&src=hash">#kayapress</a></div>
		<div class="grid-whole right padded-top"><a href="https://twitter.com/kayapress" id="twitter">Twitter</a><a href="http://www.facebook.com/pages/KAYA-Press/160101600672575" id="facebook">Facebook</a></div>
		<div class="grid-whole right padded-top"><a href="http://kayapress.tumblr.com/" id="tumblr">Tumblr</a><a href="mailto:info@kaya.com" id="mail">Mail</a></div>

		</div>	
	</div>
	<div class="grid-half padded-inner">
		<footer>
			<img class="alignnone size-tiger padded-vertical" alt="tiger-logo" src="http://kaya.codisattva.com/wp-content/uploads/2013/02/tiger-logo.png" width="124" height="100" />
			<p class="foot_about padded-top"><strong>Kaya Press</strong> is a publisher of Asian Pacific Diasporas and is under the academic auspices of the USC Dana and David Dornsife College of Letters, Arts and Sciences.</p>
			<p class="foot">&copy; copyright <?php echo date("Y"); ?><br />kaya press</p>
		</footer>
	</div>	
</div>
</div>	
<div class="grid-1 m-hidden s-hidden">&nbsp;</div>
</div>