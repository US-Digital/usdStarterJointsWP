<?php

// Custom contact form for Woolfox

function feedback_form_submit() {
    if(isset($_POST['anti-spam']) && $_POST['anti-spam'] == ''){
        // $to = get_option('contact_email');
        // $andy = "andy@usdigital.co.uk";
        // $reply_to = sanitize_email($_POST['cf_email']);
		// $from = $reply_to;
		$answer_1 = $_POST['support'];
		$answer_2 = $_POST['support_wf'];
		$answer_3 = sanitize_text_field($_POST['concerns']);
		$answer_4 = sanitize_text_field($_POST['impressions']);
		$answer_5 = sanitize_text_field($_POST['house_comments']);
		$answer_6 = sanitize_text_field($_POST['service_comments']);
		$answer_7 = sanitize_text_field($_POST['general_comments']);
		$file = "feedback_data.csv";
		$file_open = fopen($file, "a");
		$num_rows = count(file($file));
		if($num_rows > 1) {
			$num_rows = ($num_rows - 1) + 1;
		}
		$feedback_data = array(
			'Number' => $num_rows,
			'Q1' => $answer_1,
			'Q2' => $answer_2,
			'Q3' => $answer_3,
			'Q4' => $answer_4,
			'Q5' => $answer_5,
			'Q6' => $answer_6,
			'Q7' => $answer_7,
		);
		fputcsv($file_open, $feedback_data);
		echo '<div class="callout success" style="width: 60%; margin: 0 auto; border: none;"><h6>Your form has been submitted</h6><p>Thank you for your feedback.</p></div>';
    }
}

function usd_feedback_form()  { 
	?>
		<form data-abide novalidate action="?form_submit" method="POST" id="wf-feedback-form">
			<div data-abide-error class="alert callout" style="display: none;">
				<p><i class="fi-alert"></i> There are some errors in your form.</p>
			</div>
			<div class="row">
				<div>
					<strong>Q1. </strong>
					<span>Do you support the development of a new Garden Village?</span>
				</div>
				<span class="form-error">
					Please fill out this field.
				</span>
				<label class="container">Yes
					<input type="radio" name="support" value="yes" required />
					<span class="checkmark"></span>
					
				</label>
				<label class="container">No
					<input type="radio" name="support" value="no" />
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="row">
				<div>
					<strong>Q2. </strong>
					<span>Do you support the development of a new Garden Village at Woolfox?</span>
				</div>
				<span class="form-error">
						Please fill out this field.
				</span>
				<label class="container">Yes
					<input type="radio" name="support_wf" value="yes" required />
					<span class="checkmark"></span>
				</label>
				<label class="container">No
					<input type="radio" name="support_wf" value="no" />
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="row">
				<div class="small-12 columns">
					<p><strong>Q3. </strong>If no, please outline any concerns you may have?</p>
					<label>		
						<textarea rows="5" name="concerns" placeholder=""></textarea>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="small-12 columns">
					<p><strong>Q4. </strong>What are your first impressions of the illustrative masterplan?</p>
					<p>
						This can be viewed on our website: <a href="https://www.woolfoxgardenvillage.co.uk/site-masterplan" rel="nofollow">www.woolfoxgardenvillage.co.uk/site-masterplan</a>
					</p>
				<label>		
					<textarea rows="5" name="impressions" placeholder=""></textarea>
				</label>
				</div>
			</div>
			<div class="row">
				<div class="small-12 columns">
					<p><strong>Q5. </strong>Do you have any comments on the mix and type of housing that should be provided i.e. specialist housing, affordable housing, starter homes?</p>
					<label>		
						<textarea rows="5" name="house_comments" placeholder=""></textarea>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="small-12 columns">
					<p><strong>Q6. </strong>Do you have any comments in terms of the type of services, facilities and employment opportunities that you would like to see provided as part of Woolfox Garden Village?</p>
					<label>			
						<textarea rows="5" name="service_comments" placeholder=""></textarea>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="small-12 columns">
					<p><strong>Q7. </strong>Do you have any general comments that you would like to make regarding the proposals for Woolfox Garden Village?</p>
					<label>
						<textarea rows="5" name="general_comments" placeholder=""></textarea>
					</label>
				</div>
			</div>
			<div class="row wf-data-privacy">
				<div class="small-12 columns">
					<h6>

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