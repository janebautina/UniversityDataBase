Welcome to University DataBase Project:

Goals: 
* design an ER schema diagram 
* map the ER schema into a relational database schema
* implement it on MySQL
* load data into your database
* create queries
* design and implement a web application using PHP
* connect web application with MySQL database

Objects:
* Department: The university is organized into departments. Each department is described by a name and department ID.
* Course: Each department has a list of courses it offers. Each course is associated with a course ID, title, credits, and department ID.
* Faculty: Faculties are identified by their unique ID. Each faculty has a name, an associated room ID, phone number, and department ID.
* Student: Students are identified by their unique ID. Each student has a name, address, birthdate, phone, an associated start term and a major ID.
* Term: The university maintains a list of terms, specifying the term ID, term description, start date and end date.
* Section: The university maintains a list of all the classes (sections) taught. Each section is identified by a section ID, course ID, section number, room ID, start time, end time, max count, day, and term ID. Each section has an instructor.
* Registration: The university has a list of all student course registrations specifying the associated sections each student has taken (or registered for), midterm grade, and final grade.
* Major: The university has a list of all majors. Each major is identified by a unique number (major ID), and a description of each major.
* FixedFee: This table records information about all fixed fees a student is required to pay each term they register.