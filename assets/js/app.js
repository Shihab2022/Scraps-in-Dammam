/* ============================================================
 * Scraps Buyer in Saudi Arabia — front-end behaviour (vanilla JS)
 * ============================================================ */
(function () {
    'use strict';
    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- Mobile navigation drawer ---------- */
    var toggle = document.getElementById('navToggle');
    var menu = document.getElementById('navMenu');
    var overlay = document.getElementById('navOverlay');

    function openMenu() {
        if (!menu || !toggle) return;
        menu.classList.add('open');
        if (overlay) overlay.hidden = false;
        document.body.classList.add('nav-open');
        toggle.setAttribute('aria-expanded', 'true');
        toggle.setAttribute('aria-label', 'Close menu');
    }
    function closeMenu() {
        if (!menu || !toggle) return;
        menu.classList.remove('open');
        if (overlay) overlay.hidden = true;
        document.body.classList.remove('nav-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open menu');
    }
    if (toggle) {
        toggle.addEventListener('click', function () {
            var open = menu.classList.contains('open');
            open ? closeMenu() : openMenu();
            if (!open) {
                var first = menu.querySelector('a');
                if (first) first.focus();
            } else {
                toggle.focus();
            }
        });
        menu.addEventListener('click', function (e) {
            var link = e.target.closest('a');
            if (link) closeMenu();
        });
        if (overlay) overlay.addEventListener('click', closeMenu);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menu.classList.contains('open')) closeMenu();
        });
    }

    /* ---------- Dropdowns (We Buy / Locations) ---------- */
    document.querySelectorAll('.nav-dropdown-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var parent = btn.closest('.has-dropdown');
            var isOpen = parent.classList.contains('open');
            parent.parentElement.querySelectorAll('.has-dropdown').forEach(function (sib) {
                if (sib !== parent) {
                    sib.classList.remove('open');
                    var ob = sib.querySelector('.nav-dropdown-toggle');
                    if (ob) ob.setAttribute('aria-expanded', 'false');
                }
            });
            parent.classList.toggle('open', !isOpen);
            btn.setAttribute('aria-expanded', String(!isOpen));
        });
    });

    /* ---------- FAQ accordion (ARIA) ---------- */
    document.querySelectorAll('[data-accordion]').forEach(function (group) {
        group.querySelectorAll('.faq-item__btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var panel = document.getElementById(btn.getAttribute('aria-controls'));
                var expanded = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', String(!expanded));
                if (panel) panel.hidden = expanded;
                if (!group.hasAttribute('data-multi')) {
                    group.querySelectorAll('.faq-item__btn').forEach(function (other) {
                        if (other !== btn) {
                            other.setAttribute('aria-expanded', 'false');
                            var p = document.getElementById(other.getAttribute('aria-controls'));
                            if (p) p.hidden = true;
                        }
                    });
                }
            });
        });
    });
    /* ---------- Reveal on scroll ---------- */
    if (!prefersReduced && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry, idx) {
                if (entry.isIntersecting) {
                    // stagger siblings slightly for a nicer cascade
                    var delay = Math.min(idx * 90, 360);
                    setTimeout(function () { entry.target.classList.add('visible'); }, delay);
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });
    } else {
        document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('visible'); });
    }

    /* ---------- Location tabs (Mecca / Jeddah / Taif map switcher) ---------- */
    document.querySelectorAll('[data-loc-tabs]').forEach(function (tabs) {
        var btns = tabs.querySelectorAll('[data-loc-tab]');
        btns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var key = btn.getAttribute('data-loc-tab');
                btns.forEach(function (b) {
                    var active = b === btn;
                    b.classList.toggle('is-active', active);
                    b.setAttribute('aria-selected', String(active));
                });
                tabs.querySelectorAll('.loc-tabs__panel').forEach(function (panel) {
                    var match = panel.id === 'loc-panel-' + key;
                    panel.classList.toggle('is-active', match);
                    if (match) {
                        panel.hidden = false;
                        var frame = panel.querySelector('iframe');
                        if (frame && !frame.getAttribute('src')) {
                            frame.setAttribute('src', frame.getAttribute('data-src') || '');
                        }
                    } else {
                        panel.hidden = true;
                    }
                });
            });
        });
    });

    /* ---------- Sticky header shadow ---------- */
    var header = document.getElementById('siteHeader');
    if (header) {
        function applyShadow() {
            var y = window.pageYOffset || document.documentElement.scrollTop;
            header.style.boxShadow = y > 4 ? '0 6px 24px rgba(22,24,29,.14)' : '0 4px 18px rgba(22,24,29,.08)';
        }
        window.addEventListener('scroll', applyShadow, { passive: true });
        applyShadow();
    }

    /* ---------- Photo upload UX ---------- */
    document.querySelectorAll('input[type=file][data-files]').forEach(function (input) {
        var target = document.querySelector(input.getAttribute('data-files'));
        function renderNames() {
            if (!target) return;
            var out = target.querySelector('.file-list');
            if (!out) return;
            var names = Array.prototype.map.call(input.files, function (f) { return f.name; });
            out.textContent = names.length ? (input.multiple ? names.join(', ') : names[0]) : '';
        }
        input.addEventListener('change', renderNames);
        if (target) {
            target.addEventListener('click', function () { input.click(); });
            ['dragover', 'dragleave', 'drop'].forEach(function (evt) {
                target.addEventListener(evt, function (e) {
                    e.preventDefault();
                    if (target.classList) target.classList.toggle('dragover', evt === 'dragover');
                });
            });
            target.addEventListener('drop', function (e) {
                e.preventDefault();
                if (e.dataTransfer && input.files) {
                    input.files = e.dataTransfer.files;
                    renderNames();
                }
            });
        }
    });

    /* ---------- Lightweight required-field hint ---------- */
    document.querySelectorAll('form[data-validate]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            var firstInvalid = null;
            form.querySelectorAll('[required]').forEach(function (el) {
                if (el.value.trim() === '' && !firstInvalid) firstInvalid = el;
            });
            if (firstInvalid) {
                e.preventDefault();
                var field = firstInvalid.closest('.field');
                if (field) field.classList.add('field--error');
                firstInvalid.focus();
            }
        });
    });

    /* ---------- Loading screen (preloader) ----------
     * The overlay is already on screen (the server puts `is-loading` on <html>),
     * so this only measures progress and lifts it once the critical assets —
     * images above the fold plus the first frame of the hero video — are ready.
     * Every wait has a hard cap so a slow file can never block the site.
     */
    var loader = document.getElementById('siteLoader');
    if (loader) {
        (function () {
            var root = document.documentElement;
            var bar = document.getElementById('siteLoaderBar');
            var maxWait = parseInt(loader.getAttribute('data-max-wait'), 10) || 6000;
            var videoWait = parseInt(loader.getAttribute('data-video-wait'), 10) || 4000;
            var minShow = parseInt(loader.getAttribute('data-min-show'), 10) || 500;
            var startedAt = Date.now();
            var revealed = false;
            var settled = 0;
            var watched = [];

            /* Lazy (below-the-fold) images and the loader artwork itself are never
             * tracked — the first would not load while the overlay is up. */
            Array.prototype.forEach.call(document.querySelectorAll('img'), function (img) {
                if (img.closest('#siteLoader')) return;
                if (img.getAttribute('loading') === 'lazy') return;
                watched.push(img);
            });

            var video = document.querySelector('video');
            var total = watched.length + 1; // +1 for the document itself

            function paintProgress() {
                if (!bar) return;
                var pct = Math.round((settled / total) * 100);
                bar.style.width = Math.min(100, pct) + '%';
            }

            function reveal() {
                if (revealed) return;
                revealed = true;
                var hold = Math.max(0, minShow - (Date.now() - startedAt));
                window.setTimeout(function () {
                    loader.classList.add('is-hidden');
                    root.classList.remove('is-loading');
                    window.setTimeout(function () {
                        loader.hidden = true;
                        if (loader.parentNode) loader.parentNode.removeChild(loader);
                    }, 500);
                    try { sessionStorage.setItem('scrap_preloader_done', '1'); } catch (e) {}
                }, hold);
            }

            function settle() {
                settled++;
                paintProgress();
                if (settled >= total) reveal();
            }

            watched.forEach(function (img) {
                if (img.complete) { settle(); return; }  // cached or already failed
                img.addEventListener('load', settle, { once: true });
                img.addEventListener('error', settle, { once: true });
            });

            /* Hero video — first decoded frame, or videoWait ms, whichever is first. */
            if (video) {
                var videoSettled = false;
                var settleVideo = function () {
                    if (videoSettled) return;
                    videoSettled = true;
                    settle();
                };
                if (video.readyState >= 2) {
                    settleVideo();
                } else {
                    ['loadeddata', 'canplay', 'error'].forEach(function (eventName) {
                        video.addEventListener(eventName, settleVideo, { once: true });
                    });
                    window.setTimeout(settleVideo, videoWait);
                }
            } else {
                settle();
            }

            /* The document itself — stylesheets, fonts and the rest of the markup. */
            if (document.readyState === 'complete') settle();
            else window.addEventListener('load', settle, { once: true });

            /* Hard caps: reveal on maxWait, and a last-resort safety net that
             * releases the scroll lock even if a resource never reports back. */
            window.setTimeout(reveal, maxWait);
            window.setTimeout(function () {
                root.classList.remove('is-loading');
                loader.hidden = true;
            }, maxWait + 4000);

            paintProgress();
        })();
    } else if (document.documentElement.classList.contains('is-loading')) {
        document.documentElement.classList.remove('is-loading');
    }
})();
