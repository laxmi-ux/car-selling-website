# 🚗 Car Selling Website

A web-based **Car Selling Website** developed to provide users with an easy way to explore cars, check prices, view vehicle details, and book car inspections.

## 📌 Project Overview

The Car Selling Website is designed to simplify the process of buying and selling cars online. Users can browse available cars, check their details and prices, and request an inspection.

The project was developed as a practical web development project using **HTML, CSS, PHP, and MySQL**.

## ✨ Features

* 🏠 User-friendly homepage
* 🚘 Browse available cars
* 🔍 View car details
* 💰 Check car prices
* 📋 Book/request vehicle inspection
* 📱 WhatsApp notification for admin
* 👤 User-friendly interface
* 🗄️ Database integration
* 🔐 PHP-based backend functionality

## 🛠️ Technologies Used

* **HTML5** – Website structure
* **CSS3** – Styling and responsive design
* **PHP** – Backend functionality
* **MySQL** – Database management
* **XAMPP** – Local development server

## 📂 Project Structure

```text
CarSellingWebsite/
│
├── CarSelling Project/
│   ├── index.php
│   ├── css/
│   ├── images/
│   ├── js/
│   ├── includes/
│   └── other PHP files
│
└── README.md
```

> The exact folder structure may vary depending on the project files.

## ⚙️ How to Run the Project

### 1. Install XAMPP

Download and install [XAMPP](https://www.apachefriends.org/).

### 2. Start XAMPP

Open XAMPP Control Panel and start:

```text
Apache
MySQL
```

### 3. Add the Project

Copy the project folder into:

```text
C:\xampp\htdocs\
```

For example:

```text
C:\xampp\htdocs\CarSellingWebsite\
```

### 4. Create the Database

Open:

```text
http://localhost/phpmyadmin
```

Create a MySQL database and import the project's `.sql` file if one is included.

### 5. Configure Database Connection

Update the database configuration in the PHP connection file according to your local MySQL settings.

Example:

```php
$conn = mysqli_connect("localhost", "root", "", "car_selling");
```

### 6. Open the Website

Open your browser and visit:

```text
http://localhost/CarSellingWebsite/
```

If your main project is inside another folder, use the corresponding folder name in the URL.

## 📸 Project Screenshots

Add screenshots of your project here:


#Homepage
<img width="1916" height="932" alt="image" src="https://github.com/user-attachments/assets/3800e703-d42f-4474-a05e-24664f33664b" />

#Cars
<img width="1907" height="877" alt="image" src="https://github.com/user-attachments/assets/0d7494d5-7eeb-421e-b999-c78d5548cdba" />

<img width="1915" height="922" alt="image" src="https://github.com/user-attachments/assets/ff767d14-e472-4576-a77c-f7bc68a8e608" />

#Inspection Booking
<img width="1907" height="897" alt="image" src="https://github.com/user-attachments/assets/3c7246d0-57d7-4445-b1ee-cf902088f137" />



## 🎯 Project Objectives

* Create a simple online platform for car listings.
* Allow users to explore available vehicles.
* Provide car price and inspection-related information.
* Store and manage data using MySQL.
* Practice frontend and backend web development.

## 🔮 Future Improvements

* User registration and login
* Advanced car search and filtering
* Online payment integration
* Admin dashboard
* Car comparison feature
* Email notifications
* Improved mobile responsiveness

## 👩‍💻 Developed By

**Laxmi Pal**

BCA Graduate | Web Development Enthusiast

---

⭐ If you find this project useful, feel free to star the repository!
