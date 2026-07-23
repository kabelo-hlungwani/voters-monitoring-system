document.addEventListener('DOMContentLoaded', function () {
    var menuButton = document.getElementById('menuToggle');
    var mobileMenu = document.getElementById('mobileMenu');
    var quickPanel = document.getElementById('quickActionsPanel');
    var quickLauncher = document.getElementById('quickActionsLauncher');
    var quickToggle = document.getElementById('quickActionsToggle');
    var quickBody = document.getElementById('quickActionsBody');
    var quickIcon = document.getElementById('quickActionsIcon');

    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }

    if (quickToggle && quickBody && quickIcon) {
        var storageKey = 'vms-quick-actions-collapsed';

        function setQuickState(collapsed) {
            if (quickPanel && quickLauncher) {
                quickPanel.classList.toggle('hidden', collapsed);
                quickLauncher.classList.toggle('hidden', !collapsed);
            }

            quickBody.classList.toggle('hidden', collapsed);
            quickToggle.setAttribute('aria-expanded', String(!collapsed));
            quickIcon.className = collapsed ? 'fa fa-chevron-down text-xs text-[#123f9f]' : 'fa fa-chevron-up text-xs text-[#123f9f]';
            if (quickLauncher) {
                quickLauncher.setAttribute('aria-expanded', String(collapsed));
            }

            try {
                window.localStorage.setItem(storageKey, collapsed ? '1' : '0');
            } catch (error) {
                // Ignore storage failures.
            }
        }

        var initialCollapsed = false;

        try {
            initialCollapsed = window.localStorage.getItem(storageKey) === '1';
        } catch (error) {
            initialCollapsed = false;
        }

        setQuickState(initialCollapsed);

        quickToggle.addEventListener('click', function () {
            setQuickState(!quickBody.classList.contains('hidden'));
        });

        if (quickLauncher) {
            quickLauncher.addEventListener('click', function () {
                setQuickState(false);
            });
        }
    }
});
