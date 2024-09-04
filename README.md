---

# Laravel To-Do List Application

This is a simple to-do list application built with Laravel 9, utilizing AJAX for dynamic frontend updates, DataTables for task management, and Toastr for user notifications.

## Features

- **Add Task**: Users can add tasks without reloading the page. The task is added to the top of the list, and serial numbers are updated automatically.
- **Mark as Complete**: Tasks can be marked as complete. Once marked, the task is updated visually to indicate completion.
- **Delete Task**: Users can delete tasks with a confirmation prompt to avoid accidental deletions.
- **Toastr Notifications**: Success and error notifications are shown using Toastr for better user experience.
- **Duplicate Prevention**: Duplicate tasks are automatically prevented.
- **Dynamic DataTable**: The task list is managed using DataTables, providing a sortable, searchable, and paginated table.

## Requirements

- PHP 8.x
- Composer
- Laravel 9.x
- MySQL or any other supported database

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/wasimlohar/todo.git
   cd todo
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Set up environment variables**:
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update `.env` with your database credentials and other necessary configurations.

4. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

5. **Run migrations**:
   ```bash
   php artisan migrate
   ```

6. **Run the development server**:
   ```bash
   php artisan serve
   ```

## Usage

- Visit the application in your browser at `http://localhost:8000`.
- Use the form at the top to add new tasks. These will be added to the table without a page reload.
- Mark tasks as complete by clicking the "Mark as Done" button.
- Delete tasks by clicking the "Delete" button, which triggers a confirmation prompt.
- The table supports sorting, searching, and pagination.

## AJAX and Toastr Integration

The application uses AJAX for all CRUD operations on tasks, ensuring a seamless user experience without page reloads. Toastr is used to provide feedback on actions, such as adding a task, marking it as complete, or deleting it.

## DataTables Integration

The task list is rendered using DataTables, a powerful jQuery plugin that enhances HTML tables with features like sorting, searching, and pagination.

## Customization

- **Toastr Notifications**: You can customize the appearance and behavior of notifications in `resources/views/partials/_scripts.blade.php` where Toastr options are set.
- **DataTables Options**: DataTables configuration can be adjusted in the JavaScript code managing the table.

## Contributing

Feel free to fork this repository and submit pull requests. Contributions are welcome!

## License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).

---