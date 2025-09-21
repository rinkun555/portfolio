<?php
// Generate a strong per-request nonce
$nonce = base64_encode(random_bytes(16));

// Build strict CSP using the dynamic nonce
$csp = "default-src 'self'; "
     . "base-uri 'self'; "
     . "script-src 'self' 'nonce-{$nonce}' https://cdn.jsdelivr.net https://www.googletagmanager.com; "
     . "style-src 'self' https://fonts.googleapis.com https://cdn.jsdelivr.net; "
     . "font-src 'self' data: https://fonts.gstatic.com; "
     . "img-src 'self' data: https://www.google-analytics.com; "
     . "connect-src 'self' https://www.google-analytics.com https://region1.google-analytics.com https://region2.google-analytics.com; "
     . "media-src 'self'; "
     . "frame-src https://www.google.com https://maps.googleapis.com https://www.googletagmanager.com; "
     . "frame-ancestors 'none'; "
     . "object-src 'none'; "
     . "form-action 'self'; "
     . "upgrade-insecure-requests";

// Send headers
header("Content-Security-Policy: " . $csp);
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<!-- Google Tag Manager -->
<script nonce="<?= htmlspecialchars($nonce, ENT_QUOTES, 'UTF-8') ?>">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXH6QB7V');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toful（トゥフル）Bagel Cafe | 青梅のお豆腐ベーグル専門・地元カフェ屋さん</title>

    <!-- Schema Tags -->
    <script type="application/ld+json" nonce="<?= htmlspecialchars($nonce, ENT_QUOTES, 'UTF-8') ?>">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Toful Bagel",
      "image": "https://tofulbagel.tokyo/img/logo.png",
      "description": "Toful（トゥフル）Bagel Cafe | 青梅のお豆腐ベーグル専門・地元カフェ屋さんは、お豆腐を練り込んだクセになるふわもち食感と、定番からちょっと珍しい味まで、ボリュームたっぷりのお豆腐ベーグルが人気のお店です。",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "3 Chome-182-1 Katsunuma",
        "addressLocality": "Ome",
        "addressRegion": "Tokyo",
        "postalCode": "198-0041",
        "addressCountry": "JP"
      },
      "url": "https://tofulbagel.tokyo",
      "telephone": "+81-80-4814-1215",
      "priceRange": "¥¥",
      "servesCuisine": ["Bagels", "Cakes", "Coffee"],
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 35.79078767000567,
        "longitude": 139.26845896163317
      },
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Friday"],
          "opens": "08:00",
          "closes": "17:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Saturday", "Sunday"],
          "opens": "09:00",
          "closes": "17:00"
        }
      ],
      "openingHours": [
        "Mo,Tu,Fr 08:00-17:00",
        "Sa,Su 09:00-17:00"
      ],
      "hasMap": "https://www.google.com/maps/place/35.790690879769194,139.2684536029786"
    }
    </script>
  
<!-- HTML head meta for SEO -->
<link rel="sitemap" type="application/xml" title="Sitemap" href="https://tofubagelcafe.tokyo/sitemap.xml" />

<!-- SEO Meta Tags -->
  <meta name="description" content="Toful（トゥフル）Bagel Cafe | 青梅のお豆腐ベーグル専門・地元カフェ屋さんは、お豆腐を練り込んだクセになるふわっもちっの食感と、定番からちょっと珍しい味まで、ボリュームたっぷりお豆腐ベーグルが人気のお店です。" />
  <meta name="keywords" content="お豆腐, ベーグル, カフェ,青梅,ランチ,デザート,ケーキ,コーヒー,パン" />
  <meta name="author" content="Toful Bagel" />

  <!-- Open Graph / Social Media Meta Tags -->
  <meta property="og:title" content="Toful（トゥフル）Bagel Cafe | 青梅のお豆腐ベーグル専門・地元カフェ屋さん" />
  <meta property="og:description" content="Toful（トゥフル）Bagel Cafe | 青梅のお豆腐ベーグル専門・地元カフェ屋さん　お豆腐を練込み、クセになるふわっもちっの食感と、定番からちょっと珍しい味まで、ボリュームたっぷりお豆腐ベーグル" />
  <meta property="og:image" content="img/og.png" />
  <meta property="og:url" content="https://tofulbagel.tokyo" />
  <meta property="og:type" content="website" />

  <!-- Favicon -->
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css" />
  
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- Google Fonts (最適化: 400のみ) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chango:ital,wght@0,400&family=Zen+Maru+Gothic:ital,wght@0,400&display=swap" rel="stylesheet">

