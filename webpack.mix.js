const path = require("path");
const mix = require("laravel-mix");

mix.setPublicPath("dist");

mix.webpackConfig({
  resolve: {
    modules: ["node_modules"],
    alias: {
      "@": path.resolve("assets/js"),
    },
  },
  externals: {
    jquery: "jQuery",
  },
});

mix.postCss("assets/css/theme.css", "dist/css", [
  require("postcss-import"),
  require("postcss-extend-rule"),
  require("postcss-nested"),
  require("tailwindcss"),
  require("autoprefixer"),
]);

mix.js("assets/js/index.js", "dist/js");

mix.options({
  processCssUrls: false,
});

mix.browserSync({
  proxy: "http://localhost:8888/divi-ecommerce",
  files: ["dist/js/*.js", "dist/css/*.css"],
  watch: true,
});
