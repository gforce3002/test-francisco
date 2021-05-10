# iMass Manager

Laravel application with all that's needed to start writing business layer code
this is delivered with:

- Passport API
- User Roles Support
- Bootstrap 4 Ubold Theme
- ReactJS Components
- Console Tasks to user management

## How to install

```shell script
composer create-project --repository="{\"url\":\"git@build.imass.solutions:microservices/managerv7.git\", \"type\": \"git\"}" --stability=dev imass/manager-v7 MYCOOLPROJECT dev-master
cd MYCOOLPROJECT
php artisan migrate
php artisan passport:install
npm install
npm run dev
php artisan serve
```

And that's it!!

## Running Tests

```shell script
php artisan test
```

## Additional Artisan Tasks

**User**
* `user:mail {email} {password}` Sends new user registration mail
* `user:register {name} {email} {password}` Registers a new user
* `user:role {email} {role}` Attaches a role to a user

**Role**
* `role:all-permissions {role}` Attaches all permissions to a role
* `role:attach-permission {role} {permission}` Attaches a permission to a role

