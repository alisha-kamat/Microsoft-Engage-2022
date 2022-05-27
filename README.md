<h4 align="center">
  <img src="https://user-images.githubusercontent.com/84401192/170089076-b381f98a-9997-48be-8465-c447328c30ad.png"><br>
  by Alisha Kamat<br>
  Microsoft Engage 2022 Mentee | GSoC 2022 Contributor<br><br>
</h4>
<div align="center">
  The application provides quantitative insights into the automobile industry<br><br>
  
</div>



## Application concept and overview
CarDB is designed to be a freemium application with the B2C features open to all (unregistered) users <br>
and the advanced B2B features (such as detailed analytics) available to only the registered users.
### UI design principles 
The application adopts a clean, minimalistic, responsive and intuitive UI design<br>

### Agile Methodology - Scrum
<img src="https://user-images.githubusercontent.com/84401192/170648094-ba703bfd-463d-4e4f-83db-650593c01cf3.png" width=60% height=60%>



## Features of the Application
1. Provides B2C users with a list of specification details based on a number of filtering criteria
2. Keeps the users informed about the most popular choices (of Make, Model, Fuel Type, etc.) among different groups
3. Provides B2B users (industry experts) with an in-depth analysis of the trends in the automobile industry based on different filtering criteria
4. B2C features available for all users; B2B features available for only registered users
5. Provides demography based details and various analytics
6. Both grid and graph visualisations have been enabled for B2B as well as B2C users
7. Allows admin access to perform CRUD functionality for the data and user tables
8. Supplies information to automobile experts related to total sales and revenue of the industry so far

## Process flow diagram (Top level)
<img src="https://user-images.githubusercontent.com/84401192/170506552-dab7cab9-f826-4fd5-8313-89105d85df3e.png" width=60% height=60%>

## Database schema
<center><img src="https://user-images.githubusercontent.com/84401192/170514081-77e681a7-aff3-4b67-a110-59740475e20a.png" width=80% height=80%>
<br>
<img src="https://user-images.githubusercontent.com/84401192/170580680-c772a3f0-b832-4ce5-82a6-fa5eea2802cf.png" width=60% height=60% align="center"></center>



## Future Scope
1. Provide a separate detailed popup page for each car specifications along with individual car images
2. Include a 'User Review' section
3. Q&A section and discussion forum for increasing user engagement and time spent on the website
4. Comparison section for 2 or multiple cars
5. Show different financing options and tools (like EMI calculator)
6. Include a predictive analysis feature that allows industry experts to understand future market trends
7. Provide analysis results to users in textual format (conversational)
8. Have transactional level data to help provide better and diverse analysis results to users
9. Allow uploading of csv file for adding data through admin screens of the database will save data entry effort for bigger datasets


## Tech Stack
<a href="https://www.w3.org/TR/html5/" title="HTML5"><img src="https://github.com/get-icon/geticon/raw/master/icons/html-5.svg" alt="HTML5" width="40px" height="40px"></a>
<a href="https://www.w3.org/TR/CSS/" title="CSS3"><img src="https://github.com/get-icon/geticon/raw/master/icons/css-3.svg" alt="CSS3" width="40px" height="40px"></a>
&nbsp;
<a href="https://www.php.net/" title="PHP"><img src="https://www.php.net/images/logos/php-logo.svg" alt="PHP" width="40px" height="40px"></a>
<a href="https://www.w3.org/TR/JS/" title="Javascript"><img src="https://github.com/get-icon/geticon/raw/master/icons/javascript.svg" alt="CSS3" width="40px" height="40px"></a>&nbsp;
<a href="https://www.w3.org/TR/MySQL/" title="MySQL"><img src="https://github.com/get-icon/geticon/raw/master/icons/mysql.svg" alt="CSS3" width="40px" height="40px"></a>&nbsp;<a href="https://www.w3.org/TR/Bootstrap/" title="Bootstap"><img src="https://github.com/get-icon/geticon/raw/master/icons/bootstrap.svg" alt="CSS3" width="40px" height="40px"></a>

## Requirements
<ul>
  <li>
  <h4>Software</h4>
    <ul>
       <li>Xampp version 3.3.0 or higher</li>
       <li>Php version 7.4.22 or higher</li>
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
3. Run the ``` C:\xampp\htdocs\Microsoft-Engage-2022\admin\setup-db.php ``` file to setup the database on your local machine
4. The website is now running on http://localhost/Microsoft-Engage-2022/homepage

## Troubleshooting tips
<table> 
  <tr>
    <th>Issue</th>
    <th>Solution</th>
  </tr>
  <tr>
    <td>The URL in point 4 above is not working</td> 
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
    <td>Use phpMyAdmin or MySQL Workbench to check whether the database and tables have been created and populated with the appropriate data</td>
  </tr>