</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXH6QB7V"
height="0" width="0"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Loading Screen -->
<div class="loading-screen">
  <div class="curtain curtain-1"></div>
  <div class="curtain curtain-2"></div>
  <div class="curtain curtain-3"></div>
  <div class="curtain curtain-4"></div>
  <div class="curtain curtain-5"></div>
  <div class="loading-logo">
    <img src="img/logo_full.svg" alt="Toful Bagel logo">
  </div>
</div>

<!-- オンラインショップアイコン（SP用・画面右下固定） -->
<div class="online-shop-icon">
  <a href="#online_shop">
    <img src="img/button_onlineshop.png" alt="Online Shop">
  </a>
</div>

<header>
  <nav>
    <!-- 共通ナビゲーション -->
    <ul class="nav-menu">
      <li>
        <a href="#intro">
          <span class="nav-title-en">Tofu Bagel</span>
          <span class="nav-title-jp">トゥフル(豆腐)ベーグル</span>
        </a>
      </li>
      <li>
        <a href="#calendar">
          <span class="nav-title-en">Calendar</span>
          <span class="nav-title-jp">カレンダー</span>
        </a>
      </li>
      <li>
        <a href="#store_info">
          <span class="nav-title-en">Store Info</span>
          <span class="nav-title-jp">店舗情報</span>
        </a>
      </li>
      <li>
        <a href="#online_shop">
          <span class="nav-title-en">Online Shop</span>
          <span class="nav-title-jp">オンラインショップ</span>
        </a>
      </li>
      <li>
        <a href="#cafe_menu">
          <span class="nav-title-en">Cafe Menu</span>
          <span class="nav-title-jp">カフェメニュー</span>
        </a>
      </li>
      <li>
        <a href="#other_services">
          <span class="nav-title-en">Other Service</span>
          <span class="nav-title-jp">その他サービス</span>
        </a>
      </li>
      
      <!-- Instagram セクション -->
      <div class="nav-instagram">
        <span class="follow-text">\ <span class="chango-text">Follow us</span> /</span>
        <a href="https://www.instagram.com/toful_bagel_cafe?utm_source=ig_web_button_share_sheet&igsh=OW5heXlkZzZiczVp" target="_blank" rel="noopener noreferrer" class="instagram-icon">
          <img src="img/instagram.svg" alt="Instagram">
        </a>
      </div>
    </ul>

    <!-- SP用ナビゲーションアイコンコンテナ -->
    <div class="sp-nav-icons">

      <!-- Instagramアイコン（SP用） -->
      <div class="sp-instagram-icon">
        <a href="https://www.instagram.com/toful_bagel_cafe?utm_source=ig_web_button_share_sheet&igsh=OW5heXlkZzZiczVp" target="_blank" rel="noopener noreferrer">
          <img src="img/instagram.svg" alt="Instagram">
        </a>
      </div>

      <!-- ハンバーガーアイコン（SP用） -->
      <div class="hamburger-icon">
        <img src="img/menu_bar.svg" alt="Menu">
      </div>
    </div>

    <!-- モバイルメニューオーバーレイ -->
    <div class="mobile-overlay" id="mobileOverlay"></div>
  </nav>
    <video class="mask" autoplay muted playsinline loop preload="auto">
        <source src="video/mv_video.mp4" type="video/mp4">
        <source src="video/mv_video.webm" type="video/webm">
        <!-- Fallback image for browsers that don't support video -->
        <img src="img/mv.png" alt="Toful Bagel logo">
    </video>
    <svg class="shape" viewBox="0 0 750 991.9" xmlns="http://www.w3.org/2000/svg" height="0" aria-hidden="true" focusable="false">
    <clipPath id="svgPath" clipPathUnits="objectBoundingBox">
        <path d="M0,0v0.747c0.013,0.008,0.028,0.015,0.043,0.021c0.022,0.008,0.047,0.014,0.073,0.016
                c0.032,0.063,0.112,0.108,0.206,0.109c0.034,0.063,0.116,0.108,0.211,0.108s0.177-0.045,0.211-0.108
                c0.098-0.005,0.179-0.052,0.204-0.117c0.002-0.006,0.004-0.011,0.005-0.017c0.018-0.003,0.034-0.008,0.049-0.013V0H0Z" />
    </clipPath>
    </svg>
