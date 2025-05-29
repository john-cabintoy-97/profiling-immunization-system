let container = document.querySelector(".container");
let container1 = document.querySelector(".container-fluid");
let loading = document.querySelector(".loading");
let reg_hide = document.querySelector(".register_hide");
let log_hide = document.querySelector(".login_hide");

let next_btn1 = document.querySelector(".next-fieldset");

// register users
let register = document.querySelector(".register");
if (register) {
  register.addEventListener("submit", (e) => {
    e.preventDefault();
    let pass1 = register["rpassword"].value;
    let pass2 = register["confirm_password"].value;
    if (
      register["fname"].value == "" ||
      register["lname"].value == "" ||
      register["email"].value == "" ||
      register["rpassword"].value == "" ||
      register["confirm_password"].value == ""
    ) {
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Kinakailangan ang lahat ng mga patlang.")
        .dismissOthers();
    }
    else if(!validateName(register["fname"].value) || !validateName(register["lname"].value)){
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Hind wasto ang character na iyong nilagay.")
        .dismissOthers();
    }else if ((pass1.length < 8 || pass1.length > 20) || pass2.length < 8 || pass2.length > 20) {
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Kailangan ng password ng 8 character o higit pang character")
        .dismissOthers();
    }else if (!validateEmail(register["email"].value)) {
      alertify.set("notifier", "position", "bottom-left");
      alertify.warning("Maling email address.").dismissOthers();
    } else if (
      register["rpassword"].value != register["confirm_password"].value
    ) {
      alertify.set("notifier", "position", "bottom-left");
      alertify.warning("Hindi tugma ang password.").dismissOthers();
    } else {
      let registerData = new FormData();

      for (const i of new FormData(register)) {
        registerData.append(i[0], i[1]);
      }
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        body: registerData,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          if (data == "ok") {
            alertify.set("notifier", "position", "bottom-left");
            alertify.success("Registration success").dismissOthers();
            register["btn-register"].disabled = true;
            loading_show();
            setTimeout(function () {
              register["fname"].value = "";
              register["lname"].value = "";
              register["email"].value = "";
              register["rpassword"].value = "";
              register["confirm_password"].value = "";
              register["btn-register"].disabled = false;
              loading_hide();
              reg_hide.style = "display:none";
              log_hide.style = "display:block";

              alertify.set("notifier", "position", "bottom-left");
              // alertify.notify("Mag-login dito.").dismissOthers();
              alertify.notify("Mag-login dito.", "custom", 2, function () {
                console.log("dismissed");
              });
            }, 4000);
          } else if (data == "exist") {
            alertify.set("notifier", "position", "bottom-left");
            alertify.error(
              "(!) Nakarehistro na ang account gamit ang pangalan o email na ito."
            );
          }
        })
        .catch(console.error);
    }
  });
}

// login users
let login = document.querySelector(".login");
if (login) {
  login.addEventListener("submit", (e) => {
    e.preventDefault();
    if (login["email"].value == "" || login["password"].value == "") {
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Kinakailangan ang lahat ng mga patlang.")
        .dismissOthers();
    } else if (!validateEmail(login["email"].value)) {
      alertify.set("notifier", "position", "bottom-left");
      alertify.warning("Maling email address.").dismissOthers();
    } else {
      let loginData = new FormData();

      for (const i of new FormData(login)) {
        loginData.append(i[0], i[1]);
      }
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        body: loginData,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          
          if (data == "login_dash") {
            login["btn-login"].disabled = true;
            loading_show();
            alertify.set("notifier", "position", "bottom-left");
            alertify.success("Tagumpay sa pag-log in").dismissOthers();

            setTimeout(function () {
              login["btn-login"].disabled = false;
              loading_hide();
              location.href = "dashboard.php";
            }, 5000);
          } else if (data == "login_admin") {
            login["btn-login"].disabled = true;
            loading_show();
            alertify.set("notifier", "position", "bottom-left");
            alertify
              .success("Administrator privilege granted.")
              .dismissOthers();

            setTimeout(function () {
              login["btn-login"].disabled = false;
              loading_hide();
              location.href = "dashboard.php";
            }, 5000);
          } else if (data == "login_home") {
            login["btn-login"].disabled = true;
            loading_show();
            alertify.set("notifier", "position", "bottom-left");
            alertify.success("Tagumpay sa pag-log in").dismissOthers();

            setTimeout(function () {
              login["btn-login"].disabled = false;
              loading_hide();
              location.href = "enroll-patients.php";
            }, 5000);
          } else if (data == "pass_not") {
            alertify.set("notifier", "position", "bottom-left");
            alertify.warning("Hindi tugma ang password.").dismissOthers();
          } else if (data == "contact_admin") {
            alertify.set("notifier", "position", "bottom-left");
            alertify
              .warning(
                "Makipag-ugnayan sa administrator upang aprubahan ang iyong pagpaparehistro kung ikaw ay kawani."
              )
              .dismissOthers();
          } else {
            alertify.set("notifier", "position", "bottom-left");
            alertify.error("Walang nahanap na account.").dismissOthers();
          }
        })
        .catch(console.error);
    }
  });
}

