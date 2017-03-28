# Create a schema called ecommerce

# Create the Brands table

CREATE TABLE `ecommerce`.`brands` ( `brand_id` INT(50) NOT NULL AUTO_INCREMENT , `brand_title` VARCHAR(250) NOT NULL , PRIMARY KEY (`brand_id`)) ENGINE = InnoDB;

# Create the Categories table
CREATE TABLE `ecommerce`. ( `category_id` INT(50) NOT NULL AUTO_INCREMENT , `category_title` VARCHAR(250) NOT NULL , PRIMARY KEY (`category_id`)) ENGINE = InnoDB;

# Create the products table

CREATE TABLE `ecommerce`.`products` ( `product_id` INT(50) NOT NULL AUTO_INCREMENT ,  `product_cat` VARCHAR(255) NOT NULL ,  `product_brand` VARCHAR(255) NOT NULL ,  `product_title` VARCHAR(255) NOT NULL ,  `product_price` INT(50) NOT NULL ,  `product_desc` TEXT NOT NULL ,  `product_image` VARCHAR(255) NOT NULL ,  `product_keywords` TEXT NOT NULL ,    PRIMARY KEY  (`product_id`)) ENGINE = InnoDB;
