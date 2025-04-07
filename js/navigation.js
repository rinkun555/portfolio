document.addEventListener('DOMContentLoaded', function () {
  // ヘッダーコンテナ要素を選択
  const headerContainer = document.querySelector('.header-container');

  if (headerContainer) {
    // 現在のパス
    const currentPath = window.location.pathname;

    // ナビゲーションの HTML を作成
    const navigationHTML = `
      <nav class="top-nav">
        <ul>
          <li class="name-section">
            <a href="index.html">
              <span>RIO SUZUKI</span>
              <span>三度の飯よりデザイン</span>
            </a>
          </li>
          <div class="menu-section">
            <li><a href="index.html" ${currentPath.endsWith('index.html') || currentPath === '/' || currentPath.endsWith('/') ? 'class="active"' : ''}>HOME</a></li>
            <li><a href="index.html#works" ${currentPath.includes('hospital') || currentPath.includes('metaphor') ? 'class="active"' : ''}>WORKS</a></li>
            <li><a href="index.html#about" ${currentPath.includes('about') ? 'class="active"' : ''}>ABOUT</a></li>
            <li><a href="pdf/cv.pdf">CV</a></li>
            <li class="social-nav-item">
              <a href="https://www.linkedin.com/in/rio-suzuki-jp/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn Profile">
                <i class="fab fa-linkedin"></i>
              </a>
            </li>
          </div>
        </ul>
      </nav>
    `;

    // ナビゲーションを挿入
    headerContainer.innerHTML = navigationHTML;

    // スクロール時のナビゲーションスタイル変更
    const topNav = document.querySelector('.top-nav');
    let lastScrollY = window.scrollY;

    // Scroll event listener
    window.addEventListener('scroll', function () {
      if (window.scrollY > lastScrollY) {
        // スクロールダウン時に非表示
        topNav.classList.add('hidden');
        topNav.classList.remove('scrolled');
      } else {
        // スクロールアップ時に表示
        topNav.classList.remove('hidden');
        topNav.classList.add('scrolled'); // パディングを適用
      }

      // スクロール位置がトップに近い場合、scrolledクラスを削除
      if (window.scrollY === 0) {
        topNav.classList.remove('scrolled');
      }

      lastScrollY = window.scrollY;
    });
  }
});