</header>

    <main class="container">
        <section class="intro" id="intro">
            <div class="intro_outer floater bounceIn">
                    <p class="title new"><img src="img/intro_new.png" alt="新食感の" ></p>
                    <p class="title bagle"><img class="main-image" src="img/intro_togubagle.png" alt="お豆腐ベーグル" ></p>

                  <div class="intro_inner">
                    <div class="box">
                        <p>地元青梅の原島豆腐店さんのお豆腐をベーグルの生地にたっぷり練り込んだので、クセになるしっとりふわもち食感！</p>
                        <img src="img/tofu.png" alt="地元青梅の原島豆腐店さんのお豆腐" >
                    </div>
                    <div class="box">
                        <p>こだわりは、これでもかとたっぷり詰まった具材たち。どこを食べても後悔させません！</p>
                        <img src="img/intro_gu.png" alt="たっぷり詰まった具材" >
                    </div>
                    <div class="box kind">
                        <p class="explain">シンプルからお惣菜系、甘〜いもの、変わり種まで、お子様から、年配の方まで、もぐもぐ美味しく食べられちゃう！<br>人気の味を一部紹介（日によって品揃えが変動します）</p>
                        
                        <!-- Swiper -->
                        <div class="swiper intro-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="img/intro_anpan.png" alt="お惣菜系、甘〜いもの、変わり種まで色々なベーグル">
                                    <p class="name">あんこクリームチーズ</p>
                                </div>
                                <div class="swiper-slide">
                                    <img src="img/intro_anpan.png" alt="お惣菜系、甘〜いもの、変わり種まで色々なベーグル">
                                    <p class="name">ピザ</p>
                                </div>
                                <div class="swiper-slide">
                                    <img src="img/intro_anpan.png" alt="お惣菜系、甘〜いもの、変わり種まで色々なベーグル">
                                    <p class="name">抹茶</p>
                                </div>
                                <div class="swiper-slide">
                                    <img src="img/intro_anpan.png" alt="お惣菜系、甘〜いもの、変わり種まで色々なベーグル">
                                    <p class="name">揚げベーグル</p>
                                </div>
                                <div class="swiper-slide">
                                    <img src="img/intro_anpan.png" alt="お惣菜系、甘〜いもの、変わり種まで色々なベーグル">
                                    <p class="name">アールグレイ</p>
                                </div>
                                <div class="swiper-slide">
                                    <img src="img/intro_anpan.png" alt="お惣菜系、甘〜いもの、変わり種まで色々なベーグル">
                                    <p class="name">焼豚(チャーシュー)</p>
                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="box">
                        <p>ワンちゃん用ベーグルもご用意しています！（お豆腐、米粉、小麦粉を使用しています。）</p>
                        <img src="img/intro_four.png" alt="ワンちゃん用ベーグル" >
                    </div>
                </div>
              <div class="bagel_all_outer">
                <div class="bagel_grid">
                  <img class="bagel_all bagel_main" src="img/intro_one.jpeg" alt="ふわもち新食感のお豆腐ベーグル">
                  <img class="bagel_all bagel_sub" src="img/intro_atmosphere3.jpg" alt="ふわもち新食感のお豆腐ベーグル">                  
                  <img class="bagel_all bagel_sub" src="img/intro_atmosphere2.jpg" alt="ふわもち新食感のお豆腐ベーグル">
                </div>
              </div>
            </div>
        </section>

        <section class="calendar" id="calendar">
            <div class="title_box">
                <h2 class="title">
                    <span class="english">Calendar</span>
                    <span class="japanese">今月のカレンダー</span>
                </h2>
            </div>
   
            <div class ="calendar_box">
                <img src="img/calendar.jpg" alt="今月のカレンダー" class="lightbox-trigger" data-lightbox="calendar">
            </div>
            <div class="market_info">
              <p class="market_img"><img src="img/market.jpg" alt="マルシェのイメージ"></p>
               <p><span class="bold">様々なマルシェやイベントに出店</span>してます。あなたのお住まいの近くかも？<br>今月のカレンダーでチェック！</p>
            </div>
           
        </section>

        <section class="store_info" id="store_info">
            <div class="title_box">
                <h2 class="title">
                    <span class="english">Store Information</span>
                    <span class="japanese">店舗情報</span>
                </h2>
            </div>

            <div class="store_info_outer">
                <div class="store_info_inner">
                <p><span class="bold">東青梅駅から徒歩6分</span><br><br>
                <span class="bold">営業時間</span><br>
                平日：8:00〜17:00<br>
                土日祝：9:00〜17:00（モーニングセット 9:00〜11:00／土日祝限定）<br>
                ランチセット：11:00〜15:00（L.O 14:00）<br>
                ※なくなり次第、早めに閉店することがあります。<br>

                <span class="bold closingday">定休日　水曜日・木曜日</span><br>
                ※振替休日・臨時休業もあるので、カレンダーでご確認ください。
                <br><br>

                <span class="bold">駐車場</span><br>お店に向かって右横：小型車2台 または 普通車1台まで駐車可<br>
                ※満車の場合は近隣のパーキングをご利用ください。<br>
                ※近隣施設への駐車はご遠慮ください。<br><br>

                店内 10席・わんちゃんOK（リードとおむつの着用お願いします）<br></p>
                </div>

                <div class="google_map_outer">
                  
                    <div class="google_map">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3168.2282142379267!2d139.2658468763754!3d35.790293983257136!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019252fb524f031%3A0x96a48bd03a281c5!2sToful%20Bagel%20cafe!5e0!3m2!1sja!2sdk!4v1755807445828!5m2!1sja!2sdk" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="online_shop" id="online_shop">
            <div class="title_box">
                <h2 class="title">
                    <span class="english">ONLINE SHOP</span>
                    <span class="japanese">オンラインショップ</span>
                </h2>
            </div>

            <p class="description"><span class="bold">冷凍</span>で<span class="bold">全国</span>にお届けできます。<br>
            季節限定セットなど、期間限定セットなどもありますので、ぜひチェックお待ちしてます！<br>
            <span class="bold">遠方の方、ちょっとしたギフト</span>にいかがですか？</p>
            <div class="shop_items">
                <a class="online_shop_item_link" href="https://kimamanicafe.base.shop/" target="_blank" rel="noopener noreferrer">
                    <div class="item_img_box">
                        <div class="item_img_frame">
                            <img src="img/online_shop_bagel6.jpg" alt="おまかせ6個セットのイメージ">
                        </div>
                        <p class="item_name">おまかせ6個セット</p>
                        <p class="item_price">¥2800</p> 
                    </div>
                </a>
                <a class="online_shop_item_link" href="https://kimamanicafe.base.shop/" target="_blank" rel="noopener noreferrer">
                    <div class="item_img_box">
                        <div class="item_img_frame">
                            <img src="img/online_shop_bagel8.jpg" alt="おまかせ8個セットのイメージ">
                        </div>
                        <p class="item_name">おまかせ8個セット</p>
                        <p class="item_price">¥3800</p> 
                    </div>
                </a>
                <a class="online_shop_item_link" href="https://kimamanicafe.base.shop/" target="_blank" rel="noopener noreferrer">
                    <div class="item_img_box">
                        <div class="item_img_frame">
                            <img src="img/online_shop_teacake.jpg" alt="アールグレイバスクチーズケーキ 6号ホールのイメージ">
                        </div>
                        <p class="item_name">アールグレイバスクチーズケーキ 6号ホール</p>
                        <p class="item_price">¥2800</p> 
                    </div>
                </a>
                <a class="online_shop_item_link" href="https://kimamanicafe.base.shop/" target="_blank" rel="noopener noreferrer">
                    <div class="item_img_box">
                        <div class="item_img_frame">
                            <img src="img/online_shop_cheesecake.jpg" alt="バスクチーズケーキ 6号ホールのイメージ">
                        </div>
                        <p class="item_name">バスクチーズケーキ 6号ホール</p>
                        <p class="item_price">¥2800</p> 
                    </div>
                </a>
                
            </div>
            <!-- 新しいりんくになったら要変更 -->
            <a class="body_link" href="https://kimamanicafe.base.shop/" target="_blank" rel="noopener noreferrer">ベーグル通販サイトへ</a>
        </section>

        <section class="cafe_menu" id="cafe_menu">
            <div class="title_box">
                <h2 class="title">
                    <span class="english">Cafe Menu</span>
                    <span class="japanese">カフェメニュー</span>
                </h2>
            </div>
   
            <p class="description">ホッと一息、ちょっと贅沢な時間を過ごしませんか？（運が良ければロアちゃん店長に会えるかも！）</p>
            <div class="cafe_items">
                <div class="cafe_item">
                    <div class="cafe_frame">
                        <img src="img/cafe_menu_morning.jpg" alt="モーニングのイメージ">
                    </div>
                    <div class="cafe_label">モーニング</div>
                </div>
                <div class="cafe_item">
                    <div class="cafe_frame">
                        <img src="img/cafe_menu_lunch.jpg" alt="ランチのイメージ">
                    </div>
                    <div class="cafe_label">ランチ</div>
                </div>
                <div class="cafe_item">
                    <div class="cafe_frame">
                        <img src="img/cafe_menu_dessert.jpg" alt="デザートのイメージ">
                    </div>
                    <div class="cafe_label">デザート</div>
                </div>
                <div class="cafe_item">
                    <div class="cafe_frame">
                        <img src="img/cafe_menu_drink.jpg" alt="ドリンクのイメージ">
                    </div>
                    <div class="cafe_label">ドリンク</div>
                </div>

            </div>
        </section>

        <section class="other_services" id="other_services">
            <div class="title_box">
                <h2 class="title">
                    <span class="english">OTHER SERVICE</span>
                    <span class="japanese">その他サービス</span>
                </h2>
            </div>

            <p class="description">お弁当・ホールケーキなど予約で対応します。<br>
            店内貸切（ワークショップ・パーティなど）もお気軽に相談ください!</p>

          <p class="case_title bold">事例一覧</p>

          <div class="other_services_inner">
            <div class="other_services_box full">
                <div class="other_services_frame">
                    <img src="img/retail.jpg" alt="店内貸切ワークショップのイメージ">
                </div>
               <p class="case_title">卸売・販売提携</p>
                <p class="text">冷凍で約XXヶ月間保管可能です。<br>電子レンジで解凍して簡単にふわもちの出来たてベーグルを提供できます！<br>最小ロットはX個、全国に冷凍配達。
                </p>
            </div>
            <div class="other_services_box full">
                <div class="other_services_frame">
                    <img src="img/other_services_party2.jpg" alt="店内貸切ワークショップのイメージ">
                </div>
               <p class="case_title">ワークショップ・イベント・コラボ</p>
                <p class="text">店内のスペースを貸し出しし、ハンドメイドのワークショップや習字の教室、展示会など様々なイベントなどの開催可能です。ドリンクやフードのセットなど大歓迎。是非お気軽にご相談ください。
                </p>
            </div>
            <div class="other_services_box">
                <div class="other_services_frame">
                    <img src="img/other_services_party.jpg" alt="オードブルのイメージ">
                </div>
                <p class="case_title">オードブル</p>
                <p class="text">誕生日やお祝いパーティー、イベントに対応したオードブルを作成します。ベーグルでも大人気のオーブンでじっくり焼き上げた、あの焼豚(チャーシュー)を使用したメニューなどもご用意できます。</p>
            </div>
            <div class="other_services_box">
                <div class="other_services_frame">
                    <img src="img/retail.jpg" alt="ベーグル配達（常温）のイメージ">
                </div>
                <p class="case_title">ベーグル配達（常温）</p>
                <p class="text">X個から、ご要望に応じたベーグル各種をお作りして、直接お届け。</p>
            </div>
            <div class="other_services_box">

                <div class="other_services_frame">
                    <img src="img/other_services_cake.jpg" alt="ホールケーキのイメージ">
                </div>
                <p class="case_title">ホールケーキ</p>
                <p class="text">カフェでも人気のチーズケーキをホールで、お祝い事などにいかがですか？</p>
            </div>
          </div>

          <!-- 電話番号 -->
            <a class="body_link" href="tel:080-4814-1215">お問い合わせはこちら</a>
        </section>

    </main>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">
        <div class="lightbox-content">
            <span class="lightbox-close">&times;</span>
            <img id="lightbox-image" src="" alt="ライトボックス">
            <div id="lightbox-map" class="lightbox-map-container">
                <iframe src="" width="100%" height="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer_inner">
            <img class="logo" src="img/logo_full.svg" alt="Toful Bagelロゴ">
            
            <!-- フッター用アイコンコンテナ -->
            <div class="footer-icons">
                <!-- Instagramアイコン -->
                <div class="footer-instagram-icon">
                    <a href="https://www.instagram.com/toful_bagel_cafe?utm_source=ig_web_button_share_sheet&igsh=OW5heXlkZzZiczVp" target="_blank" rel="noopener noreferrer">
                        <img src="img/instagram_blue.svg" alt="Instagram">
                    </a>
                </div>
                
                <!-- オンラインショップアイコン -->
                <div class="footer-online-shop-icon">
                    <a href="#online_shop">
                        <img src="img/online_shop_brown.svg" alt="Online Shopカート">
                    </a>
                </div>
            </div>
            
            <p class="copyright">&copy; Toful bagel 2025. All rights reserved.</p>
        </div>
    </footer>

 <!-- Swiper JS（CDN） -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<!-- アプリ用JS -->
<script src="/js/app.js" defer></script>

<script nonce="<?= htmlspecialchars($nonce, ENT_QUOTES, 'UTF-8') ?>">
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('img:not([loading])').forEach(function(img){
    // Exclude hero-ish elements: loading screen logo and <video> fallback image
    if (img.closest('.loading-screen') || img.closest('video')) return;
    img.setAttribute('loading', 'lazy');
    img.setAttribute('decoding', 'async');
  });
});
</script>

</body>

</html>