// enrolled form insert
let enrolled = document.querySelector(".enrolled");
if (enrolled) {
  enrolled.addEventListener("submit", (e) => {
    e.preventDefault();
    let contactnumber = enrolled["contactnumber"].value;
    if (
      enrolled["lname"].value == "" ||
      enrolled["fname"].value == "" ||
      enrolled["mname"].value == "" ||
      enrolled["gender"].value == "" ||
      enrolled["bdate"].value == "" ||
      enrolled["birthplace"].value == "" ||
      enrolled["bloodtype"].value == "" ||
      enrolled["spousename"].value == "" ||
      enrolled["civilstatus"].value == "" ||
      enrolled["educationalattainment"].value == "" ||
      enrolled["employmentstatus"].value == "" ||
      enrolled["familymember"].value == "" ||
      enrolled["contactnumber"].value == "" ||
      enrolled["mothersname"].value == "" ||
      enrolled["residentialAddress"].value == "" ||
      enrolled["dswdnhts"].value == "" ||
      enrolled["fourpsmember"].value == "" ||
      enrolled["phmember"].value == "" ||
      enrolled["psbmember"].value == ""
    ) {
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Kinakailangan ang lahat ng mga patlang.")
        .dismissOthers();
    } else if (contactnumber.length != 11) {
      alertify.set("notifier", "position", "bottom-left");
      alertify.warning("Kinakailangan ang 11 na numero.").dismissOthers();
    } else {
      let enrolledData = new FormData();

      for (const i of new FormData(enrolled)) {
        enrolledData.append(i[0], i[1]);
      }
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        body: enrolledData,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          if (data == "enrolled_ok") {
            loading.style = "display:block";
            container1.style = "opacity: 0.6";
            enrolled["btn-enrolled"].disabled = true;
            alertify.set("notifier", "position", "bottom-left");
            alertify
              .success("Matagumpay na na-enroll ang pasyente.")
              .dismissOthers();

            setTimeout(function () {
              // loading.style = "display:none";
              // container1.style = "opacity:1";
              // enrolled["btn-enrolled"].disabled = true;
              location.href = "home.php";
            }, 9000);
          }
        })
        .catch(console.error);
    }
  });
}

// enrolled form edit
let enrolled_view_form = document.querySelector(".enrolled_view_form");
if (enrolled_view_form) {
  enrolled_view_form.addEventListener("submit", (e) => {
    e.preventDefault();
    let enrolled_view_formData = new FormData();

    for (const i of new FormData(enrolled_view_form)) {
      enrolled_view_formData.append(i[0], i[1]);
    }

    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      body: enrolled_view_formData,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        
        if (data == "enrolled_update_ok") {
          enrolled_view_form["save"].style = "display: none";

          loading.style = "display:block";
          enrolled_view_form.style = "opacity: 0.6";

          alertify.set("notifier", "position", "bottom-left");
          alertify
            .success("Matagumpay na na-bago ang impormasyon ng pasyente.")
            .dismissOthers();

          setTimeout(function () {
            loading.style = "display:none";
            enrolled_view_form.style = "opacity:1";
            enrolled_view_form["edit"].style = "display: block";
            location.reload();
          }, 2000);
        }
      })
      .catch(console.error);
  });
}

// form one
let form_one = document.querySelector(".form_one");
if (form_one) {
  form_one.addEventListener("submit", (e) => {
    e.preventDefault();

    if (
      form_one["fname"].value == "" ||
      form_one["lname"].value == "" ||
      form_one["mname"].value == "" ||
      form_one["gender"].value == "" ||
      form_one["bdate"].value == "" ||
      form_one["mothersname"].value == "" ||
      form_one["address"].value == ""
    ) {
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Kinakailangan ang lahat ng mga patlang.")
        .dismissOthers();
    } else {
      let formoneData = new FormData();

      for (const i of new FormData(form_one)) {
        formoneData.append(i[0], i[1]);
      }
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        body: formoneData,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          
          if (data == "save") {
            loading.style = "display:block";
            form_one.style = "opacity: 0.6";
            alertify.set("notifier", "position", "bottom-left");
            alertify.success("Matagumpay na nabago.").dismissOthers();

            setTimeout(function () {
              location.reload();
              loading.style = "display:none";
              form_one.style = "opacity:1";

              form_one["fname"].disabled = true;
              form_one["lname"].disabled = true;
              form_one["mname"].disabled = true;
              form_one["gender"].disabled = true;
              form_one["bdate"].disabled = true;
              form_one["mothersname"].disabled = true;
              form_one["address"].disabled = true;
              form_one["facilitycode"].disabled = true;
              form_one["sestatus"].disabled = true;
              form_one["first_time"].disabled = true;
              form_one["delivery"].disabled = true;

              next_btn1.disabled = false;
              form_one["save"].style = "display: none";
              form_one["edit"].style = "display: block";

              form_one.reset();
            }, 2000);
          }
        })
        .catch(console.error);
    }
  });
}

