		{{-- <!-- start footer section  --> --}}
		<footer>
			@yield('footer')
			<div class="footer-content">
				<div class="container">
					<div class="row logo-social">
						<div class="col-lg-4">
							<a href="index.html">
								<span>ZIRCON LMS</span>
								<img src="{{ asset('homeAssets/assets/imgs/Logolight.png') }}" alt="" />
							</a>
						</div>
						<div class="col-lg-6">
							<div class="footer-icons">
								<a href="#"
									><i class="fa-brands fa-facebook-f"></i
								></a>
								<a href="#"
									><i class="fa-brands fa-twitter"></i
								></a>
								<a href="#"
									><i class="fa-brands fa-youtube"></i
								></a>
								<a href="#"
									><i class="fa-brands fa-instagram"></i
								></a>
								<a href="#"
									><i class="fa-brands fa-whatsapp"></i
								></a>
								<a href="#"
									><i class="fa-brands fa-linkedin-in"></i
								></a>
							</div>
						</div>
					</div>
				</div>
				<div class="copyright">
					<p>
						<span class="copy-name">Zircon Techs</span>
						Made with
						<span class="heart"
							><i><i class="fa-solid fa-heart"></i></i
						></span>
						By
					</p>
				</div>
			</div>
		</footer>
		{{-- <!--font awesome--> --}}
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
			integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		{{-- <!--js plugins--> --}}


		<script src="{{ asset('homeAssets/assets/js/bootstrap.bundle') }}.js"></script>
		{{-- <!-- main js file --> --}}
		<script src="{{ asset('homeAssets/assets/js/main.js') }}"></script>
		@yield('javascript')
	</body>
</html>
