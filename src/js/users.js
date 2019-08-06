import Axios from "axios";
import Swal from "sweetalert2";

let id;

$(function () {
	const userForm = $("#userForm");
	const userFormBtn = $("#userFormBtn");

	// Save data
	userForm.submit(function(e) {
		e.preventDefault();
		$(".s-v-e").remove();

		const formData = new FormData();
		formData.append('firstName', $("#firstName").val());
		formData.append('lastName', $("#lastName").val());
		formData.append('email', $("#email").val());
		formData.append('role', $("#role").val());
		formData.append('status', $("#status").val());

		userFormBtn.addClass('is-loading is-loading-sm').attr('disabled', '');

		let url = '/api/users';
		if (id) {
			url = '/api/users/' + id;
		}

		Axios.post(url, formData)
			.then(response => {
				userFormBtn.removeClass('is-loading is-loading-sm').removeAttr('disabled');
				const res = response.data;

				if (res.status === 200) {
					Swal.fire("Success", res.message, "success");
					$("#dataModal").modal("hide");

					if (!id) {
						const row = `
							<tr>
								<td></td>
								<td>${ res.data.first_name + ' ' + res.data.last_name  }</td>
								<td class="text-capitalize">${ res.data.role  }</td>
								<td class="text-capitalize">${ res.data.role  }</td>
								<td>
									<button class="btn btn-sm btn-primary edit-user" data-id="${res.data.mask_id}">
										<i class="fas fa-edit"></i>						
									</button>
									<button class="btn btn-sm btn-danger delete-user" data-id="${res.data.mask_id}">
										<i class="fas fa-trash"></i>								
									</button>
								</td>
							</tr>
						`;

						$("#dataTable tbody").prepend(row);
					}
					else {
						const row = `
							<td></td>
							<td>${ res.data.first_name + ' ' + res.data.last_name  }</td>
							<td class="text-capitalize">${ res.data.role  }</td>
							<td class="text-capitalize">${ res.data.role  }</td>
							<td>
								<button class="btn btn-sm btn-primary edit-user" data-id="${res.data.mask_id}">
									<i class="fas fa-edit"></i>						
								</button>
								<button class="btn btn-sm btn-danger delete-user" data-id="${res.data.mask_id}">
									<i class="fas fa-trash"></i>								
								</button>
							</td>
						`;

						$(`#row-` + id).html(row);
					}
				}
				else {
					if (res.status === 400) {
						$.each(res.errors, function(k, v) {
							$("#" + k).after(v);
						})
					}
					else {
						Swal.fire('Error', res.message, 'error');
					}
				}
			})
			.catch(err => console.log(err));
	});

	// View data
	$(document).on('click', '.edit-user', function () {
		const self = $(this);
		const i = self.data('id');

		if (i) {
			self.addClass('is-loading is-loading-sm').attr('disabled', '');

			Axios.get('/api/users/' + i)
				.then(response => {
					self.removeClass('is-loading is-loading-sm').removeAttr('disabled');
					const res = response.data;

					if (res.status === 200) {
						$("#firstName").val(res.data.first_name);
						$("#lastName").val(res.data.last_name);
						$("#email").val(res.data.email);
						$("#status").val(res.data.status);
						$("#role").val(res.data.role);

						$("#email").attr('disabled', '');

						// Set id
						id = i;

						$("#dataModal").modal({
							backdrop: "static"
						})
					}
				})
				.catch(err => console.log(err));
		}
	});

	// Hidden modal
	$('#dataModal').on('hidden.bs.modal', function (e) {
		userFormBtn.removeClass('is-loading is-loading-sm').removeAttr('disabled');
		userForm[0].reset();
		$("#email").removeAttr('disabled');
		$(".s-v-e").remove();
		id = null;
	})
});