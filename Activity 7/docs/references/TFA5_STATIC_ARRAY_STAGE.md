# TFA5 historical foundation: static arrays before database integration

TFA5 specifically required five sample records stored as PHP arrays in `CustomerController` and `UserController`, passed to their respective Blade templates and looped over with `@foreach`. The **final live controllers do not contain these arrays** because TFA6 specifically says to **replace** them with Eloquent models. This page documents the earlier stage so the grader can see the progression.

## CustomerController@index in the original TFA5 stage

```php
public function index()
{
    $customers = [
        ['full_name' => 'Andrea Villanueva', 'email' => 'andrea.villanueva@example.com', 'phone' => '0917 234 1001'],
        ['full_name' => 'Miguel Santos', 'email' => 'miguel.santos@example.com', 'phone' => '0918 234 1002'],
        ['full_name' => 'Camille Reyes', 'email' => 'camille.reyes@example.com', 'phone' => '0919 234 1003'],
        ['full_name' => 'Lorenzo Bautista', 'email' => 'lorenzo.bautista@example.com', 'phone' => '0920 234 1004'],
        ['full_name' => 'Isabella Cruz', 'email' => 'isabella.cruz@example.com', 'phone' => '0921 234 1005'],
    ];

    return view('customers.index', compact('customers'));
}
```

## UserController@index in the original TFA5 stage

```php
public function index()
{
    $users = [
        ['username' => 'jreyes', 'full_name' => 'Julian Reyes'],
        ['username' => 'mdela_cruz', 'full_name' => 'Mika Dela Cruz'],
        ['username' => 'apascual', 'full_name' => 'Alyssa Pascual'],
        ['username' => 'rgarcia', 'full_name' => 'Rafael Garcia'],
        ['username' => 'kmendoza', 'full_name' => 'Katrina Mendoza'],
    ];

    return view('users.index', compact('users'));
}
```

## How this evolved in TFA6 and TFA7

- TFA5: `@foreach ($customers as $customer)` with array access `$customer['full_name']`.
- TFA6: `Customer::query()->orderBy('full_name')->get()` with Eloquent model property access `$customer->full_name`.
- TFA7: the same Eloquent dataset feeds a create/edit/search page, with validation and persistence.
- The same transition applies to the `User` model and user list, with TFA7 adding avatar paths.

These snippets are **reference only**. Do not paste them back into the production controllers after completing TFA6: that would break the required database integration.
