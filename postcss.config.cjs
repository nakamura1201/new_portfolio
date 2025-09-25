module.exports = {
  plugins: {
    autoprefixer: {},
    "postcss-sort-media-queries": {
      sort: "mobile-first", // or 'desktop-first' 好みで
    },
    "css-declaration-sorter": { order: "smacss" },
    cssnano: { preset: ["default", { discardComments: { removeAll: true } }] },
  },
};
