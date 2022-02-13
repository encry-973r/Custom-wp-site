import axios from "axios";

class Search {
  // ==================================
  // housekeeping
  // ==================================
  constructor() {
    this.addSearchHTML();
    this.resultsDiv = document.querySelector("#search-overlay__results");
    this.openButton = document.querySelectorAll(".js-search-trigger");
    this.closeButton = document.querySelector(".search-overlay__close");
    this.searchOverlay = document.querySelector(".search-overlay");
    this.searchField = document.querySelector("#search-term");
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
  }
  // ==================================
  // end of housekeeping
  // ==================================

  // ==================================
  // events
  // ==================================
  events() {
    // this.openButton.addEventListener("click", () => {
    //   this.openOverlay();
    // });

    this.openButton.forEach((el) => {
      el.addEventListener("click", (e) => {
        e.preventDefault();
        this.openOverlay();
      });
    });

    this.closeButton.addEventListener("click", () => {
      this.closeOverlay();
      // console.log("close icon clicked!");
    });
    document.addEventListener("keydown", (e) => this.keyPressDispatcher(e));
    this.searchField.addEventListener("keyup", this.typingLogic.bind(this));
  }
  // ==================================
  // end of events
  // ==================================

  // ==================================
  // methods
  // ==================================

  openOverlay() {
    this.searchOverlay.classList.add("show-overlay");
    document.body.classList.add("body-no-scroll");
    this.searchField.focus();
    this.searchField.value = "";
    this.resultsDiv.innerHTML = "";
    // console.log("our open method just ran!");
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.classList.remove("show-overlay");
    document.body.classList.remove("body-no-scroll");
    // console.log("our close method just ran!");
    this.isOverlayOpen = false;
  }

  keyPressDispatcher(e) {
    // console.log(e.keyCode);

    // the "s" key press event : to open the search-overlay
    if (
      e.keyCode == 83 &&
      !this.isOverlayOpen &&
      document.activeElement.tagName != "INPUT" &&
      document.activeElement.tagName != "TEXTAREA"
    ) {
      this.openOverlay();
      this.isOverlayOpen = true;
    }

    // the "esc" key press event : to close the search-overlay.
    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
      this.isOverlayOpen = false;
      this.resultsDiv.innerHTML = "";
      this.searchField.value = "";
    }
  }

  typingLogic() {
    if (this.searchField.value != this.previousValue) {
      clearTimeout(this.typingTimer);

      // if typing is ongoing
      if (this.searchField.value) {
        // and spinner is NOT visible, display spinner
        if (!this.isSpinnerVisible) {
          this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>';
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750);
      } else {
        this.resultsDiv.innerHTML = "";
        this.isSpinnerVisible = false;
      }
    }

    this.previousValue = this.searchField.value;
  }
  async getResults() {
    try {
      const response = await axios.get(
        teaData.root_url +
          "/wp-json/tea/v1/search?term=" +
          this.searchField.value
      );
      const results = response.data;
      // console.log(results);
      this.resultsDiv.innerHTML = `
      <section class="search-section">
        <div class="section-center search-center">
            <div class="search-category">
              <div class="search-single">
                <h5 class="search-overlay__section-title">Products</h5>
                ${
                  results["products"].length
                    ? "<ul class='nav-items'>"
                    : "<p>No product matches your search.</p>"
                }
                ${results["products"]
                  .map(
                    (item) =>
                      `<li class='search-link'><a href="${item.permalink}">${item.title}<?php echo 'Hello world!!!!!!!!!' ?>></a></li>`
                  )
                  .join("")}
                ${
                  results.products.length
                    ? `</ul> <button class="btn"><a href="${results.products[0].archive}">View more...</a></button>`
                    : ""
                } 
              </div>
              <div class="section-rule"></div>
            </div>
            <div class="search-category">
              <div class="search-single">
                <h5 class="search-overlay__section-title">General Information</h5>
                  ${
                    results["generalInfo"].length
                      ? "<ul class='nav-items'>"
                      : "<p>No general information matches your search.</p>"
                  }
                  ${results["generalInfo"]
                    .map(
                      (item) =>
                        `<li class='search-link'><a href="${item.permalink}">${
                          item.title
                        }</a> ${
                          item.post_type == "post"
                            ? `by ${item.authorName}`
                            : ""
                        }</li>`
                    )
                    .join("")}
                  ${results.generalInfo.length ? "</ul>" : ""} 
              </div>
              <div class="section-rule"></div>
            </div>
            <div class="search-category">
              <div class="search-single">
                <h5 class="search-overlay__section-title">Services</h5>
                  ${
                    results["services"].length
                      ? "<ul class='nav-items'>"
                      : "<p>No service matches your search.</p>"
                  }
                  ${results["services"]
                    .map(
                      (item) =>
                        `<li class='search-link'><a href="${item.permalink}">${item.title}</a></li>`
                    )
                    .join("")}
                  ${
                    results.services.length
                      ? `</ul> <button class="btn"><a href="${results.services[0].archive}">View more...</a></button>`
                      : ""
                  } 
              </div>
              <div class="section-rule"></div>
              <div class="search-single">
                <h5 class="search-overlay__section-title">Skills</h5>
                  ${
                    results["skills"].length
                      ? "<ul class='nav-items'>"
                      : "<p>No skill matches your search.</p>"
                  }
                  ${results["skills"]
                    .map(
                      (item) =>
                        `<li class='search-link'><a href="${item.permalink}">${item.title}</a></li>`
                    )
                    .join("")}
                  ${
                    results.skills.length
                      ? `</ul> <button class="btn"><a href="${results.skills[0].archive}">View more...</a></button>`
                      : ""
                  } 
              </div>
              <div class="section-rule"></div>
            </div>
        </div>
      </section>
      
      `;

      this.isSpinnerVisible = false;
      // console.log(results);
    } catch (error) {
      console.log(error);
    }
  }

  // ==================================
  // end of methods
  // ==================================

  // ==================================
  // dynamic attachment
  // ==================================
  addSearchHTML() {
    document.body.insertAdjacentHTML(
      "beforeend",
      `
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
            <span class="search-overlay__close"><i class="fa fa-window-close search-close" aria-hidden="true"></i></span>
          </div>
        </div>
        
        <div class="nnn">
          <div id="search-overlay__results"></div>
        </div>

      </div>
    `
    );
  }
  // ==================================
  // end of dynamic attachment
  // ==================================
}

export default Search;
