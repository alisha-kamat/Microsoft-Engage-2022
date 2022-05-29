<h4 align="center">
  <img src="https://user-images.githubusercontent.com/84401192/170089076-b381f98a-9997-48be-8465-c447328c30ad.png"><br>
  by Alisha Kamat<br>
  Microsoft Engage 2022 Mentee | GSoC 2022 Contributor<br><br>
</h4>
<div align="center">
  The application is based on the 2nd project (data analytics for the automotive sector) and provides quantitative insights into the car industry<br><br>
  
</div>



## Application concept and overview
CarDB is designed to be a <i>freemium</i> application with the B2C features open to all (unregistered) users <br>
and the advanced B2B features (such as detailed analytics) available to only the registered users.
### UI design principles 
The application adopts a clean, minimalistic, responsive and intuitive UI design<br>

### Agile Methodology - Scrum
<img src="https://user-images.githubusercontent.com/84401192/170648094-ba703bfd-463d-4e4f-83db-650593c01cf3.png" width=60% height=60%>



## Features of the Application

### B2C features
1. Provides B2C users with a list of specification details based on a number of filtering criteria
2. Keeps the users informed about the most popular choices (of Make, Model, Fuel Type, etc.) among different groups

### B2B features
1. Provides B2B users (industry experts) with an in-depth analysis of the trends in the automobile industry based on different filtering criteria
2. B2C features available for all users; B2B features available for only registered users
3. Provides demography based details and various analytics
4. Supplies information to automobile experts related to total sales and revenue of the industry so far
5. Both grid and graph visualisations have been enabled for B2B as well as B2C users

### Admin features
Allows admin access to perform CRUD functionality for 
1. Data maintenance
2. User management



## Process flow diagram (Top level)
<img src="https://user-images.githubusercontent.com/84401192/170506552-dab7cab9-f826-4fd5-8313-89105d85df3e.png" width=60% height=60%>

## Database schema
<center><img src="https://user-images.githubusercontent.com/84401192/170514081-77e681a7-aff3-4b67-a110-59740475e20a.png" width=80% height=80%>
<br>
<img src="https://user-images.githubusercontent.com/84401192/170854337-6771692a-48fb-4f7f-b27d-25ec6c0381bd.png" width=60% height=60% align="center"></center>
Note: The demography table isn't entirely optimized in the current form. Ideally it should be split into several smaller tables. For the prototype, I've prioritized simplicity over optimization to reduce the administrative overheads.

## Challenges
1. <b>Industry knowledge</b> - The complexity was not just on the technical side but also had the challenge of learning about a completely new field - automobile industry.
2. <b>Creating realistic datasets</b> - Even before starting on the application design, the bigger challenge for me was to first create the realistic datasets for this application to work well, without falling in the garbage-in-garbage-out trap.
3. <b>Code reusability</b> - My original application on the local server was optimized for code reusability. However due to problems encountered after hosting it online (possibly due to cross-platform compatibility issues), I had to drop the guard a little (and allow a little code duplication) so I could build a single codebase that works locally as well as online.
4. <b>Time management</b> - Out of the 3.5 weeks we had for this program, my final exams took up 2.5 weeks, splitting the focus, effort and time for 2 high priority tasks.

## Future Scope
1. Provide a separate detailed popup page for each car specifications along with individual car images
2. Include a 'User Review' section
3. Q&A section and discussion forum for increasing user engagement and time spent on the website
4. Comparison section for 2 or multiple cars
5. Show different financing options and tools (like EMI calculator)
6. Include a predictive analysis feature that allows industry experts to understand future market trends
7. Provide analysis results to users in textual format (conversational)
8. Have transactional level data to help provide better and diverse analysis results to users
9. Allow uploading of csv file for adding data through admin screens of the database to save data entry effort for bigger datasets


## Tech Stack
<a href="https://www.w3.org/TR/html5/" title="HTML5"><img src="https://github.com/get-icon/geticon/raw/master/icons/html-5.svg" alt="HTML5" width="40px" height="40px"></a>
<a href="https://www.w3.org/TR/CSS/" title="CSS3"><img src="https://github.com/get-icon/geticon/raw/master/icons/css-3.svg" alt="CSS3" width="40px" height="40px"></a>
&nbsp;
<a href="https://www.php.net/" title="PHP"><img src="https://www.php.net/images/logos/php-logo.svg" alt="PHP" width="40px" height="40px"></a>
<a href="https://www.w3.org/TR/JS/" title="Javascript"><img src="https://github.com/get-icon/geticon/raw/master/icons/javascript.svg" alt="JS" width="40px" height="40px"></a>&nbsp;
<a href="https://www.w3.org/TR/MySQL/" title="MySQL"><img src="https://github.com/get-icon/geticon/raw/master/icons/mysql.svg" alt="MySQL" width="40px" height="40px"></a>&nbsp;<a href="https://www.w3.org/TR/Bootstrap/" title="Bootstap"><img src="https://github.com/get-icon/geticon/raw/master/icons/bootstrap.svg" alt="Bootstrap" width="40px" height="40px"></a>

## Requirements
<ul>
  <li>
  <h4>Software</h4>
    <ul>
       <li>XAMPP version 3.3.0 or higher</li>
       <li>PHP version 7.4.22 or higher</li>
       <li>MySQL version 10.4.19 or higher</li>
      </ul>
  </li>
  <li>
  <h4>Hardware</h4> 
  <ul>
       <li>4 GB RAM or higher</li>
       <li>An open and analytical mind :)</li>
   </ul>
  </li>
</ul>
  
