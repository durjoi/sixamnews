# Six Am News
###### A project for making wordpress custom theme

Live Link [sixamnews.durjoi.com](http://sixamnews.durjoi.com) <br/>
Code Link [https://github.com/durjoi/sixamnews.git](https://github.com/durjoi/sixamnews.git)

### Folder Structure

    .
    ├── wp-content                  
    ├   ├── plugins
    ├   ├── themes
    ├   ├   ├──industrydive
    ├   ├   ├  ├── css
    ├   ├   ├  ├   ├── bootstrap.css          # bootstrap css file
    ├   ├   ├  ├── img
    ├   ├   ├  ├── js
    ├   ├   ├  ├   ├── bootstrap.js           # Bootstrap js file
    ├   ├   ├  ├   ├── main.js                # Custom js file
    ├   ├   ├  ├── template_part
    ├   ├   ├  ├   ├── categories_post.php    # Post item template for category page
    ├   ├   ├  ├   ├── post_item.php          # post item template for post card
    ├   ├   ├  ├   ├── post_setup.php         # Single post page template
    ├   ├   ├  ├── category.php               # Category page
    ├   ├   ├  ├── footer.php                 # Footer layout
    ├   ├   ├  ├── functions.php              # Wordpress Functions file
    ├   ├   ├  ├── header.php                 # Header layout
    ├   ├   ├  ├── index.php                  # Home page
    ├   ├   ├  ├── single.php                 # Single post container page
    ├   ├   ├  ├── style.css                  # Main css file
    ├   ├── upgrade
    ├   ├── uploads
    ├   ├── index.php
    ├── docker-compose.yml                    # Docker compose file
    ├── README.md                             # Documentation file
    ├── uploads.ini                           # php ini overwriting file
    ├── wordpress.sql                         # dummy database


### Running the project

Clone the repository

```
$ git clone https://github.com/durjoi/sixamnews.git
$ cd sixamnews
```
Run docker

```
$ docker-compose up -d
```

Open browser and visit [127.0.0.1:9210](http://127.0.0.1:9210) for website and [127.0.0.1:9211](http://127.0.0.1:9211) for phpmyadmin. <br/>

Now import table to the database <br/>
Drop all the default table and add import 'wordpress.sql' to the database from phpmyadmin. <br/> <br/>

Now open wordpress admin [127.0.0.1:9210/wp-admin](http://127.0.0.1:9210/wp-admin) and login with below credentials.

```
$ Username: admin
$ Password: admin
```

