# bookfarm-backend

## Description 

Backend Apis for books 
## Language 🔨

PHP with version 8.1.10
## Framework 

Laravel with version 10.7.1
## Database 💾
 
Mysql with version 8.0.30

## Installation ⚙️

* Clone the Repository
* Install Dependancy
```bash
  composer install
```
* Setup .env
```bash
  Copy .env.example to .env and set the database credentials accordingly
```
* Add the database records and run seeders for getting data to test the project 
```bash
  php artisan migrate --seed
```

* Generate the application key

```bash
  php artisan key:generate
```

## Customer API Reference 

#### Books Listing

```http
  GET /api/books
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `page`      | `integer` | **Required**. Which page to return |
| `rowsPerPage`      | `integer` | **Required**. Records per page |
| `sortBy`      | `string` | **Required**. Order the records with selected column |
| `sortType`      | `string` | **Required**. Direction of the order |
| `search[title]`,`search[author]`,  `search[published_on]` , `search[isbn]`,`search[genre]`     | `string` | **Optional**. Filter records matching specified field |
#### Get a book details

```http
  GET /api/books/{id}
```
```{id}``` - Book Id 
## Admin Api Refrence 

#### Login

```http
  GET /api/admin/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. |
| `password` | `string` | **Required**. |



#### Add a new book

```http
  POST api/admin/books
```

| Parameter | Type     |
| :-------- | :------- | 
| `title`      | `string` | 
| `author`      | `string` | 
| `published_on`      | `date` |
| `publisher`      | `string` |
| `isbn`      | `integer` | 
| `genre`      | `string` |
| `description`      | `string` | 
| `image`      | `string` |

#### Update a book

```http
  PUT api/admin/books/{id}
```
```{id}``` - Book Id

| Parameter | Type     | 
| :-------- | :------- |
| `title`      | `string` 
| `author`      | `string` 
| `published_on`      | `date` 
| `publisher`      | `string`
| `isbn`      | `integer` 
| `genre`      | `string` 
| `description`      | `string` 
| `image`      | `string` 

#### Delete a book

```http
  DELETE /api/admin/books/{id}
```
```{id}``` - Book Id

