<svg class="{{ $class ?? 'icon' }}" width="{{ $size ?? 20 }}" height="{{ $size ?? 20 }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
@switch($name)
    @case('home') <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V10Z"/><path d="M9 21v-8h6v8"/> @break
    @case('customers') <circle cx="9" cy="8" r="3"/><path d="M3 20v-2a6 6 0 0 1 12 0v2M16 8a3 3 0 1 1 0 6M17 17a5 5 0 0 1 4 4"/> @break
    @case('users') <rect x="3" y="4" width="18" height="16" rx="3"/><circle cx="9" cy="10" r="2"/><path d="M5.5 17c.2-2 1.5-3 3.5-3s3.3 1 3.5 3M15 9h4M15 13h4"/> @break
    @case('about') <circle cx="12" cy="12" r="9"/><path d="M12 11v6M12 7h.01"/> @break
    @case('plus') <path d="M12 5v14M5 12h14"/> @break
    @case('arrow-right') <path d="M5 12h14m-7-7 7 7-7 7"/> @break
    @case('arrow-left') <path d="M19 12H5m7 7-7-7 7-7"/> @break
    @case('arrow-up-right') <path d="M7 17 17 7M8 7h9v9"/> @break
    @case('edit') <path d="M12 20h9M16.7 3.7a2.1 2.1 0 0 1 3 3L9 17.4 4 19l1.6-5z"/> @break
    @case('search') <circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/> @break
    @case('menu') <path d="M4 7h16M4 12h16M4 17h16"/> @break
    @case('x') <path d="M5 5 19 19M19 5 5 19"/> @break
    @case('check') <path d="m4 12 5 5L20 6"/> @break
    @case('check-circle') <circle cx="12" cy="12" r="9"/><path d="m8 12 3 3 5-6"/> @break
    @case('image') <rect x="3" y="3" width="18" height="18" rx="3"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 16-5-5-9 10"/> @break
    @case('layers') <path d="m12 2 9 5-9 5-9-5 9-5ZM3 12l9 5 9-5M3 17l9 5 9-5"/> @break
    @case('database') <ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v7c0 2 4 4 9 4s9-2 9-4V5M3 12v7c0 2 4 3 9 3s9-1 9-3v-7"/> @break
    @case('code') <path d="m8 8-4 4 4 4m8-8 4 4-4 4m-3-12-2 16"/> @break
    @case('upload') <path d="M12 16V3m-5 5 5-5 5 5M4 17v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3"/> @break
    @case('shield') <path d="m12 2 8 4v6c0 5-3.4 8.5-8 10-4.6-1.5-8-5-8-10V6z"/><path d="m9 12 2 2 4-4"/> @break
    @case('sparkles') <path d="m12 2 1.6 6.4L20 10l-6.4 1.6L12 18l-1.6-6.4L4 10l6.4-1.6ZM19 17l.7 2.3L22 20l-2.3.7L19 23l-.7-2.3L16 20l2.3-.7Z"/> @break
    @case('calendar') <rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 3v4M17 3v4M3 10h18"/> @break
    @case('grid') <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/> @break
    @default <circle cx="12" cy="12" r="9"/> @break
@endswitch
</svg>
