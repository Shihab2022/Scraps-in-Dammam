/* ============================================================
 * Scraps Buyer in Saudi Arabia — front-end behaviour (vanilla JS)
 * ============================================================ */
    // Mark the document as JS-capable. style.css keeps .reveal content visible
    // while the "no-js" class is present, so a script failure can never leave
    // the page permanently blank.
    document.documentElement.classList.remove('no-js');
    document.documentElement.classList.add('js');

(function () {
    'use strict';
    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- Mobile navigation drawer ---------- */
    var toggle = document.getElementById('navToggle');
    var menu = document.getElementById('navMenu');
    var overlay = document.getElementById('navOverlay');

    // Menu button labels come from PHP so they follow the active language.
    var labelOpen = (toggle && toggle.getAttribute('data-label-open')) || 'Open menu';
    var labelClose = (toggle && toggle.getAttribute('data-label-close')) || 'Close menu';

    var overlayTimer = null;

    function openMenu() {
        if (!menu || !toggle) return;
        if (overlayTimer) { clearTimeout(overlayTimer); overlayTimer = null; }
        menu.classList.add('open');
        if (overlay) {
            overlay.hidden = false;
            overlay.classList.add('show');
        }
        document.body.classList.add('nav-open');
        toggle.setAttribute('aria-expanded', 'true');
        toggle.setAttribute('aria-label', labelClose);
    }
    function closeMenu() {
        if (!menu || !toggle) return;
        menu.classList.remove('open');
        // .show drives the fade + pointer-events, and the overlay is then hidden
        // outright so an invisible backdrop can never sit over the page and
        // swallow taps — that would make the menu look like it never opens.
        if (overlay) {
            overlay.classList.remove('show');
            if (overlayTimer) clearTimeout(overlayTimer);
            overlayTimer = setTimeout(function () {
                if (!menu.classList.contains('open')) overlay.hidden = true;
            }, 260);
        }
        document.body.classList.remove('nav-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', labelOpen);
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

    // The drawer has its own close button inside its header, so the popup never
    // depends on the navbar hamburger (which is hidden while the drawer is open).
    var closeBtn = document.getElementById('navClose');
    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            closeMenu();
            if (toggle) toggle.focus();
        });
    }

    /* ---------- Dropdowns (We Buy / Locations) ---------- */
    // In the drawer (≤1200px) every group is expanded by CSS itself, so the script
    // never has to reveal them: it only marks a group .collapsed when the visitor
    // taps it shut, and syncs aria-expanded. On desktop the panels open on hover
    // and only one can be pinned open at a time (the .open class).
    var drawerQuery = window.matchMedia('(max-width: 1200px)');
    var dropdownGroups = document.querySelectorAll('.nav-menu .has-dropdown');

    function setGroupCollapsed(group, collapsed) {
        group.classList.toggle('collapsed', collapsed);
        // .open is kept in sync as well: the current stylesheet expands groups by
        // default, but an older cached copy reveals them through .open — either
        // way every option ends up visible in the drawer.
        group.classList.toggle('open', !collapsed);
        var btn = group.querySelector('.nav-dropdown-toggle');
        if (btn) btn.setAttribute('aria-expanded', String(!collapsed));
    }

    function syncNavMode() {
        var drawer = drawerQuery.matches;
        dropdownGroups.forEach(function (group) {
            setGroupCollapsed(group, !drawer);  // drawer: expanded · desktop: hover-driven
        });
    }
    syncNavMode();
    if (drawerQuery.addEventListener) {
        drawerQuery.addEventListener('change', syncNavMode);
    } else if (drawerQuery.addListener) {
        drawerQuery.addListener(syncNavMode);   // Safari < 14
    }

    document.querySelectorAll('.nav-dropdown-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var group = btn.closest('.has-dropdown');
            if (drawerQuery.matches) {
                // Drawer: open by default, so a tap only collapses/expands this group
                // and the other groups keep showing their options.
                setGroupCollapsed(group, !group.classList.contains('collapsed'));
                return;
            }
            var willOpen = !group.classList.contains('open');
            group.parentElement.querySelectorAll('.has-dropdown').forEach(function (sib) {
                if (sib !== group) {
                    sib.classList.remove('open');
                    var ob = sib.querySelector('.nav-dropdown-toggle');
                    if (ob) ob.setAttribute('aria-expanded', 'false');
                }
            });
            group.classList.toggle('open', willOpen);
            btn.setAttribute('aria-expanded', String(willOpen));
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



})();
