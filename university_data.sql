CREATE DATABASE IF NOT EXISTS university;
USE university;

DROP TABLE IF EXISTS fixedfee;
DROP TABLE IF EXISTS registration;
DROP TABLE IF EXISTS section;
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS term;
DROP TABLE IF EXISTS major;
DROP TABLE IF EXISTS faculty;
DROP TABLE IF EXISTS course;
DROP TABLE IF EXISTS department;

CREATE TABLE department(DepartmentID int(4) not null AUTO_INCREMENT, DepartmentName varchar(25) not null, primary key(DepartmentID)) engine=InnoDb;
# Enter the data into the department table

insert into department values(1,'Computer Science');
insert into department values(2,'Telecommunications');
insert into department values(3,'Accounting');
insert into department values(4,'Math and Science');
insert into department values(5,'Liberal Arts');

CREATE TABLE course(CourseID varchar(6) not null, Title varchar(25) not null, Credits int(2) not null, DepartmentID int(4) not null, primary key(CourseID), foreign key(DepartmentID) references department(DepartmentID)) engine=InnoDb;
# Enter the data into the course table

insert into course values('AC101', 'Accounting',3,3);
insert into course values('CIS253','Database Systems',3,1);
insert into course values('CIS265','Systems Analysis',3,3);
insert into course values('EN100','Basic English', 0,5);
insert into course values('LA123','English Literature',3,5);
insert into course values('MA150','College Algebra',3,4);

CREATE TABLE faculty(FacultyID int(3) not null, Name varchar(25) not null, RoomID int(2) not null, Phone int(3), DepartmentID int(4) not null, primary key(FacultyID), foreign key(DepartmentID) references department(DepartmentID)) engine=InnoDb;
# Enter the data into the faculty table

insert into faculty values(111,'Jones',11,525,1);
insert into faculty values(123,'Mobley',11,529,1);
insert into faculty values(222,'Williams',20,533,2);
insert into faculty values(235,'Vajpayee',12,577,2);
insert into faculty values(333,'Collins',17,599,3);
insert into faculty values(345,'Sen',12,579,3);
insert into faculty values(444, 'Rivera',21,544,4);
insert into faculty values(555,'Chang',17,587,5);

CREATE TABLE major(MajorID int(3) not null, MajorDescription varchar(100), primary key(MajorID)) engine=InnoDb;
# Enter the data into the major table

insert into major values(100,'AAS-Accounting');
insert into major values(200,'AAS-Computer Science');
insert into major values(300,'AAS-Telecommunications');
insert into major values(400,'BS-Accounting');
insert into major values(500,'BS-Computer Science');
insert into major values(600,'BS-Telecommunications');

CREATE TABLE term(TermID varchar(4) not null, TermDescription varchar(100), StartDate Date not null, EndDate Date not null, primary key(TermID)) engine=InnoDb;

# Enter the data into the term table

insert into term values('FL02','Fall 2002','2002-09-08','2002-12-20');
insert into term values('FL03','Fall 2003','2003-09-07','2003-12-19');
insert into term values('SP02','Spring 2002','2002-04-28','2002-08-16');
insert into term values('SP03','Spring 2003','2003-03-27','2003-08-15');
insert into term values('WN03','Winter 2003','2003-01-05','2003-04-18');

CREATE TABLE student(StudentID  char(5) not null, LastName varchar(15) not null, FirstName varchar(15) not null, Street varchar(25) not null, City varchar(10) not null, State varchar(2) not null, Zip varchar(5) not null, StartTerm varchar(4) not null, BirthDate Date not null, MajorID int(3) not null, Phone varchar(10), primary key(StudentID), foreign key(StartTerm) references term(TermID),foreign key(MajorID) references major(MajorID)) engine=InnoDb;
# Enter the data into the student table