// form two
let form_two = document.querySelector(".form_two");
if (form_two) {
  form_two.addEventListener("submit", (e) => {
    e.preventDefault();
    let formtwoData = new FormData();

    for (const i of new FormData(form_two)) {
      formtwoData.append(i[0], i[1]);
    }

    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      body: formtwoData,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        
        if (data == "save") {
          loading.style = "display:block";
          form_two.style = "opacity: 0.6";
          alertify.set("notifier", "position", "bottom-left");
          alertify.success("Matagumpay na nabago.").dismissOthers();

          setTimeout(function () {
            loading.style = "display:none";
            form_two.style = "opacity:1";

            form_two["length_birth"].disabled = true;
            form_two["weight_birth"].disabled = true;
            form_two["weight_birth_status"].disabled = true;
            form_two["breast_feeding"].disabled = true;
            form_two["bcg"].disabled = true;
            form_two["bbd"].disabled = true;
            form_two["nutrition_age_months"].disabled = true;
            form_two["nutrition_length"].disabled = true;
            form_two["nutrition_length_date"].disabled = true;
            form_two["nutrition_weight"].disabled = true;
            form_two["nutrition_weight_date"].disabled = true;
            form_two["nutrition_status"].disabled = true;
            form_two["low_birth_first_month"].disabled = true;
            form_two["low_birth_second_month"].disabled = true;
            form_two["low_birth_third_month"].disabled = true;
            form_two["immunization_first_dose"].disabled = true;
            form_two["immunization_second_dose"].disabled = true;
            form_two["immunization_third_dose"].disabled = true;

            document.querySelector(".previous_two_btn").disabled = false;
            document.querySelector(".next_two_btn").disabled = false;
            form_two["save"].style = "display: none";
            form_two["edit"].style = "display: block";

        
            //history.go();
           location.reload();

            document.querySelector(".fieldset_form_one").style =
              "display: none; position: relative; opacity:0;";
            document.querySelector(".fieldset_form_two").style =
              "display: block; opacity:1;";

            form_two.reset();
          }, 2000);
        }
      })
      .catch(console.error);
  });
}



// form three
let form_three = document.querySelector(".form_three");
if (form_three) {
  form_three.addEventListener("submit", (e) => {
    e.preventDefault();
    let formthreeData = new FormData();

    for (const i of new FormData(form_three)) {
      formthreeData.append(i[0], i[1]);
    }

    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      body: formthreeData,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
    
        if (data == "save") {
          loading.style = "display:block";
          form_three.style = "opacity: 0.6";
          alertify.set("notifier", "position", "bottom-left");
          alertify.success("Matagumpay na nabago.").dismissOthers();

          setTimeout(function () {
            loading.style = "display:none";
            form_three.style = "opacity:1";

            form_three["opv_first_dose"].disabled = true;
            form_three["opv_second_dose"].disabled = true;
            form_three["opv_third_dose"].disabled = true;
            form_three["pcv_first_dose"].disabled = true;
            form_three["pcv_second_dose"].disabled = true;
            form_three["pcv_third_dose"].disabled = true;
            form_three["ipv_third_dose"].disabled = true;
            form_three["exlusive_breastfed_one_month"].disabled = true;
            form_three["exlusive_breastfed_one_month_date"].disabled = true;
            form_three["exlusive_breastfed_two_month"].disabled = true;
            form_three["exlusive_breastfed_two_month_date"].disabled = true;
            form_three["exlusive_breastfed_three_month"].disabled = true;
            form_three["exlusive_breastfed_three_month_date"].disabled = true;
            form_three["exlusive_breastfed_four_month"].disabled = true;
            form_three["exlusive_breastfed_four_month_date"].disabled = true;
            form_three["nutrition_age_month"].disabled = true;
            form_three["nutrition_length_month"].disabled = true;
            form_three["nutrition_weight_month"].disabled = true;
            form_three["nutrition_status_month"].disabled = true;
            // form_three["exclusive_breastfeeding_option"].disabled = true;
            // form_three["exclusive_breastfeeding_date"].disabled = true;

            document.querySelector(".previous_three_btn").disabled = false;
            document.querySelector(".next_three_btn").disabled = false;
            form_three["save"].style = "display: none";
            form_three["edit"].style = "display: block";

            //history.go();
           // window.location.assign();
           location.reload();
            document.querySelector(".fieldset_form_one").style =
              "display: none; position: relative; opacity:0;";
            document.querySelector(".fieldset_form_two").style =
              "display: block; opacity:1;";

            form_three.reset();
          }, 2000);
        }
      })
      .catch(console.error);
  });
}

