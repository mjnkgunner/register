function tien() {
  let anh1 = document.querySelector(".anh1");
  let anh2 = document.querySelector(".anh2");
  let anh3 = document.querySelector(".anh3");

  let topwek = document.querySelector(".topwek");
  let anhv1 = document.querySelector("#anhv1");
  let anhv2 = document.querySelector("#anhv2");
  let anhv3 = document.querySelector("#anhv3");

  let imgTrongAnhv1 = anhv1.querySelector("img");
  let imgTrongAnhv2 = anhv2.querySelector("img");
  let imgTrongAnhv3 = anhv3.querySelector("img");

  anh1.classList.replace("anh1", "temp");
  anh2.classList.replace("anh2", "anh1");
  anh3.classList.replace("anh3", "anh2");
  anh1.classList.replace("temp", "anh3");

  console.log(getComputedStyle(imgTrongAnhv1).height);
  console.log(getComputedStyle(imgTrongAnhv2).height);
  console.log(getComputedStyle(imgTrongAnhv3).height);

  if (getComputedStyle(imgTrongAnhv3).height > "100px") {
    topwek.style.background = "rgb(255, 196, 160)";
  } else if (getComputedStyle(imgTrongAnhv1).height > "100px") {
    topwek.style.background = "rgb(91, 91, 91)";
  } else if (getComputedStyle(imgTrongAnhv2).height > "100px") {
    topwek.style.background = "rgb(219, 219, 219)";
  }
}
function lui() {
  let anh1 = document.querySelector(".anh1");
  let anh2 = document.querySelector(".anh2");
  let anh3 = document.querySelector(".anh3");

  let topwek = document.querySelector(".topwek");
  let anhvc1 = document.querySelector("#anhv1");
  let anhvc2 = document.querySelector("#anhv2");
  let anhvc3 = document.querySelector("#anhv3");

  let imgAnhv1 = anhvc1.querySelector("img");
  let imgAnhv2 = anhvc2.querySelector("img");
  let imgAnhv3 = anhvc3.querySelector("img");

  console.log(getComputedStyle(imgAnhv1).height);
  anh1.classList.replace("anh1", "temp");
  anh3.classList.replace("anh3", "anh1");
  anh2.classList.replace("anh2", "anh3");
  anh1.classList.replace("temp", "anh2");
  if (getComputedStyle(imgAnhv3).height > "100px") {
    topwek.style.background = "rgb(91, 91, 91)";
  } else if (getComputedStyle(imgAnhv1).height > "100px") {
    topwek.style.background = "rgb(219, 219, 219)";
  } else if (getComputedStyle(imgAnhv2).height > "100px") {
    topwek.style.background = "rgb(255, 196, 160)";
  }
}
document.addEventListener("DOMContentLoaded", function () {
  let inputs = document.querySelectorAll(".login_form input");

  inputs.forEach((input) => {
    input.addEventListener("focus", function () {
      let label = this.previousElementSibling;
      label.style.bottom = "35px";
      label.style.fontSize = "14px";
      label.style.opacity = "1";
    });

    input.addEventListener("blur", function () {
      let label = this.previousElementSibling;
      if (this.value === "") {
        label.style.bottom = "5px";
        label.style.fontSize = "16px";
        label.style.opacity = "0.7";
      }
    });
  });
});
function hienform() {
  const formP = document.querySelector(".form_login");
  formP.style.opacity = "1";
  formP.style.pointerEvents = "all";
  console.log("meo meo");
}
