import Axios from "axios";
import device from "current-device";

$(function() {
  const coordinates = { latitude: "", longitude: "" };
  const affCheckForm = $("#affCheckForm");
  const affCheckFormBtn = $("#affCheckFormBtn");

  /* if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      coordinates.latitude = position.coords.latitude;
      coordinates.longitude = position.coords.longitude;
    });
  } else {
    
  } */

  affCheckForm.submit(function(e) {
    e.preventDefault();
    $(".s-v-e").remove();

    const formData = new FormData();
    const device = getPlatformType();
    formData.append("search", $("#search").val());
    formData.append("device", device);
    formData.append("longitude", coordinates.longitude);
    formData.append("latitude", coordinates.latitude);

    affCheckFormBtn.addClass("is-loading is-loading-sm").attr("disabled", "");

    if (coordinates.latitude && coordinates.longitude) {
      getLocation(coordinates.latitude, coordinates.longitude).then(
        response => {
          formData.append("location", response.display_name);
          getResults(formData, affCheckFormBtn);
        }
      );
    } else {
      getResults(formData, affCheckFormBtn);
    }
  });
});

function getPlatformType() {
  return device.type;
}

async function getLocation(lat, lon) {
  const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;
  try {
    let response = await fetch(url);
    let res = await response.json();
    return res;
  } catch (error) {
    console.log(error);
  }
}

function getResults(formData, affCheckFormBtn) {
  Axios.post("/api/aff-check", formData)
    .then(response => {
      affCheckFormBtn
        .removeClass("is-loading is-loading-sm")
        .removeAttr("disabled");
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
      } else {
        $(".success-data").hide();
        $(".error-data")
          .show()
          .html(`<div class="alert alert-danger">${res.msg}</div>`);
      }
    })
    .catch(err => console.log(err));
}

function tryAPIGeolocation() {
  jQuery
    .post(
      "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyCaZWEPwS3cHXIDrXtCNRA6YE6TfgFjIys",
      function(success) {
        coordinates.latitude = success.location.lat;
        coordinates.longitude = success.location.lng;
      }
    )
    .fail(function(err) {
      alert("API Geolocation error! \n\n" + err);
    });
}
