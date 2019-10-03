# Cat Farm

#Get All Cats
Purpose: Returns a list of all cats
Resource URL: https://www.catfarm.com/api/cats
Parameters: None
Returns: List of cats

Example Request Endpoint: GET https://www.catfarm.com/api/cats
JSON Body: N/A

Example Response:
	[
	   {
		  "id": 1,
		  "name": "Felix",
		  "created_at": 2019-10-03 03:18:00,
		  "updated_at": "2019-10-03 03:36:06"
	   },
	   {
		  "id": 2,
		  "name": "Garfield",
		  "created_at": "2019-10-03 03:18:00",
		  "updated_at": "2019-10-03 03:18:00"
	   }
	]

#Get Cat by ID
Purpose: Returns details about a single cat and its feeding history
Resource URL: https://www.catfarm.com/api/cat/{ID}
Parameters: The cat ID is specified in the URL
Returns: Cat details and list of food

Example Request Endpoint: GET https://www.catfarm.com/api/cat/1
JSON Body: N/A
	
Example Response:
{
   "cat": {
	 "id": 1,
     "name": "Felix",
     "created_at": 2019-10-03 03:18:00,
     "updated_at": "2019-10-03 03:36:06"
   },
   "food": [
      {
         "id": 1,
         "cat_id": 1,
         "feed_time": "2019-10-03 03:38:16",
         "food_amount": "3.5",
         "food_type": "MeowMix",
         "created_at": "2019-10-03 03:38:16",
         "updated_at": "2019-10-03 03:38:16"
      },
      {
         "id": 2,
         "cat_id": 1,
         "feed_time": "2019-10-03 04:05:48",
         "food_amount": "1.00",
         "food_type": "MeowMix",
         "created_at": "2019-10-03 04:05:48",
         "updated_at": "2019-10-03 04:05:48"
      }
   ]
}

#Add Cat
Purpose: Create a Cat Record
Resource URL: https://www.catfarm.com/api/cat
Parameters: 
     name: "name"
	 type: string
	 required: YES
	 
Returns: Cat details

Example Request Endpoint: POST https://www.catfarm.com/api/cat
JSON Body:
	{
	   "name": "Abby"
	}

Example Response:
	[
	   {
		  "id": 3,
		  "name": "New Cat",
		  "created_at": 2019-10-03 03:18:00,
		  "updated_at": "2019-10-03 03:36:06"
	   }
	]

#Delete Cat
Purpose: Remove a Cat Record
Resource URL: https://www.catfarm.com/api/cat/{ID}
Parameters: The cat ID is specified in the URL   
Returns: ID of deleted cat

Example Request Endpoint: DELETE https://www.catfarm.com/api/cat/1
JSON Body: N/A

Example Response:
	1


#Update Cat
Purpose: Edit a Cat Record
Resource URL: https://www.catfarm.com/api/cat/{ID}
Parameters: 
	The cat ID is specified in the URL

    name: "id"
	type: integer
	required: YES
	
    name: "name"
	type: string
	required: YES

Returns: Cat details
	 
Example Request Endpoint: PUT https://www.catfarm.com/api/cat/1
JSON Body:
	{
	   "name": "New Name"
	}

Example Response:

   {
	  "id": 1,
	  "name": "New Name",
	  "created_at": 2019-10-03 03:18:00,
	  "updated_at": "2019-10-03 05:00:00"
   }
	

#Feed Cat
Purpose: Record meal details for a cat
Resource URL: https://www.catfarm.com/api/feed/{ID}
Parameters: 
	The cat ID is specified in the URL

    name: "food_type"
	type: string
	required: YES

    name: "food_amount"
	type: float
	required: YES

Returns: Food details
	 
Example Request Endpoint: PUT https://www.catfarm.com/api/feed/1
JSON Body:
	{
       "food_type": "MeowMix",
       "food_amount": "3.5"
    }

Example Response:
	{
	   "food_type": "MeowMix",
	   "food_amount": "3.5",
	   "cat_id": "1",
	   "feed_time": "2019-10-03 14:16:01",
	   "updated_at": "2019-10-03 14:16:01",
	   "created_at": "2019-10-03 14:16:01",
	   "id": 4
	}


