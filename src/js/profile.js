import Axios from "axios";
import Swal from "sweetalert2";

const passwordForm = $("#passwordForm");
const passwordFormBtn = $("#passwordFormBtn");
const personalForm = $("#personalForm");
const personalFormBtn = $("#personalFormBtn");

$(function() {
  // Update password
  passwordForm.submit(function(e) {
    e.preventDefault();
    $(".s-v-e").remove();

    const formData = new FormData();
    formData.append("opassword", $("#opassword").val());
    formData.append("password", $("#password").val());
    formData.append("cpassword", $("#cpassword").val());

    passwordFormBtn.addClass("is-loading is-loading-sm").attr("disabled", "");
    Axios.post("/api/profile/update-password", formData)
      .then(response => {
        passwordFormBtn
          .removeClass("is-loading is-loading-sm")
          .removeAttr("disabled");
        const res = response.data;

        if (res.status === 200) {
          Swal.fire("Success", res.msg, "success");
          passwordForm[0].reset();
          setTimeout(() => {
            window.location.href = baseURL + "logout";
          }, 2000);
        } else {
          if (res.status === 400) {
            $.each(res.errors, function(k, v) {
              $("#" + k).after(v);
            });
          } else {
            Swal.fire("Error", res.msg, "error");
          }
        }
      })
      .catch(err => console.log(err));
  });

  // Update details
  personalForm.submit(function(e) {
    e.preventDefault();
    $(".s-v-e").remove();

    const formData = new FormData();
    formData.append("firstName", $("#firstName").val());
    formData.append("lastName", $("#lastName").val());
    formData.append("phone", $("#phone").val());

    personalFormBtn.addClass("is-loading is-loading-sm").attr("disabled", "");
    Axios.post("/api/profile/update-details", formData)
      .then(response => {
        personalFormBtn
          .removeClass("is-loading is-loading-sm")
          .removeAttr("disabled");
        const res = response.data;

        if (res.status === 200) {
          Swal.fire("Success", res.msg, "success");
          personalForm[0].reset();
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        } else {
          if (res.status === 400) {
            $.each(res.errors, function(k, v) {
              $("#" + k).after(v);
            });
          } else {
            Swal.fire("Error", res.msg, "error");
          }
        }
      })
      .catch(err => console.log(err));
  });
});
