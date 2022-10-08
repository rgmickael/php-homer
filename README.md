
# Homer

A simple PHP application: homepage with a profile page after authentification.

Show case the standard folder structure best practices:

```
├───src
│   ├───components
│   │       Router.php
│   │       Template.php
│   │
│   ├───handlers
│   │       Handler.php
│   │       Login.php
│   │       Logout.php
│   │       Profile.php
│   │
│   └───templates
│           login-form.php
│           main.php
│           profile.php
│
└───web
    │   index.php
    │
    └───css
            bootstrap.min.css
```

## Run Locally

Clone the project

```bash
  git clone https://github.com/rgmickael/php-homer.git
```

Go to the project directory

```bash
  cd php-homer/web
```

Start the server

```bash
 php -S localhost:port
```

