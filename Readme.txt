#ローカルサーバー立ち上げ
PHP：D:\project\prart>php -S localhost:8000

browser-sync：browser-sync start --proxy "localhost:8000" --files "**/*"


#アニメーションの設定

デフォルトhoverアニメーション
transition: 0.3s;


#z-indexの設定
ヘッダーロゴ・・・999
ハンバーガーボタン・・・9999

#ブレイクポイント 
  "xs": 320px,
  "sm": 480px,フォントサイズ1.5
  "mmd": 600px,
  "md": 768px,フォントサイズ1.3125  
  "lg": 1024px,
  "xl": 1200px, フォントサイズ1.2
  "xxl": 1500px,
  "xxxl": 1921px,

#imgの属性
width="681" height="450" loading="lazy" alt=""



#カラーコード　不透明度
100%	99%	98%	97%	96%	95%	94%	93%	92%	91%
FF	FC	FA	F7	F5	F2	F0	ED	EB	E8
90%	89%	88%	87%	86%	85%	84%	83%	82%	81%
E6	E3	E0	DE	DB	D9	D6	D4	D1	CF
80%	79%	78%	77%	76%	75%	74%	73%	72%	71%
CC	C9	C7	C4	C2	BF	BD	BA	B8	B5
70%	69%	68%	67%	66%	65%	64%	63%	62%	61%
B3	B0	AD	AB	A8	A6	A3	A1	9E	9C
60%	59%	58%	57%	56%	55%	54%	53%	52%	51%
99	96	94	91	8F	8C	8A	87	85	82
50%	49%	48%	47%	46%	45%	44%	43%	42%	41%
80	7D	7A	78	75	73	70	6E	6B	69
40%	39%	38%	37%	36%	35%	34%	33%	32%	31%
66	63	61	5E	5C	59	57	54	52	4F
30%	29%	28%	27%	26%	25%	24%	23%	22%	21%
4D	4A	47	45	42	40	3D	3B	38	36
20%	19%	18%	17%	16%	15%	14%	13%	12%	11%
33	30	2E	2B	29	26	24	21	1F	1C
10%	9%	8%	7%	6%	5%	4%	3%	2%	1%
1A	17	14	12	0F	0D	0A	08	05	03
0%									
00	

#ベーシック
未設定


#コミットルール
①Prefix
feat: 新しい機能
fix: バグの修正
docs: ドキュメントのみの変更
style: 空白、フォーマット、セミコロン追加など
refactor: 仕様に影響がないコード改善(リファクタ)
perf: パフォーマンス向上関連
test: テスト関連
chore: ビルド、補助ツール、ライブラリ関連

②どの個所をどのような理由で変更したのかなど詳しく記入する


#CSSメモ
##現在の幅から1920px分引いて左右に移動させる
calc((100vw - 1920px) / 2 + 70px)


##コンテナクエリ
###レスポンシブ対応したい要素の祖先要素をコンテナクエリ化
container-type: ○○;
container-type: inline-size;: インライン方向のサイズに応じる
container-type: size;: インライン方向・ブロック方向のサイズに応じる

###クエリを書く
@container (min-width: 300px) {
  子要素 {
    color: #f4481a;
    font-size: 26px;
    font-weight: bold;
  }
}

##カスケードレイヤー@layer
名前付きレイヤーを作成し、その中にcssの記述を行うと詳細度の影響を受けずにスタイリングできる
@layer components {
  #button {
    background-color: blue;
    color: white;
  }
}
 
@layer utilities {
  .bg-red {
    background-color: red;
    color: white;
  }
}

スタイルを割り当てずに、名前付きレイヤーだけで宣言することも可能
@layer reset, components, utilities;

importで読み込んで利用することも可能
@import "bootstrap.css" layer(framework);


カスケードレイヤーの注意点
インラインスタイルや !important よりも低い優先度を持ちます。



#構造化マークアップ
TOPページ	
<script type="application/ld+json">	
{	
@context: "https://schema.org",	
@type: "Corporation",	
name: "株式会社プラルト",	
address: {	
@type: "PostalAddress",	
postalCode: "3990033",	
addressRegion: "長野県",	
addressLocality: "松本市",	
streetAddress: "笹賀5985"	
},	
telephone: "+8163288000",	
URL: "https://www.prart.co.jp/"	
}	
</script>	
	
<script type="application/ld+json">	
{	
@context: "https://schema.org",	
@type: "WebSite",	
name: "株式会社プラルト",	
description: "株式会社プラルトは、長野県松本市に拠点を置き、デザイン、広告、印刷・出版、マーケティングなどのサービスを提供している企業です。地域に根ざしたビジネス展開とお客様のニーズに応える為の最新の技術を駆使した高品質なソリューションを提供しています。あなたのビジネスを次のレベルに引き上げるためのパートナーとして、プラルトにお任せください。",	
url: "https://www.prart.co.jp/",	
image: {	
@type: "ImageObject",	
url: "https://www.prart.co.jp/assets/image/blog/default.jpg"	
},	
publisher: {	
@type: "Organization",	
name: "株式会社プラルト",	
logo: {	
@type: "ImageObject",	
url: "https://www.prart.co.jp/assets/image/common/c-logo.svg"	
}	
},	
mainEntityOfPage: {	
@type: "WebPage",	
@id: "https://www.prart.co.jp/",	
name: "株式会社プラルトのトップページ",	
description: "株式会社プラルトの公式トップページです。最新の情報やサービス内容についてはこちらをご覧ください。",	
url: "https://www.prart.co.jp/"	
},	
potentialAction: {	
@type: "SearchAction",	
target: "https://www.prart.co.jp/search?q={search_term_string}",	
query-input: "required name=search_term_string"	
}	
}	
</script>	
	
	
下層ページ	
<script type="application/ld+json">	
{	
@context: "https://schema.org",	
@type: "BreadcrumbList",	
description: "株式会社プラルトは、企業の成長を加速させるための包括的なマーケティングサービスを提供しています。私たちのマーケティング提案は、データに基づいた計画とクリエイティブ要素を合わせ、ターゲットの訴求を促します。",	
itemListElement: [{	
@type: "ListItem",	
position: 1,	
name: "TOP",	
item: "https://www.prart.co.jp/"	
},	
{	
@type: "ListItem",	
position: 2,	
name: "MARKETING",	
item: "https://www.prart.co.jp/marketing/"	
}	
]	
}	
</script>	

#その他メモ
vueアニメーション
https://b-risk.jp/blog/2019/12/nuxt-js/

CSSのみでMPAでもSPAっぽく画面遷移できる
@view-transition {
  navigation: auto;
}