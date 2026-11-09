// Lightweight behavior: mobile sidebar, dismissible messages, avatar preview.
document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.querySelector('#site-sidebar');
    const overlay = document.querySelector('[data-close-sidebar]');
    const menuButton = document.querySelector('[data-open-sidebar]');
    const closeSidebar = () => {
        sidebar?.classList.remove('is-open');
        overlay?.classList.remove('is-open');
        menuButton?.setAttribute('aria-expanded', 'false');
    };
    menuButton?.addEventListener('click', () => {
        const open = !sidebar.classList.contains('is-open');
        sidebar.classList.toggle('is-open', open);
        overlay?.classList.toggle('is-open', open);
        menuButton.setAttribute('aria-expanded', String(open));
    });
    overlay?.addEventListener('click', closeSidebar);
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeSidebar();
    });
    document.querySelector('[data-dismiss-alert]')?.addEventListener('click', (event) => {
        event.currentTarget.closest('.alert')?.remove();
    });

    const fileInput = document.querySelector('#avatar');
    const preview = document.querySelector('#avatar-preview');
    const label = document.querySelector('#chosen-file-label');
    let objectUrl = null;
    fileInput?.addEventListener('change', () => {
        if (objectUrl) URL.revokeObjectURL(objectUrl);
        objectUrl = null;
        const file = fileInput.files?.[0];
        if (!file) {
            label.textContent = 'No file selected';
            preview.src = preview.dataset.originalSource || preview.src;
            return;
        }
        label.textContent = file.name;
        if (file.type.startsWith('image/')) {
            if (!preview.dataset.originalSource) preview.dataset.originalSource = preview.src;
            objectUrl = URL.createObjectURL(file);
            preview.src = objectUrl;
        }
    });
});
