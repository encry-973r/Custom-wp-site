import "../css/styles.css";

// // Our modules / classes
import Search from "./modules/Search";
import Navbar from "./modules/Navbar";

// // Instantiate a new object using our modules/classes
var navbar = new Navbar();
var search = new Search();

// Allow new JS and CSS to load in browser without a traditional page refresh
if (module.hot) {
  module.hot.accept();
}
