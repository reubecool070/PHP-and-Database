# PHP and Database - College Exercises

A comprehensive collection of PHP programming exercises covering fundamental concepts, file handling, session management, and database operations.

## 📋 Table of Contents

- [Overview](#overview)
- [Requirements](#requirements)
- [Setup Instructions](#setup-instructions)
- [Exercise List](#exercise-list)
- [Project Structure](#project-structure)
- [Usage](#usage)

## Overview

This repository contains a series of PHP exercises designed for learning PHP fundamentals and database integration. The exercises progress from basic programming concepts to more advanced topics including file uploads, authentication systems, and MySQL database operations.

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher (for database exercises)
- Web server (Apache/Nginx) or PHP built-in server
- Web browser

## Setup Instructions

1. **Clone or download this repository**
   ```bash
   cd /path/to/your/web/directory
   ```

2. **Start PHP Development Server**
   ```bash
   php -S localhost:8000
   ```

3. **Access exercises in browser**
   ```
   http://localhost:8000/1.DataType.php
   ```

4. **For database exercises (31-36)**
   - Ensure MySQL is running
   - Create required databases and tables as specified in the exercise files

## Exercise List

### Basic PHP Concepts (1-10)

| File | Description |
|------|-------------|
| `1.DataType.php` | Working with different data types in PHP |
| `2.AreaCircle.php` | Calculate area of circle using constants |
| `3.MinToSec.php` | Convert minutes to seconds |
| `4.Sum.php` | Calculate sum of numbers |
| `5.AreaofTriangle.php` | Calculate area of triangle |
| `6.YearToDayAge.php` | Convert age in years to days |
| `7.VoltageToPower.php` | Calculate power from voltage |
| `8.AnimalLegs.php` | Calculate total animal legs |
| `9.FootballPoints.php` | Calculate football match points |
| `10.StringLength.php` | Determine string length |

### Control Structures & Functions (11-15)

| File | Description |
|------|-------------|
| `11.TrueOrFalse.php` | Boolean operations and conditionals |
| `12.Recursive.php` | Recursive function implementation |
| `13.Area.php` | Multiple area calculations |
| `14.ArrayString.php` | String array operations |
| `15.ArrayIndex.php` | Working with array indices |

### Arrays & String Manipulation (16-22)

| File | Description |
|------|-------------|
| `16.Passangers.php` | Passenger data management |
| `17.SumOfSameNum.php` | Sum calculations with conditions |
| `18.GreaterThen51.php` | Conditional number operations |
| `19.StringAdd.php` | String concatenation operations |
| `20.StringLengthAdd.php` | String length and addition |
| `21.StringAddFrontBack.php` | String manipulation (front/back) |
| `22.StringAdd.php` | Advanced string operations |

### Advanced Concepts (23-26)

| File | Description |
|------|-------------|
| `23.LargestAmong3.php` | Find largest among three numbers |
| `24.ConvertUpperCase.php` | String case conversion |
| `25.PhpTable.php` | Generate HTML table with PHP |
| `26.MarkSheetUsing3Darray.php` | Multi-dimensional array operations |

### Authentication & Sessions (27-28)

| File | Description |
|------|-------------|
| `27.LoginValidation.php` | User login validation |
| `28.1.logout.php` | Logout functionality |
| `28.2.dashbord.php` | User dashboard after login |
| `28.3.sessioncookie.php` | Session and cookie management |

### File Operations (29-30)

| File | Description |
|------|-------------|
| `29.CvFileUpload.php` | CV/Resume file upload system |
| `30.ImageFileUpload.php` | Image upload with validation |

### Database Operations (31-36)

| File | Description |
|------|-------------|
| `31.RegisterValidation.php` | User registration with validation |
| `32.MySqlDatabase.php` | MySQL database connection and operations |
| `33.SchoolDb.php` | School database management |
| `34.GradeSheet.php` | Student grade sheet system |
| `35.SimpleInterest.php` | Simple interest calculator with DB |
| `36.TaxCalculation.php` | Tax calculation system with DB |

## Project Structure

```
PHP and Database/
├── uploads/                    # Directory for uploaded files
│   ├── *.jpg                   # Uploaded image files
│   └── *.pdf                   # Uploaded document files
├── 28.login,dashboard,session,cookie/  # Authentication module
│   ├── 28.1.logout.php
│   ├── 28.2.dashbord.php
│   └── 28.3.sessioncookie.php
├── 1-26.*php                   # Basic to intermediate exercises
├── 27-30.*php                  # Authentication and file handling
└── 31-36.*php                  # Database integration exercises
```

## Usage

### Running Individual Exercises

Each PHP file can be run independently:

1. Navigate to the file in your browser:
   ```
   http://localhost:8000/filename.php
   ```

2. Most files include HTML forms for user input

3. Follow the on-screen instructions for each exercise

### File Uploads

For exercises 29 and 30:
- Ensure the `uploads/` directory exists and has write permissions
- Supported file types are validated in the code
- File size limits may apply

### Database Exercises

For exercises 31-36:
1. Create necessary MySQL databases
2. Update database connection credentials in the PHP files
3. Run any required SQL setup scripts
4. Access the exercise through your browser

## Learning Objectives

By completing these exercises, you will learn:

- ✅ PHP syntax and basic programming concepts
- ✅ Working with variables, constants, and data types
- ✅ Control structures (if/else, loops, switch)
- ✅ Functions and recursive programming
- ✅ Arrays and string manipulation
- ✅ Form handling and user input validation
- ✅ Session and cookie management
- ✅ File upload and handling
- ✅ MySQL database connectivity
- ✅ CRUD operations with databases
- ✅ Building complete web applications

## Notes

- All exercises include inline comments explaining the logic
- Forms use POST method for security
- Database exercises require proper MySQL setup
- File permissions should be set correctly for upload directories

## Security Considerations

⚠️ **Important**: These exercises are for educational purposes. For production applications, implement:
- Input sanitization and validation
- Prepared statements for database queries
- CSRF protection
- Secure password hashing
- File upload security checks
- Proper error handling

## License

Educational project for college coursework.

## Author

College PHP and Database Course Exercises

---

**Last Updated**: January 2026

