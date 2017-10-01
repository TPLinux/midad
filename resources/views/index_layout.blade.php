<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Cairo|Dancing+Script|Fjalla+One|Gloria+Hallelujah|Lateef|Lato|Lobster|Open+Sans|Pacifico|Play|Ravi+Prakash|Reem+Kufi|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/angular.min.js"></script>
	<script src="js/angular_apps.js"></script>
    </head>
    <body>
	<section class="container-fluid header">
	    <div></div>
	    <div>
		<div class="container">
		    <div class="row">
			<ul>
			    <li><input type="button" value="تسجيل الدخول"></li>
			    <li><input type="button" value="تبرع الأن"></li>
			    <li>+90 555 331 55 55</li>
			</ul>
			<img src="img/logo.png">
		    </div>
		</div>
	    </div>
	    <nav>
		<ul>
		    <li><i class="fa fa-home" aria-hidden="true"></i>الرئيسية</li>
		    <li>اتصل بنا</li>
		    <li>من نحن</li>
		    <li>مشاريعنا</li>
		    <li>عن التطوع</li>
		    <li>لماذا مداد؟</li>
		    <li>الأعضاء</li>
		</ul>
	    </nav>
	</section>
	<br>
	<section class="container-fluid user-section">
            <div class="container">
		@yield('content')
	    </div>
	</section>
	<section>
            <div class="intro-header"> 
		<div class="containerz"  align="center">

		    <div class="tab-content custom-tab-content" align="center">
			<div class="subscribe-panel">
			    <h1>القائمة البريدية</h1>
			    <p>اشترك معنا بالقائمة البريدية ليصلك كل جديد على إيميلك الشخصي</p>
			    
			    <form action="" method="post">
                    		
				<div class="col-md-4"></div>
				<div class="col-md-4">
				    <div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
					<input type="text" class="form-control input-lg" name="email" id="email"  placeholder="ادخل بريدك الإلكتروني"/>
				    </div>
				</div>
				<div class="col-md-4"></div>
				<br/><br/><br/>
				<button class="btn btn-warning btn-lg">اشترك الآن !</button>
			    </form>

			</div>
		    </div>
		</div>
	    </div>
	</section>
	<footer>
	    <div class="container">
		<div class="row">
		    <div class="col-md-3 col-sm-6 footer-col">
			<div class="logofooter"> <img src="img/logo.png"></div>
			
			<p><i class="fa fa-map-pin"></i> توبتشولار - اسطنبول - تركيا</p>
			<p><i class="fa fa-phone"></i> الهاتف المحمول (تركيا) : +90 559 95 599 99</p>
			<p><i class="fa fa-envelope"></i> البريد الإلكتروني : info@edumidad.org</p>
			
		    </div>
		    <div class="col-md-3 col-sm-6 footer-col">
			<h6 class="heading7">روابط عامة</h6>
			<ul class="footer-ul">
			    <li><a href="#"> اهلا بكم</a></li>
			    <li><a href="#"> الأمان والخصوصية</a></li>
			    <li><a href="#"> الاتفاقيات</a></li>
			    <li><a href="#"> الحسابات</a></li>
			    <li><a href="#"> الترتيبات</a></li>
			    <li><a href="#">اخر الأخبار</a></li>
			    <li><a href="#"> سؤال وجواب</a></li>
			</ul>
		    </div>
		    <div class="col-md-3 col-sm-6 footer-col">
			<h6 class="heading7">LATEST POST</h6>
			<div class="post">
			    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، ص الأخرى إضافة إلى زيادة عديان أن يطلع على صورة حقيقية لتصميم الموقع.<span>August 1,2017</span></p>
			    <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.<span>August 13,2017</span></p>
			    <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.<span>August 23,2017</span></p>
			</div>
		    </div>
		    <div class="col-md-3 col-sm-6 footer-col">
			<h6 class="heading7">تواصل اجتماعي</h6>
			<ul class="footer-social">
			    <li><i class="fa fa-linkedin social-icon linked-in" aria-hidden="true"></i></li>
			    <li><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></li>
			    <li><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i></li>
			    <li><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i></li>
			</ul>
		    </div>
		</div>
	    </div>
	</footer>
	<!--footer start from here-->

	<div class="copyright">
	    <div class="container">
		<div class="col-md-6">
		    <p> 2018 - 2017 © جميع الحقوق محفوظة</p>
		</div>
		<div class="col-md-6">
		    <ul class="bottom_ul">
			<li><a href="#">Netrojin.com</a></li>
			<li><a href="#">حولنا</a></li>
			<li><a href="#">المنتدى</a></li>
			<li><a href="#">سؤال وجواب</a></li>
			<li><a href="#">اتصل بنا</a></li>
			<li><a href="#">خريطة الموقع</a></li>
		    </ul>
		</div>
	    </div>
	</div>
	<script src="js/jquery-1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/npm.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/main.js"></script>
    </body>
</html>

