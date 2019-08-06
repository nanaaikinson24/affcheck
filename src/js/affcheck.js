import Axios from "axios";

$(function () {
	const affCheckForm = $("#affCheckForm");
	const affCheckFormBtn = $("#affCheckFormBtn");

	affCheckForm.submit(function (e) {
		e.preventDefault();
		$(".s-v-e").remove();

		const formData = new FormData();
		formData.append('search', $("#search").val());

		affCheckFormBtn.addClass('is-loading is-loading-sm').attr('disabled', '');

		Axios.post('/api/aff-check', formData)
			.then(response => {
				affCheckFormBtn.removeClass('is-loading is-loading-sm').removeAttr('disabled');
				const res = response.data;

				if (Number(res.status) === 200) {
					const data = res.DATA;

					$("#name").val(data.FULL_NAME);
					$("#employeeNumber").val(data.EMPLOYEE_NUMBER);
					$("#socialSecurity").val(data.SOCIAL_SECURITY_NUMBER);
					$("#organization").val(data.ORGANIZATION);
					$("#job").val(data.JOB);
					$("#grade").val(data.GRADE);
					$("#gradeStep").val(data.GRADE_STEP);
					$("#ministry").val(data.MINISTRY);
					$("#department").val(data.DEPARTMENT);
					$("#region").val(data.REGION);
					$("#district").val(data.DISTRICT);
					$("#contact").val(data.CONTACTNO);
					$("#email").val(data.EMAIL);
					$("#dob").val(data.DATE_OF_BIRTH);
					$("#affordability").val(data.AFFORDABILITY);

					let affordability = Number(data.AFFORDABILITY) - 10;
					if (affordability < 0) {
						affordability = 0;
					}

					$("#currentAffordability").val(affordability);

					$(".success-data").show();
					$(".error-data").hide();
				}
				else {
					$(".success-data").hide();
					$(".error-data").show().html(`<div class="alert alert-danger">${ res.msg }</div>`);
				}
			})
			.catch(err => console.log(err));
	});
});