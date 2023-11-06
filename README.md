 to_do_list
A Laravel project: Daily Tasks Manager (To-Do List) application

A project to show Laravel skills for the second stage interview for the PHP Developer position at Safety Services

This project has got potential to become a fully developed product with the ability to create a list of tasks that you need to complete each day, set deadlines for each task, and track your progress.

In addition, as a future project, the Daily Tasks Manager could allow you to set reminders for important tasks and receive notifications when deadlines are approaching (#features which need to be scoped and planned first).

Predicted use of technologies:
 - Laravel
 - Laravel Breeze (b)
 - Laravel Sail (b)
 - Vue with Inertia
 - Vite
 - Axios
 - Tailwind or Bootstrap
 - MySQL, MariaDB, or PostgreSQL
 - Faker (b)
 - Docker

Project requirements:

a) Functionalities:
 - A list of the existing notes, (when there are any) — and make this the landing page
 - Create a note (at least one input field for the text, and buttons to submit and cancel)
 - Read a note (immediately display inline on the list view, or optionally more detail on a dedicated view)
 - Update a note (change its text/contents)
 - Delete a note (ensure to include user confirmation via a modal)
   - Bonus: soft-deletions
   - Bonus: restoring items
   - Bonus: a search input that, upon entering values, provides real-time updates to the state/drawing of the then-filtered results/list
   - Bonus: an authentication system, utilising Laravel Breeze, with users, logins, password resets, and user-attributed resources (so the to-do list is private and personal to each user)
   - Extra Bonus: require email verification for user sign-up


b) UX/UI Elements
 - Have an 'Add a new task' input at the top. So, just a text input with that as the placeholder
    - Bonus: if the application begins with the with the cursor auto-focused on the first input, so it's much easier to start adding tasks
    - Bonus: after adding each task, ensure the cursor auto-focuses on the first input again, so that it's a repeatable action
 - There aren't any hard requirements for the UI, as we're keen to see how you interpret the specification; but we do expect the UI to be responsive and work reasonably well on a mobile device

c) Internal criteria
 - Use MySQL, MariaDB, or PostgreSQL for storage
 - Ensure good form validation, data sanitisation and handling of any errors/inputted data that doesn't meet the requirements (with easy-to-understand UI feedback for the user)
 - For key UI elements, such as buttons, inputs, and modals (for action confirmations), please write these as reusable SFCs (Single-File Components), ensure a single direction for the flow of data ('props down, events up')
 - Complete Git history is expected and required to demonstrate your workflow (including the use of branches, issues), with clear commit subjects, detailed descriptions (where appropriate) that would be representative of working on a real project
 - Adherence to the Laravel coding standards and best practices for structure and formatting in both PHP and Vue is expected, whilst ensuring overall consistency across your code
    - Bonus: set up factories and seeders with Faker, so that safe and realistic dummy data can be randomly generated
    - Bonus: make use of Laravel Sail to assist with this being a reproducible project that we can easily look at