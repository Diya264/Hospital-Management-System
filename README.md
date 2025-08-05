# Hospital Management System

A simple Hospital Management System built using **PHP**, **MySQL**, **HTML**, and **CSS**.  
It allows management of patients, doctors, appointments, bills, and medical procedures from a web interface.


## Project Structure

- hospital/
- │
- ├── add_appointment.php
- ├── add_bill.php
- ├── add_doctor.php
- ├── add_medicalprocedure.php
- ├── add_patients.php
- ├── appointments.php
- ├── Bills.php
- ├── connect.php
- ├── doctor_dashboard.php
- ├── home.php
- ├── login.php
- ├── logout.php
- ├── medical_procedure.php
- ├── patient_details.php
- └── hosp.jpg  // No image present, use a image of your choice


## 💻 Tech Stack

- **Frontend:**  
  - HTML5  
  - CSS3  

- **Backend:**  
  - PHP(PDO)  

- **Database:**  
  - MySQL  


## Features

- Add, update, and view patients  
- Manage doctors and their dashboard  
- Handle appointments between patients and doctors  
- Generate and manage bills  
- Record medical procedures and details  
- Secure login and logout system  


## Installation & Setup
> **Prerequisite:** Make sure you have **XAMPP**/**WAMP**/**LAMP** or any local server with PHP and MySQL.

**Clone the repository**
```bash
git clone https://github.com/<your-username>/hospital-management-system.git
cd hospital-management-system
```

**Set up the database**
- Create a database named hospital in phpMyAdmin.
- Create the required tables, for example:

```bash
CREATE TABLE doctors (
  doctorID INT PRIMARY KEY,
  name VARCHAR(100),
  specialization VARCHAR(100),
  phone VARCHAR(20),
  email VARCHAR(100),
  address TEXT
);
```
- (Similarly, create patients, appointments, bills, etc.)
- Update your database credentials in connect.php:
```bash
$HOSTNAME = 'your_hostname';
$USERNAME = 'your_username';
$PASSWORD = 'you_actual_password';
$DATABaSE = 'your_database_name';
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABaSE);
```
# Run the project

- Move the hospital folder to your server directory:

- For XAMPP: C:/xampp/htdocs/hospital/

- Start Apache and MySQL from XAMPP Control Panel.

- Visit in your browser:
- http://localhost/hospital/login.php
