# Project Context: QR Code Attendance Web Application

This document serves as a memory bank for the progress and key decisions made during the development of the QR Code Attendance Web Application.

## Initial State:

-   The project is a Laravel application.
-   Existing migrations for `students`, `courses`, `course_sessions`, and `attendances` tables.
-   Controllers for `CourseController` and `CourseSessionController` exist.
-   Views for `courses` and `course-sessions` exist.
-   Authentication for lecturers is partially implemented (`AuthController`, `LecturerDashboardController`).

## Workflow Details:

-   **Lecturer Account:** Lecturers need to be able to register and log in to manage courses and sessions.
-   **Course Management:** Lecturers create and manage courses. Each course can have multiple sessions.
-   **Session Management & QR Code Generation:** When a lecturer creates a session, a unique QR code should be generated. This QR code will link to a public attendance page for that specific session.
-   **Student Attendance:** Students access the attendance page via the QR code. They provide their name and email to mark their attendance. No login is required for students.
-   **Attendance Viewing:** Lecturers can view a list of students who have attended each session.

## Key Decisions & Progress:

### 2025-08-14

-   Created `docs/plan.md` outlining the project workflow and a detailed checklist.
-   Created `docs/context.md` to serve as a memory bank for project progress.

## Next Steps:

-   Review existing code for lecturer authentication and course/session management against the defined workflow.
-   Focus on QR code generation and student attendance submission.
