<?php
	//Add CSS file for form formatting
	$plugin_directory_name =  plugin_basename(dirname(__FILE__)); 
	wp_enqueue_style( 'lead_bar_style', plugin_dir_url(dirname(__FILE__)).$plugin_directory_name.'/css/bootstrap.min.css' );
?>

<div class="col-lg-12">	
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<h4 class="page-header">Onboard Lead bar Script code paste below</h4>
		<form class="form" method="POST">
			<!-- some inputs here ... -->
			<?php wp_nonce_field( 'obl_custom_onboard_leadbar_display', 'custom_onboard_leadbar_display_field' ); ?>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
						
				<div class="form-group">
					<label>Lead bar widget script</label>
					<textarea name="lead_bar_text" placeholder="Copy your report widget script"  required style="height:300px" class="form-control" id="lead_bar_text"><?php echo $lead_bar_text; ?></textarea>
					<em id="lead_bar_text_error"></em>
				</div>	
				
				<div class="form-group">
					<input type="submit" value="Save" id="publishLead" class="btn btn-success">
				</div>	
			</div>	
			
		</form>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<h4 class="page-header">Copy your shortcode</h4>	
		<label>&nbsp;</label>
		<figure class="highlight"><pre><code class="codeS language-html" data-lang="html" id="copyTarget">[onboard-lead]</code></pre></figure>
		<button onclick="return copy_lead_bar('copyTarget');" id="copybtn" class="pull-right btn btn-success">Copy</button>
	
	</div>
</div>