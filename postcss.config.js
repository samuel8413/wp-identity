const autoprefixer = require("autoprefixer");
const plugin = autoprefixer({ grid: "autoplace" });
module.exports = { plugins: [plugin] };
