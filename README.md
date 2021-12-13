
# MWI API

This API was built to learn and comprehend the best practices and workflows for Laravel API development. This app consists of a basic un-authenticated API that will allow users to perform CRUD operations on content data and contact information.

Content
[Get](#get-list-of-content)
[Post](#create-new-content)
[Put](#change-content)
[Delete](#delete-content)

Contact
[Get](#get-list-of-contacts)
[Post](#create-new-contact)
[Put](#change-contact)
[Delete](#delete-contact)

# Setup
### Install
	$ git clone git@github.com:lzustiak/mwi-api.git
	$ cd mwi-api
	$ composer install

### Using Lando to run the application
	$ lando start
	$ lando composer migrate
	$ lando artisan db:seed

# API Endpoints

The API endpoints for the application

## Get list of content

### Request

`GET /content/`

### Response

    HTTP/1.1 200 OK
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 200 OK
    Content-Type: application/json
    Content-Length: 3840

    {
	    "success": true,
	    "data": [
		    {
			    "id": 1,
			    "title": "totam",
			    "paragraph": "Temporibus maxime aliquam voluptatem. Facilis quisquam quam dolores blanditiis nam aut. Asperiores facilis ut nihil sunt voluptates odit. Sunt est pariatur dolorem sapiente. Totam dolorem perspiciatis sint consequatur magni. Veritatis excepturi laboriosam excepturi aut officia nisi.",
			    "img_url": "https:\/\/via.placeholder.com\/640x480.png\/00eeee?text=atque"
			 },...
		]
	}
			
## Get specific content

### Request

`GET /content/{id}`

### Response

    HTTP/1.1 200 OK
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 200 OK
    Content-Type: application/json
    Content-Length: 420

    {
	    "success": true,
	    "data": [
		    {
			    "id": 1,
			    "title": "totam",
			    "paragraph": "Temporibus maxime aliquam voluptatem. Facilis quisquam quam dolores blanditiis nam aut. Asperiores facilis ut nihil sunt voluptates odit. Sunt est pariatur dolorem sapiente. Totam dolorem perspiciatis sint consequatur magni. Veritatis excepturi laboriosam excepturi aut officia nisi.",
			    "img_url": "https://via.placeholder.com/640x480.png/00eeee?text=atque"
			}
	}   
    

## Create new content

### Request

`POST /content/`

### Response

    HTTP/1.1 201 Created
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 201 Created
    Content-Type: application/json
    Content-Length: 155

    {
	    "success": true,
		"data": {
			  "id": 11,
			  "title": "Test",
			  "paragraph": "This is a test paragraph",
			  "img_url": "thisisastesturl.com/cool"
		}
    }

## Change content

### Request

`PUT /content/{id}`

### Response

    HTTP/1.1 200 OK
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 200 OK
    Content-Type: application/json
    Content-Length: 41

    {
	    "success": true,
		"data": {
			  "id": 11,
			  "title": "Changed Test",
			  "paragraph": "Changed test paragraph",
			  "img_url": "changedimgurl.com/"
		}
    }

## Change specific content parameters

### Request

`PUT /content/{id}`

### Response

    HTTP/1.1 200 OK
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 200 OK
    Content-Type: application/json
    Content-Length: 41

    {
	    "success": true,
		"data": {
			  "id": 11,
			  "title": "Changed Test",
			  "paragraph": "Changed test paragraph",
			  "img_url": "changedimgurl.com/"
		}
    }

## Delete content

### Request

`DELETE /content/{id}`

### Response

    HTTP/1.1 204 No Content
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 204 No Content


## Get list of contacts

### Request

`GET /contact/`

### Response

    HTTP/1.1 200 OK
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 200 OK
    Content-Type: application/json
    Content-Length: 3840

    {
	    "success": true,
	    "data": [
		    {
			    "id": 1,
			    "first_name": "Fritz",
			    "last_name": "Lowe",
			    "title": "Ms.",
			    "email": "marks.liliana@gmail.com"
			    "message": "Temporibus maxime aliquam voluptatem. Facilis quisquam quam dolores blanditiis nam aut. Asperiores facilis ut nihil sunt voluptates odit. Sunt est pariatur dolorem sapiente. Totam dolorem perspiciatis sint consequatur magni. Veritatis excepturi laboriosam excepturi aut officia nisi."
			 },...
		]
	}
			
## Get specific contact

### Request

`GET /contact/{id}`

### Response

    HTTP/1.1 200 OK
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 200 OK
    Content-Type: application/json
    Content-Length: 420

    {
	    "success": true,
	    "data": {
			"id": 1,
			"first_name": "Fritz",
			"last_name": "Lowe",
			"title": "Ms.",
			"email": "marks.liliana@gmail.com"
			"message": "Temporibus maxime aliquam voluptatem. Facilis quisquam quam dolores blanditiis nam aut. Asperiores facilis ut nihil sunt voluptates odit. Sunt est pariatur dolorem sapiente. Totam dolorem perspiciatis sint consequatur magni. Veritatis excepturi laboriosam excepturi aut officia nisi."
		}
	}
    

## Create new contact

### Request

`POST /contact/`

### Response

    HTTP/1.1 201 Created
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 201 Created
    Content-Type: application/json
    Content-Length: 155

    {
	    "success": true,
	    "data": {
			"id": 11,
			"first_name": "First",
			"last_name": "Last",
			"title": "Title",
			"email": "testuser@email.com"
			"message": "Test message for Post"
		}
	}

## Change contact

### Request

`PUT /contact/{id}`

### Response

    HTTP/1.1 200 OK
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 200 OK
    Content-Type: application/json
    Content-Length: 41

    {
	    "success": true,
	    "data": {
			"id": 11,
			"first_name": "Changed first",
			"last_name": "Changed last",
			"title": "Changed title",
			"email": "changedtest@email.com"
			"message": "Changed test message for Put"
		}
	}

## Change specific contact parameters

### Request

`PUT /contact/{id}`

### Response

    HTTP/1.1 200 OK
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 200 OK
    Content-Type: application/json
    Content-Length: 41

    {
	    "success": true,
	    "data": {
			"id": 11,
			"first_name": "Changed first again",
			"last_name": "Changed last",
			"title": "Changed title",
			"email": "changedtest@email.com"
			"message": "Changed test message for Put"
		}
	}

## Delete contact

### Request

`DELETE /contact/{id}`

### Response

    HTTP/1.1 204 No Content
    Date: Wed, 15 Dec 2021 12:36:30 GMT
    Status: 204 No Content