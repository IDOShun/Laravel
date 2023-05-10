# NOTE: 

I could not make larval environment on docker because I had never learned ‘laravel’ before 2 weeks ago, I  could make ONLY DB server, which is MYSQL, on Docker.
I apologize for the inconvenience and I would like you to install some environment stuff to your ‘check my assignment environment’ pc.


# Accounts

- SuperAdmin Account:
  - email: John.doe@example.com
  - password: password
- Admin Account (Default Permission is READ):
  - email: Jane.doe@example.com
  - password: password
- Merchant Account:
  - email: bob.smith@example.com
  - password: password

# MySQL Account

- user name: root
- password: root

#Initializing Codes
## Initializing DB
  ```code
    php artisan migrate:fresh
    php artisan db:seed
  ```

