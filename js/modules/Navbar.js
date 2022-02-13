class Navbar {
  // constructor
  constructor() {
    this.date = document.getElementById("date").innerHTML =
      new Date().getFullYear();
    this.navBtn = document.getElementById("nav-btn");
    this.navbar = document.getElementById("navbar");
    this.navClose = document.getElementById("nav-close");
    this.events();
  }

  // event
  events() {
    this.navBtn.addEventListener("click", (e) => {
      e.preventDefault();
      this.showNav();
    });

    this.navClose.addEventListener("click", (e) => {
      e.preventDefault();
      this.hideNav();
    });
  }

  // methods
  showNav() {
    this.navbar.classList.add("showNav");
  }

  hideNav() {
    this.navbar.classList.remove("showNav");
  }
}

export default Navbar;
// export default Search
