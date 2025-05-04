# Grade Analytics Module for Gibbon

A comprehensive dashboard for visualizing Internal Assessment (IA) grades in Gibbon, featuring dynamic charts and interactive filters.

## Features

- Interactive grade distribution charts
- Student progress tracking over time
- Class performance summaries
- Filter by Course, Form Group, and Teacher
- Responsive design using SB Admin 2 template
- Real-time data updates without page refresh

## Requirements

- Gibbon v24.0.00 or higher
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Modern web browser with JavaScript enabled

## Installation

1. Download the GradeAnalytics module
2. Upload the `GradeAnalytics` folder to your Gibbon installation's modules directory:
   ```
   /path/to/gibbon/modules/GradeAnalytics/
   ```
3. Log in to your Gibbon installation as an administrator
4. Go to Admin > Modules
5. Find "Grade Analytics" in the list and click the Install button
6. The module will be installed with default permissions

## Permissions

The module includes two main permissions:

1. **View Grade Analytics**
   - Available to: Teachers, Heads of Department, Administrators
   - Allows viewing the grade analytics dashboard

2. **Export Grade Analytics**
   - Available to: Heads of Department, Administrators
   - Allows exporting grade analytics data

## Usage

1. Access the dashboard through the main menu under "Grade Analytics"
2. Use the filters on the left to narrow down the data:
   - Select a specific Course
   - Filter by Form Group
   - Choose a Teacher
3. The charts will automatically update based on your selections

## Charts

### Grade Distribution
- Shows the distribution of grades across selected criteria
- Grades are categorized as A+, A, B, C, D, and F

### Student Progress
- Displays individual student performance over time
- Each student's progress is shown as a separate line

### Class Performance Summary
- Compares average, highest, and lowest scores across classes
- Provides a quick overview of class performance

## Support

For support or bug reports, please contact your system administrator or create an issue in the module's repository.

## License

This module is licensed under the GNU General Public License v3.0. 