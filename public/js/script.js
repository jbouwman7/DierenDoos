const body = document.querySelector("body");
const user_logo = document.querySelector("#user");
const user_list = document.querySelector(".user-list");

user_logo.addEventListener("click", () => {
    user_list.classList.toggle("hidden");
});