// form four
let form_four = document.querySelector(".form_four");
if (form_four) {
  form_four.addEventListener("submit", (e) => {
    e.preventDefault();
    let formfourData = new FormData();

    for (const i of new FormData(form_four)) {
      formfourData.append(i[0], i[1]);
    }

    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      body: formfourData,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        
        if (data == "save") {
          loading.style = "display:block";
          form_four.style = "opacity: 0.6";
          alertify.set("notifier", "position", "bottom-left");
          alertify.success("Matagumpay na nabago.").dismissOthers();

          setTimeout(function () {
            loading.style = "display:none";
            form_four.style = "opacity:1";

            form_four["feeding_six_months"].disabled = true;
            form_four["feeding_six_months_duration"].disabled = true;
            form_four["vitamin_a_date"].disabled = true;
            form_four["mnp_date"].disabled = true;
            form_four["mmr_date_dose_one"].disabled = true;
            form_four["nutrional_age_months"].disabled = true;
            form_four["mmr_date_dose_one"].disabled = true;
            form_four["nutrional_age_months"].disabled = true;
            form_four["nutrional_length"].disabled = true;
            form_four["nutrional_weight"].disabled = true;
            form_four["nutritional_status"].disabled = true;
            form_four["mmr_date_dose_twi"].disabled = true;
            form_four["fic_date"].disabled = true;
            form_four["remarks"].disabled = true;

            document.querySelector(".previous_four_btn").disabled = false;
            form_four["save"].style = "display: none";
            form_four["edit"].style = "display: block";

            //history.go();
            //window.location.assign();
            location.reload();

            document.querySelector(".fieldset_form_one").style =
              "display: none; position: relative; opacity:0;";
            document.querySelector(".fieldset_form_two").style =
              "display: none; position: relative; opacity:0;";
            document.querySelector(".fieldset_form_three").style =
              "display: none; position: relative; opacity:0;";
            document.querySelector(".fieldset_form_four").style =
              "display: block; opacity:1;";

            form_four.reset();
          }, 2000);
        }
      })
      .catch(console.error);
  });
}

let individualmodal = document.querySelector(".individualmodal");
if (individualmodal) {
  individualmodal.addEventListener("submit", (e) => {
    e.preventDefault();
    let individualmodalData = new FormData();

    for (const i of new FormData(individualmodal)) {
      individualmodalData.append(i[0], i[1]);
    }

    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      body: individualmodalData,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        if(data == "save"){
          alertify.set("notifier", "position", "bottom-left");
          alertify.success("Matagumpay na nai-save.").dismissOthers();
          setTimeout(function () {
            location.reload();
          }, 1000);
        }
      })
      .catch(console.error);
  });
}

let individual_form = document.querySelector(".individual_view_form");
if (individual_form) {
  individual_form.addEventListener("submit", (e) => {
    e.preventDefault();
    let individual_formData = new FormData();

    for (const i of new FormData(individual_form)) {
      individual_formData.append(i[0], i[1]);
    }

    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      body: individual_formData,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        
        if(data == "save"){
          alertify.set("notifier", "position", "bottom-left");
          alertify.success("Matagumpay na nabago ang detalye.").dismissOthers();
          setTimeout(function () {
            location.reload();
          }, 1000);
        }
      })
      .catch(console.error);
  });
}