insert into student values('00100','Diaz','Jose','1 Ford Avenue #7','Hill','NJ','08863','WN03','1983-02-12',100,'9735551111');
insert into student values('00101','Tyler','Mickey','12 Morris Avenue','Bronx','NY','10468','SP03','1984-03-18',500,'7185552222');
insert into student values('00102','Patel','Rajesh','25 River Road #3','Edison','NJ','08837','WN03','1985-12-12',400,'7325553333');
insert into student values('00103','Rickles','Deborah','100 Main Street','Iselin','NJ','08838','FL02','1970-10-20',500,'7325554444');
insert into student values('00104','Lee','Brian','2845 First Line','Hope','NY','11373','WN03','1985-10-28',600,'2125555555');
insert into student values('00105','Khan','Amir','213 Broadway','Clifton','NJ','07222','WN03','1984-07-07',200,'2015556666');


CREATE TABLE section(SectionID int(4) not null, CourseID varchar(6) not null, Section char(2) not null, TermID varchar(4) not null, FacultyID int(3), Day varchar(2), MaxCount int(2), StartTime Time, EndTime Time, RoomID int(2) not null, primary key(SectionID, CourseID), foreign key(CourseID) references course(CourseID),foreign key(TermID) references term(TermID), foreign key(FacultyID) references faculty(FacultyID))engine=InnoDb;

# Enter the data into the section table

insert into section values(1101,'CIS265','01','WN03',111,'MW',30,'09:00:00','10:30:00',13);	
insert into section values(1102,'CIS253','01','WN03',123,'TR',40,'09:00:00','10:30:00',18);
insert into section values(1103,'MA150','02','WN03',444,'F',25,'09:00:00','12:00:00',15);
insert into section values(1104,'AC101','10','WN03',345,'MW',35,'10:30:00','12:00:00',16);
insert into section values(1205,'CIS265','01','SP03',NULL,'MW',35,'09:00:00','10:30:00',14);
insert into section values(1206,'CIS265','02','SP03',111,'TR',30,'09:00:00','10:30:00',18);	
insert into section values(1207,'LA123','05','SP03',NULL,'MW',30,'09:00:00','10:30:00',15);
insert into section values(1208,'CIS253','21','SP03',123,'TR',40,'09:00:00','12:00:00',14);
insert into section values(1209,'CIS253','11','SP03',111,'MW',40,'09:00:00','10:30:00',18);
insert into section values(1210,'CIS253','31','SP03',123,'F',45,NULL,NULL,19);

CREATE TABLE registration(StudentID char(5) not null, SectionID int(4) not null, MidtermGrade char(1), FinalGrade char(1), primary key(StudentID, SectionID), foreign key(StudentID) references student(StudentID),foreign key(SectionID) references section(SectionID)) engine=InnoDb;
# Enter the data into the registration table

insert into registration values('00100',1102,'B','B');
insert into registration values('00100',1103,'C','F');
insert into registration values('00100',1104,'B','A');
insert into registration values('00100',1207, NULL,NULL);
insert into registration values('00101',1205, NULL,NULL);
insert into registration values('00102',1102,'F','D');
insert into registration values('00102',1103,'A','A');
insert into registration values('00102',1206,'B','C');
insert into registration values('00102',1207,NULL,NULL);
insert into registration values('00102',1210,NULL,NULL);
insert into registration values('00103',1101,'F','W');
insert into registration values('00103',1104,'D','D');
insert into registration values('00103',1206,'A','B');
insert into registration values('00104', 1206, NULL,NULL);
insert into registration values('00104',1207,NULL,NULL);
insert into registration values('00104',1210,NULL,NULL);	
insert into registration values('00105',1208,NULL,NULL);
insert into registration values('00105',1209,NULL,NULL);

CREATE TABLE fixedfee(FeeName varchar(25) not null, Fee decimal(2,2), primary key (FeeName)) engine=InnoDb;
# Enter the data into the fixedfee table

insert into fixedfee values('Activity Fee',65.00);
insert into fixedfee values('Health Fee',30.00);
insert into fixedfee values('Technology Fee',75.00);
insert into fixedfee values('Transportation Fee',25.00);


