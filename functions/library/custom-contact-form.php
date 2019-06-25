<?php

// Custom contact form for Woolfox

function form_submit() {
    if(isset($_POST['anti-spam']) && $_POST['anti-spam'] == ''){
        $to = get_option('contact_email');
        $andy = "andy@usdigital.co.uk";
        $reply_to = sanitize_email($_POST['cf_email']);
        $from = $reply_to;
        $body = wordwrap(sanitize_text_field($_POST['cf_message']), 70, "\r\n");
        $name = sanitize_text_field($_POST['cf_name']);
        $subject = "Contact form from Woolfox website";
		$headers[] = 'Reply-To: '.$reply_to;
		$headers[] = 'Cc: '.$andy;
		$headers[] = 'From: '.$name.' <'.$from.'>';
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		// then send the form to your email
		wp_mail($to, $subject, $body, $headers);
		echo '<div class="callout success" style="width: 60%; margin: 0 auto; border: none;"><h6>Your form has been submitted</h6><p>'.get_option('contact_form_submit').'</p></div>';
    }
}

function usd_contact_form()  { 
	?>
		<form data-abide novalidate action="?form_submit" method="POST" id="wf-contact-form">
			<div data-abide-error class="alert callout" style="display: none;">
				<p><i class="fi-alert"></i> There are some errors in your form.</p>
			</div>
			<div class="row">
				<label>
					<h4>Name<sup>*</sup></h4>
					<input type="text" name="cf_name" placeholder="" required pattern="text" />
					<span class="form-error">
						Please input your name.
					</span>
				</label>
			</div>
			<div class="row">
				<label>
					<h4>Email<sup>*</sup></h4>
					<input type="email" name="cf_email" placeholder="" required pattern="email" />
					<span class="form-error">
						Please input a valid email address.
					</span>
				</label>
			</div>
			<div class="row">
				<div class="small-12 columns">
				<label>
					<h4>Message</h4>
					<textarea rows="5" name="cf_message" placeholder=""></textarea>
				</label>
				</div>
			</div>
			<div class="row wf-data-privacy">
				<div class="small-12 columns">
					<h6>
						<?php echo get_option('contact_privacy') ?>
					</h6>
				</div>
			</div>
			<div class="row submit">
				<input class="hide-me" name="anti-spam" type="text" />
				<button class="button" type="submit" value="Send">Submit</button>
			</div>
		</form>
    <?php
}