</table>

## Links
<ul>
  <li><a href="">Demo Video</a></li>
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
     <td><b> HomePage [contd] </b></td>
  </tr>
  <tr>
    <td><img src = "https://user-images.githubusercontent.com/84401192/170094769-9cd03c06-c437-4886-8574-8add2538384a.png" width = 500></td>
  </tr>
  <tr>
     <td><img src = "https://user-images.githubusercontent.com/84401192/170095933-cc1e04e2-ecfa-4e43-9f4e-3d950ee821fe.png" width = 500></td>
  </tr>
 </table>
 
 
<table>
  <tr>
    <td>Registration</td>
     <td>Login</td>
  </tr>
  <tr>
    <td><img src="https://user-images.githubusercontent.com/84401192/170780134-77e491e0-1cf0-4a74-8938-97f3210f8381.png">
    <td><img src="https://user-images.githubusercontent.com/84401192/170780077-11c163d3-1ca0-425c-99d6-b0576dcb6e64.png">
  </tr>
  </table>
<table>
  <tr>
    <td>Overview</td>
     <td>Car Research</td>
  </tr>
  <tr>
    <td><img src="https://user-images.githubusercontent.com/84401192/170781200-dc6aa3c1-8675-4dff-ab8a-621c36ae03d1.png"></td>
    <td><img src=""></td>
  </tr>
  </table>


## Admin Screens
 <table>
  <tr>
    <td>Admin login</td>
    <td>Admin Dashboard</td>
  </tr>
  <tr>
    <td><img src = "https://user-images.githubusercontent.com/84401192/170776795-70ac6914-f5f7-4dc4-9c28-0227f8c7eb7a.png"></td>
    <td><img src = "https://user-images.githubusercontent.com/84401192/170772982-900f2cb7-b264-4769-9902-f659e133d7ef.png"></td>
  </tr>
 </table>
 <table>
  <tr>
    <td>View Specs records</td>
    <td>Edit Specs data</td>
    <td>Add Specs record</td>
  </tr>
  <tr>
<td><img src = "https://user-images.githubusercontent.com/84401192/170774038-b66656ed-f7a5-48cd-8d7c-691c8eb4b2db.png"></td>
<td><img src = "https://user-images.githubusercontent.com/84401192/170774350-6af027c0-6702-4fa4-8bd7-0a5a569be413.png"></td>
<td><img src = "https://user-images.githubusercontent.com/84401192/170774871-2bb45341-ae72-4fed-b426-0d1e82ae9bbc.png"></td>
 </tr>
</table>
 <table>
  <tr>
    <td>View Sales records</td>
    <td>Edit Sales data</td>
    <td>Add Sales record</td>
  </tr>
  <tr>
<td><img src = "https://user-images.githubusercontent.com/84401192/170775150-d28469e3-5bb6-4618-a661-81b626407414.png"></td>
<td><img src = "https://user-images.githubusercontent.com/84401192/170775373-9682e9dd-cdd4-42d0-bd8f-085cc1234fa4.png"></td>
<td><img src = "https://user-images.githubusercontent.com/84401192/170775610-b34231f9-4fe0-46f3-8a71-5be930baf1a1.png"></td>
    </tr>
  </table>
 <table>
  <tr>
    <td>View Demography records</td>
    <td>Edit Demography data</td>
    <td>Add Demography record</td>
  </tr>
  <tr>
<td><img src = "https://user-images.githubusercontent.com/84401192/170775833-5fd6b110-0aaf-4a26-bb83-1dd966c750ba.png"></td>
<td><img src = "https://user-images.githubusercontent.com/84401192/170776084-c77ea89e-4af4-4c55-bf09-601c3e716403.png"></td>
<td><img src = "https://user-images.githubusercontent.com/84401192/170776239-dfe8f796-0bb6-4e09-a035-4313edb0107f.png"></td>
  </tr>
</table>
 <table>
  <tr>
    <td>View Users records</td>
    <td>Edit Users data</td>
    <td>Add Users record</td>
  </tr>
  <tr>
<td><img src = " "></td>
<td><img src = "https://user-images.githubusercontent.com/84401192/170779130-31480a8c-2ac9-42d2-a4fe-8879dca3ebea.png"></td>
<td><img src = "https://user-images.githubusercontent.com/84401192/170779000-acf900db-2059-48a9-98e1-311daff38c94.png"></td>
  </tr>
</table>

## Need Help?
Feel free to reach out to me via <a href="https://www.linkedin.com/in/alishakamat/">LinkedIn</a>
