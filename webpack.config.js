var path = require("path");

module.exports = {
  mode: "development",
  entry: ["./src/app.js", "./src/scss/main.scss"],
  output: {
    path: path.resolve(__dirname, "assets/js"),
    filename: "identity.bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          // Creates `style` nodes from JS strings
          "style-loader",
          // Translates CSS into CommonJS
          "css-loader",
          // Add vendor prefixes to CSS
          "postcss-loader",
          // Compiles Sass to CSS
          "sass-loader",
        ],
      },
    ],
  },
};
