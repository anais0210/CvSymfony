CvSymfony
=========


>>Cv basé sur Symfony 3.4 .
>>Premier projet, Découverte du Framework suite a la formation OpenClassRooms

1. Installation
    ```
	git clone https://github.com/anais0210/CvSymfony.git
	composer install
	php bin/console do:da:cr
	php bin/console do:sc:up --force
	```

2. Qualité

    ```
    vendor/bin/phpcs --standard=vendor/leaphub/phpcs-symfony2-standard/leaphub/phpcs/Symfony2/ --extensions=php src/
    ```