## Instructions for setup
1. Clone this repository using ``` git clone https://github.com/alisha-kamat/Microsoft-Engage-2022 ```
2. Move the ``` Microsoft-Engage-2022 ``` folder to ```C:\xampp\htdocs  ```
3. Run the ``` http://localhost/Microsoft-Engage-2022/admin/setup-db.php ``` file to setup the database on your local machine
4. The website is now running on http://localhost/Microsoft-Engage-2022/homepage
5. For accessing the admin pages:<br>
   <ul> 
    <li>Username: <i>cdbadmin</i></li>
    <li>Password: <i>cdbpw</i></li>
  </ul>

## Troubleshooting tips
<table> 
  <tr>
    <th>Issue</th>
    <th>Solution</th>
  </tr>
  <tr>
    <td>The website is not loading i.e. URL in point 4 above is not working</td> 
    <td>
      <ul>
        <li>Ensure all the files have been copied, without errors, to replicate the github structure</li>
        <li>Locate the .htaccess file and move it into the right directory</li>
        <li>Also ensure that Apache and MySQL are running</li>
      </ul>
      </td>
  </tr>
  <tr>
    <td>The website is loading but the tables and graphs are missing</td> 
    <td>
      <ul>
        <li>Use phpMyAdmin or MySQL Workbench to check whether the database and tables have been created</li> 
        <li>Also ensure that the data insertion scripts have been executed successfully</li>
      </ul>
      </td>
  </tr>
</table>

## Links
<ul>
  <li><a href="https://youtu.be/4-JJWxJ6gOA">Demo Video</a></li>
  <li><a href="https://www.onnicles.com/app/cdb/homepage"</a>Deployed Website</li>
  <li><a href="https://docs.google.com/presentation/d/11Eijuj6WYLJGXBFTEAx6p2WtGJfaXFOe_J7muvPCFyM/edit?usp=sharing">Preliminary UI Design</a></li> - Presented to mentor in the second team meet
  <li><a href="https://drive.google.com/file/d/1pCAg_WWaDZWtxMEWnvZndkXO7inYPJnF/view?usp=sharing">Sprint Document</a></li>
  <li><a href="https://docs.google.com/document/d/1vc0a9NzqR2KYaYzcdi-upbOAtXeM3JXsPua4x98Oetc/edit?usp=sharing">Project Timeline</a></li>
</ul>

## List of screens


<table>
  <tr>
    <td><b> HomePage </b></td>
  </tr>
  <tr>
     <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/homepage.png" width = 500></td>
  </tr>
 </table>
 
  
  ### Research
<table>
  <tr>
    <td>Overview</td>
     <td>Car Research</td>
  </tr>
  <tr>
    <td><img src="https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/overview.png"></td>
    <td><img src="https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/car_research.png"></td>
  </tr>
  </table>
  

  
  ### Analytics
     
<table>
  <tr>
    <td>Registration</td>
     <td>Login</td>
  </tr>
  <tr>
    <td><img src="https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/registration.png">
    <td><img src="https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/login.png">
  </tr>
  </table>
  
<table>
  <tr>
    <td>Dashboard</td>
    <td>Region</td>
    <td>Age</td>
  </tr>
  <tr>
    <td><img src="https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/dashboard.png"></td>
    <td><img src="https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/region.png"></td>
    <td><img src="https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/age.png"></td>
  </tr>
</table>
<table>
  <tr>
    <td>Gender</td>
    <td>Colour</td>
  </tr>
  <tr>
    <td><img src="https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/d393782b753e77545684499dfc68d767087286cf/images/gender.png"></td>
    <td><img src="https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/d393782b753e77545684499dfc68d767087286cf/images/colour.png"></td>
  </tr>
</table>


## Admin Screens
 <table>
  <tr>
    <td>Admin login</td>
    <td>Admin Dashboard</td>
  </tr>
  <tr>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/admin_login.png"></td>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/admin_dashboard.png"></td>
  </tr>
 </table>
 <table>
  <tr>
    <td>View Specs records</td>
    <td>Edit Specs data</td>
    <td>Add Specs record</td>
  </tr>
  <tr>
<td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/view_specs_records.png"></td>
<td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/edit_specs_data.png"></td>
<td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/add_specs_record.png"></td>
 </tr>
</table>
 <table>
  <tr>
    <td>View Sales records</td>
    <td>Edit Sales data</td>
    <td>Add Sales record</td>
  </tr>
  <tr>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/view_sales_record.png"></td>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/edit_sales_data.png"></td>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/add_sales_record.png"></td>
  </tr>
  </table>
 <table>
  <tr>
    <td>View Demography records</td>
    <td>Edit Demography data</td>
    <td>Add Demography record</td>
  </tr>
  <tr>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/view_demography_record.png"></td>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/edit_demography_data.png"></td>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/add_demography_record.png"></td>
  </tr>
</table>
 <table>
  <tr>
    <td>View Users records</td>
    <td>Edit Users data</td>
    <td>Add Users record</td>
  </tr>
  <tr>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/add_users_data.png"></td>
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/edit_users_data.png"></td>    
    <td><img src = "https://github.com/alisha-kamat/Microsoft-Engage-2022/blob/23ae0cbed9814328bb3ba286c4671915a9d02949/images/add_user_record.png"></td>    
  </tr>
</table>

## Special acknowledgement
Shoutout to my mentor Parvinder Kaur ma'am for providing invaluable feedback and suggestions.

## Need Help?
Feel free to reach out to me via <a href="https://www.linkedin.com/in/alishakamat/">LinkedIn</a>
