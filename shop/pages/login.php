<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Вход в личный кабинет</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Главная</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<div class="hover">
						<h4>Новичок без аккаунта? </h4>
						<p>Тогда вам необходимо зарегистрироваться, чтобы начать покупки</p>
						<a class="button button-account" href="register">Зарегистрироваться</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Введите Ваши данные для входа</h3>
					<form class="row login_form" onsubmit="sendForm(this); return false;">
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" name="email" placeholder="Ваш email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваш email'" required>
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" name="pass" placeholder="Ваш пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваш пароль'" required>
						</div>
						<p id="info" style="color: red;"></p>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Не выходить из аккаунта</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="button button-login w-100">Войти</button>
							<a href="#">Забыли пароль?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!--================End Login Box Area =================-->

  <!-- Модальное окно -->
  <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="staticBackdropLabel">Вы успешно вошли в личный кабинет!</h5>
		</div>
		<div class="modal-body">
		  Перенаправление сработает через 3 секунды.
		</div>
		<div class="modal-footer">Удачных покупок!
		</div>
	  </div>
	</div>
  </div>
<script>
async function sendForm(form) {
    let formData = new FormData(form);

    let response = await fetch("authUser", {
      method: "POST",
      body: formData,
    });
    let message = await response.json();
    if (message.result == "denied") {
      info.innerText = "Введенные данные не совпадают";
    } else if (message.result == "letsgo") {
      $("#myModal").modal("show");
      setTimeout(() => {
        location.href = "users/profile";
      }, 3000);
    }
  }
</script>
