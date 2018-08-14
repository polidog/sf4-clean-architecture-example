# sf4-clean-architecture-example

Clean architecture sample by Symfony4.

## Setup

```
$ git clone https://github.com/polidog/sf4-clean-architecture-example.git
$ cd sf4-clean-architecture-sample
$ composer install
$ bin/console doctrine:database:create
$ bin/console doctrine:migrations:migrate
$ bin/console doctrine:fixtures:load
```
 
## using

```
$ bin/console server:start
$ open http://localhost:8000/transfer-money/form
```

 


