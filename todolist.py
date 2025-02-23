def display_menu():
    """Display menu options."""
    print("\nTo-Do List Menu:")
    print("1. Add Task")
    print("2. View Tasks")
    print("3. Update Task")
    print("4. Delete Task")
    print("5. Exit")

def add_task(tasks):
    """Add a new task to the list."""
    task = input("Enter a new task: ")
    tasks.append(task)
    print(f"Task '{task}' added successfully!")

def view_tasks(tasks):
    """Display all tasks."""
    if not tasks:
        print("No tasks found!")
    else:
        print("\nYour To-Do List:")
        for index, task in enumerate(tasks, start=1):
            print(f"{index}. {task}")

def update_task(tasks):
    """Update an existing task."""
    view_tasks(tasks)
    if tasks:
        try:
            task_num = int(input("Enter task number to update: ")) - 1
            if 0 <= task_num < len(tasks):
                new_task = input("Enter the updated task: ")
                tasks[task_num] = new_task
                print("Task updated successfully!")
            else:
                print("Invalid task number!")
        except ValueError:
            print("Please enter a valid number!")

def delete_task(tasks):
    """Delete a task from the list."""
    view_tasks(tasks)
    if tasks:
        try:
            task_num = int(input("Enter task number to delete: ")) - 1
            if 0 <= task_num < len(tasks):
                removed_task = tasks.pop(task_num)
                print(f"Task '{removed_task}' deleted successfully!")
            else:
                print("Invalid task number!")
        except ValueError:
            print("Please enter a valid number!")

def main():
    """Main function to run the To-Do List app."""
    tasks = []
    while True:
        display_menu()
        choice = input("Choose an option (1-5): ")

        if choice == "1":
            add_task(tasks)
        elif choice == "2":
            view_tasks(tasks)
        elif choice == "3":
            update_task(tasks)
        elif choice == "4":
            delete_task(tasks)
        elif choice == "5":
            print("Exiting the program. Goodbye!")
            break
        else:
            print("Invalid choice! Please enter a number between 1 and 5.")

# Run the program
if __name__ == "__main__":
    main()
