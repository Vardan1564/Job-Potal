const btnJS = document.getElementById("btnJS");
const btnCompany = document.getElementById("btnCompany");
const formJobSeeker = document.getElementById("formJobSeeker");
const formCompany = document.getElementById("formCompany");

const toggleForms = (showJobSeeker) => {
  if(showJobSeeker) {
    formJobSeeker.classList.remove("hidden");
    formCompany.classList.add("hidden");
    btnJS.classList.add("active");
    btnCompany.classList.remove("active");
  }
  else {
    formCompany.classList.remove("hidden");
    formJobSeeker.classList.add("hidden");
    btnCompany.classList.add("active");
    btnJS.classList.remove("active");
  }
};

btnJS.addEventListener("click", () => toggleForms(true));
btnCompany.addEventListener("click", () => toggleForms(false));
