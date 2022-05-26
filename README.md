<h1 align="center">
  <img src="https://user-images.githubusercontent.com/84401192/170089076-b381f98a-9997-48be-8465-c447328c30ad.png">
</h1>
<div align="center">
  Provides quantitative insights into the automobile industry<br>
  Microsoft Engage 2022<br><br>
</div>
<hr>


## Application concept and overview
CarDB is designed to be a freemium application with the B2C features open to all (unregistered) users <br>
and the advanced B2B features (such as detailed analytics) available to only the registered users.
### UI design principles 
The application adopts a clean, minimalistic, responsive and intuitive UI design

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



## Future Scope [Feature to be added - Benefit]
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
  <li><a href="https://www.canva.com/design/DAFBt41cctQ/wSOAyrJq1g3pfLEuVSNtaA/edit">Sprint Document</a></li>
  <li><a href="https://docs.google.com/document/d/1vc0a9NzqR2KYaYzcdi-upbOAtXeM3JXsPua4x98Oetc/edit?usp=sharing">Project Timeline</a></li>
</ul>

## List of screens

## Admin Screens
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