// sms
let smsModalForm = document.querySelector(".smsModalForm");
if (smsModalForm) {
  smsModalForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let smsmodalData = new FormData();
    let DateInput = new Date(smsModalForm["schedule_date"].value).toISOString().slice(0,10);
    let DateNow = new Date().toISOString().slice(0,10);

    for (const i of new FormData(smsModalForm)) {
      smsmodalData.append(i[0], i[1]);
    }

    if (
      smsModalForm["sender_name"].value == "" ||
      smsModalForm["contactnumber"].value == "" ||
      smsModalForm["schedule_time"].value == "" ||
      smsModalForm["schedule_date"].value == ""
    ) {
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Kinakailangan ang lahat ng mga patlang.")
        .dismissOthers();
    }else if(DateInput < DateNow){
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Hindi naaangkop ang petsang ito.")
        .dismissOthers();
    } else {
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        body: smsmodalData,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          
          if (data == "ok") {
            smsModalForm["smsbtn"].disabled = true;
            smsModalForm["schedule_time"].value = "";
            smsModalForm["schedule_date"].value = "";
            setTimeout(function () {
              alertify.set("notifier", "position", "bottom-left");
              alertify
                .success("Matagumpay na padala ang mensahe.")
                .dismissOthers();
              smsModalForm["smsbtn"].disabled = false;
              location.reload();
            }, 2000);
          } else if (data == "no") {
            alertify.set("notifier", "position", "bottom-left");
            alertify.error("Nabigong magpadala ng mensahe.").dismissOthers();
          }
        })
        .catch(console.error);
    }
  });
}

// post schedule
let notifModalForm = document.querySelector(".notifModalForm");
if (notifModalForm) {
  notifModalForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let postmodalData = new FormData();
    let DateInput = new Date(notifModalForm["schedule_date"].value).toISOString().slice(0,10);
    let DateNow = new Date().toISOString().slice(0,10);

    for (const i of new FormData(notifModalForm)) {
      postmodalData.append(i[0], i[1]);
    }

    if (
      notifModalForm["sender_name"].value == "" ||
      notifModalForm["schedule_time"].value == "" ||
      notifModalForm["schedule_date"].value == ""
    ) {
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Kinakailangan ang lahat ng mga patlang.")
        .dismissOthers();
    }else if(DateInput < DateNow){
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Hindi naaangkop ang petsang ito.")
        .dismissOthers();
    } else {
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        body: postmodalData,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          console.log(data);
          if (data == "save") {
            notifModalForm["postbtn"].disabled = true;
            notifModalForm["schedule_time"].value = "";
            notifModalForm["schedule_date"].value = "";

            setTimeout(function () {
              alertify.set("notifier", "position", "bottom-left");
              alertify.success("Nai-post na ang schedule.").dismissOthers();
              notifModalForm["postbtn"].disabled = false;
              location.reload();
            }, 2000);
          } else if (data == "no") {
            alertify.set("notifier", "position", "bottom-left");
            alertify.error("Nabigong magpadala ng mensahe.").dismissOthers();
          }
        })
        .catch(console.error);
    }
  });
}

function individual(id) {
  let modal = document.querySelector("#individualModal");

  let mo = new bootstrap.Modal(modal);
  mo.show();

  const path = "controllers/method.php";
  fetch(path, {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "add_individual=item&patient_id=" + id,
  })
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      let datas = JSON.parse(data);

      let individualmodal = document.querySelector(".individualmodal");
      individualmodal["lname"].value = datas["lastname"];
      individualmodal["fname"].value = datas["firstname"];
      individualmodal["mname"].value = datas["middlename"];
      individualmodal["suffix"].value = datas["suffix"];
      individualmodal["address"].value = datas["residentialAddress"];
      individualmodal["patient_id"].value = datas["patient_id"];
    })
    .catch(console.error);
}

function schedule(id) {
  let modal = document.querySelector("#scheduleModal");

  let mo = new bootstrap.Modal(modal);
  mo.show();
  
  const path = "controllers/method.php";
  fetch(path, {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "get_enrolled_user_sms=item&patient_id=" + id,
  })
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      let datas = JSON.parse(data);
      
      let smsSectionForm = document.querySelector(".smsModalForm");
      let notifSectionForm = document.querySelector(".notifModalForm");
      smsSectionForm["pass_id"].value =  datas["users_id"];
      smsSectionForm["contactnumber"].value = datas["contactnumber"];
      smsSectionForm["childname"].value =
        datas["firstname"] + " " + datas["lastname"] + " " + datas["suffix"];
      notifSectionForm["childname"].value =
        datas["firstname"] + " " + datas["lastname"] + " " + datas["suffix"];
      notifModalForm["users_id"].value = datas["users_id"];
      notifModalForm["pass_id"].value = datas["patient_id"];
    })
    .catch(console.error);
}

function approved(data) {
  const path = "controllers/method.php";
  fetch(path, {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "approved=item&users_id=" + data.value,
  })
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      if (data == "save") {
        location.reload();
      }
    })
    .catch(console.error);
}

function declined(data) {
  const path = "controllers/method.php";
  fetch(path, {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "declined=item&users_id=" + data.value,
  })
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      
      if (data == "save") {
        location.reload();
      }
    })
    .catch(console.error);
}

