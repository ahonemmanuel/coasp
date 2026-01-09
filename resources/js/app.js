import './bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();

/* ==========================================
   INITIALISATION AU CHARGEMENT
   ========================================== */
document.addEventListener('DOMContentLoaded', function() {
    initGoTopButton();
    initSearchToggle();
    initStickyHeader();
    initSmoothScroll();
    initDropdowns();
    restoreLanguage();
});

/* ==========================================
   GO TOP BUTTON
   ========================================== */
function initGoTopButton() {
    const goTopBtn = document.getElementById('go-top');
    if (!goTopBtn) return;

    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            goTopBtn.classList.remove('opacity-0', 'invisible');
            goTopBtn.classList.add('opacity-100', 'visible');
        } else {
            goTopBtn.classList.remove('opacity-100', 'visible');
            goTopBtn.classList.add('opacity-0', 'invisible');
        }
    });

    goTopBtn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

/* ==========================================
   SEARCH TOGGLE
   ========================================== */
function initSearchToggle() {
    const searchToggle = document.querySelector('.search-toggle');
    const searchOverlay = document.getElementById('search-overlay');

    if (!searchToggle || !searchOverlay) return;

    searchToggle.addEventListener('click', function(e) {
        e.preventDefault();
        searchOverlay.classList.toggle('hidden');
        if (!searchOverlay.classList.contains('hidden')) {
            searchOverlay.querySelector('input')?.focus();
        }
    });

    // Close on Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !searchOverlay.classList.contains('hidden')) {
            searchOverlay.classList.add('hidden');
        }
    });
}

/* ==========================================
   STICKY HEADER
   ========================================== */
function initStickyHeader() {
    const header = document.getElementById('header');
    if (!header) return;

    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            header.classList.add('shadow-lg');
        } else {
            header.classList.remove('shadow-lg');
        }
    });
}

/* ==========================================
   SMOOTH SCROLL
   ========================================== */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#!') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
}

/* ==========================================
   DROPDOWNS
   ========================================== */
function initDropdowns() {
    const dropdownLinks = document.querySelectorAll('.dropdown-container a');

    dropdownLinks.forEach(link => {
        link.style.pointerEvents = 'auto';
        link.style.cursor = 'pointer';
    });

    const dropdownContainers = document.querySelectorAll('.dropdown-container');

    dropdownContainers.forEach(container => {
        let timeoutId;

        container.addEventListener('mouseenter', function() {
            clearTimeout(timeoutId);
            const dropdown = this.querySelector('div[x-show]');
            if (dropdown) {
                dropdown.style.display = 'block';
            }
        });

        container.addEventListener('mouseleave', function() {
            const dropdown = this.querySelector('div[x-show]');
            timeoutId = setTimeout(() => {
                if (dropdown) {
                    dropdown.style.display = 'none';
                }
            }, 200);
        });
    });
}

/* ==========================================
   GOOGLE TRANSLATE
   ========================================== */
window.googleTranslateElementInit = function() {
    new google.translate.TranslateElement({
        pageLanguage: 'fr',
        includedLanguages: 'en,es,pt,fr',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false,
        multilanguagePage: true
    }, 'google_translate_element');
};

window.changeLanguage = function(langCode, langName, flagCode) {
    console.log('Changement de langue vers:', langCode);

    // Mettre à jour l'affichage
    updateLanguageDisplay(langCode, langName, flagCode);

    // Sauvegarder dans localStorage
    localStorage.setItem('selectedLanguage', langCode);
    localStorage.setItem('selectedLanguageName', langName);
    localStorage.setItem('selectedLanguageFlag', flagCode);

    // Gérer les cookies
    if (langCode === 'fr') {
        eraseCookie('googtrans');
        eraseCookie('googtrans', '.127.0.0.1');
        eraseCookie('googtrans', 'localhost');
        window.location.reload();
    } else {
        setCookie('googtrans', '/fr/' + langCode, 1);
        window.location.reload();
    }
};

function updateLanguageDisplay(langCode, langName, flagCode) {
    const flagUrl = `https://flagcdn.com/w40/${flagCode}.png`;
    const shortCode = langCode.toUpperCase();

    // Top bar
    const currentFlag = document.getElementById('current-flag');
    const currentLangText = document.getElementById('current-lang-text');
    if (currentFlag) currentFlag.src = flagUrl;
    if (currentLangText) currentLangText.textContent = langName;

    // Header
    const headerFlag = document.getElementById('header-flag');
    const headerLang = document.getElementById('header-lang');
    if (headerFlag) headerFlag.src = flagUrl;
    if (headerLang) headerLang.textContent = shortCode;
}

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name, domain = null) {
    if (domain) {
        document.cookie = name + '=; Path=/; Domain=' + domain + '; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    } else {
        document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }
}

function restoreLanguage() {
    const savedLang = localStorage.getItem('selectedLanguage');
    const savedLangName = localStorage.getItem('selectedLanguageName');
    const savedLangFlag = localStorage.getItem('selectedLanguageFlag');

    if (savedLang) {
        updateLanguageDisplay(savedLang, savedLangName || 'Français', savedLangFlag || 'fr');

        const currentCookie = getCookie('googtrans');

        if (savedLang !== 'fr' && !currentCookie) {
            setCookie('googtrans', '/fr/' + savedLang, 1);
            setTimeout(() => window.location.reload(), 100);
        }
    }
}
