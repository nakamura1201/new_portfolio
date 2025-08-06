import { defineConfig } from "vite";
import path from "path";

export default defineConfig({
  build: {
    outDir: "dist",
    emptyOutDir: false,
    rollupOptions: {
      input: path.resolve(__dirname, "assets/js/entry.js"),
      output: {
        assetFileNames: (assetInfo) => {
          // CSS だけ固定
          if (assetInfo.name?.endsWith(".css")) return "style.css";
          // 画像・フォントは元の名前と拡張子を保つ
          return "img/[name][extname]"; // 例）img/sample.webp
        },
        entryFileNames: "common.js",
      },
    },
    minify: "esbuild", // デフォルトでJSミニファイON（Terserも選べる）
  },
});
