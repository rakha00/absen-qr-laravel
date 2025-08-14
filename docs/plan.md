# Project Plan: QR Code Attendance Web Application

This document outlines the planned steps and progress for developing the QR Code Attendance Web Application.

## Workflow Overview:

1.  Lecturer creates an account.
2.  Lecturer creates courses/subjects.
3.  For each course, the lecturer creates sessions.
4.  During session creation, a QR code is generated to direct students to the attendance page.
5.  On the attendance page, students only need to fill in their name and email (no login).
6.  Lecturers can view attendance records for each session.

## Checklist:

### Phase 1: Initial Setup & Documentation

-   [x] Create `docs/plan.md`
-   [ ] Create `docs/context.md`
-   [ ] Define initial project structure and review existing files against workflow.

### Phase 2: Backend Review & Implementation

-   [ ] Review `Lecturer` authentication and account creation (Auth, Lecturer model).
-   [ ] Review `Course` creation and management (Course model, CourseController, migrations).
-   [ ] Review `CourseSession` creation, including QR code generation logic (CourseSession model, CourseSessionController, migrations).
-   [ ] Implement QR code generation and storage.
-   [ ] Review `Student` model and migration (no login required for students).
-   [ ] Review `Attendance` model and migration.
-   [ ] Implement student attendance submission logic (name, email via QR code link).
-   [ ] Implement lecturer's view of attendance records for a session.

### Phase 3: Frontend Review & Implementation

-   [ ] Review lecturer dashboard and navigation.
-   [ ] Review course management views (create, edit, list, show).
-   [ ] Review session management views (create, edit, list, show).
-   [ ] Develop student attendance page (form for name and email, linked via QR code).
-   [ ] Display attendance records for lecturers.

### Phase 4: Testing & Refinement

-   [ ] Unit tests for models and controllers.
-   [ ] Feature tests for user flows (lecturer, student).
-   [ ] UI/UX review for usability.
-   [ ] Security review (QR code link, data submission).

## Notes:

-   Use `context7` for Laravel 12 documentation for best practices during development and review.
