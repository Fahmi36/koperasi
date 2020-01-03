<style type="text/css">
	body {
		background-color: #ffffff;
		color: #444444;
		font-family: 'Roboto', sans-serif;
		font-size: 16px;
		font-weight: 300;
		margin: 0;
		padding: 0;
	}
	.wizard-content-left {
		background-blend-mode: darken;
		background-color: rgba(0, 0, 0, 0.45);
		background-image: url("https://i.ibb.co/X292hJF/form-wizard-bg-2.jpg");
		background-position: center center;
		background-size: cover;
		height: 100vh;
		padding: 30px;
	}
	.wizard-content-left h1 {
		color: #ffffff;
		font-size: 38px;
		font-weight: 600;
		padding: 12px 20px;
		text-align: center;
	}

	/***** Top content *****/

.top-content { padding: 40px 0 170px 0; }

.top-content .text { color: #fff; }
.top-content .text h1 { color: #fff; }
.top-content .description { margin: 20px 0 10px 0; }
.top-content .description p { opacity: 0.8; }
.top-content .description a { color: #fff; }
.top-content .description a:hover, 
.top-content .description a:focus { border-bottom: 1px dotted #fff; }

.form-box { padding-top: 40px; }

.f1 {
	padding: 25px; background: #fff;
	-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
}
.f1 h3 { margin-top: 0; margin-bottom: 5px; text-transform: uppercase; }

.f1-steps { overflow: hidden; position: relative; margin-top: 20px; }

.f1-progress { position: absolute; top: 24px; left: 0; width: 100%; height: 1px; background: #ddd; }
.f1-progress-line { position: absolute; top: 0; left: 0; height: 1px; background: #f35b3f; }

.f1-step { position: relative; float: left; width: 33.333333%; padding: 0 5px; }

.f1-step-icon {
	display: inline-block; width: 40px; height: 40px; margin-top: 4px; background: #ddd;
	font-size: 16px; color: #fff; line-height: 40px;
	-moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%;
}
.f1-step.activated .f1-step-icon {
	background: #fff; border: 1px solid #f35b3f; color: #f35b3f; line-height: 38px;
}
.f1-step.active .f1-step-icon {
	width: 48px; height: 48px; margin-top: 0; background: #f35b3f; font-size: 22px; line-height: 48px;
}

.f1-step p { color: #ccc; }
.f1-step.activated p { color: #f35b3f; }
.f1-step.active p { color: #f35b3f; }

.f1 fieldset { display: none; text-align: left; }

.f1-buttons { text-align: right; }

.f1 .input-error { border-color: #f35b3f; }


input[type="text"], 
input[type="password"], 
textarea, 
textarea.form-control {
	height: 44px;
    margin: 0;
    padding: 0 20px;
    vertical-align: middle;
    background: #fff;
    border: 1px solid #ddd;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 300;
    line-height: 44px;
    color: #888;
    -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}

textarea, 
textarea.form-control {
	height: 90px;
	padding-top: 8px;
	padding-bottom: 8px;
	line-height: 30px;
}

input[type="text"]:focus, 
input[type="password"]:focus, 
textarea:focus, 
textarea.form-control:focus {
	outline: 0;
	background: #fff;
    border: 1px solid #ccc;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
}

input[type="text"]:-moz-placeholder, input[type="password"]:-moz-placeholder, 
textarea:-moz-placeholder, textarea.form-control:-moz-placeholder { color: #888; }

input[type="text"]:-ms-input-placeholder, input[type="password"]:-ms-input-placeholder, 
textarea:-ms-input-placeholder, textarea.form-control:-ms-input-placeholder { color: #888; }

input[type="text"]::-webkit-input-placeholder, input[type="password"]::-webkit-input-placeholder, 
textarea::-webkit-input-placeholder, textarea.form-control::-webkit-input-placeholder { color: #888; }

label { font-weight: 300; }


button.btn {
	min-width: 105px;
	height: 40px;
    margin: 0;
    padding: 0 20px;
    vertical-align: middle;
    border: 0;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 300;
    line-height: 40px;
    color: #fff;
    -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
    text-shadow: none;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}

button.btn:hover { opacity: 0.6; color: #fff; }
button.btn:active { outline: 0; opacity: 0.6; color: #fff; -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none; }
button.btn:focus,
button.btn:active:focus,
button.btn.active:focus { outline: 0; opacity: 0.6; color: #fff; }

button.btn.btn-next,
button.btn.btn-next:focus,
button.btn.btn-next:active:focus, button.btn.btn-next.active:focus { background: #f35b3f; }

button.btn.btn-submit,
button.btn.btn-submit:focus,
button.btn.btn-submit:active:focus, button.btn.btn-submit.active:focus { background: #f35b3f; }

button.btn.btn-previous,
button.btn.btn-previous:focus,
button.btn.btn-previous:active:focus, button.btn.btn-previous.active:focus { background: #bbb; }

/***** Media queries *****/

@media (min-width: 992px) and (max-width: 1199px) {}

@media (min-width: 768px) and (max-width: 991px) {}

@media (max-width: 767px) {
	
	.navbar { padding-top: 0; }
	.navbar.navbar-no-bg { background: #333; background: rgba(51, 51, 51, 0.9); }
	.navbar-brand { height: 60px; margin-left: 15px; }
	.navbar-collapse { border: 0; }
	.navbar-toggle { margin-top: 12px; }
	
	.top-content { padding: 40px 0 110px 0; }

}

@media (max-width: 415px) {
	
	h1, h2 { font-size: 32px; }
	
	.f1 { padding-bottom: 20px; }
	.f1-buttons button { margin-bottom: 5px; }

}

	@keyframes click-radio-wave {
		0% {
			width: 25px;
			height: 25px;
			opacity: 0.35;
			position: relative;
		}
		100% {
			width: 60px;
			height: 60px;
			margin-left: -15px;
			margin-top: -15px;
			opacity: 0.0;
		}
	}
	@media screen and (max-width: 767px) {
		.wizard-content-left {
			height: auto;
		}
	}

</style>
<section class="wizard-section">
	<div class="row no-gutters">
		<div class="col-lg-6 col-md-6">
			<div class="wizard-content-left d-flex justify-content-center align-items-center">
				<h1>Create Your Bank Account</h1>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			
		</div>
	</div>
</section>
