# Report Royalty

This is a college assignment for software engineering subject. A web for manage royalty report. Authors will receive a royalty of 10% of the total printed books multiplied by the price per book ((Price book * printed books) * 10%). For manager royalty report mechanism, use a simple CRUD.

## Requirement

- [x] Code Igniter 4 (Use v4 or above) [official site](https://codeigniter.com/)
- [x] [Composer](https://getcomposer.org/) PHP Package Manager
- [x] [fakerphp/faker](https://fakerphp.github.io/) Package
- [x] [Xampp](https://www.apachefriends.org/index.html) / Mamp

## Configuration

- Configure your database what you want in `.env` file
- If you use default configuration, create and run your database with name "**ci4**"
- Create a table with name "royalty" and with correct structure
  - To make work easier, use Codeigniter migration feature
  - Use RoyaltySeeder in `app\Database\Migrations\2021-07-19-181142_Royalty.php` with run this code in your console
  ```php
  php spark migrate Royalty
  ```
- Seed your database
  - To make work easier, use **fakerphp package**
  - Use RoyaltySeeder in `app\Database\RoyaltySeeder.php` with run this code in your console
  ```php
  php spark db:seed RoyaltySeeder
  ```
- Run your web and database server with XAMPP or  locate your current directory to this project and run this code in your console
  ```php
  php spark serve
  ```
- Enjoy it

## Documentation

### Homepage
  ![Homepage](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/Homepage.png)

### Add
  ![Homepage](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/Add.png)

  Validate input

  ![Validation](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/validation.png)

Added Alert

![Added](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/alertadd.png)

Result

![Resultadd](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/resultadd.png)

### Detail
![Detail](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/detail.png)

### Edit
![Edit](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/edit.png)

### Delete
![Delete](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/delete.png)

Deleted Alert

![Deleted](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/alertdelete.png)

### Search

Searh name "Bagus"
![Search](https://raw.githubusercontent.com/Pureism/Royalty_report/master/public/documentation/Searching.png)

## Reference

Thanks to :pray::wave: :
   
- [x] Youtube Channel WebProgrammingUNPAS in series [Belajar Codeigniter 4](https://bit.ly/36MSaT9)
