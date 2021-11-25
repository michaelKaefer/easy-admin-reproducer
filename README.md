# Run
```bash
composer install
symfony bin/console doctrine:database:create
symfony bin/console doctrine:schema:update --force
symfony server:start
```

Now open `.../admin` in your browser.