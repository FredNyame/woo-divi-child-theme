//console.log("Hello World");

if (window.$ === undefined) {
  // Wordpress uses jQuery 3.5.1; included by WordPress and externally refrenced. See theme's webpack.mix.js
  window.$ = require("jquery");
}

import "slick-carousel";
