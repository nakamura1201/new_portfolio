import imagemin from "imagemin";
import imageminWebp from "imagemin-webp";
import imageminMozjpeg from "imagemin-mozjpeg";
import imageminPngquant from "imagemin-pngquant";
import { glob } from "glob";
import { mkdir, writeFile } from "fs/promises";
import { dirname, extname, basename, relative, resolve } from "path";

const inputDir = "assets/img/";
const outputDir = "assets/img_compressed/";

const files = await glob(`${inputDir}/**/*.{jpg,jpeg,png}`);

for (const file of files) {
  const relPath = relative(inputDir, file);
  const srcExt = extname(file).toLowerCase(); // .jpg / .png
  const baseName = basename(file, srcExt); // sample
  const destDir = resolve(outputDir, dirname(relPath));

  await mkdir(destDir, { recursive: true });

  /* ---------- ① 元形式の最適圧縮 ---------- */
  const basePlugins = srcExt === ".png" ? [imageminPngquant({ quality: [0.6, 0.8] })] : [imageminMozjpeg({ quality: 75 })];

  const baseData = await imagemin([file], { plugins: basePlugins });
  await writeFile(resolve(destDir, `${baseName}${srcExt}`), baseData[0].data);

  /* ---------- ② 追加で WebP を生成したい場合 ---------- */
  const webpData = await imagemin([file], {
    plugins: [imageminWebp({ quality: 75 })],
  });
  await writeFile(resolve(destDir, `${baseName}.webp`), webpData[0].data);

  console.log(`✔ Converted: ${relPath} → ${destDir}`);
}