function user_delete(id) {
  let modal = document.querySelector("#userDeleteModal");

  let mo = new bootstrap.Modal(modal);
  mo.show();
  let data = document.querySelector(".userModalDelete");
  data["users_id"].value = id;
  fetch_user_enrollement(id);
  // fetch_user_individual(id);
}

function individualDelete(id){
  alertify
  .confirm(
    "",
    "Sigurado ka bang gusto mong tanggalin ang ito?",
    function () {
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "delete_individual=item&individual_treatment_id=" + id,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          
          if (data == "deleted") {
            location.reload();
          }
        })
        .catch(console.error);
    },
    function () {}
  )
  .set("labels", { ok: "Oo", cancel: "Hindi" });
}
function changepassworbyadmin(id,name){
  let modal = document.querySelector("#userChangePasswordModal");
  let data = document.querySelector(".changepassbyadminform");
  data["pass_id"].value = id;
  document.querySelector('#change_name_pass').textContent = name;
  let mo = new bootstrap.Modal(modal);
  mo.show();
}

let userModalDelete = document.querySelector(".userModalDelete");
if (userModalDelete) {
  userModalDelete.addEventListener("submit", (e) => {
    e.preventDefault();

    let id = userModalDelete["users_id"].value;
    let admin_pass = userModalDelete["admin_pass"].value;

    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: "delete_user=item&users_id=" + id + "&admin_pass=" + admin_pass,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        console.log(data);
        if (data == "save") {
          alertify.set("notifier", "position", "bottom-left");
          alertify.success("Matagumpay na tinanggal ang user.").dismissOthers();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }else if(data == "no"){
          alertify.set("notifier", "position", "bottom-left");
          alertify
            .warning("hindi tumugma ang password ng admin.")
            .dismissOthers();
        } else {
          alertify.set("notifier", "position", "bottom-left");
          alertify
            .error("merong problema sa pagtanggal ng user.")
            .dismissOthers();
        }
      })
      .catch(console.error);
  });
}

function fetch_user_enrollement(id) {
  const path = "controllers/method.php";
  fetch(path, {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "get_user_data=item&users_id=" + id,
  })
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      let delete_status = document.querySelector("#delete_enroll_status");
      if (data == "1") {
        delete_status.innerHTML = "<i class='fas fa-check text-success'> </i>";
      } else {
        delete_status.innerHTML = "<span class='text-danger'>&#10006;</span>";
      }
    })
    .catch(console.error);
}

// function fetch_user_individual(id) {
//   const path = "controllers/method.php";
//   fetch(path, {
//     method: "POST",
//     headers: { "Content-Type": "application/x-www-form-urlencoded" },
//     body: "get_user_individual=item&users_id=" + id,
//   })
//     .then((response) => {
//       return response.text();
//     })
//     .then((data) => {
//       let delete_status = document.querySelector("#delete_individual_status");
//       if (data == "1") {
//         delete_status.innerHTML = "<i class='fas fa-check text-success'> </i>";
//       } else {
//         delete_status.innerHTML = "&#10006;";
//       }
//     })
//     .catch(console.error);
// }

function staff_delete(id) {
  let modal = document.querySelector("#staffDeleteModal");

  let mo = new bootstrap.Modal(modal);
  mo.show();
  let data = document.querySelector(".staffModalDelete");
  data["users_id"].value = id;
}

let staffModalDelete = document.querySelector(".staffModalDelete");
if (staffModalDelete) {
  staffModalDelete.addEventListener("submit", (e) => {
    e.preventDefault();

    let id = staffModalDelete["users_id"].value;
    let admin_pass1 = staffModalDelete["admin_pass"].value;
    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: "delete_staff=item&users_id=" + id + "&admin_pass=" + admin_pass1,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        if (data == "save") {
          alertify.set("notifier", "position", "bottom-left");
          alertify
            .success("Matagumpay na tinanggal ang kawani.")
            .dismissOthers();
          setTimeout(function () {
            location.reload();
          }, 2000);
        } else if(data == "no"){
          alertify.set("notifier", "position", "bottom-left");
          alertify
            .warning("hindi tumugma ang password ng admin.")
            .dismissOthers();
        } else {
          alertify.set("notifier", "position", "bottom-left");
          alertify
            .error("merong problema sa pagtanggal ng kawani.")
            .dismissOthers();
        }
      })
      .catch(console.error);
  });
}

