# Medicure - Home Delivery System

## Introduction
This Website is basically a Home Delivery System, allowing the customers to order COVID related essential services at home. The need of this service was felt to make sure that the basic COVID(medical) essential products reach the public as a lot of people are either reluctant to go out of their homes during lockdown and curfews, or don’t want to go out. COVID has affected all our lives drastically, and tested our healthcare systems. To make things a little easy for the public, for their convenience, this online system allows the consumers to order some of the COVID related essential services from their homes. By computerizing the delivery system, we will be able to overcome many limitations and will be able to make it more efficient.

## Web Designing
### Front End
1. HTML is a standard markup language for designing any web pages. We can create a simple webpage using HTML. It has so many tags to design any webpage.
We have used HTML in our project to make basic structure of webpage. We can add title of webpage using <title> tag in <head> section of HTML code. We can add heading tag <h1> to
<h6> to give heading to any content. We have divided home page into different sections like Menu, Item search, Explore product and footer by using <div> tag and added links in menu bar by using anchor tag <a href> and navigation tag.
We have created forms for different pages (order product in user panel and add admin, update
admin, add product, update product and login page in admin panel ) by using different attributes of <form> and <table> tag like Input type, method, border, placeholder etc.
 
Bgcolor and background-image attributes in <body> of HTML code are used for adding background color and background image respectively in webpage. We can give specific height and width to image using HTML.
We have aligned text or image in webpage (center, left or right) by using align attribute in HTML[6].
There are so many tags of HTML[1] that we have used in our webpage design like <h1> for heading, <p> for paragraph, <b> for bold any content , <br> for break any line, <tr> for table row, <td> for table data and <ul> for unordered list.
We have added links with images, logo and icons using anchor tag. So, by clicking on that image or icon we can reach linked page or linked content.
We have linked external CSS file in HTML file by using below attribute:

<link rel=”stylesheet” href=”css/style.css”>

And we can use CSS in any HTML tag by using class attribute.

2. CSS is a style sheet language to style any HTML document. It describes how HTML elements should be displayed. It has Selectors like Element selector, ID selector, Class selector, universal selector and grouping selector. We have used all types of selectors to design our webpage.
We have created many classes and ids in CSS file to use them in our HTML code. We have created classes for align text, change font-family and font-style, insert background color and background images, giving specific width and height to any image, changing border style and border radius, float image or text, giving margin and padding to our specific content.
 
We can use class and id in any HTML tag by using class and id attribute. So, with the help of classes we can change style of any HTML content and make our webpage more interactive.
So, there are many other classes that we have used to style our webpage some of them are mentioned below.
We have used wrapper class to give specific width padding and margin to our specific content.

.wrapper
{
padding:1%; width:80%; margin: 0 auto;
}
We have used following selector to give styles to all tables: table tr th
{
border-bottom: 1px solid black; padding:1%;
text-align: left;
}


We have used btn-primary class to give style to button like background color, padding and margin:

.btn-primary
{
background-color:darksalmon; padding:1%;
 
margin:1%; color:white;
text-decoration: none; font-weight: bold;
}

We have used hover selector to give different color to button on mouse over:


.btn-primary:hover
{
background-color: #f0932b;
}

3. Javascript is an script based programming language. With the help of javascript we can make our webpage more interactive and functional. It allows us to change HTML content. Javascript can be added inside <script> tag (internally or Externally ) in body of HTML code.
We have used some functions and events of javascript[3] in our webpage. We have added some mouse events like onmouseover, onmouseout and onclick event and some form events like onfocus and onblur in our webpage.

### Back End
1. MySQL - We have used mysql database to save our data which is an open source relational database management system.
 
First of all we have created database “item-order” and four tables tbl_admin, tbl_category, tbl_item and tbl_order in the database item-order. After it we have created table structure and takes Id as a primary key with auto increment in all tables.
We have created functionality to update, delete and add admin, update and delete Products and category by using basic sql commands and we have connected them with frontend and backend by using PHP programming language.
We have used many sql queries to insert, update and delete these values in the database. Some of them are mentioned below:


*	$sql= "SELECT * FROM tbl_category WHERE active='yes'";
*	$sql= "SELECT * FROM tbl_item WHERE category_id=$category_id";
*	$sql= "SELECT * FROM tbl_item WHERE active = 'Yes' AND featured='Yes' LIMIT 6";
*	$sql= "INSERT INTO tbl_admin SET full_name='$full_name', username='$username', password='$password'";
*	$sql = "DELETE FROM tbl_category WHERE id=$id";
*	$sql = "DELETE FROM tbl_item WHERE id=$id";
*	$sql2 = "SELECT *FROM tbl_item";


