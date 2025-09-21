// app.js
document.addEventListener('DOMContentLoaded', () => {
  // ========= ユーティリティ =========
  const $ = (sel, root = document) => root.querySelector(sel);
  const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));
  const isMobileView = () => window.innerWidth <= 768;
  const isVeryWide = () => window.innerWidth >= 1600;

  // ========= 初期表示（PC/SPの出し分け） =========
  const applyResponsiveVisibility = () => {
    const pcOnly = $$(".pc-only");
    const spOnly = $$(".sp-only");
    if (isMobileView()) {
      pcOnly.forEach(el => (el.style.display = "none"));
      spOnly.forEach(el => (el.style.display = "block"));
    } else {
      pcOnly.forEach(el => (el.style.display = "block"));
      spOnly.forEach(el => (el.style.display = "none"));
    }
  };

  // ========= ローディング演出（初回のみ） =========
  const runFirstVisitLoader = () => {
    const hasVisited = sessionStorage.getItem("hasVisited");
    const loader = $(".loading-screen");
    if (!loader) return;

    if (!hasVisited) {
      const logoContainer = $(".loading-logo");
      const curtains = $$(".curtain");

      // 2秒ロゴ → 0.5秒後カーテン開く → 1.5秒後非表示
      setTimeout(() => {
        logoContainer?.classList.add("logo-fade");
        setTimeout(() => {
          curtains.forEach(c => c.classList.add("curtain-open"));
          sessionStorage.setItem("hasVisited", "true");
          setTimeout(() => {
            loader.style.display = "none";
          }, 1500);
        }, 500);
      }, 2000);
    } else {
      loader.style.display = "none";
    }
  };

  // ========= ハンバーガーメニュー =========
  const navMenu = $(".nav-menu");
  const overlay = $("#mobileOverlay");
  const hamburgerIcon = $(".hamburger-icon");

  const toggleMenuImpl = () => {
    navMenu?.classList.toggle("mobile-active");
    overlay?.classList.toggle("active");
    hamburgerIcon?.classList.toggle("active");
  };
  const closeMenuImpl = () => {
    navMenu?.classList.remove("mobile-active");
    overlay?.classList.remove("active");
    hamburgerIcon?.classList.remove("active");
  };

  // HTMLの onclick="toggleMenu()" 用に公開
  window.toggleMenu = toggleMenuImpl;
  window.closeMenu = closeMenuImpl;

  // HTMLの inline onclick を使わないため、ここでクリックイベントを付与
  hamburgerIcon?.addEventListener('click', toggleMenuImpl);

  // ========= ナビのスムーススクロール & 自動クローズ(SP) =========
  $$(".nav-menu a, .nav-instagram a").forEach(link => {
    link.addEventListener("click", e => {
      const isInsta = link.classList.contains("instagram-icon");
      if (!isInsta) {
        e.preventDefault();
        const targetId = link.getAttribute("href");
        const targetEl = targetId ? $(targetId) : null;
        if (targetEl) {
          if (isMobileView()) closeMenuImpl();
          const headerHeight = isMobileView() ? 80 : 100;
          const targetTop = targetEl.offsetTop - headerHeight;
          window.scrollTo({ top: targetTop, behavior: "smooth" });
        }
      } else {
        if (isMobileView()) closeMenuImpl();
      }
    });
  });

  // ========= スクロール時のナビ表示制御 & SP用オンラインショップアイコンの挙動 =========
  let lastScrollTop = 0;
  let scrollTimeout;
  const onlineShopIcon = $(".online-shop-icon");

  const onScroll = () => {
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
    const nav = $("nav");
    const spNavIcons = $(".sp-nav-icons");

    if (currentScroll > lastScrollTop && currentScroll > 100) {
      // 下スクロール
      if (isVeryWide()) {
        nav?.classList.add("nav-hidden");
      } else {
        spNavIcons?.classList.add("nav-hidden");
      }
    } else {
      // 上スクロール or 先頭付近
      if (isVeryWide()) {
        nav?.classList.remove("nav-hidden");
      } else {
        spNavIcons?.classList.remove("nav-hidden");
      }
    }

    // SP時はオンラインショップアイコンを下スクロールで隠す
    if (onlineShopIcon && isMobileView()) {
      if (currentScroll > lastScrollTop && currentScroll > 100) {
        onlineShopIcon.style.transform = "translateY(100%)";
        onlineShopIcon.style.opacity = "0";
        onlineShopIcon.style.pointerEvents = "none";
      } else {
        onlineShopIcon.style.transform = "translateY(0)";
        onlineShopIcon.style.opacity = "1";
        onlineShopIcon.style.pointerEvents = "auto";
      }
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(() => {
        onlineShopIcon.style.transform = "translateY(0)";
        onlineShopIcon.style.opacity = "1";
        onlineShopIcon.style.pointerEvents = "auto";
      }, 1000);
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
  };

  window.addEventListener("scroll", onScroll, { passive: true });

  // ========= オーバーレイ & 外側クリックでメニューを閉じる（SP） =========
  document.addEventListener("click", event => {
    if (event.target === overlay) {
      closeMenuImpl();
    }
    if (
      isMobileView() &&
      hamburgerIcon &&
      navMenu &&
      !hamburgerIcon.contains(event.target) &&
      !navMenu.contains(event.target)
    ) {
      closeMenuImpl();
    }
  });

  // ========= Lightbox（画像/地図） =========
  const lightbox = $("#lightbox");
  const lightboxImage = $("#lightbox-image");
  const lightboxMap = $("#lightbox-map");
  const lightboxClose = $(".lightbox-close");

  $$(".lightbox-trigger").forEach(trigger => {
    trigger.addEventListener("click", function () {
      const type = this.getAttribute("data-lightbox");
      if (!lightbox) return;
      lightbox.style.display = "flex";

      if (type === "calendar") {
        if (lightboxImage) lightboxImage.src = "img/calendar.jpg";
        if (lightboxImage) lightboxImage.style.display = "block";
        if (lightboxMap) lightboxMap.style.display = "none";
      } else if (type === "map") {
        const iframe = lightboxMap?.querySelector("iframe");
        if (iframe) {
          iframe.src =
            "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d246.86674366108105!2d139.26808914237992!3d35.790599026951654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019252fb524f031%3A0x96a48bd03a281c5!2sToful%20Bagel%20cafe!5e0!3m2!1sen!2sjp!4v1754301077715!5m2!1sen!2sjp";
        }
        if (lightboxMap) lightboxMap.style.display = "block";
        if (lightboxImage) lightboxImage.style.display = "none";
      }
    });
  });

  const closeLightbox = () => {
    if (!lightbox) return;
    lightbox.style.display = "none";
    const iframe = lightboxMap?.querySelector("iframe");
    if (iframe) iframe.src = ""; // 読み込み停止
  };

  lightboxClose?.addEventListener("click", closeLightbox);
  lightbox?.addEventListener("click", e => {
    if (e.target === lightbox) closeLightbox();
  });

  // ========= Swiper（SPのみ初期化） =========
  const initSwiperIfMobile = () => {
    if (isMobileView() && typeof Swiper !== "undefined") {
      // 既に初期化済みならスキップ（data-flagで判定）
      const container = $(".intro-swiper");
      if (!container || container.dataset.initialized === "true") return;

      try {
        // eslint-disable-next-line no-undef
        const introSwiper = new Swiper(".intro-swiper", {
          passiveListeners: true,
          touchStartPreventDefault: false,
          slidesPerView: 2,
          spaceBetween: 16,
          centeredSlides: true,
          loop: true,
          loopedSlides: 7,
          initialSlide: 0,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: false
          },
          breakpoints: {
            480: { slidesPerView: 2, spaceBetween: 12 },
            640: { slidesPerView: 2, spaceBetween: 16 }
          },
          observer: true,
          observeParents: true,
          watchSlidesProgress: true,
          loopFillGroupWithBlank: false,
          on: {
            init: function () {
              setTimeout(() => {
                this.slideToLoop(0, 0);
              }, 100);
            }
          }
        });
        container.dataset.initialized = "true";
      } catch {
        // Swiper初期化に失敗してもサイト自体は動かす
      }
    }
  };

  // ========= 初期起動 & 監視 =========
  applyResponsiveVisibility();
  runFirstVisitLoader();
  initSwiperIfMobile();

  // 画面サイズ変化に追従（SP/PC切替時の表示制御 & Swiper初期化）
  let resizeTimer;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      applyResponsiveVisibility();
      initSwiperIfMobile();
    }, 150);
  });
});