let manual_register_form = document.querySelector(".manual_register_form");
if (manual_register_form) {
  let lname = manual_register_form["rlname"];
  let fname = manual_register_form["rfname"];
  let email = manual_register_form["email"];
  let password = manual_register_form["rpassword"];

  manual_register_form.addEventListener("keyup", (e) => {
    if (
      lname.value != "" &&
      fname.value != "" &&
      email.value != "" &&
      validateEmail(email.value) &&
      password.value != ""
    ) {
      manual_register_form["next"].disabled = false;
    } else {
      manual_register_form["next"].disabled = true;
    }
  });

  manual_register_form.addEventListener("submit", (e) => {
    e.preventDefault();
    let manual_register_formData = new FormData();

    for (const i of new FormData(manual_register_form)) {
      manual_register_formData.append(i[0], i[1]);
    }
    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      body: manual_register_formData,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        
        if (data == "enrolled_ok") {
          alertify.set("notifier", "position", "bottom-left");
          alertify
            .success("Matagumpay na na-enroll ang pasyente.")
            .dismissOthers();

          setTimeout(function () {
            location.reload();
          }, 2000);
        } else {
          alertify.set("notifier", "position", "bottom-left");
          alertify.error("Hindi na na-enroll ang pasyente.").dismissOthers();
        }
      })
      .catch(console.error);
  });
}

let admin_setup = document.querySelector(".admin_setup");
if (admin_setup) {
  let lname = admin_setup["slname"];
  let fname = admin_setup["sfname"];
  let email = admin_setup["email"];
  let password = admin_setup["rpassword"];

  admin_setup.addEventListener("keyup", (e) => {
    if (
      lname.value != "" &&
      fname.value != "" &&
      email.value != "" &&
      validateEmail(email.value) &&
      password.value != ""
    ) {
      admin_setup["setup_btn"].disabled = false;
    } else {
      admin_setup["setup_btn"].disabled = true;
    }
  });
  admin_setup.addEventListener("submit", (e) => {
    e.preventDefault();
    let admin_setupData = new FormData();

    for (const i of new FormData(admin_setup)) {
      admin_setupData.append(i[0], i[1]);
    }
    let pass = admin_setup["rpassword"].value;

    if (pass.length < 8 || pass.length > 20) {
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning("Kailangan ng password ng 8 character o higit pang character")
        .dismissOthers();
    } else {
      const path = "controllers/setupController.php";
      fetch(path, {
        method: "POST",
        body: admin_setupData,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          
          if (data == "ok") {
            alertify.set("notifier", "position", "bottom-left");
            alertify
              .success("Administrator created. Log-in now")
              .dismissOthers();
            setTimeout(function () {
              location.reload();
            }, 2000);
          } else {
            alertify.set("notifier", "position", "bottom-left");
            alertify
              .warning("Somthing wrong. execution failed.")
              .dismissOthers();
          }
        })
        .catch(console.error);
    }
  });
}

function profileEdit() {
  let profileEdit = document.querySelector(".profile_edit");

  alertify
    .confirm(
      "",
      "Sigurado ka bang gusto mong i-edit ang form na ito?",
      function () {
        profileEdit["fname"].disabled = false;
        profileEdit["lname"].disabled = false;
        profileEdit["email"].disabled = false;
        profileEdit["profile_edit_btn"].style = "display: none";
        profileEdit["profile_submit_btn"].style = "display: block";
      },
      function () {
        profileEdit["fname"].disabled = true;
        profileEdit["lname"].disabled = true;
        profileEdit["email"].disabled = true;
        profileEdit["profile_edit_btn"].style = "display: block";
        profileEdit["profile_submit_btn"].style = "display: none";
      }
    )
    .set("labels", { ok: "Oo", cancel: "Hindi" });
}

let profile = document.querySelector(".profile_edit");
if (profile) {
  profile.addEventListener("submit", (e) => {
    e.preventDefault();

    let profileData = new FormData();

    for (const i of new FormData(profile)) {
      profileData.append(i[0], i[1]);
    }
    const path = "controllers/method.php";
    fetch(path, {
      method: "POST",
      body: profileData,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        if (data == "changes") {
          alertify
            .success("Matagumpay na na-bago ang impormasyon ng iyong profile.")
            .dismissOthers();
          setTimeout(function () {
            location.reload();
          }, 1000);
        } else {
          alertify.warning("Somthing wrong. execution failed.").dismissOthers();
        }
      })
      .catch(console.error);
  });
}

