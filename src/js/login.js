require("./bootstrap");
import Axios from "axios";

$(function () {
	const loginForm = $("#loginForm");
	const loginFormBtn = $("#loginFormBtn");

	loginForm.submit(function (e) {
		e.preventDefault();
		$(".s-v-e").remove();

		const formData = new FormData();
		formData.append("email", $("#email").val());
		formData.append("password", $("#password").val());

		loginFormBtn.addClass("is-loading is-loading-sm").attr("disable", "");

		Axios.post('/api/login', formData)
			.then(response => {
				loginFormBtn.removeClass("is-loading is-loading-sm").attr("disable");
				const res = response.data;

				if (res.status === 200) {
					$(".login-card").hide();
					$(".success-content")
						.html(`<div class="alert alert-success">${res.message}</div>`)
						.show();
					setTimeout(() => {
						window.location.href = `${res.link}`;
					}, 500);
				}
				else {
					if (res.status === 400) {
						$.each(res.errors, function(k, v) {
							$("#" + k).after(v);
						});
					}
					else {
						$(".formMsg").html(`<div class="alert alert-danger s-v-e">${res.message}</div>`);
					}
				}
			})
			.catch(err => {
				console.log(err);
			})
	});
});