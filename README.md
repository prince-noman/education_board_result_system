<div align="center">
  <h1>🎓 Education Board Result System</h1>
  <p>A Web-Based Portal for Student Mark Management and Result Checking</p>
  
  <p>
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
    <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
    <img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap" />
    <img src="https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white" alt="jQuery" />
  </p>
</div>

<br/>

## 📝 Overview
**Education Board Result System** is a responsive web application built clone the functionality of the official Bangladesh Education Board Result portal. It features an interactive dashboard for administrators to register students, update their academic profiles, enter continuous mark evaluations, and a public-facing portal where students can retrieve and view their final results asynchronously.

---

## ✨ Features

### 👨‍💻 Administrator Module
* **Student Registration:** Easily enroll new students with personalized information (Name, Email, Cell) and academic parameters (Board, Roll, Registration, Examination type, Year).
* **Profile Management:** Update or delete student records seamlessly. Display an active list of all registered candidates in the administrative table.
* **Photograph Uploads:** Supports custom profile picture uploads directly into the student registry.
* **Marks Processing:** Dedicated data entry screen to manage subject-wise marks (Bangla, English, Math, Science, Social Science, Religion).

### 🎓 Student Portal Module
* **Search Results:** A public-facing UI matching the authentic education board look-and-feel.
* **Result Verification:** Query detailed results individually using Examination Type, Year, Board, Roll, and Registration number parameters.
* **Real-time Validations:** Ensures accurate search queries to prevent mismatch rendering.

---

## 🛠️ Technology Stack

* **Frontend:** HTML5, CSS3, Bootstrap 4, jQuery
* **Backend:** Core Object-Oriented PHP
* **Database:** MySQL
* **Tools:** XAMPP/WAMP, VS Code

---

## 📂 Project Structure

```text
education_board_result_system/
├── app/                  # Core PHP backend functions and database configs
│   ├── config.php        # Database constants and rules
│   └── autoload.php      # Autoloader for required dependencies
├── assets/               # Public assets (Custom CSS templates, JS library, Icons, Images)
├── photos/               # Directory for uploaded student profile pictures
├── results/              # The public-facing result checking portal 
│   ├── index.php         # Student result search form
│   └── search.php        # Backend result processing and validation
├── create.php            # Admin form to add a new candidate
├── index.php             # Unified Admin Dashboard (View all records)
├── marks.php             # Subject-wise marks management form
├── profile.php           # Specific student profile view
└── update_profile.php    # Student profile modification form
```

---

## 🚀 Getting Started

To get a local copy up and running, follow these simple steps.

### Prerequisites
* A local development server like **XAMPP**, **WAMP**, or **MAMP**.
* Basic knowledge of PHP and MySQL interfaces.

### 💾 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/prince-noman/education_board_result_system.git
   ```

2. **Move to Local Server**
   Copy the extracted `education_board_result_system` folder to your local server block directory:
   * For XAMPP: `<installation-path>/htdocs/`
   * For WAMP: `<installation-path>/www/`

3. **Database Setup**
   * Open phpMyAdmin (`http://localhost/phpmyadmin`).
   * Create a new database named `edu_board`.
   * Create the default `students` table utilizing the following structure:
     
     ```sql
     CREATE TABLE `students` (
       `id` int(11) NOT NULL AUTO_INCREMENT,
       `name` varchar(100) NOT NULL,
       `email` varchar(100) NOT NULL,
       `cell` varchar(20) NOT NULL,
       `gender` varchar(20) NOT NULL,
       `roll` varchar(50) NOT NULL,
       `reg` varchar(50) NOT NULL,
       `year` varchar(10) NOT NULL,
       `education` varchar(50) NOT NULL,
       `board` varchar(50) NOT NULL,
       `location` varchar(100) NOT NULL,
       `photo` varchar(255) NOT NULL,
       `bn` float DEFAULT NULL,
       `en` float DEFAULT NULL,
       `math` float DEFAULT NULL,
       `sc` float DEFAULT NULL,
       `ssc` float DEFAULT NULL,
       `reli` float DEFAULT NULL,
       PRIMARY KEY (`id`)
     );
     ```

4. **Environment Configuration**
   By default, the database configuration uses `root` as the username and an empty password. If needed, modify these constants in:
   `app/config.php`
   ```php
   define( 'HOST', 'localhost' );
   define( 'USERNAME', 'root' );
   define( 'PASSWORD', 'your_password' );
   define( 'DB', 'edu_board' );
   ```

5. **Run the Application**
   Open your browser and navigate to:  
   `http://localhost/education_board_result_system`

---

## 🎨 Interface Previews 

### Admin Dashboard (Student Management)
Administrators can oversee complete operations, add candidates, enter module-specific marks, edit profiles, or delete data entirely.

### Result Query Portal (Public)
The highly sought-after result checking portal mimics standard educational board result queries and securely authenticates with Roll and Reg limits.

---

## 🛡️ License

Distributed under the MIT License. See `LICENSE` for more information.
