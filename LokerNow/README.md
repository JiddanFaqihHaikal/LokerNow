# LokerNow - Modern Job Portal Platform

![LokerNow Logo](public/images/logo.png)

## Overview

LokerNow is a comprehensive job portal platform connecting jobseekers and employers with a modern, user-friendly interface. Built with Laravel and Tailwind CSS, the platform features a dark-themed UI that prioritizes user experience while providing powerful tools for the job search and recruitment process.

## Features

### For Jobseekers

- **Profile Management**: Create and manage detailed profiles with personal information, skills, education, and work experience
- **Resume & Portfolio Upload**: Upload resumes (PDF/DOC/DOCX) and portfolio materials to showcase qualifications
- **Job Search & Filtering**: Search for jobs with keyword-based search and apply filters (job type, location, industry, date posted)
- **Job Applications**: Apply to positions with customized cover letters and track application status
- **Application Timeline**: View visual timeline of application progress (pending → reviewing → shortlisted → accepted/rejected)
- **Saved Jobs**: Bookmark interesting job postings for later review
- **Company Reviews**: Submit and view reviews of employers to make informed decisions
- **Messaging System**: Communicate directly with potential employers about job opportunities

### For Employers

- **Company Profile Management**: Create and customize company profiles with logos, banners, and company information
- **Job Posting Management**: Create, edit, and manage job listings with detailed information
- **Application Review**: Review and manage incoming applications with status updates
- **Hiring Schedule Management**: Plan hiring workflows with visual weekly schedules
- **Messaging System**: Communicate with candidates about job opportunities
- **Dashboard Analytics**: View insights about job postings and applicant engagement

### Platform Features

- **Dark Theme UI**: Modern, eye-friendly interface with consistent dark theme styling
- **Open Forum**: Community discussion space for job-related topics
- **Responsive Design**: Fully responsive interface that works on desktop and mobile devices
- **Real-time Notifications**: Stay updated on application status changes and messages

## Technology Stack

- **Backend**: Laravel PHP Framework
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
- **Database**: MySQL
- **Authentication**: Laravel Fortify
- **File Storage**: Laravel Storage with public disk

## Entity Relationship Diagram (ERD)

The LokerNow platform is built around a relational database structure that connects jobseekers, employers, jobs, and various interaction mechanisms. At the core of the system are the **Users** and **Company Profiles** entities, where users can have either 'admin' (employer) or 'jobseeker' roles. Employers are associated with a company profile that stores branding elements like logos and banners. Jobseekers have detailed **Jobseeker Profiles** containing their professional information, skills, education, and experience, along with uploaded resumes and portfolios. The **Jobs** entity represents job listings created by employers, containing details like title, salary, and requirements, and is linked to the employer who posted it. When jobseekers apply for positions, a **Job Applications** entity is created, tracking the application status through a defined workflow (pending → reviewing → shortlisted → accepted/rejected) with timestamps for status changes. The platform facilitates communication through a comprehensive **Messaging System** consisting of conversations, participants, and messages entities, allowing jobseekers and employers to discuss job opportunities. Additionally, the system includes **Company Reviews** where jobseekers can provide feedback on employers, **Saved Jobs** for bookmarking interesting positions, and a **Forum** for community discussions. This interconnected structure ensures a seamless experience for both jobseekers and employers throughout the recruitment process.

## Installation

1. Clone the repository:
   ```
   git clone : https://github.com/JiddanFaqihHaikal/LokerNow/edit/Jiddan_Branch/LokerNow
   ```

2. Navigate to the project directory:
   ```
   cd LokerNow
   ```

3. Install PHP dependencies:
   ```
   composer install
   ```

4. Copy the environment file:
   ```
   cp .env.example .env
   ```

5. Generate application key:
   ```
   php artisan key:generate
   ```

6. Configure your database connection in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=lokernow
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Run database migrations and seeders:
   ```
   php artisan migrate --seed
   ```

8. Create a symbolic link for storage:
   ```
   php artisan storage:link
   ```
   
8. Install node modules:
   ```
   npm install
   ```

8. Build the npm:
   ```
   npm run build
   ```

9. Start the development server:
   ```
   php artisan serve
   ```

10. Visit `http://localhost:8000` in your browser

## Development Team

- **Team 2 - SI46INT**
  - 
  - 
  - 

## License

This project is licensed under the MIT License - see the LICENSE file for details.
