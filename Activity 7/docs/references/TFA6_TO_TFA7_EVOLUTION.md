# TFA6 to TFA7 technical progression

In TFA6 the `customers` and `users` migrations introduce real database tables, a pair of seeders inserts more than five sample entries, and Eloquent retrieves lists. TFA7 retains that foundation and adds `POST` and `PUT` routes, validation, prefilled forms, and a separate `avatar` migration.

- `users` table is created in `0001_01_01_000000_create_users_table.php` with a unique `username` and required `full_name`.
- `customers` table is created in `2026_11_09_000001_create_customers_table.php` with `full_name`, `email`, nullable `phone`.
- `avatar` is deliberately added *after* the original TFA6 schema through `2026_11_09_000002_add_avatar_to_users_table.php`.
- Eloquent `$fillable` explicitly lists editable columns to avoid mass assignment of arbitrary request fields.
- The upload is read into memory, cropped by Intervention Image v3, encoded as WebP, and stored under a UUID filename in the `public` disk.
- Only that relative path is assigned to the Eloquent user. The original upload is not kept and the old thumbnail is cleaned up after a successful replacement.

The application uses only normal server-rendered Laravel Blade; asset CSS and JavaScript are placed in `public/` so users do not need to install Node or run a Vite build.
