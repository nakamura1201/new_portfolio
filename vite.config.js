import { defineConfig } from "vite";
import path from "path";

export default defineConfig({
  build: {
    outDir: "dist",
    emptyOutDir: false,
    rollupOptions: {
      input: path.resolve(__dirname, "assets/js/entry.js"),
      output: {
        assetFileNames: "style.css", // CSSファイル名
        entryFileNames: "common.js", // JSファイル名（ここで変えられる）
      },
    },
    minify: "esbuild", // デフォルトでJSミニファイON（Terserも選べる）
  },
});
