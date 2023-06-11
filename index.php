<?php
session_start();
require 'src/auth.php';
require 'src/subscription.php';
require 'src/reg.php';
// Авторизуємо користувача, якщо в запиті є логін і пароль
if (isset($_POST['login']) && isset($_POST['password'])) {
    login($_POST['login'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title>Yoga</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700&amp;subset=cyrillic-ext" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/style.css">
	
</head>

<body>
	<section class="modal modal-auth" id="home">
		<div class="overlayy">
			<div class="modal-content">
				<form method="post">
					<h2 class="form-text">Authorization form</h2>
					<input class="modal-input form-input" type="text" name="login" id="inputPassword" maxlength="15" minlength="4" placeholder="Username" required>
					<input class="modal-input form-input" type="password" name="password" id="inputPassword" minlength="5" id="password" placeholder="Password" required>
					<button class="button" type="submit">Sing in</button>

					<div class="modal-descr">
						<p>Don't have an account?&nbsp;&nbsp;</p>
						<a href="#">Sign up!</a>
					</div>
				</form>
				<div class="close">
					<img src="img/close.png" alt="close">
				</div>
			</div>
		</div>
	</section>

	<section class="modal modal-regist">
		<div class="overlayy">
			<div class="modal-content">
				<form id="reg-form">
					<h2 class="form-text">Registration form</h2>
					<input class="modal-input form-input" type="email" name="email" minlength="4" placeholder="Email" required>
					<input class="modal-input form-input" type="password" name="password" minlength="6" id="password" placeholder="Password" required>
					<input class="modal-input form-input" type="password" name="password" minlength="6" id="password" placeholder="Repeat password" required>
					<button class="button" type="submit" id="singUp">Sing Up</button>
					<div class="modal-descr">
						<p>Have an account?&nbsp;&nbsp;</p>
						<a href="#">Login!</a>
					</div>
				</form>
				<div class="close">
					<img src="img/close.png" alt="close">
				</div>
			</div>
		</div>
	</section>

	<header>
		<div class="container">
		<nav class="nav">
                <div class="nav-menu">
                    
                </div>
                <ul class="links">
                    <li class="link"><a href="#home">Home</a></li>
                    <li class="link"><a href="#collection">Collection</a> </li>
                    <li class="link"><a href="#about">About Us</a> </li>
                    <li class="link"><a href="#price">Blog</a> </li>
                    <li class="link"><a href="#contact">Contact</a> </li>
					<?php if (isAuthorized()) : ?>
                        <a href="login.php">Admin</a>
                        <a href="logout.php">Sign out</a>
                    <?php else : ?>
                        <a href="#" id="login">Login</a>
                        <a href="#" id="singup">Sing Up</a>
                    <?php endif; ?>
                </ul>

            </nav>
		</div>
	</header>
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="main-block">
						<div class="main-block-link">
							Travel.org
						</div>
						<div class="main-block-title">
							yoga tours in india
						</div>
						<div class="main-block-descr">
							ocean / yoga / travel / ayurveda
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content" >
		<div class="container">
			<div class="info" id="collection">
				<div class="info-header">
					<div class="info-header-tab">Treatment</div>
					<div class="info-header-tab">Rest</div>
					<div class="info-header-tab">Nature</div>
					<div class="info-header-tab">Yoga</div>
				</div>
				<div class="info-tabcontent fade">
					<div class="description">
						<div class="description-title">Healthy spine</div>
						<div class="description-text">Yoga, massages and swimming in the sea will help your tired back! Indian yogis believed that a person’s health can be determined by how healthy and flexible his spine is. sitting postures and cannot relax, has a curvature that will eventually lead to diseases of other organs? Yogis would say - take care of yourself and urgently!
						</div>
						<div class="description-btn">
							Learn more
						</div>
					</div>
					<div class="photo">
						<img src="img/massage.jpg" alt="Massage">
					</div>
				</div>
				<div class="info-tabcontent fade">
					<div class="description">
						<div class="description-title">Antistress</div>
						<div class="description-text">Ayurveda and yoga say that the main source of health of our body is a healthy mind. The Antistress program first removes the effects of stress on the physical level, then helps to get rid of negative and obsessive thoughts, then increases the overall level of energy.<br> You will finally remember the feeling of a "free head", feel a surge of physical strength and remember what happiness is.</div>
						<div class="description-btn">
							Learn more
						</div>
					</div>
					<div class="photo">
						<img src="img/sunset.jpg" alt="sunset">
					</div>
				</div>
				<div class="info-tabcontent fade">
					<div class="description">
						<div class="description-title">Восстановление</div>
						<div class="description-text">Stress, life in the city, poor ecology, contaminated food and water, a busy rhythm of life - all this takes away our youth and good health from day to day.<br> One face cream cannot solve the problem of rejuvenating the body when you are over 40. Do you agree?</div>
						<div class="description-btn">
							Learn more
						</div>
					</div>
					<div class="photo">
						<img src="img/sunrise.jpg" alt="sunrise">
					</div>
				</div>
				<div class="info-tabcontent fade">
					<div class="description">
						<div class="description-title">Yoga and Ayurveda</div>
						<div class="description-text">A few years ago, we developed special yoga and Ayurveda programs - and we realized that they work great - based on the experience of our 530 tourists! In each of these programs there is one goal, to achieve which asanas, and breathing practices, and meditations, and Ayurvedic procedures will be directed, lectures will be given on this topic. <br>Yoga and Ayurveda - two strong warriors who together will fight problems and diseases.</div>
						<div class="description-btn">
							Learn more
						</div>
					</div>
					<div class="photo">
						<img src="img/yoga.jpg" alt="yoga">
					</div>
				</div>
			</div>
			<div class="timer" id="about">
				<div class="timer-title">Hurry up to book a place with a discount</div>
				<div class="timer-action">
					Until the end of the action left
				</div>
				<div class="timer-numbers" id="timer">
					<span class="hours">18</span>
					<span>:</span>
					<span class="minutes">20</span>
					<span>:</span>
					<span class="seconds">11</span>
				</div>
			</div>
			<button class="more"> To learn more</button>
			<div class="slider" id="photo">
				<div class="slider-title">Photos from our trips
				</div>
				<div class="wrap">

					<div class="slider-item fade">
						<img src="img/slider_1.jpg" alt="slider">
					</div>
					<div class="slider-item fade">
						<img src="img/slider_2.jpg" alt="slider">
					</div>
					<div class="slider-item fade">
						<img src="img/slider_3.jpg" alt="slider">
					</div>
					<div class="slider-item fade">
						<img src="img/slider_4.jpg" alt="slider">
					</div>

					<div class="prev">
						<div class="arrow-left"></div>
					</div>
					<div class="next">
						<div class="arrow-right"></div>
					</div>
				</div>
				<div class="slider-dots">
					<div class="dot dot-active"></div>
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
				</div>
			</div>
			<div class="counter" id="price">
				<div class="counter-title">Рассчитайте стоимость вашего отдыха
				</div>
				<div class="counter-block">
					<div class="counter-block-option">Number of people</div>
					<input type="number" min="1" step="1" class="counter-block-input">
				</div>
				<div class="counter-block">
					<div class="counter-block-option">How many daysй</div>
					<input type="number" min="1" step="1" class="counter-block-input">
				</div>
				<div class="counter-block">
					<div class="counter-block-option">Choose a base</div>
					<select name="place" id="select">
						<option id="mumbai" value="1">India, Mumbai</option>
						<option id="kerala" value="1.5">India, Kerala</option>
						<option id="varanasi" value="1.8">India, Varanasi</option>
					</select>
				</div>
				<div class="counter-total">
					total amount<br>
					<span id="total">20456</span>
				</div>
			</div>
			<div class="contact" id="contacts">
				<div class="contact-img">
					<img src="img/letter.png" alt="letter">
				</div>
				<div class="contact-form">
					<div class="contact-form-title">
						We will contact you
					</div>
					<form id="subscription_form">
						<input required type="email" name="email" placeholder="Ваша почта">
						<input required type="tel" name="tel" placeholder="Ваш телефон">
						<button type="submit">Send</button>
					</form>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<div class="social" >
					<div class="social-block">
						<a href="#">
							<img src="logo/twitter-logo-silhouette.svg" alt="">
						</a>
					</div>
					<div class="social-block">
						<a href="#">
							<img src="logo/facebook-logo.svg" alt="">
						</a>
					</div>
					<div class="social-block">
						<a href="#">
							<img src="logo/instagram-social-network-logo-of-photo-camera.svg" alt="https://instagram.com/jwejrty?igshid=NTc4MTIwNjQ2YQ==">
						</a>
					</div>
					<div class="social-block">
						<a href="#">
							<img src="logo/pinterest-logo.svg" alt="">
						</a>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<div class="overlay fade" id="contact">
		<div class="popup">
			<div class="popup-close">&times;
			</div>
			<div class="popup-title">
				Feedback form</div>
			<div class="popup-form">
				<form action="#" class="main-form">
					<div class="popup-form-header">
						Find out more about your holiday
					</div>
					<label class="popup-form__label">
						Enter your phone number:
					</label>
					<input class="popup-form__input" name="phone" type="tel" required placeholder="+38000000000">
					<button class="button popup-form__btn">
						Submit your application!
					</button>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/script.js"></script>

	<script src="js/sub.js"></script>
	<script src="js/main.js"></script>
	<script src="js/reg.js"></script>
	
</body>

</html>