let change_password_form = document.querySelector(".change_password_form");
if (change_password_form) {
  change_password_form.addEventListener("keyup", (e) => {
    if (
      change_password_form["old_pass"].value != "" &&
      change_password_form["new_pass"].value != ""
    ) {
      change_password_form["change_pass_btn"].disabled = false;
    } else {
      change_password_form["change_pass_btn"].disabled = true;
    }
  });
  change_password_form.addEventListener("submit", (e) => {
    e.preventDefault();
    let pass = change_password_form["new_pass"].value;
    if (pass.length < 8 || pass.length > 20) {
      alertify.set("notifier", "position", "bottom-left");
      alertify
        .warning(
          "Kailangan ng bagong password ng 8 character o higit pang character"
        )
        .dismissOthers();
    } else {
      let change_password_formData = new FormData();

      for (const i of new FormData(change_password_form)) {
        change_password_formData.append(i[0], i[1]);
      }
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        body: change_password_formData,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
      
          if (data == "pass_updated") {
            alertify
              .success("Matagumpay na na-bago ang password ng iyong profile.")
              .dismissOthers();
            setTimeout(function () {
              location.reload();
            }, 1000);
          } else if (data == "pass_not") {
            alertify
              .warning("hindi tugma ang lumang password.")
              .dismissOthers();
          } else {
            alertify
              .warning("Something wrong. execution failed.")
              .dismissOthers();
          }
        })
        .catch(console.error);
    }
  });
}
function profileDelete(id) {
  alertify
    .confirm(
      "",
      "Sigurado ka bang gusto mong tanggalin ang iyong account?",
      function () {
        const path = "controllers/method.php";
        fetch(path, {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: "user_delete_profile=item&users_id=" + id,
        })
          .then((response) => {
            return response.text();
          })
          .then((data) => {
            
            if (data == "deleted") {
              location.reload();
            }
          })
          .catch(console.error);
      },
      function () {}
    )
    .set("labels", { ok: "Oo", cancel: "Hindi" });
}

function profileAdminDelete(id){
  alertify
  .confirm(
    "",
    "Sigurado ka bang gusto mong tanggalin ang iyong account?",
    function () {
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "admin_delete_profile=item&users_id=" + id,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
        
          if (data == "deleted") {
            location.href = "index.php";
          }
        })
        .catch(console.error);
    },
    function () {}
  )
  .set("labels", { ok: "Oo", cancel: "Hindi" });
}
let changepassbyadminform = document.querySelector('.changepassbyadminform');
if(changepassbyadminform){
  changepassbyadminform.addEventListener("keyup", (e) => {
    if (
      changepassbyadminform['admin_pass'].value != "" &&
      changepassbyadminform['new_user_pass'].value != ""
    ) {
      changepassbyadminform["change_pass_btn"].disabled = false;
    } else {
      changepassbyadminform["change_pass_btn"].disabled = true;
    }
  });
  changepassbyadminform.addEventListener('submit', (e)=> {
      e.preventDefault();
      let id = changepassbyadminform['pass_id'].value;
      let admin_pass = changepassbyadminform['admin_pass'].value;
      let user_pass = changepassbyadminform['new_user_pass'].value;
      if (user_pass.length < 8 || user_pass.length > 20) {
        alertify.set("notifier", "position", "bottom-left");
        alertify
          .warning("Kailangan ng password ng 8 character o higit pang character")
          .dismissOthers();
      }else{
      const path = "controllers/method.php";
        fetch(path, {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: "user_change_pass_by_admin=item&users_id=" + id + "&admin_pass=" + admin_pass + "&user_pass="+ user_pass,
        })
          .then((response) => {
            return response.text();
          })
          .then((data) => {
          if(data == "pass_updated"){
              alertify
              .success("Matagumpay na na-bago ang password ng.")
              .dismissOthers();
            setTimeout(function () {
              location.reload();
            }, 1000);
            }else if(data == "no"){
              alertify
              .warning("hindi tugma ang admin password.")
              .dismissOthers();
            }
          
           
          })
          .catch(console.error);
        }
  });
}

function schedulesmsDelete(){
  alertify
  .confirm(
    "",
    "Sigurado ka bang gusto mong burahin lahat ng rekord?",
    function () {
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "schedsmstruncate=item",
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
  
          if (data == "deleted") {
            location.reload();
          }
        })
        .catch(console.error);
    },
    function () {}
  )
  .set("labels", { ok: "Oo", cancel: "Hindi" });
}
function scheduleDelete(){
  alertify
  .confirm(
    "",
    "Sigurado ka bang gusto mong burahin lahat ng rekord?",
    function () {
      const path = "controllers/method.php";
      fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "schedtruncate=item",
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
      
          if (data == "deleted") {
            location.reload();
          }
        })
        .catch(console.error);
    },
    function () {}
  )
  .set("labels", { ok: "Oo", cancel: "Hindi" });
}
// =======================================================================================================================
function loading_show() {
  container.style = "opacity: 0.6";
  loading.style = "display:block";
}
function loading_hide() {
  container.style = "opacity: 1";
  loading.style = "display:none";
}
const validateEmail = (email) => {
  return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

const validateName = (string_txt) => {
  let regN = /^[a-zA-Z ]+$/;
  return regN.test(string_txt);
}
