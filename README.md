# Student Semester Result System

This API is created using Laravel 8. It has User, Subject and User_Mark. Protected routes are also added. Protected routes are accessed via Passport access token.

#### Following are the Models

-   User
-   Subject
-   User_Mark

## Usage

Clone the project via git clone or download the zip file.

##### .env

Copy contents of .env.example file to .env file. Create a database and connect your database in .env file.

##### Composer Install

cd into the project directory via terminal and run the following command to install composer packages.

###### `composer install`

##### Generate Key

then run the following command to generate fresh key.

###### `php artisan key:generate`

##### Run Migration

then run the following command to create migrations in the database.

###### `php artisan migrate`

##### Passport Install

run the following command to install passport and to generate personal access token.

###### `php artisan passport:install`

##### Database Seeding

run the following command to seed the database with dummy content.

###### `php artisan db:seed`

##### Running the server

###### `php artisan serve`

### API EndPoints

#### User

-   GET `/api/v1/user` - get user details for current logged in user
-   GET `/api/v1/user/semester-result/:semester` - get user semester result

#### Managing the students

Need admin role to access this endpoint

-   Subject

    -   GET `/api/v1/subject` - List out all available subject
    -   PATCH `/api/v1/subject/:subject_id` - Update the subject name or subject code
    -   POST `/api/v1/subject` - Create new subject

-   Students

    -   GET `/api/v1/student` - Get all the student
    -   POST `/api/v1/student` - Create new student
    -   DELETE `/api/v1/student/:student_id` - Delete student
    -   PATCH `/api/v1/student/:student_id` - Update student

-   Student Result
    -   GET `/api/v1/student/:student_id/semester/:semester_id` - Get student result by semester.
    -   POST `/api/v1/student/semester` - Add new semester result to student
    -   DELETE `/api/v1/student/:student_id/semester/:semester_id` - Delete student semester result.
    -   PATCH `/api/v1/student/:student_id/semester/:semester_id/subject/:subject_id` - Update student result by semester subject

Here is the postman collection that you can refer and import to your postman client. [Postman Collection](https://www.getpostman.com/collections/ce960f1376ac16ce17bc)
