# Campus Clinic Management System
**WAD 2 Final Project**

## 🏥 Project Description
A comprehensive Laravel-based clinic management system designed for school environments. It allows students to book medical appointments and enables clinic staff (Nurses/Admins) to manage inventory, dispense medicine, and track patient history.

## 🚀 Implemented Features

### 1. Authentication & Role-Based Access
- **Roles:** Admin, Nurse, and Student.
- **Middleware:** Custom `CheckRole` middleware prevents students from accessing medicine inventory and user management.
- **Dashboards:** Role-specific views (Students see appointments; Nurses see low stock alerts).

### 2. Appointment System
- **CRUD:** Students can create and view requests; Nurses can approve, complete, or cancel them.
- **Policies:** Appointment ownership is enforced via `AppointmentPolicy` (Students can only view their own data).

### 3. Medicine Inventory & Logs
- **Inventory CRUD:** Full management of clinical supplies.
- **Inventory Reconciliation:** When medicine is dispensed via the `MedicineLog`, the system automatically decrements the stock quantity.
- **Relationships:** Complex Eloquent links between Medicines, Students, and Staff.

### 4. Administrative User Management (Admin Only)
- **User CRUD:** Admins have exclusive access to view, edit, and delete user accounts.
- **Role Assignment:** Admins can promote/demote users between Student, Nurse, and Admin roles to control system access.
- **Account Protection:** Integrated logic to prevent unauthorized role changes by non-admin users.

## 🛠️ Technical Requirements Satisfied
- **Middleware:** Restricted staff-only routes.
- **Authorization:** Gates/Policies for data privacy.
- **Eloquent Relationships:** `HasMany`, `BelongsTo`, and foreign key constraints.
- **UI:** Styled with Tailwind CSS and Laravel Breeze.

## 🛠️ Detailed Installation & Setup
Follow these steps to get the project running on your local machine:

### 1. Prerequisites
Ensure you have the following installed:
- PHP (8.2 or higher)
- Composer
- Node.js & NPM
- MySQL (via XAMPP, Laragon, or Docker)

### 2. Clone and Install Dependencies
Open your terminal or command prompt and run:
1. Clone the repository
    git clone https://github.com/YOUR_USERNAME/YOUR_PROJECT_NAME.git
2. Enter the project folder
    cd YOUR_PROJECT_NAME
3. Install PHP dependencies
    composer install
4. Install Frontend dependencies
    npm install

### 3. Environment Configuration
1. Locate the .env.example file in the root directory.
2. Duplicate it and rename the copy to .env.
3. Open .env and update your database credentials:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_db_name
    DB_USERNAME=root
    DB_PASSWORD=
4. Generate your unique application key:
    php artisan key:generate

### 4. Database Setup
Ensure your MySQL server is running, then run the migrations and seeders to create the tables and default users:
    php artisan migrate --seed
    
### 5. Launching the Application
You need two terminal windows running for the app to function correctly:
- Terminal 1 (The Server):
    php artisan serve
  *Your app will be available at http://127.0.0.1:8000*
- Terminal 2 (The Assets/CSS):
    npm run dev
  *This is required for Tailwind CSS and the success message colors to show up.*

## 🔑 Default Credentials (Seed Data)
- Admin: admin@example.com / password
- Nurse: nurse@example.com / password
- Student: student@example.com / password
